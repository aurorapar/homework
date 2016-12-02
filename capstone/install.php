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
        
    <div id="subject">- Install -</div>
    <div id="content">
        <?php
            $server = sqlConnect('localhost','minecraftserver','root','');
            $installSettings = testInstall($server);
        ?>
            
            
        <div id="installation">
            Server installation already exists.<br><br>
            Service Name: <?=$installSettings[0];?><br>
            Install Path: <?=$installSettings[1];?><br>
            Install Version: <?=$installSettings[2];?><br><br>

            <ul><li id="showInstallForm" class="content-element"><a class="content-element-link">Reinstall?</a></li></ul>
        </div>
        
        <form id="settingsinput" method="post" action="doinstall.php">
        <?php 
            $javaFound = false;
            if(!is_dir("C:\\Program Files\\Java\\") and !is_dir("C:\\Program Files (x86)\\Java\\"))
            {
                print "<em>Minecraft requires a valid installation of java. We did not detect one on your system.<br>Please go to <a href=\"https://java.com\">https://java.com</a> before continuing.<p></em>";
            }
        ?>
            Service Name<br>
            <input type="text" id="serviceName" name="serviceName" value="minecraft-server"><br><br>
            Install Path<br>
            <input type="text" id="installPath" name="installPath" value="C:\minecraft\"><br><br>
            Install Version<br>
            <input type="text" id="installVersion" name="installVersion" value="1.10.2"><br><br>
            <input type="submit" value="Install">
            <p>
        </form>
        
        <?php
            if($installSettings)
            {
                echo "<script> hideForm(); </script>";                
            }
            else
            {
                echo "<script> hideInstallation(); </script>";
            }
        ?>
        
        
        
    </div>
    <footer>
    </footer>
</body>
</html>