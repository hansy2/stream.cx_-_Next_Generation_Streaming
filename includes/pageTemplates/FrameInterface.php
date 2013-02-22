<?php

interface Frame {
    public function initTemplate();
    public function initFrame($bool);
    public function returnTemplate();
}