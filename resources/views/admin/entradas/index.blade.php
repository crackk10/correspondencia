@extends("theme.$theme.layout")
@section('titulo')
Correspondencia de Entrada
@endsection

@section("scripts")

@endsection

@section('contenido')

<div class="row">
    <div class="col-lg-12">

        <div class="box box-danger">
            <!-- box-tittle -->
                <div class="box-header with-border">
                    <div class="col-lg-7"> @include('admin/entradas/includes/selectArea')</div>
                    <div class="col-lg-3">buscar</div>
                </div>
            <!-- /.box-tittle -->

            
                <form class="form-horizontal"  id="form_general" method="POST" autocomplete="off">
                    @csrf
            <!-- box-body -->
                <div class="box-body">
                    <div id="datos"></div>
                </div>

                <!-- /.box-body -->

            <!-- box-footer -->

                <div class="box-footer">
                    <div class="col-lg-6">
                        @auth
                        @if ( auth()->user()->id_area=="5")
                            <a class="btn btn-primary"href="{{route('entrada.crear')}}">Nueva Entrada</a>   
                        @endif
                    @endauth
                    
                    </div>
                </div>
            <!-- /.box-footer -->
            </form>
           
            
        </div>       
    </div>
</div>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script>
    $(document).on('ready',function(){
        selectAreaPost;   
    });
    
        var selectAreaPost = $('#id_area').on('change',function(){   
        var url = "{{route('entrada.listar')}}";                                      
        $.ajax({                        
                type: "get",                 
                url: url,                    
                data: $("#formulario").serialize(),
                success: function(data)            
                {
                    $('#datos').empty().html(data);           
                }
            });
        });
        var selectArea = 
        $(document).on("click",".pagination li a",function(e){
        e.preventDefault();   
        var url = $(this).attr("href");                                      
        $.ajax({                        
                type: "get",                 
                url: url,                    
                data: $("#formulario").serialize(),
                success: function(data)            
                {
                    $('#datos').empty().html(data);           
                }
            });
        });
    </script> 
     
@endsection