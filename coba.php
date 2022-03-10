<html lang="en">
<head>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <style>
        body{
            background-color: red;
        }

        @media (max-width: 576px) { 
            body{
                background-color: yellow;
            }
        }
    </style>
</head>
<body>
    
<div class="container">
    <div class="progress col-sm-4">
        <div class="progress-bar bg-info" style="width: 45%">durability</div>
    </div>
    <br>
    <div class="progress col-sm-4">
        <div class="progress-bar bg-warning" style="width: 65%">offense</div>
    </div>
</div>



</body>
<script src="bootstrap-5.0.2-dist/js/bootstrap.js"></script>
</html>