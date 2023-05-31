@section('content')
@extends('main')

	@php
        $naglowki = array("#", "Data", "Godzina", "Lekarz", "Specjalność");
        $counter = 1;
    @endphp

<div class="container">
    <div class="row">
        <h1 class="pt-5 pb-3">Historia</h1><br>
    </div>
    <div class="row mt-4">
        @if($visits->isEmpty())
            <p>Brak wyników</p>
        @else
            <table class="table table-hover mt-4">
                <thead>
                <tr>
                    @foreach($naglowki as $naglowek)
                        <th scope="col"><b>{{$naglowek}}</b></th>
                    @endforeach
                </tr>
                </thead>

                @foreach($visits as $visit)
                    <tr>
                        <td>{{$counter++}}</td>
                        @foreach($visit->getAttributes() as $p=>$pole)
                            @switch($p)
                                @case('VisitDate')
                                    <td>{{$pole}}</td>
                                    @break
                                @case('VisitTime')
                                    <td>{{$pole}}</td>
                                    @break
                            @endswitch
                        @endforeach
                        @foreach($visit->getAttributes() as $p=>$pole)
                            @if($p == 'DoctorId')
                                <td>{{$visit->doctor->FirstName}} {{$visit->doctor->LastName}}</td>
                                <td>{{$visit->doctor->Specialization}}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach

            </table>
        @endif
    </div>

</div>

@endsection
