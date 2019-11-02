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

        return view('employee.animals.details', compact('myanimal', 'id'));
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
        $search = $request->get('search');
        if($search != ""){
            $animals = Animal::where('name', 'LIKE', '%' . $search . '%')
                                ->orWhere('id', 'LIKE', '%' . $search . '%')->paginate(5);
       
            if(count($animals) > 0)
                return view('admin.animals.index', ['animals' => $animals], compact('search', 'species'));
        }

        else{
            return redirect()->route('admin.animals.index');
        }
        return view('admin.animals.index', compact('search', 'species'));
    }

    public function getSearchEmployee(Request $request){

        $user = auth()->user();
        
        $myspecies = $user->species()->get();
        $search = $request->get('search');
        if($search != ""){
            $myanimals = Animal::where('name', 'LIKE', '%' . $search . '%')->where('species_id', 'LIKE', $myspecies->pluck('id'))
                                ->orWhere('id', 'LIKE', '%' . $search . '%')->where('species_id', 'LIKE', $myspecies->pluck('id'))->paginate(5);
       
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
  

        
            if($animalSpecies != "")
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
                    return view('admin.animals.index', ['animals' => $animals], compact('animalSpecies', 'specieName', 'species'));
                }

            }

            else
            {
                return redirect()->route('admin.animals.index');
            }
       

        return view('admin.animals.index', compact('species', 'animalSpecies', 'specieName'));
    }
       

    public function getFilterEmployee(Request $request){

        $user = auth()->user();
        
        $myspecies = $user->species()->get();

        $animalSpecies = $request->get('speciesId');        // The selected filters
  

        
            if($animalSpecies != "")
            {
                $myanimals = Animal::where(function($query) use ($animalSpecies)
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

                
                if(count($myanimals) > 0)
                {
                    return view('employee.animals.index', ['myanimals' => $myanimals], compact('animalSpecies', 'specieName', 'myspecies'));
                }

            }

            else
            {
                return redirect()->route('employee.animals.index');
            }
       

        return view('employee.animals.index', compact('myspecies', 'animalSpecies', 'specieName'));
    }
       

    public function updateStatus(Request $request) 
    { 
        $id = $request->get('id');
        $animal = Animal::find($id);
        $animal->name = $request->get('name');
        $animal->save();
        
        return redirect()->route('admin.animals.index')->with('success', 'Data Updated');
    }


    public function myAnimals()
    {
      
        // Retrieves the animals of a specific user / animal caretaker
        $user = auth()->user();
   
        $myspecies = $user->species()->get();
        $myanimals = Animal::where('species_id', 'LIKE', $myspecies->pluck('id'))->get();


            return view('employee.animals.index', compact('myspecies', 'myanimals'));
        


    }
}
