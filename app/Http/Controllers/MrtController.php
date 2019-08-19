<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Station;
use App\Balance;
use App\Trip;
use App\Farerate;

class MrtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = Trip::all()->toArray();
        $sumfare = Trip::all()->sum('fare');
        $sumbal = Balance::all()->sum('amount');
        $balance = $sumbal-$sumfare;
        return view('mrt.index',compact('trips','balance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stations = Station::all()->toArray();
        return view('mrt.add',compact('stations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['origin' => 'required','destination' => 'required']);
        $origin = Station::all()->where('station_value',$request->get('origin'))->toArray();
        foreach ($origin as $item) {
          $org_name=$item['station_name'];
          $org_code=$item['station_code'];
          $org_value=$item['station_value'];
        }
        $destination =Station::all()->where('station_value',$request->get('destination'))->toArray();
        foreach ($destination as $dest) {
          $dest_name=$dest['station_name'];
          $dest_code=$dest['station_code'];
          $dest_value=$dest['station_value'];
        }
        $val = abs($org_value-$dest_value);
        $farerate = Farerate::all()->where('station_amount',$val)->toArray();
        foreach ($farerate as $rate) {
          $fare = $rate['fare'];
        }
        $date = date('Y-m-d H:i');
       $trip = new Trip([
         'origin'=>$org_name,
         'origin_code'=>$org_code,
         'origin_value'=>$org_value,
         'destination'=>$dest_name,
         'destination_code'=>$dest_code,
         'destination_value'=>$dest_value,
         'fare'=>$fare

       ]);

       $trip->save();
       return redirect()->route('mrt.index')->with('success','บันทึกข้อมูลสำเร็จ');

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
      $user = Trip::find($id);
      $user->delete();
      return redirect()->route('mrt.index')->with('success','ลบข้อมูลเรียบร้อย');
    }
}
