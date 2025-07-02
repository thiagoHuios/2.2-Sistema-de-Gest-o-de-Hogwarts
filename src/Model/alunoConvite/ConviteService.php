<?php

namespace App\Model\AlunoConvite;
use App\Model\Contratos\ConviteInterface;

class ConviteService implements ConviteInterface
{
    private array $alunos = [];

    public function cadastrarAluno(string $nome, int $idade, string $email): void
    {
        $this->alunos[] = new Aluno($nome, $idade, $email);
        echo "Aluno {$nome} cadastrado com sucesso!\n";
    }

    public function listarConvites(): void
    {
        if (empty($this->alunos)) {
            echo "Nenhum aluno cadastrado.\n";
            return;
        }

        echo "Lista de convites:\n";
        foreach ($this->alunos as $aluno) {
            echo "- {$aluno->getNome()} ({$aluno->getEmail()}): {$aluno->getStatusConvite()}\n";
        }
    }

    public function enviarConvites(): void
    {
        foreach ($this->alunos as $aluno) {
            $aluno->enviarConvite();
        }
    }

    public function confirmarConvite(string $email): void
    {
        foreach ($this->alunos as $aluno) {
            if ($aluno->getEmail() === $email) {
                $aluno->confirmarConvite();
                echo "Convite confirmado para {$aluno->getNome()}!\n";
                return;
            }
        }

        echo "Aluno com email {$email} não encontrado.\n";
    }
}
