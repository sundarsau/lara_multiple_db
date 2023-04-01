<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Data Migration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <style>
        h1 {
            text-align: center;
        }

        p {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-5 mb-5">Data Migration using Laravel multiple database connections</h1>

        <p>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </p>
        <div class="row">
            <div class="col-md-12 mt-5 text-center">
                <a href="{{ route('migrateCustomer') }}" class="btn btn-primary">Migrate Customer Data</a>
            </div>
        </div>
    </div>
</body>
</html>
