<?php

namespace App\Model\ControleAcademico;

class Nota
{
    private string $aluno;
    private string $disciplina;
    private float $valor;

    public function __construct(string $aluno, string $disciplina, float $valor)
    {
        $this->aluno = $aluno;
        $this->disciplina = $disciplina;
        $this->valor = $valor;
    }

    public function getAluno(): string
    {
        return $this->aluno;
    }

    public function getDisciplina(): string
    {
        return $this->disciplina;
    }

    public function getValor(): float
    {
        return $this->valor;
    }
}
