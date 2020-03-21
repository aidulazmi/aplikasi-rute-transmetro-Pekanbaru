


<body class="hm-gradient">
    
    <main>


       
            <!--Section: Satellite map-->
            <section class="mb-4">
                        <h4 class="font-up font-bold deep-purple-text mb-3"><strong>Pilih Lokasi</strong></h4>

                        <!--Google map-->
                        <div id="map-container-3" class="z-depth-1" style="height: 500px;">
                        </div>

            </section>
           

        </div>

      
    </main>

<script src="https://maps.google.com/maps/api/js?key=AIzaSyBW81faw8grMBm972NxliQ7fKjAzRTKmdw"></script>

<script>
$(document).on('click','#clearmap',clearmap)
.on('click','#simpandaftarkoordinatjembatan',simpandaftarkoordinatjembatan)
.on('click','#hapusmarkerjembatan',hapusmarkerjembatan)
.on('click','#viewmarkerjembatan',viewmarkerjembatan);
    var map;
    var markers = [];

    function initialize() {
        var mapOptions = {
        zoom: 14,
mapTypeId: 'satellite',
        center: new google.maps.LatLng(0.526813, 101.450822)
        };

        map = new google.maps.Map(document.getElementById("map-container-3"), mapOptions);

        // Add a listener for the click event
        google.maps.event.addListener(map, 'rightclick', addLatLng);
        google.maps.event.addListener(map, "rightclick", function(event) {
          var lat = event.latLng.lat();
          var lng = event.latLng.lng();
          $('#latitude').val(lat);
          $('#longitude').val(lng);
          //alert(lat +" dan "+lng);
        });
    }

    /**
     * Handles click events on a map, and adds a new point to the marker.
     * @param {google.maps.MouseEvent} event
     */
    function addLatLng(event) {
        var marker = new google.maps.Marker({
        position: event.latLng,
        title: 'Simple GIS',
        map: map
        });
        markers.push(marker);
    }
    //membersihkan peta dari marker
    function clearmap(e){
        e.preventDefault();
        $('#latitude').val('');
        $('#longitude').val('');
        setMapOnAll(null);
    }
    //buat hapus marker
    function setMapOnAll(map) {
      for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
      }
      markers = [];
    }
    //end buat hapus marker

    function simpandaftarkoordinatjembatan(e){
        e.preventDefault();
        var datakoordinat = {'id_jembatan':$('#id_jembatan').val(),'latitude':$('#latitude').val(),'longitude':$('#longitude').val()};
        console.log(datakoordinat);
        $.ajax({
            url : '<?php echo site_url("admin/simpandaftarkoordinatjembatan") ?>',
            dataType : 'json',
            data : datakoordinat,
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    $('#daftarkoordinatjembatan').load('<?php echo current_url()."/ #daftarkoordinatjembatan > *" ?>');
                    alert(data.msg);
                    clearmap(e);
                }else{
                    alert(data.msg);
                }
            }
        })
    }
    function hapusmarkerjembatan(e){
        e.preventDefault();
        var datakoordinat = {'id_jembatan':$(this).data('iddatajembatan')};
        $.ajax({
            url : '<?php echo site_url("admin/hapusmarkerjembatan") ?>',
            data : datakoordinat,
            dataType : 'json',
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    alert(data.msg);
                    $('#daftarkoordinatjembatan').load('<?php echo current_url()."/ #daftarkoordinatjembatan > *" ?>');
                    clearmap(e);
                }else{
                    alert(data.msg);
                }
            }
        })
    }
    function viewmarkerjembatan(e){
        e.preventDefault();
        var datakoordinat = {'id_jembatan':$(this).data('iddatajembatan')};
        $.ajax({
            url : '<?php echo site_url("admin/viewmarkerjembatan") ?>',
            data : datakoordinat,
            dataType : 'json',
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    clearmap(e);
                    //load marker
                    $.each(data.msg,function(m,n){
                        var myLatLng = {lat: parseFloat(n["latitude"]), lng: parseFloat(n["longitude"])};
                        console.log(m,n);
                        $.each(data.datajembatan,function(k,v){
                            addMarker(v['namajembatan'],myLatLng);
                        })
                        return false;
                    })
                    //end load marker
                }else{
                    alert(data.msg);
                }
            }
        })
    }
    // Menampilkan marker lokasi jembatan
    function addMarker(nama,location) {
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            title : nama
        });
        markers.push(marker);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script src="https://maps.google.com/maps/api/js?key=AIzaSyBW81faw8grMBm972NxliQ7fKjAzRTKmdw"></script>

  
</body>