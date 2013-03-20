<!DOCTYPE html>
<html lang="ja" ng-app>
<head>
<meta charset="UTF-8">
<meta property="og:title" content="まゆげジェネレーター" />
<meta property="og:description" content="写真にまゆげを。" />
<link href="css/mayuge.css" rel="stylesheet"/>
<link href="css/bootstrap.min.css" rel="stylesheet"/>
<link href="css/docs.css" rel="stylesheet"/>
<link href="css/jquery.simplecolorpicker.css" rel="stylesheet" type="text/css"/>
<link href="css/egg.css" rel="stylesheet" type="text/css"/>
<!-- <link rel="stylesheet" type="text/css" href="./css/jquery.svg.css"> -->
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.5/angular.min.js"></script>
</head>
<body id="content" ng-controller="mainCtrl" style="padding-top:40px">
<div class="container">
 

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
           <a href="/" class="brand">ー</a>
           <ul class="nav">
                <li class="active" id="navhome"><a href="" ng-click="loadHome()">Home</a></li>
                <li id="navabout"><a href="" ng-click="loadAbout()">About</a></li>
            </ul>
        </div>
    </div>
</div>


<?php include('./home.php');?>

</div>


<script src="./js/bootstrap.min.js"></script>
<script src="./js/jquery.upload-1.0.2.min.js"></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script> -->
<script src="./js/jquery.svg.js"></script>
<script src="./js/jquery.blockUI.js"></script>
<script src="./js/drag-and-drop.js"></script>
<script src="./js/rgbcolor.js"></script>
<script src="./js/canvg.js"></script>
<script src="./js/mayuge.js"></script>
<script src="./js/sketchmayuge.js"></script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
  {lang: 'ja', parsetags: 'explicit'}
</script>
<script src="//platform.twitter.com/widgets.js" type="text/javascript"></script>
<script src="./js/jquery.simplecolorpicker.js"></script>
<script src="./js/egg.js"></script>
</body>
</html>