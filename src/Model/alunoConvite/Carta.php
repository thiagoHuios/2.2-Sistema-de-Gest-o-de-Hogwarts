<?php

namespace App\Models\alunoConvite;

class Carta
{
    private string $conteudo;

    public function __construct(string $nomeAluno)
    {
        $this->conteudo = "Prezado(a) {$nomeAluno},\n\nVocê está convidado(a) a ingressar em Hogwarts.\nCompareça à estação King's Cross, plataforma 9¾.\n\nAtenciosamente,\nDiretor Alvo Dumbledore.";
    }

    public function getConteudo(): string
    {
        return $this->conteudo;
    }
}
