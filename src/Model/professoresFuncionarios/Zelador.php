<?php


namespace Models;

require_once __DIR__ . '/Funcionario.php';

class Zelador extends Funcionario
{
    private string $turno;

    public function __construct(string $nome, string $setor, string $turno)
    {
        parent::__construct($nome, $setor);
        $this->turno = $turno;
    }

    public function getTurno(): string
    {
        return $this->turno;
    }

    public function setTurno(string $turno): void
    {
        $this->turno = $turno;
    }

    public function mostrarInformacoes(): void
    {
        echo "[Zelador] {$this->getNome()} - Setor: {$this->getSetor()}, Turno: {$this->turno}\n";
    }
}
