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
        
    <div id="subject">- Installation Results -</div>
    <div id="content">
        <?php 
            $server = sqlConnect('localhost','minecraftserver','root','');
            $installSettings = testInstall($server);            
            
            if(isset($_POST['installVersion']) and isset($_POST['installPath']) and isset($_POST['serviceName']))
            {
                $serviceName = $_POST['serviceName'];
                $installPath = addslashes($_POST['installPath']);
                $installVersion = $_POST['installVersion'];
            
                $failedInstall = false;
                if(testInstallDir($installPath))
                {
                    try
                    {
                        @mkdir($installPath);
                    }
                    catch (Exception $ex) {}
                    
                    if(!is_file($installPath . 'minecraft_server.' . $installVersion))
                    {
                        try
                        {
                            echo '<script> alert("The server application will be downloaded when you click OK. This may take a moment.") </script>'; 
                            $fileURL = 'https://s3.amazonaws.com/Minecraft.Download/versions/' . $installVersion. '/minecraft_server.' . $installVersion . '.jar';
                            file_put_contents($installPath . "minecraft_server." . $installVersion . ".jar", fopen($fileURL, 'r'));
                        }
                        catch (Exception $ex)
                        {
                            $failedInstall = true;
                        }
                    }                
                }
                if(!$failedInstall)
                {
                    setServerSetting($server, 'mcinstall', 'installPath', $installPath);
                    setServerSetting($server, 'mcinstall', 'serviceName', $serviceName);
                    setServerSetting($server, 'mcinstall', 'installVersion', $installVersion);
                    print "Installation successful.<br><p>";
                }
                else
                {
                    print "Failed to install.<br>";
                }          
            }
            else
            {
                print "No settings passed.<br>";
            }
        ?>
        <P>
        You must configure your server before it will run.<br>
        <ul><li class="content-element"><a class="content-element-link" href="configure.php">Set Config</a></li></ul>
        
    </div>
    <footer>
    </footer>
</body>
</html>