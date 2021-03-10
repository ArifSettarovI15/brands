
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
    <script src="https://kit.fontawesome.com/6d6e036f3b.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="cat-table">
    <div class="cat-table__head">
        @include('components.table-head')
    </div>
    <div class="cat-table__body">


            @include('components.table-cat-body')

    </div>
    <div class="cat-table__footer">
        <div class="cat-table__row">
            <div class="cat-table__wrapper-outer">
                <div class="cat-table__wrapper">
                    <div class="cat-table__left">
                        <div class="cat-table__elem">
                            <button class="btn btn-danger">
                                Удалить
                            </button>
                        </div>
                    </div>
                    <div class="cat-table__right cat-table__paging">
                        @include('components.paging',with(['paginator'=>$brands]))
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('components.modal-add')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>
<script src="{{ asset('public/js/app.js') }}"></script>
</body>
</html>
