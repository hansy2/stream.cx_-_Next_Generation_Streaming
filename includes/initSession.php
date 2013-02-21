<?php

Session::start();

if (!Session::get('UserAgent'))
    Session::set('UserAgent', $_SERVER['HTTP_USER_AGENT']);
else
    if (Session::get('UserAgent') != $_SERVER['HTTP_USER_AGENT']) Session::destroy();

if (!Session::get('ClientIP'))
    Session::set('ClientIP', $_SERVER['REMOTE_ADDR']);
else
    if (Session::get('ClientIP') != $_SERVER['REMOTE_ADDR']) Session::destroy();

if (!Session::get('Expires'))
    Session::set('Expires', time()+(SESSION_TIMEOUT*60));
else {
    if (Session::get('Expires') < time()) Session::destroy();
    else Session::set('Expires', time()+(SESSION_TIMEOUT*60));
}