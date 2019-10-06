<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Species;
use App\Http\Controllers\Controller;

class SpeciesController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $species = Animal::all();
        // return view('admin.animals.index', compact('animals'));
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

}
