<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta de dados do formulário
    $sala = htmlspecialchars($_POST['sala']);
    $andar = htmlspecialchars($_POST['andar']);
    $problema = htmlspecialchars($_POST['problema']);

    // Dados adicionais do serviço
    $dataChamado = date("Y-m-d H:i:s");
    $responsavel = "Não atribuído ainda";
    $status = "Aberto";
    $descricaoSolucao = "Não resolvido ainda";
    $dataConclusao = "Não concluído ainda";

    // Formatação dos dados para armazenamento
    $dadosChamado = "Data do Chamado: $dataChamado\n";
    $dadosChamado .= "Sala: $sala\n";
    $dadosChamado .= "Andar: $andar\n";
    $dadosChamado .= "Descrição do Problema: $problema\n";
    $dadosChamado .= "Responsável pelo Atendimento: $responsavel\n";
    $dadosChamado .= "Status do Chamado: $status\n";
    $dadosChamado .= "Descrição da Solução: $descricaoSolucao\n";
    $dadosChamado .= "Data de Conclusão: $dataConclusao\n";
    $dadosChamado .= "--------------------------------------\n";

    // Caminho para o arquivo onde os dados serão armazenados
    $arquivo = 'chamados.txt';

    // Armazena os dados no arquivo
    file_put_contents($arquivo, $dadosChamado, FILE_APPEND | LOCK_EX);

    // Redireciona para uma página de sucesso
    echo "<div class='container'>";
    echo "<h1 class='success-message'>Chamado registrado com sucesso!</h1>";
    echo "<p class='success-message'><a href='index.php'>Voltar</a></p>";
    echo "</div>";
} else {
    echo "<h1>Erro: Dados do formulário não recebidos.</h1>";
}
?>
