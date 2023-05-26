@extends('main')

@section('content')
  <!-- Main content for site -->
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
              <p class="card-text d-flex justify-content-center cardFromMain">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
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
              <p class="card-text d-flex justify-content-center cardFromMain">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
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
              <p class="card-text d-flex justify-content-center cardFromMain">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>
          </div>
        </div>
      </div>
      <hr class="hrSettings">
    </div>
    <!-- End of main content for site -->
{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
