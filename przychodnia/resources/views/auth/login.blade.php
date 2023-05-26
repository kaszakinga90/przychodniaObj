@extends('main')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">Logowanie</div>
            <div class="card-body">
                <form action="{{ route('authenticate') }}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="login" class="col-md-4 col-form-label text-md-end text-start">Login</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('login') is-invalid @enderror" id="login" name="login" value="{{ old('login') }}">
                            @if ($errors->has('login'))
                                <span class="text-danger">{{ $errors->first('login') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-md-4 col-form-label text-md-end text-start">Hasło</label>
                        <div class="col-md-6">
                          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Zaloguj się">
                    </div>
                    
                </form>
            </div>
                <div class="col-sm-10 col-md-8 col-xl-6 mx-auto pt-5">
                    <a href='/register'>Nie masz jeszcze konta? Zarejestruj się -></a>
                </div>
        </div>
    </div>    
</div>
    
@endsection