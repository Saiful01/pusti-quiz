<!DOCTYPE html>
<html lang="en">
<head>
    <title>পুষ্টি হোম শেফ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <link rel="canonical" href="https://masterclass.pustihomechef.com/certificate" />


    <script>
        var app = angular.module('myApp', []);
        console.log("app created")
    </script>

    <link href="/style.css" rel="stylesheet">

    <script src="/custom_angular.js"></script>

</head>
<body ng-app="myApp" ng-controller="quizController" ng-init="questions()">

<div class="container-fluid desktop-background">
    <div class="row">
        <!-- Content for desktop -->
    </div>
</div>
<div class="container-fluid mobile-background">
    <div class="row">
        <!-- Content for mobile -->
    </div>
</div>
@yield('content')

</body>
</html>
