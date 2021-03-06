<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Usuarios
        </h1>
        <div class="panel panel-default">
            <div class="panel-heading"><h4><?php echo $titulo; ?></h4></div>
            <div class="panel-body">
                <form action="/actualizar_usuario" method="POST">
                    <input type="hidden" name="id" id="id" value="<?php echo $usuario['id']; ?>">
                    <div class="form-group">
                        <label for="nombre">Nombre completo</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre completo" value="<?php echo $usuario['nombre']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo electr&oacute;nico</label>
                        <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo electr&oacute;nico" value="<?php echo $usuario['correo']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contrase&ntilde;a</label>
                        <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Contrase&ntilde;a" required>
                        <p class="help-block">Ingrese una nueva contrase&ntilde;a.</p>
                    </div>

                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>
            </div>
        </div>
    </div>
</div>