<?php

require_once(SMARTY_DIR . 'Smarty.class.php');

class Template extends Smarty
{
    protected $frameFileNames = array(
        'frame' => 'frame.tpl',
        'frameHeader' => 'frameHeader.tpl',
        'frameFooter' => 'frameFooter.tpl',
        'frameInclCSS' => 'frameInclCSS.tpl',
        'frameInclJS' => 'frameInclJS.tpl',
        'frameMeta' => 'frameMeta.tpl',
        'frameNavigation' => 'frameNavigation.tpl'
    );

    public function __construct()
    {
        parent::__construct();

        $this->setTemplateDir(TPL_DIR . '/raw');
        $this->setCompileDir(TPL_DIR . '/compile');
        $this->setConfigDir(TPL_DIR . '/configs');
        $this->setCacheDir(TPL_DIR . '/cache');

        $this->caching = 0;
            //Smarty::CACHING_LIFETIME_CURRENT;

        $this->assign($this->frameFileNames);
    }

    public function getFrameFilename()
    {
        return $this->frameFileNames['frame'];
    }
}