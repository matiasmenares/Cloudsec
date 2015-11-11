$(document).ready(function() {
	 	$('.colorpicker-default').colorpicker();
		$("#desde_cita").datetimepicker({
			language: 'es',
			autoclose: true,
			useCurrent: true,
			weekStart: 1,
			showMeridian: true,
			format: "dd MM yyyy - hh:ii",
			linkField: "espejo_desde",
			linkFormat: "yyyy-mm-dd hh:ii:00",
			pickerPosition: "bottom-left"
        }).on('changeDate', function(ev){
	        var dateSelected = new Date(Date.parse(ev.date));
            dateSelected.setHours(dateSelected.getHours()+3, dateSelected.getMinutes(), 0, 0);
			$('#hasta_cita').datetimepicker('setStartDate',dateSelected);
		});
		$("#hasta_cita").datetimepicker({
			language: 'es',
			autoclose: true,
			useCurrent: true,
			weekStart: 1,
			showMeridian: true,
			format: "dd MM yyyy - hh:ii",
			linkField: "espejo_hasta",
			linkFormat: "yyyy-mm-dd hh:ii:00",
			pickerPosition: "bottom-left"
        }).on('changeDate', function(ev){
	        var dateSelected = new Date(Date.parse(ev.date));
            dateSelected.setHours(dateSelected.getHours()+3, dateSelected.getMinutes(), 0, 0);
			$('#desde_cita').datetimepicker('setEndDate',dateSelected);
		});
            $('.data_icheck').iCheck({
				checkboxClass: 'icheckbox_square-green',
				radioClass: 'iradio_square-green',
				increaseArea: '20%' // optional
			});
			/*
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
	            $('#modal').modal('show');
		        //alert('Event: ' + calEvent.id);
		        //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
		        //alert('View: ' + view.name);
		        // change the border color just for fun
		        $(this).css('border-color', 'red');
		    },
			lang: 'es',
                header: h,
                defaultView: 'month',
                events: { url: 'eventos.php' }
            });
            */
		
	});