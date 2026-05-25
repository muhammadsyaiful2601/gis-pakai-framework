<div id="map" style="width: 100%; height: 100vh;"></div>

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

    const locationIcon = L.icon({
        iconUrl: '<?= base_url('gambar/icon/location.png') ?>',
        iconSize: [45, 45],
    });

    <?php foreach ($lokasi as $key => $value) { ?>
        L.marker([<?= $value['latitude'] ?>, <?= $value['longitude'] ?>], {
                icon: locationIcon
            })
            .bindPopup('<img src="<?= base_url('foto/' . $value['foto_lokasi']) ?>" width="150px"><br>' +
                '<b><?= $value['nama_lokasi'] ?></b><br>' +
                'Alamat: <?= $value['alamat_lokasi'] ?><br>')
            .addTo(map);
    <?php } ?>
</script>