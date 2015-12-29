

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body>

	<!-- BEGIN LOGIN FORM -->
	 <div class="form-box" id="login-box">
            <div class="header">Login Sistema</div>
            <form action="" onsubmit="return sendLogin(this);" method="post">
                <div class="body bg-gray">
                	<div class="form-group">
					    <div class="input-icon">
					        <i class="fa fa-user"></i>
					        <input type="text" name="email_usuario" class="form-control" placeholder="Usuario" required autofocus />
					    </div>
					</div>
                	<div class="form-group">
					    <div class="input-icon">
					        <i class="fa fa-lock"></i>
					        <input type="password" name="pass_usuario" class="form-control" placeholder="Password" required />
					        <input type="hidden" name="pass" class="form-control" />
					          <?php
					          /*
					          //Recaptcha
					          if(isset($respuesta_captcha)){
						          $this->system->notify(2,"ERROR", "Error en el ingreso de Recaptcha! ");
					          }
				if($error_recaptcha > 2){
//Llaves de la captcha
//por ahora ponemos a null el error de la captcha
$error_captcha=null;
	echo "<br/>"; 
//escribimos en la página lo que nos devuelve recaptcha_get_html()
echo recaptcha_get_html($captcha_publickey, $error_captcha);
}

*/
?>
					    </div>
					</div>         
                    <div class="form-group">
                    	<div class="checkbox skin-check" aria-checked="false" aria-disabled="false">
	                        <label>
		                    	<input type="checkbox" name="remember_me"/>
						    	Recordar usuario
						    </label>
						 </div>
                    </div>
                </div>
                <div class="footer text-right">                                                               
                    <button name='login' type="submit" class="btn btn-apptec btn-block">Ingresar</button>  
                    
                    <p><a href="#" >¿Olvidó su contraseña?</a></p>
                    
                    <!--<a href="register.html" class="text-center">Registrar us</a>-->
                </div>
            </form>

            <!--<div class="margin text-center">
                <span>Ingresar por redes sociales</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>a
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>
            </div>-->
            
        </div>
	<!-- END REGISTRATION FORM -->

<!-- END LOGIN -->
<!-- END CONTAINER -->
<div class='notifications top-right'></div>
<?php require(TEMPLATE.'comun/js.php'); ?>
<script src="js/login.js" type="text/javascript"></script>
<script>
	$('.sendForm').click(function(){
		javascript:document.formularioLogin.submit();
	});
	$('.skin-check input').iCheck({
            	checkboxClass: 'icheckbox_square-green',
				radioClass: 'iradio_square-green',
				increaseArea: '20%'
            });
	</script>
</body>
<!-- END BODY -->
</html>