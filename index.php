<?php include('layouts/header.php'); ?>

<div class="text-center mb-4">
    <h1>Descubra o seu Signo</h1>
    <p class="text-muted">
        Informe sua data de nascimento para descobrir as principais características do seu signo zodiacal.
    </p>
</div>

<form method="POST" action="show_zodiac_sign.php" class="card p-4 shadow-sm">

    <div class="mb-3">
        <label for="data_nascimento" class="form-label">
            Data de Nascimento
        </label>
        <input 
            type="date" 
            class="form-control" 
            name="data_nascimento" 
            required
        >
        <small class="form-text text-muted">
            Selecione a data no formato dia/mês/ano.
        </small>
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-lg">
            Descobrir Signo
        </button>
    </div>

</form>

<footer class="text-center mt-4 text-muted">
    <small>
        Projeto acadêmico – Programação Web
    </small>
</footer>

</div>

<!-- JS para emojis mágicos -->
<script src="assets/js/magic.js"></script>

</body>
</html>
