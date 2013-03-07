<!DOCTYPE html>
<html lang="ja" ng-app>
<head>
<meta charset="UTF-8">
<meta property="og:image" content="<?echo is_null($_GET['file']) ? '' : './imgstore/'.$_GET['file'].'.png' ?>" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- <link rel="stylesheet" type="text/css" href="./css/jquery.svg.css"> -->
</head>
<body id="content" ng-controller="mainCtrl" style="padding-top:40px">
<div class="container">
 
    <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
           <a href="#" class="brand">Mayuge Generator</a>
        </div>
    </div>
    </div>



    <div class="span12">
 
        <div class="row">
            <input id="imageSelector" name="imageSelector" type="file" style="display:none" onchange="angular.element(this).scope().setFiles(this);">
            <span class="input-append">
                <input id="filePath" class="input-large" type="text">
                <a class="btn" onclick="$('input[id=imageSelector]').click();">ファイル選択</a>
            </span>
            <span>
                <label class="checkbox" style="margin-left:20px;">
                  <input type="checkbox" ng-model="autoSave"> 自動保存する
                </label>
            </span>
        </div>
        <div class="row" style="height:30px;">
            <div class="span6">
            </div>
            <div class="span6">
                <div id="snsBtn">
                    <div id="g-plus-share" class="g-plus" data-action="share" data-annotation="bubble" data-height="24"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="span6">
                <div id="svgArea" style="display: inline-block;"></div>
                <canvas id="canvasArea" style="display: none;"></canvas>
                <div style="display: inline-block;">
                    <form class="form-horizontal">
                        <label class="radio">
                            <input type="radio" ng-model="optionsLR" name="optionsLR" id="optionsR" value="r">右まゆ
                        </label>
                        <label class="radio">
                            <input type="radio" ng-model="optionsLR" name="optionsLR" id="optionsL" value="l">左まゆ
                        </label>
                    </form>
                </div>
            </div>
            <div class="span6">
                <div id="pngArea">
                    <img itemprop="image" src="<?echo is_null($_GET['file']) ? '' : './imgstore/'.$_GET['file'].'.png' ?>"/>
                </div>
            </div>
        </div>
        <pre>{{optionsLR|json}}</pre>

    </div>


</div>


<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.0.4/angular.min.js"></script>
<script src="./js/jquery.upload-1.0.2.min.js"></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script> -->
<script src="./js/jquery.svg.js"></script>
<script src="./js/jquery.blockUI.js"></script>
<script src="./js/drag-and-drop.js"></script>
<script src="./js/rgbcolor.js"></script>
<script src="./js/canvg.js"></script>
<script src="./js/mayuge.js"></script>
<script src="./js/sketchmayuge.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
  {lang: 'ja', parsetags: 'explicit'}
</script>
</body>
</html>