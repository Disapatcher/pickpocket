<?php

class dbConnector
{
    /**
     * @var string
     */
    private $server;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $database;

    /**
     * @var mysqli
     */
    private $connection;

    public function __construct($server, $username, $password, $database = "")
    {
        $this->server = filter_var($server, FILTER_SANITIZE_STRING);
        $this->username = filter_var($username, FILTER_SANITIZE_STRING);
        $this->password = $password;
        $this->database = filter_var($database, FILTER_SANITIZE_STRING);
    }

    /**
     * Connects to the database
     *
     * @throws Exception
     */
    public function connect()
    {
        $this->connection = new mysqli($this->server, $this->username, $this->password, $this->database);
        if ($this->connection->connect_error) {
            throw new \Exception('SQL connection failed: ' . $this->connection->connect_error);
        }
    }

    /**
     * @return mixed
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param $sql
     * @return bool|mysqli_result
     */
    public function query($sql)
    {
        return $this->connection->query(mysqli_real_escape_string($this->connection, $sql));
    }
}
