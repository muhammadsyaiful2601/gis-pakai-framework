<div id="map" style="width: 100%; height: 100vh;"></div>

<script>
    var map = L.map('map').setView([-0.505591, 100.778795], 5);

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

    $.getJSON('<?= base_url('provinsi/11.geojson') ?>', function(data) {
        L.geoJSON(data, {
                style: function(feature) {
                    return {
                        color: 'red',
                        fillOpacity: 0.5
                    };
                }
            })
            .bindPopup("<img src = '<?= base_url('gambar/foto provinsi/aceh.jpg') ?>' width='200' /> <br>" +
                "<br>Provinsi Aceh </br>" +
                "<br>Luas wilayah: 57.956,00 km2 </br>")
            .addTo(map);
    });

    $.getJSON('<?= base_url('provinsi/12.geojson') ?>', function(data) {
        L.geoJSON(data, {
                style: function(feature) {
                    return {
                        color: 'blue',
                        fillOpacity: 0.5
                    };
                }
            })
            .bindPopup("<img src = '<?= base_url('gambar/foto provinsi/sumatera utara.jpg') ?>' width='200' /> <br>" +
                "<br>Provinsi Sumatera Utara </br>" +
                "<br>Luas wilayah: 73.584,00 km2 </br>")
            .addTo(map);
    });

    $.getJSON('<?= base_url('provinsi/13.geojson') ?>', function(data) {
        L.geoJSON(data, {
                style: function(feature) {
                    return {
                        color: 'yellow',
                        fillOpacity: 0.5
                    };
                }
            })
            .bindPopup("<img src = '<?= base_url('gambar/foto provinsi/sumatera barat.jpg') ?>' width='200' /> <br>" +
                "<br>Provinsi Sumatera Barat </br>" +
                "<br>Luas wilayah: 42.628,00 km2 </br>")
            .addTo(map);
    });

    $.getJSON('<?= base_url('provinsi/14.geojson') ?>', function(data) {
        L.geoJSON(data, {
                style: function(feature) {
                    return {
                        color: 'green',
                        fillOpacity: 0.5
                    };
                }
            })
            .bindPopup("<img src = '<?= base_url('gambar/foto provinsi/riau.jpg') ?>' width='200' /> <br>" +
                "<br>Provinsi Riau </br>" +
                "<br>Luas wilayah: 87.023,00 km2 </br>")
            .addTo(map);
    });
</script>