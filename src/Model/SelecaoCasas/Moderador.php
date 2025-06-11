<?php

namespace Models\SelecaoCasas;

class Moderador
{
    public $casas;

    public function __construct()
    {
        $this->casas = [
            'Grifinoria' => new Casa('Grifinoria'),
            'Lufa-Lufa' => new Casa('Lufa-Lufa'),
            'Corvinal' => new Casa('Corvinal'),
            'Sonserina' => new Casa('Sonserina')
        ];
    }

    public function registrarAluno(Aluno $aluno, ChapeuSeletor $chapeu)
    {
        $nomeCasa = $chapeu->escolherCasa($aluno);
        $aluno->casa = $nomeCasa;
        $this->casas[$nomeCasa]->adicionarAluno($aluno);
    }

    public function mostrarDistribuicao()
    {
        foreach ($this->casas as $casa) {
            echo $casa->nome . ': ' . $casa->contarAlunos() . PHP_EOL;
        }
    }
}
?>