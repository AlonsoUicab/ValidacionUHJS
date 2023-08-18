<?php

require('fpdf.php');
require('../config/conexion_bd.php');
//Obtener el id, desde el index.php
$idPersona = $_GET['idPersona'];
//Consulta a la base de datos para pintar los datos solicitados
$consulta = "SELECT * from persona
             INNER JOIN programas ON persona.idProgramas = programas.idProgramas WHERE idPersona = $idPersona ";
$resultado = mysqli_query($conexion, $consulta);
$fila = mysqli_fetch_assoc($resultado);
//Fuente del textp
$text = "Poppins/Poppins-Medium.ttf";
//Cambiar el orden de las fechas de inicio y fin
$fechaInicio = $fila['fechaInicio'];
$inicioCambio= date("d/m/y", strtotime($fechaInicio));
$fechaFin = $fila['fechaFin'];
$finCambio = date("d/m/y", strtotime($fechaFin));
//Guardar la imagen en una variable
$imagen = "certificado.jpg";
//Inicio del pdf 
//
$fpdf = new FPDF();
$fpdf->AddPage('PORTRAIT', 'letter');
$fpdf->Image($imagen, 0, 0, 220,280);
$fpdf->AddFont('Poppins-Bold','','Poppins-Bold.php');
$fpdf->SetFont('Poppins-Bold','', 20);
$fpdf->Ln(90);
$fpdf->Cell(50,10,"",0,0,'C');
$fpdf->MultiCell(150,10,utf8_decode(strtoupper($fila['categoria']))." EN",0,'C');
$fpdf->Ln(0);
$fpdf->AddFont('Poppins-ThinItalic','','Poppins-Medium.php');
$fpdf->SetFont('Poppins-ThinItalic','', 16);
$fpdf->Cell(50,10,"",0,0,'C');
$fpdf->MultiCell(150,10,utf8_decode(ucwords($fila['nombrePrograma'])),0,'C');
$fpdf->Ln(10);
$fpdf->Cell(55,10,"",0,0,'C');
$fpdf->MultiCell(145,10,"Alumno: ".utf8_decode(ucwords($fila['nombre']." ".$fila['apellidoPaterno']." ".$fila['apellidoMaterno'])),0,'L');
$fpdf->Ln(10);
$fpdf->Cell(55,10,"",0,0,'C');
$fpdf->MultiCell(130,10,"Inicio: ".$inicioCambio,0,'L');
$fpdf->Ln(10);
$fpdf->Cell(55,10,"",0,0,'C');
$fpdf->MultiCell(130,10,utf8_decode("Término: ".$finCambio),0,'L');
$fpdf->Ln(10);
$fpdf->Cell(55,10,"",0,0,'C');
$fpdf->MultiCell(130,10,utf8_decode("Duración: ".$fila['duracion']." Horas"),0,'L');
$fpdf->Output('I', "Certificado-".ucwords($fila['nombre']."-".$fila['apellidoPaterno']."-".$fila['apellidoMaterno']).".pdf");
?>