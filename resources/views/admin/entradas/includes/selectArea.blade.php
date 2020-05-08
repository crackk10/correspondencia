<!-- /campo documento -->
<div class="form-group">
<form id="formulario" method="get">
        <label for="id_area" class="control-label col-lg-3">Area Destino</label>
        <div class="col-lg-7">
            <select class="form-control " id="id_area" name="id_area">
                <option value="" disabled selected>Seleccione un area</option>
                @auth
                    @if (auth()->user()->id_area=="1"|| auth()->user()->id_area=="5")
                        <option value="1">Jurídica</option>   
                    @endif
                @endauth
                @auth
                    @if (auth()->user()->id_area=="2" || auth()->user()->id_area=="5")
                        <option value="2">Financiera</option>   
                    @endif
                 @endauth
                @auth
                    @if (auth()->user()->id_area=="3" || auth()->user()->id_area=="5")
                        <option value="3">Técnica</option>   
                    @endif
                @endauth
                @auth
                    @if (auth()->user()->id_area=="4" || auth()->user()->id_area=="5")
                        <option value="4">Gerencia</option>   
                    @endif
                @endauth
            </select>
            
        </div>
</form>
</div>
<!-- /campo area -->
