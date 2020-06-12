<?php
$con=mysqli_connect("localhost","root","");
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\GambarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Location';
$this->params['breadcrumbs'][] = $this->title;
?>
<h4><center><b>Lokasi - Lokasi Kantor Yang Tersedia</b></center>
<hr></h4>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
      .button_maps {
            text-decoration: none;
            border: 1px solid #ccc;
            padding: 10px 15px;
            -moz-border-radius: 11px;
            -webkit-border-radius: 11px;
            border-radius: 11px;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
        }

        .button_maps:hover {
            background-color:       #1E90FF; /* Green */
            color: white;
        }
    </style>


    <!-- akhir dari Bagian js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=API&callback=initMap" type="text/javascript"></script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script>

    var marker;
    var markers = [];
      function initialize() {

        // Variabel untuk menyimpan informasi (desc)
        var infoWindow = new google.maps.InfoWindow;

        //  Variabel untuk menyimpan peta Roadmap
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        // Pembuatan petanya
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);

        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();

        // Pengambilan data dari database
        <?php
        mysqli_select_db($con,'kargo');

        $sql="SELECT location_id, nama, telp, address, lat, lng FROM kantor";

        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result))
            {
            $id_hotel = $row['location_id'];
            $nama = $row['nama'];
            $telp = $row['telp'];
            $address = $row['address'];
            $lat = $row['lat'];
            $lng = $row['lng'];


            echo ("addMarker($lat, $lng, '<p><b>$nama <br><i style=font-size:15px;color:red class=fa>&#xf095;</i> $telp</b><br> $address</p> <p><br><a href=https://maps.google.com/?q=$lat,$lng target=_blank class=button_maps><b>Direction</b></center></a></p>');");
            }
       
        ?>
     //    <?php
     //    $stid = oci_parse($conn, 'SELECT HOTEL.ID_HOTEL, 
     //        HOTEL.NAMA_HOTEL,
     //        HOTEL.GAMBAR, 
     //        HOTEL.LAT, 
     //        HOTEL.LNG
     //        FROM HOTEL');
     //    oci_execute($stid);

     //    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
     //        $id_hotel = $row['ID_HOTEL'];
     //        $nama = $row['NAMA_HOTEL'];
     //        $gambar = $row['GAMBAR'];
     //        $lat = $row['LAT'];http://localhost/kargo/frontend/web/index.php
     //        $lng = $row['LNG'];

     //        echo ("addMarker($lat, $lng, '<b>".Html::img(Yii::getAlias('@imageurl')."/hotel/$gambar", ['width' => '80px','height' => '80px'])."</b> <p><b>$nama</b></p> <p><a href=index.php?r=catalog%2Fview&id=$id_hotel class=button_maps><b>Lihat Hotel</b></a></p>');\n");
     //    }

     //    oci_free_statement($stid);
     //    oci_close($conn);
     // ?>
        // Proses membuat marker
        function addMarker(lat, lng, info) {
            var icon = '/kargo/common/uploads/marker/marker1.png';

            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            
            var marker = new google.maps.Marker({
                    map: map,
                    icon: icon,
                    position: lokasi
            });
            markers.push(marker);
            
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
            
        }
        var markerCluster = new MarkerClusterer(map, markers,
                {
                    imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
                });
            }
        markerCluster.addMarker(lat, lng, info);

        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }

      google.maps.event.addDomListener(window, 'load', initialize);

    </script>

</head>
<body onload="initialize()">
    <div class="panel-body button-shadow">
        <div id="map" style="width: 100%; height: 480px;"></div>
    </div>
</body>
<br>
</html>



