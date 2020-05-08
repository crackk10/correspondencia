<!-- campo codigo_Salida -->
      <div class="form-group">
        <label for="codigo_Salida" class="col-lg-3 control-label ">Codigo de Salida</label>
        <div class="col-lg-8">
        <input  type="text" id="codigo_Salida" name="codigo_Salida" class="form-control"  value="{{old('codigo_Salida')}}">
        </div>
      </div>
<!-- /campo codigo_Salida -->

<!-- campo area -->
    <div class="form-group ">
        <label for="id_area" class="col-lg-3 control-label requerido">Area Encargada</label>
        <div class="col-lg-8">
            <select class="form-control " id="id_area" name="id_area" >
                <option value="" disabled selected>Seleccione un area</option>
                <option value="1">Juridica</option>
                <option value="2">Financiera</option>
                <option value="3">Tecnica</option>
                <option value="4">Gerencia</option>
            </select>
        </div>
      </div>
<!-- /campo area -->

<!-- campo remitente -->
    <div class="form-group">
        <label for="remitente" class="col-lg-3 control-label requerido">Remitente</label>
        <div class="col-lg-8">
        <input  type="text" id="remitente" name="remitente" class="form-control"  value="{{old('remitente')}}" >
        </div>
    </div>
<!-- /campo remitente -->

<!-- /campo documento -->
    <div class="form-group">
        <label for="id_documento" class="col-lg-3 control-label requerido">Tipo de documento</label>
        <div class="col-lg-8">
            <select class="form-control " id="id_documento" name="id_documento" >
                <option value="" disabled selected>Seleccione un Tipo de Documento</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
    </div>
<!-- /campo documento -->

<!-- campo asunto -->
    <div class="form-group">
        <label for="asunto" class="col-lg-3 control-label requerido">Asunto</label>
        <div class="col-lg-8">
        <input  type="text" id="asunto" name="asunto" class="form-control"  value="{{old('asunto')}}" >
        </div>
    </div>
<!-- /campo asunto -->

<!-- campo adjunto -->
    <div class="form-group">
        <label for="adjunto" class="col-lg-3 control-label ">Adjunto</label>
        <div class="col-lg-8">
        <input  type="text" id="adjunto" name="adjunto" class="form-control"  value="{{old('adjunto')}}" >
        </div>
    </div>
<!-- /campo adjunto -->



<!-- campo fecha_limite -->
    <div class="form-group">
        <label for="fecha_limite" class="col-lg-3 control-label ">Fecha limite</label>
        <div class=" col-lg-8">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input  type="date" id="fecha_limite" name="fecha_limite" class="form-control"  value="{{old('fecha_limite')}}" >
            </div>
        </div>
    </div>
<!-- /campo fecha_limite -->

<!-- campo observaciones -->
    <div class="form-group">
        <label for="observaciones" class="col-lg-3 control-label ">Observaciones</label>
        <div class="col-lg-8">
            <textarea name="observaciones" id="observacines" class="form-control" cols="10" rows="3"  value="{{old('observaciones')}}"></textarea>
        </div>
    </div>    
<!-- /campo observaciones -->


<!-- campos chek -->
    
    <div class="form-check">
        <div class="col-lg-3"></div>
    <!-- campos es_respuesta -->    
        <div class="col-lg-2">
        <input  class="form-check-input" type="checkbox" value="Si" id="es_respuesta" name="es_respuesta"  value="{{old('es_respuesta')}}" >
        <label for="es_respuesta" class="control-label ">Es respuesta</label>
        </div>
    <!-- campos es_respuesta -->

    <!--requiere_respuesta -->
        <div class="col-lg-6">
            <input  class="form-check-input" type="checkbox" value="Si" id="requiere_respuesta" name="requiere_respuesta"  value="{{old('requiere_respuesta')}}" >
            <label for="requiere_respuesta" class="control-label ">Requiere Respuesta</label>
        </div>
    <!--requiere_respuesta -->
    </div>
<!-- /campos chek -->
<input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
