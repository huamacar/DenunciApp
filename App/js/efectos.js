//$.toaster({ priority : 'success', title : 'Title', message : 'Your message here'});
//$.toaster({ priority : 'info', title : 'Title', message : 'Your message here'});
//$.toaster({ priority : 'warning', title : 'Title', message : 'Your message here'});
//$.toaster({ priority : 'danger', title : 'Title', message : 'Your message here'});
var LoadingState = true;
function toogleLoading(){
	if(LoadingState){
		$('.loading').fadeOut('fast');	
		LoadingState = false;
	}else{
		$('.loading').fadeIn('fast');
		LoadingState = true;	
	}
}
function subirArchivoAjax(archivo){
	$('#uplFotoPerfil').liteUploader({
				script: 'basic.php'
			})
			.on('lu:success', function (e, response) {
				alert('Uploaded!');
			});
}
function showSuccess(mensaje){
	$.toaster({ priority : 'success', title : 'Exito!!!', message : mensaje});
}
function showError(mensaje){
	$.toaster({ priority : 'danger', title : 'Error', message : mensaje});
}
function showWarning(mensaje){
	$.toaster({ priority : 'warning', title : 'Advertencia', message : mensaje});	
}
function showMessage(mensaje){
	TipoMensaje = mensaje.substring(0,1);
	if(TipoMensaje == '1'){
		showSuccess(mensaje.substring(1));	
	}else if(TipoMensaje == '0'){
		showError(mensaje.substring(1));	
	}else{
		showWarning(mensaje);
	}
}
function sendData(NombreServicio,Parametros,callback){
	$.ajax({
		data:Parametros,
		url:NombreServicio,
		type:'post',
		beforeSend: function(){
			toogleLoading();
		},
		success: function(response){
			if(callback != null){
				callback(response);
			}
			toogleLoading();
		}
	});
}
$(document).ready(function(){
	toogleLoading();
	$('[data-toggle="popover"]').popover({ trigger: "hover" });
});