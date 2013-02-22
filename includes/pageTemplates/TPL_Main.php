<?php

require_once(LIB_DIR . '/Template.php');
require_once(P_TPL_DIR . '/FrameInterface.php');

class TPL_Main extends Template implements Frame
{
    private $tplFilename = 'main.tpl';
    private $outputBuffer;

    public function __construct($bool, array $languageArray)
    {
        parent::__construct();
        $this->assign($languageArray);
        $this->initTemplate();
        if (is_bool($bool)) {
            $this->initFrame($bool);
        }
        else {
            throw new Exception('The first parameter must be boolean!');
        }
    }

    public function initTemplate()
    {
        $this->outputBuffer = $this->fetch($this->tplFilename);
    }

    public function initFrame($bool)
    {
        if ($bool) {
            $this->assign('frameContent', $this->fetch($this->tplFilename));
            $this->outputBuffer = $this->fetch(parent::getFrameFilename());
        }
    }

    public function returnTemplate() {
        return $this->outputBuffer;
    }

}