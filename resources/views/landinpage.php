<!DOCTYPE html>
<html class="dark" lang="es">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>MotoRiders Colombia</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#f2460d",
                        "background-light": "#f8f6f5",
                        "background-dark": "#1a1a1a",
                        "card-dark": "#2c2c2c",
                    },
                    fontFamily: {
                        "display": ["Space Grotesk"]
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                },
            },
        }
    </script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>

<body class="font-display bg-background-light dark:bg-background-dark text-gray-900 dark:text-white">
    <div class="relative w-full h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0 bg-cover bg-center"
            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDW3rl8EifykFQNAWujnkNokHVWqG--gsoxJfHeVlDlpbPyrPSDXG397QlwdBeLntOD7SBu0QiZfyLgPXKDFWz4U28XuRJXz0xWfAjt6LV631_ndWnFPZ-fETs30A6Ke2V0g4ht6ym5c2hqpd6h9ktSB9JAqbBbuLYghXAztGtctjl7frwcvOGdCFvuT1iCPlXg7aL3Fn8dJS-fUpjk_3RwZQEu4fyDUq8XJvpiZyuSlwVI21MSqty8WpDzjw1-zlM1JCYiNzzn6Gto");'>
            <div class="absolute inset-0 bg-black/60"></div>
        </div>
        <header class="absolute top-0 left-0 right-0 z-20 p-4">
            <div class="container mx-auto flex justify-between items-center">
                <a class="text-2xl font-bold text-white" href="#">MotoRiders Colombia</a>
                <div class="flex items-center gap-4">
                    <a class="hidden md:inline-block px-4 py-2 rounded-lg text-white font-bold text-base hover:bg-white/10 transition-colors duration-300"
                        href="inicioSesion.php">Log In</a>
                    <a class="px-4 py-2 rounded-lg bg-primary text-white font-bold text-base hover:bg-primary/90 transition-colors duration-300"
                        href="registro.php">Sign Up</a>
                </div>
            </div>
        </header>
        <main class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white p-4">
            <div class="max-w-3xl">
                <h1 class="text-5xl md:text-7xl font-bold leading-tight tracking-tighter">
                    Rueda con Pasión Colombiana
                </h1>
                <p class="mt-4 text-lg md:text-xl text-white/80 max-w-xl mx-auto">
                    Descubre las mejores motos de Colombia. Únete a nuestra comunidad, explora rutas increíbles y vive
                    la libertad sobre dos ruedas.
                </p>
            </div>
        </main>
    </div>
    <section class="py-16 sm:py-24 bg-background-light dark:bg-background-dark" id="gallery">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12">Galería de Marcas Populares</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="group overflow-hidden rounded-lg shadow-lg dark:shadow-xl dark:shadow-black/20">
                    <img alt="Motocicleta AKT NKD 125"
                        class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDC4pN1Z65wxFY92N-IM0CKhq93xIshJjbeBdyls370trrUgeRMyxdLw_cV9JatO1HMNIICeWYTJ5fUSNCaGarR3sfOh882qbBuFeTpQCtkXf6kG7c4mLVsWkjljl6Mq6ibxoMWK4ItsY6KfEiZsNYMgZe8xi9uqyb1M2XhYlVyuHp1icpAmCwNh7xvxJMmh95XI5WjH4PTHtFqUiqy1TK3K_g9SFwwNP0x7G015m61DFp7mcegfK8SOzTQZ8JOoCgLVZ4gIzz4oQrU" />
                    <div class="p-6 bg-white dark:bg-card-dark">
                        <h3 class="text-xl font-bold">AKT NKD 125</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">La reina de las calles colombianas. Agilidad y
                            economía.</p>
                    </div>
                </div>
                <div class="group overflow-hidden rounded-lg shadow-lg dark:shadow-xl dark:shadow-black/20">
                    <img alt="Motocicleta Bajaj Pulsar NS 200"
                        class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuB_vCPH8qy0f4G-wBFnbCbnSy2Lbfq_FXxA_2_MLoWpDVTnU6g2PC7Bnxq5AFiMAuLFlHYgIaS-vjoJqZhp_ZegXstvRFT8kcf3g3u32N864MspFD6WyN5wDB-MdmRaPXEY3E7538gX_ge_8RCLI0QCkg3S7UAFw1C9ch-Uh0xCHDgURHUsvObFSRphuiRC5djxKEc4u1Z9BEisPt3p-Ojh7MEgvnCup2B_ZAkby35uvEwV5RF1MozG7PsMCVv7rYwo4l6yYBuSGYtu" />
                    <div class="p-6 bg-white dark:bg-card-dark">
                        <h3 class="text-xl font-bold">Bajaj Pulsar NS 200</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Potencia y tecnología que dominan las
                            carreteras.</p>
                    </div>
                </div>
                <div class="group overflow-hidden rounded-lg shadow-lg dark:shadow-xl dark:shadow-black/20">
                    <img alt="Motocicleta Yamaha NMAX"
                        class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDavQ05aDPCYu4kIXfTx1la4O1il712aiprZx644kG1sawyp_apNPp10hha6Xh_jNXXQNaGwRJwktUgfki3ZewTyKCoQGXtOGxudecW-dSN8ZyHbFqRihEny5O_EcKuHHQD1rk3ZS0nBTpBUyc9ngLNM--xxOH6Kgippnc7M9UlXkTW4JJFIE8ynfn54kwSqW1kMTfWi0lssIAs2MY5UvrnSGTFmufYq8b85Os8A1qhAjFF9cq_OOohQwS1f2pCS2yrJ7KYGLSIdhT8" />
                    <div class="p-6 bg-white dark:bg-card-dark">
                        <h3 class="text-xl font-bold">Yamaha NMAX</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Comodidad y estilo para la ciudad y más allá.
                        </p>
                    </div>
                </div>
                <div class="group overflow-hidden rounded-lg shadow-lg dark:shadow-xl dark:shadow-black/20">
                    <img alt="Motocicleta Honda CB160F"
                        class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDW3rl8EifykFQNAWujnkNokHVWqG--gsoxJfHeVlDlpbPyrPSDXG397QlwdBeLntOD7SBu0QiZfyLgPXKDFWz4U28XuRJXz0xWfAjt6LV631_ndWnFPZ-fETs30A6Ke2V0g4ht6ym5c2hqpd6h9ktSB9JAqbBbuLYghXAztGtctjl7frwcvOGdCFvuT1iCPlXg7aL3Fn8dJS-fUpjk_3RwZQEu4fyDUq8XJvpiZyuSlwVI21MSqty8WpDzjw1-zlM1JCYiNzzn6Gto" />
                    <div class="p-6 bg-white dark:bg-card-dark">
                        <h3 class="text-xl font-bold">Honda CB160F</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Confianza y rendimiento para el día a día.</p>
                    </div>
                </div>
                <div class="group overflow-hidden rounded-lg shadow-lg dark:shadow-xl dark:shadow-black/20">
                    <img alt="Motocicleta Suzuki Gixxer 150"
                        class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCpoqvEVIFIotEAuUjAv8mLAPbvydeDywA1SNg50I_pxyEu2LkQ9EVXXOhLKDnFkWa2EewgdF3JSjdiYFWLwDkJXbkCk_Ums875ZTHRO4RnMBFH7zvWtTTYuI378LQ53RpPWTwW8qqTQm0bAozI2qWZ9wypFjcz_XFgNA4NKSyjVX-gULF_2E-Glpebt2HNDd_4NYLjeg6KWp-a7qc7DpX0n-ACOSPyaMBvScZgjEps741-_Rzl65ysL_C_A2VBb0bZtMIm8bBnAM3e" />
                    <div class="p-6 bg-white dark:bg-card-dark">
                        <h3 class="text-xl font-bold">Suzuki Gixxer 150</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Diseño deportivo y una conducción emocionante.
                        </p>
                    </div>
                </div>
                <div class="group overflow-hidden rounded-lg shadow-lg dark:shadow-xl dark:shadow-black/20">
                    <img alt="Video de rodada en Guatapé"
                        class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDW3rl8EifykFQNAWujnkNokHVWqG--gsoxJfHeVlDlpbPyrPSDXG397QlwdBeLntOD7SBu0QiZfyLgPXKDFWz4U28XuRJXz0xWfAjt6LV631_ndWnFPZ-fETs30A6Ke2V0g4ht6ym5c2hqpd6h9ktSB9JAqbBbuLYghXAztGtctjl7frwcvOGdCFvuT1iCPlXg7aL3Fn8dJS-fUpjk_3RwZQEu4fyDUq8XJvpiZyuSlwVI21MSqty8WpDzjw1-zlM1JCYiNzzn6Gto" />
                    <div class="p-6 bg-white dark:bg-card-dark">
                        <h3 class="text-xl font-bold">¡Más modelos!</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Explora la diversidad que te ofrece el mercado
                            colombiano.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-16 sm:py-24 bg-background-light dark:bg-background-dark">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12">Características Destacadas</h2>
            <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="p-6">
                    <span class="material-symbols-outlined text-5xl text-primary">speed</span>
                    <h3 class="text-xl font-bold mt-4">Potencia</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Motores de alto rendimiento para una experiencia de
                        conducción emocionante.</p>
                </div>
                <div class="p-6">
                    <span class="material-symbols-outlined text-5xl text-primary">design_services</span>
                    <h3 class="text-xl font-bold mt-4">Diseño</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Líneas aerodinámicas y acabados premium que no
                        pasarán desapercibidos.</p>
                </div>
                <div class="p-6">
                    <span class="material-symbols-outlined text-5xl text-primary">memory</span>
                    <h3 class="text-xl font-bold mt-4">Tecnología</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">La última tecnología para una conducción más segura
                        y conectada.</p>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-card-dark text-white">
        <div class="container mx-auto py-8 px-4 text-center">
            <p>© 2025 MotoRiders Colombia. La pasión nos une.</p>
        </div>
    </footer>
</body>

</html>