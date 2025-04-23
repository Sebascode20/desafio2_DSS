<h1><?= htmlspecialchars($page_title) ?></h1>

<p>
  <a href="index.php?action=editar" class="btn btn-success">
    + Nuevo Apunte
  </a>
</p>

<table class="table">
  <thead>
    <tr>
      <th>Título</th>
      <th>Vista previa</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $nota): ?>
      <tr>
        <td><?= htmlspecialchars($nota['titulo']) ?></td>
        <td>
          <?= htmlspecialchars(
                mb_strimwidth(
                  $nota['contenido'],
                  0,
                  50,    // número de caracteres a mostrar
                  '…'    // reemplazo al final
                )
             ) ?>
        </td>
        <td>
          <a href="index.php?action=editar&id=<?= $nota['id'] ?>"
             class="btn btn-sm btn-primary">
            Editar
          </a>
          <a href="index.php?action=confirmarBorrado&id=<?= $nota['id'] ?>"
             class="btn btn-sm btn-danger">
            Borrar
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
