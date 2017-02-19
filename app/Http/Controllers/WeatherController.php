<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weather;
use Carbon;

class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date_last_item = Weather::latest()->first();
        $date_last_item = $date_last_item->created_at;
        switch($request->period){
            case "1h":
                $date_first_item = $date_last_item->copy()->subHours(1);
                $data = Weather::whereBetween('created_at', array($date_first_item, $date_last_item))->get();
                break;
            case "1w":
                $date_first_item = $date_last_item->copy()->subWeek();
                $data = Weather::whereBetween('created_at', array($date_first_item, $date_last_item))->get();
                break;
            case "all":
                $data = Weather::all();
                break;
            case "24h":
            default:
                $date_first_item = $date_last_item->copy()->subHours(24);
                $data = Weather::whereBetween('created_at', array($date_first_item, $date_last_item))->get();
                break;
            }
        
        $dates = $data->pluck('created_at')->toArray();
        $temperature = $data->pluck('temperature')->toArray();
        $humidity = $data->pluck('humidity')->toArray();
        $voltage = $data->pluck('voltage')->toArray();
        for($i=0; $i<count($dates);++$i){
            $temp_data[] = [$dates[$i]->timestamp*1000, $temperature[$i]];
            $hum_data[] = [$dates[$i]->timestamp*1000, $humidity[$i]];
            $volt_data[] = [$dates[$i]->timestamp*1000, $voltage[$i]];
        }
        $temp_data =json_encode($temp_data);
        $hum_data = json_encode($hum_data);
        $volt_data = json_encode($volt_data);
        return view('welcome', compact('temp_data', 'hum_data', 'volt_data')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $weather = New Weather();
        $weather->temperature = $request->temperature;
        $weather->humidity = $request->humidity;
        $weather->voltage = $request->voltage;
        $weather->save();

        return response('OK', 200)->header('Content-Type', 'text/plain');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
