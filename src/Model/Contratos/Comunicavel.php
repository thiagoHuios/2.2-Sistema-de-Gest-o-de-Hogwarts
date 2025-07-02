<?php

namespace App\Model\Contracts;

interface Comunicavel
{
    public function enviar(string $destinatario, string $mensagem): void;
    public function listar(): void;
}
