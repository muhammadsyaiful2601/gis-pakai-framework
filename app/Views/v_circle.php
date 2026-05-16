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

    L.circle([-0.47355939487371107, 100.76143565289122], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 200,
        })
        .bindPopup(`zona merah`)
        .addTo(map)

    L.marker([-0.47355939487371107, 100.76143565289122], {
            icon: marker1
        })
        .bindPopup(`
    <div style="text-align: center;">
        <img src="<?= base_url('gambar/foto/kantor wali.jpg') ?>" width="200" style="border-radius: 5px;"><br>
        <b>Kantor Wali Nagari</b>
    </div>`)
        .addTo(map);
</script>