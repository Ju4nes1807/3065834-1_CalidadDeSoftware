<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Editar Moto</title>
    <link crossorigin="" href="https://fonts.gstatic.com/" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#f2460d",
                        "background-light": "#f8f6f5",
                        "background-dark": "#221410",
                    },
                    fontFamily: {
                        display: ["Space Grotesk"],
                    },
                    borderRadius: { DEFAULT: "0.25rem", lg: "0.5rem", xl: "0.75rem", full: "9999px" },
                },
            },
        };
    </script>
    <style type="text/css">
        .form-input,
        .form-select {
            --tw-border-opacity: 1;
            border-color: rgb(242 70 13 / var(--tw-border-opacity));
            background-color: transparent;
        }

        .form-input:focus,
        .form-select:focus {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
            --tw-ring-color: rgb(242 70 13 / var(--tw-ring-opacity));
            --tw-ring-opacity: 1;
            border-color: rgb(242 70 13 / var(--tw-ring-opacity));
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-stone-900 dark:text-stone-200">
    <?php
    require_once '../../modelos/MotoDAO.php';
    require_once '../../modelos/conexion.php';

    $motoDAO = new MotoDAO();
    $moto = $motoDAO->buscarMoto((int) $_GET['id']);
    ?>
    <?php
    // En formMoto.php (al inicio)
    
    require_once '../../modelos/MarcaDAO.php';
    require_once '../../modelos/conexion.php';

    // Cargar la lista de marcas
    $marcaDAO = new MarcaDAO();
    $marcas = $marcaDAO->listarTodas();
    ?>
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
    <div class="flex h-auto min-h-screen w-full flex-col">
        <div class="flex h-full grow flex-col">
            <header class="flex items-center justify-between whitespace-nowrap border-b border-primary/20 px-10 py-3">
                <div class="flex items-center gap-4">
                    <div class="text-primary size-8">
                        <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd"
                                d="M39.475 21.6262C40.358 21.4363 40.6863 21.5589 40.7581 21.5934C40.7876 21.655 40.8547 21.857 40.8082 22.3336C40.7408 23.0255 40.4502 24.0046 39.8572 25.2301C38.6799 27.6631 36.5085 30.6631 33.5858 33.5858C30.6631 36.5085 27.6632 38.6799 25.2301 39.8572C24.0046 40.4502 23.0255 40.7407 22.3336 40.8082C21.8571 40.8547 21.6551 40.7875 21.5934 40.7581C21.5589 40.6863 21.4363 40.358 21.6262 39.475C21.8562 38.4054 22.4689 36.9657 23.5038 35.2817C24.7575 33.2417 26.5497 30.9744 28.7621 28.762C30.9744 26.5497 33.2417 24.7574 35.2817 23.5037C36.9657 22.4689 38.4054 21.8562 39.475 21.6262ZM4.41189 29.2403L18.7597 43.5881C19.8813 44.7097 21.4027 44.9179 22.7217 44.7893C24.0585 44.659 25.5148 44.1631 26.9723 43.4579C29.9052 42.0387 33.2618 39.5667 36.4142 36.4142C39.5667 33.2618 42.0387 29.9052 43.4579 26.9723C44.1631 25.5148 44.659 24.0585 44.7893 22.7217C44.9179 21.4027 44.7097 19.8813 43.5881 18.7597L29.2403 4.41187C27.8527 3.02428 25.8765 3.02573 24.2861 3.36776C22.6081 3.72863 20.7334 4.58419 18.8396 5.74801C16.4978 7.18716 13.9881 9.18353 11.5858 11.5858C9.18354 13.988 7.18717 16.4978 5.74802 18.8396C4.58421 20.7334 3.72865 22.6081 3.36778 24.2861C3.02574 25.8765 3.02429 27.8527 4.41189 29.2403Z"
                                fill="currentColor" fill-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h2 class="text-lg font-bold">MotoRiders Colombia</h2>
                </div>
                <div class="flex flex-1 justify-end gap-8">
                    <nav class="flex items-center gap-9">
                        <a class="text-sm font-medium hover:text-primary" href="dashboard.php">Inicio</a>
                        <a class="text-sm font-medium hover:text-primary" href="motos.php">Motos</a>
                    </nav>
                </div>
            </header>
            <main class="flex flex-1 justify-center px-4 py-8 sm:px-6 lg:px-8">
                <div class="w-full max-w-4xl">
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold tracking-tight text-stone-900 dark:text-white">Editar
                            Motocicleta</h1>
                        <p class="mt-2 text-stone-600 dark:text-stone-400">Complete el siguiente formulario para agregar
                            una nueva motocicleta al inventario.</p>

                        <div
                            class="bg-white/5 dark:bg-black/10 p-8 rounded-lg shadow-md border border-gray-200/10 dark:border-gray-700/20">
                            <?php if (!empty($mensaje)): ?>
                                <div class="border px-4 py-3 rounded relative mb-4 <?php echo $clase_alerta; ?>"
                                    role="alert">
                                    <strong class="font-bold">Estado:</strong>
                                    <span class="block sm:inline"><?php echo htmlspecialchars($mensaje); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <form action="../../controladores/MotoController.php" class="space-y-6" method="POST">
                            <input type="hidden" name="id_moto"
                                value="<?php echo htmlspecialchars($moto['id'] ?? ''); ?>" />
                            <div class="grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-2">
                                <div>
                                    <label class="block text-sm font-medium leading-6" for="modelo">Modelo</label>
                                    <div class="mt-2">
                                        <input
                                            class="form-input block w-full rounded-lg border-primary/50 bg-transparent py-2.5 px-4 text-stone-900 placeholder:text-stone-400 focus:ring-primary dark:text-white dark:placeholder:text-stone-500"
                                            id="modelo" name="modelo" placeholder="Ej: MT-09" type="text"
                                            value="<?php echo $moto['modelo']; ?>" />
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium leading-6" for="ano">Año</label>
                                    <div class="mt-2">
                                        <input
                                            class="form-input block w-full rounded-lg border-primary/50 bg-transparent py-2.5 px-4 text-stone-900 placeholder:text-stone-400 focus:ring-primary dark:text-white dark:placeholder:text-stone-500"
                                            id="año" name="año" placeholder="Ej: 2023" type="number"
                                            value="<?php echo $moto['año']; ?>" />
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium leading-6" for="cilindraje">Cilindraje
                                        (cc)</label>
                                    <div class="mt-2">
                                        <input
                                            class="form-input block w-full rounded-lg border-primary/50 bg-transparent py-2.5 px-4 text-stone-900 placeholder:text-stone-400 focus:ring-primary dark:text-white dark:placeholder:text-stone-500"
                                            id="cilindraje" name="cilindraje" placeholder="Ej: 890" type="number"
                                            value="<?php echo $moto['cilindraje']; ?>" />
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium leading-6" for="color">Color</label>
                                    <div class="mt-2">
                                        <input
                                            class="form-input block w-full rounded-lg border-primary/50 bg-transparent py-2.5 px-4 text-stone-900 placeholder:text-stone-400 focus:ring-primary dark:text-white dark:placeholder:text-stone-500"
                                            id="color" name="color" placeholder="Ej: Cyan Storm" type="text"
                                            value="<?php echo $moto['color']; ?>" />
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="block text-sm font-medium leading-6" for="chasis">Número de
                                        Chasis</label>
                                    <div class="mt-2">
                                        <input
                                            class="form-input block w-full rounded-lg border-primary/50 bg-transparent py-2.5 px-4 text-stone-900 placeholder:text-stone-400 focus:ring-primary dark:text-white dark:placeholder:text-stone-500"
                                            id="numero_chasis" name="numero_chasis"
                                            placeholder="Ingrese el número de chasis" type="text"
                                            value="<?php echo $moto['numero_chasis']; ?>" />
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium leading-6" for="precio">Precio (COP)</label>
                                    <div class="mt-2">
                                        <input
                                            class="form-input block w-full rounded-lg border-primary/50 bg-transparent py-2.5 px-4 text-stone-900 placeholder:text-stone-400 focus:ring-primary dark:text-white dark:placeholder:text-stone-500"
                                            id="precio" name="precio" placeholder="Ej: 11500" type="number"
                                            value="<?php echo $moto['precio']; ?>" />
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium leading-6" for="stock">Stock</label>
                                    <div class="mt-2">
                                        <input
                                            class="form-input block w-full rounded-lg border-primary/50 bg-transparent py-2.5 px-4 text-stone-900 placeholder:text-stone-400 focus:ring-primary dark:text-white dark:placeholder:text-stone-500"
                                            id="stock" name="stock" placeholder="Ej: 5" type="number"
                                            value="<?php echo $moto['stock']; ?>" />
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium leading-6" for="tipo">Tipo</label>
                                    <div class="mt-2">
                                        <input
                                            class="form-input block w-full rounded-lg border-primary/50 bg-transparent py-2.5 px-4 text-stone-900 placeholder:text-stone-400 focus:ring-primary dark:text-white dark:placeholder:text-stone-500"
                                            id="tipo" name="tipo" placeholder="Ej: Hyper Naked" type="text"
                                            value="<?php echo $moto['tipo']; ?>" />
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium leading-6" for="marca_id">Marca</label>
                                    <div class="mt-2">
                                        <select
                                            class="form-select block w-full rounded-lg border-primary/50 bg-transparent py-2.5 px-3 text-stone-900 focus:ring-primary dark:text-white"
                                            id="marca_id" name="marca_id" required>
                                            <option class="bg-background-dark text-white" value="">Seleccione la marca
                                            </option>

                                            <?php
                                            if (!empty($marcas)):
                                                foreach ($marcas as $marca):
                                                    ?>

                                                    <option class="bg-background-dark text-white"
                                                        value="<?php echo htmlspecialchars($marca['id']); ?>">
                                                        <?php echo htmlspecialchars($marca['nombre']); ?>
                                                    </option>

                                                    <?php
                                                endforeach;
                                            endif;
                                            ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-end gap-x-4 pt-6">
                                <button
                                    class="rounded-lg bg-primary px-4 py-2.5 text-sm font-bold text-white hover:bg-primary/90"
                                    type="submit" name="btnEditar">
                                    Guardar Motocicleta
                                </button>
                            </div>
                        </form>
                    </div>
            </main>
        </div>
    </div>

</body>

</html>