<?php defined('SYSPATH') or die('No direct script access.');

// -- Environment setup --------------------------------------------------------

// Load the core Kohana class
require SYSPATH.'classes/kohana/core'.EXT;

if (is_file(APPPATH.'classes/kohana'.EXT))
{
	// Application extends the core
	require APPPATH.'classes/kohana'.EXT;
}
else
{
	// Load empty core extension
	require SYSPATH.'classes/kohana'.EXT;
}

/**
 * Set the default time zone.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/timezones
 */
date_default_timezone_set('America/Chicago');

/**
 * Set the default locale.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/setlocale
 */
setlocale(LC_ALL, 'en_US.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @see  http://kohanaframework.org/guide/using.autoloading
 * @see  http://php.net/spl_autoload_register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Enable my autoloader
 */
spl_autoload_register(array('Model_Utils', 'autoloader'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @see  http://php.net/spl_autoload_call
 * @see  http://php.net/manual/var.configuration.php#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

// -- Configuration and initialization -----------------------------------------

/**
 * Set the default language
 */
I18n::lang('en-us');

/**
 * Set Kohana::$environment if a 'KOHANA_ENV' environment variable has been supplied.
 *
 * Note: If you supply an invalid environment name, a PHP warning will be thrown
 * saying "Couldn't find constant Kohana::<INVALID_ENV_NAME>"
 */
if (isset($_SERVER['KOHANA_ENV']))
{
	Kohana::$environment = constant('Kohana::'.strtoupper($_SERVER['KOHANA_ENV']));
}

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"       index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 */
Kohana::init(array(
	'base_url'   => (Kohana::$environment != Kohana::PRODUCTION) ? '/test/myWallet/' : '/myWallet/',
));

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Log_File(APPPATH.'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Config_File);


/**
 * Setting cookie salt
 */
Cookie::$salt = 'lfsk87NlKjkfdsl4rkfldssx';

/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(array(
	// 'auth'       => MODPATH.'auth',       // Basic authentication
	// 'cache'      => MODPATH.'cache',      // Caching with multiple backends
	// 'codebench'  => MODPATH.'codebench',  // Benchmarking tool
	'database'   => MODPATH.'database',   // Database access
	// 'image'      => MODPATH.'image',      // Image manipulation
	'orm'        => MODPATH.'orm',        // Object Relationship Mapping
	// 'unittest'   => MODPATH.'unittest',   // Unit testing
	// 'userguide'  => MODPATH.'userguide',  // User guide and API documentation
	'a1'       => MODPATH.'a1',       // Basic authentication
	));

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */
Route::set('default', '')
	->defaults(array(
		'controller' => 'index',
		'action'     => 'index',
	));
Route::set('export', 'export')
	->defaults(array(
		'controller' => 'index',
		'action'     => 'export',
	));
Route::set('register', 'register')
	->defaults(array(
		'controller' => 'index',
		'action'     => 'register',
	));
Route::set('login', 'login')
	->defaults(array(
		'controller' => 'index',
		'action'     => 'login',
	));
Route::set('logout', 'logout')
	->defaults(array(
		'controller' => 'index',
		'action'     => 'logout',
	));
Route::set('addSpending', 'addSpending')
	->defaults(array(
		'controller' => 'index',
		'action'     => 'addSpending',
	));
Route::set('spendingNamesAutocomplete', 'spendingNamesAutocomplete')
	->defaults(array(
		'controller' => 'index',
		'action'     => 'spendingNamesAutocomplete',
	));
Route::set('spendingList', 'spendingList')
	->defaults(array(
		'controller' => 'index',
		'action'     => 'spendingList',
	));
Route::set('deleteSpending', 'deleteSpending')
	->defaults(array(
		'controller' => 'index',
		'action'     => 'deleteSpending',
	));	
Route::set('saveProfile', 'saveProfile')
	->defaults(array(
		'controller' => 'index',
		'action'     => 'saveProfile',
	));		
