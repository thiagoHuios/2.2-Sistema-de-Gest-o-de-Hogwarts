<?php

namespace App\Model\SelecaoCasas;

class Aluno
{
    private string $nome;
    private int $coragem;
    private int $lealdade;
    private int $empatia;
    private int $ambicao;
    private ?string $casa = null;

    public function __construct(string $nome, int $coragem, int $lealdade, int $empatia, int $ambicao)
    {
        $this->nome = $nome;
        $this->coragem = $coragem;
        $this->lealdade = $lealdade;
        $this->empatia = $empatia;
        $this->ambicao = $ambicao;
    }

    public function getNome(): string { return $this->nome; }
    public function getCoragem(): int { return $this->coragem; }
    public function getLealdade(): int { return $this->lealdade; }
    public function getEmpatia(): int { return $this->empatia; }
    public function getAmbicao(): int { return $this->ambicao; }
    public function getCasa(): ?string { return $this->casa; }

    public function setCasa(string $casa): void { $this->casa = $casa; }
}
