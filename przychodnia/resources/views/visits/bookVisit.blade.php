@section('content')
@extends('main')
	@php
        $naglowki = array("#", "Data", "Godzina", "Lekarz", "Specjalność", "");
        $counter = 1;
    @endphp

<div class="container">
    <div class="row">
        <h1 class="pt-5 pb-3">Dostępne wizyty</h1><br>
    </div>
    <div class="row">
        <div class="container">
            <form method="GET" action="{{ route('visits.index') }}"> <!-- formularz filtrujący -->
                <div class="form-group">
                    <label for="date">Wybierz termin:</label>
                    <select name="date" id="date" class="form-control mt-3">
                        <option value="">Wszystkie daty</option>
                        @foreach($days as $day)
                            <option value="{{$day->VisitDate}}">{{$day->VisitDate}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="spec">Wybierz specjalizację:</label>
                    <select name="spec" id="spec" class="form-control mt-3">
                        <option value="">Wszystkie specjalizacje</option>
                        @foreach($specializations as $spec)
                            <option value="{{ $spec->Specialization }}">{{$spec->Specialization}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Filtruj</button>
            </form>
            <a href='/visits/index'><button type='button' class='btn btn-warning'>Wyczyść filtry</button></a>
        </div>
    </div>

    <div class="row mt-5">
        <form method='POST'>
            @csrf

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
                        		<input type='submit' class='btn btn-success' value='Umów wizytę' onClick="action='/visits/bookVisit/{{ $visit->id }}'"></td>
                    </tr>
                @endforeach

            </table>
        @endif
        </form>
    </div>

</div>


@endsection
