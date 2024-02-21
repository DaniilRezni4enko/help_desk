<?php

class BaseModel
{
    public function __construct() {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/settings/setting.php';
        $connect = new BaseConnect();
        $this->link = $connect->Connect(DATABASE, HOSTNAME, PASSWORD, NAME);
    }
    public function StartCreateTable() {
        $sql = "CREATE TABLE admins (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, login VARCHAR(50), email VARCHAR(50), password VARCHAR(50));";
        $request = mysqli_query($this->link, $sql);
        $sql = "CREATE TABLE users (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, login VARCHAR(50), password VARCHAR(50), post VARCHAR(1000), name VARCHAR(50), surname VARCHAR(50), patronymic VARCHAR(50), messages VARCHAR(50));";
        $request = mysqli_query($this->link, $sql);
        $sql = "CREATE TABLE messages (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, reason VARCHAR(500), text VARCHAR(1000), autor VARCHAR(50), date DATE)";
        $request = mysqli_query($this->link, $sql);
        $sql = "CREATE TABLE code ( code VARCHAR(100))";
        $request = mysqli_query($this->link, $sql);
        $sql = "";
    }

    public function ChekCode() {
        $sql = "SELECT code FROM code";
        $result = mysqli_query($this->link, $sql);
        $code = mysqli_fetch_array($result)[0];
        return $code;
    }
}