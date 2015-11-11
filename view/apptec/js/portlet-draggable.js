var PortletDraggable = function () {

    return {
        //main function to initiate the module
        init: function () {

            if (!jQuery().sortable) {
                return;
            }

            $("#sortable_portlets").sortable({
                connectWith: ".portlet",
                items: ".portlet", 
                opacity: 0.8,
                handle : '.portlet-title',
                coneHelperSize: true,
                placeholder: 'portlet-sortable-placeholder',
                forcePlaceholderSize: true,
                tolerance: "pointer",
                helper: "clone",
                tolerance: "pointer",
                forcePlaceholderSize: !0,
                helper: "clone",
                cancel: ".portlet-sortable-empty, .portlet-fullscreen", // cancel dragging if portlet is in fullscreen mode
                revert: 250, // animation in milliseconds
                update: function(b, c) {
                    if (c.item.prev().hasClass("portlet-sortable-empty")) {
                        c.item.prev().before(c.item);
                    }
                },
                stop : function(event, ui){
		          //console.log($(this).sortable('toArray'));
		          //console.log(ui.item.index());
		          //alert($(this).sortable('serialize'));
				  //alert($(this).parents('.portlet').attr(id));
				  //console.log(ui.item.parent().attr('id'));
				  //console.log(ui.item.attr('id'));
				  datos=ui.item.attr('id').split("_");
				  ui.item.attr('id',ui.item.parent().attr('id')+"_"+datos[1]);
				  statusServer($(this).sortable('serialize'));
		        }
            });
            function statusServer(variables){	
				var request = $.ajax({
                    url: "view/apptec/ajax/administrar-negocio.php?"+variables,		
                    method: "GET",
					dataType: "html"
				});
				request.done(function( msg ) {
					console.log( "Correcto:" + msg );
				});
				request.fail(function( jqXHR, textStatus ) {
					console.log( "Error: " + textStatus );
				});
			}
        }
    };
}();