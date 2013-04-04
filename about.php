<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="ja" ng-app>
<head>
<meta charset="UTF-8">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<meta property="og:title" content="まゆげジェネレータ" />
<meta property="og:description" content="写真にまゆげを。" />
<meta property="og:image" content="<?echo is_null($_GET['file']) ? 'http://'.$_SERVER['SERVER_NAME'].'/img/sample.png' : 'http://'.$_SERVER['SERVER_NAME'].'/imgstore/'.$_GET['file'].'.png?'.time() /* この画像はG+ボタン用。G+ボタンで画像キャッシュさせないために?time()を付加 */ ?>"/>
<link rel="icon" type="image/x-icon" href="./favicon.ico" />
<link href="css/bootstrap.min.css" rel="stylesheet"/>
<link href="css/bootstrap-responsive.min.css" rel="stylesheet"/>
<link href="css/docs.css" rel="stylesheet"/>
<link href="css/todc-bootstrap.css" rel="stylesheet"/>
<link href="css/mayuge.css" rel="stylesheet"/>
<link href="css/docs.css" rel="stylesheet"/>
<link href="css/jquery.simplecolorpicker.css" rel="stylesheet" type="text/css"/>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.5/angular.min.js"></script>
<script src="//connect.facebook.net/ja_JP/all.js#xfbml=1" type="text/javascript"></script>
<script type="text/javascript">limitSize = <?php echo IMAGE_MAX_LENGTH?>;</script>
</head>
<body id="content" ng-controller="mainCtrl" style="padding-top:40px">
<div id="fb-root"></div>
<?php include_once("analyticstracking.php") ?>
<div class="container" id="container">

  <div class="navbar  navbar-inverse navbar-fixed-top navbar-googlenav">
    <div class="navbar-inner">
        <div class="container">
           <a href="/" class="brand">まゆげジェネレータ <small>ver. 0.1</small></a>
           <ul class="nav">
                <li class="active" id="navhome"><a href="" ng-click="loadHome()">Home</a></li>
                <li id="navabout"><a href="" ng-click="loadAbout()">About</a></li>
                <li class="divider-vertical"></li>
            </ul>
            <div style="overflow:hidden;margin-top:15px;text-align:right;padding-left: 50px;">
              <div style="float:left;height:20px;overflow:hidden;">
                <div class="g-plus" data-action="share" data-annotation="bubble" data-href="<?php echo 'http://'.$_SERVER['SERVER_NAME'] ?>"></div>
              </div>
              <div style="float:left;width:105px!important;height:20px;overflow:hidden;">
                <a href="https://twitter.com/share" class="twitter-share-button" data-lang="ja" data-size="middle" data-hashtags="まゆげジェネレータ" data-url="<?php echo 'http://'.$_SERVER['SERVER_NAME'] ?>"></a>
              </div>
              <div style="float:left;height:20px;overflow:hidden;">
                <div class="fb-like" data-send="false" data-layout="button_count" data-width="100" data-show-faces="true" data-href="<?php echo 'http://'.$_SERVER['SERVER_NAME'] ?>"></div>              
              </div>
            </div>
        </div>
    </div>
</div>

<div class="" id="ad-banner">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-0206019164479134";
/* mayuge */
google_ad_slot = "8285175370";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>

<div class="row">

  <div class="span10">
    <?php include('./about.html');?>
  </div>

<div class="sidebar span2">
<div id="ad-sky">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-0206019164479134";
/* mamyuge 160 ×600 */
google_ad_slot = "5735334972";
google_ad_width = 160;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
</div>
</div>

</div>



<script src="./js/bootstrap.min.js"></script>
<script src="./js/jquery.upload-1.0.2.min.js"></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script> -->
<script src="./js/jquery.svg.js"></script>
<script src="./js/jquery.svgdom.js"></script>
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
<script src="./js/canvas-to-blob.min.js"></script>
</body>
</html>