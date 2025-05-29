<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Municipality</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Add Municipality</h1>
        <form method="POST" action="{{ route('municipios.store') }}">
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label">Code</label>
                <input type="email" class="form-control" id="id" aria-describedby="idHelp" name="id"
                    disabled="disabled">
                <div id="idHelp" class="form-text">Municipality Code</div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Municipality</label>
                <input type="text" class="form-control" id="name" aria-describedby="nameHelp"
                    name="name" placeholder="municipio name.">
            </div>
            <div class="mb-3">
                <label for="municipality" class="form-label">department:</label>
                <select class="form-select" id="municipality" name="code" required>
                    <option select disabled value="">Choose one...</option>
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->depa_codi }}">{{ $departamento->depa_nomb }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{route('municipios.index')}}" class="btn btn-warning">Cancel</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>

