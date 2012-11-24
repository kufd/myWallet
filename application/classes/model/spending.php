<?php
Class Model_Spending extends ORM 
{
	protected $_table_name = 'spendings';
	
	
	protected $_belongs_to = array(
    	'spendingName' => array(
        	'model'       => 'spendingName',
			'foreign_key' => 'spendingNameId'
    	),
	);
	
	/**
	 * Method add new spending
	 */
	public static function addSpending($params)
	{
		//if spendingNameId is empty we add spendingName into table spendingName
		if(!isset($params['spendingNameId']) || !$params['spendingNameId'])
		{
			//look for existed name of spending
			$spendingName = new Model_SpendingName();
			$spendingName->where('name', '=', $params['spendingName']);
    		$spendingName->find();
    
			if(!$spendingName->loaded())
			{
				//if not found, add new spending name 
				$spendingName->name = $params['spendingName'];
				$spendingName->save();
			}
			$params['spendingNameId'] = $spendingName->id;
		}
		
		//save spending
		$spending = new self(isset($params['spendingId']) && $params['spendingId'] ? $params['spendingId'] : null);
		isset($params['userId']) && $spending->userId = $params['userId'];
		isset($params['date']) && $spending->date = $params['date'];
		isset($params['spendingNameId']) && $spending->spendingNameId = $params['spendingNameId'];
		if(isset($params['amount']))
		{
			if(!empty($params['password']))
			{
				$spending->amountEncrypted = DB::expr(
					'AES_ENCRYPT("'.$params['amount'].'", "'.mysql_real_escape_string($params['password']).'")'
				);
			}
			else
			{
				$spending->amount = $params['amount'];
			}
		}
		$spending->save();
	}
	
	/**
	 * Method returns list of spendings by parameters 
	 */
	public static function getList($params = array())
	{
		//if sorting by amount
		if(isset($params['order']) && isset($params['group']) && $params['order']['field']=='amount')
		{
			if(in_array('spendingNameId', $params['group']))
			{
				$params['order']['field'] = 'amountTotalBySpending';
			}
			elseif(in_array('date', $params['group']))
			{
				$params['order']['field'] = 'amountTotalByDate';
			}
		}
		
		$spending = new self();

		$spending->with('spendingName');
		
		isset($params['dateBegin']) && $spending->where('date', '>=', $params['dateBegin']);
		isset($params['dateEnd']) && $spending->where('date', '<=', $params['dateEnd']);
		isset($params['userId']) && $spending->where('userId', '=', $params['userId']);
		isset($params['limit']) && $spending->limit($params['limit']);
		isset($params['offset']) && $spending->offset($params['offset']);
		
		$spending->order_by((isset($params['order']) ? $params['order']['field'] : 'id'), (isset($params['order']) ? $params['order']['direction'] : 'asc'));
		
		$amountDecrypted = 'CAST(IF(`amountEncrypted` = "", `amount`, AES_DECRYPT(`amountEncrypted`, "'.mysql_real_escape_string($params['password']).'")) AS decimal(10,2))';
		$spending->select(array(
			DB::expr($amountDecrypted), 
			'amountDecrypted'
		));
		
		if(isset($params['group']))
		{
			foreach($params['group'] as $v)
			{
				$spending->group_by($v);		
			}
			
			if(in_array('spendingNameId', $params['group']))
			{
				$spending->select(array(DB::expr("SUM($amountDecrypted)"), 'amountTotalBySpending'));
			}
			
			if(in_array('date', $params['group']))
			{
				$spending->select(array(DB::expr("SUM($amountDecrypted)"), 'amountTotalByDate'));
				$spending->select(array('GROUP_CONCAT("name" SEPARATOR \', \')', 'nameConcatByDate'));
			}
		}
		
		$result = array();
		foreach($spending->find_all() as $v)
		{
			$key=$v->id."_";
			$result[$key] = $v->as_array();
			$result[$key]['editable'] = true;
			$result[$key]['amount'] = $result[$key]['amountDecrypted'];
			
			//if group by spending
			isset($result[$key]['amountTotalBySpending']) && ($result[$key]['amount'] = $result[$key]['amountTotalBySpending']) && 
			!($result[$key]['editable'] = false);
			
			//if group by date
			isset($result[$key]['amountTotalByDate']) && ($result[$key]['amount'] = $result[$key]['amountTotalByDate']) &&
			!($result[$key]['editable'] = false) && 
			!isset($result[$key]['amountTotalBySpending']) && ($result[$key]['spendingName']['name']=$result[$key]['nameConcatByDate']);
		}

		return $result;
	}
	
	/**
	 * Method remove spending by id
	 * 
	 * @param integer $id
	 */
	public static function deleteSpending($id)
	{ 
			$spending = new self();
			$spending->where('id', '=', $id);
    		$spending->find();
    
			if($spending->loaded())
			{
				$spending->delete();
			}
	}
	
	/**
	 * 
	 * 
	 * @param integer $userId
	 * @param string $oldPassword
	 * @param string $newPassword
	 */
	public static function updateEncriptionKey($userId, $oldPassword, $newPassword)
	{ 
		DB::update('spendings')
		->set(array('amountEncrypted' => DB::expr('AES_ENCRYPT(AES_DECRYPT(`amountEncrypted`, "'.mysql_real_escape_string($oldPassword).'"), "'.mysql_real_escape_string($newPassword).'")')))
		->where('userId', '=', $userId)
		->execute();
		
	}
}