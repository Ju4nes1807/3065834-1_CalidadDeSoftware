<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Motos</title>
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
        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display">
    <?php
    require_once '../../modelos/MotoDAO.php';
    require_once '../../modelos/conexion.php';

    $motoDAO = new MotoDAO();
    $motos = $motoDAO->consultarMotos();
    ?>
    <div class="flex h-full min-h-screen w-full flex-col">
        <header class="flex items-center justify-between whitespace-nowrap border-b border-primary/20 px-10 py-3">
            <div class="flex items-center gap-4 text-white">
                <div class="size-8 text-primary">
                    <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd"
                            d="M39.475 21.6262C40.358 21.4363 40.6863 21.5589 40.7581 21.5934C40.7876 21.655 40.8547 21.857 40.8082 22.3336C40.7408 23.0255 40.4502 24.0046 39.8572 25.2301C38.6799 27.6631 36.5085 30.6631 33.5858 33.5858C30.6631 36.5085 27.6632 38.6799 25.2301 39.8572C24.0046 40.4502 23.0255 40.7407 22.3336 40.8082C21.8571 40.8547 21.6551 40.7875 21.5934 40.7581C21.5589 40.6863 21.4363 40.358 21.6262 39.475C21.8562 38.4054 22.4689 36.9657 23.5038 35.2817C24.7575 33.2417 26.5497 30.9744 28.7621 28.762C30.9744 26.5497 33.2417 24.7574 35.2817 23.5037C36.9657 22.4689 38.4054 21.8562 39.475 21.6262ZM4.41189 29.2403L18.7597 43.5881C19.8813 44.7097 21.4027 44.9179 22.7217 44.7893C24.0585 44.659 25.5148 44.1631 26.9723 43.4579C29.9052 42.0387 33.2618 39.5667 36.4142 36.4142C39.5667 33.2618 42.0387 29.9052 43.4579 26.9723C44.1631 25.5148 44.659 24.0585 44.7893 22.7217C44.9179 21.4027 44.7097 19.8813 43.5881 18.7597L29.2403 4.41187C27.8527 3.02428 25.8765 3.02573 24.2861 3.36776C22.6081 3.72863 20.7334 4.58419 18.8396 5.74801C16.4978 7.18716 13.9881 9.18353 11.5858 11.5858C9.18354 13.988 7.18717 16.4978 5.74802 18.8396C4.58421 20.7334 3.72865 22.6081 3.36778 24.2861C3.02574 25.8765 3.02429 27.8527 4.41189 29.2403Z"
                            fill="currentColor" fill-rule="evenodd"></path>
                    </svg>
                </div>
                <h2 class="text-lg font-bold text-black dark:text-white">MotoRiders Colombia</h2>
            </div>
            <nav class="flex justify-center gap-8">
                <a class="text-sm font-medium text-black/60 dark:text-white/60 hover:text-primary"
                    href="dashboard.php">Inicio</a>
                <a class="text-sm font-bold text-primary" href="motos.php">Motos</a>
                <a class="text-sm font-medium text-black/60 dark:text-white/60 hover:text-primary"
                    href="marcas.php">Marcas</a>
            </nav>
        </header>
        <main class="flex flex-1 flex-col p-6 lg:p-10">
            <div class="mx-auto w-full max-w-7xl">
                <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
                    <h1 class="text-3xl font-bold text-black dark:text-white">Gestionar Motocicletas</h1>
                    <a class="flex h-10 items-center justify-center gap-2 rounded-lg bg-primary px-5 text-sm font-bold text-white shadow-md transition-transform hover:scale-105"
                        href="formMotos.php">
                        <span class="material-symbols-outlined text-base">add</span>
                        <span>Agregar Nueva Motocicleta</span>
                    </a>
                </div>
                <div
                    class="overflow-x-auto rounded-lg border border-primary/20 bg-background-light dark:bg-background-dark shadow-lg">
                    <table class="min-w-full text-left text-sm">
                        <thead
                            class="border-b border-primary/20 bg-primary/5 text-xs uppercase text-black/60 dark:text-white/60">
                            <tr>
                                <th class="px-6 py-3" scope="col">Modelo</th>
                                <th class="px-6 py-3" scope="col">Año</th>
                                <th class="px-6 py-3" scope="col">Cilindraje</th>
                                <th class="px-6 py-3" scope="col">Color</th>
                                <th class="px-6 py-3" scope="col">Número de Chasis</th>
                                <th class="px-6 py-3" scope="col">Precio</th>
                                <th class="px-6 py-3" scope="col">Stock</th>
                                <th class="px-6 py-3" scope="col">Tipo</th>
                                <th class="px-6 py-3" scope="col">Marca</th>
                                <th class="px-6 py-3 text-right" scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Verificar si el array $motos contiene resultados
                            if (!empty($motos)):

                                // Iterar sobre cada moto
                                foreach ($motos as $moto):
                                    ?>

                                    <tr class="border-b border-primary/20 hover:bg-primary/10">
                                        <th class="whitespace-nowrap px-6 py-4 font-medium text-black dark:text-white"
                                            scope="row">
                                            <?php echo htmlspecialchars($moto['modelo']); ?>
                                        </th>

                                        <td class="px-6 py-4 text-black/80 dark:text-white/80">
                                            <?php echo htmlspecialchars($moto['año']); ?>
                                        </td>
                                        <td class="px-6 py-4 text-black/80 dark:text-white/80">
                                            <?php echo htmlspecialchars($moto['cilindraje']); ?>cc
                                        </td>
                                        <td class="px-6 py-4 text-black/80 dark:text-white/80">
                                            <?php echo htmlspecialchars($moto['color']); ?>
                                        </td>
                                        <td class="px-6 py-4 text-black/80 dark:text-white/80">
                                            <?php echo htmlspecialchars($moto['numero_chasis']); ?>
                                        </td>
                                        <td class="px-6 py-4 text-black/80 dark:text-white/80">
                                            $<?php echo number_format($moto['precio'], 2); ?>
                                        </td>
                                        <td class="px-6 py-4 text-black/80 dark:text-white/80">
                                            <?php echo htmlspecialchars($moto['stock']); ?>
                                        </td>
                                        <td class="px-6 py-4 text-black/80 dark:text-white/80">
                                            <?php echo htmlspecialchars($moto['tipo']); ?>
                                        </td>

                                        <td class="px-6 py-4 text-black/80 dark:text-white/80">
                                            <?php echo htmlspecialchars($moto['marca_nombre']); ?>
                                        </td>

                                        <td class="px-6 py-4 text-right">
                                            <div class="flex justify-end gap-2">
                                                <a href="editarMoto.php?id=<?php echo htmlspecialchars($moto['id']); ?>"
                                                    class="flex h-8 w-8 items-center justify-center rounded-lg text-black/60 hover:bg-primary/20 hover:text-primary dark:text-white/60 dark:hover:text-primary">
                                                    <span class="material-symbols-outlined text-lg">edit</span>
                                                </a>
                                                <form action="../../controladores/MotoController.php" method="POST"
                                                    style="display:inline;">
                                                    <input type="hidden" name="id_moto_eliminar"
                                                        value="<?php echo htmlspecialchars($moto['id']); ?>">
                                                    <button type="submit" name="btnEliminar"
                                                        onclick="return confirm('¿Está seguro de eliminar esta moto?');"
                                                        class="flex h-8 w-8 items-center justify-center rounded-lg text-black/60 hover:bg-primary/20 hover:text-primary dark:text-white/60 dark:hover:text-primary">
                                                        <span class="material-symbols-outlined text-lg">delete</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    <?php
                                endforeach;
                            else:
                                ?>

                                <tr>
                                    <td colspan="10" class="px-6 py-4 text-center text-black/60 dark:text-white/60">
                                        No hay motocicletas registradas en este momento.
                                    </td>
                                </tr>

                                <?php
                            endif;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

</body>

</html>