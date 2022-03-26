<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mvc</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/template.css" />
</head>
<body>
    <div class="topo">
        YouTube
        <a href="<?php echo BASE_URL;?>/home">Home </a> - 
        <a href="<?php echo BASE_URL;?>/sobre">Sobre </a> - 
        <a href="<?php echo BASE_URL;?>/contato">Contato  </a>
    </div>

    <?php
        $this->loadViewInTemplate( $viewName, $viewData );
    ?>
    
</body>
</html>