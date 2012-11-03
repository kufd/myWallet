<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-02-11 13:17:45 --- ERROR: ErrorException [ 8 ]: Undefined index: newPassword ~ SYSPATH/classes/kohana/validation.php [ 102 ]
2012-02-11 13:17:45 --- STRACE: ErrorException [ 8 ]: Undefined index: newPassword ~ SYSPATH/classes/kohana/validation.php [ 102 ]
--
#0 /home/kufd/www/myWallet/system/classes/kohana/validation.php(102): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 102, Array)
#1 /home/kufd/www/myWallet/system/classes/kohana/valid.php(533): Kohana_Validation->offsetGet('newPassword')
#2 [internal function]: Kohana_Valid::matches(Object(Validation), 'reNewPassword', 'newPassword')
#3 /home/kufd/www/myWallet/system/classes/kohana/validation.php(378): ReflectionMethod->invokeArgs(NULL, Array)
#4 /home/kufd/www/myWallet/application/classes/model/validator.php(60): Kohana_Validation->check()
#5 /home/kufd/www/myWallet/application/classes/controller/index.php(134): Model_Validator::formProfile(Array)
#6 [internal function]: Controller_Index->action_saveProfile()
#7 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#8 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#11 {main}
2012-02-11 13:17:53 --- ERROR: ErrorException [ 8 ]: Undefined index: newPassword ~ SYSPATH/classes/kohana/validation.php [ 102 ]
2012-02-11 13:17:53 --- STRACE: ErrorException [ 8 ]: Undefined index: newPassword ~ SYSPATH/classes/kohana/validation.php [ 102 ]
--
#0 /home/kufd/www/myWallet/system/classes/kohana/validation.php(102): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 102, Array)
#1 /home/kufd/www/myWallet/system/classes/kohana/valid.php(533): Kohana_Validation->offsetGet('newPassword')
#2 [internal function]: Kohana_Valid::matches(Object(Validation), 'reNewPassword', 'newPassword')
#3 /home/kufd/www/myWallet/system/classes/kohana/validation.php(378): ReflectionMethod->invokeArgs(NULL, Array)
#4 /home/kufd/www/myWallet/application/classes/model/validator.php(60): Kohana_Validation->check()
#5 /home/kufd/www/myWallet/application/classes/controller/index.php(134): Model_Validator::formProfile(Array)
#6 [internal function]: Controller_Index->action_saveProfile()
#7 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#8 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#11 {main}
2012-02-11 13:31:22 --- ERROR: ErrorException [ 8 ]: Undefined index: newPassword ~ SYSPATH/classes/kohana/validation.php [ 102 ]
2012-02-11 13:31:22 --- STRACE: ErrorException [ 8 ]: Undefined index: newPassword ~ SYSPATH/classes/kohana/validation.php [ 102 ]
--
#0 /home/kufd/www/myWallet/system/classes/kohana/validation.php(102): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 102, Array)
#1 /home/kufd/www/myWallet/system/classes/kohana/valid.php(533): Kohana_Validation->offsetGet('newPassword')
#2 [internal function]: Kohana_Valid::matches(Object(Validation), 'reNewPassword', 'newPassword')
#3 /home/kufd/www/myWallet/system/classes/kohana/validation.php(378): ReflectionMethod->invokeArgs(NULL, Array)
#4 /home/kufd/www/myWallet/application/classes/model/validator.php(60): Kohana_Validation->check()
#5 /home/kufd/www/myWallet/application/classes/controller/index.php(134): Model_Validator::formProfile(Array)
#6 [internal function]: Controller_Index->action_saveProfile()
#7 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#8 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#11 {main}
2012-02-11 13:31:35 --- ERROR: ErrorException [ 8 ]: Undefined index: newPassword ~ SYSPATH/classes/kohana/validation.php [ 102 ]
2012-02-11 13:31:35 --- STRACE: ErrorException [ 8 ]: Undefined index: newPassword ~ SYSPATH/classes/kohana/validation.php [ 102 ]
--
#0 /home/kufd/www/myWallet/system/classes/kohana/validation.php(102): Kohana_Core::error_handler(8, 'Undefined index...', '/home/kufd/www/...', 102, Array)
#1 /home/kufd/www/myWallet/system/classes/kohana/valid.php(533): Kohana_Validation->offsetGet('newPassword')
#2 [internal function]: Kohana_Valid::matches(Object(Validation), 'reNewPassword', 'newPassword')
#3 /home/kufd/www/myWallet/system/classes/kohana/validation.php(378): ReflectionMethod->invokeArgs(NULL, Array)
#4 /home/kufd/www/myWallet/application/classes/model/validator.php(60): Kohana_Validation->check()
#5 /home/kufd/www/myWallet/application/classes/controller/index.php(134): Model_Validator::formProfile(Array)
#6 [internal function]: Controller_Index->action_saveProfile()
#7 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#8 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#9 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#10 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#11 {main}
2012-02-11 13:47:08 --- ERROR: ErrorException [ 2 ]: Missing argument 2 for Kohana_Valid::matches() ~ SYSPATH/classes/kohana/valid.php [ 531 ]
2012-02-11 13:47:08 --- STRACE: ErrorException [ 2 ]: Missing argument 2 for Kohana_Valid::matches() ~ SYSPATH/classes/kohana/valid.php [ 531 ]
--
#0 /home/kufd/www/myWallet/system/classes/kohana/valid.php(531): Kohana_Core::error_handler(2, 'Missing argumen...', '/home/kufd/www/...', 531, Array)
#1 [internal function]: Kohana_Valid::matches('newPassword')
#2 /home/kufd/www/myWallet/system/classes/kohana/validation.php(378): ReflectionMethod->invokeArgs(NULL, Array)
#3 /home/kufd/www/myWallet/application/classes/model/validator.php(60): Kohana_Validation->check()
#4 /home/kufd/www/myWallet/application/classes/controller/index.php(134): Model_Validator::formProfile(Array)
#5 [internal function]: Controller_Index->action_saveProfile()
#6 /home/kufd/www/myWallet/system/classes/kohana/request/client/internal.php(118): ReflectionMethod->invoke(Object(Controller_Index))
#7 /home/kufd/www/myWallet/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#8 /home/kufd/www/myWallet/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#9 /home/kufd/www/myWallet/index.php(108): Kohana_Request->execute()
#10 {main}