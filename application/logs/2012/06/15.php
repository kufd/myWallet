<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-06-15 01:04:34 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-06-15 01:04:34 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#1 {main}
2012-06-15 01:05:40 --- ERROR: Database_Exception [ 1142 ]: DELETE command denied to user 'mywallet'@'localhost' for table 'spendings' [ DELETE FROM `spendings` WHERE `id` = '517' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2012-06-15 01:05:40 --- STRACE: Database_Exception [ 1142 ]: DELETE command denied to user 'mywallet'@'localhost' for table 'spendings' [ DELETE FROM `spendings` WHERE `id` = '517' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /home/kufd/www/myWallet/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(4, 'DELETE FROM `sp...', false, Array)
#1 /home/kufd/www/myWallet/modules/orm/classes/kohana/orm.php(1335): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /home/kufd/www/myWallet/application/classes/model/spending.php(128): Kohana_ORM->delete()
#3 /home/kufd/www/myWallet/application/classes/controller/index.php(128): Model_Spending::deleteSpending('517')
#4 [internal function]: Controller_Index->action_deleteSpending()
#5 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#6 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#7 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#8 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#9 {main}
2012-06-15 13:36:46 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-06-15 13:36:46 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#1 {main}