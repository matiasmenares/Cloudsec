/*
$(function() {

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-red',
                    radioClass: 'iradio_flat-red'
                });
            });
            */
      
function miles(input){
	var num = input.value.replace(/\./g,"");
	if(!isNaN(num))
	{
		num = num.toString().split("").reverse().join("").replace(/(?=\d*\.?)(\d{3})/g,"$1.");
		num = num.split("").reverse().join("").replace(/^[\.]/,"");
		input.value = num;
	}
	else
	{
		input.value = input.value.replace(/[^\d\.]*/g,"");
	}
}
            function utilidad_unidad()
			{
				var precio_venta=document.getElementById('precio_venta').value.replace(/\./g,"");
				var precio_compra=document.getElementById('precio_compra').value.replace(/\./g,"");
				var utilidad=document.getElementById('utilidad').value.replace(/\./g,"");
				var precio_venta_neto=document.getElementById('precio_venta_neto').value.replace(/\./g,"");

				var valorresultado = parseInt(precio_venta)-parseInt(precio_compra);
				var res=milnum(valorresultado);
				
				var neto = parseInt(precio_venta)*1.19;
				var res_neto=milnum(parseInt(neto));
				
				if(typeof precio_venta != 'undefined')
				{
					$('#precio_venta_neto').val(res_neto);
				}
				if(res<0)
				{
					$('#utilidad').val('Utilidad Negativa');
				}
				else
				{
					if(typeof res=='undefined')
					{
						$('#utilidad').val('0');
					}
					else
					{
						$('#utilidad').val(res);
						
					}
				}
				
				
			};


 function valor_venta()
			{
				var precio_venta=document.getElementById('precio_venta').value.replace(/\./g,"");
				var precio_compra=document.getElementById('precio_compra').value.replace(/\./g,"");
				var utilidad=document.getElementById('utilidad').value.replace(/\./g,"");
				var precio_venta_neto=document.getElementById('precio_venta_neto').value.replace(/\./g,"");

				var valorresultado = parseInt(precio_compra)+parseInt(utilidad);
				var res=milnum(valorresultado);
				
				var neto = parseInt(valorresultado)*1.19;
				var res_neto=milnum(parseInt(neto));
				
				if(typeof precio_venta != 'undefined')
				{
					$('#precio_venta_neto').val(res_neto);
				}
				
				
					if(typeof res=='undefined')
					{
						$('#precio_venta').val(milnum(utilidad));
					}
					else
					{
						$('#precio_venta').val(res);
						
					}
				};
				
function precio_venta_total()
			{
			
				var precio_venta=document.getElementById('precio_venta').value.replace(/\./g,"");
				var precio_compra=document.getElementById('precio_compra').value.replace(/\./g,"");
				var utilidad=document.getElementById('utilidad').value.replace(/\./g,"");
				var precio_venta_neto=document.getElementById('precio_venta_neto').value.replace(/\./g,"");

					
				var neto = parseInt(precio_venta_neto)/1.19;
				var res_neto=milnum(parseInt(neto));
				

				var valorutilodad = parseInt(neto)-parseInt(precio_compra);
				var res=milnum(valorutilodad);
			
			
					$('#utilidad').val(res);
										
						
						$('#precio_venta').val(res_neto);
						
				};
	function cambio_medida(){
		var valor= $("#medida>option:selected").html();
		$('.nombre_medida').html(valor);
	}
				
function milnum(num){
	if(!isNaN(num))
	{
		num = num.toString().split("").reverse().join("").replace(/(?=\d*\.?)(\d{3})/g,"$1.");
		num = num.split("").reverse().join("").replace(/^[\.]/,"");
		return num;
	}
	else
	{
		//return num.replace(/[^\d\.]*/g,"");
	}
}

jQuery(document).ready(function() {       
			$('.skin-check input').iCheck({
                    checkboxClass: 'icheckbox_square-green',
					radioClass: 'iradio_square-green',
					increaseArea: '20%'
                });
                //cambio_medida();
                
        });