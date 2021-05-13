<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento</title>
</head>
<body>
    <div class="content-sm">
        <div class="container-sm">
            <form id="formulario" method="POST">
                <div class="mb-3">
                    <label for="input" class="form-label">Nome</label>
                    <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome">
                </div>
                <div class="mb-3">
                    <label for="valor" class="form-label">Valor</label>
                    <input type="number" class="form-control" id="valor" name='valor'>
                </div>
                <div class="mb-3">
                    <input type="submit" form="formulario" class="btn btn-warning">
                </div>
            </form>    
        </div>
        <div class="box_comment">
            
        </div>
    </div>        
</body>
    <script src="./assets/jQuery/jquery-3.5.1.min.js"></script>
    <script src="./assets/script.js"></script>
</html> 