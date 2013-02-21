<?php

define('ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
define('INC_DIR', ROOT . DS . 'includes' . DS);
define('LIB_DIR', ROOT . DS . 'lib' . DS);
define('TPL_DIR', ROOT . DS . 'templates' . DS);
define('LOG_DIR', ROOT . DS . 'logs' . DS);
define('SESSION_TIMEOUT', 30);

@ini_set('log_errors','On');
@ini_set('display_errors','Off');
@ini_set('error_log', LIB_DIR . 'php_error.log');

if (!is_file(LOG_DIR . 'error_log.log')) {
    if(is_writable(LOG_DIR)) {
        touch(LOG_DIR . 'error_log.log');
    }
}