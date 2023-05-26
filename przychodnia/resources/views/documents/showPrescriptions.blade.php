@section('content')
    @extends('main')

    @php $naglowki = array("Rodzaj", "Lekarz", "Data", "Sygnatura"); @endphp
    <form method='POST'>
        @csrf
        <b>Recepty</b><br>
        <table border = 1><tr>
                @foreach($naglowki as $naglowek)
                    <td><b>{{$naglowek}}</b></td>
                @endforeach
            </tr>

            @foreach($prescriptions as $prescription)
                <tr>
                    @foreach($prescription->getAttributes() as $p=>$pole)
                        @switch($p)
                            @case('IssueDate')
                                <td>{{$pole}}</td>
                                @break
                            @case('Signature')
                                <td>{{$pole}}</td>
                                @break
                        @endswitch
                    @endforeach
                    @foreach($prescription->getAttributes() as $p=>$pole)
                        @if($p == 'DoctorId')
                            <td>{{$prescription->doctor->FirstName}} {{$prescription->doctor->LastName}}</td>
                        @endif
                    @endforeach
                </tr>
            @endforeach

        </table>
    </form>

@endsection
