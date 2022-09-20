<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <title>Laravel - Simple Excel</title>
    @livewireStyles
</head>
<body>
<div class="container mt-3">
    <h3><a href="https://github.com/spatie/simple-excel" target="_blank">Laravel - Simple Excel</a></h3>
    <div class="w-50 mt-4">
        @livewire('export')
    </div>
</div>
@livewireScripts
</body>
</html>
