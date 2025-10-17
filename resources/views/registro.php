<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Registrate</title>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet" />
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
                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg: "0.5rem",
                        xl: "0.75rem",
                        full: "9999px",
                    },
                },
            },
        };
    </script>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-gray-800 dark:text-gray-200">
    <div class="flex min-h-screen w-full flex-col">
        <div class="flex h-full grow flex-col">
            <header
                class="flex items-center justify-between whitespace-nowrap border-b border-black/10 dark:border-white/10 px-10 py-4">
                <div class="flex items-center gap-4">
                    <svg class="h-6 w-6 text-gray-900 dark:text-white" fill="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 2L3 7V17L12 22L21 17V7L12 2ZM11 12H5V8L11 5V12ZM13 12V5L19 8V12H13ZM11 13V19L5 16V13H11ZM13 13H19V16L13 19V13Z">
                        </path>
                    </svg>
                    <h2 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">MotoRiders Colombia</h2>
                </div>
            </header>
            <main class="flex flex-1 items-center justify-center py-12">
                <div class="w-full max-w-md space-y-8 px-4">
                    <div>
                        <h2 class="text-center text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Create
                            your account</h2>
                    </div>
                    <form action="#" class="space-y-6" method="POST">
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300"
                                for="username">Username</label>
                            <input
                                class="block w-full appearance-none rounded-lg border border-black/10 dark:border-white/20 bg-background-light dark:bg-background-dark px-4 py-3 placeholder-gray-500 dark:placeholder-gray-400 shadow-sm focus:border-primary focus:outline-none focus:ring-primary sm:text-sm"
                                id="username" name="username" placeholder="Enter your username" required=""
                                type="text" />
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300" for="email">Email
                                address</label>
                            <input autocomplete="email"
                                class="block w-full appearance-none rounded-lg border border-black/10 dark:border-white/20 bg-background-light dark:bg-background-dark px-4 py-3 placeholder-gray-500 dark:placeholder-gray-400 shadow-sm focus:border-primary focus:outline-none focus:ring-primary sm:text-sm"
                                id="email" name="email" placeholder="Enter your email" required="" type="email" />
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300"
                                for="password">Password</label>
                            <input autocomplete="current-password"
                                class="block w-full appearance-none rounded-lg border border-black/10 dark:border-white/20 bg-background-light dark:bg-background-dark px-4 py-3 placeholder-gray-500 dark:placeholder-gray-400 shadow-sm focus:border-primary focus:outline-none focus:ring-primary sm:text-sm"
                                id="password" name="password" placeholder="Enter your password" required=""
                                type="password" />
                        </div>
                        <div>
                            <button
                                class="flex w-full justify-center rounded-lg bg-primary py-3 px-4 text-sm font-bold text-white shadow-sm hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-background-light dark:focus:ring-offset-background-dark"
                                type="submit">
                                Sign Up
                            </button>
                        </div>
                    </form>
                    <p class="text-center text-sm text-gray-600 dark:text-gray-400">
                        Already have an account?
                        <a class="font-medium text-primary hover:text-opacity-80" href="inicioSesion.php">Sign in</a>
                    </p>
                </div>
            </main>
        </div>
    </div>

    <script src="../js/registro.js"></script>

</body>

</html>