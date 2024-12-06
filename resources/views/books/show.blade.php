<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Detail</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('storage/' . $book->cover_image) }}" class="w-50 rounded">
                        </div>
                        <div class="text-right">
                            <div class="badge badge-primary p-2">
                                {{ $book->is_published ? 'Published' : 'Not Published' }}</div>
                        </div>
                        <hr>
                        <h4>{{ $book->name }}</h4>
                        <p class="tmt-3">
                            {!! $book->description !!}
                        </p>
                        <div class="text-right">
                            <i> Author: {{ $book->author }}</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
