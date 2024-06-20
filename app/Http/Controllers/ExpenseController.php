<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::all();
        return response()->json($expenses);
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
            "name" => 'required',
            'description' => 'nullable|string',
            'expense_type_id' => 'required',
            'amount' => 'required'
        ]);
        $expense = new Expense();
        $expense->name = $request->input('name');
        $expense->description = $request->input('description');
        $expense->expense_type_id = $request->input('expense_type_id');
        $expense->amount = $request->input('amount');

        $expense->save();
        return response()->json($expense);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $expense = Expense::query()->where('id', $id)->first();
        return response()->json($expense);
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
            'amount' => 'required',
            'description' => 'nullable|string',
            'expense_type_id' => 'required'
        ]);
        $expense = Expense::query()->where('id', $id)->first();
        if (!expense) {
            return response()->json('No expense of this id', 404);
        }
        return response()->json($expense);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $expense = Expense::query()->where('id', $id)->first();
        if (!$expense) {
            return response()->json('This expense doesnt exist on the system ');
        }
        $expense->delete();
        return response()->json('Deleted', 204);
    }
}
