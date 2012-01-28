<?php defined('SYSPATH') or die('No direct script access.'); ?>

2011-11-20 11:36:35 --- ERROR: Database_Exception [ 1052 ]: Column 'id' in field list is ambiguous [ SELECT `spendingName`.`id` AS `spendingName:id`, `spendingName`.`name` AS `spendingName:name`, `id` AS `userId`, `spending`.* FROM `spendings` AS `spending` LEFT JOIN `spendingName` AS `spendingName` ON (`spendingName`.`id` = `spending`.`spendingNameId`) WHERE `date` >= '2011-11-01' AND `date`  ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2011-11-20 11:36:35 --- STRACE: Database_Exception [ 1052 ]: Column 'id' in field list is ambiguous [ SELECT `spendingName`.`id` AS `spendingName:id`, `spendingName`.`name` AS `spendingName:name`, `id` AS `userId`, `spending`.* FROM `spendings` AS `spending` LEFT JOIN `spendingName` AS `spendingName` ON (`spendingName`.`id` = `spending`.`spendingNameId`) WHERE `date` >= '2011-11-01' AND `date`  ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /home/kufd/www/myWallet/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT `spendin...', 'Model_Spending', Array)
#1 /home/kufd/www/myWallet/modules/orm/classes/kohana/orm.php(964): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /home/kufd/www/myWallet/modules/orm/classes/kohana/orm.php(923): Kohana_ORM->_load_result(true)
#3 /home/kufd/www/myWallet/application/classes/model/spending.php(75): Kohana_ORM->find_all()
#4 /home/kufd/www/myWallet/application/classes/controller/index.php(113): Model_Spending::getList(Array)
#5 [internal function]: Controller_Index->action_spendingList()
#6 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#7 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#10 {main}
2011-11-20 11:36:43 --- ERROR: Database_Exception [ 1052 ]: Column 'id' in field list is ambiguous [ SELECT `spendingName`.`id` AS `spendingName:id`, `spendingName`.`name` AS `spendingName:name`, `id` AS `userId`, `spending`.* FROM `spendings` AS `spending` LEFT JOIN `spendingName` AS `spendingName` ON (`spendingName`.`id` = `spending`.`spendingNameId`) WHERE `date` >= '2011-11-01' AND `date`  ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2011-11-20 11:36:43 --- STRACE: Database_Exception [ 1052 ]: Column 'id' in field list is ambiguous [ SELECT `spendingName`.`id` AS `spendingName:id`, `spendingName`.`name` AS `spendingName:name`, `id` AS `userId`, `spending`.* FROM `spendings` AS `spending` LEFT JOIN `spendingName` AS `spendingName` ON (`spendingName`.`id` = `spending`.`spendingNameId`) WHERE `date` >= '2011-11-01' AND `date`  ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /home/kufd/www/myWallet/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT `spendin...', 'Model_Spending', Array)
#1 /home/kufd/www/myWallet/modules/orm/classes/kohana/orm.php(964): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /home/kufd/www/myWallet/modules/orm/classes/kohana/orm.php(923): Kohana_ORM->_load_result(true)
#3 /home/kufd/www/myWallet/application/classes/model/spending.php(75): Kohana_ORM->find_all()
#4 /home/kufd/www/myWallet/application/classes/controller/index.php(113): Model_Spending::getList(Array)
#5 [internal function]: Controller_Index->action_spendingList()
#6 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#7 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#10 {main}
2011-11-20 11:49:29 --- ERROR: ErrorException [ 8 ]: Undefined offset: 1 ~ MODPATH/database/classes/kohana/database.php [ 500 ]
2011-11-20 11:49:29 --- STRACE: ErrorException [ 8 ]: Undefined offset: 1 ~ MODPATH/database/classes/kohana/database.php [ 500 ]
--
#0 /home/kufd/www/myWallet/modules/database/classes/kohana/database.php(500): Kohana_Core::error_handler(8, 'Undefined offse...', '/home/kufd/www/...', 500, Array)
#1 [internal function]: Kohana_Database->quote_column(Array)
#2 /home/kufd/www/myWallet/modules/database/classes/kohana/database/query/builder/select.php(352): array_map(Array, Array)
#3 /home/kufd/www/myWallet/modules/database/classes/kohana/database/query.php(228): Kohana_Database_Query_Builder_Select->compile(Object(Database_MySQL))
#4 /home/kufd/www/myWallet/modules/orm/classes/kohana/orm.php(964): Kohana_Database_Query->execute(Object(Database_MySQL))
#5 /home/kufd/www/myWallet/modules/orm/classes/kohana/orm.php(923): Kohana_ORM->_load_result(true)
#6 /home/kufd/www/myWallet/application/classes/model/spending.php(77): Kohana_ORM->find_all()
#7 /home/kufd/www/myWallet/application/classes/controller/index.php(113): Model_Spending::getList(Array)
#8 [internal function]: Controller_Index->action_spendingList()
#9 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#10 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#11 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#12 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#13 {main}
2011-11-20 11:49:44 --- ERROR: Database_Exception [ 1052 ]: Column 'id' in field list is ambiguous [ SELECT `spendingName`.`id` AS `spendingName:id`, `spendingName`.`name` AS `spendingName:name`, SUM(`amount`) AS `amount`, `id` AS `id`, `spending`.* FROM `spendings` AS `spending` LEFT JOIN `spendingName` AS `spendingName` ON (`spendingName`.`id` = `spending`.`spendingNameId`) WHERE `date` >= '2011-11-01' AND `date`  ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2011-11-20 11:49:44 --- STRACE: Database_Exception [ 1052 ]: Column 'id' in field list is ambiguous [ SELECT `spendingName`.`id` AS `spendingName:id`, `spendingName`.`name` AS `spendingName:name`, SUM(`amount`) AS `amount`, `id` AS `id`, `spending`.* FROM `spendings` AS `spending` LEFT JOIN `spendingName` AS `spendingName` ON (`spendingName`.`id` = `spending`.`spendingNameId`) WHERE `date` >= '2011-11-01' AND `date`  ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /home/kufd/www/myWallet/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT `spendin...', 'Model_Spending', Array)
#1 /home/kufd/www/myWallet/modules/orm/classes/kohana/orm.php(964): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /home/kufd/www/myWallet/modules/orm/classes/kohana/orm.php(923): Kohana_ORM->_load_result(true)
#3 /home/kufd/www/myWallet/application/classes/model/spending.php(77): Kohana_ORM->find_all()
#4 /home/kufd/www/myWallet/application/classes/controller/index.php(113): Model_Spending::getList(Array)
#5 [internal function]: Controller_Index->action_spendingList()
#6 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#7 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#10 {main}
2011-11-20 12:36:59 --- ERROR: ErrorException [ 1 ]: Call to undefined method Model_Spending::order() ~ APPPATH/classes/model/spending.php [ 59 ]
2011-11-20 12:36:59 --- STRACE: ErrorException [ 1 ]: Call to undefined method Model_Spending::order() ~ APPPATH/classes/model/spending.php [ 59 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2011-11-20 12:37:01 --- ERROR: ErrorException [ 1 ]: Call to undefined method Model_Spending::order() ~ APPPATH/classes/model/spending.php [ 59 ]
2011-11-20 12:37:01 --- STRACE: ErrorException [ 1 ]: Call to undefined method Model_Spending::order() ~ APPPATH/classes/model/spending.php [ 59 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2011-11-20 12:40:49 --- ERROR: Database_Exception [ 1305 ]: FUNCTION myWallet.GROUP_CONCTA does not exist [ SELECT `spendingName`.`id` AS `spendingName:id`, `spendingName`.`name` AS `spendingName:name`, SUM(`amount`) AS `amountTotalBySpending`, SUM(`amount`) AS `amountTotalByDate`, GROUP_CONCTA(`name`) AS `nameByDate`, `spending`.* FROM `spendings` AS `spending` LEFT JOIN `spendingName` AS `spendingName` ON (`spendingName`.`id` = `spending`.`spendingNameId`) WHERE `date` >= '2011-11-01' AND `date`  ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2011-11-20 12:40:49 --- STRACE: Database_Exception [ 1305 ]: FUNCTION myWallet.GROUP_CONCTA does not exist [ SELECT `spendingName`.`id` AS `spendingName:id`, `spendingName`.`name` AS `spendingName:name`, SUM(`amount`) AS `amountTotalBySpending`, SUM(`amount`) AS `amountTotalByDate`, GROUP_CONCTA(`name`) AS `nameByDate`, `spending`.* FROM `spendings` AS `spending` LEFT JOIN `spendingName` AS `spendingName` ON (`spendingName`.`id` = `spending`.`spendingNameId`) WHERE `date` >= '2011-11-01' AND `date`  ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /home/kufd/www/myWallet/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT `spendin...', 'Model_Spending', Array)
#1 /home/kufd/www/myWallet/modules/orm/classes/kohana/orm.php(964): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /home/kufd/www/myWallet/modules/orm/classes/kohana/orm.php(923): Kohana_ORM->_load_result(true)
#3 /home/kufd/www/myWallet/application/classes/model/spending.php(83): Kohana_ORM->find_all()
#4 /home/kufd/www/myWallet/application/classes/controller/index.php(113): Model_Spending::getList(Array)
#5 [internal function]: Controller_Index->action_spendingList()
#6 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#7 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#10 {main}
2011-11-20 12:40:50 --- ERROR: Database_Exception [ 1305 ]: FUNCTION myWallet.GROUP_CONCTA does not exist [ SELECT `spendingName`.`id` AS `spendingName:id`, `spendingName`.`name` AS `spendingName:name`, SUM(`amount`) AS `amountTotalByDate`, GROUP_CONCTA(`name`) AS `nameByDate`, `spending`.* FROM `spendings` AS `spending` LEFT JOIN `spendingName` AS `spendingName` ON (`spendingName`.`id` = `spending`.`spendingNameId`) WHERE `date` >= '2011-11-01' AND `date`  ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2011-11-20 12:40:50 --- STRACE: Database_Exception [ 1305 ]: FUNCTION myWallet.GROUP_CONCTA does not exist [ SELECT `spendingName`.`id` AS `spendingName:id`, `spendingName`.`name` AS `spendingName:name`, SUM(`amount`) AS `amountTotalByDate`, GROUP_CONCTA(`name`) AS `nameByDate`, `spending`.* FROM `spendings` AS `spending` LEFT JOIN `spendingName` AS `spendingName` ON (`spendingName`.`id` = `spending`.`spendingNameId`) WHERE `date` >= '2011-11-01' AND `date`  ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /home/kufd/www/myWallet/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT `spendin...', 'Model_Spending', Array)
#1 /home/kufd/www/myWallet/modules/orm/classes/kohana/orm.php(964): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /home/kufd/www/myWallet/modules/orm/classes/kohana/orm.php(923): Kohana_ORM->_load_result(true)
#3 /home/kufd/www/myWallet/application/classes/model/spending.php(83): Kohana_ORM->find_all()
#4 /home/kufd/www/myWallet/application/classes/controller/index.php(113): Model_Spending::getList(Array)
#5 [internal function]: Controller_Index->action_spendingList()
#6 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#7 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#10 {main}
2011-11-20 12:40:51 --- ERROR: Database_Exception [ 1305 ]: FUNCTION myWallet.GROUP_CONCTA does not exist [ SELECT `spendingName`.`id` AS `spendingName:id`, `spendingName`.`name` AS `spendingName:name`, SUM(`amount`) AS `amountTotalByDate`, GROUP_CONCTA(`name`) AS `nameByDate`, `spending`.* FROM `spendings` AS `spending` LEFT JOIN `spendingName` AS `spendingName` ON (`spendingName`.`id` = `spending`.`spendingNameId`) WHERE `date` >= '2011-11-01' AND `date`  ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2011-11-20 12:40:51 --- STRACE: Database_Exception [ 1305 ]: FUNCTION myWallet.GROUP_CONCTA does not exist [ SELECT `spendingName`.`id` AS `spendingName:id`, `spendingName`.`name` AS `spendingName:name`, SUM(`amount`) AS `amountTotalByDate`, GROUP_CONCTA(`name`) AS `nameByDate`, `spending`.* FROM `spendings` AS `spending` LEFT JOIN `spendingName` AS `spendingName` ON (`spendingName`.`id` = `spending`.`spendingNameId`) WHERE `date` >= '2011-11-01' AND `date`  ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /home/kufd/www/myWallet/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT `spendin...', 'Model_Spending', Array)
#1 /home/kufd/www/myWallet/modules/orm/classes/kohana/orm.php(964): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /home/kufd/www/myWallet/modules/orm/classes/kohana/orm.php(923): Kohana_ORM->_load_result(true)
#3 /home/kufd/www/myWallet/application/classes/model/spending.php(83): Kohana_ORM->find_all()
#4 /home/kufd/www/myWallet/application/classes/controller/index.php(113): Model_Spending::getList(Array)
#5 [internal function]: Controller_Index->action_spendingList()
#6 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#7 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#10 {main}
2011-11-20 12:40:55 --- ERROR: Database_Exception [ 1305 ]: FUNCTION myWallet.GROUP_CONCTA does not exist [ SELECT `spendingName`.`id` AS `spendingName:id`, `spendingName`.`name` AS `spendingName:name`, SUM(`amount`) AS `amountTotalByDate`, GROUP_CONCTA(`name`) AS `nameByDate`, `spending`.* FROM `spendings` AS `spending` LEFT JOIN `spendingName` AS `spendingName` ON (`spendingName`.`id` = `spending`.`spendingNameId`) WHERE `date` >= '2011-11-01' AND `date`  ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2011-11-20 12:40:55 --- STRACE: Database_Exception [ 1305 ]: FUNCTION myWallet.GROUP_CONCTA does not exist [ SELECT `spendingName`.`id` AS `spendingName:id`, `spendingName`.`name` AS `spendingName:name`, SUM(`amount`) AS `amountTotalByDate`, GROUP_CONCTA(`name`) AS `nameByDate`, `spending`.* FROM `spendings` AS `spending` LEFT JOIN `spendingName` AS `spendingName` ON (`spendingName`.`id` = `spending`.`spendingNameId`) WHERE `date` >= '2011-11-01' AND `date`  ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /home/kufd/www/myWallet/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT `spendin...', 'Model_Spending', Array)
#1 /home/kufd/www/myWallet/modules/orm/classes/kohana/orm.php(964): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /home/kufd/www/myWallet/modules/orm/classes/kohana/orm.php(923): Kohana_ORM->_load_result(true)
#3 /home/kufd/www/myWallet/application/classes/model/spending.php(83): Kohana_ORM->find_all()
#4 /home/kufd/www/myWallet/application/classes/controller/index.php(113): Model_Spending::getList(Array)
#5 [internal function]: Controller_Index->action_spendingList()
#6 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#7 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#10 {main}
2011-11-20 12:42:14 --- ERROR: ErrorException [ 8 ]: Undefined index: nameConcatByDate ~ APPPATH/classes/model/spending.php [ 90 ]
2011-11-20 12:42:14 --- STRACE: ErrorException [ 8 ]: Undefined index: nameConcatByDate ~ APPPATH/classes/model/spending.php [ 90 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(90): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 90, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(113): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 12:42:17 --- ERROR: ErrorException [ 8 ]: Undefined index: nameConcatByDate ~ APPPATH/classes/model/spending.php [ 90 ]
2011-11-20 12:42:17 --- STRACE: ErrorException [ 8 ]: Undefined index: nameConcatByDate ~ APPPATH/classes/model/spending.php [ 90 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(90): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 90, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(113): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 12:42:22 --- ERROR: ErrorException [ 8 ]: Undefined index: nameConcatByDate ~ APPPATH/classes/model/spending.php [ 90 ]
2011-11-20 12:42:22 --- STRACE: ErrorException [ 8 ]: Undefined index: nameConcatByDate ~ APPPATH/classes/model/spending.php [ 90 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(90): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 90, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(113): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 12:43:09 --- ERROR: ErrorException [ 8 ]: Undefined index: nameConcatByDate ~ APPPATH/classes/model/spending.php [ 90 ]
2011-11-20 12:43:09 --- STRACE: ErrorException [ 8 ]: Undefined index: nameConcatByDate ~ APPPATH/classes/model/spending.php [ 90 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(90): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 90, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(113): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 12:45:10 --- ERROR: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`, `) AS `nameConcatByDate`, `spending`.* FROM `spendings` AS `spending` LEFT JO' at line 1 [ SELECT `spendingName`.`id` AS `spendingName:id`, `spendingName`.`name` AS `spendingName:name`, SUM(`amount`) AS `amountTotalByDate`, GROUP_CONCAT(`name` SEPARATOR `, `) AS `nameConcatByDate`, `spending`.* FROM `spendings` AS `spending` LEFT JOIN `spendingName` AS `spendingName` ON (`spendingName`.`id` = `spending`.`spendingNameId`) WHERE `date` >= '2011-11-01' AND `date`  ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2011-11-20 12:45:10 --- STRACE: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`, `) AS `nameConcatByDate`, `spending`.* FROM `spendings` AS `spending` LEFT JO' at line 1 [ SELECT `spendingName`.`id` AS `spendingName:id`, `spendingName`.`name` AS `spendingName:name`, SUM(`amount`) AS `amountTotalByDate`, GROUP_CONCAT(`name` SEPARATOR `, `) AS `nameConcatByDate`, `spending`.* FROM `spendings` AS `spending` LEFT JOIN `spendingName` AS `spendingName` ON (`spendingName`.`id` = `spending`.`spendingNameId`) WHERE `date` >= '2011-11-01' AND `date`  ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /home/kufd/www/myWallet/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT `spendin...', 'Model_Spending', Array)
#1 /home/kufd/www/myWallet/modules/orm/classes/kohana/orm.php(964): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /home/kufd/www/myWallet/modules/orm/classes/kohana/orm.php(923): Kohana_ORM->_load_result(true)
#3 /home/kufd/www/myWallet/application/classes/model/spending.php(83): Kohana_ORM->find_all()
#4 /home/kufd/www/myWallet/application/classes/controller/index.php(113): Model_Spending::getList(Array)
#5 [internal function]: Controller_Index->action_spendingList()
#6 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#7 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#10 {main}
2011-11-20 12:45:12 --- ERROR: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`, `) AS `nameConcatByDate`, `spending`.* FROM `spendings` AS `spending` LEFT JO' at line 1 [ SELECT `spendingName`.`id` AS `spendingName:id`, `spendingName`.`name` AS `spendingName:name`, SUM(`amount`) AS `amountTotalByDate`, GROUP_CONCAT(`name` SEPARATOR `, `) AS `nameConcatByDate`, `spending`.* FROM `spendings` AS `spending` LEFT JOIN `spendingName` AS `spendingName` ON (`spendingName`.`id` = `spending`.`spendingNameId`) WHERE `date` >= '2011-11-01' AND `date`  ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2011-11-20 12:45:12 --- STRACE: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`, `) AS `nameConcatByDate`, `spending`.* FROM `spendings` AS `spending` LEFT JO' at line 1 [ SELECT `spendingName`.`id` AS `spendingName:id`, `spendingName`.`name` AS `spendingName:name`, SUM(`amount`) AS `amountTotalByDate`, GROUP_CONCAT(`name` SEPARATOR `, `) AS `nameConcatByDate`, `spending`.* FROM `spendings` AS `spending` LEFT JOIN `spendingName` AS `spendingName` ON (`spendingName`.`id` = `spending`.`spendingNameId`) WHERE `date` >= '2011-11-01' AND `date`  ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /home/kufd/www/myWallet/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT `spendin...', 'Model_Spending', Array)
#1 /home/kufd/www/myWallet/modules/orm/classes/kohana/orm.php(964): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /home/kufd/www/myWallet/modules/orm/classes/kohana/orm.php(923): Kohana_ORM->_load_result(true)
#3 /home/kufd/www/myWallet/application/classes/model/spending.php(83): Kohana_ORM->find_all()
#4 /home/kufd/www/myWallet/application/classes/controller/index.php(113): Model_Spending::getList(Array)
#5 [internal function]: Controller_Index->action_spendingList()
#6 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#7 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#10 {main}
2011-11-20 12:45:15 --- ERROR: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`, `) AS `nameConcatByDate`, `spending`.* FROM `spendings` AS `spending` LEFT JO' at line 1 [ SELECT `spendingName`.`id` AS `spendingName:id`, `spendingName`.`name` AS `spendingName:name`, SUM(`amount`) AS `amountTotalByDate`, GROUP_CONCAT(`name` SEPARATOR `, `) AS `nameConcatByDate`, `spending`.* FROM `spendings` AS `spending` LEFT JOIN `spendingName` AS `spendingName` ON (`spendingName`.`id` = `spending`.`spendingNameId`) WHERE `date` >= '2011-11-01' AND `date`  ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2011-11-20 12:45:15 --- STRACE: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`, `) AS `nameConcatByDate`, `spending`.* FROM `spendings` AS `spending` LEFT JO' at line 1 [ SELECT `spendingName`.`id` AS `spendingName:id`, `spendingName`.`name` AS `spendingName:name`, SUM(`amount`) AS `amountTotalByDate`, GROUP_CONCAT(`name` SEPARATOR `, `) AS `nameConcatByDate`, `spending`.* FROM `spendings` AS `spending` LEFT JOIN `spendingName` AS `spendingName` ON (`spendingName`.`id` = `spending`.`spendingNameId`) WHERE `date` >= '2011-11-01' AND `date`  ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /home/kufd/www/myWallet/modules/database/classes/kohana/database/query.php(245): Kohana_Database_MySQL->query(1, 'SELECT `spendin...', 'Model_Spending', Array)
#1 /home/kufd/www/myWallet/modules/orm/classes/kohana/orm.php(964): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /home/kufd/www/myWallet/modules/orm/classes/kohana/orm.php(923): Kohana_ORM->_load_result(true)
#3 /home/kufd/www/myWallet/application/classes/model/spending.php(83): Kohana_ORM->find_all()
#4 /home/kufd/www/myWallet/application/classes/controller/index.php(113): Model_Spending::getList(Array)
#5 [internal function]: Controller_Index->action_spendingList()
#6 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#7 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#10 {main}
2011-11-20 15:06:22 --- ERROR: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
2011-11-20 15:06:22 --- STRACE: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(53): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 53, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(116): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 15:06:22 --- ERROR: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
2011-11-20 15:06:22 --- STRACE: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(53): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 53, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(116): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 15:06:29 --- ERROR: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
2011-11-20 15:06:29 --- STRACE: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(53): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 53, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(116): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 15:06:29 --- ERROR: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
2011-11-20 15:06:29 --- STRACE: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(53): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 53, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(116): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 15:06:30 --- ERROR: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
2011-11-20 15:06:30 --- STRACE: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(53): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 53, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(116): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 15:06:31 --- ERROR: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
2011-11-20 15:06:31 --- STRACE: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(53): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 53, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(116): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 15:06:32 --- ERROR: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
2011-11-20 15:06:32 --- STRACE: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(53): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 53, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(116): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 15:06:32 --- ERROR: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
2011-11-20 15:06:32 --- STRACE: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(53): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 53, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(116): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 15:06:33 --- ERROR: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
2011-11-20 15:06:33 --- STRACE: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(53): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 53, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(116): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 15:06:34 --- ERROR: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
2011-11-20 15:06:34 --- STRACE: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(53): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 53, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(116): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 15:07:10 --- ERROR: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
2011-11-20 15:07:10 --- STRACE: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(53): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 53, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(116): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 15:07:11 --- ERROR: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
2011-11-20 15:07:11 --- STRACE: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(53): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 53, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(116): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 15:07:11 --- ERROR: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
2011-11-20 15:07:11 --- STRACE: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(53): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 53, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(116): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 15:07:11 --- ERROR: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
2011-11-20 15:07:11 --- STRACE: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(53): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 53, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(116): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 15:07:11 --- ERROR: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
2011-11-20 15:07:11 --- STRACE: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(53): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 53, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(116): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 15:07:11 --- ERROR: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
2011-11-20 15:07:11 --- STRACE: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(53): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 53, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(116): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 15:07:12 --- ERROR: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
2011-11-20 15:07:12 --- STRACE: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(53): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 53, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(116): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 15:07:12 --- ERROR: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
2011-11-20 15:07:12 --- STRACE: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(53): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 53, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(116): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 15:07:23 --- ERROR: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
2011-11-20 15:07:23 --- STRACE: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(53): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 53, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(116): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 15:07:24 --- ERROR: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
2011-11-20 15:07:24 --- STRACE: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(53): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 53, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(116): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 15:07:24 --- ERROR: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
2011-11-20 15:07:24 --- STRACE: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(53): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 53, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(116): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 15:07:25 --- ERROR: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
2011-11-20 15:07:25 --- STRACE: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(53): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 53, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(116): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 15:07:28 --- ERROR: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
2011-11-20 15:07:28 --- STRACE: ErrorException [ 8 ]: Undefined index: group ~ APPPATH/classes/model/spending.php [ 53 ]
--
#0 /home/kufd/www/myWallet/application/classes/model/spending.php(53): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 53, Array)
#1 /home/kufd/www/myWallet/application/classes/controller/index.php(116): Model_Spending::getList(Array)
#2 [internal function]: Controller_Index->action_spendingList()
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#4 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#6 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#7 {main}
2011-11-20 15:13:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2011-11-20 15:13:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#1 {main}
2011-11-20 15:13:54 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2011-11-20 15:13:54 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#1 {main}
2011-11-20 15:13:55 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2011-11-20 15:13:55 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#1 {main}
2011-11-20 15:14:15 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2011-11-20 15:14:15 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#1 {main}
2011-11-20 15:14:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2011-11-20 15:14:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#1 {main}
2011-11-20 15:14:23 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2011-11-20 15:14:23 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#1 {main}
2011-11-20 15:16:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2011-11-20 15:16:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#1 {main}
2011-11-20 15:17:25 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2011-11-20 15:17:25 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#1 {main}
2011-11-20 15:17:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2011-11-20 15:17:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#1 {main}
2011-11-20 15:19:02 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2011-11-20 15:19:02 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#1 {main}
2011-11-20 15:30:23 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2011-11-20 15:30:23 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#1 {main}
2011-11-20 15:30:39 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2011-11-20 15:30:39 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#1 {main}
2011-11-20 15:30:45 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2011-11-20 15:30:45 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#1 {main}
2011-11-20 15:30:47 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2011-11-20 15:30:47 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#1 {main}
2011-11-20 15:31:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2011-11-20 15:31:37 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#1 {main}
2011-11-20 15:32:44 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2011-11-20 15:32:44 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#1 {main}
2011-11-20 15:36:17 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2011-11-20 15:36:17 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#1 {main}
2011-11-20 15:37:19 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2011-11-20 15:37:19 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#1 {main}
2011-11-20 15:37:21 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2011-11-20 15:37:21 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#1 {main}