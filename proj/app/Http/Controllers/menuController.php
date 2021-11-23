<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Commoditie;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\ItemNotFoundException;

class menuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Menu.create');
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
            'title'=>'required',
            'content'=>'required',
            'onOff'=>'required',
        ]);
        Menu::create($data);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(menu $menu)
    {
        if($menu->id){
            // dd('id exists');
            return view('Menu.show',compact('menu'));
        }else{
            try{
                $menu = Menu::all()->firstOrFail();
                return view('Menu.show',compact('menu'));
            }catch(ItemNotFoundException $e){
                return view('Menu.noResults');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(menu $menu)
    {
        return view('Menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, menu $menu)
    {
        if(request()->query('mode') == 'ON'){
            $menu->onOff = 1 ;
            $menu->save();

            return redirect()->back();
        }else if(request()->query('mode') == 'OFF'){
            $menu->onOff = 0 ;
            $menu->save();

            return redirect()->back();
        }else{
            $data = request()->validate([
                'title'=>'required',
                'content'=>'required',
                'onOff'=>'required',
            ]);
            
            $menu->update($data);
    
            return redirect('menus/' . $menu->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(menu $menu)
    {
        $menu->delete();

        return redirect('/');
    }
}
