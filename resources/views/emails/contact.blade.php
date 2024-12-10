<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Mensaje de Contacto</title>
</head>
<body>
    <h1>Nuevo Mensaje de Contacto</h1>
    <p><strong>Nombre:</strong> {{ $contactData['name'] }}</p>
    <p><strong>Correo Electrónico:</strong> {{ $contactData['email'] }}</p>
    <p><strong>Mensaje:</strong></p>
    <p>{{ $contactData['message'] }}</p>
</body>
</html>
