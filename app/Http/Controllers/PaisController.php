<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;
use Illuminate\Support\Facades\DB;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paises = DB::table('tb_pais')->paginate(50);
        return view('pais.index', ['paises' => $paises]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pais.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $paises = new Pais();
        $paises->pais_codi = strtoupper($request->id);
        $paises->pais_nomb = $request->name;
        $paises->pais_capi = $request->nationality;
        $paises->save();

        return redirect()->route('paises.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pais = Pais::find($id);
        return view('pais.edit', ['pais' => $pais]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pais = Pais::find($id);

        $pais->pais_nomb = $request->name;
        $pais->pais_capi = $request->nationality;
        $pais->save();

        return redirect()->route('paises.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pais = Pais::find($id);
        $pais->delete();

        return redirect()->route('paises.index');
    }
}
