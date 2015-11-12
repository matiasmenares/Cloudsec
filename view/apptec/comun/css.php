<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="<?php echo URL_VIEW; ?>plugins/switch-source/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URL_VIEW; ?>plugins/switch-source/css/base.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URL_VIEW; ?>css/font.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo URL_VIEW; ?>plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URL_VIEW; ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URL_VIEW; ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URL_VIEW; ?>plugins/summernote/summernote.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URL_VIEW; ?>plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URL_VIEW; ?>plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URL_VIEW; ?>plugins/icheck/skins/all.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URL_VIEW; ?>plugins/autocomplete/content/styles.css" rel="stylesheet" type="text/css"/>


<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<!-- <link href ="<?php echo TEMPLATE; ?>plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/> -->
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<!-- <link href="css/tasks.css" rel="stylesheet" type="text/css"/> -->
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
<!-- <link href="css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="css/layout.css" rel="stylesheet" type="text/css"/>
<link href="css/light.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="css/estilo.css" rel="stylesheet" type="text/css"/> -->

<!-- END THEME STYLES -->

<!--<link href="<?php echo URL_VIEW; ?>css/AdminLTE.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URL_VIEW; ?>css/components.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URL_VIEW; ?>css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URL_VIEW; ?>css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URL_VIEW; ?>css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo URL_VIEW; ?>css/apptec.css" rel="stylesheet" type="text/css"/>-->

<?php 
$css = $this->css->setCss();
	foreach($css as $clave => $valor){
		echo $valor;
	}
?>