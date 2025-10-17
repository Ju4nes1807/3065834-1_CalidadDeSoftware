<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Inicio de Sesion</title>
    <link href="data:image/x-icon;base64," rel="icon" type="image/x-icon" />
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&amp;display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
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
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-gray-800 dark:text-gray-200">
    <div class="relative flex h-auto min-h-screen w-full flex-col overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">
            <header
                class="flex items-center justify-between whitespace-nowrap border-b border-primary/20 dark:border-primary/30 px-10 py-4">
                <div class="flex items-center gap-4 text-gray-900 dark:text-white">
                    <div class="size-9 text-primary">
                        <span class="material-symbols-outlined text-primary text-3xl">sports_motorsports</span>
                    </div>
                    <h2 class="text-xl font-bold">MotoRiders Colombia</h2>
                </div>
        </div>
        </header>
        <main class="flex flex-1 items-center justify-center p-4 sm:p-6 md:p-10">
            <div class="w-full max-w-md rounded-xl bg-white/5 dark:bg-black/10 p-8 shadow-2xl backdrop-blur-sm">
                <h2 class="mb-6 text-center text-3xl font-bold text-gray-900 dark:text-white">Log In</h2>
                <form class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                            for="username">Username or Email</label>
                        <div class="mt-1">
                            <input
                                class="form-input block w-full rounded-lg border-primary/20 bg-background-light/50 p-4 text-base placeholder-gray-400 dark:border-primary/30 dark:bg-background-dark/50 dark:text-white dark:placeholder-gray-500 focus:border-primary focus:ring-primary"
                                id="username" name="username" placeholder="Enter your username or email" type="text" />
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                            for="password">Password</label>
                        <div class="mt-1">
                            <input
                                class="form-input block w-full rounded-lg border-primary/20 bg-background-light/50 p-4 text-base placeholder-gray-400 dark:border-primary/30 dark:bg-background-dark/50 dark:text-white dark:placeholder-gray-500 focus:border-primary focus:ring-primary"
                                id="password" name="password" placeholder="Enter your password" type="password" />
                        </div>
                    </div>
                    <div>
                        <button
                            class="flex w-full justify-center rounded-lg bg-primary px-5 py-3 text-base font-bold text-white shadow-sm hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-background-light dark:focus:ring-offset-background-dark"
                            type="submit">
                            Log In
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
    </div>

    <script src="../js/login.js"></script>

</body>

</html>