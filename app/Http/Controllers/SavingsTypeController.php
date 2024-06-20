<?php

namespace App\Http\Controllers;

use App\Models\Savings;
use App\Models\SavingsType;
use Illuminate\Http\Request;

class SavingsTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $savingsType = SavingsType::all();
        return response()->json($savingsType);
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
            'name' => 'required',
            'description' => 'nullable|string'
        ]);
        $savingsType = new SavingsType();
        $savingsType->name = $request->input('name');
        $savingsType->description = $request->input('description');
        $savingsType->save();
        return response()->json($savingsType);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $savingsType = SavingsType::query()->where('id', $id)->first();
        if ($savingsType) {
            return response()->json('no savings type of this id', 404);
        }
        return response()->json($savingsType, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SavingsType $savingsType)
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
            'description' => 'nullable|string'
        ]);
        $savingsType = SavingsType::query()->where('id', $id)->first();
        if ($savingsType) {
            return response()->json('No saving type of this id ', 404);
        }
        $savingsType->update($validatedData);
        return response()->json($savingsType);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $savingsType = SavingsType::query()->where('id', $id)->first();
        if (!$savingsType) {
            return response()->json('No such saving id in the system', 404);
        }
        $savingsType->delete();
        return response()->json('saving type deleted !!! ', 204);
    }
}
