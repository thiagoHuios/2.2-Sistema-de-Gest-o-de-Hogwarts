<?php

namespace App\Models\Torneios;

class Torneio
{
    private string $nome;
    private string $descricao;
    private array $participantes = [];
    private array $pontuacoes = [];

    public function __construct(string $nome, string $descricao)
    {
        $this->nome = $nome;
        $this->descricao = $descricao;
    }

    public function adicionarParticipante(string $aluno): void
    {
        $this->participantes[] = $aluno;
        $this->pontuacoes[$aluno] = 0;
    }

    public function registrarPontuacao(string $aluno, int $pontos): void
    {
        if (isset($this->pontuacoes[$aluno])) {
            $this->pontuacoes[$aluno] += $pontos;
        }
    }

    public function exibirRanking(): void
    {
        arsort($this->pontuacoes);
        echo "Ranking do Torneio '{$this->nome}':\n";
        foreach ($this->pontuacoes as $aluno => $pontos) {
            echo "- {$aluno}: {$pontos} pontos\n";
        }
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getParticipantes(): array
    {
        return $this->participantes;
    }
}