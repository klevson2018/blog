

<h1 class='title-pg'>     
<hr>  
    
Agendamentos: <b>CEM - Buritizeiro</b>
<div class="form-group" >
    <!--<img src="{!! asset('buritizeiro/br.jpg') !!}">-->

    <img style="width: 150px; height: 150px;" src="{{ asset('buritizeiro.jpg') }} " />
  
    
</div>

</h1>
<p><b>Paciente:</b> {{$agenda->paciente->nome}}</p>
<p><b>Medico:</b> {{$agenda->medico->nome}}</p>
<p><b>Especialidade: </b>  {{$especialidade->nome}}</p>              
<p><b>Data da Consulta</b> {{\Carbon\Carbon::parse($agenda->data_consulta)->format('d/m/Y')}}</p>
<p><b>Hora da Consulta</b> {{$agenda->hora_consulta}}</p>
<hr>
