<div id="map" style="width: 100%; height: 100vh;"></div>

<script>
    var map = L.map('map').setView([-0.505591, 100.778795], 13);

    var street = L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> & CartoDB'
    });

    var dark = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; OpenStreetMap & CartoDB'
    });


    var satellite = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles &copy; Esri'
    });

    street.addTo(map);

    var baseMaps = {
        "Street": street,
        "Dark": dark,
        "Satellite": satellite
    };

    L.control.layers(baseMaps, null, {
        collapsed: false
    }).addTo(map);

    L.polyline([
            [-0.505591, 100.778795],
            [-0.510000, 100.780000],
            [-0.515000, 100.785000]
        ], {
            color: 'blue',
            weight: 5,
        })
        .bindPopup("<img src='<?= base_url('gambar/jalan.jpg') ?>' width='200'> <br>" +
            "<b>jalan lintau</b> <br>" +
            "Panjang: 1.5 km <br>" +
            "Kondisi: Buruk"
        )
        .addTo(map);
</script>