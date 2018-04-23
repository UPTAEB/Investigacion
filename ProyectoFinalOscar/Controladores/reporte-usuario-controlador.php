<?php

require_once '../Modelos/usuario-modelo.php';
$objUsuario = new Usuario();
$objUsuario->setNombre('');
$r1 = $objUsuario->consultarNombreUsuario();
$mensaje = '';
if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
	require_once '../Modelos/fpdf.php';
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	$pdf->Image('../recursos/img/uptaeb.png', 5, 5, 30 );
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(30);
	$pdf->Cell(120,10, 'Reporte de Usuarios',0,0,'C');
	$pdf->Ln(24);
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20,6,'ID',1,0,'C',1);
	$pdf->Cell(70,6,'CEDULA',1,0,'C',1);
	$pdf->Cell(70,6,'NOMBRE',1,1,'C',1);
	$pdf->SetFont('Arial','',10);

	foreach ($r1 as $valor) {
		if (isset($valor["id_usuario"])) {
			$pdf->Cell(20,6,$valor['id_usuario'],1,0,'C');
			$pdf->Cell(70,6,utf8_decode($valor['cedula']),1,0,'C');
			$pdf->Cell(70,6,utf8_decode($valor['nombre']),1,1,'C');
		}
	}

	$pdf->Output(); //Salida al navegador
} else {//si hay un error al consultar
	$mensaje = 'Error al consultar el Usuario, contacte con el soporte';
	require_once '../Vistas/mensaje-vista.php';
}
