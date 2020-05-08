<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarEntradas;
use App\Models\Entrada;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/entradas/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ( auth()->user()->id_area=="5"){
            return view('admin/entradas/crear');
        }else{}
        
    }

    public function listar(Request $request){
       $area=1;
        if ($request->id_area>0) {
            $area=$request->id_area;
        }
        
        $datos= Entrada::select('areas.area','documentos.documento','entradas.*')
        ->from('entradas')
        ->join('areas','areas.id','=','entradas.id_area')
        ->join('documentos','documentos.id','=','entradas.id_documento')
        ->where('entradas.id_area','=',"$area")
        ->paginate(8);
        return view('admin/entradas/listar')->with('datos',$datos);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarEntradas  $request, SessionManager $sessionManager)
    {   /*$now=Carbon::now();
        $now->format('Y-m-d');*/

        if ($request->ajax()) { 
            $entrada = new Entrada;
            $entrada->codigo_Salida = $request->codigo_Salida;
            $entrada->id_area = $request->id_area;
            $entrada->remitente = $request->remitente;
            $entrada->id_documento = $request->id_documento;
            $entrada->asunto = $request->asunto;
            $entrada->adjunto = $request->adjunto;
            $entrada->fecha_entrada = date('Y-m-d');
            $entrada->fecha_limite = $request->fecha_limite; 
            $entrada->observaciones = $request->observaciones;
            if($request->es_respuesta=="Si"){
                $entrada->es_respuesta = $request->es_respuesta;
            }
            if($request->requiere_respuesta=="Si"){
            $entrada->requiere_respuesta = $request->requiere_respuesta; 
            }
            $entrada->save();

            if ($entrada->save()) {
                return response()->json(['success'=>'true']);
            }else {
                
                return response()->json(['success'=>'false']);
            }
       
        }

        /* 
        return view('includes/mensaje'); */
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $detalle= Entrada::select('areas.area','documentos.documento','entradas.*')
        ->from('entradas')
        ->join('areas','areas.id','=','entradas.id_area')
        ->join('documentos','documentos.id','=','entradas.id_documento')
        ->where('entradas.id','=',"$id")
        ->get();
     
        
       return view('admin/entradas/detalle',compact('detalle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function edit(Entrada $entrada)
    {
        //
        $detalle= Entrada::select('areas.area','documentos.documento','entradas.*')
        ->from('entradas')
        ->join('areas','areas.id','=','entradas.id_area')
        ->join('documentos','documentos.id','=','entradas.id_documento')
        ->where('entradas.id','=',"$entrada->id")
        ->get();
     
        
       return view('admin/entradas/editar',compact('detalle'));
       //return $entrada;
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarEntradas  $request, Entrada $entrada)
    {
        //
        
        if ($request->ajax()) {
            $registro=Entrada::findOrFail($entrada->id);
            $formulario=$request->all();
            $resultado=$registro->fill($formulario)->save();
            if ($resultado) {
            return response()->json(['success'=>'true']);
            }else {
            return response()->json(['success'=>'false']);
            }
    }
            
        }
       

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entrada $entrada)
    {
        //
    }
}
