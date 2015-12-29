<?php
require_once('plugins/tcpdf/tcpdf.php');

$width=360;
$height=400;
$pagelayout = array($width, $height);
$pdf = new TCPDF("P", "mm", "A4", true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Cadbo');
$pdf->SetTitle('Requisición');
$pdf->SetSubject('Requisición');
$pdf->SetKeywords('Requisición');



// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// --------------------------------------------------------

//SQL????

// ---------------------------------------------------------


// set font
$pdf->SetFont('helvetica', '', 12);

// add a page
$pdf->AddPage();
$pdf->Image('image/logo.png', 10, 10, '', 12,'', '', '', false, 0);
// set some text for example
$html = '';
$txt = '<h1>Pedido </h1><h3>Nº : '.$pedido['id_pedido'].'</h3><h4></h4>';
// Multicell
$pdf->writeHTMLCell(90,10,100,9,$txt,0,0,false,true,'L',true);	
$txt='<table border="1">
	<tr>
		<td width="90">
			<b>Id Pedido</b><br />
			<b>Mayorista</b><br />
			<b>Fecha</b><br />
			<b>Estado</b><br />
			<b>Total</b>

		</td>
		<td width="280">
			 '.$pedido['id_pedido'].'<br /> 
			 '.$pedido['nombre_mayorista'].'<br />
			 '.date("d-m-Y",strtotime($pedido['fecha_pedido'])).'<br />
			 '.$estado['descripcion_estado_pedido'].'<br />
			 $'.number_format($pedido['total_bruto_pedido'],0,",",".").'


		</td>
		<td width="280">';
		if($envio['id_pedido_envio'] > 0){

		$txt .= '<b> Fecha Despacho:</b> '.date("d-m-Y",strtotime($envio['fecha_despacho_pedido_envio'])).'<br/>';
		$txt .= '<b> Dirección:</b> '.$envio['direccion_pedido_envio'].'';
		$txt .= '<b> Número:</b> '.$envio['numero_pedido_envio'].'<br/>';
		
			if(!empty($envio['depto_pedido_envio'])){
			
				$txt .= '<b> Depto:</b> '.$envio['depto_pedido_envio'].'<br/>';
	
			}
			
			if(!empty($envio['orden_trabajo_pedido_envio'])){
			
				$txt .= '<b> Courier:</b> '.$envio['nombre_courier'].'';
				$txt .= '<b> OT:</b> '.$envio['orden_trabajo_pedido_envio'].'';
				$txt .= '<b> Nº Tracking:</b> '.$envio['tracking_pedido_envio'].'';

			
			}
		}			
			
	$txt .= '
		</td>
	</tr>
</table>';
$pdf->SetFontSize(9);
$pdf->writeHTMLCell(180,10,10,40,$txt,0,0,false,true,'L',true);	
// create some HTML content
$txt = '<table><tr><th width="650" ></th></tr></table>';
$pdf->SetFillColor(230,230,230);
$pdf->writeHTMLCell(185,5,10,63,$txt,0,0,true,true,'C',true);	

$txt ='	
<table  border="0">
				<tr>
					<th    class="text-center" width="50" style="border:1px solid black;" ><b> Item</b></th>
					<th   class="text-center" width="80" style="border:1px solid black;" ><b> Id Artículo</b></th>
					<th   class="text-center" width="260" style="border:1px solid black;"><b> Producto</b></th>
					<th   class="text-center" width="90" style="border:1px solid black;" ><b> Plataforma</b></th>
					<th   class="text-center" width="60" style="border:1px solid black;" ><b> Unitario</b></th>
					<th    class="text-center" width="50" style="border:1px solid black;" ><b> Cantidad</b></th>
					<th    class="text-center" width="60" style="border:1px solid black;" ><b> Total</b></th>
				</tr>';
				for($x=0;$x<$total_productos;$x++){
					if($pedido['lista_mayorista_pedido']>0){
						$nombreDato="precio_lista".$pedido['lista_mayorista_pedido']."_producto_precio_venta";
						$precioProducto=$producto[$x][$nombreDato];
					}else{	
						$precioProducto=$producto[$x]['precio_mayorista_producto_precio_venta'];
					}
					
					$num = $x+1;
						$txt .= '	<tr>
					<td width="50" style="border-left:1px solid black; border-right:1px solid black;"  > '.$num.'</td>
					<td  width="80" style="border-left:1px solid black; border-right:1px solid black;" > '.$producto[$x]['id_producto'].'</td>
					<td width="260" style="border-left:1px solid black; border-right:1px solid black;"> '.$producto[$x]['nombre_producto'].'</td>
					<td width="90" style="border-left:1px solid black; border-right:1px solid black;"> '.$producto[$x]['descripcion_plataforma'].'</td>
					<td width="60" style="border-left:1px solid black; border-right:1px solid black;"> $'.number_format($precioProducto,0,",",".").'</td>
					<td width="50" style="border-left:1px solid black; border-right:1px solid black;"> '.$producto[$x]['stock_pedido_producto'].'</td>
					<td width="60" style="border-left:1px solid black; border-right:1px solid black;"> $'.number_format($precioProducto*$producto[$x]['stock_pedido_producto'],0,",",".")."</td>
					</tr>
					";
						}
						for($x=0;$x<50-$total_productos;$x++)
						{
							if($x+1==50-$total_productos)
				{
									$txt .=			'<tr>
									<td width="50" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black;"  ></td>
									<td width="80" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black;"  ></td>
									<td width="260" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black;"  ></td>
									<td width="90" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black;"  ></td>
									<td width="60" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black;"  ></td>
									<td width="50" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black;"  ></td>
									<td width="60" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black;"  ></td>
									</tr>';
									}
									else
									{
									$txt .=			'<tr>
									<td width="50" style="border-left:1px solid black; border-right:1px solid black;"  ></td>
									<td width="80" style="border-left:1px solid black; border-right:1px solid black;"  ></td>
									<td width="260" style="border-left:1px solid black; border-right:1px solid black;"  ></td>
									<td width="90" style="border-left:1px solid black; border-right:1px solid black;"  ></td>
									<td width="60" style="border-left:1px solid black; border-right:1px solid black;"  ></td>
									<td width="50" style="border-left:1px solid black; border-right:1px solid black;"  ></td>
									<td width="60" style="border-left:1px solid black; border-right:1px solid black;"  ></td>
									</tr>';
									}
						}
	$txt .=	'</table>
';
// output the HTML content
$pdf->SetFontSize(7);

$pdf->writeHTMLCell(180, 10, 10, 70, $txt, 0, 0, false, true, 'L', true);

$txt = '<table>
<tr>
<td> <b>Comentario: </b><br />
'.$pedido['descripcion_pedido'].'
</td>
</tr>
</table>

';
$pdf->writeHTMLCell(40, 10, 10, 230, $txt, 0, 0, false, true, 'L', true);

$txt = '<!--<table>
<tr>
<td> <b>Comentario: </b><br />
'.$pedido['descripcion_pedido'].'
</td>
</tr>
</table>-->
';
$pdf->writeHTMLCell(40, 10, 10, 250, $txt, 0, 0, false, true, 'L', true);

// reset pointer to the last page
$pdf->lastPage();
// ---------------------------------------------------------
//Close and output PDF document
//$nombre_doc = substr(md5(uniqid(rand())),0,6);
$nombredoc="Requisicion_".$pedido['nombre_pedido']."_".$pedido['id_pedido'].".pdf";
$pdf->Output($nombredoc, 'I');

/*

mail_attachment($nombre_doc."_Cotizacion.pdf","/home/dimarsa/public_html/pdf/cotizaciones/",$mail,"no-reply@dimarsa.cl","Cotizacion | Dimarsa" , "cotizacion");




function mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message) {
    $file = $path.$filename;
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $name = basename($file);
    $header = "From: ".$from_name." <".$from_mail.">\r\n";
    $header .= "Reply-To: ".$replyto."\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $header .= $message."\r\n\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; // use different content types here
    $header .= "Content-Transfer-Encoding: base64\r\n";
    $header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
    $header .= $content."\r\n\r\n";
    $header .= "--".$uid."--";
    if (mail($mailto, $subject, "", $header)) {
        echo "mail send ... OK"; // or use booleans here
    } else {
        echo "mail send ... ERROR!";
    }
}*/



?>
