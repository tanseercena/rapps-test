<!DOCTYPE html>
<html lang="en">
<head>
    <title>Royal Apps Test</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        :root {
            --primary: #94618e;
        }

        .justify {
            text-align: justify;
        }

        .text-purple {
            color: var(--primary);
        }

        .bg-purple {
            background-color: var(--primary);
            color: white;
        }

    </style>
</head>

<body>

<nav class="nav bg-purple justify-content-center">
    <a class="nav-link text-white" href="{{ route("profile") }}">Profile</a>
    <a class="nav-link text-white" href="{{ route("authors") }}">Authors</a>
    <a class="nav-link text-white" href="{{ route("book.add") }}">Add Book</a>
    <a class="nav-link text-white" href="#">Logout <i class="bi bi-box-arrow-right" aria-hidden="true"></i></a>
</nav>

@yield('content')

</body>

</html>
