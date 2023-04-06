<?php foreach($errores as $error): ?>
        <div class="alerta error">
        <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

<fieldset class="informacion informacion-general-crear">
    <legend>Datos vendedor(a)</legend>

    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="vendedores[nombre]" placeholder="Nombre vendedor" value="<?php echo S($vendedor->nombre); ?>">

    <label for="apellido">Apellido</label>
    <input type="text" id="apellido" name="vendedores[apellido]" placeholder="Apellido vendedor" value="<?php echo S($vendedor->apellido); ?>">

    <label for="telefono">Telefono</label>
    <input type="number" id="telefono" name="vendedores[telefono]" placeholder="67883399" value="<?php echo S($vendedor->telefono); ?>">

</fieldset>