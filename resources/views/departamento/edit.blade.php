<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Department</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Edit Department</h1>
        <form method="POST" action="{{ route('departamentos.update', ['departamento' => $departamento->depa_codi]) }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="codigo" class="form-label">Id</label>
                <input type="text" class="form-control" id="id" aria-describedby="codigoHelp" name="id"
                    disabled="disabled" value="{{ $departamento->depa_codi }}">
                <div id="codigoHelp" class="form-text">Department Id.</div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Department</label>
                <input type="text" class="form-control" id="name" placeholder="municipality name."
                    name="name" value="{{ $departamento->depa_nomb }}">
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country:</label>
                <select class="form-select" id="country" name="country" required>
                    <option select disabled value="">Choose one...</option>
                    @foreach ($paises as $pais)
                        @if($pais->pais_codi == $departamento->pais_codi)
                            <option selected value="{{$pais->pais_codi}}">{{$pais->pais_nomb}}</option>
                        @else
                            <option value="{{ $pais->pais_codi }}">{{ $pais->pais_nomb }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('departamentos.index')}}" class="btn btn-warning">Cancel</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>


