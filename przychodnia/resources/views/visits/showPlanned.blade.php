@section('content')
@extends('main')
	@php
        $naglowki = array("#", "Data", "Godzina", "Lekarz", "Specjalność", "");
        $counter = 1;
    @endphp

    <div class="container">
        <div class="row">
            <h1 class="pt-5 pb-3">Zaplanowane wizyty</h1><br>
        </div>
        <div class="row">
            <div class="container">
                <form method="POST">
                    @csrf

                    <div class="row mt-4">
                        @if($visits->isEmpty())
                            <p>No results found</p>
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
                                        <td align='center'>
                                            <input type='submit' class='btn btn-danger' value='Odwołaj' onClick="action='/visits/showPlanned/{{ $visit->id }}'"></td>
                                    </tr>
                                @endforeach

                            </table>
                        @endif
                    </div>


                </form>
            </div>
        </div>

    </div>

@endsection
