<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title> @yield('title', 'Mi Aplicación') </title>

<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <main class="w-5/6 bg-white mt-20 mb-20 mx-auto p-10">

    @yield('content')

        
    </main>
</body>

</html>