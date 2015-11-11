<script type="text/javascript" src="<?php echo URL_VIEW; ?>plugins/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="<?php echo URL_VIEW; ?>plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo URL_VIEW; ?>js/main.js"></script>
<script type="text/javascript" src="<?php echo URL_VIEW; ?>js/layout.js"></script>
<script type="text/javascript" src="<?php echo URL_VIEW; ?>plugins/icheck/icheck.min.js"></script>
<script type="text/javascript" src="<?php echo URL_VIEW; ?>plugins/notify/bootstrap-notify.js"></script>
<script type="text/javascript" src="<?php echo URL_VIEW; ?>plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo URL_VIEW; ?>plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="<?php echo URL_VIEW; ?>plugins/cheet/cheet.js"></script>
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
	
	
	cheet('↑ ↑ ↓ ↓ b a', function () {
		$('#toasty').fadeIn()
		var audio = new Audio('easter/toasty.mp3');
		audio.play();
		audio.addEventListener("ended", function(){
			$('#toasty').fadeOut();
		});
	});
	
	cheet('← ↓ → b a', function () {
		$('#finishim').fadeIn()
		var audio = new Audio('easter/fatality-efect.mp3');
		audio.play();
		var x = new Audio('easter/finishim.mp3');
		x.play();
		x.addEventListener("ended", function(){
			$('#finishim').fadeOut();
		});		
	});
	
	cheet('↓ → a', function () {
		$('#hadoken').fadeIn()
		var audio = new Audio('easter/hadoken.mp3');
		audio.play();
		var elem = document.getElementById("hadoken"),
		speed = 20,
        currentPos = 0;
		var motionInterval = setInterval(function() {
        	currentPos += speed;
			if (currentPos >= screen.width && speed > 0) {
			currentPos = screen.width;
			//speed = -2 * speed;
			elem.style.width = parseInt(elem.style.width)*2+"px";
			elem.style.height = parseInt(elem.style.height)*2+"px";
        	}
			if (currentPos <= 0 && speed < 0) {
				clearInterval(motionInterval);
        	}
			elem.style.left = currentPos+"px";
    	},20);
		audio.addEventListener("ended", function(){
		//	$('#toasty').fadeOut();
		});
	});
	
		
	
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