<?php
/**
 * Session
 * -Static Session Wrapper Class
 * -Convenient Methods (do Error Checking),
 * -Measures To Prevent Session Hijacking,
 * -Handles Single Variables or Associative
 *   Arrays through autodetect the type
 *   passed in.
 * @package sandboxphp
 * @author hskitts
 * @copyright 2012
 * @version $Id$
 * @access public
 * @link https://gist.github.com/hskitts/4128373
 */
class Session{
    /**
     * Session::start()
     * Start A Secure Session
     * Helps Prevent Session Hijacking
     * @return void
     */
    public static function start(){
        if (session_id() == false){
            session_start();
            session_regenerate_id();//vs session hijacking
        }
    }

    /**
     * Session::set()
     * Sets Session Variables
     * Handles Arrays and Single Variables by detecting $key type
     * in the case of $key being an array:
     * $value will be an array of key value
     * pairs in the $key array
     * @param mixed $key
     * @param mixed $value  if key is an array $value must be array
     * @return void
     */
    public static function set($key, $value) {
        if (is_array($value)){  //if value is an array update and existing variable
            $ARRAY = $_SESSION[$key]; //save the current session array
            foreach($value as $k => $v){ //for each key=value pair in the value passed in
                $ARRAY[$k] = $v; //push
            }
            $_SESSION[$key]  = $ARRAY;
            return;
        }
        $_SESSION[$key] = $value;
    }

    /**
     * Session::get()
     * Get The Value Of A Session Variable
     * (Handles Arrays As well)
     * @param mixed $key  session variable to get
     * @param bool $key2  only to access an array
     * @return bool
     */
    public static function get($key,$key2=false){
        if(isset($_SESSION[$key])){
            if($key2){
                return $_SESSION[$key][$key2];
            }else{
                return $_SESSION[$key];
            }

        }else{
            return false;
        }
    }

    /**
     * Session::del()
     * Delete A Session Variable
     * (This Does Not Destroy The
     * Whole Session)
     * @param mixed $key
     * @param bool $key2
     * @return void
     */
    public static function del($key,$key2=false){
        if(isset($_SESSION[$key])){
            if($key2){
                unset($_SESSION[$key][$key2]);
            }else{
                unset($_SESSION[$key]);
            }
        }
    }

    /**
     * Session::destroy()
     * Destroy The Current Session With All Variables
     * @return void
     */
    public static function destroy(){
        if (session_id() == true){
            session_destroy();
        }
    }

    /**
     * Session::dump()
     * Display The Current $_SESSION Array
     * (for debugging purposes)
     * @return void
     */
    public static function dump(){
        if (session_id() == true){
            echo '<pre>';
            print_r($_SESSION);
            echo '</pre>';
        }
    }
}