@extends('layouts.app')


@section('content')

    <div class="flights">
        <h2>Прибытие</h2>
        <div class="table-wrapper table-container">
            <table class="table flights__table">
                <thead>
                <tr>
                    <th>Авиакомпания</th>
                    <th>Время прибытия</th>
                    <th>Город (аэропорт)</th>
                    <th>Рейс</th>
                    <th>Статус</th>
                </tr>
                </thead>
                <tbody>

                @foreach($arrivals as $arrival)
                    <tr>
                        <td class="airline-img">
                            <img src="{{ asset('images/airlines/'.$arrival['airline'].'.svg') }}" alt="">
                        </td>

                        <td><b>{{ $arrival['arrival_time']->format('H:i') }}</b></td>

                        <td><b>{{ $arrival['from'] }}</b></td>
                        <td>{{ $arrival['flight_number'] }}</td>
                        <td>{{ $arrival['status'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <h2>Отправка</h2>
        <div class="table-wrapper table-container">
            <table class="table flights__table">
                <thead>
                <tr>
                    <th>Авиакомпания</th>
                    <th>Время вылета</th>
                    <th>Город (аэропорт)</th>
                    <th>Рейс</th>
                    <th>Статус</th>
                </tr>
                </thead>
                <tbody>

                @foreach($departures as $departure)
                    <tr>
                        <td class="airline-img">
                            <img src="{{ asset('images/airlines/'.$departure['airline'].'.svg') }}" alt="">
                        </td>

                        <td><b>{{ $departure['arrival_time']->format('H:i') }}</b></td>

                        <td><b>{{ $departure['to'] }}</b></td>
                        <td>{{ $departure['flight_number'] }}</td>
                        <td>{{ $departure['status'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


    </div>


@endsection