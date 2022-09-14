<?php

class CRMSUser 
{
    /**
     * Top-level object for those who can login to the system
     */

    public $isAdmin = false;
    public $isActive = true;

    public function __construct()
    {
        
    }

    public function login(string $username, string $password) {

    }

    public function logout(string $username) {
        
    }
}