<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <title>Laravel - Simple Excel</title>
</head>
<body>
<div class="container mt-3">
    <h3><a href="https://github.com/lyndonjohn/simple-excel" target="_blank">Laravel - Simple Excel</a></h3>
    <div class="w-50 mt-4">
        @if(session('message'))
            <div class="alert alert-success p-2 mb-3">{{ session('message') }}</div>
        @endif

        <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <div class="col-6">
                    <input type="file" class="form-control" name="file">
                    @error('file')
                    <span class="small text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary">Import</button>
                    <a href="{{ route('export') }}" class="btn btn-secondary ms-2">Export Students</a>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
