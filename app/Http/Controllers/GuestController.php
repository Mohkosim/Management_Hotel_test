<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('guests.index', ['title' => 'Guests', 'guests' => Guest::latest()->filter(request(['search']))->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guests.create', ['title' => 'Create Guest']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:guests',
            'phone' => 'required|unique:guests',
            'gender' => 'required|in:Male,Female',
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'address' => 'required',
            'postal_code' => 'required'
        ]);

        Guest::create($validatedData);

        return redirect('/guests')->with('success', 'New guest has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guest $guest)
    {
        return view('guests.show', ['title' => $guest->name, 'guest' => $guest]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guest $guest)
    {
        return view('guests.edit', ['title' => $guest->name, 'guest' => $guest]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guest $guest)
    {
        $rules = [
            'name' => 'required',
            'gender' => 'required|in:Male,Female',
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'address' => 'required',
            'postal_code' => 'required'
        ];

        if ($request->email != $guest->email || $request->phone != $guest->phone) {
            $rules['email'] = 'required|unique:guests';
            $rules['phone'] = 'required|unique:guests';
        }

        $validatedData = $request->validate($rules);


        Guest::where('id', $guest->id)
            ->update($validatedData);

        return redirect('/guests')->with('success', 'Guest has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guest $guest)
    {
        Guest::destroy($guest->id);

        return redirect('/guests')->with('success', 'Guest has been deleted!');
    }
}
