									
<script type="text/javascript" src="<?php echo URL_VIEW; ?>plugins/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="<?php echo URL_VIEW; ?>plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo URL_VIEW; ?>js/main.js"></script>
<script type="text/javascript" src="<?php echo URL_VIEW; ?>js/layout.js"></script>
<script type="text/javascript" src="<?php echo URL_VIEW; ?>plugins/jqueryui/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo URL_VIEW; ?>plugins/notify/bootstrap-notify.js"></script>
<script>
<?php 
if(isset($this->notify))
{
?>
	var texto="<div class='callout callout-<?php echo $this->notify['tipo']; ?> sombra' ><table><tr><td class='bg-<?php echo $this->notify['color']; ?>' style='padding:10px;'><i class='fa fa-<?php echo $this->notify['icono']; ?> fa-2x'></i></td><td style='padding:10px;'><h4><?php echo $this->notify['titulo']; ?></h4><p style='color:#000;'><?php echo $this->notify['mensaje']; ?></p></td></tr></table></div>";
	$('.notifications').notify({  
	message: { html: texto },
	type: '<?php echo $this->notify['tipo']; ?>',
	fadeOut: { enabled: true, delay: 4000 } }).show();	
<?php
}
?>
$(document).ready(function(){
	Main.init();
	Layout.init();
});
</script>
<!--style='border-color:<?php echo $this->notify['fondo']; ?>;'-->