<?php

namespace App\Models\ProfessoresFuncionarios;

use App\Model\ProfessoresFuncionarios\Funcionario;

class Cozinheiro extends Funcionario
{
    private array $especialidades;

    public function __construct(string $nome, string $setor, array $especialidades)
    {
        parent::__construct($nome, $setor);
        $this->especialidades = $especialidades;
    }

    public function getEspecialidades(): array
    {
        return $this->especialidades;
    }

    public function setEspecialidades(array $especialidades): void
    {
        $this->especialidades = $especialidades;
    }

    public function mostrarInformacoes(): void
    {
        echo "[Cozinheiro] {$this->getNome()} - Setor: {$this->getSetor()}, Especialidades: " . implode(", ", $this->especialidades) . "\n";
    }
}
