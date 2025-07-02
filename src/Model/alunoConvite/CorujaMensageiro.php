<?php

namespace App\Models\alunoConvite;

use App\Models\Contratos\MensageiroInterface;

class CorujaMensageiro implements MensageiroInterface
{
    public function enviar(string $destinatario, string $mensagem): void
    {
        echo "Enviando carta por coruja para {$destinatario}...\n{$mensagem}\n\n";
    }
}
