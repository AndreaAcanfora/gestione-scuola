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
		id: {
		  required: true,
		  minlength: 2,
		  maxlength: 20
		},
		pss: {
		  required: true,
		  minlength: 2,
		  maxlength: 20
		},
		pss2: {
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
		surname: {
		  required: " Inserisci il cognome",
		  minlength: " Devi inserire almeno 2 caratteri",
		  maxlength: " Non puoi inserire oltre 20 caratteri"
		},
		id: {
		  required: " Inserisci il nome",
		  minlength: " Devi inserire almeno 2 caratteri",
		  maxlength: " Non puoi inserire oltre 20 caratteri"
		},
		pss: {
		  required: " Inserisci la password",
		  minlength: " Devi inserire almeno 2 caratteri",
		  maxlength: " Non puoi inserire oltre 20 caratteri"
		},
		pss2: {
		  required: " Reinserisci la password",
		  minlength: " Devi inserire almeno 2 caratteri",
		  maxlength: " Non puoi inserire oltre 20 caratteri"
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
		  required:  " <div style='position:absolute; left: 50px; top:80px;'>Inserisci il nome</div>",
		  minlength: " <div style='position:absolute; left: 50px; top:80px;'>Devi inserire almeno 2 caratteri</div>",
		  maxlength: " <div style='position:absolute; left: 50px; top:80px;'>Non puoi inserire oltre 20 caratteri</div>"
		},
		password: {
		  required:  " <div style='position:absolute; left: 50px; top:80px;'>Inserisci la password</div>",
		  minlength: " <div style='position:absolute; left: 50px; top:80px;'>Devi inserire almeno 2 caratteri</div>",
		  maxlength: " <div style='position:absolute; left: 50px; top:80px;'>Non puoi inserire oltre 20 caratteri</div>"
		}
	},
		submitHandler: function(form) {
			form.submit();
		}
	});

	$('form#container3').validate({
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
		}
	},
		submitHandler: function(form) {
			form.submit();
		}
	});
	$('#fileToUpload').bind('change', function() {
  		if (this.files[0].size > 8300000) {
  			alert("Il file è troppo grande!");
  			var control = $("#fileToUpload");
  			control.replaceWith( control = control.clone( true ) );
  			$("form").on("focus", "#fileToUpload", doStuff);
  			return !(document.getElementById('fileToUpload').innerHTML=document.getElementById('fileToUpload').innerHTML);
  		};
	});
});
