<?php

namespace App\Models\ProfessoresFuncionarios;

use App\Model\ProfessoresFuncionarios\Funcionario;

class Bibliotecario extends Funcionario
{
    private bool $catalogando;

    public function __construct(string $nome, string $setor, bool $catalogando)
    {
        parent::__construct($nome, $setor);
        $this->catalogando = $catalogando;
    }

    public function isCatalogando(): bool
    {
        return $this->catalogando;
    }

    public function setCatalogando(bool $catalogando): void
    {
        $this->catalogando = $catalogando;
    }

    public function mostrarInformacoes(): void
    {
        echo "[Bibliotecário] {$this->getNome()} - Setor: {$this->getSetor()}, Catalogando: " . ($this->catalogando ? "Sim" : "Não") . "\n";
    }
}
