<?php
$id        = $data['id']        ?? '';
$titulo    = $data['titulo']    ?? '';
$contenido = $data['contenido'] ?? '';
?>

<h1><?= htmlspecialchars($page_title) ?></h1>

<!-- Botón fijo para regresar -->
<p class="mb-3">
  <a href="index.php?action=listar" class="btn btn-outline-secondary">
    ← Volver al listado
  </a>
</p>

<div class="row">
  <?php if (isset($_GET['response']) && $_GET['response']==='true'): ?>
    <div class="alert alert-success">
      Operación realizada correctamente.
      <a href="index.php?action=listar">Volver al listado</a>
    </div>
  <?php endif; ?>

  <form class="form" action="index.php?action=guardar" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

    <div class="form-group">
      <label>Título</label>
      <input class="form-control"
             type="text"
             name="titulo"
             value="<?= htmlspecialchars($titulo) ?>"
             required />
    </div>

    <div class="form-group mb-2">
      <label>Contenido</label>
      <textarea class="form-control"
                style="white-space: pre-wrap;"
                name="contenido"
                rows="5"
                required><?= htmlspecialchars($contenido) ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <!-- Cancelar dentro del form también -->
    <a href="index.php?action=listar" class="btn btn-outline-danger">Cancelar</a>
  </form>
</div>
