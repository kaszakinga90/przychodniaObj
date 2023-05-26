@section('content')
    @extends('main')

    @php
        $naglowki = array("#", "Data wystawienia", "Sygnatura", "Lekarz");
        $counter = 1;
    @endphp

    <form method='POST'>
        @csrf
        <h1 class="pt-5 pb-3">Twoje recepty</h1><br>

        @if($prescriptions->isEmpty())
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

            @foreach($prescriptions as $prescription)
                <tr>
                    <td>{{$counter++}}</td>
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
                            <td>{{$prescription->doctor->FirstName ?? 'No data'}} {{$prescription->doctor->LastName ?? 'No data'}}</td>
                        @endif
                    @endforeach
                </tr>
            @endforeach

        </table>
        @endif
    </form>

@endsection
