<?php

require_once 'self.php';

class Session
{
    private static $protectedKeys = array('session.home_url', 'session.user_agent');

    private function __construct()
    {
        if ( session_id() === '' )
        {
            ini_set('session.use_trans_sid', '0');
            ini_set('session.use_cookies', '1');
            ini_set('session.use_only_cookies', '1');
        }
    }

    public function getName()
    {
        return md5(self_data($_SERVER['PHP_SELF']));
    }

    public function start()
    {
        session_name($this->getName());

        $cookie = session_get_cookie_params();
        $cookie['httponly'] = true;

        session_set_cookie_params($cookie['lifetime'], $cookie['path'], $cookie['domain'], $cookie['secure'], $cookie['httponly']);

        session_start();
    }

    public function regenerate()
    {
        session_regenerate_id();

        $_SESSION = array();

        if ( isset($_COOKIE[$this->getName()]) )
        {
            $_COOKIE[$this->getName()] = $this->getId();
        }
    }

    public function getId()
    {
        return session_id();
    }

    public function set( $key, $value )
    {
        if ( in_array($key, self::$protectedKeys) )
        {
            throw new Exception('Attempt to set protected key');
        }

        $_SESSION[$key] = $value;
    }

    public function get( $key )
    {
        if ( !isset($_SESSION[$key]) )
        {
            return null;
        }

        return $_SESSION[$key];
    }

    public function isKeySet( $key )
    {
        return isset($_SESSION[$key]);
    }

    public function delete( $key )
    {
        unset($_SESSION[$key]);
    }
}

?>