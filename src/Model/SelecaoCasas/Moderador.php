<?php

namespace App\Model\SelecaoCasas;

class Moderador
{
    private array $casas;

    public function __construct()
    {
        $this->casas = [
            'Grifinoria' => new Casa('Grifinoria'),
            'Lufa-Lufa' => new Casa('Lufa-Lufa'),
            'Corvinal' => new Casa('Corvinal'),
            'Sonserina' => new Casa('Sonserina')
        ];
    }

    public function registrarAluno(Aluno $aluno, ChapeuSeletor $chapeu): void
    {
        $nomeCasa = $chapeu->escolherCasa($aluno);
        $aluno->setCasa($nomeCasa);
        $this->casas[$nomeCasa]->adicionarAluno($aluno);
    }

    public function mostrarDistribuicao(): void
    {
        foreach ($this->casas as $casa) {
            echo $casa->getNome() . ': ' . $casa->contarAlunos() . PHP_EOL;
        }
    }

    public function getCasas(): array
    {
        return $this->casas;
    }
}
