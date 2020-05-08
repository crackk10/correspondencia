@extends("theme.$theme.layout")
@section('titulo')
Registro de Entradas
@endsection
@section('metadata')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
{{-- bostrap 4 --}}


<meta name="csrf-token" content="{{csrf_token()}}"/>    
@endsection
@section("scripts")
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-danger">
            <!-- box-tittle -->
                <div class="box-header with-border">
                    <div class="col-lg-3">
                        @include('admin/entradas/includes/boton_regresar')
                    </div>
                    <h3 class="box-title">Registro de entradas</h3>  
                </div>
            <!-- /.box-tittle -->
            <!-- box-body -->
                <div class="box-body">
                <form class="form-horizontal"  id="formulario"  autocomplete="off">
                                         
                    @include('admin/entradas/includes/form')
                </div>
            <!-- /.box-body -->
            <!-- box-footer -->
                <div class="box-footer">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                            @include('includes.boton_form_crear')
                    </div>
                </div>
            <!-- /.box-footer -->
            </form>
        </div>       
    </div>
</div>   
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
   

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(document).on('ready',function(){
       envioFormulario;                
       });              
    var envioFormulario=$('#formulario').on('submit', function(e){
            e.preventDefault();
            var url = "{{route('entrada/guardar')}}"; 
            var token = $("#token").val();
            $.ajax({                        
                type: "post",
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
                    /* console.log(data.responseJSON.errors.remitente); */
                    /* $("#error").html(data.responseJSON.errors.remitente); */
                   
                   

                    
                }
            }); 
                
        });  
</script>
@endsection