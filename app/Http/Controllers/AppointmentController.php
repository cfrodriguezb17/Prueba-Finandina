<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Pet;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;


class AppointmentController extends Controller
{
    public function store(Request $request)
    {
    //     $request->validate([
    //         'type' => 'required|string',
    //         'date' => 'required|date',
    //         'pet_id' => 'required|exists:pets,id',
    //     ]);

    //     $appointment = Appointment::create($request->all());

    //     // return response()->json($appointment, 201);
    //     return Inertia::render('Views/Citas');
        $appointment = new Appointment($request->all());
        $appointment->save();
        return redirect(route('home2'));
    }

    public function index()
    {
        $appointments = Appointment::all();

        return response()->json($appointments);
    }
    public function create()
    {
        $userId = Auth::id();
        $pets = Pet::where('user_id', $userId)->get();
        return inertia('Views/PedirCita', ['pets' => $pets]);
    }
    public function list()
    {
        $userId = Auth::id();
        $petIds = Pet::where('user_id', $userId)->pluck('id');
        $appointments = Appointment::whereIn('pet_id', $petIds)->get();
        return inertia('Views/Citas', ['appointments' => $appointments]);
    }
    public function list2()
    {
        $userId = Auth::id();
        $petIds = Pet::where('user_id', $userId)->pluck('id');
        $appointments = Appointment::whereIn('pet_id', $petIds)->get();
        return inertia('Views/Citas', ['appointments' => $appointments]);
    }
}