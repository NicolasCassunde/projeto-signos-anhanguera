<?php include('layouts/header.php'); ?>
<h1 class="mb-4">Descubra seu signo</h1>
<form id="signo-form" method="POST" action="show_zodiac_sign.php" class="row g-3">
    <div class="col-md-6">
        <label for="data_nascimento" class="form-label">Data de Nascimento</label>
        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
    </div>
    <div class="col-md-6 align-self-end">
        <button type="submit" class="btn btn-primary">Verificar Signo</button>
    </div>
</form>
<?php include('layouts/footer.php'); ?>