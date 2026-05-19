<div class="row">

    <div class="col-sm-8">
        <div id="map" style="width: 100%; height: 100vh;"></div>
    </div>

    <div class="col-sm-4">
        <div class="row">
            <?php if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
            ?>
            <? $error = validation_errors() ?>
            <? echo form_open_multipart('lokasi/insertData') ?>

            <div class="form-group">
                <label>Nama Lokasi</label>
                <input type="text" class="form-control" name="nama_lokasi">
            </div>

            <div class="form-group">
                <label>Alamat Lokasi</label>
                <input type="text" class="form-control" name="alamat_lokasi">
            </div>

            <div class="form-group">
                <label>Latitude</label>
                <input type="text" class="form-control" name="latitude" id="latitude">
            </div>

            <div class="form-group">
                <label>Longitude</label>
                <input type="text" class="form-control" name="longitude" id="longitude">
            </div>

            <div class="form-group">
                <label>Foto Lokasi</label>
                <input type="file" class="form-control" name="foto_lokasi" accept="image/*">
            </div>

            <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-secondary">Reset</button>

            <? echo form_close() ?>
        </div>
    </div>
</div>

<script>
    var streets = L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; OpenStreetMap & CartoDB'
    });

    var dark = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; OpenStreetMap & CartoDB'
    });

    var satellite = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles &copy; Esri'
    });

    const map = L.map('map', {
        center: [-0.47355939487371107, 100.76143565289122],
        zoom: 17,
        layers: [streets]
    });

    const baseLayers = {
        "Streets": streets,
        "Dark": dark,
        "Satellite": satellite
    };

    const layerControl = L.control.layers(baseLayers, null, {
        collapsed: false
    }).addTo(map);

    var latinput = document.querySelector("[name=latitude]");
    var lnginput = document.querySelector("[name=longitude]");
    var posisi = document.querySelector("[name=posisi]");
    var curLocation = [-0.3043862682948846, 100.36926212024647];
    map.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation, {
        draggable: true,
    });

    marker.on('dragend', function(e) {
        var posisition = marker.getLatLng();
        marker.setLatLng(posisition).bindPopup(posisition.lat + ", " + posisition.lng).update();
        latinput.value = posisition.lat;
        lnginput.value = posisition.lng;
        posisi.value = posisition.lat + ', ' + posisition.lng;
    });

    map.on('click', function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        if (!marker) {
            marker = L.marker(e.latlng).addTo(map);
        } else {
            marker.setLatLng(e.latlng);
        }
        latinput.value = lat;
        lnginput.value = lng;
        posisi.value = lat + ', ' + lng;
    });

    map.addLayer(marker);
</script>