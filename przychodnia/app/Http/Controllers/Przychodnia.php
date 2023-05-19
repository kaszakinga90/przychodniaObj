<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Przychodnia extends Controller
{
    static function naglowek($tytul)
	{
		return '
		<!doctype html>
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
		<body class="bodySettings">';
	}
	
	static function menu()
	{
		return '
		<main>
		<div id="carouselExampleCaptions" class="carousel slide px-0 mx-0 " data-bs-ride="carousel">
		<div class="carousel-indicators">
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
		</div>
		<div class="carousel-inner">
			<div class="carousel-item active">
			<img src="carousel4.jpg" class="d-block w-100" alt="...">
			<div class="carousel-caption d-none d-md-block">
				<h5>First slide label</h5>
				<p>Some representative placeholder content for the first slide.</p>
			</div>
			</div>
			<div class="carousel-item">
			<img src="carousel1.jpg" class="d-block w-100" alt="...">
			<div class="carousel-caption d-none d-md-block">
				<h5>Second slide label</h5>
				<p>Some representative placeholder content for the second slide.</p>
			</div>
			</div>
			<div class="carousel-item">
			<img src="carousel4.jpg" class="d-block w-100" alt="...">
			<div class="carousel-caption d-none d-md-block">
				<h5>Third slide label</h5>
				<p>Some representative placeholder content for the third slide.</p>
			</div>
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
		</div>

		<div class="container mainContainer mt-3 py-0 px-2 mx-auto">
		<div class="row pt-5">
			<div class="col-lg-4">
			<div class="card my-2 wholeCardMain">
				<button class="btn myBtn mx-auto mt-4">
				<p class="pMyBtn">4 mln</p>
				</button>
				<div class="card-body mt-2">
				<h3 class="card-title d-flex justify-content-center cardFromMain">Klientów</h3>
				<p class="card-text d-flex justify-content-center cardFromMain">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s.</p>
				</div>
			</div>
			</div>
			<div class="col-lg-4">
			<div class="card my-2 wholeCardMain">
				<button class="btn myBtn mx-auto mt-4">
				<p class="pMyBtn">54</p>
				</button>
				<div class="card-body mt-2">
				<h3 class="card-title d-flex justify-content-center cardFromMain">Specjalizacje</h3>
				<p class="card-text d-flex justify-content-center cardFromMain">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s.</p>
				</div>
			</div>
			</div>
			<div class="col-lg-4">
			<div class="card my-2 wholeCardMain">
				<button class="btn myBtn mx-auto mt-4">
				<p class="pMyBtn">100%</p>
				</button>
				<div class="card-body mt-2">
				<h3 class="card-title d-flex justify-content-center cardFromMain">Gwarancji</h3>
				<p class="card-text d-flex justify-content-center cardFromMain">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s.</p>
				</div>
			</div>
			</div>
		</div>
		<hr class="hrSettings">
		</div>
		<!-- End of main content for site -->

		<footer class="container pb-5">
		<p class="ps-5">Designed by Kinga Kasza & Karol Marciniak</p>
		</footer>

	</main>';
	}
	
	static function stopka()
	{
		return '


		  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		 </body>
		</html>';
	}
	
	
	public function __invoke(){	//public, żeby działało w Laravelu		
		//return Przychodnia::naglowek("Strona główna") . self::menu() . self::stopka();
		return view('main');	//tu powinna być ogólna strona główna zagnieżdżona w main/layout, który dostarcza nagłówek i stopkę
	}
}
