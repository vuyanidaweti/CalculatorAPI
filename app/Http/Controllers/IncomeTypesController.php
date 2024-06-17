<?php

namespace App\Http\Controllers;

use App\Models\IncomeType;
use Illuminate\Http\Request;

class IncomeTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomeTypes = IncomeType::all();
        return response()->json($incomeTypes);
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
            'name'=>'required',
            'frequency'=>'required',
            'description'=>'required'
        ]);
        $incomeType = new IncomeType();
        $incomeType->name= $request->input('name');
        $incomeType->description= $request->input('description');
        $incomeType->frequency= $request->input('frequency');
        $incomeType->save();
        return response()->json($incomeType);
    }

    /**
     * Display the specified resource.
     */
    public function show(IncomeType $incomeType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $incomeType = IncomeType::findOrFail($id);
        $validatedData = $request->validate([
            'name'=>'required',
            'frequency'=>'required',
            'description'=>'required'
        ]);
        $incomeType->update($validatedData);
        return response()->json(['incomeType'=>$validatedData,'status'=>'IncomeType '.$id.' has been updated']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $incomeType = IncomeType::find($id);
        if(!$incomeType){
            return response()->json('Income type of Id='.$id.' does not exist on the system',404);
        }
        $incomeType->delete();
        return response()->json('Income Type of Id='.$id.' has been deleted successfully',204);
    }
    public function getById($id)
    {
        $incomeType = IncomeType::find($id);
        if(!$incomeType)
        {
            return response()->json(['error'=>'Income type of Id='.$id.' does not exist on the system'],404);
        }
        return response()->json($incomeType);
    }
}
