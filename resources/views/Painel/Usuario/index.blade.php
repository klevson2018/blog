@extends('painel.templates.template')

@section('conteudo')

<h1 class='title-pg'>Listagem dos Usuários</h1>
<a href="{{route('usuario.create')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"></span>Cadastrar</a>

<div class="form-group" id="mensagem" >
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}                
    </div>
    @endif
</div>
<div class="form-group" >
<script type="text/javascript">
    $(document).ready(function () {
        setTimeout(function () {
            $('#mensagem').fadeOut(1500);
        }, 2000);
    });
    
</script>
</div>
<table class="table table-hover">
    <tr>
        <th>Nome</th>
        <th width="100px">Ações</th>
    </tr>     
        @foreach($usuarios as $usuario)
    <tr>
        <td>{{$usuario->name}}</td>
        <td>
            <a href="{{route('usuario.edit',$usuario->id)}}" class='actions edit'>
                
                <span class="glyphicon glyphicon-pencil"></span>
            </a>
            <a href="{{route('usuario.show',$usuario->id)}}" class='actions delete'>
                <span class="glyphicon glyphicon-zoom-in"></span>
            </a>           
        </td>
    </tr>
        @endforeach
    
</table>
    
    {!! $usuarios->links()!!}
    
@endsection
