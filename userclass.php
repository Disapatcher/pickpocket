<?php


class userclass
{
    public $user_id;

    private $username;

    private $userteam_id;

    /**
     * @var dbConnector
     */
    private $connector;

    /**
     * userclass constructor.
     *
     * @param dbConnector $connector
     */
    public function __construct(dbConnector $connector)
    {
        $this->connector = $connector;
    }

    /**
     * @param $user_id
     *
     * @return array
     */
    public function getuserinfo($user_id)
    {
        return $this->connector->query(sprintf('SELECT * FROM member WHERE id = %d', $user_id))->fetch_assoc();
    }

    /**
     * @return bool|mysqli_result
     */
    public function createNew()
    {
        return $this->connector->query(sprintf("INSERT INTO member (Name, TID) VALUES (%s , %d)", $this->getUserName(), $this->getUserteamId()));
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     *
     * @return userclass
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserteamId()
    {
        return $this->userteam_id;
    }

    /**
     * @param integer $userteam_id
     *
     * @return userclass
     */
    public function setUserteamId($userteam_id)
    {
        $this->userteam_id = $userteam_id;

        return $this;
    }
}