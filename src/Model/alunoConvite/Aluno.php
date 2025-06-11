<?php

namespace App\Models;

class Aluno
{
    private string $nome;
    private int $idade;
    private string $email;
    private string $statusConvite;

    public function __construct(string $nome, int $idade, string $email)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->email = $email;
        $this->statusConvite = 'Pendente';
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getIdade(): int
    {
        return $this->idade;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getStatusConvite(): string
    {
        return $this->statusConvite;
    }

    public function confirmarConvite(): void
    {
        $this->statusConvite = 'Confirmado';
    }

    public function enviarConvite(): void
    {
        echo "🦉 Carta enviada para {$this->nome} ({$this->email})!\n";
        echo "Conteúdo da carta:\n";
        echo "-------------------------------------------\n";
        echo "Olá {$this->nome},\n";
        echo "Você foi aceito em Hogwarts!\n";
        echo "O embarque será no Expresso de Hogwarts dia 1º de setembro.\n";
        echo "Leve sua varinha, livros e caldeirão.\n";
        echo "-------------------------------------------\n\n";
    }
}