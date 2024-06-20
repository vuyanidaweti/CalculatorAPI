<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseType;
use http\Env\Response;
use Illuminate\Http\Request;

class ExpenseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenseType = Expense::all();
        return response()->json($expenseType);
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
            'description' => 'required',

        ]);
        $expenseType = new ExpenseType();
        $expenseType->name = $request->input('name');
        $expenseType->description = $request->input('description');
        $expenseType->save();

        return response()->json($expenseType);
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
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
            'description' => 'required'
        ]);
        $expenseType = ExpenseType::query()->where('id', $id)->first();
        if (!$expenseType) {
            return response()->json('This expense type does not exist', 404);
        }
        $expenseType->update($validatedData);
        return response()->json('Updated', 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $expenseType = ExpenseType::query()->where('id', $id)->first();
        if (!$expenseType) {
            return response()->json('This expense type does not exist ', 404);
        }
        $expenseType->delete();

        return response()->json('Expense type deleted', 204);
    }
}
