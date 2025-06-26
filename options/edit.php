<?php
require_once '../database/connect.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: ../index.php#comments");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $stmt = $conn->prepare("SELECT * FROM comentarios WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $comentario = $stmt->get_result()->fetch_assoc();
    ?>
    <form method="POST">
        <input name="nombreyapellido" class="form-control" value="<?= htmlspecialchars($comentario['nombreyapellido']) ?>" required>
        <input name="email" class="form-control" value="<?= htmlspecialchars($comentario['email']) ?>" required>
        <textarea name="nota" class="form-control"><?= htmlspecialchars($comentario['nota']) ?></textarea>
        <button class="btn btn-success mt-2">Guardar cambios</button>
    </form>
<?php
} else {
    
    $nombre = $_POST['nombreyapellido'];
    $email = $_POST['email'];
    $nota = $_POST['nota'];

    $stmt = $conn->prepare("UPDATE comentarios SET nombreyapellido=?, email=?, nota=? WHERE id=?");
    $stmt->bind_param("sssi", $nombre, $email, $nota, $id);
    $stmt->execute();
    header("Location: ../index.php#comments");
    exit;
}
?>