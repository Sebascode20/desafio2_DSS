<?php include 'template/encabezado.php'; ?>

<div class="alert alert-warning">
  <h5>¿Confirma que desea eliminar esta nota?</h5>
  
  <form action="index.php?action=borrar" method="POST">
    <input type="hidden" name="id" 
           value="<?= htmlspecialchars($data['id'] ?? '') ?>">

    <p><strong>Título:</strong> 
      <?= htmlspecialchars($data['titulo'] ?? 'Sin título') ?>
    </p>

    <button type="submit" class="btn btn-danger">Eliminar</button>
    <a href="index.php?action=listar" 
       class="btn btn-outline-success">Cancelar</a>
  </form>
</div>

<?php include 'template/piedepagina.php'; ?>
