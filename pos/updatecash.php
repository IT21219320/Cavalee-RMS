<?php 
require "../dbconnection.php";

if($_POST['action'] == 'call_this') {
  $pwd = $_POST['pwd'];
  
    $sql = "SELECT * FROM tbl_admin WHERE password='$pwd'";
    $sql2 = "SELECT * FROM tbl_staff WHERE password='$pwd' AND role='Manager'";

    $results = $sqlconnection -> query($sql);
    $results2 = $sqlconnection -> query($sql2);

    if($results -> num_rows > 0){
        echo "<script>
                amt = parseInt(prompt('Please Enter Opening Cash value'));
                const d = new Date();
                d.setTime(d.getTime() + (1*24*60*60*1000));
                let expires = 'expires='+ d.toUTCString();
                document.cookie = 'CashInCounter='+amt+';'+expires+';';
                refreshTableOrder();
            </script>";
    }
    elseif($results2 -> num_rows > 0){
        echo "<script>
                amt = parseInt(prompt('Please Enter Opening Cash value'));
                const d = new Date();
                d.setTime(d.getTime() + (1*24*60*60*1000));
                let expires = 'expires='+ d.toUTCString();
                document.cookie = 'CashInCounter='+amt+';'+expires+';';
                refreshTableOrder();
            </script>";
    }
    else{
        echo "<script>alert('Invalid password')</script>";
    }

}
?>