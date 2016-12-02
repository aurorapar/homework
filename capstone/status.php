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
        
    <div id="subject">- Status -</div>
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
                        print "A previous server may be running, but there is no PID saved.<br>";
                        print '<img src="images/unsure.png" alt="unsure">';
                    }
                }
            }
            else
            {
                if(pidRunning($pid))
                {
                        print "Server up! <br>";
                        print '<img src="images/running.png" alt="running">';
                }
                else
                {
                    print "Server down!<br>";
                    print '<img src="images/down.png" alt="down">';
                }                    
            }
            
        ?>
            
            <p>
            
            <ul><li class="content-element"><a class="content-element-link" href="reboot.php">Reboot Server</a></li></ul>
        
        
    </div>
    <footer>
    </footer>
</body>
</html>