
<h1 class='title-pg'>    
    <hr>
    Agendamentos: <b>{{$agenda->paciente->nome}}</b>
    
<hr>

</h1>
<p><b>Paciente:</b> {{$agenda->paciente->nome}}</p>
<p><b>Exame:</b> {{$agenda->exame->nome}}</p>
<p><b>Técnico Responsável:</b> {{$agenda->tecnico->nome}}</p>
<p><b>Data do Exame:</b> {{\Carbon\Carbon::parse($agenda->data_exame)->format('d/m/Y')}}</p>
<p><b>Hora do Exame:</b> {{$agenda->hora_exame}}</p>

<hr>
