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

    public function obterServico($idServico) {

        try {

            return response()->json(Response::responseApi(true, 'Serviços obtidos', ['servicos' => Servico::find($idServico)]));

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
}
