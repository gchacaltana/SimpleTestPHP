<?php

/**
 * Database Connection Class
 *
 * @author Gonzalo Chacaltana Buleje <gchacaltanab@gmail.com>
 * @name DatabaseConnection
 * @category class
 */
Class DatabaseConnection
{

    private $_hostname = null;
    private $_user = null;
    private $_password = null;
    private $_connection = null;
    private $_driver = null;

    public function getHostname()
    {
        return $this->_hostname;
    }

    public function setHostname($hostname)
    {
        $this->_hostname = $hostname;
    }

    public function getUser()
    {
        return $this->_user;
    }

    public function setUser($user)
    {
        $this->_user = $user;
    }

    public function getPassword()
    {
        return $this->_password;
    }

    public function setPassword($password)
    {
        $this->_password = $password;
    }

    public function getConnection()
    {
        return $this->_connection;
    }

    public function setConnection($connection)
    {
        $this->_connection = $connection;
    }

    public function getDriver()
    {
        return $this->_driver;
    }

    public function setDriver($driver)
    {
        $this->_driver = $driver;
    }

    /**
     * Constructor de la clase
     */
    public function __construct($hostname, $user, $password, $driver)
    {
        $this->setHostname($hostname);
        $this->setUser($user);
        $this->setPassword($password);
        $this->setDriver($driver);
    }

    /**
     * Metodo de conexión.
     * @param string $database nombre de la base de datos.
     */
    public function connection($database)
    {
        if (!is_null($this->getDriver())) {
            switch ($this->getDriver()) {
                case 'mysql':
                    return $this->mysqlConnection($database);
                    break;
                default:
                    throw new Exception("Invalid Driver");
                    break;
            }
        }
    }

    /**
     * Metodo de conexion para MySQL Server
     * @param string $database nombre de la base de datos MySQL
     */
    private function mysqlConnection($database)
    {
        if (is_null($this->getConnection())) {
            $objConecction = mysql_connect($this->getHostname(), $this->getUser(), $this->getPassword());

            if (!isset($objConecction)) {
                throw new Exception("No se pudo conectar al servidor MySQL");
            }
            $this->setConnection($objConecction);

            if (!mysql_select_db($database, $this->getConnection())) {
                throw new Exception("No se pudo seleccionar la base de datos " . $database);
            }
        }
        return $this->getConnection();
    }

    /**
     * Metodo para ejecutar sentencias SQL(Querys).
     * @param string $sql sentencia SQL a ejecutar.
     * @return array lista de base de datos.
     */
    public function querySelect($sql)
    {
        if (!is_null($this->getDriver())) {
            switch ($this->getDriver()) {
                case 'mysql':
                    return $this->mysqlQuerySelect($sql);
                    break;
                default:
                    throw new Exception("Invalid Driver");
                    break;
            }
        }
    }

    /**
     * Metodo para ejecutar sentencias SQL(Querys) en MySQL Server.
     * @param string $sql sentencia SQL a ejecutar.
     * @return array lista de base de datos.
     */
    private function mysqlQuerySelect($sql)
    {
        $_result = mysql_query($sql);

        if (!$_result) {
            throw new Exception('Error SQL : ' . $sql);
        }

        $data = array();

        while ($row = mysql_fetch_assoc($_result)) {
            $data[] = $row;
        }

        mysql_free_result($_result);

        return $data;
    }

    /**
     * Metodo para cerrar conexion a base de datos.
     * @return boolean
     */
    public function databaseDisconnect()
    {
        if (!is_null($this->getDriver())) {
            switch ($this->getDriver()) {
                case 'mysql':
                    return $this->mysqlDatabaseDisconnect();
                    break;
                default:
                    throw new Exception("Invalid Driver");
                    break;
            }
        }
    }

    /**
     * Metodo para cerrar conexion a base de datos MySQL.
     * @return void
     */
    public function mysqlDatabaseDisconnect()
    {
        if (!is_null($this->getConnection()))
            return mysql_close($this->getConnection());
    }

}
