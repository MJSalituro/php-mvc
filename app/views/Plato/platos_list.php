<h2>Lista de Platos</h2>
<table class="table table-striped">
    <thead>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Ver | Editar información del Plato</th>
        <th>Ver | Editar Foto de Plato</th>
        <th>Eliminar Plato</th>
    </thead>
<tbody>
    <?php
    while ($row = $platos->fetch_assoc())
    {
        echo '<tr>';
        echo "<td>{$row['Nombre']}</td>";
        echo "<td>{$row['descripcion']}</td>";
        echo "<td>{$row['precio']}</td>";
        echo "<td><a href='" . FOLDER_PATH . "Plato/PlatoList/{$row['Nombre']}'>Editar</a></td>";
        echo "<td><a href='" . FOLDER_PATH . "Plato/PlatoFotos/{$row['Nombre']}'>Editar</a></td>";
        echo "<td><a href='" . FOLDER_PATH . "Plato/removePlato/{$row['Nombre']}'>Eliminar</a></td>";
        echo '</tr>';

    }
    ?>
    </tbody>
</table>
