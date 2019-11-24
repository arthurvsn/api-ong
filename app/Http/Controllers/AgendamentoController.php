<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;

use App\Services\AgendamentoService;

use App\Response\Response;

class AgendamentoController extends Controller
{
    public function index() {

        try {

            return response()->json(Response::responseApi(true, 'Agendamento(s) obtidos', ['agendamentos' => Agendamento::get()]));

        } catch (\Exception $e) {
            return response()->json(Response::responseApi(false, $e->getMessage()));
        }
    }

    public function obterAgendamento($idAgendamento) {

        try {

            return response()->json(Response::responseApi(true, 'Agendamento obtidos', ['agendamentos' => Agendamento::find($idAgendamento)]));

        } catch (\Exception $e) {
            return response()->json(Response::responseApi(false, $e->getMessage()));
        }
    }

    public function cadastrar() {
        
        try {

            $Agendamento = AgendamentoService::cadastrarAgendamento(request()->post());

            return response()->json(Response::responseApi(true, 'Agendamento cadastrado!', ['agendamentos' => $Agendamento]));

        } catch (\Exception $e) {
            return response()->json(Response::responseApi(false, $e->getMessage()));
        }
    }
}
