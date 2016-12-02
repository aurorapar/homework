<?php include('aurora-lib.php'); ?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Miners Haven</title>
      <link href="./css/minecraft.css" media="all" rel="Stylesheet" type="text/css" />
      <!-- JavaScript is the default scripting language in HTML5 and in all modern browsers -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="js/minecraft.js"></script>
</head>

<body>
    <header>
        <ul id="header-list">
            <li><a href="./index.php">Home Portal</a></li>
            <li><a href="./administration.php">Administration</a></li>
        </ul>
        
    </header>
    
    <ul id="sidebar">
        <li class="content-element"><a class="content-element-link" href="readme.php">README</a></li>
    </ul>
        
    <div id="subject">- Boot -</div>
    <div id="content">
        <?php
            $server = sqlConnect('localhost','minecraftserver','root','');
            $serviceName = getServerSetting($server, 'mcinstall', 'serviceName');
            $directory = getServerSetting($server, 'mcinstall', 'installPath');
                        
            $pid = getServerSetting($server, 'startup', 'pid');
            if($pid == NULL)
            {
                $apps = Array();
                exec("tasklist 2>NUL", $apps);
                foreach($apps as $app)
                {
                    if(strpos($app, 'java'))
                    {
                        print "A previous server may be running, but there is no PID saved. Trying to start server.<br>";
                    }
                }
                $pid = startServer($serviceName, $directory . "startserver.bat");
                setServerSetting($server, 'startup', 'pid', $pid);
            }
            else
            {
                $apps = Array();
                exec("tasklist 2>NUL", $apps);
                $serverRunning = false;
                foreach($apps as $app)
                {
                    if(strpos($app, (string)$pid))
                    {
                        print "A previous server is running with PID " . $pid ." <br>Killing and then restarting it.<br>";
                        program('taskkill /f /FI "PID eq ' . $pid . '"');
                        $pid = startServer($serviceName, $directory . "startserver.bat");
                        setServerSetting($server, 'startup', 'pid', $pid);
                        $serverRunning = true;
                        break;
                    }
                }
                if(!$serverRunning)
                {
                    print "A server wasn't detected. Overwriting saved PID.<br>";
                    $pid = startServer($serviceName, $directory . "startserver.bat");
                    setServerSetting($server, 'startup', 'pid', $pid);
                }                    
            }
            
        ?>
            
            <p>
            
            <ul><li class="content-element"><a class="content-element-link" href="status.php">Server Status</a></li></ul>
        
        
    </div>
    <footer>
    </footer>
</body>
</html>