<?php 
  include("../functions.php");

  if((!isset($_SESSION['uid']) && !isset($_SESSION['username']) && isset($_SESSION['user_level'])) ) 
    header("Location: login.php");

  if($_SESSION['user_level'] != "staff")
    header("Location: login.php");

  /*
  echo $_SESSION['uid'];
  echo $_SESSION['username'];
  echo $_SESSION['user_level'];
  */

  function getStatus () {
      global $sqlconnection;
      $checkOnlineQuery = "SELECT status FROM tbl_staff WHERE staffID = {$_SESSION['uid']}";

      if ($result = $sqlconnection->query($checkOnlineQuery)) {
          
        if ($row = $result->fetch_array(MYSQLI_ASSOC)) {
          return $row['status'];
        }
      }

      else {
          echo "Something wrong the query!";
          echo $sqlconnection->error;
      }
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

    <title>Cavalee | Staff Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <style>
      .small-box{
        width: max-content;
        align-items: center;
        flex-direction: row;
        color: white;
        box-shadow: 0 0 10px 0px #8d8d8dad;
        cursor: pointer;
      }
      .small-box:hover{
        box-shadow: 0 0 5px 0px #8d8d8dad;
      }
      .bg-green{
        background: #019159;
      }
      .bg-red{
        background: #e83260;
      }
      .bg-blue{
        background: #26a8b5;
      }
      .inner{

      }
      .inner h3{
        font-size: 1.75rem;
        text-align: center;
        margin: 1rem 0 8px 1rem;
      }
      .inner p{
        margin-left: 1rem;
      }
      .icon{
        font-size: 70px;
        color: #00000059;
        margin: 0 1rem;
        font-weight: bold;
      }
      #orderTable{
        display:flex;
      }
      #regIcon{
        background: #00000059;
        margin-bottom: 1rem;
      }
    </style>
  </head>

  <body id="page-top" class="sidebar-toggled">
    <script>
      var amt;
    </script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

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
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- Page Content -->
          <h1>Staff Panel</h1>
          <hr>
          <p>Latest POS Details</p>

          <div class="row">
            <div class="col-lg-9">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-money-bill"></i>
                  Daily Details</div>
                <div id="orderTable">
                </div>
                <div class="card-footer small text-muted"><i>Refresh every 3 second(s)</i></div>
              </div>
            </div>

            <div class="col-lg-3">
              <div class="card mb-3 text-center">
                <div class="card-header">
                  <i class="fas fa-chart-bar""></i>
                  Status</div>
                <div class="card-body">
                  Hello , <b><?php echo $_SESSION['username'] ?></b><hr>
                  Role : <b><?php echo ucfirst($_SESSION['user_role']) ?></b><hr>
                  <form action="statuschange.php" method="POST">
                    <input type="hidden" id="staffid" name="staffid" value=" <?php echo $_SESSION['uid']; ?>" />
                      <?php if (getStatus()=='Online') echo "<input type='submit' class='btn btn-success myBtn' name='btnStatus' value='Online'>"; else echo"<input type='submit' class='btn btn-danger myBtn' name='btnStatus' value='Offline'>" ?>
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
	<script type="text/javascript">

    $( document ).ready(function() {
        refreshTableOrder();
    });

    function refreshTableOrder() {
      $( "#orderTable" ).load( "displayorder.php?cmd=currentready" );
    }

    //refresh order current list every 3 secs
    //setInterval(function(){ refreshTableOrder(); }, 3000);

    function updateCash() {
      let password = prompt("Please enter Admin/Manager Password");
      $.ajax({
           type: "POST",
           url: 'updatecash.php',
           data:{action:'call_this', pwd:password},
           success:function(html) {
             $("body").append(html);
           }
      });
 }

  </script>

  </body>

</html>