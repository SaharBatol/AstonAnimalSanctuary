<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Http\Request;

class AnimalController extends Controller
{

    public function index()
    {
        $animals = Animal::all ();
        $user = User::all ();

        return view ('animal.index', compact ('animals','user'));
    }


    public function create()
    {
        return view ('animal.create');
    }


    public function store(Request $request)
    {
        request () -> validate ([
            'name' => 'required|min:2|max:32',
            'breed' => 'required|min:2|max:32'
        ]);

        $attributes = $request -> all (
            'name',
            'breed'
        );

        $animal = Animal::create ($attributes);

        return redirect ($animal -> path);
    }


    public function show(Animal $animal)
    {
        return view ('animal.show', compact('animal'));
    }


    public function edit(Animal $animal)
    {
       return view ('animal.edit', compact ('animal'));
    }


    public function update(Request $request, Animal $animal)
    {
        $attributes = request () -> validate ([
            'name' => 'required|min:2|max:32',
            'breed' => 'required|min:2|max:32'
        ]);

        $animal -> update ($attributes);

        return redirect ('/');
    }


    public function destroy(Animal $animal)
    {
        $animal -> delete ();

        return redirect('/');
    }
}
