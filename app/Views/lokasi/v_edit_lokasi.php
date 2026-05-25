<div class="row">
    <div class="col-sm-8">
        <div id="map" style="width: 100%; height: 100vh;"></div>
    </div>

    <div class="col-sm-4">
        <div class="row">
            <form action="<?= base_url('lokasi/updateData/' . $lokasi['id_lokasi']) ?>" method="post" enctype="multipart/form-data">

                <div class="form-group mb-3">
                    <label>Nama Lokasi</label>
                    <input name="nama_lokasi" class="form-control" value="<?= $lokasi['nama_lokasi'] ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label>Alamat Lokasi</label>
                    <input name="alamat_lokasi" class="form-control" value="<?= $lokasi['alamat_lokasi'] ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label>Latitude</label>
                    <input name="latitude" id="Latitude" class="form-control" value="<?= $lokasi['latitude'] ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label>Longitude</label>
                    <input name="longitude" id="Longitude" class="form-control" value="<?= $lokasi['longitude'] ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label>Posisi</label>
                    <input name="posisi" id="Posisi" class="form-control" value="<?= $lokasi['latitude'] . ', ' . $lokasi['longitude'] ?>">
                </div>

                <div class="form-group mb-3">
                    <label>Ganti Foto Lokasi</label>
                    <input type="file" name="foto_lokasi" class="form-control" accept="image/*">
                    <img src="<?= base_url('foto/' . $lokasi['foto_lokasi']) ?>" class="mt-2" width="100">
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('lokasi/index') ?>" class="btn btn-secondary">Kembali</a>

            </form>
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
        attribution: 'Tiles © Esri'
    });

    var map = L.map('map', {
        center: [<?= $lokasi['latitude'] ?>, <?= $lokasi['longitude'] ?>],
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
    var curLocation = [<?= $lokasi['latitude'] ?>, <?= $lokasi['longitude'] ?>];
    map.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation, {
        draggable: true,
    });

    // Mengambil titik koordinat pada saat marker dipindahkan
    marker.on('dragend', function(e) {
        var posisition = marker.getLatLng();
        marker.setLatLng(posisition, {
            curLocation,
        }).bindPopup(posisition).update();
        $("#Latitude").val(posisition.lat);
        $("#Longitude").val(posisition.lng);
        $("#Posisi").val(posisition.lat + ', ' + posisition.lng);
    });

    // Mengambil titik koordinat pada saat map di klik
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
        if (posisi) {
            posisi.value = lat + ', ' + lng;
        }
    });

    map.addLayer(marker);
</script>