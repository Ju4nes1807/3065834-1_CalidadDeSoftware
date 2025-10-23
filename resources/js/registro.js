async function hashPassword(password) {
    const encoder = new TextEncoder().encode(password);
    const hashBuffer = await crypto.subtle.digest('SHA-256', encoder);
    const hashArray = Array.from(new Uint8Array(hashBuffer));
    return hashArray.map(b => b.toString(16).padStart(2, '0')).join('');
}

document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const username = document.getElementById('username').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value;

        // Validaciones básicas
        if (!username || !email || !password) {
            alert('Por favor, completa todos los campos requeridos.');
            return;
        }

        if (password.length < 6) {
            alert('La contraseña debe tener al menos 6 caracteres.');
            return;
        }

        // Cargar usuarios desde localStorage
        const users = JSON.parse(localStorage.getItem('users')) || [];

        // Verificar si el usuario o correo ya existen
        if (users.some(u => u.username.toLowerCase() === username.toLowerCase())) {
            alert('El nombre de usuario ya existe. Por favor elige otro.');
            return;
        }

        if (users.some(u => u.email.toLowerCase() === email.toLowerCase())) {
            alert('El correo electrónico ya está en uso. Por favor elige otro.');
            return;
        }

        // Hashear la contraseña
        const passwordHash = await hashPassword(password);

        // Crear nuevo usuario
        const newUser = {
            id: Date.now().toString(),
            username,
            email,
            passwordHash
        };

        users.push(newUser);
        localStorage.setItem('users', JSON.stringify(users));

        alert('✅ Registro exitoso. Ahora puedes iniciar sesión.');
        form.reset();
        window.location.href = '../views/inicioSesion.php';
    });
});
