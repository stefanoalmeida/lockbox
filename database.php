<?php

class DB {

    private $connect;

    public function __construct($config)
    {
        $this->connect = new PDO($this->getDsn($config));
    }

    private function getDsn($config) {
        $driver = $config["driver"];
        unset ($config["driver"]);

        $dsn = $driver . ":" . http_build_query($config, '', ';');

        if ($driver == "sqlite") {
            $dsn = $driver . ":" . $config["database"];
        }

        return $dsn;
    }

    public function query ($query, $class = null, $params = [])
    {
        $prepare = $this->connect->prepare($query);
        if ($class) {
            $prepare->setFetchMode(PDO::FETCH_CLASS, $class);
        }
        $prepare->execute($params);

        return $prepare;
    }
}

$DB = new DB(config('database'));