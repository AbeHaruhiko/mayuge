<!DOCTYPE html>
<html lang="ja" ng-app>
<head>
<meta charset="UTF-8">
<meta property="og:image" content="<?echo is_null($_GET['file']) ? '' : './imgstore/'.$_GET['file'].'.png' ?>" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/docs.css" rel="stylesheet">
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
            <div class="span6">
                <form class="form-inline">
                    <input id="imageSelector" name="imageSelector" type="file" style="display:none" onchange="angular.element(this).scope().setFiles(this);">
                    <span class="input-append">
                        <input id="filePath" class="input-large" type="text">
                        <a class="btn" onclick="$('input[id=imageSelector]').click();" rel="tooltip" data-title="まゆげを描きたい画像を選びます。" data-placement="bottom" data-trigger="hover">ファイル選択</a>
                    </span>
                </form>
            </div>
            <div class="span6">
                <form class="form-inline">
                    <label class="checkbox">
                      <input type="checkbox" ng-model="autoSave"> 自動保存する <a href="" rel="tooltip" data-title="まゆげを移動したり消した時に自動的にサーバに保存します。" data-placement="right" data-trigger="hover"><i class="icon-question-sign"></i></a>
                    </label>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="span6">
                <div id="svgArea" rel="tooltip" data-title="ドラッグ&ドロップでまゆげを描けます。まゆげは移動したり、ダブルクリックで削除もできます。" data-placement="right" data-trigger="hover"></div>
                <canvas id="canvasArea" style="display:none;"></canvas>
                <div id="pngArea" style="display: none;">
                    <img itemprop="image" src="<?echo is_null($_GET['file']) ? '' : './imgstore/'.$_GET['file'].'.png' ?>"/>
                </div>
            </div>
            <div class="span6" ng-show="conf.showToolBox">
                <div class="row">
                    <form>
                        <label class="radio">
                            <input type="radio" ng-model="conf.optionsLR" name="optionsLR" id="optionsR" value="r"> 右まゆ
                        </label>
                        <label class="radio">
                            <input type="radio" ng-model="conf.optionsLR" name="optionsLR" id="optionsL" value="l"> 左まゆ
                        </label>
                        <a href="" rel="tooltip" data-title="どちらのまゆげを描くか選びます。" data-placement="right" data-trigger="hover"><i class="icon-question-sign"></i></a>
                    </form>
                </div>
                <div class="row">
                    <button class="btn" ng-click="savePNG()"><i class="icon-upload"></i>サーバに保存</button>
                    <button class="btn" ng-click="openPNG()"><i class="icon-download"></i>ローカルに保存</button>
                    <a href="" rel="tooltip" data-title="サーバに保存すると最新のまゆげ画像をshareできるようになります（SNSボタンが表示されます）。画像を編集したら共有する前にサーバに保存しましょう。ローカルに保存ボタンを押すと別ウインドウでPNG画像が開くので右クリックで保存してください。。" data-placement="right" data-trigger="hover"><i class="icon-question-sign"></i></a>
                    <div id="snsBtn" style="margin-top:10px;">
                        <div id="g-plus-share" class="g-plus" data-action="share" data-annotation="bubble" data-height="24"></div>
                    </div>
                </div>
            </div>
        </div>
        <pre>{{conf.optionsLR|json}} {{conf.showToolBox|json}}</pre>

    </div>


</div>


<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.5/angular.min.js"></script>
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
<script src="//platform.twitter.com/widgets.js" type="text/javascript"></script>
</body>
</html>