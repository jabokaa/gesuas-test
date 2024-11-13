<div class="container mt-5">
    <h2>Cadastrar Cidadão</h2>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="/citizen/store">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Cadastrar</button>
                <a href="/citizen" class="btn btn-primary">Voltar</a>
            </form>
        </div>
    </div>

</div>
