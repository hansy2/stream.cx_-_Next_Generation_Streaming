<?php

require_once('settings.cfg.php');

require_once(LIB_DIR . '/Session' . '/Session.class.php');
require_once(INC_DIR . '/initSession.php');

require_once(INC_DIR . '/initIDS.php');

require_once(LIB_DIR . '/Language.class.php');
Language::init(LNG_DIR);

switch ($_GET['request']) {
    case 'json':
        if (!is_file(P_TPL_DIR . '/TPL_' . ucfirst(strtolower($_GET['content'])) . '.php')) {
            $_GET['content'] = 'main';
        }
        require_once(P_TPL_DIR . '/TPL_' . ucfirst(strtolower($_GET['content'])) . '.php');
        $objectName = 'TPL_' . ucfirst(strtolower($_GET['content']));
        $tplObject = new $objectName(false, $language);
        header('Content-Type: application/json');
        echo json_encode($tplObject->returnTemplate());
        break;
    default:
        if (!is_file(P_TPL_DIR . '/TPL_' . ucfirst(strtolower($_GET['content'])) . '.php')) {
            $_GET['content'] = 'main';
        }
        require_once(P_TPL_DIR . '/TPL_' . ucfirst(strtolower($_GET['content'])) . '.php');
        $objectName = 'TPL_' . ucfirst(strtolower($_GET['content']));
        $tplObject = new $objectName(true, Language::getObject());
        echo $tplObject->returnTemplate();
        break;
}