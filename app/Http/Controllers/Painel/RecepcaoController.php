<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Recepcoes;
use App\Models\Painel\Paciente;
use App\Http\Requests\Painel\RecepcaoFormRequest;

class RecepcaoController extends Controller
{
    
    private $paciente;
    private $totalPage=7;
    
    public function __construct(Recepcoes $paciente) {
        $this->paciente = $paciente;
               
    }
      
    public function index(Recepcoes $paciente)
    {
        $title='Listagem dos pacientes';
        $pacientes =  $this->paciente->paginate($this->totalPage); 
        return view('Painel.Recepcao.index',compact('pacientes','title'));
    }

    public function create()
    {
        $title = 'Cadastrar Novo Paciente';   
        $pacientes = Paciente::all();
        return view('Painel.Recepcao.create-edit',compact('title','pacientes'));
    }

    public function store(RecepcaoFormRequest $request)
    {
        //Pega todos os dados que vem do formulário
         $dataForm = $request->all();   
       
        //$dataForm['active'] = (!isset($dataForm['active']) ) ? 0:1;
               
        //Faz o cadastro
        $insert = $this->paciente->create($dataForm);
        
        if($insert)
            return redirect()->route('recepcao.index')->with('status','Paciente Cadastrado com Sucesso!');
        else
            return redirect()->route('recepcao.create-edit')->with('status','Falha ao Cadastrar Paciente!');
    }

    public function show($id)
    {
      $paciente = $this->paciente->find($id);
      $title = "Nome do Paciente: ($paciente->nome)";
      
      return view('Painel.Paciente.show',compact('paciente','title'));
    }

    public function edit($id)
    {
        $paciente = $this->paciente->find($id); 
        $title = "Editar Paciente: ($paciente->nome)";
        
        return view('Painel.Paciente.create-edit',compact('title','paciente'));
    }

    public function update(RecepcaoFormRequest $request, $id)
    {
       
        $dataForm = $request->all();
        $paciente = $this->paciente->find($id);
        //$dataForm['active'] = (!isset($dataForm['active']) ) ? 0:1;
        $update = $paciente->update($dataForm);
                        
        if($update)
            return redirect ()->route('paciente.index')->with('status','Paciente Alterado com Sucesso!');
        else
            return redirect()->route('paciente.edit', $id)->with(['errors'=>'Falha ao editar']);
    }

    public function destroy($id)
    {
       $paciente = $this->paciente->find($id);
       $delete = $paciente->delete();
       if($delete)
           return redirect ()->route('paciente.index')->with('status','Paciente Excluido com Sucesso!');
       else
           return redirect ()->route('paciente.show', $id)->with(['errors'=>'Falha ao Excluir']);
    }    
}
