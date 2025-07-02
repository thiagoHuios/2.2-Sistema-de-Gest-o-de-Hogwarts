<?php

namespace App\Models\Interfaces;

interface MensageiroInterface
{
    public function enviar(string $destinatario, string $mensagem): void;
}
