@section('content')
@extends('main')
	@php $naglowki = array("Data", "Godzina", "Lekarz", "Specjalność"); @endphp
	
    <b>Dostępne wizyty</b><br>

    <form method="GET" action="{{ route('visits.index') }}"> <!-- formularz filtrujący -->
        <div class="form-group">
            <label for="spec">Wybierz termin:</label>
            <select name="date" class="form-control">
                <option value="">Wszystkie daty</option>
                @foreach($days as $day)
                    <option value="{{$day->VisitDate}}">{{$day->VisitDate}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="spec">Wybierz specjalizację:</label>
            <select name="spec" id="spec" class="form-control">
                <option value="">Wszystkie specjalizacje</option>
                @foreach($specializations as $spec)
                    <option value="{{ $spec->Specialization }}">{{$spec->Specialization}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Filtruj</button>
    </form>
    </div>
            <a href='/visits/bookVisit'><button type='button' class='btn btn-warning'>Wyczyść filtry</button>
        </a></div>

    <form method='POST'>
		@csrf

		<table class='table table-hover mx-auto'><tr>
            @foreach($naglowki as $naglowek) 
			    <td><b>{{$naglowek}}</b></td>
		    @endforeach
		</tr> 	
			@foreach($visits as $visit)
				<tr>
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
					<input type='submit' class='btn btn-success' value='Umów wizytę' onClick="action='/'"></td>	
				</tr>	
			@endforeach

		</table>
	</form>
@endsection