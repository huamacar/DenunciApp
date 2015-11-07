var SeccionVisible = null;
function showSeccion(SeccionNueva){
	if(SeccionVisible != null){
		SeccionVisible.fadeOut('fast');
	}
	SeccionVisible = SeccionNueva;
	SeccionNueva.fadeIn('slow');
}
function getDetalleDenuncia(codigoDenuncia){
	sendData('servicios/getDetalleDenuncia.php',{'codDenuncia' : codigoDenuncia},function(e){
		$('#dvDetalleDenuncia').html(e);
		$('#verDetalleDenuncia').modal();
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
$(document).ready(function(){
	mostrarItemsMenu();
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
	$('#frmRegistro').on('submit',function(e){
		
	});
});