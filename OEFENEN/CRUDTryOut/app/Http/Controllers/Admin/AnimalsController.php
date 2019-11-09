<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Animal;
use App\Species;
use Gate;
use App\Http\Controllers\Controller;

class AnimalsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $animals = Animal::with('species')->get(); // Eager loading 
        $species = Species::all(); // To show possible filters
        return view('admin.animals.index', compact('animals', 'species'));
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
            'food' => 'required',
            
        ]);
        $animal = new Animal([
            'name'  =>  $request->get('name'),
            'date_birth' => $request->get('date_birth'),
            'gender' => $request->get('gender'),
            'species_id' => $request->get('species_id'),
            'food' => $request->get('food'),
            'description' => $request->get('description')

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
    public function show($id) //
    {
        $animal = Animal::find($id);

            if($animal != "")
            {
                return view('admin.animals.details', compact('animal', 'id'));
            } 
            else
            {
                return redirect()->route('admin.animals.index');
            }
        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailsEmployee(Request $request)
    {
        $id        = $request->get('id');
        $myanimal = Animal::find($id);

        // $user = auth()->user();
        // $myspecies = $user->species()->get();

        
        // if($myanimal = Animal::whereIn('species_id', 'LIKE', $myspecies->pluck('id')))
        // {
            return view('employee.animals.details', compact('myanimal', 'id'));
        // }

        // return view('employee.animals.index');

    
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
        $species = Species::all();
        if($animal != "")
        {
            return view('admin.animals.edit', compact('species', 'animal', 'id'));
        }
        else
        {
            return redirect()->route('admin.animals.index');
        }
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
            'gender' => 'required',
            'species_id' => 'required',
            'food' => 'required'
        ]);
        $animal = Animal::find($id);
        $animal->name           =       $request->get('name');
        $animal->date_birth     =       $request->get('date_birth');
        $animal->gender         =       $request->get('gender');
        $animal->species_id     =       $request->get('species_id');
        $animal->food           =       $request->get('food');
        $animal->description    =       $request->get('description');
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
  
    




    public function getSearch(Request $request){

        $species = Species::all();
        $animalSpecies = $request->get('speciesId'); 
        $search = $request->get('search');


        if($search != "" && $animalSpecies == ""){                  // ONLY SEARCH
            $animals = Animal::where('name', 'LIKE', '%' . $search . '%')
                                ->orWhere('id', 'LIKE', '%' . $search . '%')->get();
       
            if(count($animals) > 0)
                return view('admin.animals.index', ['animals' => $animals], compact('search', 'species', 'animalSpecies'));
        }

        elseif($search != "" && $animalSpecies != ""){              // SEARCH AND THEN FILTER
            $animals = Animal::where(function($query) use ($animalSpecies, $search)
                    { 
                        for($i = 0; $i < count($animalSpecies); $i++)
                        {
                            if($i==0)
                            {
                                $query->where('species_id', 'LIKE', $animalSpecies[$i])->where('name', 'LIKE', '%' . $search . '%')
                                ->orWhere('id', 'LIKE', '%' . $search . '%');
                            } 
                            else 
                            {
                                $query->orWhere('species_id', 'LIKE', $animalSpecies[$i])->where('name', 'LIKE', '%' . $search . '%')
                                ->orWhere('id', 'LIKE', '%' . $search . '%');
                            }
                        }
                    
                    })
                    ->get();

            if(count($animals) > 0)
                return view('admin.animals.index', ['animals' => $animals], compact('search', 'species', 'animalSpecies'));
        }

        else{
            return redirect()->route('admin.animals.index');
        }
        return view('admin.animals.index', compact('search', 'species', 'animalSpecies'));
    }

    public function getSearchEmployee(Request $request){

        $user = auth()->user();
        
        $myspecies = $user->species()->get();
        $search = $request->get('search');
        if($search != ""){
            $myanimals = Animal::where('name', 'LIKE', '%' . $search . '%')->where('species_id', 'LIKE', $myspecies->pluck('id'))
                                ->orWhere('id', 'LIKE', '%' . $search . '%')->where('species_id', 'LIKE', $myspecies->pluck('id'))->get();
       
            if(count($myanimals) > 0)
                return view('employee.animals.index', ['myanimals' => $myanimals], compact('search', 'myspecies'));
        }

        else{
            return redirect()->route('employee.animals.index');
        }
        return view('employee.animals.index', compact('search', 'myspecies'));
    }





    

    public function getFilter(Request $request){

        $species = Species::all();

        $animalSpecies = $request->get('speciesId');            // The selected filters
        $search = $request->get('search');
  

        
            if($animalSpecies != "" && $search == "")                   //ONLY FILTER
            {
                $animals = Animal::where(function($query) use ($animalSpecies)
                { 
                    for($i = 0; $i < count($animalSpecies); $i++)
                    {
                        if($i==0)
                        {
                            $query->where('species_id', 'LIKE', $animalSpecies[$i]);
                        } 
                        else 
                        {
                            $query->orWhere('species_id', 'LIKE', $animalSpecies[$i]);
                        }
                    }
                
                })
                ->get();
            }

                elseif($animalSpecies != "" && $search != "")              //FILTER AND THEN SEARCH
                {
                    $animals = Animal::where(function($query) use ($animalSpecies, $search)
                    { 
                        for($i = 0; $i < count($animalSpecies); $i++)
                        {
                            if($i==0)
                            {
                                $query->where('species_id', 'LIKE', $animalSpecies[$i])->where('name', 'LIKE', '%' . $search . '%')
                                ->orWhere('id', 'LIKE', '%' . $search . '%');
                            } 
                            else 
                            {
                                $query->orWhere('species_id', 'LIKE', $animalSpecies[$i])->where('name', 'LIKE', '%' . $search . '%')
                                ->orWhere('id', 'LIKE', '%' . $search . '%');
                            }
                        }
                    
                    })
                    ->get();
                }

                if($animalSpecies != "")
                {
        // The next piece of code makes sure the chosen filter is linked to the species name.
        // This way, I can show the chosen filters (with the right species names) on the webpage.
                $specieName = Species::where(function($query) use ($animalSpecies)
                { 
                    for($i = 0; $i < count($animalSpecies); $i++)
                    {
                        if($i==0)
                        {
                            $query->where('id', 'LIKE', $animalSpecies[$i]);
                        } 
                        else 
                        {
                            $query->orWhere('id', 'LIKE', $animalSpecies[$i]);
                        }
                    }
                
                })
                ->get();
        //      

                
                if(count($animals) > 0)
                {
                    return view('admin.animals.index', ['animals' => $animals], compact('animalSpecies', 'specieName', 'species', 'search'));
                }

            }

            else
            {
                return redirect()->route('admin.animals.index', 'search');
            }
       

        return view('admin.animals.index', compact('species', 'animalSpecies', 'specieName', 'search'));
    }
       

    public function myAnimals()
    {
      
        // Retrieves the animals of a specific user / animal caretaker
        $user = auth()->user();
   
        $myspecies = $user->species()->get();
        $myanimals = Animal::where('species_id', 'LIKE', $myspecies->pluck('id'))->get();


            return view('employee.animals.index', compact('myspecies', 'myanimals'));
        


    }

    public function editDescription(Request $request)
    {
        $id = $request->get('id');
        $myanimal = Animal::find($id);
        $user = auth()->user();
        $myspecies = $user->species()->get();

        return view('employee.animals.description', compact('myanimal', 'myspecies'));
    }

    public function updateDescription(Request $request)
    {
        $user = auth()->user();
        $myspecies = $user->species()->get();

        $id = $request->get('id');
        
        // function validate($id, $myspecies)
        // {

        //         if(Animal::where(function($query) use ($id, $myspecies)

        //         { 
        //             $query->where('species_id', 'LIKE', $myspecies->pluck('id'))->where('id', 'LIKE', $id);
                
        //         })){
        //             return true;
        //         }
        //         else { return false;}
        // }

        // print_r(validate($id, $myspecies));
        // if(validate($id, $myspecies) != false)
        // {

            if(Gate::denies('write-comment'))
            {
                $myanimals = Animal::where('species_id', 'LIKE', $myspecies->pluck('id'))->get();
                return view('employee.animals.index', compact('myanimals', 'myspecies'));
            }
            else {
          
                $myanimal = Animal::find($id);

                $myanimal->description    =       $request->get('description');
                $myanimal->save();
                $myanimals = Animal::where('species_id', 'LIKE', $myspecies->pluck('id'))->get();

                return view('employee.animals.index', compact('myanimals', 'myspecies'));
        // }
       
        // }
            }
    }
}
