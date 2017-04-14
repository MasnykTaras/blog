<?php

class Db
{

    public static function getConnection(array $config)
    {
        return mysqli_connect($config['db_host'], $config['db_user'], $config['db_password'], $config['db_name']);
    }

}