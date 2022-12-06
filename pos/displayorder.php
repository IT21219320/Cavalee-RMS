
<?php

	include("../functions.php");

	if((!isset($_SESSION['uid']) && !isset($_SESSION['username']) && isset($_SESSION['user_level'])) ) 
		header("Location: login.php");

	if($_SESSION['user_level'] != "staff")
		header("Location: login.php");

	//display none when open /displayorder.php
	if(empty($_GET['cmd'])) 
		die(); 


	//display POS Details
	if ($_GET['cmd'] == 'currentready') {

		$latestReadyQuery = "SELECT SUM(total) as grandtotal
		FROM tbl_order
		WHERE order_date > DATE_SUB(NOW(), INTERVAL 1 DAY)";

		$ordercount = "SELECT COUNT(total) as numOrders
		FROM tbl_order
		WHERE order_date > DATE_SUB(NOW(), INTERVAL 1 DAY)";

		$total = 0;
		$numOrders = 0;

		if ($result = $sqlconnection->query($latestReadyQuery)) {
	
			while ($res = $result->fetch_array(MYSQLI_ASSOC)) {
				$total+=$res['grandtotal'];
			}

			if($count = $sqlconnection->query($ordercount)) {
	
				while ($cnt = $count->fetch_array(MYSQLI_ASSOC)) {
					$numOrders+=$cnt['numOrders'];
				}
			}
		

			echo "<!-- small box -->
					<div class='small-box bg-blue card m-3'>
						<div class='inner'>
							<h3 style='text-align:left'>". $numOrders ."</h3>

							<p>Order Count</p>
						</div>
						<div class='icon'>
							<img src='../image/ordercnt.png' alt='CashRegister' id='regIcon' class='cashRegIcon' width='65px'>
						</div>
					</div>";

			echo "<!-- small box -->
					<div class='small-box bg-green card m-3'>
						<div class='inner'>
							<h3>LKR ". $total ."</h3>

							<p>Sales</p>
						</div>
						<div class='icon'>
							<b>$</b>
						</div>
					</div>";

					
			echo "<!-- small box -->
					<div class='small-box bg-red card m-3' title='Click to Update' onclick='updateCash();'>
						<div class='inner'>
							<h3 id='cashin'>LKR 0</h3>

							<p>Cash In Counter</p>
						</div>
						<div class='icon'>
							<img src='../image/cashregister.png' alt='CashRegister' id='regIcon' class='cashRegIcon' width='65px'>
						</div>
					</div>";

			if(!isset($_COOKIE['CashInCounter'])){
				echo "<script>updateCash();</script>";
			}	
			else{
				$cashincounter = $_COOKIE['CashInCounter'];
				$cashincounter += $total;
				echo "<script>document.getElementById('cashin').innerHTML = 'LKR '+$cashincounter;</script>";
			}


		}

		else {

			echo $sqlconnection->error;
			return null;

		}
	}

?>