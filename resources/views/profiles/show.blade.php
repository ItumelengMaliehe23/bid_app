<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {{$profile->company_name}}
    <img width=300 src="/storage/comp_cov_imgs/{{$profile->comp_cov_img}}" alt="">
    <img width=300 src="/storage/comp_pro_imgs/{{$profile->comp_pro_img}}" alt="">
    {!!$profile->company_about!!}
</body>
</html>