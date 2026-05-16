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
        [-0.46110399161321913, 100.755955925555],
        [-0.46053806381702767, 100.7557098328812],
        [-0.4597005710582564, 100.7553946733216],
        [-0.4591232441264921, 100.75517741438216],
        [-0.4585170001878797, 100.75489543950924],
        [-0.4579550953705755, 100.75467348671621],
        [-0.45669897176328766, 100.75417248551786]
    ], {
        color: 'blue',
        weight: 5,
        opacity: 0.7,
        smoothFactor: 1
    }).addTo(map).bindPopup('Jalur Buo');
</script>