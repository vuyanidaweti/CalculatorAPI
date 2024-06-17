<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomes = Income::all();
        return response()->json($incomes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'amount'=>'required',
            'income_type_id'=>'required',
            'description'=>'nullable|string'
        ]);

        $income = new Income();
        $income->name = $request->input('name');
        $income->amount= $request->input('amount');
        $income->description= $request->input('description');
        $income->income_type_id= $request->input('income_type_id');
        $income->save();
        return response()->json($income);
    }

    /**
     * Display the specified resource.
     */
    public function show(IncomeController $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IncomeController $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $income = Income::findOrFail($id);
        $validatedData = $request->validate([
            'amount'=>'required',
            'description'=>'nullable|string',
            'income_type_id'=>'nullable|integer'
        ]);
        $income->update($validatedData);
        return response()->json($income);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $income = Income::findOrFail($id);
        $income->delete();
        return response()->json(['status'=>'income '.$id.'has been deleted successfully',204]);
    }

    public function getById($id)
    {
        $income= Income::find($id);
        if(!$income)
        {
            return response()->json(['error'=>'Income not found',404]);
        }
        return response()->json($income);
    }
}
