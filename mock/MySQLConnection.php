<?php

/**
 * MySQL Connection Class
 *
 * @author Gonzalo Chacaltana Buleje <gchacaltanab@gmail.com>
 * @name MySQLConnection
 * @category class
 */
require_once(dirname(__FILE__) . '/DatabaseConnection.php');

class MySQLConnection extends DatabaseConnection
{

    private $_connection = null;
    private $_driver = "mysql";

    public function getDriver()
    {
        return $this->_driver;
    }

    public function getConnection()
    {
        return $this->_connection;
    }

    public function setConnection($connection)
    {
        $this->_connection = $connection;
    }

    public function __construct($hostname, $user, $password)
    {
        parent::__construct($hostname, $user, $password, $this->getDriver());
    }

    public function databaseConnection($database)
    {
        $objConnection = parent::connection($database);
        $this->setConnection($objConnection);
    }

    public function databaseDisconnect()
    {
        if (!parent::databaseDisconnect())
            echo "No se pudo cerrar la conexion a MySQL.";

        echo "MySQL Connection closed";
    }

    public function query($sql)
    {
        return parent::querySelect($sql);
    }

}