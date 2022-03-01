<?php
    $studentList=array("Arun","Kannan","Sivamurugan","Don","Arjun","Binoy","Joyal");
    echo"studentList(array)<br>";
    print_r($studentList);
    echo"<br>Array sorted using asort()<br>";
    asort($studentList);
    print_r($studentList);
    echo"<br>Array sorted using arsort()<br>";
    arsort($studentList);
    print_r($studentList);
?>