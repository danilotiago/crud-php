<?php

    try 
    {
        $health_connection = new PDO("mysql:host=localhost;dbname=project", 'root', 'profissional01',[PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]);
    }
    catch( PDOException $e )
    {
        echo "ERRO" . PHP_EOL . $e->getMessage();
    }