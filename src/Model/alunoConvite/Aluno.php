<?php

namespace App\Models\alunoConvite;
use App\Models\alunoConvite\Pessoa;

class Aluno extends Pessoa
{
    private bool $conviteRecebido = false;

    public function confirmarRecebimento(): void
    {
        $this->conviteRecebido = true;
    }

    public function conviteFoiRecebido(): bool
    {
        return $this->conviteRecebido;
    }
}
