<nav aria-label="Paginação">
  <ul class="pagination">
    <?php
    // Captura os parâmetros existentes na query string
    $queryParams = $_GET;

    // Define a página atual, padrão é 1 se não existir no $_GET
    $page = isset($queryParams['page']) ? (int)$queryParams['page'] : 1;

    // Total de páginas (substitua pelo valor dinâmico no seu contexto)
    $totalPages = $totalPages ?? 1;

    // Remove o parâmetro "page" para reconstruí-lo
    unset($queryParams['page']);
    ?>

    <!-- Botão Anterior -->
    <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
      <a class="page-link" href="<?= $page > 1 ? '?' . http_build_query(array_merge($queryParams, ['page' => $page - 1])) : '#' ?>" tabindex="-1">Anterior</a>
    </li>

    <!-- Botões de Página -->
    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
        <li class="page-item <?= $i == $page ? 'active' : '' ?>">
            <a class="page-link" href="?<?= http_build_query(array_merge($queryParams, ['page' => $i])) ?>">
                <?= $i ?>
                <?php if ($i == $page) : ?>
                    <span class="sr-only">(atual)</span>
                <?php endif; ?>
            </a>
        </li>
    <?php endfor; ?>

    <!-- Botão Próxima -->
    <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
      <a class="page-link" href="<?= $page < $totalPages ? '?' . http_build_query(array_merge($queryParams, ['page' => $page + 1])) : '#' ?>">Próxima</a>
    </li>
  </ul>
</nav>
