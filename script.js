  window.onload=init;
  var server = "http://localhost/tacoti/";
  var markersDua = [];
  var markers = [];
  var infoDua = [];
  var fotosrc = 'foto/';
  var centerLokasi;
  var pos ='null';
  var circles=[];
  var kecamatan=[];
  var infoDua = [];

    
function init(){
   
   home();


}

function legenda()
{
  $('#tombol').empty();
  $('#tombol').append('<a class="btn btn-default" role="button" id="hidelegenda" onclick="hideLegenda()" data-toggle="collapse" title="Sembunyikan Legenda" ><i class="fa fa-eye-slash" style="color:black;"> </i>');
  
  var layer = new google.maps.FusionTablesLayer(
    {
          query: {
            select: 'Location',
            from: '1NIVOZxrr-uoXhpWSQH2YJzY5aWhkRZW0bWhfZw'
          },
          map: map
        });
        var legend = document.createElement('div');
        legend.id = 'legend';
        var content = [];
        content.push('<h4>Legenda</h4>');
        content.push('<p><div class="color b"></div>Kecamatan Koto Tangah</p>');
        content.push('<p><div class="color c"></div>Kecamatan Nanggalo</p>');
        content.push('<p><div class="color d"></div>Kecamatan Padang Utara</p>');
        content.push('<p><div class="color e"></div>Kecamatan Padang Barat</p>');
        content.push('<p><div class="color f"></div>Kecamatan Padang Timur</p>');
        content.push('<p><div class="color g"></div>Kecamatan Padang Selatan</p>');
        content.push('<p><div class="color h"></div>Kecamatan Kuranji</p>');
    content.push('<p><div class="color i"></div>Kecamatan Pauh</p>');
    content.push('<p><div class="color j"></div>Kecamatan Lubuk Begalung</p>');
    content.push('<p><div class="color k"></div>Kecamatan Lubuk Kilangan</p>');
    content.push('<p><div class="color l"></div>Kecamatan Bungus Teluk Kabung</p>');
    content.push('<p><div class="color a"></div>Batas Kecamatan</p>');
        legend.innerHTML = content.join('');
        legend.index = 1;
        map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);
}

function hideLegenda() {
  $('#legend').remove();
  $('#tombol').empty();
  $('#tombol').append('<a class="btn btn-default" id="showlegenda" onclick="legenda()" data-toggle="collapse" title="Legenda" ><i class="fa fa-eye" style="color:black;"></i></a> ');
}


function basemap() //google maps
{
    
    map = new google.maps.Map(document.getElementById('map'), 
        {
          zoom: 13,
          center: new google.maps.LatLng(-0.943640, 100.370268),
          mapTypeId: google.maps.MapTypeId.ROADMAP });   
          console.log(map);  	
}

function kecamatanTampil()
  {
    clearkecamatan();
      $.ajax({
         url: server+'kecamatan.php', data: "", dataType: 'json', success: function(rows)
       {
         for (var i in rows.features)
           {
          var id_kecamatan = rows.features[i].properties.id_kecamatan;
          var warna = rows.features[i].properties.warna;
         console.log("ini warna "+ warna);
          regiontampilKecamatan(id_kecamatan,warna)
           }         
       }       
      });
 
  }
  function regiontampilKecamatan(id_kecamatan,warna)
  {
    kecamatan1 = new google.maps.Data();
    kecamatan1.loadGeoJson(server+'warnakecamatan.php?id_kecamatan='+id_kecamatan);
    kecamatan1.setStyle(function(feature){
    return({
        fillColor: warna,
        strokeWeight: 3,
        strokeColor: 'Crimson',
        fillOpacity: 0.3,
        clickable: false
        });
      });
    kecamatan1.setMap(map);
    kecamatan.push(kecamatan1);
  }
  //kecamatanJson.setMap(map);
 function clearkecamatan()
 {
   for (i in kecamatan)
   {
     kecamatan[i].setMap(null);
   }
 }
  function carinamatempat(){
  if(caritempat.value==''){
    alert("Fill the input form first!");
    }else{
  
    $.ajax({ url: server+'caritempat.php?cari_tempat='+caritempat.value, data: "", dataType: 'json', success: function (rows){
      tempatTampil();
      cari_tempat(rows);
    }});
  }
}

function  cari_tempat(rows) //fungsi cari toko reparasi berdasarkan nama
  {   
     $('#hasilcari1').show();
     $('#hasilcari').empty();
    //  hapusInfo();
      clearroute2();
      hapusMarkerTerdekat();
            if(rows==null)
            {
              alert('Tempat tidak ditemukan');
            }
        for (var i in rows) 
            {   
              var row     = rows[i];
              var toko_id   = row.toko_id;
              var nama_toko_repair   = row.nama_toko_repair;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
              centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'ico/commercial-places.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
             console.log(toko_id);
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
              map.setCenter(centerBaru);
              map.setZoom(14);                
                $('#hasilcari').append("<tr class='danger'><td>"+nama_toko_repair+"</td><td><a role='button' title='info' class='btn btn-default fa fa-info resultsearchok' data-toggle='modal' data-target='#myModal' onclick='detailreparasi(\""+toko_id+"\");ratingers(this.id);ratingtampil10();r();' id='"+toko_id+"'></a></td>><td><a role='button' title='tracking' class='btn btn-default fa fa-car' value='Route' onclick='callRoute(centerLokasi, \""+centerBaru+"\");rutetampil();'></a></td></tr>");
            }
            }

            function ratingwaw(id10)
            {
              $("#butrating").show();
              $("#att2").show();
              $("#att1").hide();
              $("#radiuss").hide();
              $("#att1").hide();
              $("#att2").show();
              butrating
              console.log("ohouuu")

  $("#infoo").hide();
  $("#radiuss").hide();
   $("#ratings").show();
   //$("#ratings").append('<input type="text" class="form-control hidden" id="toko_id" name="toko_id" value='+toko_id+'>');
     var id10= document.getElementById('toko_id').value;
    console.log("ini "+gid);
  $.ajax({ url: server+'review.php?id='+id10, data: "", dataType: 'json', success: function(rows){
    for (var i in rows){
      var row = rows[i];
      var pengguna = row.pengguna;
      var komen = row.komentar;
      var time = row.time.split(" ");
      var rating = row.rating,
      rounded = (rating | 0),
      str;
      for (var j = 0; j < 5; j++){
        str = '<i class="fa ';
        if (j < rounded){ str += "fa-star"; }
        else { str += "fa-star-o"; }
        str += '" aria-hidden="true"></i>';
        $("#isi-r").append(str);
      }
      $("#isi-r").append('<br>'+time[0]+' oleh <b>'+pengguna+'</b><br>'+komen+'<br><hr>');
    }
  }});
  $('#det-r').prepend("<button id='backreview' class='btn btn-default btn-xs' onclick='closereview();' style='width:25%;float:right;'><i class='fa fa-chevron-left'></i> Kembali</button>");
  $("#gidr").val(gid);
   
   var gt= document.getElementById('gidr').value;
   console.log("ko nyi"+gt);
  $('#kembali-l,#det-a').css('display','none');
  //$('#det-r').css('display','block');
  }

  function btnaddreview(){
  var gid = gidr.value;
  var pengguna = user.value;
  var rating = rateid.value;
  var komen = komentar.value;
  var now = new Date(); 
  var tgl = now.getDate();
  var bln = now.getMonth();
  var thn = now.getFullYear();
  var time = thn+'/'+bln+'/'+tgl;

  console.log(gid);
  console.log(pengguna);
  console.log(rating);
  console.log(komen);
  console.log(now);
  console.log(tgl);
  console.log(bln);
  console.log(thn);
  console.log(time);
  if(pengguna=='' || rating=='' || komen==''){
    alert("Lengkapi!");
    }else{
    $.ajax({ url: server+'addreview.php?gid='+gid+'&pengguna='+pengguna+'&rating='+rating+'&komentar='+komen, dataType: 'json', success: function(rows){
      for (var i in rows){
        var row = rows[i];
        var error = row.error;
        if (error=='true'){
          alert('Nama pengguna telah digunakan');
        }else{
          alert('terima kasih telah memberi rate');
          $('.star2').removeClass('star-checked');
          $("#rateid,#user,#komentar").val('');
          for (var j = 0; j < 5; j++){
            str = '<i class="fa ';
            if (j < rating) {str += "fa-star";}
            else {str += "fa-star-o";}
            str += '" aria-hidden="true"></i>';
            $("#your-r").append(str);
          }
          $("#your-r").append('<br>'+time+' oleh <b>'+pengguna+'</b><br>'+komen+'<br><hr>');
          $(".rating").empty();
          tampilrating(gid);
        }
      }
    }});
  }
            }

function tempatTampil() //tampil digitasi tempat ibadah
    {
            ti = new google.maps.Data();
            ti.loadGeoJson(server+'reparasi.php');
            ti.setStyle(function(feature){
            return({
                    fillColor: '#68dff0',
                    strokeColor: '#68dff0',
                    strokeWeight: 1,
                    fillOpacity: 0.6
                   });          
              });
            ti.setMap(map);
   }
function hapusMarkerTerdekat() {
          for (var i = 0; i < markersDua.length; i++) {
                markersDua[i].setMap(null);
            }
        }



function hapusposisi() {
  for (var i=0 ; i< markers.length; i++){
    markers[i].setMap(null);
  }
  markers = [];
}

function aktifkanGeolocation(){ //posisi saat ini
            navigator.geolocation.getCurrentPosition(function(position) {
             hapusMarkerInfowindow();
             hapusInfo();
              pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude

              };console.log(pos.lat);
                marker = new google.maps.Marker({
              position: pos,
              map: map,
              animation: google.maps.Animation.DROP,
              });
              centerLokasi = new google.maps.LatLng(pos.lat, pos.lng);
              markers.push(marker);
              infowindow = new google.maps.InfoWindow({
              position: pos,
              content: "<a style='color:black;'>Kamu Lagi Disini</a> "
              });
              infowindow.open(map, marker);
              map.setCenter(pos);
            });   
}

function hapusMarkerInfowindow(){
         setMapOnAll(null);
         hapusMarkerTerdekat();
         pos = 'null';
    }
function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
        }
    }

function hapusInfo() {
        for (var i = 0; i < infoDua.length; i++) {
              infoDua[i].setMap(null);
              }
      }


function manualLocation(){ //posisi manual
  hapusRadius();
  alert('Klik Peta');
  map.addListener('click', function(event) {
    addMarker(event.latLng);
    });
  }
  

function addMarker(location){
    hapusposisi();
    marker = new google.maps.Marker({
      position : location,
      map: map,
      animation: google.maps.Animation.DROP,
      });
    pos = {
      lat: location.lat(), lng: location.lng()
    }
    centerLokasi = new google.maps.LatLng(pos.lat, pos.lng);
    markers.push(marker);
    infowindow = new google.maps.InfoWindow();
    infowindow.setContent('Posisi Sekarang');
    infowindow.open(map, marker);
    usegeolocation=true;
    google.maps.event.clearListeners(map, 'click');
    console.log(pos);

}

function tampilsemua(){ //menampilkan semua toko reparasi

  $.ajax({ url: server+'caritempat.php', data: "", dataType: 'json', success: function (rows){
    cari_tempat(rows);
    tempatTampil();
  }});
  var infowindow = new google.maps.InfoWindow({
    content: "tessss"
  });

  var marker = new google.maps.Marker({
    position: uluru,
    map: map,
    title: 'Uluru (Ayers Rock)'
  });
  marker.addListener('click', function() {
    infowindow.open(map, marker);
  });
}

function detailreparasi(id1){  //menampilkan informasi toko reparasi
	
	$("#info tr").remove(); 
    hapusInfo();
      clearroute2();
      hapusMarkerTerdekat();
       $.ajax({ 
      url: server+'detailreparasi.php?cari='+id1, data: "", dataType: 'json', success: function(rows)
        { 
          console.log(id1);
         for (var i in rows) 
          { 

            console.log('dd');
            var row = rows[i];
            var toko_id = row.toko_id;
            var nama_toko_repair = row.nama_toko_repair;
            var alamat=row.alamat;
            var no_telepon=row.no_telepon;
            var deskripsi=row.deskripsi;
            var foto = row.foto;
            var pemilik = row.pemilik;
            jam_buka = row.jam_buka,b = jam_buka.slice(0,-3),
            jam_tutup = row.jam_tutup,t = jam_tutup.slice(0,-3);
            if (b == '00:00' && t == '00:00'){
            b='',t='';
            }
            var hari = row.hari;
            var latitude  = row.latitude; 
            var longitude = row.longitude ;
            now = new Date(),strnow = Date.parse(now),
            tgl = now.getDate(),bln = now.getMonth(),thn = now.getFullYear();
            bkh = jam_buka.split(":");
            v_bkh = new Date(thn, bln, tgl, bkh[0], bkh[1], bkh[2]);
            var strbuka = Date.parse(v_bkh);
            ttph = jam_tutup.split(":");
            v_ttph = new Date(thn, bln, tgl, ttph[0], ttph[1], ttph[2]);
            var strtutup = Date.parse(v_ttph);
            if(strnow >= strbuka && strnow <= strtutup){
            var stat = 'Buka';
            var warna = 'Blue';
            }else{
            var stat = 'Tutup';
            var warna = 'Red';
            }
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'ico/commercial-places.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
            map.setCenter(centerBaru);
            map.setZoom(18); 
			document.getElementById('titleI').innerHTML = nama_toko_repair;
            $('#info').append("<tr><td><b>Nama</b></td><td>:</td><td> "+nama_toko_repair+"</td></tr><tr><td><b>Pemilik</b></td><td>:</td><td> "+pemilik+"</td></tr><tr><td><b> Alamat </b></td><td>:</td><td> "+alamat+"</td></tr><tr><td><b>No Telepon</b></td><td>:</td><td>"+no_telepon+"</td></tr><tr><td><b>Deskripsi</b></td><td>:</td><td> "+deskripsi+"</td><tr onclick='togglejam()' style='cursor:pointer;'><td><b>Jam Kerja</b></td><td>:</td><td><span id='jam1' style='display:block;'>"+hari+" "+b+" - "+t+"<span style='color:"+warna+";'> ("+stat+")</span></span><span id='jam2' style='display:none;'></span></td></tr><tr><td><b>Layanan<b></td><td>:</td><td><ul style='padding-left:20px;' id='layanan'></ul></td></tr><tr><td><b>produk<b></td><td>:</td><td><ul style='padding-left:20px;' id='produk'></ul></td></tr><tr><td><b>merek<b></td><td>:</td><td><ul style='padding-left:20px;' id='merek'></ul></td></tr>")
            infowindow = new google.maps.InfoWindow({
            position: centerBaru,
            content: "<span style=color:black><center><b>Informasi</b><br><img src='"+fotosrc+foto+"' alt='image in infowindow' height='150' width='150'></center><br><i class='fa fa-home'></i> "+nama_toko_repair+"<br><i class='fa fa-phone'></i> "+no_telepon+"<br><i class='fa fa-map-marker'></i> "+alamat+"<br><i class='fa fa-navicon'></i> "+deskripsi+"<br></span>",
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoDua.push(infowindow); 
          hapusInfo();
          infowindow.open(map);
          tampiljam(toko_id,stat,warna);
          tampillayanan(toko_id);
          tampilproduk(toko_id)
          tampilmerek(toko_id)
          tampilrating(toko_id);
            
          }  
           

        }
      }); 
}

function detailreparasirating(id2){  //menampilkan informasi 
  
  $('#your-r').innerHTML = "";
  $('#isi-r').innerHTML = "";
  $('#your-r').empty();
  $('#isi-r').empty();
  $('#info').empty();
   hapusInfo();
      clearroute2();
      hapusMarkerTerdekat();
       $.ajax({ 
      url: server+'detailreparasi.php?cari='+id2, data: "", dataType: 'json', success: function(rows)
        { 
          console.log(id2);
         for (var i in rows) 
          { 

            console.log('dd');
            var row = rows[i];
            var toko_id = row.toko_id;
            var nama_toko_repair = row.nama_toko_repair;
            var alamat=row.alamat;
            var no_telepon=row.no_telepon;
            var deskripsi=row.deskripsi;
            var foto = row.foto;
            var pemilik = row.pemilik;
            jam_buka = row.jam_buka,b = jam_buka.slice(0,-3),
            jam_tutup = row.jam_tutup,t = jam_tutup.slice(0,-3);
            if (b == '00:00' && t == '00:00'){
            b='',t='';
            }
            var hari = row.hari;
            var latitude  = row.latitude; 
            var longitude = row.longitude ;
            now = new Date(),strnow = Date.parse(now),
            tgl = now.getDate(),bln = now.getMonth(),thn = now.getFullYear();
            bkh = jam_buka.split(":");
            v_bkh = new Date(thn, bln, tgl, bkh[0], bkh[1], bkh[2]);
            var strbuka = Date.parse(v_bkh);
            ttph = jam_tutup.split(":");
            v_ttph = new Date(thn, bln, tgl, ttph[0], ttph[1], ttph[2]);
            var strtutup = Date.parse(v_ttph);
            if(strnow >= strbuka && strnow <= strtutup){
            var stat = 'Buka';
            var warna = 'Blue';
            }else{
            var stat = 'Tutup';
            var warna = 'Red';
            }
            centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
            marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'ico/commercial-places.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);

            map.setCenter(centerBaru);
            map.setZoom(18); 
            $('#info').append("<tr><td><b>Nama</b></td><td>:</td><td> "+nama_toko_repair+"</td></tr><tr><td><b>Pemilik</b></td><td>:</td><td> "+pemilik+"</td></tr><tr><td><b> Alamat </b></td><td>:</td><td> "+alamat+"</td></tr><tr><td><b>No Telepon</b></td><td>:</td><td>"+no_telepon+"</td></tr><tr><td><b>Deskripsi</b></td><td>:</td><td> "+deskripsi+"</td><tr onclick='togglejam()' style='cursor:pointer;'><td><b>Jam Kerja</b></td><td>:</td><td><span id='jam1' style='display:block;'>"+hari+" "+b+" - "+t+"<span style='color:"+warna+";'> ("+stat+")</span></span><span id='jam2' style='display:none;'></span></td></tr><tr><td><b>Layanan<b></td><td>:</td><td><ul style='padding-left:20px;' id='layanan'></ul></td></tr><tr><td><b>produk<b></td><td>:</td><td><ul style='padding-left:20px;' id='produk'></ul></td></tr><tr><td><b>merek<b></td><td>:</td><td><ul style='padding-left:20px;' id='merek'></ul></td></tr><tr><td><div class='rating'></div><a class='btn btn-default' role=button' data-toggle='collapse' href='' onclick='ratingers(this.id)' id='"+toko_id+"' title='Rating' aria-controls='Rating'><i class='fa fa-star' style='color:black;''></i><label>&nbsp Rating</label></a></td></tr>")
            infowindow = new google.maps.InfoWindow({
            position: centerBaru,
            content: "<span style=color:black><center><b>Informasi</b><br><img src='"+fotosrc+foto+"' alt='image in infowindow' width='150'></center><br><i class='fa fa-home'></i> "+nama_toko_repair+"<br><i class='fa fa-phone'></i> "+no_telepon+"<br><i class='fa fa-map-marker'></i> "+alamat+"<br><i class='fa fa-navicon'></i> "+deskripsi+"<br></span>",
            pixelOffset: new google.maps.Size(0, -33)
            });
          infoDua.push(infowindow); 
          hapusInfo();
          infowindow.open(map);
          tampiljam(toko_id,stat,warna);
          tampillayanan(toko_id);
          tampilproduk(toko_id)
          tampilmerek(toko_id)
          tampilrating(toko_id);
            
          }  
           

        }
      }); 
}

 function callRoute(start, end) {
  clearroute2();
 
//   alert(start);
//   alert(end);
   aend=end.toString();
   bend=aend.split('(').join('');
   cend=bend.split(')').join('');
//   alert(cend);
  console.log('tes');
      if (pos == 'null' || typeof(pos) == "undefined"){
    alert ('Please click button current position or button manual position first');
    }
    else
    {
		directionsService = new google.maps.DirectionsService;
		directionsDisplay = new google.maps.DirectionsRenderer;
		directionsService.route
      (
        {
            origin: start,
            destination: cend,
            travelMode: google.maps.TravelMode.DRIVING
        }, 
        function(response, status) 
        {
            if (status === google.maps.DirectionsStatus.OK) 
            {
              directionsDisplay.setDirections(response);
            } 
            else 
            {
              window.alert('Directions request failed due to ' + status);
            }
          }
      );
      directionsDisplay.setMap(map);
      map.setZoom(16);
      $('#detailrute').empty();
	  document.getElementById("routeShows").style.display = "block";
      directionsDisplay.setPanel(document.getElementById('detailrute'));
    }
 }
 function aktifkanRadius(){ //fungsi radius
    if (pos == 'null'){
    alert ('Klik tombol posisi saya terlebih dahulu');
    }
    else {
    hapusRadius();
    var inputradius=document.getElementById("inputradius").value;
  console.log(inputradius);
    var circle = new google.maps.Circle({
      center: pos,
      radius: parseFloat(inputradius*1000),      
      map: map,
      strokeColor: "red",
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: "red",
      fillOpacity: 0.35
      });        
      map.setZoom(12);       
      map.setCenter(pos);
      circles.push(circle);     
    }   
    cekRadiusStatus = 'on';
    reparasiradius();
  }
   function reparasiradius(){ //menampilkan reparasi berdasarkan radius
   
    $('#hasilcari1').show();
    $('#hasilcari').empty();
      hapusInfo();
      clearroute2();
      hapusMarkerTerdekat();
      cekRadius();

        $.ajax({ 
        url: server+'reparasiradius.php?lat='+pos.lat+'&lng='+pos.lng+'&rad='+rad, data: "", dataType: 'json', success: function(rows)
        {
            console.log("hy");
            for (var i in rows) 
            {   
              var row     = rows[i];
              var toko_id   = row.toko_id;
              var nama_toko_repair   = row.nama_toko_repair;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
              centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'ico/commercial-places.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
              map.setCenter(centerBaru);
              map.setZoom(10);
              tempatTampil();
              $('#hasilcari').append("<tr class='danger'><td>"+nama_toko_repair+"</td><td><a role='button' title='info' class='btn btn-default fa fa-info resultsearchok' onclick='detailreparasi(\""+toko_id+"\");info1();'></a></td><td><a role='button' title='tracking' class='btn btn-default fa fa-car' value='Route' onclick='callRoute(centerLokasi, \""+centerBaru+"\");rutetampil();'></a></td></tr>");
            } 
            }    
          });
}
  function caritpkec() //fungsi cari toko reparasi berdasarkan kecamatan
  {
     $('#hasilcari1').show();
     $('#hasilcari').empty();

    var kec=document.getElementById('kecamatan').value;
    console.log(kec);
    $('#hasilcari1').show();
   //s $('#hasilcari').empty();
      hapusInfo();
      clearroute2();
      hapusMarkerTerdekat();

    //var kecamatan= kec.value;
    $.ajax({ 
        url: server+'kecamatan_tp.php?kecamatan='+kec, data: "", dataType: 'json', success: function(rows)
          { 
            if(rows==null)
            {
              alert('Data Tidak Ditemukan');
            }
          for (var i in rows) 
            {   
              var row     = rows[i];
              var toko_id   = row.toko_id;
              var nama_toko_repair   = row.nama_toko_repair;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
              centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'ico/commercial-places.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              console.log(nama_toko_repair);
              markersDua.push(marker);
              map.setCenter(centerBaru);
              tempatTampil();
              map.setZoom(10);
             $('#hasilcari').append("<tr class='danger'><td>"+nama_toko_repair+"</td><td><a role='button' title='info' class='btn btn-default fa fa-info resultsearchok' data-toggle='modal' data-target='#myModal' onclick='detailreparasi(\""+toko_id+"\");ratingers(this.id);ratingtampil10();' id='"+toko_id+"'></a></td>><td><a role='button' title='tracking' class='btn btn-default fa fa-car' value='Route' onclick='callRoute(centerLokasi, \""+centerBaru+"\");rutetampil();'></a></td></tr>");		
            } 
           
          }
        }); 
  }

    function caritpkec1() //fungsi cari toko reparasi berdasarkan kecamatan
  {
    var kec=document.getElementById('kecamatan1').value;
    $('#hasilcari1').show();
    $('#hasilcari').empty();
      hapusInfo();
      clearroute2();
      hapusMarkerTerdekat();

    //var kecamatan= kec.value;
    $.ajax({ 
        url: server+'kecamatan_tp.php?kecamatan='+kec, data: "", dataType: 'json', success: function(rows)
          { 
            if(rows==null)
            {
              alert('Data Tidak Ditemukan');
            }
          for (var i in rows) 
            {   
              var row     = rows[i];
              var toko_id   = row.toko_id;
              var nama_toko_repair   = row.nama_toko_repair;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
              centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'ico/commercial-places.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              console.log(latitude);
              console.log(longitude);
              markersDua.push(marker);
              map.setCenter(centerBaru);
              tempatTampil();
              map.setZoom(10);
             $('#hasilcari').append("<tr class='danger'><td>"+nama_toko_repair+"</td><td><a role='button' title='info' class='btn btn-default fa fa-info resultsearchok' onclick='detailreparasi(\""+toko_id+"\");info1();'></a></td><td><a role='button' title='tracking' class='btn btn-default fa fa-car' value='Route' onclick='callRoute(centerLokasi, \""+centerBaru+"\");rutetampil();'></a></td></tr>");
            } 
           
          }
        }); 
  }
function cariall() //fungsi cari toko reparasi berdasarkan alat elektronik
  { 
    $('#hasilcari1').show();
    $('#hasilcari').empty();
      console.log('haii');
      var prod = document.getElementById('produk').value;
      var merk = document.getElementById('merek').value;
      var layan = document.getElementById('layanan').value;
      console.log(prod);
      console.log(merk);
      console.log(layan);
      console.log(server+'elek.php?produk='+prod+'&merek='+merk+'&layanan='+layan);
      $.ajax({ 
        url: server+'elek.php?produk='+prod+'&merek='+merk+'&layanan='+layan, data: "", dataType: 'json', success: function(rows)
          { 
            if(rows==null)
            {
              alert('Data Tidak Ditemukan');
            }
          for (var i in rows) 
            {   
              var row     = rows[i];
              var toko_id   = row.toko_id;
              var nama_toko_repair   = row.nama_toko_repair;
              var latitude  = row.latitude ;
              var longitude = row.longitude ;
              centerBaru = new google.maps.LatLng(latitude, longitude);
              marker = new google.maps.Marker
            ({
              position: centerBaru,
              icon:'ico/commercial-places.png',
              map: map,
              animation: google.maps.Animation.DROP,
            });
              //console.log(latitude);
              //carconsole.log(longitude);
              markersDua.push(marker);
              map.setCenter(centerBaru);
              tempatTampil();
              map.setZoom(10);
             $('#hasilcari').append("<tr class='danger'><td>"+nama_toko_repair+"</td><td><a role='button' title='info' class='btn btn-default fa fa-info resultsearchok' data-toggle='modal' data-target='#myModal' onclick='detailreparasi(\""+toko_id+"\");ratingers(this.id);ratingtampil10();' id='"+toko_id+"'></a></td>><td><a role='button' title='tracking' class='btn btn-default fa fa-car' value='Route' onclick='callRoute(centerLokasi, \""+centerBaru+"\");rutetampil();'></a></td></tr>");						 			 
            } 
           
          }   
        });
  }
 
function cekRadius(){
          rad = inputradius.value*1000;
          console.log(rad);
          }

function clearroute2(){      
    if(typeof(directionsDisplay) != "undefined" && directionsDisplay.getMap() != undefined){
    directionsDisplay.setMap(null);
    $("#rute").remove();
    }     

}
function clearrating(){      
    $("#butrating").remove();
     //$("#butrating").empty();
}

function clearroute(){
  for (i in rute) {
    rute[i].setMap(null);
  }
  rute=[];
}

  function hapusRadius(){
  for(var i=0;i<circles.length;i++)
               {
                   circles[i].setMap(null);
               }
    circles=[];
  cekRadiusStatus = 'off';
  }

 function rutetampil(){
  
  $("#att2").show();
  $("#att1").hide();
  $("#radiuss").hide();
  //document.getElementById("routeShows").style.display = "block";
}

function endRoute(){
	$("#detailrute").innerHTML = "";
	document.getElementById("routeShows").style.display = "none";
	clearroute();
}

 function ratingtampil10(){
   //$("#butrating").show();
  //$("#att2").show();
  //$("#att1").hide();
  $("#radiuss").hide();

}

function ratingtampil(){
   //$("#butrute").show();
  //$("#att2").show();
  //$("#att1").hide();
  $("#radiuss").hide();
  //$("#att1").hide();
  //$("#att2").show();
 
  
}

function resultt(){
  $("#result").show();
  $("#eventt").hide();
  $("#infoo").hide();
  //$("#att1").hide();
  $("#hide2").show();
  $("#showlist").hide();
  $("#radiuss").hide();
}

//fungsi cari toko reparasi berdasarkan rute
function btncarirate(){
  if(ratecari.value==''){
    alert("Pilih rating!");
    }
    else{
    refresh();
    $.ajax({ url: server+'carirate.php?rate='+ratecari.value, data: "", dataType: 'json', success: function (rows){
      loaddata(rows);
    }});
  }
}

function loaddata(rows){
  if(rows==null){
    alert('Data Tidak Ada');
  }
  else{
    if ($('#sidebar').hasClass('results-collapsed')){
      $('#sidebar').removeClass("results-collapsed");
      $('.map-canvas .map').one("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function(){
        google.maps.event.trigger(map, 'resize');
      });
    }
    for (var i in rows){
      var row=rows[i],
      toko_id=row.toko_id,
      nama_toko_repair=row.nama_bengkel,
      deskripsi=row.deskripsi,
      alamat=row.alamat,
      no_telepon=row.no_telepon,
      jam_buka=row.jam_buka,
      jam_tutup=row.jam_tutup;
      b=row.jam_buka.slice(0,-3),
      jam_tutup=row.jam_tutup,
      t=row.jam_tutup.slice(0,-3);
      console.log(b);
      console.log(t);
      if (b == '00:00' && t == '00:00'){
        b='',t='';
      }
      latitude=row.latitude,
      longitude=row.longitude;
       centerBaru = new google.maps.LatLng(latitude, longitude);
      marker=new google.maps.Marker
      ({
        position: centerBaru,
              icon:'ico/commercial-places.png',
              map: map,
              animation: google.maps.Animation.DROP,
      });
     markersDua.push(marker);
     map.setCenter(centerBaru);
     tempatTampil();
      map.setZoom(10);
      var now = new Date(),
      strnow = Date.parse(now),
      tgl = now.getDate(),
      bln = now.getMonth(),
      thn = now.getFullYear();
      bkh = jam_buka.split(":");
      v_bkh = new Date(thn, bln, tgl, bkh[0], bkh[1], bkh[2]);
      var strbuka = Date.parse(v_bkh);
      ttph = jam_tutup.split(":");
      v_ttph = new Date(thn, bln, tgl, ttph[0], ttph[1], ttph[2]);
      var strtutup = Date.parse(v_ttph);
      if(strnow >= strbuka && strnow <= strtutup){
        var stat = 'Buka';
        var warna = 'Blue';
      } else {
        var stat = 'Tutup';
        var warna = 'Red';
      }
       $('#hasilcari').append("<tr class='danger'><td><strong>"+row.nama_toko_repair+"</strong><br> "+deskripsi+"<br>"+no_telepon+"<br><p style='color:"+warna+";'>"+b+" - "+t+" ("+stat+")</p></td><td><a role='button' title='info' class='btn btn-default fa fa-info resultsearchok' data-toggle='modal' data-target='#myModal' onclick='detailreparasi(\""+toko_id+"\");ratingers(this.id);ratingtampil10();' id='"+toko_id+"'></a></td>><td><a role='button' title='tracking' class='btn btn-default fa fa-car' value='Route' onclick='callRoute(centerLokasi, \""+centerBaru+"\");rutetampil();'></a></td></tr>");	   
    }
  }
}

function loaddata1(rows){
  if(rows==null){
    alert('Data Tidak Ada');
  }
  else{
    if ($('#sidebar').hasClass('results-collapsed')){
      $('#sidebar').removeClass("results-collapsed");
      $('.map-canvas .map').one("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function(){
        google.maps.event.trigger(map, 'resize');
      });
    }
    for (var i in rows){
      var row=rows[i],
      toko_id=row.toko_id,
      nama_toko_repair=row.nama_bengkel,
      deskripsi=row.deskripsi,
      alamat=row.alamat,
      no_telepon=row.no_telepon,
      jam_buka=row.jam_buka,
      jam_tutup=row.jam_tutup;
      b=row.jam_buka.slice(0,-3),
      jam_tutup=row.jam_tutup,
      t=row.jam_tutup.slice(0,-3);
      console.log(b);
      console.log(t);
      if (b == '00:00' && t == '00:00'){
        b='',t='';
      }
      latitude=row.latitude,
      longitude=row.longitude;
      
       centerBaru = new google.maps.LatLng(latitude, longitude);
      marker=new google.maps.Marker
      ({
        position: centerBaru,
              icon:'ico/commercial-places.png',
              map: map,
              animation: google.maps.Animation.DROP,
      });
     markersDua.push(marker);
     map.setCenter(centerBaru);
     tempatTampil();
      map.setZoom(10);
      var now = new Date(),
      strnow = Date.parse(now),
      tgl = now.getDate(),
      bln = now.getMonth(),
      thn = now.getFullYear();
      bkh = jam_buka.split(":");
      v_bkh = new Date(thn, bln, tgl, bkh[0], bkh[1], bkh[2]);
      var strbuka = Date.parse(v_bkh);
      ttph = jam_tutup.split(":");
      v_ttph = new Date(thn, bln, tgl, ttph[0], ttph[1], ttph[2]);
      var strtutup = Date.parse(v_ttph);
      if(strnow >= strbuka && strnow <= strtutup){
        var stat = 'Buka';
        var warna = 'Blue';
      } else {
        var stat = 'Tutup';
        var warna = 'Red';
      }
       $('#hasilcari').append("<tr class='danger'><td><strong>"+row.nama_toko_repair+"</strong><br> "+deskripsi+"<br>"+no_telepon+"<br><p style='color:"+warna+";'>"+b+" - "+t+" ("+stat+")</p></td><td><a role='button' title='info' class='btn btn-default fa fa-info resultsearchok' data-toggle='modal' data-target='#myModal' onclick='detailreparasi(\""+toko_id+"\");ratingers(this.id);ratingtampil10();' id='"+toko_id+"'></a></td>><td><a role='button' title='tracking' class='btn btn-default fa fa-car' value='Route' onclick='callRoute(centerLokasi, \""+centerBaru+"\");rutetampil();'></a></td></tr>");
    }
  }
  console.log("test");
  console.log(centerBaru[i]);
}


function refresh(){
  //$('#kembali-l,#backreview,#backrute, #butrating').remove();
  $('#list-a,#foto,#isi,#isi-r,#your-r').innerHTML = "";
  $('#det-a,#detrute').css('display','none');
  $('#list-a').css('display','block');
  $('#hasilcari1').show();
  $('#hasilcari').empty();
      hapusInfo();
      clearroute2();
      hapusMarkerTerdekat();
}

function tampilrating(id){
  $(".rating").append("<b>Rating</b> : ");
  $.ajax({ url: server+'ratinga.php?id='+id, data: "", dataType: 'json', success: function(rows){
  for (var i in rows){
    var row = rows[i];
    var review = row.review;
    var rating = parseFloat(row.rating).toFixed(1), rounded = (rating | 0), str;
    for (var j = 0; j < 5; j++){
      str = '<i class="fa ';
      if (j < rounded){ str += "fa-star"; }
      else if ((rating - j) > 0 && (rating - j) < 1){ str += "fa-star-half-o"; }
      else { str += "fa-star-o"; }
      str += '" aria-hidden="true"></i>';
      $(".rating").append(str);
    }
    if (rating=="NaN"){
      $(".rating").append(" Belum ada rating<br><div id='isir'><b>Review</b> : <a href='#' id='"+id+"' onclick='ratingers(this.id)'>0 review | Semua Review</a></div>");
    } else {
      $(".rating").append(" "+rating+"<br><div id='isir'><b>Review</b> : <a href='#' id='"+id+"' onclick='ratingers(this.id)'>"+review+" review | Semua Review</a></div>");
    }
  }}});
}

function tampilreview(id){
  var gid = id.split("_");
  $.ajax({ url: server+'review.php?id='+gid[1], data: "", dataType: 'json', success: function(rows){
    for (var i in rows){
      var row = rows[i];
      var pengguna = row.pengguna;
      var komen = row.komentar;
      var time = row.time.split(" ");
      var rating = row.rating,
      rounded = (rating | 0),
      str;
      for (var j = 0; j < 5; j++){
        str = '<i class="fa ';
        if (j < rounded){ str += "fa-star"; }
        else { str += "fa-star-o"; }
        str += '" aria-hidden="true"></i>';
        $("#isi-r").append(str);
      }
      $("#isi-r").append('<br>'+time[0]+' oleh <b>'+pengguna+'</b><br>'+komen+'<br><hr>');
    }
  }});
  // $('#det-r').prepend("<button id='backreview' class='btn btn-default btn-xs' onclick='closereview();' style='width:25%;float:right;'><i class='fa fa-chevron-left'></i> Kembali</button>");
  // $("#gidr").val(gid[1]);
  // $('#kembali-l,#det-a').css('display','none');
  // $('#det-r').css('display','block');
}

function info1(){
  $("#infoo").show();
  $("#radiuss").hide();
 //$("#ratings").hide()
  }

function ratingers(toko_id){
  /*alert("gg");
  $('#ratings').empty();
    $( "#backreview" ).remove();
  
 $( "#backreview" ).hide();*/
 $( "#isi-r" ).empty();
 $( "#your-r" ).empty();
 
  hapusInfo();
  clearroute2();
  $("#infoo").hide();
  $("#radiuss").hide();

    $('#detailrute').empty();
  //$('#ratings').empty();
   hapusInfo();
   //$("#ratings").append('<input type="text" class="form-control hidden" id="toko_id" name="toko_id" value='+toko_id+'>');
   var gid = toko_id.split("_");
    console.log("ini "+gid);
  $.ajax({ url: server+'review.php?id='+gid, data: "", dataType: 'json', success: function(rows){
    for (var i in rows){
      var row = rows[i];
      var pengguna = row.pengguna;
      var komen = row.komentar;
      var time = row.time.split(" ");
      var rating = row.rating,
      rounded = (rating | 0),
      str;
      for (var j = 0; j < 5; j++){
        str = '<i class="fa ';
        if (j < rounded){ str += "fa-star"; }
        else { str += "fa-star-o"; }
        str += '" aria-hidden="true"></i>';
        $("#isi-r").append(str);
      }
      $("#isi-r").append('<br>'+time[0]+' oleh <b>'+pengguna+'</b><br>'+komen+'<br><hr>');
    }
  }});
 // $( ".backreview" ).remove();
 // $('#det-r').prepend("<button id='backreview' class='btn btn-default btn-xs' onclick='closereview();' style='width:25%;float:right;'><i class='fa fa-chevron-left'></i> Kembali</button>");
  $("#gidr").val(gid);
   
   var gt= document.getElementById('gidr').value;
   console.log("ko nyi"+gt);
  $('#kembali-l,#det-a').css('display','none');
  $('#det-r').css('display','block');
  }

  function btnaddreview(){
  var gid = gidr.value;
  var pengguna = user.value;
  var rating = rateid.value;
  var komen = komentar.value;
  var now = new Date(); 
  var tgl = now.getDate();
  var bln = now.getMonth();
  var thn = now.getFullYear();
  var time = thn+'/'+bln+'/'+tgl;

  console.log(gid);
  console.log(pengguna);
  console.log(rating);
  console.log(komen);
  console.log(now);
  console.log(tgl);
  console.log(bln);
  console.log(thn);
  console.log(time);
  if(pengguna=='' || rating=='' || komen==''){
    alert("Lengkapi!");
    }else{
    $.ajax({ url: server+'addreview.php?gid='+gid+'&pengguna='+pengguna+'&rating='+rating+'&komentar='+komen, dataType: 'json', success: function(rows){
      for (var i in rows){
        var row = rows[i];
        var error = row.error;
        if (error=='true'){
          alert('Nama pengguna telah digunakan');
        }else{
          alert('terima kasih telah memberi rate');
          $('.star2').removeClass('star-checked');
          $("#rateid,#user,#komentar").val('');
          for (var j = 0; j < 5; j++){
            str = '<i class="fa ';
            if (j < rating) {str += "fa-star";}
            else {str += "fa-star-o";}
            str += '" aria-hidden="true"></i>';
            $("#your-r").append(str);
          }
          $("#your-r").append('<br>'+time+' olehh <b>'+pengguna+'</b><br>'+komen+'<br><hr>');
          $(".rating").empty();
          tampilrating(gid);
        }
      }
    }});
  }
}

function closereview(){
  //$('#backreview').remove();
  //$('#det-r').css('display','none');
  $('#isi-r, #your-r').empty();
  $('#det-a, #kembali-l').css('display','block');
  $("#infoo").show();
}

//menampilkan layanan detail pada list detail
function tampillayanan(id3){
  $.ajax({ url: server+'layanan.php?toko_id='+id3, data: "", dataType: 'json', success: function(rows){
    if(rows==null){
      $('#layanan').append("tidak ada");
    }
    for (var i in rows){
      var row     = rows[i];
      var nama_layananan = row.nama_layananan;
      $('#layanan').append("<li>"+nama_layananan+"</li>");
    }
  }});
}

function tampilproduk(id4){
  $.ajax({ url: server+'produk.php?toko_id='+id4, data: "", dataType: 'json', success: function(rows){
    if(rows==null){
      $('#produk').append("Tidak ada");
    }
    for (var i in rows){
      var row     = rows[i];
      var nama_elektronik = row.nama_elektronik;
      $('#produk').append("<li>"+nama_elektronik+"</li>");
    }
  }});
}
function tampilmerek(id5){
  $.ajax({ url: server+'merek.php?toko_id='+id5, data: "", dataType: 'json', success: function(rows){
    if(rows==null){
      $('#merek').append("tidak ada");
    }
    for (var i in rows){
      var row     = rows[i];
      var nama_merek = row.nama_merek;
      $('#merek').append("<li>"+nama_merek+"</li>");
    }
  }});
}
function togglejam(){
  if($('#jam2').css('display') == 'none'){
    $('#jam1').css('display','none');
    $('#jam2').css('display','block');
  }else{
    $('#jam2').css('display','none');
    $('#jam1').css('display','block');
  }
}

function tampiljam(toko_id,stat,warna){
  $.ajax({ url: server+'jam.php?toko_id='+toko_id, data: "", dataType: 'json', success: function(rows){
    for (var i in rows){
      var row     = rows[i];
      var hari_id = row.hari_id;
      var hari = row.hari;
      var b = row.jam_buka.slice(0,-3);
      var t = row.jam_tutup.slice(0,-3);
      if (b == '00:00' && t == '00:00'){
        b='',t='';
      }
      var d = new Date();
      var n = d.getDay();
      if (hari_id==n){
        $('#jam2').append("<b><span style='display:inline-block;width:55px;'>"+hari+"</span> "+b+" - "+t+"</b><span style='color:"+warna+";'> ("+stat+")</span><br>");
      }else{
        $('#jam2').append("<span style='display:inline-block;width:55px;'>"+hari+"</span> "+b+" - "+t+"<br>");
      }
    }
  }});
}
//fungsi cari toko reparasi berdasarkan jadwal operasional
function btncarijam(){
  if(jamcari.value==''){
    alert("Isi jam!");
    }
    else{
    refresh();
    $.ajax({ url: server+'carijam.php?jam='+jamcari.value, data: "", dataType: 'json', success: function (rows){
      loaddata1(rows);
    }});
  }
}

function resultt(){
  $("#hide2").show();
  $("#result").show();
  $("#home").hide();
   $("#showlist").hide();
 
}

function home(){
  $("#hide2").hide();
  $("#result").hide();
  $("#home").show();
  $("#showlist").hide();
}

function reset(){
  $("#hasilcari1").hide();
  $("#att2").hide();
  $("#showlist").hide();
}

function list(){
  $("#result").hide();
  $("#eventt").hide();
  $("#home").hide();
  $("#infoo").hide();
  $("#att1").hide();
  $("#hide2").hide();
  $("#showlist").show();
  $("#radiuss").hide();
}