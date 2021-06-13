<?php include('header.php') ?>
<?php if ($resultados) { ?>
    <section>
        <h2>Actualizar o Eliminar Información</h2>
        <?php foreach ($resultados as $resultado) {
            $id = $resultado['ID'];
            $ciudad = $resultado['Name'];
            $codigopais = $resultado['CountryCode'];
            $distrito = $resultado['District'];
            $poblacion = $resultado['Population'];
        ?>
            <form class="update" action="." method="POST">
                <input type="hidden" name="accion" value="actualizar">
                <input type="hidden" name="id" value="<?= $id ?>">
                <label for="ciudad-<?= $id ?>">Nombre de la ciudad:</label>
                <input type="text" id="ciudad-<?= $id ?>" 
                    name="ciudad" value="<?= $ciudad ?>" required>
                <label for="codigopais-<?= $id ?>">Codigo Pais:</label>
                <input type="text" id="codigopais-<?= $id ?>" 
                    name="codigopais" value="<?= $codigopais ?>" required>
                <label for="distrito-<?= $id ?>">Distrito:</label>
                <input type="text" id="distrito-<?= $id ?>" 
                    name="distrito" value="<?= $distrito ?>" required>
                <label for="poblacion-<?= $id ?>">Población:</label>
                <input type="text" id="poblacion-<?= $id ?>" 
                    name="poblacion" value="<?= $poblacion ?>" required>
                <button>Actualizar</button>
            </form>
            <form class="delete" action="." method="POST">
                <input type="hidden" name="accion" value="borrar">
                <input type="hidden" name="id" value="<?= $id ?>">
                <button class="red">Borrar</button>
            </form>
        <?php } ?>
    </section>
<?php } else { ?>
    <p>No hay resultados!.</p>
<?php } ?>
<?php include('status.php') ?>
<br>
<p><a href=".">Regrese al formulario de peticiones</a></p>
<?php include('footer.php') ?>