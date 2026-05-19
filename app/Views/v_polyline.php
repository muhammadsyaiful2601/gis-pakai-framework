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

    L.polyline([
        [-0.47317545361539654, 100.76106796093853],
        [-0.47401431659055854, 100.76174736745688],
        [-0.4750605029814199, 100.7627042780996],
        [-0.4758355738987548, 100.76333583913136],
        [-0.47912723209672015, 100.76593225657447],
        [-0.48086874830317605, 100.76738357102747],
        [-0.48325997395762904, 100.77014424285386],
        [-0.48385507558890695, 100.77087854040809],
        [-0.4844987827875538, 100.77151154181966]
    ], {
        color: 'red',
        weight: 5,
        opacity: 0.7,
        smoothFactor: 1
    }).addTo(map).bindPopup('Jalan Pangian');

    L.polyline([
        [-0.4728091220163409, 100.76083283762948],
        [-0.47160064508116883, 100.75994121598735],
        [-0.47104130995083265, 100.75962996253625],
        [-0.467457506685914, 100.75889740247108],
        [-0.4672506932728194, 100.7588430837023],
        [-0.46700259718447024, 100.75873043092395],
        [-0.46663748256089976, 100.75849798621627],
        [-0.4654512065880554, 100.75793770062813]
    ], {
        color: 'blue',
        weight: 5,
        opacity: 0.7,
        smoothFactor: 1
    }).addTo(map).bindPopup('Jalur Buo');
</script>