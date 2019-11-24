<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;

use App\Services\AgendamentoService;

use App\Response\Response;

class AgendamentoController extends Controller
{
    public function index() {

        try {

            return response()->json(Response::responseApi(true, 'Agendamento(s) obtidos', ['agendamentos' => Agendamento::with('servico', 'usuario')->get()]));

        } catch (\Exception $e) {
            return response()->json(Response::responseApi(false, $e->getMessage()));
        }
    }

    public function obterAgendamento($agendamento) {

        try {

            return response()->json(Response::responseApi(true, 'Agendamento obtidos', ['agendamentos' => $agendamento]));

        } catch (\Exception $e) {
            return response()->json(Response::responseApi(false, $e->getMessage()));
        }
    }

    public function cadastrar() {
        
        try {

            $agendamento = AgendamentoService::cadastrarAgendamento(request()->post());

            return response()->json(Response::responseApi(true, 'Agendamento cadastrado!', ['agendamentos' => $agendamento]));

        } catch (\Exception $e) {
            return response()->json(Response::responseApi(false, $e->getMessage()));
        }
    }

    public function editar($agendamento) {

        try {

            $agendamento = AgendamentoService::editarAgendamento($agendamento, request()->post());

            return response()->json(Response::responseApi(true, 'Agendamento cadastrado!', ['agendamentos' => $agendamento]));

        } catch (\Exception $e) {
            return response()->json(Response::responseApi(false, $e->getMessage()));
        }
    }

    public function deletar($agendamento) {

        try {

            $agendamento->delete();

            return response()->json(Response::responseApi(true, 'Agendamento cadastrado!'));

        } catch (\Exception $e) {
            return response()->json(Response::responseApi(false, $e->getMessage()));
        }
    }
}
