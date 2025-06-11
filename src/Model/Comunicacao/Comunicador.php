<?php

namespace App\Models\Comunicacao;

class Comunicador
{
    private array $alertas = [];

    public function enviar(string $destinatario, string $mensagem): void
    {
        $alerta = new Alerta($destinatario, $mensagem);
        $this->alertas[] = $alerta;
        echo "Alerta enviado para {$destinatario}!\n";
    }

    public function listar(): void
    {
        if (empty($this->alertas)) {
            echo "Nenhum alerta enviado.\n";
            return;
        }

        foreach ($this->alertas as $a) {
            $a->exibir();
        }
    }
}