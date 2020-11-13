<?php

class DB
{
    private static $instance = null;
    private $link;

    private $dbname = '';
    private $host = 'localhost';
    private $user = '';
    private $password = '';
    private $driver = 'pgsql';

    private function __construct()
    {
        $this->link = new PDO(
            "{$this->driver}:host={$this->host};dbname={$this->dbname}",
            $this->user,
            $this->password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }

    private function __clone(){}

    private function __wakeup(){}

    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new DB;
        }
        return self::$instance;
    }

    public function getLink()
    {
        return $this->link;
    }
}
