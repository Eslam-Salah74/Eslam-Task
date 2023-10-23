<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Country;
use App\Models\Shipingrate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\shipingrate\storeShipingrateRequest;
use App\Http\Requests\shipingrate\updateShipingrateRequest;

class ShipingrateController extends Controller
{
    public function index()
    {
        $shipingrates = Shipingrate::get(['id','country','rate']);

        return view('Dashboard.Shipingrate.index',compact('shipingrates'));
    }

    public function store(storeShipingrateRequest $request)
    {
    
        try {
            $validated = $request->validated();
            $shipingrates =  Shipingrate::create([
                'country'=>$request->country,
                'rate'=>$request->rate,
            ]);
            if($shipingrates)
            {
                session()->flash('success');
                return redirect()->back();
            }
            session()->flash('error');
            return redirect()->back();
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(updateShipingrateRequest $request)
    {
        try {
            $validated = $request->validated();
            $shipingrates  = Shipingrate::findOrFail($request->id);
           
            if ($shipingrates) {
                $shipingrates->update([
                    'country'=>$request->country,
                    'rate'=>$request->rate,
                ]);
                session()->flash('success');
                return redirect()->back();
            }
            session()->flash('error');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        $shipingrate = Shipingrate::findOrFail($request->id);
        if ($shipingrate) {    
            $shipingrate->delete();
            session()->flash('success');
            return redirect()->back();
        }
        session()->flash('error');
        return redirect()->back();
    }
}
