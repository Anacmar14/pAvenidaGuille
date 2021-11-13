<?php

    // Inserto el código del archivo conxiondb_agenda que tiene la conexión a la base de datos
    require('../bd/db2.php');

    // si el formulario ha sido enviado procesa los datos del formulario                        
    if (isset($_GET['web'])) 
        {

            $sql = "SELECT * FROM proveedores";
            $queryArticulos = $conn->query($sql);
            if ($queryArticulos->num_rows > 0)
            {
                echo "<table border-\"0\"; border-color- \"black\">";
                echo    "<tr style=\"background-color: beige\">";
                echo        "<td style=\"width:100px\">";
                echo            "Id";
                echo        "<td>";
                echo        "<td style=\"width:200px\">";
                echo            "Nombre";
                echo        "<td>";
                echo        "<td style=\"width:200px\">";
                echo            "Email";
                echo        "<td>";
                echo        "<td style=\"width:200px\">";
                echo            "Direccion";
                echo        "<td>";
                echo        "<td style=\"width:150px\">";
                echo            "Telefono";
                echo        "<td>";
                echo    "<tr>";
                while ($fila = $queryArticulos->fetch_assoc())
                {
                    echo    "<tr>";
                    echo        "<td style=\"width:100px\">";
                    echo            $fila["provid"];
                    echo        "<td>";
                    echo        "<td style=\"width:200px\">";
                    echo             $fila["provnom"];
                    echo        "<td>";
                    echo        "<td style=\"width:300px\">";
                    echo            $fila["provemail"];
                    echo        "<td>";
                    echo        "<td style=\"width:300px\">";
                    echo            $fila["provdire"];
                    echo        "<td>";
                    echo        "<td style=\"width:150px\">";
                    echo            $fila["provtele"];
                    echo        "<td>";
                    echo    "<tr>";                                                                    
                }
                echo    "</table>";           
            }
        }
        else 
        {
            if (isset($_GET['pdf'])) 
            {
                require("plantillaPDF4.php");   
                $pdf= new MiPDF();
                $pdf->AliasNBPages();
                    // para que tome el número de página y salga abajo en el footer
                $pdf->AddPage();
                $pdf->SetFont('Arial','B',12);
                $pdf->SetFillColor(232,232,232);
                    // color de fondo del encabezado
                $pdf->Ln(10);
                    // dejo un espacio de 10
                $pdf->Cell(15, 6, utf8_decode('Id'), 1, 0, 'C', 1);
                $pdf->Cell(30, 6, 'Nombre', 1, 0, 'C', 1);
                $pdf->Cell(60, 6, 'Email', 1, 0, 'C', 1);
                $pdf->Cell(55, 6, 'Direccion', 1, 0, 'C', 1);
                $pdf->Cell(25, 6, 'Telefono', 1, 1, 'C', 1);
                    // son los Títulos de la tabla
                    //     ancho/ alto/ texto/ borde/ salto de línea/ Centrado

                $sql = "SELECT * FROM proveedores";
                $queryArticulos = $conn->query($sql);
                if ($queryArticulos->num_rows > 0)
                {
                    $pdf->SetFont('Arial','',10);
                        // fuente para las filas de la tabla
                    $pdf->SetFillColor(255,255,255);
                        // fondo blanco para las filas de la tabla

                    while ($fila = $queryArticulos->fetch_assoc())
                    {
                        // recorro el query imprimiendo los campos
                        $pdf->Cell(15, 6, $fila["provid"], 1, 0, 'C', 1);
                        $pdf->Cell(30, 6, $fila["provnom"], 1, 0, 'L', 1);
                        $pdf->Cell(60, 6, $fila["provemail"], 1, 0, 'L', 1);
                        $pdf->Cell(55, 6, $fila["provdire"], 1, 0, 'C', 1);
                        $pdf->Cell(25, 6, $fila["provtele"], 1, 1, 'C', 1);
                    }
                    $pdf->Output('', 'proveedores_completo.pdf');
                    // acá mando la salida y con nombre por defecto como "proveedores_completo.pdf"
                    // primer parámetro: nada: muestra el archivo, D muestra para descargarlo
                }
                else    
                    echo 'No hay proveedores para mostrar';
            }
            else
            {
                if (isset($_GET['excel'])) 
                {
                    header('Content-type:application/vnd.ms-excel; charset-UT-8');
                    header('Content-Disposition: attachment;filename=proveedores_completo.xls');
                    header('Pragma: no-cache');
                    header('Expires: 0');
                    $sql = "SELECT * FROM proveedores";
                    $queryArticulos = $conn->query($sql);
                    if ($queryArticulos->num_rows > 0)
                    {
                        echo "<table border-\"0\"; border-color- \"black\">";
                        echo    "<tr style=\"background-color: beige\">";
                        echo        "<td style=\"width:100px\">";
                        echo            "Id";
                        echo        "<td>";
                        echo        "<td style=\"width:200px\">";
                        echo            "Nombre";
                        echo        "<td>";
                        echo        "<td style=\"width:300px\">";
                        echo            "Email";
                        echo        "<td>";
                        echo        "<td style=\"width:300px\">";
                        echo            "Direccion";
                        echo        "<td>";
                        echo        "<td style=\"width:150px\">";
                        echo            "Telefono";
                        echo        "<td>";
                        echo    "<tr>";
                        while ($fila = $queryArticulos->fetch_assoc())
                        {
                            echo    "<tr>";
                            echo        "<td style=\"width:100px\">";
                            echo            $fila["provid"];
                            echo        "<td>";
                            echo        "<td style=\"width:200px\">";
                            echo             $fila["provnom"];
                            echo        "<td>";
                            echo        "<td style=\"width:300px\">";
                            echo            $fila["provemail"];
                            echo        "<td>";
                            echo        "<td style=\"width:300px\">";
                            echo            $fila["provdire"];
                            echo        "<td>";
                            echo        "<td style=\"width:150px\">";
                            echo            $fila["provtele"];
                            echo        "<td>";
                            echo    "<tr>";                                                                    
                        }
                        echo    "</table>";                                                                    

                    }
                }
            }    
        }    

?>