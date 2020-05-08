<style>
  table{
    table-layout: fixed;
    width: 250px;
}

  th, td {
    border: 1px ;
    width: 100px;
    word-wrap: break-word;
    
}
 #tabla .angosto {
    border: 1px ;
    width: 30px;
    word-wrap: break-word;
    
}
#tabla .medio {
    border: 1px ;
    width: 80px;
    word-wrap: break-word;
    
}
#tabla .ancho {
    border: 1px ;
    width: 170px;
    word-wrap: break-word;
    text-align: center;
}
</style>
<table id="tabla" class="table  table-hover">
    <thead>
      <tr>
        <th scope="col" class="angosto">#</th>
        <th scope="col" >Codigo de entrada</th>
        <th scope="col">Asunto</th>
        <th scope="col">Tipo Documento</th>
        <th scope="col" class="angosto">R-R</th>
        <th scope="col" class="angosto">E-R</th>
        <th scope="col" class="ancho">Observaciones</th>
        <th scope="col" class="medio">Fecha Entrada</th>
        <th scope="col" class="medio">Fecha limite</th>
      </tr>
    </thead>
    <tbody>
     
      @foreach ($datos as $item)
        <tr>
        
          <th scope="row">
            <a href="{{route('entrada/detalle',$item->id)}}">
              {{$item->id}}
            </a>
          </th>        
          <td>{{$item->codigo_entrada}}</td>
          <td>{{$item->asunto}}</td>
          <td>{{$item->documento}}</td>
          <td>{{$item->requiere_respuesta}}</td>
          <td>{{$item->es_respuesta}}</td>
          <td class="ancho">{{$item->observaciones}}</td>
          <td>{{$item->fecha_entrada}}</td>
          <td>{{$item->fecha_limite}}</td>
          
        </tr>
      @endforeach
      
    </tbody>
  </table>
  <div class="text-center">
    {!!$datos->links()!!}
  </div>