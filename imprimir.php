<?php
    if(isset($_POST['imprimir'])){
        require('fpdf/fpdf.php');

        class PDF extends FPDF{
            function Header(){
                $this->Image('img/pato.png',170,5,30);
                $this->SetFont('Arial','B',15);
                $this->Cell(80);
                $this->Cell(30,10,'Viajes Adulto Mayor',0,0,'C');
                $this->Ln(10);
                $this->Cell(80);
                $this->Cell(30,10,'Boleto de viaje',0,0,'C');
                $this->Ln(20);
            }
            
            function Footer(){
                $this->SetY(-15);
                $this->SetFont('Arial','I',8);
                $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
            }
        }
        
        $usuario=['usudb'];
        $destino=$_POST['desdb'];
        $vuelo=$_POST['vuedb'];
        $hotel=$_POST['hotdb'];
        $actividad=$_POST['actdb'];

        require('conn_sqlsrv.php');

        $consultadt=sqlsrv_query($conn,"SELECT*FROM tbl_destinos WHERE id_d = $destino");
        $rowdt=sqlsrv_fetch_array($consultadt, SQLSRV_FETCH_ASSOC);
        $nombre_destino=$rowdt['nombre'];
        
        $consultavt=sqlsrv_query($conn,"SELECT*FROM tbl_vuelos WHERE id_v = $vuelo");
        $rowvt=sqlsrv_fetch_array($consultavt, SQLSRV_FETCH_ASSOC);
        $fecha=$rowvt['fecha'];
        $clase=$rowvt['clase'];
        $personas=$rowvt['personas'];
        
        $consultaht=sqlsrv_query($conn,"SELECT*FROM tbl_hoteles WHERE id_h = $hotel");
        $rowht=sqlsrv_fetch_array($consultaht, SQLSRV_FETCH_ASSOC);
        $nombre_hotel=$rowht['nombre'];
        $tipo=$rowht['tipo'];
        
        $consultaat=sqlsrv_query($conn,"SELECT*FROM tbl_actividades WHERE id_a = $actividad");
        $rowat=sqlsrv_fetch_array($consultaat, SQLSRV_FETCH_ASSOC);
        $nombre_actividad=$rowat['nombre'];
        
        $total=$rowvt['precio']+$rowht['precio']+$rowat['precio'];

        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times','',12);

        $pdf->Cell(30,20,"Destino:",0,0,'C');
        $pdf->Ln(15);
        $pdf->Cell(30,10,$nombre_destino,0,0,'C');
        $pdf->Ln(15);
        $pdf->Cell(30,20,"Vuelo:",0,0,'C'); $pdf->Cell(30,20,"Clase:",0,0,'C'); $pdf->Cell(30,20,"Personas:",0,0,'C');
        $pdf->Ln(15);
        $pdf->Cell(30,10,$fecha,0,0,'C'); $pdf->Cell(30,10,$clase,0,0,'C'); $pdf->Cell(30,10,$personas,0,0,'C');
        $pdf->Ln(15);
        $pdf->Cell(30,20,"Hotel:",0,0,'C'); $pdf->Cell(30,20,"Tipo:",0,0,'C');
        $pdf->Ln(15);
        $pdf->Cell(30,10,$nombre_hotel,0,0,'C'); $pdf->Cell(30,10,$tipo,0,0,'C');
        $pdf->Ln(15);
        $pdf->Cell(30,20,"Actividad:",0,0,'C');
        $pdf->Ln(15);
        $pdf->Cell(30,10,$nombre_actividad,0,0,'C');
        $pdf->Ln(15);
        $pdf->Cell(30,20,"Total: $$$",0,0,'C');
        $pdf->Ln(15);
        $pdf->Cell(30,10,$total,0,0,'C');

        $pdf->Output();
    }

?>