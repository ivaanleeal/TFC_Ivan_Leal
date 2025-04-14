<section class="fromInicioSesion">
    <div>
        <h2 class="clientes">Accede a tu Área</h2>
        <form class="contenidoForm" method="post" action="index.php?c=usuario&a=loginVerificar">
            Nombre Usuario
            <input type="text" name="usuario" placeholder="Escriba su nombre de Usuario" class="input-estilo"><br />
            <p id="errorDni"></p>
            <br /><br />

            Contraseña Usuario
            <input type="password" name="password" placeholder="Escriba su Contraseña" class="input-estilo"><br />
            <p id="errorDni"></p>
            <br /><br />


            <label for="recordar">Recordar</label>
            <input type="checkbox" id="recordar" checked>

            <button class="boton" id="enviar" type="submit">Entrar</button>

        </form>
    </div>
</section>