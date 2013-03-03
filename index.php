<!DOCTYPE html>
<html lang="ja" ng-app>
<head>
<meta charset="UTF-8">
<meta property="og:image" content="<?echo is_null($_GET['file']) ? '' : './imgstore/'.$_GET['file'].'.png' ?>" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="./css/jquery.svg.css">
</head>
<body id="content" ng-controller="mainCtrl" style="padding-top:40px">
<div class="container">
 
    <div class="span12">
        <div class="navbar">
            <div class="navbar-inner">
                <a href="" class="brand">Mayuge Generator</a>
            </div>
        </div>
 
        <div class="row">
            <input id="imageSelector" name="imageSelector" type="file" style="display:none" onchange="angular.element(this).scope().setFiles(this);">
            <span class="input-append">
                <input id="filePath" class="input-large" type="text">
                <a class="btn" onclick="$('input[id=imageSelector]').click();">ファイル選択</a>
            </span>

        </div>
        <div class="row">
            <div class="span6">
                <div id="svgArea"></div>
                <canvas id="canvasArea" style="display: none;"></canvas>
            </div>
            <div class="span6">
                <div id="pngArea">
                    <img itemprop="image" src="<?echo is_null($_GET['file']) ? '' : './imgstore/'.$_GET['file'].'.png' ?>"/>
                </div>
            </div>
        </div>


        <pre id="debug"></pre>
    </div>


</div>


<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.0.4/angular.min.js"></script>
<script src="./js/jquery.upload-1.0.2.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<script src="./js/jquery.svg.js"></script>
<script src="./js/drag-and-drop.js"></script>
<script src="./js/rgbcolor.js"></script>
<script src="./js/canvg.js"></script>
<script src="./js/mayuge.js"></script>
</body>
</html>