<div class="span12" id="mainContent">

    <div class="row">
        <div class="span6">
            <form class="form-inline">
                <input id="imageSelector" name="imageSelector" type="file" style="display:none" onchange="angular.element(this).scope().setFiles(this);">
                <span class="input-append">
                    <input id="filePath" class="input-large" type="text">
                    <a class="btn" ng-click="clickFileSelectBtn()" rel="tooltip" data-default-show="true" data-title="まゆげを描きたい画像を選びます。" data-placement="bottom" data-trigger="hover">ファイル選択</a>
                </span>
            </form>
        </div>
        <div class="span6">
            <form class="form-inline">
                <label class="checkbox">
                  <input type="checkbox" ng-model="conf.faceDetect"> 顔認識する <a href="" rel="tooltip" data-title="アップロードすると自動的に顔認識してまゆげを描画します。" data-placement="bottom" data-trigger="hover"><i class="icon-question-sign"></i></a>
                </label>
                <label class="checkbox">
                  <input type="checkbox" ng-model="conf.autoSave"> 自動保存する <a href="" rel="tooltip" data-title="まゆげを移動したり消した時に自動的にサーバに保存します。" data-placement="bottom" data-trigger="hover"><i class="icon-question-sign"></i></a>
                </label>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="span6">
            <div id="svgArea" rel="tooltip" data-title="まゆげを描きたいところでドラッグ&ドロップするとまゆげが追加されます。まゆげは移動したり、ダブルクリックで削除もできます。" data-placement="right" data-trigger="hover"></div>
            <canvas id="canvasArea" style="display:none;"></canvas>
            <div id="pngArea" style="display: none;">
                <img itemprop="image" src="<?echo is_null($_GET['file']) ? '' : './imgstore/'.$_GET['file'].'.png?'.time() /* この画像はG+ボタン用。G+ボタンで画像キャッシュさせないために?time()を付加 */ ?>"/>
            </div>
        </div>
        <div class="span6" ng-show="conf.showToolBox" id="toolBox">
            <div class="row">
                <!-- <form class="form-inline"> -->
                <form class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label" for="colorpicker4mayuge">左右 <a href="" rel="tooltip" data-title="どちらのまゆげを描くか選びます。" data-placement="bottom" data-trigger="hover"><i class="icon-question-sign"></i></a></label>
                        <span class="controls">
                            <label class="radio inline">
                                <input type="radio" ng-model="conf.optionsLR" name="optionsLR" id="optionsR" value="r"> 右まゆ
                            </label>
                            <label class="radio inline">
                                <input type="radio" ng-model="conf.optionsLR" name="optionsLR" id="optionsL" value="l"> 左まゆ
                            </label>
                        </span>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="colorpicker4mayuge">まゆ毛の色 <a href="" rel="tooltip" data-title="すべてのまゆげが選んだ色になります。" data-placement="bottom" data-trigger="hover"><i class="icon-question-sign"></i></a></label>
                        <span class="controls span2">
                            <select name="colorpicker4mayuge" id="colorpicker4mayuge">
                                <!-- Colors from Google Calendar -->
                                <option value="black">黒</option>
                                <option value="brown">茶色</option>
                                <option value="#5C4033">こげ茶色</option>
                                <option value="gray">灰色</option>
                                <option value="white">白</option>
                            </select>
                        </span>
                        <button ng-click="changeAllMayugeColor()" class="btn">全まゆに適用</button>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="colorpicker4rinkaku">まゆ毛のりんかく <a href="" rel="tooltip" data-title="すべてのりんかくが選んだ色になります。" data-placement="right" data-trigger="hover"><i class="icon-question-sign"></i></a></label>
                        <span class="controls span2">
                            <select name="colorpicker4rinkaku" id="colorpicker4rinkaku">
                                <!-- Colors from Google Calendar -->
                                <option value="black">黒</option>
                                <option value="brown">茶色</option>
                                <option value="#5C4033">こげ茶色</option>
                                <option value="gray">灰色</option>
                                <option value="white">白</option>
                            </select>
                        </span>
                        <button ng-click="changeAllRinkakuColor()" class="btn">全まゆに適用</button>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="colorpicker4rinkaku">りんかくの太さ <a href="" rel="tooltip" data-title="りんかくの太さを選びます。" data-placement="right" data-trigger="hover"><i class="icon-question-sign"></i></a></label>
                        <span class="controls span2">
                            <select name="rinkakuWidth" id="rinkakuWidth" class="span1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </span>
                        <button ng-click="changeAllRinkakuWidth()" class="btn">全まゆに適用</button>
                    </div>
                </form>
            </div>
            <div class="row">
                <button class="btn" ng-click="export2canvas(true)"><i class="icon-upload"></i>サーバに保存</button>
                <button class="btn" ng-click="openPNG()"><i class="icon-download"></i>ローカルに保存</button>
                <a href="" rel="tooltip" data-default-show="true" data-title="画像を編集したら共有する前にサーバに保存しましょう。サーバに保存すると最新のまゆげ画像をshareできるようになります（SNSボタンが表示されます）。ローカルに保存ボタンを押すと別ウインドウでPNG画像が開くので右クリックで保存してください。。" data-placement="right" data-trigger="hover"><i class="icon-question-sign"></i></a>
                <div id="snsBtn">
                    <div id="g-plus-share" class="g-plus" data-action="share" data-annotation="bubble" data-height="24"></div>
                </div>
            </div>
        </div>
    </div>
    <pre>conf.changeAllRinkakuWidth:{{conf.changeAllRinkakuWidth|json}} conf.autoSave:{{conf.autoSave|json}} conf.changeAllMayugeColor:{{conf.changeAllMayugeColor|json}} conf.optionsLR:{{conf.optionsLR|json}} conf.showToolBox:{{conf.showToolBox|json}}</pre>

</div>