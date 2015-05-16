$(document).ready(function() {
	$('form#container2').validate({
	rules: {
		name: {
		  required: true,
		  minlength: 2,
		  maxlength: 20
		},
		surname: {
		  required: true,
		  minlength: 2,
		  maxlength: 20
		},
		section: {
		  required: true,
		  minlength: 2,
		  maxlength: 30
		}
	},
	messages: {
		name: {
		  required: " Inserisci il nome",
		  minlength: " Devi inserire almeno 2 caratteri",
		  maxlength: " Non puoi inserire oltre 20 caratteri"
		},
		surname: {
		  required: " Inserisci il cognome",
		  minlength: " Devi inserire almeno 2 caratteri",
		  maxlength: " Non puoi inserire oltre 20 caratteri"
		},
		section: {
		  required: " Inserisci la sezione",
		  minlength: " Devi inserire almeno 2 caratteri",
		  maxlength: " Non puoi inserire oltre 30 caratteri"
		}
	},
		submitHandler: function(form) {
			form.submit();
		}
	});
	
	$('form.login').validate({
	rules: {
		name: {
		  required: true,
		  minlength: 2,
		  maxlength: 20
		},
		password: {
		  required: true,
		  minlength: 2,
		  maxlength: 20
		}
	},
	messages: {
		name: {
		  required: " Inserisci il nome",
		  minlength: " Devi inserire almeno 2 caratteri",
		  maxlength: " Non puoi inserire oltre 20 caratteri"
		},
		password: {
		  required: " Inserisci la password",
		  minlength: " Devi inserire almeno 2 caratteri",
		  maxlength: " Non puoi inserire oltre 20 caratteri"
		}
	},
		submitHandler: function(form) {
			form.submit();
		}
	});
});
