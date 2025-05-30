<!-- resources/views/solicitudes/index.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Solicitudes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Lista de Solicitudes</h1>
            <a href="{{ route('solicitudes.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                + Nueva Solicitud
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white rounded shadow">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-left">ID</th>
                    <th class="py-2 px-4 border-b text-left">Tema</th>
                    <th class="py-2 px-4 border-b text-left">Descripción</th>
                    <th class="py-2 px-4 border-b text-left">Área</th>
                    <th class="py-2 px-4 border-b text-left">Fecha de Registro</th>
                    <th class="py-2 px-4 border-b text-left">Fecha de Cierre</th>
                    <th class="py-2 px-4 border-b text-left">Estado</th>
                    <th class="py-2 px-4 border-b text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($solicitudes as $solicitud)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $solicitud->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $solicitud->tema }}</td>
                        <td class="py-2 px-4 border-b">{{ $solicitud->descripcion }}</td>
                        <td class="py-2 px-4 border-b">{{ $solicitud->area }}</td>
                        <td class="py-2 px-4 border-b">{{ $solicitud->fecha_registro }}</td>
                        <td class="py-2 px-4 border-b">{{ $solicitud->fecha_cierre ?? '---' }}</td>
                        <td class="py-2 px-4 border-b">{{ $solicitud->estado }}</td>
                        <td class="py-2 px-4 border-b flex space-x-2">
                            <a href="{{ route('solicitudes.show', $solicitud->id) }}" class="text-blue-600 hover:underline">Ver</a>
                            <a href="{{ route('solicitudes.edit', $solicitud->id) }}" class="text-yellow-600 hover:underline">Editar</a>
                            <form action="{{ route('solicitudes.destroy', $solicitud->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta solicitud?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
