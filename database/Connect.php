<?php

class Connect
{
    protected $config;

    public function __construct() {
        $this->setConfig();
        return $this->getPDOConnection();
    }

    public function getConfig($config) {
        return $this->config[$config];
    }

    public function getPDOConnection() {
        $dsn = 'mysql:host='.$this->getConfig('HOST').';dbname='.$this->getConfig('DB_NAME');
        try {
            $pdo = new PDO($dsn, $this->getConfig('DB_USER'), $this->getConfig('DB_PASSWORD'));
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch(PDOException $ex) {
            print 'Erro: '.$ex->getMessage();
        }
    }

    public function setConfig() {
        $this->config = include 'config.php';
    }
}