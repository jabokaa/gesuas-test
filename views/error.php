<div class="error-container">
    <h1>Ocorreu um erro!</h1>
    <p><strong>Mensagem:</strong> <?php echo $errorMessage; ?></p>
    <p><strong>Código do Erro:</strong> <?php echo $errorCode; ?></p>
</div>


<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8d7da;
        color: #721c24;
        text-align: center;
        padding: 50px;
    }
    .error-container {
        background-color: #f5c6cb;
        border: 1px solid #f1b0b7;
        padding: 20px;
        border-radius: 5px;
        display: inline-block;
    }
    .error-container h1 {
        margin: 0;
        font-size: 2em;
    }
    .error-container p {
        margin: 10px 0;
        font-size: 1.2em;
    }
</style>