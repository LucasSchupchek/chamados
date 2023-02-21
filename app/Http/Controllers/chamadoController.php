<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chamado;
use App\Models\status;

class chamadoController extends Controller
{
    public function listChamados (){
        $chamado = chamado::all();
        $status = status::all();
        return view('chamados.chamados',['chamado'=>$chamado, 'status'=>$status]);
    }

    public function create(){
        return view('chamados.create');
    }

    public function index(request $request){

        return view('welcome');
    }

    public function store(request $request){
        $dadosChamado = new chamado;
        $dadosChamado->titulo = $request->titulo;
        $dadosChamado->id_prioridade = $request->prioridade;
        $dadosChamado->id_problema = $request->problema;
        $dadosChamado->descricao = $request->descricao;

        if($request->hasFile('anexo') && $request->file('anexo')->isValid()){
            $requestAnexo = $request->anexo;
            $extension = $requestAnexo->extension();

            $nomeAnexo = md5($requestAnexo->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->anexo->move(public_path('imgs/chamados'), $nomeAnexo);
            $dadosChamado->anexo = $nomeAnexo;
        }

        $dadosChamado->save();

        return redirect('/');
    }

    public function show($id){
        $chamado = chamado::findOrFail($id);

        return view('chamados.show', ['chamado' => $chamado]);
    }
}
