/* Reindirizza ad una pagina */
function goTo(link){
    window.location.href = link;
}

/* Chiede la conferma di eliminazione */
function deleteStud(id_studente){
    if (confirm("Sicuro?")) 
        window.location.href = 'deleteUser.php?id='+id_studente;
}

/* Reindirizza alla pagina di modifica con i campi precompilati dello studente selezionato */
function modifStud(id,nome,cognome,classe,sezione,image){
	window.location.href = 'modifica.php?id='+id+"&nome="+nome+"&cognome="+cognome+"&classe="+classe+"&sezione="+sezione+"&image="+image;
}

