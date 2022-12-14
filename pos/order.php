<?php
	include("../functions.php");

  if((!isset($_SESSION['uid']) && !isset($_SESSION['username']) && isset($_SESSION['user_level'])) ) 
    header("Location: login.php");

  if($_SESSION['user_level'] != "staff")
    header("Location: login.php");

  if($_SESSION['user_role'] != "POS"){
    echo ("<script>window.alert('Available for POS only!'); window.location.href='index.php';</script>");
    exit();
  }

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cavalee | Order</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

    <style>
      #tblItem{
        display: none;
      }
      #qtypanel{
        display: none;
      }
      #back{
        display: none;
        width: max-content;
        padding: 2px 10px 5px;
        position: relative;
        top: -11px;
        left: -11px;
        border-radius: 3px;
        box-shadow: 0 0 5px #00000057;
        background: beige;
        cursor: pointer;
      }
      #back:hover{
        box-shadow: 0 0 3px #00000057;
      }
      #searchItem {
        margin-bottom: 10px;
        width: 100%;
        border-radius: 5px;
        border: 0;
        box-shadow: 0 0 3px 0px #00000063;
        padding: 5px 10px;
      }
    </style>

  </head>

  <body id="page-top" class="sidebar-toggled">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.php"><img src="../image/Cavalee-1.png" height="24px" width="auto"></a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!------------------ Sidebar ------------------->
      <ul class="sidebar navbar-nav toggled">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>

            <li class="nav-item">
              <a class="nav-link" href="order.php">
                <i class="fas fa-fw fa-book"></i>
                <span>Order</span></a>
            </li>

        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-power-off"></i>
            <span>Logout</span>
          </a>
        </li>

      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Order</li>
          </ol>

          <!-- Page Content -->
          <h1>Order Management</h1>
          <hr>
          <p>Manage new order in this page.</p>

          <div class="row">
            <div class="col-lg-6">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-utensils"></i>
                  Take Order</div>
                <div class="card-body">
                  <input type="text" name="searchItem" id="searchItem" onkeyup="searchItem()" value="" placeholder="Search Item">
                  <table class="table table-bordered text-center" width="100%" cellspacing="0" id="itmCat">
                  	<tr>
                  	<?php 
						$menuQuery = "SELECT * FROM tbl_menu";

						if ($menuResult = $sqlconnection->query($menuQuery)) {
							$counter = 0;
							while($menuRow = $menuResult->fetch_array(MYSQLI_ASSOC)) { 
								if ($counter >=3) {
									echo "</tr>";
									$counter = 0;
								}

								if($counter == 0) {
									echo "<tr>";
								} 
								?>
								<td><button style="margin-bottom:4px;white-space: normal;" class="btn btn-primary" onclick="displayItem(<?php echo $menuRow['menuID']?>)"><?php echo $menuRow['menuName']?></button></td>
							<?php

							$counter++;
							}
						}
					?>
					</tr>
                  </table>
                  <div id="back" onclick="goback();"><</div>
                  <table id="tblItem" class="table table-bordered text-center" width="100%" cellspacing="0"></table>

                <div id="qtypanel">
        					Quantitiy : <input id="qty" required="required" type="number" min="1" max="50" name="qty" value="1" />
        					<button class="btn btn-info" onclick = "insertItem()">Add</button>
        					<br><br>
				</div>

                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-chart-bar""></i>
                  Order List</div>
                <div class="card-body">
                    <form action="insertorder.php" method="POST">
						<table id="tblOrderList" class="table table-bordered text-center" width="100%" cellspacing="0">
							<tr>
								<th>Name</th>
								<th>Price</th>
								<th>Qty</th>
								<th>Total (LKR)</th>
							</tr>
              <tr id="tblLast">
                <td colspan='3'><b>Grand Total (LKR)</td>
                <td id='grandTotal'></td>
              </tr>
						</table>
						<input class="btn btn-success" type="submit" name="sentorder" value="Check Out">
					</form>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright ?? SanX IT Systems 2022</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">??</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

	<script>
    var count = 1;
		var currentItemID = null;

		function displayItem (id) {
      document.getElementById('tblItem').style.display = "table";
      document.getElementById('back').style.display = "block";
      document.getElementById('itmCat').style.display = "none";
      document.getElementById('searchItem').style.display = "none";
			$.ajax({
				url : "displayitem.php",
        type : 'POST',
        data : { btnMenuID : id },

        success : function(output) {
          $("#tblItem").html(output);
        }
      });
		}

    function setQty (id) {
      currentItemID = id;
      document.getElementById("qtypanel").style.display = "block";
    }

		function insertItem () {
      document.getElementById('itmCat').style.display = "table";
      document.getElementById('tblItem').innerHTML = "";
      document.getElementById('back').style.display = "none";
      document.getElementById('searchItem').style.display = "block";
      document.getElementById('searchItem').value = "";
			var id = currentItemID;
			var quantity = $("#qty").val();
			$.ajax({
				url : "displayitem.php",
					type : 'POST',
					data : { 
						btnMenuItemID : id,
						qty : quantity,
            cnt : count
					},

					success : function(output) {
						$("#tblLast").before(output);
      document.getElementById("qtypanel").style.display = "none";
            count++;
					}
				});

			$("#qty").val(1);
		}

		$(document).on('click','.deleteBtn', function(event){
		        event.preventDefault();
		        $(this).closest('tr').remove();
            count--;
            document.getElementById('grandTotal').innerHTML = "";
		        return false;
		    });

    function goback(){
      document.getElementById('itmCat').style.display = "table";
      document.getElementById('tblItem').innerHTML = "";
      document.getElementById('back').style.display = "none";
      document.getElementById('qtypanel').style.display = "none";
      document.getElementById('searchItem').style.display = "block";
      document.getElementById('searchItem').value = "";
    }    

    function searchItem(){
      let val = document.getElementById('searchItem').value;

      if(val != ""){
        document.getElementById('tblItem').style.display = "table";
        document.getElementById('back').style.display = "block";
        document.getElementById('itmCat').style.display = "none";
        document.getElementById('back').style.display = "none";
        $.ajax({
          url : "displayitem.php",
          type : 'POST',
          data : { itemName : val },

          success : function(output) {
            $("#tblItem").html(output);
          }
        });
      }
      else{
        goback();
      }
      
    }

	</script>

  </body>

</html>