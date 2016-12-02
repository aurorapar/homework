<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>World Data</title>
  <!-- 
      <link href="bitnami.css" media="all" rel="Stylesheet" type="text/css" />  
      <link href="/dashboard/stylesheets/all.css" rel="stylesheet" type="text/css" />
    -->
</head>

<body>
    <header>
    </header>
    
        <?php
            $connection = new PDO("mysql:dbname=world;
                                   host=localhost", 
                                   'root');
            if (!$connection) {
                die("Incorrect parameters" . mysql_error());
            }
            else
            {
                print "Connected";
            }
        ?>
        
    <footer>
    </footer>
</body>

</html>