<?php

namespace Models\SelecaoCasas;

class Aluno
{
    public $nome;
    public $coragem;
    public $lealdade;
    public $empatia;
    public $ambicao;
    public $casa;

    public function __construct($nome, $coragem, $lealdade, $empatia, $ambicao)
    {
        $this->nome = $nome;
        $this->coragem = $coragem;
        $this->lealdade = $lealdade;
        $this->empatia = $empatia;
        $this->ambicao = $ambicao;
    }
}
?>