	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
			<link href="./style.css" rel="stylesheet">
		</head>

		<header style="box-shadow: 7px 7px 5px rgba(0, 0, 0, 0.239);">

			<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: white;">
				<div class="container-fluid px-4 py-2 navCont">
				  <a class="navbar-brand">
					<h3 class="offcanvas-title ps-4"><i class="bi bi-brightness-high fs-3 pt-0 pe-3"></i>Promyczek</h3>
				  </a>

				  <!-- user section -->
				  <div class="btn-group ">
					<button type="button pt-0" class="btn fs-4 mx-0">
					  <a class="dropdown-item fs-4" style="color:#5d6778"><i class="bi bi-person-circle pt-0 fs-3 pe-3" style="color:#5d6778"></i>Zaloguj się</a>
					</button>
				  </div>
				</div>
			</nav>
		</header>
		<body class="bodySettings">
			<main>
				<hr>
					<center>
						@yield('content')		{{-- pozwala wstrzykiwać zależność (inne widoki) --}}
					</center>
				<hr>
			</main>			
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		</body>
		
		<footer class="container pb-5">
				<p class="ps-5">Designed by Kinga Kasza & Karol Marciniak</p>
		</footer>
	</html>