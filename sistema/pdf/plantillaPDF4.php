<?php
    require("fpdf/fpdf.php");

    class MiPDF extends FPDF
    {
        function Header()
        {
        $this->Image('logito.jpg',10,10,30);
        $this->SetFont('Arial','B',16);
        $this->Cell(30);
        $this->Cell(120,10,'LISTADO GENERAL DE PROVEEDORES',0,0,'C');
                //   x   y    texto    salto de línea      C centrado
        $this->Ln(20);
                // Salto de línea de 20 puntos
        $tDate=date('d/m/Y');
        $this->Cell(0, 10, $tDate, 0, false, 'R', 0, '', 0, false, 'T', 'M');
        $this->Ln(20);
        }

        function footer()
        {
        $this->SetY(-15);
            // el punto Y comenzará desde el punto final de la página, 15 puntos arriba
        $this->SetFont('Arial','I',8);
                //              Italic (cursiva)
        $this->Cell(0, 10, utf8_decode('Página '). $this->PageNo().' / {nb}', 0, 0, 'C');
                //   x  y  utf por el acento     

        }
    }
        
        
?>