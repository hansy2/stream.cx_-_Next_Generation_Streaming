<?php

require_once(SMARTY_DIR . 'Smarty.class.php');

class Template extends Smarty
{
    private $templateName = 'main.tpl';

    public function __construct()
    {
        parent::__construct();

        $this->setTemplateDir(TPL_DIR . '/raw');
        $this->setCompileDir(TPL_DIR . '/compile');
        $this->setConfigDir(TPL_DIR . '/configs');
        $this->setCacheDir(TPL_DIR . '/cache');

        $this->caching = Smarty::CACHING_LIFETIME_CURRENT;

    }
}