<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paises = DB::table('tb_pais')->get();
        return json_encode(['paises'=>$paises]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'pais_codi' => ['required', 'max:3'],
            'pais_nomb' => ['required', 'max:52'],
            'pais_capi' => ['nullable', 'numeric']
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información.',
                'statusCode' => 400
            ]);
        }

        $pais = new Pais();
        $pais->pais_codi = strtoupper($request->pais_codi);
        $pais->pais_nomb = $request->pais_nomb;
        $pais->pais_capi = $request->pais_capi;
        $pais->save();

        return response()->json(['pais' => $pais]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pais = Pais::find($id);
        if(is_null($pais)){
            return abort(404);
        }
        return json_encode(['pais'=>$pais]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'pais_codi' => ['required', 'max:3'],
            'pais_nomb' => ['required', 'max:52'],
            'pais_capi' => ['nullable', 'numeric']
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información.',
                'statusCode' => 400
            ]);
        }
        $pais = Pais::find($id);
        if(is_null($pais)){
            return abort(404);
        }
        $pais->pais_codi = strtoupper($request->pais_codi);
        $pais->pais_nomb = $request->pais_nomb;
        $pais->pais_capi = $request->pais_capi;
        $pais->save();

        return response()->json(['pais' => $pais]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pais = Pais::find($id);
        if(is_null($pais)){
            return abort(404);
        }
        $pais->delete();
        $paises = DB::table('tb_pais')->get();
        return response()->json(['paises' => $paises, 'success'=>true]);
    }
}
