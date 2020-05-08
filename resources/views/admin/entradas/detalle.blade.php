@extends("theme.$theme.layout")
@section('titulo')
Detalles
@endsection
@section("scripts")
@endsection
@section('contenido')
<style>
    table{
    table-layout: fixed;
    width: 250px;
}

    th, td {
    border: 1px ;
    word-wrap: break-word;
    text-align: left;
}
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-danger">
            @foreach ($detalle as $item)    
                <!-- box-tittle -->
                    <div class="box-header with-border">
                        <div class="col-lg-2">
                            @include('admin/entradas/includes/boton_regresar')
                        </div>
                        <div class="col-lg-8 text-center">
                            <h3 class="box-title">Detalles de Correspondencia</h3>
                        </div>            
                        <div class="col-lg-1">                            
                            <a href="{{route('entrada/editar',$item->id)}}">
                                <h4>
                                    <i class="fa fa-edit"></i> 
                                </h4>
                            </a>
                        </div>
                        <div class="col-lg-1">
                            <a href="{{route('entrada')}}">
                                <h4>
                                    <i class="fa fa-trash"></i> 
                                </h4>
                            </a>
                        </div>
                    </div>
                <!-- /.box-tittle -->
                <!-- box-body -->
                    <div class="box-body">
                        <table class="table table-hover">
                            <tr class="col-sm">
                                <th>
                                    <strong>Codigo de Entrada</strong>
                                </th>
                                <td>{{ $item->codigo_entrada }}</td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Codigo de Salida</strong>   
                                </th>
                                <td>{{ $item->codigo_Salida }}</td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Area Encargada</strong> 
                                </th>
                                <td>{{ $item->area}}</td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Remitente</strong>  
                                </th>
                                <td>{{ $item->remitente}}</td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Tipo de Documento</strong>  
                                </th>
                                <td>{{ $item->documento}}</td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Asunto</strong> 
                                </th>
                                <td>{{ $item->asunto}}</td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Adjunto</strong>    
                                </th>
                                <td>{{ $item->adjunto}}</td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Requiere respuesta</strong> 
                                </th>
                                <td>{{ $item->requiere_respuesta}}</td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Es Respuesta</strong>   
                                </th>
                                <td>{{ $item->es_respuesta}}</td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Observaciones</strong>  
                                </th>
                                <td>{{ $item->observaciones}}</td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Fecha de Entrada</strong>   
                                </th>
                                <td>{{ $item->fecha_entrada}}</td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Fecha Limite</strong>   
                                </th>
                                <td>{{ $item->fecha_limite}}</td>
                            </tr>
                        </table>
                    </div>
                <!-- /.box-body -->
            @endforeach
            <!-- box-footer -->
                <div class="box-footer">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                            
                    </div>
                </div>
            <!-- /.box-footer -->          
        </div>       
    </div>
</div>    
@endsection