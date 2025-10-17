document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const identifier = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value;

        if (!identifier || !password) {
            alert('⚠️ Por favor, completa todos los campos.');
            return;
        }

        const users = JSON.parse(localStorage.getItem('users')) || [];

        const user = users.find(u =>
            u.username.toLowerCase() === identifier.toLowerCase() ||
            u.email.toLowerCase() === identifier.toLowerCase()
        );

        if (!user) {
            alert('❌ Usuario o correo no encontrado.');
            return;
        }

        const passwordHash = await hashPassword(password);

        if (user.passwordHash !== passwordHash) {
            alert('🔐 Contraseña incorrecta.');
            return;
        }

        const session = {
            id: user.id,
            username: user.username,
            email: user.email,
            startTime: new Date().toISOString()
        };

        localStorage.setItem('session', JSON.stringify(session));

        alert(`✅ Bienvenido, ${user.username}!`);
        form.reset();
        window.location.href = '../views/dashboard.php';
    });

    async function hashPassword(password) {
        const encoder = new TextEncoder().encode(password);
        const hashBuffer = await crypto.subtle.digest('SHA-256', encoder);
        const hashArray = Array.from(new Uint8Array(hashBuffer));
        return hashArray.map(b => b.toString(16).padStart(2, '0')).join('');
    }
});
