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

    const marker1 = L.icon({
        iconUrl: '<?= base_url('gambar/icon/office.png') ?>',
        iconSize: [40, 40],
        iconAnchor: [20, 40],
    })

    const marker2 = L.icon({
        iconUrl: '<?= base_url('gambar/icon/cave.png') ?>',
        iconSize: [40, 40],
        iconAnchor: [20, 40],
    })

    const marker3 = L.icon({
        iconUrl: '<?= base_url('gambar/icon/gas-station.png') ?>',
        iconSize: [40, 40],
        iconAnchor: [20, 40],
    })

    const marker4 = L.icon({
        iconUrl: '<?= base_url('gambar/icon/bridge.png') ?>',
        iconSize: [40, 40],
        iconAnchor: [20, 40],
    })

    const marker5 = L.icon({
        iconUrl: '<?= base_url('gambar/icon/house.png') ?>',
        iconSize: [40, 40],
        iconAnchor: [20, 40],
    })

    L.marker([-0.47358889968132517, 100.76164788628617], {
            icon: marker1
        }).addTo(map)
        .bindPopup("<img src='<?= base_url('gambar/foto/kantor wali.jpg') ?>' width = '200px'><br> " +
            "<b>Kantor Wali Nagari</b><br>")
        .addTo(map);

    L.marker([-0.47639104926627035, 100.74700104375175], {
            icon: marker2
        }).addTo(map)
        .bindPopup("<img src='<?= base_url('gambar/foto/ngalau.jpg') ?>' width = '200px'><br> " +
            "<b>Ngalau</b>")
        .addTo(map);

    L.marker([-0.4822026852424024, 100.76938570553678], {
            icon: marker3
        }).addTo(map)
        .bindPopup("<img src='<?= base_url('gambar/foto/pertamina.png') ?>' width = '200px'><br> " +
            "<b>Pertamina</b>")
        .addTo(map);

    L.marker([-0.47041725354491754, 100.77059726338254], {
            icon: marker4
        }).addTo(map)
        .bindPopup("<img src='<?= base_url('gambar/foto/jembatan.png') ?>' width = '200px'><br> " +
            "<b>Jembatan</b>")
        .addTo(map);

    L.marker([-0.4713775905219554, 100.76216749736338], {
            icon: marker5
        }).addTo(map)
        .bindPopup("<img src='<?= base_url('gambar/foto/rumah.png') ?>' width = '200px'><br> " +
            "<b>Rumah</b>")
        .addTo(map);
</script>