<?php

    function db_connect()
    {
        $hostName = "localhost";
        $databaseUsername = "root";
        $databasePassword = NULL;
        $databaseName = "pet_lover";
        
        $connection_link = @mysqli_connect($hostName,$databaseUsername,$databasePassword,$databaseName)
                            or
                            die("Database Connection Error!");
        
        return $connection_link;
    }
    
    $con = db_connect();


?>