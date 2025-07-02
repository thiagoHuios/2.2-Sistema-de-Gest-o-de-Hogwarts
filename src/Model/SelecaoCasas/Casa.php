<?php

namespace App\Model\SelecaoCasas;

class Casa
{
    private string $nome;
    private array $alunos = [];

    public function __construct(string $nome)
    {
        $this->nome = $nome;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function adicionarAluno(Aluno $aluno): void
    {
        $this->alunos[] = $aluno;
    }

    public function contarAlunos(): int
    {
        return count($this->alunos);
    }

    public function getAlunos(): array
    {
        return $this->alunos;
    }
}
