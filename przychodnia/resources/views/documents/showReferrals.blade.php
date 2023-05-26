@section('content')
    @extends('main')

    @php
        $naglowki = array("#", "Data wystawienia", "Sygnatura", "Lekarz");
        $counter = 1;
    @endphp

    <form method='POST'>
        @csrf
        <h1 class="pt-5 pb-3">Twoje skierowania na badania</h1><br>

        @if($referrals->isEmpty())
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

            @foreach($referrals as $referral)
                <tr>
                    <td>{{$counter++}}</td>
                    @foreach($referral->getAttributes() as $p=>$pole)
                        @switch($p)
                            @case('IssueDate')
                                <td>{{$pole}}</td>
                                @break
                            @case('Signature')
                                <td>{{$pole}}</td>
                                @break
                        @endswitch
                    @endforeach
                    @foreach($referral->getAttributes() as $p=>$pole)
                        @if($p == 'DoctorId')
                            <td>{{$referral->doctor->FirstName ?? 'No data'}} {{$referral->doctor->LastName ?? 'No data'}}</td>
                        @endif
                    @endforeach
                </tr>
            @endforeach

        </table>
        @endif
    </form>

@endsection
