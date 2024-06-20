<?php

namespace App\Http\Controllers;

use App\Models\Savings;
use Illuminate\Http\Request;

class SavingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $savings = Savings::all();
        return response()->json($savings);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'reuquired',
            'description' => 'nullable|string',
            'amount' => 'required',
            'savings_type_id' => 'required'
        ]);
        $savings = new Savings();
        $savings->name = $request->input('name');
        $savings->amount = $request->input('amount');
        $savings->description = $request->input('description');
        $savings->savings_type_id = $request->input('savings_type_id');

        $savings->save();

        return response()->json($savings);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $savings = Savings::query()->where('id', $id)->first();
        if (!$savings) {
            return response()->json('No such savings on the system', 404);
        }
        return response()->json($savings);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Savings $savings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable|string',
            'savings_type_id' => 'required',
            'amount' => 'required'
        ]);
        $savings = Savings::query()->where('id', $id)->first();
        if (!$savings) {
            return response()->json('No savings of this id', 404);
        }
        $savings->update($validatedData);

        return response()->json($savings);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $savings = Savings::query()->where('id', $id)->first();
        if (!$savings) {
            return response()->json('This saving does not exist on the system', 404);
        }
        $savings->delete();
        return response()->json('Savings deleted', 201);
    }
}
