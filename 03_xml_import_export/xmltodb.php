<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "intern";
$conn = mysqli_connect($host,$user,$password,$dbname);


$xml=simplexml_load_file("xmlD.xml");
foreach($xml->product as $productss)
    {
        $pid=$productss->pid;
        $pname=$productss->pname;
        $pricee=$productss->price;
        $qtyy=$productss->qty;
        $sql="INSERT INTO intern_product(pid,pname,price,qty)values('$pid','$pname','$pricee','$qtyy')";
        if(mysqli_query($conn,$sql))
        {
            echo "record inserted successfully";
        }
        else
        {
            echo mysqli_error($conn);
        }
    
    }
    echo "data moved successfully from xml to mysql";
?>