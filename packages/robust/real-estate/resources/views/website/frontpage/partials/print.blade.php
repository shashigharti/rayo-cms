<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @set('image',$result->images ? $result->images->first() : null)
    <h1>{{$result->name}}</h1>
    <img src="http://cdn.photos.sparkplatform.com/fl/20191217104315409479000000-o.jpg" alt="">
</body>
</html>
