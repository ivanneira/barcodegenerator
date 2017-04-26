<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 26/04/2017
 * Time: 10:47 AM
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
</head>
<body>
<img id="test" src="" alt="">
</body>
</html>


<script>

    $.post("http://10.64.65.200:84/barcodegenerator/").done(function(data){$("#test").html(data)});

</script>