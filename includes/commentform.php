<form action="options/save.php" method="POST">
    <div class="form-group">
        <label>Nombre y Apellido</label>
        <input type="text" name="nombreyapellido" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Comentario</label>
        <textarea name="nota" class="form-control" rows="4" required></textarea>
    </div>
    <button type="submit" class="btn btn-danger mt-3">Enviar</button>
</form>