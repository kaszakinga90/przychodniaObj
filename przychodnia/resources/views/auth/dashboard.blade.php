{{--@extends('auth.layouts')--}}
@extends('main')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @else
                    <div class="alert alert-success">
                        You are logged in!
                    </div>

                    <div>
                        <a href="#">Go to main page</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
