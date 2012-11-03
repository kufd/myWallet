<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-06-27 12:40:38 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-06-27 12:40:38 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#1 {main}
2012-06-27 12:43:18 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
2012-06-27 12:43:18 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH/classes/kohana/request.php [ 1126 ]
--
#0 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#1 {main}
2012-06-27 13:51:52 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/index.php [ 103 ]
2012-06-27 13:51:52 --- STRACE: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/controller/index.php [ 103 ]
--
#0 /home/kufd/www/myWallet/application/classes/controller/index.php(103): Kohana_Core::error_handler(8, 'Trying to get p...', '/home/kufd/www/...', 103, Array)
#1 [internal function]: Controller_Index->action_addSpending()
#2 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#3 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#5 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#6 {main}