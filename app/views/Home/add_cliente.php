<h2>Registro de Cliente</h2>

<div>
    <form method="POST" action="<?= FOLDER_PATH . 'Home/addCliente' ?>" enctype="multipart/form-data">
        <label> Nombre</label>
        <input type="text" name="Nombre" id="Nombre">
        </br>
        <label> Cédula</label>
        <input type="text" name="CI" id="CI">
        </br>
        <label> Correo Electrónico</label>
        <input type="text" name="Email" id="Email">
        </br>
        <label> Contraseña </label>
        <input type="text" name="Contraseña" id="Contraseña">
        </br>
        <label> Dirección</label>
        <input type="text" name="Dirección" id="Dirección">

        <button type="submit" class="btn btn-primary">Agregar</button>
        <a class="btn btn-default" href="<?= FOLDER_PATH ?>" role="button">Cancelar</a>
    </form>
</div>