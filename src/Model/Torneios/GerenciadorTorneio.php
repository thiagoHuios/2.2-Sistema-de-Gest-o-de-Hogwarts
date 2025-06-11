<?php

namespace App\Models\Torneios;

class GerenciadorTorneio
{
    private array $torneios = [];

    public function criarTorneio(string $nome, string $descricao): void
    {
        $this->torneios[] = new Torneio($nome, $descricao);
        echo "Torneio '{$nome}' criado com sucesso!\n";
    }

    public function listarTorneios(): void
    {
        if (empty($this->torneios)) {
            echo "Nenhum torneio cadastrado.\n";
            return;
        }

        foreach ($this->torneios as $index => $torneio) {
            echo "{$index} - {$torneio->getNome()} ({$torneio->getDescricao()})\n";
        }
    }

    public function getTorneio(int $indice): ?Torneio
    {
        return $this->torneios[$indice] ?? null;
    }
}
