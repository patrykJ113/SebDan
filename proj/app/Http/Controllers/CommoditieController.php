<?php

namespace App\Http\Controllers;

use App\Models\Commoditie;
use Illuminate\Http\Request;

class CommoditieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commodities = Commoditie::where('onOff',1)->get();
        $commoditiesOFF = Commoditie::where('onOff',0)->get();

        return view('Commoditie.index', compact('commodities','commoditiesOFF'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Commoditie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'onOff'=>'required',
        ]);
        Commoditie::create($data);

        return redirect('/commodities');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commoditie  $commoditie
     * @return \Illuminate\Http\Response
     */
    public function show(Commoditie $commoditie)
    {
        return view('Commoditie.show',compact('commoditie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commoditie  $commoditie
     * @return \Illuminate\Http\Response
     */
    public function edit(Commoditie $commoditie)
    {
        return view('Commoditie.edit', compact('commoditie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commoditie  $commoditie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commoditie $commoditie)
    {
        if(request()->query('mode') == 'ON'){
            $commoditie->onOff = 1 ;
            $commoditie->save();

            return redirect()->back();
        }else if(request()->query('mode') == 'OFF'){
            $commoditie->onOff = 0 ;
            $commoditie->save();

            return redirect()->back();
        }else{
            $data = request()->validate([
                'name'=>'required',
                'description'=>'required',
                'price'=>'required',
                'onOff'=>'required',
            ]);
            
            $commoditie->update($data);
    
            return redirect('commodities/' . $commoditie->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commoditie  $commoditie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commoditie $commoditie)
    {
        $commoditie->delete();

        return redirect('/commodities');
    }
}
