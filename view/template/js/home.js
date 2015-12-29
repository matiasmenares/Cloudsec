$(document).ready(function() {  
		Main.init();
		Layout.init();
		getWeather(); //Temperatura.
		statusServer(); //Status Servidores.
		setInterval(getWeather, 600000); //Actualizar cada 10 min.
		setInterval(getWeather, 300000); //Actualiza status servidores cada 5 min.
	});

function getWeather() {
  $.simpleWeather({
    location: 'Providencia, CL',
    woeid: '',
    unit: 'c',
    success: function(weather) {
	  clima=weather.currently;
	  switch (weather.currently)
	  {
		  case 'Fair': clima= 'Buen Tiempo'; break;
		  case 'Sunny': clima= 'Soleado'; break;
		  case 'Clear': clima= 'Despejado'; break;
	  }
      html = '<h2 class="font-grey-cararra padding"><i id="clima" class="icon-'+weather.code+'"></i> '+weather.temp+'&deg;'+weather.units.temp+'</h2>';
      /*html += '<ul><li>'+weather.city+' '+weather.region+'</li>';*/
      //html += '<ul><li class="currently font-grey-gallery">Min: '+weather.low+'&deg; - Max: '+weather.high+'&deg;</li>';
      //html += '<li class="currently font-grey-gallery">'+clima+'</li>';
      //html += '<li class="font-grey-gallery">'+weather.wind.direction+' '+weather.wind.speed+' '+weather.units.speed+'</li>';
      //html += '</ul>';
  
      $("#weather").html(html);
    },
    error: function(error) {
      $("#weather").html('<p>'+error+'</p>');
    }
  });
}
	
	$('#buscarTransantiago').click(function(){
			$( "#respuestaTransantiago" ).html('<div class="text-center"><i class="fa fa-refresh fa-spin fa-3x font-grey-gallery padding"></i></div>');	
		var paradero=$('#paradero').val();
		var request = $.ajax({
			url: "view/apptec/ajax/transantiago.php?paradero="+paradero,
			method: "GET",
			dataType: "html"
		});
		request.done(function( msg ) {
			$( "#respuestaTransantiago" ).html( msg );
			$('#tituloParadero').html(paradero);
		});
		request.fail(function( jqXHR, textStatus ) {
			console.log( "Error: " + textStatus );
			});
	});
		if ($('#calendar').parents(".portlet").width() <= 720) {
                    $('#calendar').addClass("mobile");
                    h = {
                        left: 'title, prev, next',
                        center: '',
                        right: 'today,month,agendaWeek,agendaDay'
                    };
                } else {
                    $('#calendar').removeClass("mobile");
                    h = {
                        left: 'title',
                        center: '',
                        right: 'prev,next,today,month,agendaWeek,agendaDay'
                    };
                }
		$('#calendar').fullCalendar({
            eventClick: function(calEvent, jsEvent, view) {
	            $('#modal').removeData('bs.modal');
	            $('#modal .modal-title').html(calEvent.title);
	            $('#modal .modal-body').html(calEvent.description);
	            $('#modal').modal('toggle');
		        //alert('Event: ' + calEvent.id);
		        //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
		        //alert('View: ' + view.name);
		        // change the border color just for fun
		        $(this).css('border-color', 'red');
		    },
			lang: 'es',
			allDayDefault: false,
			header: h,
			defaultView: 'month',
			events: eventos
			            });
			            
		function statusServer(){	
			var request = $.ajax({
			url: "server.php",
			method: "GET",
			dataType: "html"
		});
		request.done(function( msg ) {
			$( "#statusServidor" ).hide();
			$( "#statusServidor" ).html( msg );
			$( "#statusServidor" ).fadeIn();
		});
		request.fail(function( jqXHR, textStatus ) {
			console.log( "Error: " + textStatus );
			});
			            }
