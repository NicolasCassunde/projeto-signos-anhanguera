<?php include "layouts/header.php"; ?>
<?php if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data_nascimento = $_POST["data_nascimento"];
    $signos = simplexml_load_file("signos.xml");
    $date = new DateTime($data_nascimento);
    $found_signo = null;
    foreach ($signos->signo as $signo) {
        $inicio = DateTime::createFromFormat(
            "d/m/Y",
            $signo->dataInicio . "/" . $date->format("Y"),
        );
        $fim = DateTime::createFromFormat(
            "d/m/Y",
            $signo->dataFim . "/" . $date->format("Y"),
        );
        if ($fim < $inicio) {
            $fim->modify("+1 year");
        }
        if ($date >= $inicio && $date <= $fim) {
            $found_signo = $signo;
            break;
        }
    }
    if ($found_signo) {
        echo "<h2>Seu signo é: {$found_signo->signoNome}</h2>";
        echo "<p>{$found_signo->descricao}</p>";
    } else {
        echo "<p>Não foi possível identificar seu signo.</p>";
    }
    echo '<a href="index.php" class="btn btn-secondary mt-3">Voltar</a>';
} else {
    echo "<p>Por favor, preencha o formulário antes.</p>";
} ?>
<p class="autor">Autor: Nicolas Cassundé</p>
<?php include "layouts/footer.php"; ?>
