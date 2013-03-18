<!DOCTYPE html>
<html lang="ja" ng-app="mayuge">
<head>
<meta charset="UTF-8">
<meta property="og:title" content="まゆげジェネレーター" />
<meta property="og:description" content="写真に美しいまゆげを。" />
<link href="css/mayuge.css" rel="stylesheet"/>
<link href="css/bootstrap.min.css" rel="stylesheet"/>
<link href="css/docs.css" rel="stylesheet"/>
<link href="css/jquery.simplecolorpicker.css" rel="stylesheet" type="text/css"/>
<!-- <link rel="stylesheet" type="text/css" href="./css/jquery.svg.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.5/angular.min.js"></script>
<script src="./js/app.js"></script>
<script src="./js/mayuge.js"></script>
</head>
<body id="content" ng-controller="mainCtrl" style="padding-top:40px">
<div class="container">
<?php include('./nav.php');?>
 

<div ng-view></div>


</div>


<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/jquery.upload-1.0.2.min.js"></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script> -->
<script src="./js/jquery.svg.js"></script>
<script src="./js/jquery.blockUI.js"></script>
<script src="./js/drag-and-drop.js"></script>
<script src="./js/rgbcolor.js"></script>
<script src="./js/canvg.js"></script>
<script src="./js/sketchmayuge.js"></script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
  {lang: 'ja', parsetags: 'explicit'}
</script>
<script src="//platform.twitter.com/widgets.js" type="text/javascript"></script>
<script src="./js/jquery.simplecolorpicker.js"></script>
</body>
</html>