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
    public function index()
    {
        $data = Weather::all();
        $dates = $data->pluck('created_at')->toArray();
        $temperature = $data->pluck('temperature')->toArray();
        $humidity = $data->pluck('humidity')->toArray();
        $voltage = $data->pluck('voltage')->toArray();
        for($i=0; $i<count($dates);++$i){
            $temp_data[] = [$dates[$i]->timestamp*1000, $temperature[$i]];
            $hum_data[] = [$dates[$i], $humidity[$i]];
            $volt_data[] = [$dates[$i], $voltage[$i]];
        }
        $temp_data =json_encode($temp_data);
        return view('welcome', compact('data', 'temp_data')); 
        
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
