<?php

    // Inserto el código del archivo conxiondb_agenda que tiene la conexión a la base de datos
    require('../bd/db2.php');

    // si el formulario ha sido enviado procesa los datos del formulario                        
    if (isset($_GET['web'])) 
        {

            $sql = "SELECT * FROM clientes";
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
                    echo            $fila["clid"];
                    echo        "<td>";
                    echo        "<td style=\"width:200px\">";
                    echo             $fila["clnom"];
                    echo        "<td>";
                    echo        "<td style=\"width:200px\">";
                    echo            $fila["clemail"];
                    echo        "<td>";
                    echo        "<td style=\"width:200px\">";
                    echo            $fila["cldire"];
                    echo        "<td>";
                    echo        "<td style=\"width:150px\">";
                    echo            $fila["cltele"];
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
                require("plantillaPDF2.php");   
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
                $pdf->Cell(35, 6, 'Nombre', 1, 0, 'C', 1);
                $pdf->Cell(60, 6, 'Email', 1, 0, 'C', 1);
                $pdf->Cell(55, 6, 'Direccion', 1, 0, 'C', 1);
                $pdf->Cell(25, 6, 'Telefono', 1, 1, 'C', 1);
                    // son los Títulos de la tabla
                    //     ancho/ alto/ texto/ borde/ salto de línea/ Centrado

                $sql = "SELECT * FROM clientes";
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
                        $pdf->Cell(15, 6, $fila["clid"], 1, 0, 'C', 1);
                        $pdf->Cell(35, 6, $fila["clnom"], 1, 0, 'L', 1);
                        $pdf->Cell(60, 6, $fila["clemail"], 1, 0, 'L', 1);
                        $pdf->Cell(55, 6, $fila["cldire"], 1, 0, 'C', 1);
                        $pdf->Cell(25, 6, $fila["cltele"], 1, 1, 'C', 1);
                    }
                    $pdf->Output('', 'clientes_completo.pdf');
                    // acá mando la salida y con nombre por defecto como "clientes_completo.pdf"
                    // primer parámetro: nada: muestra el archivo, D muestra para descargarlo
                }
                else    
                    echo 'No hay clientes para mostrar';
            }
            else
            {
                if (isset($_GET['excel'])) 
                {
                    header('Content-type:application/vnd.ms-excel; charset-UT-8');
                    header('Content-Disposition: attachment;filename=clientes_completo.xls');
                    header('Pragma: no-cache');
                    header('Expires: 0');
                    $sql = "SELECT * FROM clientes";
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
                            echo            $fila["clid"];
                            echo        "<td>";
                            echo        "<td style=\"width:200px\">";
                            echo             $fila["clnom"];
                            echo        "<td>";
                            echo        "<td style=\"width:200px\">";
                            echo            $fila["clemail"];
                            echo        "<td>";
                            echo        "<td style=\"width:200px\">";
                            echo            $fila["cldire"];
                            echo        "<td>";
                            echo        "<td style=\"width:150px\">";
                            echo            $fila["cltele"];
                            echo        "<td>";
                            echo    "<tr>";                                                                    
                        }
                        echo    "</table>";                                                                    

                    }
                }
            }    
        }    

?>