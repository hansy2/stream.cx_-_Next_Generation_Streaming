<?php

require_once('settings.cfg.php');

require_once(LIB_DIR . '/Session' . '/Session.class.php');
require_once(INC_DIR . '/initSession.php');

require_once(INC_DIR . '/initIDS.php');

require_once(LIB_DIR . '/Language.class.php');
Language::init(LNG_DIR);

require_once(INC_DIR . '/varDefiner.php');

switch ($_GET['request']) {
    case 'json':
        $objectName = NULL;

        if (isset($_GET['content']) && !is_null($_GET['content'])) {
            if (!is_file(P_TPL_DIR . '/TPL_' . ucfirst(strtolower($_GET['content'])) . '.php')) {
                $_GET['content'] = '404';
            }
            require_once(P_TPL_DIR . '/TPL_' . ucfirst(strtolower($_GET['content'])) . '.php');
            $objectName = 'TPL_' . ucfirst(strtolower($_GET['content']));
        } else {
            require_once(P_TPL_DIR . '/TPL_Main.php');
            $objectName = 'TPL_Main';
        }

        $tplObject = new $objectName(Language::getObject());

        header('Content-Type: application/json');
        echo json_encode($tplObject->returnTemplate());

        break;
    default:
        if (!is_file(P_TPL_DIR . '/TPL_Frame.php')) {
            throw new Exception('Frame template file could not be found!');
        }
        require_once(P_TPL_DIR . '/TPL_Frame.php');
        $tplObject = new TPL_Frame(Language::getObject());
        echo $tplObject->returnTemplate();
        break;
}