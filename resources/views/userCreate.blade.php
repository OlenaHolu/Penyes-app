<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">Guardar Usuario</button>
</form>
