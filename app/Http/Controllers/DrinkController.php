<?php

namespace App\Http\Controllers;

use App\Models\Drinks;
use Illuminate\Http\Request;

class DrinkController extends Controller
{

    public function index()
    {
        return response()->json(Drinks::all());
    }

    public function store(Request $request)
    {
        $drink = Drinks::create($request->all());

        return response()->json($drink, 201); //
    }

    public function show(string $id)
    {
        $drink = Drinks::find($id);
        if (!$drink) {
            return response()->json(['error' => 'Drink não cadastrado.'], 404);
        }
        return response()->json($drink);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $drink = Drinks::find($id);
        if (!$drink) {
            return response()->json(['erro' => 'Drink não existe'], 404);
        }
        $drink->update($request->all());
        return response()->json($drink); //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $drink = Drinks::find($id);
        if (!$drink) {
            return response()->json(['error' => 'Drink não encontrado.'], 404);
        }
        
        $drink->delete();
        
        return [
            "status" => 'success',
            "message" => "Drink deleted successfully"
        ];
    }
}
