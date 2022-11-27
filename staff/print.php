<?php
    require("../dbconnection.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cavalee | Reciept</title>
    </head>
    <body>
        <hr>
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
                            <td>". $row['menuName'] ." : ". $row['menuItemName'] ."</td>
                            <td>". $row['price'] ."</td>
                            <td>". $row['quantity'] ."</td>
                            <td>". $tot .".00</td>
                          </tr>";
                }
                echo "<tr><td colspan = '3'><b>Grand Total</b></td><td>". $total .".00</td></tr>";
            ?>
        </table>   
        <hr> 
        <script>
            window.print();
        </script>
    </body>
</html>