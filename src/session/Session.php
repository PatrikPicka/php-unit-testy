<?php

namespace App\Session;
use App\Session\SessionInterface;

class Session implements SessionInterface
{
    private $isStarted = false;

    public function isStarted() : bool
    {
            $this->isStarted = session_status() === PHP_SESSION_ACTIVE;

        return $this->isStarted;
    }

    public function start() : bool
    {
        if ($this->isStarted){
            return true;
        }elseif(session_status() === PHP_SESSION_ACTIVE){
            $this->isStarted = true;
            return true;
        }

        session_start();
        $this->isStarted = true;
        return true;
    }

    public function has($key) : bool
    {
        if(isset($_SESSION[$key])){
            return true;
        }

        return false;
    }

    /**
     * Returns mixed value or null if not found inside session
     */
    public function get($key, $default = null)
    {
        if ($this->has($key)){
            return $_SESSION[$key];
        }
        return $default;
    }

    public function set($key, $value) : bool
    {
        $_SESSION[$key] = $value;

        return true;
    }

    public function clear() : void
    {
        $_SESSION = [];
    }

    public function remove($key) : bool
    {
        if($this->has($key)){
            unset($_SESSION[$key]);
        }

        return true;
    }
}