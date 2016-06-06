


function openModal(idBoton, urll){	
    if(idBoton=="modalGaleriaDestino"){
            
		url="../backend/views/galeriadestino.php"+urll;
	}
    if(idBoton=="modalBannerDestino"){
            
        url="../backend/views/bannerDestino.php"+urll;
    }

     if(idBoton=="modalGaleriaPaquete"){
            
        url="../backend/views/galeria.php"+urll;
    }
    if(idBoton=="modalBannerPaquete"){
            
        url="../backend/views/banner.php"+urll;
    }

    if(idBoton=="modalPrograma"){
            
        url="../backend/views/programa.php"+urll;
    }

    if(idBoton=="modalItinerario"){
            
        url="../backend/views/itinerario.php"+urll;
    }
	
    $.colorbox({
    	iframe:true,
    	overlayClose: false,	        	
    	fixed: true,
    	width:"70%", 
		height:"90%",  
    	href:url
    });    
}
