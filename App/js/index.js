var SeccionVisible = null;
function showSeccion(SeccionNueva){
	if(SeccionVisible != null){
		SeccionVisible.fadeOut('fast');
	}
	SeccionVisible = SeccionNueva;
	SeccionNueva.fadeIn('slow');
}
$(document).ready(function(){
	showSeccion($('#scPrincipal'));
	$('#mnMenuPrincipal').click(function(){
		showSeccion($('#scPrincipal'));
	});
});