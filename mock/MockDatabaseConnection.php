<?php

/**
 * Mock Database connection - Mock SimpleTest Framework
 *
 * @author Gonzalo Chacaltana Buleje <gchacaltanab@gmail.com>
 * @name MockDatabaseConnection
 * @category class
 */
class MockDatabaseConnection extends MySQLConnection
{

    public $mock;
    protected $mocked_methods = array('databaseConnection', 'query');

    function MockDatabaseConnection()
    {
        $this->mock = new SimpleMock();
        $this->mock->disableExpectationNameChecks();
    }

    function DatabaseConnection()
    {
        $args = func_get_args();
        $result = &$this->mock->invoke("DatabaseConnection", $args);
        return $result;
    }

    function query($sql)
    {
        $args = func_get_args();
        $result = &$this->mock->invoke("query", $args);
        return $result;
    }

}