<?php

namespace App\Model\ControleAcademico;
use App\Model\Contratos\AcademicoInterface;

class RegistroAcademico implements AcademicoInterface
{
    private array $notas = [];
    private array $comportamentos = [];

    public function registrarNota(string $aluno, string $disciplina, float $nota): void
    {
        $this->notas[] = new Nota($aluno, $disciplina, $nota);
    }

    public function aplicarComportamento(string $aluno, int $pontos): void
    {
        if (!isset($this->comportamentos[$aluno])) {
            $this->comportamentos[$aluno] = 0;
        }
        $this->comportamentos[$aluno] += $pontos;
    }

    public function consultarBoletim(string $aluno): void
    {
        echo "📘 Boletim de {$aluno}:" . PHP_EOL;
        foreach ($this->notas as $nota) {
            if ($nota->getAluno() === $aluno) {
                echo "- " . $nota->getDisciplina() . ": " . $nota->getValor() . PHP_EOL;
            }
        }
        echo "Comportamento: " . ($this->comportamentos[$aluno] ?? 0) . " pontos" . PHP_EOL;
    }
}
