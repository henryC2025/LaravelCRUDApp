<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comment Application</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />

</head>
<body>

    <div class="container mt-2">

        <div class="row">

            <div class="col-md-12 card-header text-center font-weight-bold">

                <h2>Full Comment</h2>

                <button class="btn btn-nav" onclick="document.location='/'">Home</button>
                <button class="btn btn-nav" onclick="document.location='/ajax-results-crud'">Results</button>
                <button class="btn btn-nav" onclick="document.location='/ajax-terminology-crud'">Terminology</button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 card-header text-center submitted-comment mt-50">

                <p class="text-left"><?php echo str_replace('-', '', $_GET["message-comment"]) ?></p>
            </div>
        </div>


    </div>

    <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
