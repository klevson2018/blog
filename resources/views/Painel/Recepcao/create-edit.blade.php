@extends('Painel.templates.template')

@section('conteudo')
    
<h1 Class="title-pg">
    Formulário de Exames/Consultas: <b>{{$paciente->nome or 'Cadastrar'}}</b>
</h1>
<h3><a href="{{route('recepcao.index')}}">​<i class="glyphicon glyphicon-arrow-left"></i>Voltar</a></h3>

@if(isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif
<div class="form-group" id="mensagem" >
    @if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}                
    </div>
    @endif
</div>


<script type="text/javascript">
    $(document).ready(function () {
        setTimeout(function () {
            $('#mensagem').fadeOut(1500);
        }, 2000);
    });
    
</script>

@if(isset($paciente))
{!!Form::model($paciente, ['route'=>['recepcao.update',$paciente->id],'class' =>'"form-inline', 'method'=>'put'])!!}
@else
{!! Form::open(['route'=> 'recepcao.store','class' => 'form']) !!}
@endif
<div class="container">

     <div class="col-sm-4">
            <label>Nome do Paciente: </label>   
            <select name="paciente_id" class="select-pacientes form-control" multiple="multiple">
                @foreach($pacientes as $paciente)
                <option value="{{$paciente->id}}">{{$paciente->nome}}</option>
                @endforeach
            </select>
        </div>

    <div class="col-sm-6">
         <label>Descrição do Exame/Consulta:</label>
          {!! Form::text('descricao',null,['class'=>'form-control','placeholder'=>'Descrição do Exame/Consulta:']) !!}
          <br>
    </div>

   
    <div class="col-sm-6">
         <label>Grau de Urgencia:</label>
         <select class="form-control" name="urgencia">
            <option value=""></option>
            <option value="Não Urgente">Não Urgente</option>
            <option value="Urgente">Urgente</option>           
         </select>
    </div>
    
    <div class="col-sm-4">
        <label>Data da Entrega:</label>
      {!! Form::date('dataent',null,['class'=>'form-control','placeholder'=>'Data da Entrega:']) !!}
      <br>
    </div>  
</div>
        <div class="col-sm-6">
            <br>
            {!!form::submit('Receber',['class'=>'btn btn-primary'])!!}
        </div>
<script type="text/javascript">
        $(document).ready(function() {
            $('.select-pacientes').select2({
                placeholder: "Selecione as especialidades...",
                allowClear:"true",
                minimumInputLength:1
            });      
        });
</script>




@endsection