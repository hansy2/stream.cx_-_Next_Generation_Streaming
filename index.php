<?php

require_once('settings.cfg.php');

/** @noinspection PhpIncludeInspection */
require_once(LIB_DIR . '/Session' .  '/Session.class.php');
/** @noinspection PhpIncludeInspection */
require_once(INC_DIR . '/initSession.php');

/** @noinspection PhpIncludeInspection */
require_once(INC_DIR . '/initIDS.php');

switch ($_GET['request']) {
    case 'json':
        if (is_file(P_TPL_DIR .'/TPL_Main.php')) {
            require_once(P_TPL_DIR.'/TPL_Main.php');
            $object = new TPL_Main(false, array());
            header('Content-Type: application/json');
            echo json_encode($object->returnTemplate());
        }
        break;

    default:
        if (is_file(P_TPL_DIR .'/TPL_Main.php')) {
            require_once(P_TPL_DIR.'/TPL_Main.php');
            $object = new TPL_Main(true, array());
            echo $object->returnTemplate();
        }
        break;
}