<?php

namespace App\Model\Contracts;

interface ConviteInterface
{
    public function cadastrarAluno(string $nome, int $idade, string $email): void;
    public function listarConvites(): void;
    public function enviarConvites(): void;
    public function confirmarConvite(string $email): void;
}
