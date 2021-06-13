<?php include('header.php') ?>
<section>
    <h2>Seleccionar información / Leer información</h2>
    <form action="." method="GET">
        <input type="hidden" name="accion" value="seleccionar">
        <label for="ciudad">Nombre de la ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" required>
        <button>Enviar</button>
    </form>
</section>
<section>
    <h2>Insertar informacion / Crear informacion</h2>
    <form action="." method="POST">
        <input type="hidden" name="accion" value="insertar">
        <label for="nuevaciudad">Nombre de la ciudad:</label>
        <input type="text" id="nuevaciudad" name="ciudad" required>
        <label for="codigopais">Codigo pais:</label>
        <input type="text" id="codigopais" name="codigopais" maxlength="3" required>
        <label for="distrito">Distrito:</label>
        <input type="text" id="distrito" name="distrito" required>
        <label for="poblacion">Población:</label>
        <input type="text" id="poblacion" name="poblacion" required>
        <button>Enviar</button>
    </form>
</section>
<?php include('status.php') ?>
<?php include('footer.php') ?>