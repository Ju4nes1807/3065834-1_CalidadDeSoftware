<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Registrar Marca</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&amp;display=swap"
        rel="stylesheet" />
    <script>
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
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Space Grotesk', sans-serif;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-gray-800 dark:text-gray-200">
    <?php
    $mensaje = "";
    $clase_alerta = "";

    if (isset($_GET['mensaje'])) {

        $mensaje = urldecode($_GET['mensaje']);

        if (strpos($mensaje, 'Error:') !== false || strpos($mensaje, 'Error al') !== false) {
            $clase_alerta = "bg-red-100 border-red-400 text-red-700";
        } else {
            $clase_alerta = "bg-green-100 border-green-400 text-green-700";
        }
    }
    ?>
    <div class="min-h-screen flex flex-col">
        <header class="border-b border-gray-200/10 dark:border-gray-700/20">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center gap-4">
                        <svg class="h-8 w-8 text-primary" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.38 .41L23.59 11.62C24.08 12.11 23.75 13 23.01 13H17V17C17 17.55 16.55 18 16 18H8C7.45 18 7 17.55 7 17V13H.99C.25 13 -.08 12.11 .41 11.62L11.62 .41C11.86 .17 12.14 .17 12.38 .41ZM15 16V10H9V16H15Z">
                            </path>
                            <path d="M4 19H20V21H4V19Z"></path>
                        </svg>
                        <h1 class="text-xl font-bold text-gray-900 dark:text-white">MotoRiders Colombia</h1>
                    </div>
                </div>
            </div>
        </header>
        <main class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="w-full max-w-lg space-y-8">
                <div>
                    <h2 class="text-3xl font-bold tracking-tight text-center text-gray-900 dark:text-white">Marca de
                        Motocicleta</h2>
                    <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-400">
                        Añada una marca de motocicleta
                    </p>
                </div>
                <div
                    class="bg-white/5 dark:bg-black/10 p-8 rounded-lg shadow-md border border-gray-200/10 dark:border-gray-700/20">
                    <?php if (!empty($mensaje)): ?>
                        <div class="border px-4 py-3 rounded relative mb-4 <?php echo $clase_alerta; ?>" role="alert">
                            <strong class="font-bold">Estado:</strong>
                            <span class="block sm:inline"><?php echo htmlspecialchars($mensaje); ?></span>
                        </div>
                    <?php endif; ?>
                    <form action="../../controladores/MarcaController.php" class="space-y-6" method="POST">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                for="brand-name">Nombre</label>
                            <div class="mt-1">
                                <input
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm bg-background-light dark:bg-background-dark text-gray-900 dark:text-white"
                                    id="nombre_marca" name="nombre_marca" placeholder="Ej. Yamaha" required=""
                                    type="text" />
                            </div>
                        </div>
                        <div class="flex items-center justify-center space-x-4 pt-4">
                            <button
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
                                type="submit" name="btnRegistrar">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

</body>

</html>