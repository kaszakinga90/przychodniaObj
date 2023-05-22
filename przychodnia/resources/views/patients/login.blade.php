@extends('main')

@section('content')
  <div class="container mainContainer py-4 px-5 ">
    <div class="col-sm-10 col-md-8 col-xl-6 mx-auto ">
      <h1 class="pb-4 pt-2 titleOfPage">Zaloguj się do portalu</h1>
    </div>
    <div class="col-sm-10 col-md-8 col-xl-6 mx-auto ">
      <form class="row g-3 " novalidate method=POST onSubmit='return valid()' action=''>
        <div class="col-12 position-relative">
          <div class="form-floating">
            <input type="text" class="form-control" name="login" id="login" placeholder="login" required>
            <label for="login" class="form-label">Login</label>
          </div>
        </div>
        <div class="col-12 position-relative">
          <div class="form-floating">
            <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
            <label for="password" class="form-label">Hasło</label>
          </div>
        </div>
        <div class="col-12">
		      <button class="btn btn-primary">Zaloguj</button>

        </div>
      </form>
    </div>
    <div class="col-sm-10 col-md-8 col-xl-6 mx-auto pt-5">
      <a href="/register">Nie masz jeszcze konta? Zarejestruj się -></a>
    </div>
  </div>
  @endsection