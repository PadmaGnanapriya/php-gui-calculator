<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Basic PHP Calculator</title>
<style>
    body{
        background:#9cf0ea;
    }
    td{
        padding: 5px;
    }
    button{
        background:#ffffff;
        margin:0;
        padding:20px;
        border-radius:15%;
        font-size: 25px;
        width:70px;
        box-shadow: 3px 6px rgba(3,3,3,0.7);
    }
    button:hover{
        box-shadow: 1px 2px rgba(3,3,3,0.7);
        scale:1.3;
    }
</style>
</head>
<body>

    <?php
    $buttons=['C','±','%','/',7,8,9,'*',4,5,6,'-',1,2,3,'+',0,'.','<','='];
    $pressed='';
    if(isset($_POST['pressed']) && in_array($_POST['pressed'],$buttons)){
        $pressed=$_POST['pressed'];
    }
    $stored='';
    if(isset($_POST['stored']) && preg_match('~^(?:[\d.]+[*/+-]?)+$~',$_POST['stored'],$out)){
        $stored=$out[0];    
    }
    $display=$stored.$pressed;

    if($pressed=='C'){
        $display='';
    }
    elseif($pressed=='±'){
        $display=-1*$display;
    }

    // ⌫
    elseif($pressed=='<'){
        $display = substr($display , 0, -2);
    }
    elseif($pressed=='=' && preg_match('~^\d*\.?\d+(?:[*/+-]\d*\.?\d+)*$~',$stored)){
        $display.=eval("return $stored;"); 
        session_start();
        $_SESSION['superhero'] = $display;
        header("Location: result.php");
        exit();
    }

    echo "<form action=\"\" method=\"POST\">";
        echo "<table style=\"width:300px;\">";
            foreach(array_chunk($buttons,4) as $chunk){
                echo "<tr>";
                    foreach($chunk as $button){
                        echo "<td",(sizeof($chunk)!=4?" colspan=\"4\"":""),"><button name=\"pressed\" value=\"$button\">$button</button></td>";
                    }
                echo "</tr>";
            }
        echo "</table>";
        echo "<input type=\"hidden\" name=\"stored\" value=\"$display\">";
        echo $display;

        // echo "<br>";
        // echo substr($display, 0, -4);
    echo "</form>";
    ?>
</body>
</html>