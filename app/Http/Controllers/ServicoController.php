<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Servico;

use App\Response\Response;
use App\Services\ServicoService;

class ServicoController extends Controller
{
    public function index() {

        try {

            return response()->json(Response::responseApi(true, 'Serviços obtidos', ['servicos' => Servico::get()]));

        } catch (\Exception $e) {
            return response()->json(Response::responseApi(false, $e->getMessage()));
        }
    }

    public function obterServico($servico) {

        try {

            return response()->json(Response::responseApi(true, 'Serviço obtido', ['servicos' => $servico]));

        } catch (\Exception $e) {
            return response()->json(Response::responseApi(false, $e->getMessage()));
        }
    }

    public function cadastrar() {
        
        try {

            $servico = ServicoService::cadastrarServico(request()->post());

            return response()->json(Response::responseApi(true, 'Serviços obtidos', ['servicos' => $servico]));

        } catch (\Exception $e) {
            return response()->json(Response::responseApi(false, $e->getMessage()));
        }
    }
    
    public function editar($servico) {

        try {

            $servico = ServicoService::editarServico($servico, request()->post());

            return response()->json(Response::responseApi(true, 'Servico atualizado!', ['servicos' => $servico]));

        } catch (\Exception $e) {
            return response()->json(Response::responseApi(false, $e->getMessage()));
        }
    }

    public function deletar($servico) {

        try {

            $servico->delete();

            return response()->json(Response::responseApi(true, 'Servico deletado!'));

        } catch (\Exception $e) {
            return response()->json(Response::responseApi(false, $e->getMessage()));
        }
    }
}
