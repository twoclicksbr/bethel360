<?php

use App\Models\Api\LogOperation;
use Illuminate\Support\Facades\Log;

if (!function_exists('authIdCredential')) {
    function authIdCredential(): int|null
    {
        return request()->authIdCredential ?? session('authIdCredential') ?? null;
    }
}

if (!function_exists('authIdPerson')) {
    function authIdPerson(): int|null
    {
        return request()->authIdPerson ?? session('authIdPerson') ?? null;
    }
}

if (!function_exists('sc360Log')) {
    function sc360Log(string $action, string $table, array $data = []): void
    {
        try {
            $idCredential = request()->authIdCredential ?? session('authIdCredential');
            $idPerson     = request()->authIdPerson ?? session('authIdPerson');

            if (!$idCredential || !$idPerson) {
                Log::warning('sc360Log sem credencial ou pessoa.', [
                    'id_credential' => $idCredential,
                    'id_person'     => $idPerson,
                ]);
                return;
            }

            LogOperation::create([
                'id_credential' => $idCredential,
                'id_person'     => $idPerson,
                'action'        => $action,
                'table'         => $table,
                'data'          => json_encode($data),
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        } catch (\Throwable $e) {
            Log::error('Erro ao salvar sc360Log', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);
        }
    }
}
