<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Manajemen Armada' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">

    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between">
            <a href="{{ route('armadas.index') }}" class="font-bold text-lg">🚚 Armada</a>
            <a href="{{ route('armadas.create') }}" class="bg-white text-blue-600 px-4 py-1 rounded shadow hover:bg-gray-200">+ Tambah Armada</a>
        </div>
    </nav>

    <main class="container mx-auto p-6">
        @yield('content')
    </main>

</body>

</html>