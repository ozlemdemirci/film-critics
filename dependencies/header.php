<html>
<head>
    <link rel="stylesheet" href="/slim-skeleton/src/css/style.css" />
    <title>FILM CRITICS</title>
    <script>
      setInterval(function () {
        var x = Math.floor(Math.random() * 256);
        var y = Math.floor(Math.random() * 256);
        var z = Math.floor(Math.random() * 256);
        var bgColor = "rgb(" + x + "," + y + "," + z + ")";
        console.log(bgColor);

        document.body.style.background = bgColor;
      }, 7000);
    </script>
</head>
<body>
<div id="header" class="motto">
    FILM CRITICS
</div>
