@extends('main')

@section('content')

    <div class="col-sm-10 col-md-8 col-xl-6 mx-auto ">
            <h1 class="pt-5 pb-3">Moje dane</h1><br>

            <form method="POST" action="{{ route('patients.update',  Auth::user()->id)  }}">
                @csrf
                @method('POST')

                <div class="col-12 position-relative py-2">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('login') is-invalid @enderror" name="login" value='{{ Auth::user()->login }}' id="login" placeholder="login">
                            @if ($errors->has('login'))
                                <span class="text-danger">{{ $errors->first('login') }}</span>
                            @endif
                        <label for="login" class="form-label">Login</label>
                    </div>
                </div>
                <div class="col-12 position-relative py-2">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('FirstName') is-invalid @enderror" name="FirstName" value='{{ Auth::user()->FirstName }}' id="FirstName" placeholder="FirstName">
                            @if ($errors->has('FirstName'))
                                <span class="text-danger">{{ $errors->first('FirstName') }}</span>
                            @endif
                        <label for="FirstName" class="form-label">Imię</label>
                    </div>
                </div>
                <div class="col-12 position-relative py-2">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('LastName') is-invalid @enderror" name="LastName" value='{{ Auth::user()->LastName }}' id="LastName" placeholder="LastName">
                            @if ($errors->has('LastName'))
                                <span class="text-danger">{{ $errors->first('LastName') }}</span>
                            @endif
                        <label for="login" class="form-label">Nazwisko</label>
                    </div>
                </div>
                <div class="col-12 position-relative py-2">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="BirthDate" value='{{ Auth::user()->BirthDate }}' id="BirthDate" placeholder="BirthDate">
                            @if ($errors->has('BirthDate'))
                                <span class="text-danger">{{ $errors->first('BirthDate') }}</span>
                            @endif 
                        <label for="BirthDate" class="form-label">Data urodzenia (yyyy-mm-dd)</label>
                    </div>
                </div>
                <div class="col-12 position-relative py-2">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('PESEL') is-invalid @enderror" name="PESEL" value='{{ Auth::user()->PESEL }}' id="PESEL" placeholder="PESEL">
                            @if ($errors->has('PESEL'))
                                <span class="text-danger">{{ $errors->first('PESEL') }}</span>
                            @endif                    
                        <label for="PESEL" class="form-label">PESEL</label>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Zapisz</button>
                </div>
                
            </form>

            <div>Uwaga: ta operacja będzie nieodwracalna!</div>
            <div class="col-12">
                <form method="POST" action="{{ route('patients.delete',  Auth::user()->id)   }}">
                    @csrf
                    @method('POST')
                    <button class="btn btn-danger" type="submit">Usuń konto</button>
                </form>
            </div>
            <div class="col-12">
                <input type='submit' value='Usuń konto' onClick="action='patients/{{Auth::user()->id}}/delete'">
            </div>
    </div>

@endsection
