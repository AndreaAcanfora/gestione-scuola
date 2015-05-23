function goTo(link){
    window.location.href = link;
}

function deleteStud(id_studente){
    alert("Sicuro?");
    window.location.href = 'deleteUser.php?id='+id_studente;
}
function modifStud(id,nome,cognome,classe,sezione,image){
	window.location.href = 'modifica.php?id='+id+"&nome="+nome+"&cognome="+cognome+"&classe="+classe+"&sezione="+sezione+"&image="+image;
}

