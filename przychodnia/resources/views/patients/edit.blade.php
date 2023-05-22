@extends('main')

@section('content')

    <div>Halo halo tu test :)</div>

    <div class="col-sm-10 col-md-8 col-xl-6 mx-auto ">
        <h1 class="pt-5 pb-3">Moje dane</h1><br>

        <form method="POST" action="{{ route('patients.update',  Auth::user()->id)  }}">
            @csrf
            @method('POST')

            <div class="col-12 position-relative py-2">
                <div class="form-floating">
                    <input type="text" class="form-control" name="login" value='{{ Auth::user()->login }}' id="login" placeholder="login">
                    <label for="login" class="form-label">Login</label>
                </div>
            </div>
            <div class="col-12 position-relative py-2">
                <div class="form-floating">
                    <input type="text" class="form-control" name="FirstName" value='{{ Auth::user()->FirstName }}' id="FirstName" placeholder="FirstName">
                    <label for="FirstName" class="form-label">First Name</label>
                </div>
            </div>
            <div class="col-12 position-relative py-2">
                <div class="form-floating">
                    <input type="text" class="form-control" name="LastName" value='{{ Auth::user()->LastName }}' id="LastName" placeholder="LastName">
                    <label for="login" class="form-label">Last Name</label>
                </div>
            </div>
            <div class="col-12 position-relative py-2">
                <div class="form-floating">
                    <input type="text" class="form-control" name="BirthDate" value='{{ Auth::user()->BirthDate }}' id="BirthDate" placeholder="BirthDate">
                    <label for="BirthDate" class="form-label">Birth Date</label>
                </div>
            </div>
            <div class="col-12 position-relative py-2">
                <div class="form-floating">
                    <input type="text" class="form-control" name="PESEL" value='{{ Auth::user()->PESEL }}' id="PESEL" placeholder="PESEL">
                    <label for="PESEL" class="form-label">PESEL</label>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Zapisz</button>
            </div>
        </form>
    </div>

@endsection
