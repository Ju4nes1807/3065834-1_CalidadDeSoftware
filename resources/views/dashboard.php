<!DOCTYPE html>
<html class="dark" lang="es">

<head>
    <meta charset="utf-8" />
    <title>Sesion Principal</title>
    <link href="data:image/x-icon;base64," rel="icon" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link crossorigin="" href="https://fonts.gstatic.com/" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#f2460d",
                        "background-light": "#f8f6f5",
                        "background-dark": "#221410",
                    },
                    fontFamily: {
                        "display": ["Space Grotesk"]
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                },
            },
        }
    </script>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-gray-800 dark:text-gray-200">
    <?php
    require_once '../../modelos/conexion.php';

    $conn = Conexion::conectar();

    // Contar motos
    $sql_motos = "SELECT COUNT(*) AS total_motos FROM motos";
    $stmt_motos = $conn->query($sql_motos);
    $total_motos = 0;
    if ($row = $stmt_motos->fetch(PDO::FETCH_ASSOC)) {
        $total_motos = $row['total_motos'];
    }

    // Contar marcas
    $sql_marcas = "SELECT COUNT(*) AS total_marcas FROM marca";
    $stmt_marcas = $conn->query($sql_marcas);
    $total_marcas = 0;
    if ($row = $stmt_marcas->fetch(PDO::FETCH_ASSOC)) {
        $total_marcas = $row['total_marcas'];
    }
    ?>


    <div class="flex min-h-screen flex-col">
        <header class="border-b border-black/10 dark:border-white/10">
            <div class="container mx-auto flex items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-4">
                    <div class="text-primary">
                        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.5 1c-1.3 0-2.4.6-3.2 1.5l-6 6c-.4.4-.6 1-.6 1.5s.2 1.1.6 1.5l6 6c.8.9 1.9 1.5 3.2 1.5 2.5 0 4.5-2 4.5-4.5V5.5C21 3 19 1 16.5 1zm-1.5 13.3l-5.3-5.3 5.3-5.3v10.6zM3 19c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z">
                            </path>
                        </svg>
                    </div>
                    <h1 class="text-xl font-bold text-gray-900 dark:text-white">MotoRiders Colombia</h1>
                </div>
                <nav class="hidden items-center gap-6 md:flex">
                    <a class="text-sm font-medium text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-primary"
                        href="motos.php">Todas las Motos Registradas</a>
                    <a class="text-sm font-medium text-gray-600 hover:text-primary dark:text-gray-300 dark:hover:text-primary"
                        href="marcas.php">Marcas de Motos Registradas</a>
                    <button id="logoutBtn" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                        Cerrar Sesión
                    </button>
                </nav>
            </div>
        </header>
        <main class="flex-1">
            <div class="container mx-auto px-4 py-8 sm:px-6 lg:px-8">
                <div class="max-w-3xl">
                    <div class="container flex-1 px-4 sm"></div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-4xl">
                        Bienvenido de nuevo, <span id="username-display"></span>
                    </h2>
                    <p class="mt-4 text-lg text-gray-500 dark:text-gray-400">Aquí tienes un resumen de tus actividades
                        recientes y las actualizaciones importantes en MotoCentral.</p>
                </div>
                <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-2">
                    <div
                        class="rounded-lg border border-black/10 bg-white p-6 shadow-sm dark:border-white/10 dark:bg-black/20">
                        <div class="flex items-center gap-4">
                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-lg bg-primary/10 text-primary">
                                <span class="material-symbols-outlined">two_wheeler</span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Motos Registradas</h3>
                        </div>
                        <p class="mt-4 text-3xl font-bold text-gray-900 dark:text-white">
                            <?php echo number_format($total_motos); ?>
                        </p>
                    </div>
                    <div
                        class="rounded-lg border border-black/10 bg-white p-6 shadow-sm dark:border-white/10 dark:bg-black/20">
                        <div class="flex items-center gap-4">
                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-lg bg-primary/10 text-primary">
                                <span class="material-symbols-outlined">label</span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Marcas Registradas</h3>
                        </div>
                        <p class="mt-4 text-3xl font-bold text-gray-900 dark:text-white">
                            <?php echo number_format($total_marcas); ?>
                        </p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const session = JSON.parse(localStorage.getItem('session'));

            if (!session) {
                // Si no hay sesión, redirige al login
                globalThis.location.href = '../views/inicioSesion.php';
                return;
            }

            // Muestra el nombre del usuario
            const usernameSpan = document.getElementById('username-display');
            usernameSpan.textContent = session.username;

        });
    </script>
    <script src="../js/cerrarSesion.js"></script>

</body>

</html>