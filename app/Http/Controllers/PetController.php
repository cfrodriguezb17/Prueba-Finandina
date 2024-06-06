<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;


class PetController extends Controller
{
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string',
        //     'type' => 'required|string',
        //     'age' => 'required|integer',
        //     'breed' => 'required|string',
        //     'user_id' => 'required|exists:users,id',
        // ]);

        // $pet = Pet::create($request->all());
        $pet = new Pet($request->all());
        $pet->user_id = Auth::id();
        $pet->save();

        // return response()->json($pet, 201);
        // return Inertia::render('home', ['products' => $products]);
        // return redirect()->intended(route('home', absolute: false));
        return redirect()->route('home');
    }

    public function show($id)
    {
        $pet = Pet::findOrFail($id);

        return response()->json($pet);
    }
    public function create()
    {
        return inertia('Views/DatosMascota');
    }
    public function info()
    {
        return inertia('Views/Historia');
    }
}