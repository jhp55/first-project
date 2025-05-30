<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $municipios = DB::table('tb_municipio')
            ->join('tb_departamento', 'tb_municipio.depa_codi', '=', 'tb_departamento.depa_codi')
            ->select('tb_municipio.*', 'tb_departamento.depa_nomb')
            ->get();
        return json_encode(['municipios'=>$municipios]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'muni_nomb' => ['required', 'max:30'],
            'depa_codi' => ['required', 'numeric', 'min:1']
        ]);

        if($validate->fails()){
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información.',
                'statusCode' => 400
            ]);
        }

        $municipio = new Municipio();

        $municipio->muni_nomb = $request->muni_nomb;
        $municipio->depa_codi = $request->depa_codi;
        $municipio->save();

        return json_encode(['municipio'=>$municipio]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $municipio = Municipio::find($id);
        if(is_null($municipio)){
            return abort(404);
        }
        $departamentos = DB::table('tb_departamento')
            ->orderBy('depa_nomb')
            ->get();
        return json_encode(['municipio'=> $municipio, 'departamentos'=> $departamentos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(),[
            'muni_nomb' => ['required', 'max:30'],
            'depa_codi' => ['required', 'numeric', 'min:1']
        ]);
        if($validate->fails()){
            return response()->json([
                'msg' => 'Se produjo un error en la validación de la información.',
                'statusCode' => 400
            ]);
        }
        $municipio = Municipio::find($id);
        if(is_null($municipio)){
            return abort(404);
        }

        $municipio->muni_nomb = $request->muni_nomb;
        $municipio->depa_codi = $request->depa_codi;
        $municipio->save();

        return json_encode(['municipio'=>$municipio]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $municipio = Municipio::find($id);
        if(is_null($municipio)){
            return abort(404);
        }
        $municipio->delete();

        $municipios = DB::table('tb_municipio')
            ->join('tb_departamento', 'tb_municipio.depa_codi', '=', 'tb_departamento.depa_codi')
            ->select('tb_municipio.*', 'tb_departamento.depa_nomb')
            ->get();

        return json_encode(['municipios'=> $municipios, 'success'=>true]);
    }
}
