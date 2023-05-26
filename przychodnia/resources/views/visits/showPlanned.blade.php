@section('content')
@extends('main')
	@php $naglowki = array("Data", "Godzina", "Lekarz", "Specjalność"); @endphp
	<form method='POST'>
		@csrf
		<b>Zaplanowane wizyty</b><br>
		<table border = 1><tr>
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
					<input type='submit' value='Odwołaj' onClick="action='/'"></td>	
				</tr>	
			@endforeach

		</table>
	</form>
@endsection