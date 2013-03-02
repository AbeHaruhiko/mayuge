var mainCtrl = function($scope, $http) {


}

// DOMの準備完了時
angular.element(document).ready(function() {

  $("#imageSelector").change(function() {

    // 選択されたファイルを取得
    var file = this.files[0];

    // 画像ファイル以外は処理中止
    if (!file.type.match(/^image\/(png|jpeg|jpg|gif)$/)) return;

    localImage = new Image();
    var reader = new FileReader();
    // var imageWidth;
    // var imageHeight;

    // File APIを使用し、ローカルファイルを読み込む
    reader.onload = function(evt) {

      // 画像がloadされた後に、canvasに描画する
      localImage.onload = function() {
        selectedImageWidth = localImage.width;
        selectedImageHeight = localImage.height;


        var limitSize = 400;
        if (selectedImageWidth > limitSize || selectedImageHeight > limitSize) {

          if (selectedImageWidth > selectedImageHeight) {
            selectedImageHeight = Math.round(selectedImageHeight * limitSize / selectedImageWidth);
            selectedImageWidth = limitSize;
          } else if (selectedImageWidth < selectedImageHeight) {
            selectedImageWidth = Math.round(selectedImageWidth * limitSize / selectedImageHeight);
            selectedImageHeight = limitSize;
          } else {
            selectedImageWidth = limitSize;
            selectedImageHeight = limitSize;
          }
        }

      }

      // 画像のURLをソースに設定
      localImage.src = evt.target.result;
    }

    // ファイルを読み込み、データをBase64でエンコードされたデータURLにして返す
    reader.readAsDataURL(file);

    // アップロード
    $(this).upload('/proxy.php', onUploadCompleted, 'xml');
  });
});

onUploadCompleted = function(res) {
  console.log(res);
  detectedFaces = res;
  getSVG();
}

getSVG = function() {

  // jquery-svg使用時
  $("#svgArea").svg('destroy');
  $("#svgArea").width(selectedImageWidth).height(selectedImageHeight);
  $("#svgArea").svg();
  svgWrapper = $("#svgArea").svg('get');

  svgWrapper.load("./svg/golgo3.svg",   
  {  
      onLoad: loadSvgCompleteHandler  
  });


  // // raphael使用
  // $.ajax({
  //   type: "GET",
  //   url: "./svg/golgo3.svg",
  //   dataType: "text",
  //   success: loadSvgCompleteHandler
  // });


}

loadSvgCompleteHandler = function(svgXml) {

  // jquery-svg使用時
  svgWrapper.image(0, 0, selectedImageWidth, selectedImageHeight, localImage.src);

  // // raphael使用
  // var paper = Raphael("svgArea", selectedImageWidth, selectedImageHeight);
  // paper.importSVG(svgXml);

  // 認識された顔
  $(detectedFaces).find("face").each(function () {

    // 左目
    var pointER1 = $(this).find("#ER1");
    var xER1 = ~~pointER1.attr("x");
    var yER1 = ~~pointER1.attr("y");


    // 右眉
    var pointBR1 = $(this).find("#BR1");
    var pointBR5 = $(this).find("#BR5");
    var xBR1 = ~~pointBR1.attr("x");
    var yBR1 = ~~pointBR1.attr("y");
    var xBR5 = ~~pointBR5.attr("x");
    var yBR5 = ~~pointBR5.attr("y");
    // console.log(xBR1 + " : " + yBR1 + " : " + xBR5 + " : " + yBR5);
    var lenBR = Math.sqrt(Math.pow(xBR1 - xBR5, 2) + Math.pow(yBR1 - yBR5, 2))
    // console.log(lenBR);
    var scaleBR = lenBR/95 * 1.2

    widthBR = xBR1 - xBR5;
    heightBR = yBR1 - yBR5;

    dblRadian = Math.atan(heightBR / widthBR);
    dgr = dblRadian/(Math.PI/180);


    // jquery-svg使用時
    var grpRMayuge = svgWrapper.group({class_: "draggable", transform: "translate(" + ((xBR1 + xER1)/2) + "," + ((yBR1 + yER1)/2) + ")"});
    // svgWrapper.use(grpRMayuge, "#path-r-mayuge", {fill: "black", transform: "scale(" + scaleBR + "),rotate(" + dgr + ")", strokeWidth: "1"})
    svgWrapper.use(grpRMayuge, "#path-r-mayuge", {fill: "black", transform: "scale(" + scaleBR + ")", strokeWidth: "1"})

    // 左目
    var pointEL1 = $(this).find("#EL1");
    var xEL1 = ~~pointEL1.attr("x");
    var yEL1 = ~~pointEL1.attr("y");

    // 左眉
    var pointBL1 = $(this).find("#BL1");
    var pointBL5 = $(this).find("#BL5");
    var xBL1 = ~~pointBL1.attr("x");
    var yBL1 = ~~pointBL1.attr("y");
    var xBL5 = ~~pointBL5.attr("x");
    var yBL5 = ~~pointBL5.attr("y");
    // console.log(xBL1 + " : " + yBL1 + " : " + xBL5 + " : " + yBL5);
    var lenBL = Math.sqrt(Math.pow(xBL1 - xBL5, 2) + Math.pow(yBL1 - yBL5, 2))
    // console.log(lenBL);
    var scaleBL = lenBL/95 * 1.2

    widthBL = xBL1 - xBL5;
    heightBL = yBL1 - yBL5;

    dblRadian = Math.atan(heightBL / widthBL);
    dgr = dblRadian/(Math.PI/180);

    // jquery-svg使用時  
    var grpLMayuge = svgWrapper.group({class_: "draggable", transform: "translate(" + ((xBL1 + xEL1)/2) + "," + ((yBL1 + yEL1)/2) + ")"});
    svgWrapper.use(grpLMayuge, "#path-r-mayuge", {fill: "black", transform: "scale(-" + scaleBL + "," + scaleBL + ")", strokeWidth: "1"})



    var makeSVGElementDraggable = svgDrag.setupCanvasForDragging();

    $(".draggable", svgWrapper.root()).each(function(index, element) {
      makeSVGElementDraggable(element);
      element.addEventListener("mouseup", export2canvas);
    })




  });
  export2canvas();
}

export2canvas = function() {
  // CANVAS書き出し
  if (!$("#svg-mayuge").attr("xmlns:xlink")){
    $("#svg-mayuge").attr({"xmlns:xlink": $.svg.xlinkNS});
  }
  var xml = svgWrapper.toSVG();
  console.log(xml);
  // PNG書き出しはレンダリング完了後に行なう
  canvg($("#canvasArea")[0], xml, {renderCallback: export2pngAndServer});

}

export2pngAndServer = function() {

  var dataURL = $("#canvasArea")[0].toDataURL();
  // PNG書き出し
  // console.log($("#canvasArea")[0].toDataURL());
  $("#pngArea > img").attr({src: dataURL});

  // サーバに投げる。
  var fd = new FormData();
  var hogehoge = dataURItoBlob(dataURL);
  fd.append('mayugedImage', hogehoge);

  $.ajax({
    url: '/save.php',
    type: 'POST',
    data: fd,
    dataType: 'text',
    contentType: false, // デフォルトの値は application/x-www-form-urlencoded; charset=UTF-8'
    processData: false  // デフォルトの値は application/x-www-form-urlencoded
  })
  .done(function(data) {
    console.log(data);
    history.replaceState("index");
    // history.pushState(data, null, "Sfn=" + data);
  })
  .fail(function(xhr, status, exception) {
    console.log(status);
  });

}

dataURItoBlob = function(dataURI) {
    var binary = atob(dataURI.split(',')[1]);
    var array = [];
    for(var i = 0; i < binary.length; i++) {
        array.push(binary.charCodeAt(i));
    }
    return new Blob([new Uint8Array(array)], {type: 'image/png'});
}
