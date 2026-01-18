<?php include('layouts/header.php'); ?>

<?php
$data_nascimento = $_POST['data_nascimento'] ?? '';

$dia = date('d', strtotime($data_nascimento));
$mes = date('m', strtotime($data_nascimento));

$signos = simplexml_load_file("signos.xml");
$signo_encontrado = null;

foreach ($signos->signo as $signo) {
    list($diaInicio, $mesInicio) = explode('/', $signo->dataInicio);
    list($diaFim, $mesFim) = explode('/', $signo->dataFim);

    // Caso normal
    if ($mesInicio < $mesFim || ($mesInicio == $mesFim && $diaInicio <= $diaFim)) {
        if (
            ($mes > $mesInicio || ($mes == $mesInicio && $dia >= $diaInicio)) &&
            ($mes < $mesFim || ($mes == $mesFim && $dia <= $diaFim))
        ) {
            $signo_encontrado = $signo;
            break;
        }
    } 
    // Caso que cruza o ano
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
?>

<h2 class="text-center mb-4">Resultado</h2>

<?php if ($signo_encontrado): ?>
    <div class="card p-4 shadow text-center result-card">
        <h3><?= $signo_encontrado->signoNome ?></h3>
        <p><?= $signo_encontrado->descricao ?></p>
        <span class="badge bg-primary mb-2">
            <?= $signo_encontrado->dataInicio ?> - <?= $signo_encontrado->dataFim ?>
        </span>
        <br>
        <a href="index.php" class="btn btn-secondary mt-3">Voltar</a>
    </div>
<?php else: ?>
    <p class="text-danger text-center">Signo não encontrado.</p>
<?php endif; ?>

</div>

<!-- JS para emojis mágicos -->
<script src="assets/js/magic.js"></script>

</body>
</html>
