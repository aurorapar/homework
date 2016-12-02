<?php

    if(PHP_OS != 'WINNT')
    {
        header('Location: localhost/capstone/windowsonly.php');
    }
    
    function displayConsole(&$output, $file)
    {
        $output = fopen($file, 'r');
        sleep(5);
        displayConsole($output, $file);
    }
    
    function program($toRun)
    {
        exec(escapeshellcmd($toRun), $output, $returnVal);
        return $returnVal;
    }
    
    function startServer($name, $toRun)
    {
        try
        {

            $descriptorspec = array (
                0 => array("pipe", "r"),
                1 => array("pipe", "w"),
            );
        
            if ( is_resource( $prog = proc_open($toRun, $descriptorspec, $pipes, NULL) ) )
            {
                $ppid = proc_get_status($prog)['pid'];
            }
            $output = array_filter(explode(" ", shell_exec("wmic process get parentprocessid,processid | find \"$ppid\"")));
            array_pop($output);
            $pid = end($output);

            return $pid;
            
            /*
            pclose(popen('start "' . $name . '" ' . $toRun, 'r'));
            print "Server successfully started! You should see a console.<br>";
            */
        }
        catch (Exception $ex)
        {
            print "Failed to load server.<br>$ex";
        }
    }
    
    function serverRunning()
    {
        $apps = Array();
        exec("tasklist 2>NUL", $apps);
        foreach($apps as $app)
        {
            if(strpos($app, 'java'))
            {
                return true;
            }
        }
        return false;
    }
    
    function pidRunning($pid)
    {
        $apps = Array();
        exec("tasklist 2>NUL", $apps);
        foreach($apps as $app)
        {
            if(strpos($app, $pid))
            {
                return true;
            }
        }
        return false;
    }
    
    function killServer($pid)
    {
        program('taskkill /f /FI "PID eq ' . $pid . '"');                        
    }
    
    function getServerSetting($connection, $table, $setting)
    {
        // Will only work for single attribute, not SELECT *
        $setting = $connection->query("SELECT $setting FROM $table");
        foreach($setting as $result)
        {
            return $result[0];
        }
    }
    
    function setServerSetting($connection, $table, $property, $value)
    {
        $connection->query("UPDATE $table SET $property='$value';");
    }
    
    function testInstall($server)
    {
        $settings = Array();
        
        
        
        array_push($settings, getServerSetting($server, 'mcinstall', 'serviceName')); 
        array_push($settings, getServerSetting($server, 'mcinstall', 'installPath')); 
        array_push($settings, getServerSetting($server, 'mcinstall', 'installVersion')); 
        
        if($settings[0] and $settings[1] and $settings[2])
        {
            return $settings;
        }
        else
        {
            return false;
        }
    }
    
    function testInstallDir($directory)
    {
        if(!is_dir($directory))
        {
            return true;
        }
        else
        {
            if(strpos($directory ,"windows") or strpos($directory, "Program Files"))
            {
                return false;
            }
            $files = scandir($directory);
            if(count($files) > 2)
            {
                foreach($files as $file)
                {
                    $testString = $directory . $file;
                    if(is_file($testString))
                    {
                        if(strpos($testString, 'minecraft_server') and endsWith($file, '.jar'))
                        {
                            return true;
                        }
                    }
                }
                return false;
            }
        }
        return true;
    }
                
                
    function endsWith($string, $phrase) 
    {
        return $phrase === "" || (($temp = strlen($string) - strlen($phrase)) >= 0 && strpos($string, $phrase, $temp) !== false);
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