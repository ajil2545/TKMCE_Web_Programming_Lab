<html>
    <head></head>
    <body>
<?php
    $a=array("book"=>"50", "pen"=>"23", "bag"=>"500");
    $b=array("cat","mouse","ant");
    asort($a);
    print_r($a);
    arsort($b);
    print_r($b);
    echo "<table align='center'><tr><th>Book</th><th>Price</th></tr>";
    foreach($a as $key=>$value)
    {
        echo"<tr><td>$key</td><td>$value</td></tr>";
    }
    echo"</table>";
?>
    </body>                                                                                                                                                                                     
</html>