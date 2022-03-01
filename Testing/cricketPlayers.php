<html>
    <head>
        <title>Cricket Players</title>
    </head>
    <body>
        <?php
            $players=array("Sachin Tendulkar","M.S.Dhoni","Virat Kohli","Rohit Sharma","Yuvraj Singh","Hardik Pandya","Jasprit Bumrah","Ravindra Jadeja","Shikhar Dhawan","Rishabh Pant","Kapil Dev");
            echo"<table align='center' style='border:1px solid black;' cellspacing='12' width='50%'><tr><th>No.</th><th>Name</th></tr>";
            foreach($players as $key=>$value)
            {
                echo"<tr><th>". $key+1 ."</th><th>$value</th></tr>";
            }
            echo"</table>";
        ?>
    </body>
</html>