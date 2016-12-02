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
        
    <div id="subject">- Configure -</div>
    <div id="content">
        <?php
            $server = sqlConnect('localhost','minecraftserver','root','');
            
            $maxMem = getServerSetting($server, 'startup', 'maxmem');
            $minMem = getServerSetting($server, 'startup', 'minmem');
            $nogui = getServerSetting($server, 'startup', 'nogui');
            
            if($nogui)
            {
                $nogui = 'True';
            }
            else
            {
                $nogui = 'False';
            }
            
            $directory = getServerSetting($server, 'mcinstall', 'installPath');
            $version = getServerSetting($server, 'mcinstall', 'installVersion');
            $serviceName = getServerSetting($server, 'mcinstall', 'serviceName');
            
            if(!is_file($directory . 'startserver.bat'))
            {
                $startup = "java -Xmx" . $maxMem . " -Xms" . $minMem . " -jar " . $directory . "minecraft_server." . $version . ".jar";
                if($nogui == 'True')
                {
                    $startup = $startup . " nogui";
                }
                file_put_contents($directory . "startserver.bat", $startup);
            }
            
            $currentStartup = "<br>";
            foreach(file($directory . "startserver.bat") as $line)
            {
                $currentStartup = $currentStartup . $line . "<br>";
            }            
            
            $rules = "";
            foreach(file("defaultrules.txt") as $line)
            {
                $rules = $rules . $line . "\n";
            }
        ?>
            Current startup configuration:<br>
            <em><?=$currentStartup;?></em>
            
            <p>
            
            <form method="post" action="doconfigure.php">
                Memory sizes can be specified in (M)egabtyes and (G)igabytes.<br>
                This form will not check for incorrect settings.<br>
                Example: "2G" will specify to use 2 Gigabytes of memory.<p>
                New maximum memory: <input type="text" name="maximum" value="<?=$maxMem?>">
                <br><br>
                New minimum memory: <input type="text" name="minimum" value="<?=$minMem?>">
                <br><br>
                Use console? (Recommended): <input type="radio" name="gui">
                <br>
                <p>
                Server rules:
                <p>
                <textarea class="rules" name="rules" rows="37"><?=$rules?></textarea>
                <p>
                <input type="submit" value="Configure">
            </form>
        
        
    </div>
    <footer>
    </footer>
</body>
</html>