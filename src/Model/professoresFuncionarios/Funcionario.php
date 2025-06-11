<?php
namespace Models;

abstract class Funcionario
{
    protected string $nome;
    protected string $setor;

    public function __construct(string $nome, string $setor)
    {
        $this->nome = $nome;
        $this->setor = $setor;
    }

    public function getNome(): string { return $this->nome; }
    public function setNome(string $nome): void { $this->nome = $nome; }

    public function getSetor(): string { return $this->setor; }
    public function setSetor(string $setor): void { $this->setor = $setor; }

    abstract public function mostrarInformacoes(): void;
}
