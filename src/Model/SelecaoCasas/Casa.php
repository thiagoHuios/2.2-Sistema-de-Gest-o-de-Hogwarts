<?php

namespace Models\SelecaoCasas;

class Casa
{
    public $nome;
    public $alunos = [];

    public function __construct($nome)
    {
        $this->nome = $nome;
    }

    public function adicionarAluno(Aluno $aluno)
    {
        $this->alunos[] = $aluno;
    }

    public function contarAlunos()
    {
        return count($this->alunos);
    }
}
?>