<?php

namespace App\Models\Comunicacao;

class Alerta
{
    public string $destinatario;
    public string $mensagem;

    public function __construct(string $destinatario, string $mensagem)
    {
        $this->destinatario = $destinatario;
        $this->mensagem = $mensagem;
    }

    public function exibir()
    {
        echo "📢 {$this->destinatario}: {$this->mensagem}\n";
    }
}