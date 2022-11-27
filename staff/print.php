<?php
    require("../dbconnection.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cavalee | Reciept</title>
        <link href="css/printstyle.css" rel="stylesheet">
    </head>
    <body>
        <center>
            <img src="../image/LOGO-Orig.png" height="60px" width="auto">
            <P>Street Food<br>162/24/1 Pittugala, Malabe<br>+94 710 622 622</P>
        </center>
        
        <table border="0">
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            <?php
                $id = $_GET['id'];
                $total = 0;

                $sql = "SELECT M.menuName, MI.menuItemName, OD.quantity, MI.price
                FROM tbl_orderdetail OD, tbl_menuitem MI, tbl_menu M
                WHERE OD.itemID = MI.itemID AND MI.menuID = M.menuID AND OD.orderID = $id";

                $result = $sqlconnection -> query($sql);
                while($row = $result -> fetch_assoc()){
                    $tot = $row['price'] * $row['quantity'];
                    $total += $tot;
                    echo "<tr>
                            <td id='printMenuItem'>". $row['menuName'] ." : ". $row['menuItemName'] ."</td>
                            <td id='printPrice'>". $row['price'] ."</td>
                            <td id='printQuantity'>". $row['quantity'] ."</td>
                            <td id='printTotal'>". $tot .".00</td>
                          </tr>";
                }
                echo "<tr><td colspan = '3'><br><b>Grand Total</b></td><td>". $total .".00</td></tr>";
            ?>
        </table>
        <br>
        <center><strong><h4>Thank You. Come Again!</h4></strong></center>
        <script>
            window.print();
        </script>
    </body>
</html>