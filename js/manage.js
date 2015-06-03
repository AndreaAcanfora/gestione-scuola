/* Reindirizza ad una pagina */
function goTo(link){
    window.location.href = link;
}

/* Chiede la conferma di eliminazione */
function deleteStud(id_studente,img){
    if (confirm("Sicuro?")) 
        window.location.href = 'deleteUser.php?id='+id_studente+"&img="+img;
}

/* Reindirizza alla pagina di modifica con i campi precompilati dello studente selezionato */
function modifStud(id,nome,cognome,classe,sezione,image){
	window.location.href = 'modifica.php?id='+id+"&nome="+nome+"&cognome="+cognome+"&classe="+classe+"&sezione="+sezione+"&image="+image;
}

function init_map(){
var myOptions = {
  zoom:17,
  center:new google.maps.LatLng(43.79596571288725,11.238123835790118),
  mapTypeId: google.maps.MapTypeId.ROADMAP, 
  scrollwheel: false
};

map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);

marker = new google.maps.Marker({
  map: map,
  position: new google.maps.LatLng(43.79596571288725, 11.238123835790118)
});

infowindow = new google.maps.InfoWindow({
  content:"<b>Leonardo da Vinci</b><br>Via del Terzolle, 91<br>50127 Firenze (FI)<br><br><i>Tel. 3905545961</i><br>"
});

google.maps.event.addListener(marker, "click", function() {
  infowindow.open(map,marker);
});

var btn = document.getElementById('returnIndex');
map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(btn);

infowindow.open(map,marker);
}
