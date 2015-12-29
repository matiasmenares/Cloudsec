<script type="text/javascript" src="<?php echo URL_VIEW; ?>plugins/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="<?php echo URL_VIEW; ?>plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo URL_VIEW; ?>js/main.js"></script>
<script type="text/javascript" src="<?php echo URL_VIEW; ?>js/layout.js"></script>
<script type="text/javascript" src="<?php echo URL_VIEW; ?>plugins/icheck/icheck.min.js"></script>
<script type="text/javascript" src="<?php echo URL_VIEW; ?>plugins/notify/bootstrap-notify.js"></script>
<script type="text/javascript" src="<?php echo URL_VIEW; ?>plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo URL_VIEW; ?>plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="<?php echo URL_VIEW; ?>plugins/cheet/cheet.js"></script>
<script type="text/javascript" src="<?php echo URL_VIEW; ?>plugins/switch-source/js/html5shiv.min.js"></script>


<script>
<?php 
if(isset($this->system->notify))
{
?>
	var texto="<div class='callout callout-<?php echo $this->system->notify['tipo']; ?> sombra' ><table><tr><td class='bg-<?php echo $this->system->notify['color']; ?>' style='padding:10px;'><i class='fa fa-<?php echo $this->system->notify['icono']; ?> fa-2x'></i></td><td style='padding:10px;'><h4><?php echo $this->system->notify['titulo']; ?></h4><p style='color:#000;'><?php echo $this->system->notify['mensaje']; ?></p></td></tr></table></div>";
	$('.notifications').notify({  
	message: { html: texto },
	type: '<?php echo $this->system->notify['tipo']; ?>',
	fadeOut: { enabled: true, delay: 4000 } }).show();	
<?php
}
?>
$(document).ready(function(){

	Main.init();
	Layout.init();
		
	
	$("#menu").click(function() {
		var val_men = $("#menu_side").val()
	if(val_men == 1){
		val_men = 0;
	}else{
		val_men = 1;
	}
		menu(val_men);
	});
	
	  function menu(id) {
		  
        var menu = id;
        
        console.log(id);
               
        $.ajax({
            url: '<?php echo URL_FRONTEND; ?>ajax_menu/',
            type: 'POST',
            dataType: 'json',
            success: function (data) {

                  $('#menu_side').val(data.msg);

            },
            data: "menu="+menu
        });
    }
	
	
});
</script>

<!--style='border-color:<?php echo $this->system->notify['fondo']; ?>;'-->