<?php

namespace Models\SelecaoCasas;

class ChapeuSeletor
{
    public function escolherCasa(Aluno $aluno)
    {
        $caracteristicas = [
            'Grifinoria' => $aluno->coragem,
            'Lufa-Lufa' => $aluno->lealdade,
            'Corvinal' => $aluno->empatia,
            'Sonserina' => $aluno->ambicao
        ];

        arsort($caracteristicas);
        return array_key_first($caracteristicas);
    }
}
?>