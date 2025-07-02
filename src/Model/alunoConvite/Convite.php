<?php

namespace App\Models\alunoConvite;

use App\Models\alunoConvite\Pessoa\Aluno;
use App\Models\alunoConvite\Contratos\MensageiroInterface;

class Convite
{
    private Aluno $aluno;
    private Carta $carta;
    private MensageiroInterface $mensageiro;

    public function __construct(Aluno $aluno, MensageiroInterface $mensageiro)
    {
        $this->aluno = $aluno;
        $this->carta = new Carta($aluno->getNome());
        $this->mensageiro = $mensageiro;
    }

    public function enviar(): void
    {
        $this->mensageiro->enviar($this->aluno->getEmail(), $this->carta->getConteudo());
    }
}
