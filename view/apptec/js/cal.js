$(document).ready(function() {  
		Main.init();
		Layout.init();
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
			            
