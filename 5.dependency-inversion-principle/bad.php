<?php

/**********************************
* MySQLConnection is the low level module while the PasswordReminder is high level.
* The PasswordReminder class is being forced to depend on the MySQLConnection class.
* This violates Depend on Abstraction not on concretions principle.
*********************************/
class PasswordReminder {
    private $dbConnection;

    /**********************************
    * Later if you were to change the database engine,
    * you would also have to edit the PasswordReminder class
    * and thus violates Open-closed principle.
    *********************************/
    function __construct(MySQLConnection $dbConnection) {
        $this->dbConnection = $dbConnection;
    }
    
    public function remind() {
        $this->dbConnection->connect();
        // do other stuff
    }
}

class MySQLConnection {
    public function connect() {
        echo "Database connection\n";
    }
}

$conn = new MySQLConnection();
$passwordReminder = new PasswordReminder($conn);
$passwordReminder->remind();
