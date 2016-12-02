<?php

    // These values can be EMPTY strings and ISSET will return true!
    
    $country = $_POST['country'];
    $city = $_POST['city'];
    $population = $_POST['population'];
    
    if(!strlen($country) and !strlen($city))
    {
        echo "No location selected.<br>";
    }
    else
    {   
        $statement = "";
        if(strlen($country) and strlen($city))
        {
            $statement = $statement . "
                SELECT cities.name 
                FROM `cities` 
                WHERE name='$city' 
                INNER JOIN countries 
                ON cities.country_code=countries.code";
        }
        else
        {
            $statement = $statement . "* FROM `cities` WHERE name='$city' AND ";
        }
        
        $server = sqlConnect('localhost','world','root','');
        $country = getServerSetting($server, $statement);
        
        echo $country;
    }
    
    
    function getServerSetting($connection, $statement)
    {
        $data = "";
        $setting = $connection->query($statement);
        echo($setting);
        foreach($setting as $result)
        {
            return $result['name'];
        }
    }
    
    function sqlConnect($server, $db, $user, $pass)
    {
        if(!isset($pass))
        {
            $pass="";
        }
        try
        {
            return new PDO("mysql:dbname=$db;host=$server", 
                            $user, $pass
                           );
        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }    
    }
?>