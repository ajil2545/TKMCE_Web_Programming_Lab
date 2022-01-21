<html>
    <head>
        <title>Electricity Bill</title>
    </head>
    <body>
        <form method="POST">
            <table align="center">
                <tr>
                    <td>Meter Number: </td>
                    <td>
                        <input type="number" name="meterNo" required>
                    </td>
                </tr>
                <tr>
                    <td>Number of Units: </td>
                    <td>
                        <input type="number" name="noUnit" required>
                    </td>
                </tr>
                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="tariff">
                            <option>---Select---</option>
                            <option>Rural</option>
                            <option>Residential</option>
                            <option>Commercial</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php
echo"<center>";
if(isset($_POST['submit']))
{
    $meterNo=$_POST['meterNo'];
    $noUnit=$_POST['noUnit'];
    $tariff=$_POST['tariff'];
    if($tariff=="Rural")
    {
        if($noUnit>0&&$noUnit<=50)
        {
            $ec=5;
            $pay=(($noUnit*.25)+$ec);
        }
        elseif($noUnit>50&&$noUnit<=100)
        {
            $ec=5;
            $pay=(($noUnit*.50)+$ec);
        }
        elseif($noUnit>100&&$noUnit<=150)
        {
            $ec=5;
            $pay=(($noUnit*.75)+$ec);
        }
        elseif($noUnit>150&&$noUnit<=200)
        {
            $ec=5;
            $pay=(($noUnit*1)+$ec);
        }
        elseif($noUnit>200&&$noUnit<=300)
        {
            $ec=5;
            $pay=(($noUnit*2)+$ec);
        }
        elseif($noUnit>300&&$noUnit<=500)
        {
            $ec=5;
            $pay=(($noUnit*3)+$ec);
        }
        elseif($noUnit>500)
        {
            $ec=5;
            $pay=(($noUnit*4)+$ec);
        }
        echo "Meter Number  : ".$meterNo;
        echo "<br>";
        echo "Number of unit used : ".$noUnit;
        echo "<br>";
        echo "Extra Charges:  ".$ec;
        echo "<br>";
        echo "Total amount to be paid: ".$pay;
    }
    if($tariff=="Residential")
    {
        if($noUnit>0&&$noUnit<=50)
        {
            $ec=20;
            $pay=(($noUnit*.50)+$ec);
        }
        elseif($noUnit>50&&$noUnit<=100)
        {
            $ec=20;
            $pay=(($noUnit*1)+$ec);
        }
        elseif($noUnit>100&&$noUnit<=150)
        {
            $ec=20;
            $pay=(($noUnit*1.75)+$ec);
        }
        elseif($noUnit>150&&$noUnit<=200)
        {
            $ec=20;
            $pay=(($noUnit*2.50)+$ec);
        }
        elseif($noUnit>200&&$noUnit<=300)
        {
            $ec=20;
            $pay=(($noUnit*3)+$ec);
        }
        elseif($noUnit>300&&$noUnit<=500)
        {
            $ec=20;
            $pay=(($noUnit*5)+$ec);
        }
        elseif($noUnit>500)
        {
            $ec=20;
            $pay=(($noUnit*6)+$ec);
        }
        echo "Meter Number  : ".$meterNo;
        echo "<br>";
        echo "Number of unit used :".$noUnit;
        echo "<br>";
        echo "Extra Charges:  ".$ec;
        echo "<br>";
        echo "Total amount to be paid: ".$pay;
    }
    if($tariff=="Commercial")
    {
        if($noUnit>0&&$noUnit<=50)
        {
            $ec=30;
            $pay=(($noUnit*1)+$ec);
        }
        elseif($noUnit>50&&$noUnit<=100)
        {
            $ec=30;
            $pay=(($noUnit*2)+$ec);
        }
        elseif($noUnit>100&&$noUnit<=150)
        {
            $ec=30;
            $pay=(($noUnit*3)+$ec);
        }
        elseif($noUnit>150&&$noUnit<=200)
        {
            $ec=30;
            $pay=(($noUnit*4)+$ec);
        }
        elseif($noUnit>200&&$noUnit<=300)
        {
            $ec=30;
            $pay=(($noUnit*5)+$ec);
        }
        elseif($noUnit>300&&$noUnit<=500)
        {
            $ec=30;
            $pay=(($noUnit*7)+$ec);
        }
        elseif($noUnit>500)
        {
            $ec=30;
            $pay=(($noUnit*8)+$ec);
        }
        echo "Meter Number  : ".$meterNo;
        echo "<br>";
        echo "Number of unit used : ".$noUnit;
        echo "<br>";
        echo "Extra Charges:  ".$ec;
        echo "<br>";
        echo "Total amount to be paid: ".$pay;
    }
}
echo"</center>";
?>