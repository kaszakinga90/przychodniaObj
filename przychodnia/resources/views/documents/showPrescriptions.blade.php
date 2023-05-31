@extends('main')

@section('content')
    @php
        $naglowki = array("#", "Data wystawienia", "Sygnatura", "Lekarz", "Specjalność");
        $counter = 1;
    @endphp

    <div class="container">
        <div class="row">
            <h1 class="pt-5 pb-3">Twoje recepty</h1><br>
        </div>
        <div class="row">
            <div class="container">
                <form method="GET" action="{{ route('documents.showPrescriptions') }}"> <!-- formularz filtrujący -->
                    <div class="form-group">
                        <label for="doctor">Wybierz lekarza:</label>
                        <select name="doctor" id="doctor" class="form-control mt-3">
                            <option value="">Wszyscy lekarze</option>
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->DoctorId }}">{{ $doctor->FirstName ?? 'no data'}} {{ $doctor->LastName ?? 'no data'}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Filtruj</button>
                    <a href='/documents/showPrescriptions'><button type='button' class='btn btn-warning mt-3'>Wyczyść filtry</button></a>
                </form>
            </div>
        </div>

        <div class="row mt-4">
            @if($prescriptions->isEmpty())
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
                                    <td>{{$prescription->doctor->Specialization}}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach

                </table>
            @endif
        </div>
    </div>

@endsection
