<h2>Editar fotos de plato</h2>

<form method="POST" action="<?= FOLDER_PATH . 'Plato/addFotoPlato' ?>" enctype="multipart/form-data">
    <input type="file" name="Imagen" id="Imagen">
    <input type="hidden" name="NombrePlato" id="NombrePLato" value="<?=$info_plato->Nombre?>">
    <button type="submit" class="btn btn-primary">Agregar Foto de Plato</button>
    <a class="btn btn-default" href="<?= FOLDER_PATH . 'Plato/PlatoFotos/'.$info_plato->Nombre ?>" role="button">Cancelar</a>
</form>
<table class="table table-striped">
    <thead>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
    </thead>
    <?php
    echo '<tr>';
    echo "<td>{$info_plato->Nombre}</td>";
    echo "<td>{$info_plato->descripcion}</td>";
    echo "<td>{$info_plato->precio}</td>";

    ?>
<tbody>
    <?php
    while ($row = $info_fotos->fetch_assoc())
    {
        $nombreFoto = $row['Foto'];
        echo '<tr>';
        echo "<td><img src=\"/uploads/$nombreFoto\" width=\"50%\" height=\"15%\"></td>";
        echo "<td><a href='" . FOLDER_PATH . "Plato/removeFotoPlato/{$row['Nombre']}"."&"."{$nombreFoto}'>Eliminar</a></td>";
        echo '</tr>';

    }
    ?>
    </tbody>
</table>
<div align="right">
<a class="btn btn-default" href="<?= FOLDER_PATH . 'Plato/PlatosList' ?>" role="button">Atrás</a>
</div>