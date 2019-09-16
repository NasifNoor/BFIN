<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>User Dashboard</title>
	<link href="css/sb-admin.min.css" rel="stylesheet">
	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<!-- Page level plugin CSS-->
	<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<!-- Custom styles for this template-->
	
</head>
<body id="page-top">
	<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

		<a class="navbar-brand mr-1" href="#">Test Project</a>

		<!-- Navbar Search -->
		<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
		  <div class="input-group">
			
		  </div>
		</form>

		<!-- Navbar -->
		<ul class="navbar-nav ml-auto ml-md-0">
		  <li class="nav-item dropdown no-arrow">
			<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  <i class="fas fa-user-circle fa-fw"></i>
			</a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
			  <a class="dropdown-item" href="/logout" >Logout</a>
			</div>
		  </li>
		</ul>

	</nav>

	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="sidebar navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="/user">
				<span>view Profile</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/createCustomer">
				<span>Create Customer</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/createProduct">
				<span>Create Product</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/createInvoice">
				<span>Create Invoice</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/viewInvoice">
				<span>View Invoice</span></a>
			</li>
		</ul>

		<div id="content-wrapper">

			<div class="container-fluid">

				<!-- Page Content -->
				@yield('content')

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<footer class="sticky-footer">
				<div class="container my-auto">
				  <div class="copyright text-center my-auto">
					<span>Copyright © Test Project'19</span>
				  </div>
				</div>
			</footer>

		</div>
		<!-- /.content-wrapper -->

	  </div>
	  <!-- /#wrapper -->


  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

</body>

</html>
