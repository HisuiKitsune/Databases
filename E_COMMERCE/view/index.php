<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/list.css">
    <title>Skate Cracker's Club</title>
</head>

<body>
    <?php include "../php/Navbar-menu.php" ?>

    <h1 style="text-align: center; font-family: Open-sans; color: #F28123; background-color: #051922; position: relative; margin: auto; margin-top:40px; width:300px; border-radius:8px"> Bem-Vindo </h1>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <?php if(isset($_GET['sucess']) && $_GET['sucess'] != NULL) : ?>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11;">
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false">
        <div class="toast-header">
            <strong class="me-auto">Tabelas</strong>
            <small>Reset</small>
            <button type="button" class="btn-close btn-light" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Resetadas com sucesso
        </div>
    </div>
</div>

<script>
    var toastElList = [].slice.call(document.querySelectorAll('.toast'));
    var toastList = toastElList.map(function(toastEl) {
        return new bootstrap.Toast(toastEl)
    });

    toastList.forEach(toast => toast.show());
</script>

<?php endif; ?>

<?php if(isset($_GET['fail']) && $_GET['fail'] != NULL) : ?>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11;">
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false">
        <div class="toast-header">
            <strong class="me-auto">Tabelas</strong>
            <small>Reset</small>
            <button type="button" class="btn-close btn-light" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Erro ao Resetar Tabelas
        </div>
    </div>
</div>

<script>
    var toastElList = [].slice.call(document.querySelectorAll('.toast'));
    var toastList = toastElList.map(function(toastEl) {
        return new bootstrap.Toast(toastEl)
    });

    toastList.forEach(toast => toast.show());
</script>

<?php endif; ?>

</body>
</html>