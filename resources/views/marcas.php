<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Marcas</title>
    <link crossorigin="" href="https://fonts.gstatic.com/" rel="preconnect" />
    <link as="style" href="https://fonts.googleapis.com/css2?display=swap&amp;family=Space+Grotesk:wght@400;500;700"
        onload="this.rel='stylesheet'" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
                        "display": ["Space Grotesk", "sans-serif"]
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
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-gray-800 dark:text-gray-200">
    <?php
    require_once '../../modelos/MarcaDAO.php';
    require_once '../../modelos/conexion.php';

    $marcaDAO = new MarcaDAO();
    $listaMarcas = $marcaDAO->consultarMarcas();
    ?>
    <div class="flex flex-col min-h-screen">
        <header
            class="sticky top-0 z-10 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-sm border-b border-black/10 dark:border-white/10">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center gap-4">
                        <span class="material-symbols-outlined text-primary text-3xl">sports_motorsports</span>
                        <h1 class="text-xl font-bold text-gray-900 dark:text-white">MotoRiders Colombia</h1>
                    </div>
                    <nav class="hidden md:flex items-center gap-8">
                        <a class="text-sm font-medium hover:text-primary dark:hover:text-primary transition-colors"
                            href="dashboard.php">Inicio</a>
                        <a class="text-sm font-bold text-primary" href="marcas.php">Marcas</a>
                        <a class="text-sm font-medium hover:text-primary dark:hover:text-primary transition-colors"
                            href="motos.php">Motos</a>
                    </nav>
                </div>
            </div>
        </header>
        <main class="flex-grow container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col gap-8">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Marcas de Motocicletas</h2>
                    <a class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-primary text-white font-bold rounded-lg shadow-md hover:bg-opacity-90 transition-all focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary focus:ring-offset-background-light dark:focus:ring-offset-background-dark"
                        href="formMarca.php">
                        <span class="material-symbols-outlined">add_circle</span>
                        <span>Agregar Nueva Marca</span>
                    </a>
                </div>
                <div
                    class="bg-background-light dark:bg-background-dark/50 rounded-xl shadow-lg overflow-hidden border border-black/10 dark:border-white/10">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-black/5 dark:bg-white/5">
                                <tr>
                                    <th
                                        class="px-6 py-4 text-sm font-bold uppercase tracking-wider text-gray-600 dark:text-gray-300">
                                        Nombre
                                    </th>
                                    <th
                                        class="px-6 py-4 text-sm font-bold uppercase tracking-wider text-gray-600 dark:text-gray-300 text-right">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-black/10 dark:divide-white/10">

                                <?php
                                // 2. INICIAR EL BUCLE PARA RECORRER LAS MARCAS
                                foreach ($listaMarcas as $marca) {
                                    ?>

                                    <tr class="hover:bg-black/5 dark:hover:bg-white/5 transition-colors">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900 dark:text-white">
                                            <?php echo htmlspecialchars($marca['nombre']); ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right">
                                            <div class="flex items-center justify-end gap-4">
                                                <a href="formEditarMarca.php?id=<?php echo $marca['id']; ?>"
                                                    class="flex items-center gap-1 text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary transition-colors">
                                                    <span class="material-symbols-outlined text-base">edit</span>
                                                    Editar
                                                </a>
                                                <form action="../../controladores/MarcaController.php" method="POST"
                                                    style="display:inline;">

                                                    <input type="hidden" name="id_marca_eliminar"
                                                        value="<?php echo htmlspecialchars($marca['id']); ?>">

                                                    <input type="hidden" name="action" value="eliminar">

                                                    <button type="submit" name="btnEliminar"
                                                        class="flex items-center gap-1 text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-red-500 dark:hover:text-red-400 transition-colors"
                                                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta marca? Esta acción no se puede deshacer.');">

                                                        <span class="material-symbols-outlined text-base">delete</span>
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    <?php
                                }
                                ?>

                                <?php

                                if (empty($listaMarcas)) {
                                    echo '<tr><td colspan="2" class="px-6 py-4 text-center text-gray-500">No hay marcas registradas.</td></tr>';
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

</html>