$(document).ready(function(){
	// more info(all prod)
	$(".card-more").click(function(){
		idprod = this.id;
		cardinfo = $("#card"+idprod).find('.info');
			
		cardinfo.toggleClass('visible')	

		$(this).toggleClass('rotate')
		
	})

	// cpf mask
	cpf = $("#cpf_usu");
	cpf.attr("placeholder","000.000.000-00");
	cpf.mask('000.000.000-00',{reverse: false})
	console.log(cpf);


})
