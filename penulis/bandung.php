
<html>
<head>
<title>GoogleMap Sederhana</title>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyB5WTP1bk2bMGYRl4-RmJPPs-3CGbrCN2w&callback=i"></script>
<script type="text/javascript">
var peta;
function peta_awal(){
    // definisikan koordinat awal untuk peta
        var awal = new google.maps.LatLng(-6.897685, 107.624284);
       // peta option, berupa setting bagaimana peta itu akan muncul
       var petaoption = {zoom: 14,center: awal,mapTypeId: google.maps.MapTypeId.ROADMAP};
      // menuliskan koordinat peta dan memunculkannya ke halaman web
      peta = new google.maps.Map(document.getElementById("map_canvas"),petaoption);
      // marker
      tanda = new google.maps.Marker({position: awal, map: peta });}
</script>
</head>
<body onload="peta_awal()">
<h2>Bandung</h2>
<div id="map_canvas" style="width:100%; height:500px" ></div>
</body>
</html>
