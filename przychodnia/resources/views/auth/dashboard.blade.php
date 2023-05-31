{{--@extends('auth.layouts')--}}
@extends('main')

@section('content')

    <div class="row px-5">
        <div class="container ps-5">
            @if ($message = Session::get('success'))
                <div class="alert alert-success ">
                    {{ $message }}
                </div>
            @else
                <div class="alert alert-success">
                    Pomyślnie zalogowano!
                </div>

            @endif
        </div>
    </div>

@endsection
