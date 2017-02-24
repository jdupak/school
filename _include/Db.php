<?php

class Db
{
    private static $connection;
    private static $settings = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_EMULATE_PREPARES => false);

    static function connect($host, $user, $password, $database)
    {
        if (!isset(self::$connection)) {
            self::$connection = new PDO(
                "mysql:host=$host;dbname=$database", $user, $password, self::$settings
            );
        }
    }

    static function queryAll($sql, $parametres = array())
    {
        $return = self::$connection->prepare($sql);
        $return->execute($parametres);
        return $return->fetchAll();
    }

    static function querysingle($sql, $parametres = array())
    {
        $return = self::queryOne($sql, $parametres);
        return $return[0];
    }

    static function queryOne($sql, $parametres = array())
    {
        $return = self::$connection->prepare($sql);
        $return->execute($parametres);
        return $return->fetch();
    }

    static function query($sql, $parametres = array())
    {
        $return = self::$connection->prepare($sql);
        $return->execute($parametres);
        return $return->rowCount();
    }
    public static function getLastId()
    {
        return self::$connection->lastInsertId();
    }
}