<?php
require_once __DIR__ . '/vendor/autoload.php';

use professoresFuncionarios\{Professor, Bibliotecario, Zelador, Cozinheiro};
use alunoConvite\{Aluno as AlunoConvite, ConviteService};
use SelecaoCasas\{Aluno as AlunoSelecao, Moderador};
use Comunicacao\{Alerta, Comunicador};
use Torneios\{Torneio, GerenciadorTorneio};

function menu(): void {
    echo "\n======= Sistema Hogwarts CLI =======\n";
    echo "1. Cadastrar aluno e enviar convite\n";
    echo "2. Confirmar recebimento do convite\n";
    echo "3. Executar seleção de casa\n";
    echo "4. Cadastrar professor\n";
    echo "5. Cadastrar zelador\n";
    echo "6. Cadastrar bibliotecário\n";
    echo "7. Cadastrar cozinheiro\n";
    echo "8. Criar torneio e registrar pontuação\n";
    echo "9. Enviar alerta geral\n";
    echo "0. Sair\n";
    echo "Escolha: ";
}

$alunos = [];
$convites = [];
$casas = [];
$torneios = [];

while (true) {
    menu();
    $opcao = readline();
    switch ($opcao) {
        case '1':
            $nome = readline("Nome do aluno: ");
            $idade = (int)readline("Idade: ");
            $aluno = new AlunoConvite($nome, $idade);
            $convite = ConviteService::gerarConvite($aluno);
            $alunos[$nome] = $aluno;
            $convites[$nome] = $convite;
            echo $convite . "\n";
            break;
        case '2':
            $nome = readline("Nome do aluno que confirmou: ");
            if (isset($alunos[$nome])) {
                $alunos[$nome]->confirmarConvite();
                echo "Convite confirmado para {$nome}.\n";
            } else echo "Aluno não encontrado.\n";
            break;
        case '3':
            $nome = readline("Nome do aluno: ");
            $caracteristicas = explode(',', readline("Características separadas por vírgula: "));
            $aluno = new AlunoSelecao($nome, $caracteristicas);
            $moderador = new Moderador();
            $casa = $moderador->realizarSelecao($aluno);
            $casas[$nome] = $casa->getNome();
            echo "{$nome} foi selecionado para {$casa->getNome()}\n";
            break;
        case '4':
            $nome = readline("Nome do professor: ");
            $disciplinas = explode(',', readline("Disciplinas: "));
            $turmas = explode(',', readline("Turmas: "));
            $p = new Professor($nome, "Ensino", $disciplinas, $turmas);
            $p->mostrarInformacoes();
            break;
        case '5':
            $nome = readline("Nome do zelador: ");
            $turno = readline("Turno: ");
            $z = new Zelador($nome, "Manutenção", $turno);
            $z->mostrarInformacoes();
            break;
        case '6':
            $nome = readline("Nome do bibliotecário: ");
            $catalogando = strtolower(readline("Está catalogando? (sim/nao): ")) === 'sim';
            $b = new Bibliotecario($nome, "Biblioteca", $catalogando);
            $b->mostrarInformacoes();
            break;
        case '7':
            $nome = readline("Nome do cozinheiro: ");
            $esp = explode(',', readline("Especialidades: "));
            $c = new Cozinheiro($nome, "Cozinha", $esp);
            $c->mostrarInformacoes();
            break;
        case '8':
            $nome = readline("Nome do torneio: ");
            $torneio = new Torneio($nome);
            $aluno = readline("Nome do aluno participante: ");
            $pontos = (int)readline("Pontuação do aluno: ");
            $torneio->registrarPontuacao($aluno, $pontos);
            $torneios[] = $torneio;
            echo "Pontuação registrada. Ranking:\n";
            print_r($torneio->getRanking());
            break;
        case '9':
            $titulo = readline("Título do alerta: ");
            $mensagem = readline("Mensagem: ");
            $alerta = new Alerta($titulo, $mensagem);
            $com = new Comunicador();
            echo $com->enviarAlerta($alerta);
            break;
        case '0':
            exit("Saindo...\n");
        default:
            echo "\nOpção inválida.\n";
    }
}
