<?php

namespace App\Console\Commands;

use Cache;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class GetFlights extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'flights:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get flights date info';
    /**
     * @var Client
     */
    private $client;

    /**
     * Create a new command instance.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        parent::__construct();
        $this->client = $client;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $response = $this->client->get('https://api.flightradar24.com/common/v1/airport.json?plugin[]=&plugin-setting[schedule][mode]=&plugin-setting[schedule]&page=1', [
            'query' => [
                'code' => 'gyd',
                'limit' => 5
            ]
        ])->getBody()->getContents();

        $data = json_decode($response, true)['result']['response']['airport']['pluginData'];

        $departures = $this->parseFlightsData($data['schedule']['departures']['data']);
        $arrivals = $this->parseFlightsData($data['schedule']['arrivals']['data']);

        Cache::put('departures', $departures, 60);
        Cache::put('arrivals', $arrivals, 60);
    }


    /**
     * @param array $flights_data
     * @return array
     */
    private function parseFlightsData(array $flights_data) :array
    {
        $flights = [];

        foreach ($flights_data as $flight) {
            $flight_data = $flight['flight'];

            $parsed_data = [
                'flight_number' => $flight_data['identification']['number']['default'],
                'status' => $flight_data['status']['text'],
//                'destination_airport' => $flight_data['airport']['destination']['name'],
                'airline' => str_replace(' ', '_', $flight_data['airline']['short'] ?? $flight_data['airline']['name']),
                'aircraft' => $flight_data['aircraft']['model']['code'],
                'departure_time' => Carbon::createFromTimestamp($flight_data['time']['scheduled']['departure'], 'Asia/Baku'),
                'arrival_time' => Carbon::createFromTimestamp($flight_data['time']['scheduled']['arrival'], 'Asia/Baku')
            ];

            $parsed_data['status'] = str_replace('Estimated dep', 'Приблизительный вылет', $parsed_data['status']);

            $parsed_data['status'] = str_replace('Estimated', 'Приблизительно', $parsed_data['status']);

            $parsed_data['status'] = str_replace('Scheduled', 'В очереди', $parsed_data['status']);

            $parsed_data['status'] = str_replace('Delayed', 'Задержан', $parsed_data['status']);


            if (isset($flight_data['airport']['destination']['position']['region']['city'])) {
                $parsed_data['to'] = $flight_data['airport']['destination']['position']['region']['city'];
            } else {
                $parsed_data['from'] = $flight_data['airport']['origin']['position']['region']['city'];
            }

            $flights[] = $parsed_data;
        }

        return $flights;
    }
}
