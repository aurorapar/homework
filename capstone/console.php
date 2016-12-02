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
        <li class="sidebar-element">README</li>
    </ul>
        
    <div id="subject">- Console -</div>
    <div id="content">
        <?php
            $server = sqlConnect('localhost','minecraftserver','root','');
            $directory = getServerSetting($server, 'mcinstall', 'installPath');
            $file = $directory . "\logs\latest.log";
            $output = "";
            foreach(file($file) as $line)
            {
                $output = $output . $line;
            }
        ?>
            <textarea class="console"><?=$output?></textarea>
            <p>
            Please note this is not a live feed. Refresh the page for the lastest log!<br>
    </div>    
        
    </div>
    <footer>
    </footer>
</body>
</html>