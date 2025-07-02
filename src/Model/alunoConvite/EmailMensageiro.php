<?php

namespace App\Models\alunoConvite;

use App\Models\Contratos\MensageiroInterface;

class EmailMensageiro implements MensageiroInterface
{
    public function enviar(string $destinatario, string $mensagem): void
    {
        echo "Enviando email para {$destinatario}...\n{$mensagem}\n\n";
    }
}
