<?php

namespace App\Model\Comunicacao;

class Alerta
{
    private string $destinatario;
    private string $mensagem;

    public function __construct(string $destinatario, string $mensagem)
    {
        $this->destinatario = $destinatario;
        $this->mensagem = $mensagem;
    }

    public function exibir(): void
    {
        echo "📢 {$this->destinatario}: {$this->mensagem}\n";
    }

    public function getDestinatario(): string
    {
        return $this->destinatario;
    }

    public function setDestinatario(string $destinatario): void
    {
        $this->destinatario = $destinatario;
    }

    public function getMensagem(): string
    {
        return $this->mensagem;
    }

    public function setMensagem(string $mensagem): void
    {
        $this->mensagem = $mensagem;
    }
}
