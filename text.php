<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
  <style type="text/css">
    body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
  </style>
  <link href="http://api.map.baidu.com/library/TrafficControl/1.4/src/TrafficControl_min.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=您的密钥"></script>
  <script type="text/javascript" src="http://api.map.baidu.com/library/TrafficControl/1.4/src/TrafficControl_min.js"></script>
  <title>路况图层</title>
</head>
<body>
  <div id="allmap"></div>
</body>
</html>
<script type="text/javascript">
  // 百度地图API功能
  var map = new BMap.Map("allmap");
  map.centerAndZoom(new BMap.Point(116.404, 39.915), 12); 
  var ctrl = new BMapLib.TrafficControl({
    showPanel: false //是否显示路况提示面板
  });      
  map.addControl(ctrl);
  ctrl.setAnchor(BMAP_ANCHOR_BOTTOM_RIGHT);  
</script>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
  <style type="text/css">
    body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
  </style>
  <link href="http://api.map.baidu.com/library/TrafficControl/1.4/src/TrafficControl_min.css" rel="stylesheet" type="text/css" />
<script src="http://webapi.amap.com/maps?v=1.2&key=yourkey" type="text/javascript"></script>
  <script type="text/javascript" src="http://api.map.baidu.com/library/TrafficControl/1.4/src/TrafficControl_min.js"></script>
  <title>路况图层</title>
</head>
<body>
  <div id="allmap"></div>
</body>
</html>
<script type="text/javascript">
  // 百度地图API功能
  var map = new BMap.Map("allmap");
  map.centerAndZoom(new BMap.Point(116.404, 39.915), 12); 
  var ctrl = new BMapLib.TrafficControl({
    showPanel: false //是否显示路况提示面板
  });      
  map.addControl(ctrl);
  ctrl.setAnchor(BMAP_ANCHOR_BOTTOM_RIGHT);  
</script>
