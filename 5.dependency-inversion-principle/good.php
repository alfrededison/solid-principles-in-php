<?php

/**********************************
* The PasswordReminder class should not care what database your application uses
* Instead of directly type-hinting MySQLConnection class in the constructor of the PasswordReminder,
* we instead type-hint the interface and no matter the type of database your application uses,
* the PasswordReminder class can easily connect to the database without any problems and OCP is not violated.
*********************************/
class PasswordReminder {
    private $dbConnection;

    function __construct(DBConnectionInterface $dbConnection) {
        $this->dbConnection = $dbConnection;
    }
    
    public function remind() {
        $this->dbConnection->connect();
        // do other stuff
    }
}

interface DBConnectionInterface {
    public function connect();
}

/**********************************
* Now both the high level and low level modules depend on abstraction
*********************************/
class MySQLConnection implements DBConnectionInterface {
    public function connect() {
        echo "Mysql database connection\n";
    }
}
class MongoDbConnection implements DBConnectionInterface {
    public function connect() {
        echo "MongoDB database connection\n";
    }
}

$mySqlConn = new MySQLConnection();
$passwordReminder = new PasswordReminder($mySqlConn);
$passwordReminder->remind();

$mongoConn = new MongoDbConnection();
$passwordReminder = new PasswordReminder($mongoConn);
$passwordReminder->remind();
