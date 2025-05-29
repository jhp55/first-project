<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Country</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Add Country</h1>
        <form method="POST" action="{{ route('paises.store') }}">
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label">Code</label>
                <input type="text" class="form-control" id="id" name="id" maxlength="3" pattern="[A-Za-z]+" title="Only letters are allowed"required>
                <div class="form-text">Enter a 3-letter country code (e.g., USA, MEX, ARG).</div>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Department</label>
                <input type="text" class="form-control" id="name" aria-describedby="nameHelp" name="name"
                    placeholder="Municipio name.">
            </div>

            <div class="mb-3">
                <label for="nationality" class="form-label">Nationality</label>
                <input type="number" class="form-control" id="nationality" aria-describedby="nationalityHelp"
                    name="nationality" placeholder="Nationality." min="0" max="9999999999">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('paises.index') }}" class="btn btn-warning">Cancel</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
