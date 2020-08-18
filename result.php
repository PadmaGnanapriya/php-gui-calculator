<?php 
   session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background:#9cf0ea;
        }
        h1{
            color:#2466d1;
            font-size: 60px;
        }
        h3{
            color:#292d33;
            font-size:30px;
        }
</style>
</head>
<body>
    <?php 
        $data= $_SESSION['superhero']; 
        list($input, $output) = explode("=", $data);
        echo "<h1> &nbsp &nbsp &nbsp".$output."</'h1><br>";
        echo "<h3>&nbsp = &nbsp ".$input."</'h3><br>";
    ?>
</body>
</html>