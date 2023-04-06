<fieldset class="informacion informacion-general-crear">
    <legend>Información general</legend>

    <label for="titulo">Titulo</label>
    <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo propiedad" value="<?php echo S($propiedad->titulo); ?>">

    <label for="precio">Precio</label>
    <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio propiedad" value="<?php echo S($propiedad->precio); ?>">

    <label for="imagen">Imagen</label>
    <input type="file" id="imagen" name="propiedad[imagen]" accept="image/jpeg, image/png">

    <?php if($propiedad->imagen) { ?>
        <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small">
    <?php } ?>

    <label for="descripcion">Descripción</label>
    <textarea id="descripcion" name="propiedad[descripcion]"><?php echo S($propiedad->descripcion); ?></textarea>
</fieldset>

<?php foreach($errores2 as $error2): ?>
    <div class="alerta error">
    <?php echo $error2; ?>
    </div>
<?php endforeach; ?>

<fieldset class="informacion informacion-propiedad-crear">
    <legend>Información propiedad</legend>

    <label for="habitaciones">Habitaciones</label>
    <input 
        type="number" 
        id="habitaciones" 
        name="propiedad[habitaciones]" 
        placeholder="Ej: 3" 
        min="1" max="9" 
        value="<?php echo S($propiedad->habitaciones); ?>" require>

    <label for="wc">Baños</label>
    <input 
        type="number" 
        id="wc" 
        name="propiedad[wc]" 
        placeholder="Ej: 3" 
        min="1" max="9" 
        value="<?php echo S($propiedad->wc); ?>" require>

    <label for="estacionamientos">Estacionamiento</label>
    <input type="number" id="estacionamientos" name="propiedad[estacionamientos]" placeholder="Ej: 3" value="<?php echo S($propiedad->estacionamientos); ?>" require>
</fieldset>

<?php foreach($errores3 as $error3): ?>
    <div class="alerta error">
    <?php echo $error3; ?>
                </div>
<?php endforeach; ?>

<fieldset class="informacion informacion-vendedor-crear">

    <legend>Vendedor</legend>

    <label for="vendedor">Vendedor</label>

    <select name="propiedad[vendedores_id]" id="vendedor">
        <option disabled selected value="">-- Seleccione --</option>
        <?php foreach($vendedores as $vendedor) { ?>
            <option 
            <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : '' ?> 
            value="<?php echo S($vendedor->id) ?>">
            <?php echo S($vendedor->nombre) . " " . S($vendedor->apellido); ?> </option>
        <?php } ?>
    </select>
</fieldset>