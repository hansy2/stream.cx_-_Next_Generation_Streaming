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
        break;

    default:
        if (is_file(P_TPL_DIR .'/TPL_Main.php')) {
            require_once(P_TPL_DIR.'/TPL_Main.php');
            $template = new TPL_Main();
            $template->display('frame.tpl');
        }
        break;
}