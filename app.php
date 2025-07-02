<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Model\ProfessoresFuncionarios\{Professor, Bibliotecario, Zelador, Cozinheiro};
use App\Model\AlunoConvite\{Aluno as AlunoConvite, ConviteService};
use App\Model\SelecaoCasas\{Aluno as AlunoSelecao, Casa, ChapeuSeletor, Moderador};
use App\Model\Comunicacao\{Alerta, Comunicador};
use App\Model\Torneios\{Torneio, GerenciadorTorneio};
use App\Model\ControleAcademico\RegistroAcademico;

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
    echo "10. Registrar nota de aluno\n";
    echo "11. Aplicar pontos de comportamento\n";
    echo "12. Consultar boletim do aluno\n";
    echo "0. Sair\n";
    echo "Escolha: ";
}

// Instâncias
$conviteService = new ConviteService();
$moderador = new Moderador();
$gerenciadorTorneio = new GerenciadorTorneio();
$comunicador = new Comunicador();
$registroAcademico = new RegistroAcademico();

// Dados em memória
$alunos = [];

while (true) {
    menu();
    $opcao = readline();
    echo "\n";

    switch ($opcao) {
        case '1':
            $nome = readline("Nome do aluno: ");
            $idade = (int)readline("Idade: ");
            $email = readline("Email do aluno: ");
            $conviteService->cadastrarAluno($nome, $idade, $email);
            $conviteService->enviarConvites();
            break;

        case '2':
            $email = readline("Email do aluno que confirmou: ");
            $conviteService->confirmarConvite($email);
            break;

        case '3':
            $nome = readline("Nome do aluno: ");
            $coragem = (int)readline("Coragem (0-10): ");
            $lealdade = (int)readline("Lealdade (0-10): ");
            $empatia = (int)readline("Empatia (0-10): ");
            $ambicao = (int)readline("Ambição (0-10): ");
            $aluno = new AlunoSelecao($nome, $coragem, $lealdade, $empatia, $ambicao);
            $chapeu = new ChapeuSeletor();
            $moderador->registrarAluno($aluno, $chapeu);
            echo "{$aluno->getNome()} foi selecionado para a casa {$aluno->getCasa()}.\n";
            break;

        case '4':
            $nome = readline("Nome do professor: ");
            $disciplinas = explode(',', readline("Disciplinas (separadas por vírgula): "));
            $turmas = explode(',', readline("Turmas (separadas por vírgula): "));
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
            $descricao = readline("Descrição do torneio: ");
            $gerenciadorTorneio->criarTorneio($nome, $descricao);
            $indice = count($gerenciadorTorneio->getTorneios()) - 1;

            $aluno = readline("Nome do aluno participante: ");
            $pontos = (int)readline("Pontuação do aluno: ");
            $torneio = $gerenciadorTorneio->getTorneio($indice);
            $torneio->adicionarParticipante($aluno);
            $torneio->registrarPontuacao($aluno, $pontos);
            $torneio->exibirRanking();
            break;

        case '9':
            $dest = readline("Destinatário: ");
            $mensagem = readline("Mensagem: ");
            $comunicador->enviar($dest, $mensagem);
            break;

        case '10':
            $aluno = readline("Nome do aluno: ");
            $disciplina = readline("Disciplina: ");
            $nota = (float)readline("Nota: ");
            $registroAcademico->registrarNota($aluno, $disciplina, $nota);
            echo "Nota registrada.\n";
            break;

        case '11':
            $aluno = readline("Nome do aluno: ");
            $pontos = (int)readline("Pontos positivos ou negativos: ");
            $registroAcademico->aplicarComportamento($aluno, $pontos);
            echo "Comportamento registrado.\n";
            break;

        case '12':
            $aluno = readline("Nome do aluno: ");
            $registroAcademico->consultarBoletim($aluno);
            break;

        case '0':
            exit("Saindo do sistema...\n");

        default:
            echo "Opção inválida.\n";
    }

    echo "\n";
}
