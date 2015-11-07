var SeccionVisible = null;
function showSeccion(SeccionNueva){
	if(SeccionVisible != null){
		SeccionVisible.fadeOut('fast');
	}
	SeccionVisible = SeccionNueva;
	SeccionNueva.fadeIn('slow');
}
var codDenunciaActual;
function getDetalleDenuncia(codigoDenuncia){
	sendData('servicios/getDetalleDenuncia.php',{'codDenuncia' : codigoDenuncia},function(e){
		$('#dvDetalleDenuncia').html(e);
		$('#verDetalleDenuncia').modal();
		codDenunciaActual = codigoDenuncia;
	});
}
function mostrarItemsMenu(){
	if(localStorage.getItem('usercode') == null){
			$('#dvEditarPerfil').css('display','none');
			$('#dvSalir').css('display','none');
			$('#dvIngreso').css('display','block');
			$('#dvNuevoRegistro').css('display','block');
		}else{
			$('#dvEditarPerfil').css('display','block');
			$('#dvSalir').css('display','block');
			$('#dvIngreso').css('display','none');
			$('#dvNuevoRegistro').css('display','none');	
		}	
}
var nombreFotoPerfil;
var nombreFotoDenuncia;
$(document).ready(function(){
	mostrarItemsMenu();
	showSeccion($('#scDenunciasRecientes'));
	$('#mnMenuPrincipal').click(function(){
		mostrarItemsMenu();
		showSeccion($('#scPrincipal'));
	});
	sendData('servicios/getDenuncias.php',null,function(e){
		$('#dvDenunciasRecientes').html(e);
	});
	$('#btnIngresoUsuarios').click(function(){
		$('#IngresoUsuarios').modal();
	});
	$('#btnRegistroUsuarios').click(function(){
		$('#dvNuevoUsuario').modal();
	});
	$('#frmLogin').on('submit',function(e){
		e.preventDefault();
		Parametros = {'email' : $('#txtLogMail').val(),
					  'password' : $('#txtLogPass').val()};
		sendData('servicios/login.php',Parametros,function(e){
			TipoMensaje = e.substring(0,1);
			if(TipoMensaje == 1){
				localStorage.setItem('usercode',e.substring(1));
				showSuccess("Ingreso Correcto");
				mostrarItemsMenu();
			}else{
				showMessage(e);
			}
		});
	});
	$('#btnSalirSistema').click(function(){
		localStorage.removeItem('usercode');
		window.location.replace("index.html");
	});
	$('#btnRegistroDenuncias').click(function(){
		showSeccion($('#scNuevaDenuncia'));
		sendData('servicios/getCategorias.php',null,function(e){
			$('#cmbCategorias').html(e);
		});
	});
	$('#frmRegistro').on('submit',function(e){
		e.preventDefault();
		if($('#txtPassword').val() == $('#txtRepPassword').val()){
			Parametros = {'nombres' : $('#txtNombres').val(),
						  'apellidos' : $('#txtApellidos').val(),
						  'correo' : $('#txtEMail').val(),
						  'nickname' : $('#txtNickname').val(),
						  'password' : $('#txtPassword').val(),
						  'about' : $('#txtAcercaDe').val(),
						  'fotoPerfil' : nombreFotoPerfil};
			sendData('servicios/newUsuario.php',Parametros,function(e){
				showMessage(e);
			});
		}else{
			showError("Las contraseñas no coinciden");	
		}
	});
	$('#uplFotoPerfil').liteUploader({
				script: 'basic.php'
			})
			.on('lu:success', function (e, response) {
				nombreFotoPerfil = response;
			});
	$('#uplFotoDenuncia').liteUploader({
				script: 'basic_denuncia.php'
			})
			.on('lu:success', function (e, response) {
				nombreFotoDenuncia = response;
			});
	$('#btnRegistrarDenuncia').click(function(){
		var Visbilidad;
		if(localStorage.getItem('usercode') == null){
			Visibilidad = '0';		//Anonima
		}else{
			Visibiliad = $('#cmbVisibilidad').val();
			if(Visibilidad == '2'){
				Visibilidad = localStorage.getItem('usercode');
			}
		}
		Parametros = {'titulo' : $('#txtNTituloDenuncia').val(),
					  'descripcion' : $('#txtNDescripDenuncia').val(),
					  'fecha' : $('#txtNFechaHora').val(),
					  'usuario' : Visibilidad,
					  'fotografia' : nombreFotoDenuncia};
		sendData('servicios/newDenuncia.php',Parametros,function(e){
			showMessage(e);
		});
		
	});
	$('#btnEnviarComentario').click(function(){
		Parametros = {'comentario' : $('#txtNuevoComentario').val(),
					  'codDenuncia' : codDenunciaActual,
					  'codUsuario' : localStorage.getItem('usercode')};
		if(localStorage.getItem('usercode') == null){
			showError("No puedes comentar debido a que no estás logueado en el sistema");	
		}else{
			sendData("servicios/newComentario.php",Parametros,function(e){
				showMessage(e);
			});	
		}
	});
});