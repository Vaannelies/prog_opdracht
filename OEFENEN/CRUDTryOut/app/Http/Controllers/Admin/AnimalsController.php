<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Animal;
use App\Species;
use App\Http\Controllers\Controller;

class AnimalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::all();
        return view('admin.animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $species = Species::all();
        return view('admin.animals.create', compact('species'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  =>  'required',
            'date_birth' => 'required',
            'gender' => 'required',
            'species_id' => 'required',
            'food' => 'required'
        ]);
        $animal = new Animal([
            'name'  =>  $request->get('name'),
            'date_birth' => $request->get('date_birth'),
            'gender' => $request->get('gender'),
            'species_id' => $request->get('species_id'),
            'food' => $request->get('food')

        ]);
        $animal->save();
        return redirect()->route('admin.animals.index')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = Animal::find($id);
        return view('admin.animals.details', compact('animal', 'id'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal = Animal::find($id);
        return view('admin.animals.edit', compact('animal', 'id'));
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
        $this->validate($request, [
            'name'  =>  'required',
            'date_birth' => 'required',
            'gender' => 'required'
        ]);
        $animal = Animal::find($id);
        $animal->name           =       $request->get('name');
        $animal->date_birth     =       $request->get('date_birth');
        $animal->gender         =       $request->get('gender');
        $animal->save();
        return redirect()->route('admin.animals.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal = Animal::find($id);
        $animal->delete();
        return redirect()->route('admin.animals.index')->with('success', 'Data Deleted');
    }


    public function search($request)
    {
        $animal = Animal::find($request);
        return view('admin.animals.index', compact('animal', 'id'));

    }



    public function getSearch(Request $request){

    $this->validate($request, [
        'request'  =>  'required'
    ]);

    $result = Animal::all();
    $result->search($this);
    
    return redirect()->route('admin.animals.index')->with('result');

    }


    public function hoi() {

    }

    public function updateStatus(Request $request, $id) 
    { 
        $this->validate($request, [
            'name'  =>  'required',
           
        ]);


        $animal = Animal::find($id);
        $animal->name = $request->get('name');
        
        $animal->save();

        return redirect()->route('admin.animals.index')->with('success', 'Data Updated');
    }
}