<body>

    <h1>Hola <?php echo $_SESSION['nombreUsu']; ?> bienbenido de nuevo</h1>
    <div class="enlacesUsu">
        <nav>
            <button onclick="location.href='index.php?c=usuario&a=logout'">Cerrar sesión</button>
            <br><br>
            <button>Ver estado Reparación en directo</button>
            <br><br>
        </nav>
    </div>

</body>