<?php

define('ROOT', dirname(__FILE__));
define('INC_DIR', ROOT . '/includes');
define('LIB_DIR', ROOT . '/lib');
define('TPL_DIR', ROOT . '/templates');
define('LOG_DIR', ROOT . '/logs');
define('LNG_DIR', INC_DIR . '/languages');
define('P_TPL_DIR', INC_DIR . '/pageTemplates');
define('SMARTY_DIR', LIB_DIR . '/Smarty-3.1.13/');
define('SESSION_TIMEOUT', 30);

@ini_set('log_errors', 'On');
@ini_set('display_errors', 'Off');
@ini_set('error_reporting', E_ALL ^ E_NOTICE);
@ini_set('error_log', LIB_DIR . '/php_error.log');

if (!is_file(LOG_DIR . '/error_log.log')) {
    if (is_writable(LOG_DIR)) {
        touch(LOG_DIR . '/error_log.log');
    }
}