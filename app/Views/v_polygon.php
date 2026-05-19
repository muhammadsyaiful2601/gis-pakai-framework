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
        [-0.4700555436571326, 100.75950313747737],
        [-0.46999013752085633, 100.75976928173266],
        [-0.4720476655985572, 100.76094982534181],
        [-0.47169808116251943, 100.76166706157926],
        [-0.4687322512204576, 100.76094644213036],
        [-0.46863095216115264, 100.76174307126126],
        [-0.47220292629797816, 100.76333019162496],
        [-0.47299325143475446, 100.76244382531925],
        [-0.4757647788198947, 100.7641666438222],
        [-0.4760964963872902, 100.7636307738689],
        [-0.4718150895879788, 100.76015481828698],
        [-0.4700690281365626, 100.7595058621658]
    ], {
        color: 'green',
        weight: 2,
        opacity: 0.7,
        fillOpacity: 0.5
    }).addTo(map).bindPopup('jorong sawahan');

    L.polygon([
        [-0.4760973013837845, 100.76364997268335],
        [-0.474062341453615, 100.76609966381096],
        [-0.4725951285687732, 100.76527034129526],
        [-0.4722761692112095, 100.76648242801426],
        [-0.47311953080235186, 100.76776823132589],
        [-0.47363943448671636, 100.76842849964781],
        [-0.47465303552468174, 100.76716891353519],
        [-0.4765430458495816, 100.76946497170255],
        [-0.47752021433265496, 100.76852107650758],
        [-0.4777186879134754, 100.76731215001212],
        [-0.476645012535443, 100.76607892015687],
        [-0.4769901832736006, 100.76540752085462],
        [-0.47650846148132653, 100.76498647386694],
        [-0.4769750109342063, 100.7643871457223],
        [-0.47643259977869346, 100.7638940276286]
    ], {
        color: 'blue',
        weight: 2,
        opacity: 0.7,
        fillOpacity: 0.5
    }).addTo(map).bindPopup('Jorong Lubuk Batang');
</script>