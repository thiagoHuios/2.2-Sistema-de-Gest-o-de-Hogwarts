<?php

namespace App\Model\Contracts;

use App\Model\Torneios\Torneio;

interface TorneioInterface
{
    public function criarTorneio(string $nome, string $descricao): void;
    public function listarTorneios(): void;
    public function getTorneio(int $indice): ?Torneio;
}
