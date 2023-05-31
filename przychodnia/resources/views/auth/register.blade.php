@extends('main')

@section('content')

    <div>
        <div class="col-sm-8 col-md-6 col-xl-4 mx-auto ">
            <h1 class="pb-4 pt-2 titleOfPage">Rejestracja</h1>
        </div>
        <div class="col-sm-8 col-md-6 col-xl-4 mx-auto ">
            <form action="{{ route('store') }}" method="post" class="row g-3 ">
                @csrf
                <div class="col-12 position-relative">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('firstName') is-invalid @enderror" id="firstName" name="firstName" value="{{ old('firstName') }}">
                        @if ($errors->has('firstName'))
                            <span class="text-danger">{{ $errors->first('firstName') }}</span>
                        @endif
                        <label for="namefirstName" class="form-label">Imię</label>
                    </div>
                </div>
                <div class="col-12 position-relative">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('lastName') is-invalid @enderror" id="lastName" name="lastName" value="{{ old('lastName') }}">
                        @if ($errors->has('lastName'))
                            <span class="text-danger">{{ $errors->first('lastName') }}</span>
                        @endif
                        <label for="lastName" class="form-label">Nazwisko</label>
                    </div>
                </div>
                <div class="col-12 position-relative">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('login') is-invalid @enderror" id="login" name="login" value="{{ old('login') }}">
                        @if ($errors->has('login'))
                            <span class="text-danger">{{ $errors->first('login') }}</span>
                        @endif
                        <label for="login" class="form-label">Login</label>
                    </div>
                </div>
                <div class="col-12 position-relative">
                    <div class="form-floating">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="password">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                        <label for="password" class="form-label">Hasło</label>
                    </div>
                </div>
                <div class="col-12 position-relative">
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="password">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                        <label for="password_confirmation" class="form-label">Powtórz hasło</label>
                    </div>
                </div>
                <div class="col-12 position-relative">
                    <input type="submit" class="col-sm-6 col-md-4  btn btn-primary" value="Zarejestruj się">
                </div>

            </form>
        </div>
        <div class="col-sm-8 col-md-6 col-xl-4 mx-auto pt-5">
            <a href='/login'>Masz już konto? Zaloguj się -></a>
        </div>
    </div>

@endsection
