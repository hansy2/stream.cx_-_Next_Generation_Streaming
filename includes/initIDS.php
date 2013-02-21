<?php
set_include_path(LIB_DIR);

require_once 'IDS/Init.php';

try {
    $request = array(
        'REQUEST' => $_REQUEST,
        'GET' => $_GET,
        'POST' => $_POST,
        'COOKIE' => $_COOKIE
    );

    if (!is_file($init->config['Logging']['path'])) {
        if(is_writable(LOG_DIR)) {
            touch($init->config['Logging']['path']);
        }
    }

    $init = IDS_Init::init(LIB_DIR .  'IDS/Config/Config.ini.php');
    $init->config['General']['base_path'] = LIB_DIR . 'IDS/';
    $init->config['General']['use_base_path'] = true;
    $init->config['Caching']['caching'] = 'none';
    $init->config['Logging']['path'] = '../../logs/phpIDS.log';

    $ids = new IDS_Monitor($request, $init);
    $result = $ids->run();
    if (!$result->isEmpty()) {
        require_once 'IDS/Log/File.php';
        require_once 'IDS/Log/Composite.php';
        $compositeLog = new IDS_Log_Composite();
        $compositeLog->addLogger(IDS_Log_File::getInstance($init));
        $compositeLog->execute($result);
    }
} catch (Exception $e) {
    printf(
        'An error occured: %s',
        $e->getMessage()
    );
}
restore_include_path();