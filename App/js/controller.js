//Controlador
angular.module('denunciApp',[]).controller('denunciAppCtrl',['$http',controlPrincipal]);

function controlPrincipal($http){
	var denuncias = this;
	
	denuncias.getDenuncias = function(){
		$http.get("http://restcountries.eu/rest/v1/region/africa").success(function(resp){
			denuncias.listadoDenuncias = resp;
		});	
	}
}