<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap 5 Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <head>
        <!-- Other meta tags -->
        <meta property="og:title" content="পুষ্টি হোম শেফ ">
        <meta property="og:description" content="পুষ্টি হোম শেফ">
        <meta property="og:image" content={{$applicant->file}}>
        <meta property="og:url" content="https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/">
    </head>



    <style>
        div#social-links {
            margin: 0 auto;
            max-width: 500px;
        }
        div#social-links ul li {
            display: inline-block;
        }
        div#social-links ul li a {
            padding: 20px;
            border: 1px solid #ccc;
            margin: 1px;
            font-size: 30px;
            color: #222;
            background-color: #ccc;
        }
    </style>
    <script>
        var app = angular.module('myApp', []);
        console.log("app created")
    </script>

    <link href="/style.css" rel="stylesheet">



</head>
<body >

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
<div class="container-fluid ">
    <img src="{{$applicant->file}}" width="100%">
</div>
<div class="container-fluid ">
    <div class="row mb-5">
        <div class="col-md-6 col-12 text-center mt-5">
            <a class="btn btn-danger text-center" href="{{$applicant->file}}" download="certificate"><i class="fa fa-download" aria-hidden="true"></i> সার্টিফিকেট  ডাউনলোড করুন </a>
        </div>
        <div class="col-md-6 col-12 mx-auto mt-5">
            {!! $shareComponent !!}
        </div>
    </div>
</div>





</body>

</html>
