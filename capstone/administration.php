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
        
    <div id="subject">- Administration -</div>
    <div id="content">
            <p>
            Here, we can maintain a Minecraft server. Choose to install it or click on any other option.<br>
            Please check out the readme first!
            <p>
            <br>
            <ul>
                <li class="serveroption"><a class="content-element-link" href="install.php">Install Server</a></li>
                <li class="serveroption"><a class="content-element-link" href="configure.php">Configure Server</a></li>
                <li class="serveroption"><a class="content-element-link" href="boot.php">Start Server</a></li>
            </ul>
            <p>
            <br>
            <ul>
                <li class="serveroption"><a class="content-element-link" href="status.php">Server Status</a></li>
                <li class="serveroption"><a class="content-element-link" href="reboot.php">Reboot Server</a></li>
                <li class="serveroption"><a class="content-element-link" href="console.php">Console</a></li>
            </ul>
        <p>
        
        
    </div>
    <footer>
    </footer>
</body>

</html>