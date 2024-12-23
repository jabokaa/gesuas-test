<div class="container mt-4">
        <!-- Filtro -->
        <form method="GET" action="" class="mb-4">
            <div class="form-row">
                <div class="col-md-3 mb-2">
                    <input type="text" name="name" class="form-control" placeholder="Nome" value="<?= $_GET['name'] ?? '' ?>">
                </div>
                <div class="col-md-3 mb-2">
                    <input type="text" name="nis" class="form-control" placeholder="NIS" value="<?= $_GET['nis'] ?? '' ?>">
                </div>
                <div class="col-md-2 mb-2">
                    <input type="date" name="date" class="form-control" value="<?= $_GET['date'] ?? '' ?>">
                </div>
                <div class="col-md-2 text-center">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
                <!-- Botão Cadastrar -->
                <div class="col-md-2 text-center">
                    <a href="/citizen/create" class="btn btn-success">Cadastrar Novo Cidadão</a>
                </div>
            </div>
        </form>

        <!-- Tabela -->
        <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>NIS</th>
            <th>Data de Criação</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($citizens as $citizen) : ?>
            <tr>
                <td><?= $citizen['name'] ?></td>
                <td><?= $citizen['nis'] ?></td>
                <td><?= $citizen['created_at'] ?></td>
                <td><a href="/citizen/show?nis=<?= $citizen['nis'] ?>"><i class="bi bi-eye"></i></a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php 
if(isset($isPaginate)) {
    require __DIR__ . DIRECTORY_SEPARATOR ."..".DIRECTORY_SEPARATOR ."layout".DIRECTORY_SEPARATOR ."paginate.php"; 
}?>
</div>

