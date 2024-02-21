<?php


class BaseConnect
{
    public function Connect($database, $hostname, $password, $name) {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->connect = mysqli_connect($hostname, $name, $password, $database);
        return $this->connect;
    }
}