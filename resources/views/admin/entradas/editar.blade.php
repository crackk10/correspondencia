@extends("theme.$theme.layout")
@section('titulo')
Editar
@endsection

@section('metadata')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
{{-- bostrap 4 --}}


<meta name="csrf-token" content="{{csrf_token()}}"/>    
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
            <!-- box-tittle -->
                <div class="box-header with-border">
                    <div class="col-lg-2">
                        @include('admin/entradas/includes/boton_regresar')
                    </div>
                    <div class="col-lg-8 text-center">
                        <h3 class="box-title">Editar Correspondencia</h3>
                    </div>
                    <?php
                        $id=0; 
                        $area=0; 
                        $documento=0;
                        $es_respuesta="No";
                        $requiere_respuesta="No";
                    ?>
                    @foreach ($detalle as $item) 
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
                   <form id="formulario">
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
                                <td><input  type="text" id="codigo_Salida" name="codigo_Salida" class="form-control"  value="{{ $item->codigo_Salida }}"></td>    
                            </tr>
                            <tr>
                                <th>
                                    <strong>Area Encargada</strong> 
                                </th>
                                <td>
                                    <div id="area">
                                    <select class="form-control " id="id_area" name="id_area">
                                        
                                        <option value="1" >Jurídica</option>
                                        <option value="2">Financiera</option>
                                        <option value="3">Técnica</option>
                                        <option value="4">Gerencia</option>
                                    </select>
                                    </div>
                                </td>
                                
                            </tr>
                            <tr>
                                <th>
                                    <strong>Remitente</strong>  
                                </th>
                                <td>
                                    <input  type="text" id="remitente" name="remitente" class="form-control"  value="{{ $item->remitente}}">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Tipo de Documento</strong>  
                                </th>
                                <td>
                                    <select class="form-control " id="id_documento" name="id_documento" >
                                        <option value="" disabled selected>Seleccione un Tipo de Documento</option>
                                        <option value="1">Radicado</option>
                                        <option value="2">Factura</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </td>
                                
                            </tr>
                            <tr>
                                <th>
                                    <strong>Asunto</strong> 
                                </th>
                                <td><input  type="text" id="asunto" name="asunto" class="form-control"  value="{{ $item->asunto}}" ></td>
                                
                            </tr>
                            <tr>
                                <th>
                                    <strong>Adjunto</strong>    
                                </th>
                                <td><input  type="text" id="adjunto" name="adjunto" class="form-control"  value="{{ $item->adjunto}}" ></td>
                               
                            </tr>
                            <tr>
                                <th>
                                    <strong>Requiere respuesta</strong> 
                                </th>
                                <td> <input  class="form-check-input" type="checkbox" value="Si" id="requiere_respuesta" name="requiere_respuesta"
                                 <?php if ($item->requiere_respuesta=="Si") {
                                    echo "checked";
                                } ?>></td>
                                
                            </tr>
                            <tr>
                                <th>
                                    <strong>Es Respuesta</strong>   
                                </th>
                            <td> <input  class="form-check-input" type="checkbox" value="Si"         id="es_respuesta" name="es_respuesta"
                                <?php if ($item->es_respuesta=="Si") {
                                    echo "checked";
                                } ?>></td>
                            
                            </tr>
                            <tr>
                                <th>
                                    <strong>Observaciones</strong>  
                                </th>
                                <td>
                                    <textarea name="observaciones" id="observacines" class="form-control" cols="10" rows="3">{{ $item->observaciones}}</textarea>
                                </td>
                                
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
                                <td><input  type="date" id="fecha_limite" name="fecha_limite" class="form-control"  value="{{ $item->fecha_limite}}" ></td>
                                
                            </tr>
                            <?php
                                 $id=$item->id_area; 
                                $area=$item->id_area;
                                $documento=$item->id_documento;
                                $es_respuesta=$item->es_respuesta;
                                $requiere_respuesta=$item->requiere_respuesta;
                            ?>
                        
                        </table>
                        <input type="hidden" name="codigo_entrada" value="{{$item->codigo_entrada}}" id="codigo_entrada">
                        <input type="hidden" name="fecha_entrada" value="{{$item->fecha_entrada}}" id="fecha_entrada">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                    
                        <a href="" class="btn btn-primary">Cancelar</a>
                        <input type="submit" value="Actualizar" class="btn btn-primary">
                    
                    
                    
                    </form>
                    @endforeach
                </div>
                <!-- /.box-body -->

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



<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
   

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

<script>
    $(document).on('ready',function(){
        
        $("#id_area option[value="+{{$area}}+"]").prop('selected', true);
        $("#id_documento option[value="+{{$documento}}+"]").prop('selected', true);

       envioFormulario;                
       });              
    var envioFormulario=$('#formulario').on('submit', function(e){
            e.preventDefault();
            
            var url = "{{route('entrada/actualizar',$id)}}";
             
            var token = $("#token").val();
            $.ajax({                        
                type: "PUT",
                headers: {'X-CSRF-TOKEN':token},                
                url: url, 
                dataType: 'json',                   
                data: $("#formulario").serialize(),
                success: function(data)            
                {   if (data.success=='true') 
                    {
                        console.log("guardo exitosamente");
                        
                        toastr.success( 'Correspondencia Agregada', 'Exito',{
                        "positionClass": "toast-top-right"})
                    }  
                    $("#reiniciar").trigger('click')         
                },
                error: function (data)
                {  
                    console.log("Error al guardar"); 
                    $("#list").empty();
                    var messages = data.responseJSON.errors;
                    $.each(messages, function(index, val) {
                        toastr.error( val, 'Problema al Guardar',{
                        "positionClass": "toast-top-right",
                        "extendedTimeOut": "6000"}) 
                    });
                    /* console.log(data.responseJSON); */
                    /* $("#error").html(data.responseJSON.errors.remitente); */  
                }
            }); 
                
        });  
</script>

@endsection