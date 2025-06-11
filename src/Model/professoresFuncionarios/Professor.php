<?php
namespace Models;

class Professor extends Funcionario
{
    private array $disciplinas;
    private array $turmas;

    public function __construct(string $nome, string $setor, array $disciplinas = [], array $turmas = [])
    {
        parent::__construct($nome, $setor);
        $this->disciplinas = $disciplinas;
        $this->turmas = $turmas;
    }

    public function adicionarDisciplina(Disciplina $disciplina): void
    {
        $this->disciplinas[] = $disciplina;
    }

    public function adicionarTurma(Turma $turma): void
    {
        $this->turmas[] = $turma;
    }

    public function mostrarInformacoes(): void
    {
        echo "[Professor] {$this->nome} - Setor: {$this->setor}\n";
        echo "Disciplinas: " . implode(", ", array_map(fn($d) => $d->getNome(), $this->disciplinas)) . "\n";
        echo "Turmas: " . implode(", ", array_map(fn($t) => $t->getNome(), $this->turmas)) . "\n";
    }
}
