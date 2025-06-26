<?php
require_once 'database/connect.php';

$sql = "SELECT * FROM comentarios ORDER BY fechanota DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0):
    while ($row = $result->fetch_assoc()):
?>
    <div class="card bg-dark text-white my-3 p-3">
        <h5><?= htmlspecialchars($row['nombreyapellido']) ?>
            <small class="text-muted">(<?= htmlspecialchars($row['email']) ?>)</small>
        </h5>
        <p><?= nl2br(htmlspecialchars($row['nota'])) ?></p>
        <small class="text-muted">Fecha: <?= $row['fechanota'] ?></small><br>
        <a href="options/edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm mt-2">Editar</a>
        <a href="options/delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm mt-2" onclick="return confirm('¿Seguro que deseas eliminar este comentario?')">Eliminar</a>
    </div>
<?php endwhile;
else:
    echo "<p class='text-muted'>No hay comentarios aún.</p>";
endif;
$conn->close();
?>