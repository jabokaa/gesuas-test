<nav aria-label="Paginacoes">
  <ul class="pagination">
    <!-- Botão Anterior -->
    <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
      <a class="page-link" href="<?= $page > 1 ? '?page=' . ($page - 1) : '#' ?>" tabindex="-1">Anterior</a>
    </li>

    <!-- Botões de Página -->
    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
        <li class="page-item <?= $i == $page ? 'active' : '' ?>">
            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?>
                <?php if ($i == $page) : ?>
                    <span class="sr-only">(atual)</span>
                <?php endif; ?>
            </a>
        </li>
    <?php endfor; ?>

    <!-- Botão Próxima -->
    <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
      <a class="page-link" href="<?= $page < $totalPages ? '?page=' . ($page + 1) : '#' ?>">Próxima</a>
    </li>
  </ul>
</nav>