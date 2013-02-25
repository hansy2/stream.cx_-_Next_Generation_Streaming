<?php

require_once(LIB_DIR . '/Template.class.php');

class TPL_Frame extends Template
{
    private $outputBuffer;

    public function __construct(stdClass $langObject)
    {
        parent::__construct();
        $this->assign('language', $langObject);
        $this->initFrame();
    }

    private function initFrame()
    {
        $this->outputBuffer = $this->fetch(parent::getFrameFilename());
    }

    public function returnTemplate()
    {
        return $this->outputBuffer;
    }

}