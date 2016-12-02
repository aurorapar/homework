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
            
            $action = '';
            if(isset($_GET['action']))
            {
                $action = $_GET['action'];
            }
                        
            if(!empty($action))
            {
                $pid = getServerSetting($server, 'startup', 'pid');
                if($pid == NULL)
                {
                    print "PID is null<br>";
                    if(serverRunning())
                    {
                        print "A previous server may be running, but there is no PID saved.<br>";
                        if($action == 'kill')
                        {
                            print "Check task manager for running java applications.<br>We can not determine if these are Minecraft servers.<br>";
                        }
                        if($action == 'boot')
                        {
                            $pid = startServer($serviceName, $directory . "startserver.bat");
                            setServerSetting($server, 'startup', 'pid', $pid);
                        }                            
                    }                    
                }
                else
                {
                    if(pidRunning($pid))
                    {
                        if($action == 'boot')
                        {
                            if(!serverRunning())
                            {
                                print "A server wasn't detected. Overwriting saved PID.<br>";
                                $pid = startServer($serviceName, $directory . "startserver.bat");
                                setServerSetting($server, 'startup', 'pid', $pid);
                            }
                            else
                            {
                                print "A previous server is running with PID " . $pid ." <br>";
                            }
                        }
                        if($action == 'kill')
                        {
                            killServer($pid);
                            sleep(1);
                            if(pidRunning($pid))
                            {
                                print "Server was not killed successfully.<br>PID: $pid<br>";
                            }
                            else
                            {
                                print "Server was killed successfully.<br>PID: $pid<br>";
                            }
                        }
                    }
                    else
                    {
                        print "Server started. PID overwritten.<br>";
                        $pid = startServer($serviceName, $directory . "startserver.bat");
                        setServerSetting($server, 'startup', 'pid', $pid);
                    }
                    
                }
            }
            
        ?>
        
            <p>
            <form id="bootkill" method="get" action="boot.php">
                Boot Server: <input type="radio" name="action" value="boot"><br>
                Kill Server: <input type="radio" name="action" value="kill"><br>
                <input type="submit" value="Server Action">
            </form>
            
            <p>
            
            <ul><li id="showInstallForm" class="content-element"><a class="content-element-link" href="status.php">Server Status</a></li></ul>
        
        
    </div>
    <footer>
    </footer>
</body>
</html>