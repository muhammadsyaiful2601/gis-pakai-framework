<div id="map" style="width: 100%; height: 100vh;"></div>

<script>
    var map = L.map('map').setView([-0.505591, 100.778795], 13);

    var street = L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; OpenStreetMap & CartoDB'
    }).addTo(map);


    var marker1 = L.marker([-0.505591, 100.778795]).addTo(map);
    marker1.bindPopup("<img src='<?= base_url('gambar/ngalau.jpg') ?>' width='100' height='100'><br><b>Jam Gadang</b><br>Bukittinggi").openPopup();


    var customIcon = L.icon({
        iconUrl: '<?= base_url('gambar/ngalau.jpg') ?>',
        iconSize: [38, 38],
        popupAnchor: [0, -20]
    });

    var marker2 = L.marker([-0.512, 100.780], {
        icon: customIcon
    }).addTo(map);
    marker2.bindPopup("<b>Pasar Atas</b>");


    var marker3 = L.marker([-0.490, 100.775]).addTo(map);
    marker3.bindPopup("Ngarai Sianok");

    var markers = [{
            coords: [-0.505591, 100.778795],
            nama: "Jam Gadang"
        },
        {
            coords: [-0.512, 100.780],
            nama: "Pasar Atas"
        },
        {
            coords: [-0.490, 100.775],
            nama: "Ngarai Sianok"
        },
        {
            coords: [-0.520, 100.770],
            nama: "Lobang Jepang"
        },
        {
            coords: [-0.497, 100.785],
            nama: "Taman Bung Hatta"
        }
    ];

    for (var i = 0; i < markers.length; i++) {
        var m = L.marker(markers[i].coords).addTo(map);
        m.bindPopup(markers[i].nama);
    }
</script>