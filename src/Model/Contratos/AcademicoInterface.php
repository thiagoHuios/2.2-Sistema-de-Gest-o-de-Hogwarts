<?php

namespace App\Model\Contracts;

interface AcademicoInterface
{
    public function registrarNota(string $aluno, string $disciplina, float $nota): void;
    public function aplicarComportamento(string $aluno, int $pontos): void;
    public function consultarBoletim(string $aluno): void;
}
