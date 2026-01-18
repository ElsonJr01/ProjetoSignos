<?php include('layouts/header.php'); ?>

<?php
$data_nascimento = $_POST['data_nascimento'] ?? null;

$signo_encontrado = null;

if ($data_nascimento) {

    // Dia e mês do usuário (como INTEIRO)
    $dia = (int) date('d', strtotime($data_nascimento));
    $mes = (int) date('m', strtotime($data_nascimento));

    // Carrega o XML
    $signos = simplexml_load_file("signos.xml");

    foreach ($signos->signo as $signo) {

        list($diaInicio, $mesInicio) = explode('/', (string)$signo->dataInicio);
        list($diaFim, $mesFim)       = explode('/', (string)$signo->dataFim);

        // Converte tudo para INTEIRO
        $diaInicio = (int)$diaInicio;
        $mesInicio = (int)$mesInicio;
        $diaFim    = (int)$diaFim;
        $mesFim    = (int)$mesFim;

        // Signos que NÃO cruzam o ano
        if (
            ($mesInicio < $mesFim) ||
            ($mesInicio == $mesFim && $diaInicio <= $diaFim)
        ) {
            if (
                ($mes > $mesInicio || ($mes == $mesInicio && $dia >= $diaInicio)) &&
                ($mes < $mesFim || ($mes == $mesFim && $dia <= $diaFim))
            ) {
                $signo_encontrado = $signo;
                break;
            }
        }
        // Signos que CRUZAM o ano (Capricórnio)
        else {
            if (
                ($mes > $mesInicio || ($mes == $mesInicio && $dia >= $diaInicio)) ||
                ($mes < $mesFim || ($mes == $mesFim && $dia <= $diaFim))
            ) {
                $signo_encontrado = $signo;
                break;
            }
        }
    }
}
?>

<h2 class="text-center mb-4">✨ Resultado do seu Signo ✨</h2>

<?php if ($signo_encontrado): ?>
    <div class="card p-4 shadow text-center result-card">
        <h3><?= $signo_encontrado->signoNome ?></h3>
        <p><?= $signo_encontrado->descricao ?></p>

        <span class="badge bg-primary">
            <?= $signo_encontrado->dataInicio ?> até <?= $signo_encontrado->dataFim ?>
        </span>

        <br><br>
        <a href="index.php" class="btn btn-secondary">Voltar</a>
    </div>
<?php else: ?>
    <p class="text-danger text-center">Não foi possível identificar o signo.</p>
<?php endif; ?>

</div>

<script src="assets/js/magic.js"></script>
</body>
</html>
