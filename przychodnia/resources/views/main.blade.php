	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
           <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
{{--			<link href="./style.css" rel="stylesheet">--}}
            <link href="{{ asset('css/style.css') }}" rel="stylesheet">
		</head>

{{--		<header style="box-shadow: 7px 7px 5px rgba(0, 0, 0, 0.239);">--}}

{{--			<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: white;">--}}
{{--				<div class="container-fluid px-4 py-2 navCont">--}}
{{--				  <a class="navbar-brand" href='/'>--}}
{{--					<h3 class="offcanvas-title ps-4"><i class="bi bi-brightness-high fs-3 pt-0 pe-3"></i>Promyczek</h3>--}}
{{--				  </a>--}}

{{--				  <!-- user section -->--}}
{{--				  <div class="btn-group ">--}}
{{--					<button type="button pt-0" class="btn fs-4 mx-0">--}}
{{--					  <a class="dropdown-item fs-4" style="color:#5d6778" href='/login'><i class="bi bi-person-circle pt-0 fs-3 pe-3" style="color:#5d6778"></i>Zaloguj się</a>--}}
{{--					</button>--}}
{{--				  </div>--}}
{{--				</div>--}}
{{--			</nav>--}}
{{--		</header>--}}

        <header class="headerSettings">

            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: white;">
                <div class="container-fluid px-4 py-2 navCont">
                    <a class="navbar-brand" href="{{ URL('/') }}">
                        <h3 class="offcanvas-title ps-4"><i class="bi bi-brightness-high fs-3 pt-0 pe-3"></i>Promyczek</h3>
                    </a>
                    @auth
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header">
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body pt-5">
                            <ul class="navList">
                                <li class="nav-item ">
                                    <a class="nav-link" href="/patients/{{ Auth::user()->id }}/edit"><i class="bi bi-person-lines-fill me-2"></i>Moje dane</a>
                                </li>
                                <hr class="my-1" style="width: 50%;">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="bi bi-alarm me-2"></i>Wizyty</a>
                                </li>
                                <hr class="my-1" style="width: 50%;">
                                <li class="nav-item">
                                    <a class="nav-link ms-3" href="/visits/showPlanned"></i>Zaplanowane wizyty</a>
                                </li>
                                <hr class="my-1" style="width: 50%;">
                                <li class="nav-item">
                                    <a class="nav-link ms-3" href="/visits/index"></i>Umów wizytę</a>
                                </li>
                                <hr class="my-1" style="width: 50%;">
                                <li class="nav-item">
                                    <a class="nav-link" href="/documents/showPrescriptions"><i class="bi bi-file-earmark-text me-2"></i>Recepty</a>
                                </li>
                                <hr class="my-1" style="width: 50%;">
                                <li class="nav-item">
                                    <a class="nav-link" href="/documents/showReferrals"><i class="bi bi-clipboard-data me-2"></i>Badania</a>
                                </li>
                                <hr class="my-1" style="width: 50%;">
                                <li class="nav-item">
                                    <a class="nav-link" href="/visits/history"><i class="bi bi-folder2-open me-2"></i>Historia</a>
                                </li>
                                <hr class="my-1" style="width: 50%;">
                                <li class="nav-item">
                                    <a class="nav-link" href="/facilities/showFacilities"><i class="bi bi-houses me-2"></i>Nasze placówki</a>
                                </li>
                                <hr class="my-1" style="width: 50%;">
                                <li class="nav-item">
                                    <a class="nav-link" href="autor.php"><i class="bi bi-houses me-2"></i>Autor</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="bi bi-list fs-1" style="color:green;"></i></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarTogglerDemo02">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item panelPacjentaTitle" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                                <a class="offcanvas-title ps-4 fs-5" id="offcanvasExampleLabel">Panel pacjenta</a>
                            </li>
                            <span id="doUkrycia">
                                <li class="nav-item mt-4">
                                <a class="nav-link" href="/patients/{{ Auth::user()->id }}/edit"><i class="bi bi-person-lines-fill me-2 ps-3"></i>Moje dane</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="#"><i class="bi bi-alarm me-2 ps-3"></i>Wizyty</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link ms-4 ps-3" href="/visits/showPlanned">Zaplanowane wizyty</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link ms-4 ps-3" href="/visits/index">Umów wizytę</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="/documents/showPrescriptions"><i class="bi bi-file-earmark-text me-2 ps-3"></i>Recepty</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="/documents/showReferrals"><i class="bi bi-clipboard-data me-2 ps-3"></i>Badania</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="/visits/history"><i class="bi bi-folder2-open me-2 ps-3"></i>Historia</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="/facilities/showFacilities"><i class="bi bi-houses me-2 ps-3"></i>Nasze placówki</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="autor.php"><i class="bi bi-houses me-2 ps-3"></i>Autor</a>
                                </li>
                            </span>
                        </ul>
                    </div>
                    <!-- user section -->
                    <div class="btn-group accountSection">
                        <button type="button pt-0" class="btn dropdown-toggle fs-4 mx-0 dropdownHide1" data-bs-auto-close="true" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle pt-0 fs-2 " style="color:#5d6778"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <p class="dropdown-item">{{ Auth::user()->FirstName }} {{ Auth::user()->LastName}}</p>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right ms-3 fs-5">Logout</i></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                    @else
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ (request()->is('login')) ? 'active' : '' }}" href="{{ route('login') }}">Logowanie</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (request()->is('register')) ? 'active' : '' }}" href="{{ route('register') }}">Rejestracja</a>
                            </li>
                        </ul>
                    </div>
                    @endauth
                </div>
            </nav>
        </header>


		<body class="bodySettings">
        <div class="container mainContainer d-flex py-3">

            <!-- Main content for site -->

            @yield('content')

            <!-- End of main content for site -->

        </div>


{{--			<main>--}}
{{--				<hr>--}}
{{--					<center>--}}
{{--						@yield('content')		--}}{{-- pozwala wstrzykiwać zależność (inne widoki) --}}
{{--					</center>--}}
{{--				<hr>--}}
{{--			</main>--}}


        </body>

		<footer class="container pb-5">
				<p class="ps-5">Designed by Kinga Kasza & Karol Marciniak</p>
		</footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</html>
