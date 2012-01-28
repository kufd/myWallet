<?php
Class Model_SpendingName extends ORM 
{
	protected $_table_name = 'spendingName';
	
	
	protected $_has_many = array(
    	'spendings' => array(
        	'model'       => 'spending',
        	'foreign_key' => 'id',
    	),
	);
	
	/**
	 * 
	 * Method returns top names of spending by parameters:
	 * userId - user id
	 * limit - count of names which will be returned
	 * 
	 * @param array $params
	 * @return array
	 */
	public static function topNames($params=array())
	{
		$spendingName = new self();
		$spendingName	->select(array('COUNT("spendings.spendingNameId")', 'totalUseSpendingName'))
						->join('spendings')
						->on('spendingName.id', '=', 'spendings.spendingNameId')
						->group_by('spendings.spendingNameId')
						->order_by('totalUseSpendingName', 'DESC');
		
		isset($params['userId']) && $spendingName->where('spendings.userId', '=', $params['userId']);
		isset($params['limit']) && $spendingName->limit($params['limit']);


		$result = array();
		foreach($spendingName->find_all() as $v)
		{
			$result[$v->id."_"] = $v->as_array();
		}
		
		return $result;
	}
	
	/**
	 * 
	 * Method returns data for autocomplete by parameters:
	 * query - search query(required)
	 * limit - count of names which will be returned
	 * 
	 * @param array $params
	 * @return array
	 */
	public static function autocomplete($params)
	{
		$spendingName = new self();
		$spendingName->where('name', 'LIKE', $params['query'].'%');	
		
		isset($params['limit']) && $spendingName->limit($params['limit']);


		$result = array();
		foreach($spendingName->find_all() as $v)
		{
			$result[] = $v->name;
		}
		
		return $result;
	}
}