<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Latitude</label>
            <input class="form-control" name="latitude" id="Latitude">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Longitude</label>
            <input class="form-control" name="longitude" id="Longitude">
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label>Posisi</label>
            <input class="form-control" name="posisi" id="Posisi">
        </div>
    </div>

    <div class="col-sm-12">
        <br>
        <div id="map" style="width: 100%; height: 100vh;"></div>
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


    const map = L.map('map', {
        center: [-0.47355939487371107, 100.76143565289122],
        zoom: 14,
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

    var marker = new L.marker([-0.47355939487371107, 100.76143565289122], {
        draggable: true,
    });

    var circle = L.circle([-0.47355939487371107, 100.76143565289122], {
        radius: 200,
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
    }).addTo(map);

    //mengambil titik koordinat pada saat marker dipindahkan
    marker.on('dragend', function(event) {
        var latlng = event.target.getLatLng();
        var distance = latlng.distanceTo(circle.getLatLng());

        if (distance <= circle.getRadius()) {
            //jika coordinat berada dalam radius lingkaran
            document.getElementById('Latitude').value = latlng.lat;
            document.getElementById('Longitude').value = latlng.lng;
            document.getElementById('Posisi').value = latlng.lat + ', ' + latlng.lng;
        } else {
            //jika koordinat diluar radius
            alert("Maaf, Titik coordinat yang diambil berada diluar jangkauan!!");
            event.target.setLatLng(circle.getLatLng());
            document.getElementById('Latitude').value = '';
            document.getElementById('Longitude').value = '';
            document.getElementById('Posisi').value = '';
        }
    });

    //mengambil titik koordinat pada saat map di klik
    map.on('click', function(event) {
        var latlng = event.latlng;
        var distance = latlng.distanceTo(circle.getLatLng());
        if (distance <= circle.getRadius()) {
            if (!marker) {
                marker = L.marker(event.latlng).addTo(map);
            } else {
                marker.setLatLng(event.latlng);
            }
            //jika coordinat berada dalam radius lingkaran
            document.getElementById('Latitude').value = latlng.lat;
            document.getElementById('Longitude').value = latlng.lng;
            document.getElementById('Posisi').value = latlng.lat + ', ' + latlng.lng;
        } else {
            //jika coordinat diluar radius
            alert("Maaf, Titik coordinat yang diambil berada diluar jangkauan!!");
            event.target.setLatLng(circle.getLatLng());
            document.getElementById('Latitude').value = '';
            document.getElementById('Longitude').value = '';
            document.getElementById('Posisi').value = '';
        }

    });

    map.addLayer(marker);
</script>