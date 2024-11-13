<div class="container mt-5">
    <h2>Detalhes do Cidadão</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>Nome:</strong> <?= $citizen['name'] ?></p>
            <p><strong>NIS:</strong> <?= $citizen['nis'] ?></p>
            <p><strong>Data de Criação:</strong> <?= $citizen['created_at'] ?></p>
        </div>
    </div>

    <a href="/citizen" class="btn btn-primary mt-3">Voltar</a>

</div>