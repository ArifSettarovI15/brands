<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>



</head>
<body class="container">

<form class="form-horizontal" style="margin-top: 100px;" >


    <!-- Text input-->
    <div class="form-group ">
        <label class="col-md-4 control-label" for="vendor_name">Название: </label>
        <div class="col-md-4">
            <input id="vendor_name" name="vendor_name" placeholder="Название бренда" class="form-control input-md translit-from"
                   required type="text" value="@isset($info->vendor_name){{$info->vendor_name}}@endisset">
        </div>
    </div>
    <br><br>
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="vendor_url">Ссылка: </label>
        <div class="col-md-4">
            <input id="vendor_url" name="vendor_url" placeholder="Ссылка бренда" class="form-control input-md translit-to"
                   required type="text" value="@isset($info->vendor_url){{$info->vendor_url}}@endisset">
        </div>
    </div>

    <br><br>

        <div class="form-group">
            <label class="col-md-4 control-label" for="vendor_bg">Логотип: </label>
            <div class="col-md-4">
                <input id="upload_image" data-name="vendor_bg" class="upload_image" data-url="{{route('files.add')}}" type="file">
                <input id="upload_image" name="vendor_bg" type="hidden">
            </div>
        </div>
    <br><br>

        <div class="form-group">
            <label class="col-md-4 control-label" for="vendor_icon">Фото: </label>
            <div class="col-md-4">
                @isset($info->vendor_icon['id'])
                    <img src="{{$info->vendor_icon['url']}}" style="width: 50px; height:50px;" alt="">
                @endisset
                <input id="upload_image" data-name="vendor_icon" class="upload_image" data-url="{{route('files.add')}}" type="file">
                <input id="upload_image" name="vendor_icon" type="hidden" value="@isset($info->vendor_icon['id']){{$info->vendor_icon['id']}}@endisset">
            </div>
        </div>
    <input type="hidden" class="file_folder" value="vendors">

{{--    <br><br>--}}
{{--    <div class="form-group">--}}
{{--        <label class="col-md-4 control-label" for="vendor_desc">Описание: </label>--}}
{{--        <div class="col-md-4">--}}
{{--            <textarea class="form-control" id="vendor_desc" name="vendor_desc"> @isset($info->vendor_desc){{$info->vendor_desc}}@endisset</textarea>--}}
{{--        </div>--}}
{{--    </div>--}}

    <br><br>
    <div class="form-group">
        <label class="col-md-4 control-label" for="vendor_letter">Символ: </label>
        <div class="col-md-4">
            <input class="form-control" id="vendor_letter" name="vendor_letter" value="@isset($info->vendor_letter){{$info->vendor_letter}}@endisset">
        </div>
    </div>
    <br><br>
    <div class="form-group">
        <label class="col-md-4 control-label" for="singlebutton"></label>
        <div class="col-md-4">
            <button id="singlebutton" type="submit" name="singlebutton" class="btn btn-primary">Добавить</button>
        </div>
    </div>

</form>

<script src="{{asset('js/app.js')}}"></script>
<div class="message-box" style="position: absolute; top: 10px; right: 10px;"></div>
</body>
</html>

