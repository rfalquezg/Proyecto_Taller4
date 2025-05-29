<!-- resources/views/solicitudes/create.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Solicitud</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Nueva Solicitud</h1>

        <form action="{{ route('solicitudes.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf

            <div class="mb-4">
                <label for="tema" class="block font-semibold">Tema:</label>
                <input type="text" id="tema" name="tema" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block font-semibold">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="w-full border border-gray-300 rounded px-3 py-2" required></textarea>
            </div>

            <div class="mb-4">
                <label for="area" class="block font-semibold">Área:</label>
                <input type="text" id="area" name="area" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label for="fecha_registro" class="block font-semibold">Fecha de Registro:</label>
                <input type="date" id="fecha_registro" name="fecha_registro" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label for="estado" class="block font-semibold">Estado:</label>
                <select id="estado" name="estado" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    <option value="Solicitud">Solicitud</option>
                    <option value="Aprobado">Aprobado</option>
                    <option value="Rechazado">Rechazado</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="observacion" class="block font-semibold">Observación:</label>
                <textarea id="observacion" name="observacion" class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
            </div>

            <div class="mb-4">
                <label for="usuarioExt" class="block font-semibold">ID Usuario Externo (opcional):</label>
                <input type="number" id="usuarioExt" name="usuarioExt" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                Guardar
            </button>
        </form>
    </div>

</body>
</html>
