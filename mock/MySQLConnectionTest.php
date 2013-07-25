<?php

/**
 * MySQL Connection Test with Mocks - SimpleTest Framework 
 *
 * @author Gonzalo Chacaltana Buleje <gchacaltanab@gmail.com>
 * @name MySQLConnectionTest
 * @category UnitTestCase
 */
require_once(dirname(__FILE__) . '/../simpletest/autorun.php');
require_once(dirname(__FILE__) . '/MySQLConnection.php');
require_once(dirname(__FILE__) . '/MockDatabaseConnection.php');

Mock::generate('MySQLConnection');

class MySQLConnectionTest extends UnitTestCase
{

    function testConnect()
    {
        $connection = new MockDatabaseConnection();
    }

}
