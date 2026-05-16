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

    L.polygon([


        [-0.4736488306634876, 100.7615953094322],
        [-0.47365017202715853, 100.76159195590859],
        [-0.4737541007208442, 100.76166839551321],
        [-0.47369978784585354, 100.76174550901708],
        [-0.47359384420958334, 100.7616717482649],
        [-0.4731632895602376, 100.76164090286335]
    ], {
        color: 'green',
        weight: 2,
        opacity: 0.7,
        fillOpacity: 0.5
    }).addTo(map).bindPopup('Area PSDKU');
</script>