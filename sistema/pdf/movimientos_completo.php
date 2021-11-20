<?php

    // Inserto el código del archivo conxiondb_agenda que tiene la conexión a la base de datos
    require('../bd/db2.php');

    // si el formulario ha sido enviado procesa los datos del formulario                        
    if (isset($_GET['web'])) 
        {

            $sql = "SELECT movid, movnombre, movdinero, movdesc, movimientos.cjid, empnom FROM movimientos INNER JOIN tipomovimiento ON movimientos.movtipo = tipomovimiento.movtipo INNER Join cajas ON cajas.cjid = movimientos.cjid INNER JOIN empleados ON empleados.empid = cajas.empid";
            $queryArticulos = $conn->query($sql);
            if ($queryArticulos->num_rows > 0)
            {
                echo "<table border-\"0\"; border-color- \"black\">";
                echo    "<tr style=\"background-color: beige\">";
                echo        "<td style=\"width:100px\">";
                echo            "Id";
                echo        "<td>";
                echo        "<td style=\"width:100px\">";
                echo            "Tipo";
                echo        "<td>";
                echo        "<td style=\"width:100px\">";
                echo            "Dinero";
                echo        "<td>";
                echo        "<td style=\"width:300px\">";
                echo            "Descripcion";
                echo        "<td>";
                echo        "<td style=\"width:100px\">";
                echo            "Caja";
                echo        "<td>";
                echo        "<td style=\"width:100px\">";
                echo            "Empleado";
                echo        "<td>";
                echo    "<tr>";
                while ($fila = $queryArticulos->fetch_assoc())
                {
                    echo    "<tr>";
                    echo        "<td style=\"width:100px\">";
                    echo            $fila["movid"];
                    echo        "<td>";
                    echo        "<td style=\"width:100px\">";
                    echo             $fila["movnombre"];
                    echo        "<td>";
                    echo        "<td style=\"width:100px\">";
                    echo             $fila["movdinero"];
                    echo        "<td>";
                    echo        "<td style=\"width:100px\">";
                    echo             $fila["movdesc"];
                    echo        "<td>";
                    echo        "<td style=\"width:100px\">";
                    echo             $fila["cjid"];
                    echo        "<td>";
                    echo        "<td style=\"width:100px\">";
                    echo             $fila["empnom"];
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
                require("plantillaPDF8.php");   
                $pdf= new MiPDF();
                $pdf->AliasNBPages();
                    // para que tome el número de página y salga abajo en el footer
                $pdf->AddPage();
                $pdf->SetFont('Arial','B',12);
                $pdf->SetFillColor(232,232,232);
                    // color de fondo del encabezado
                $pdf->Ln(10);
                    // dejo un espacio de 10
                $pdf->Cell(25, 6, utf8_decode('Id'), 1, 0, 'C', 1);
                $pdf->Cell(60, 6, 'Tipo', 1, 0, 'C', 1);
                $pdf->Cell(25, 6, 'Dinero', 1, 0, 'C', 1);
                $pdf->Cell(60, 6, 'Descripcion', 1, 1, 'C', 1);
                $pdf->Cell(25, 6, 'Caja', 1, 0, 'C', 1);
                $pdf->Cell(25, 6, 'Empleado', 1, 0, 'C', 1);
                    // son los Títulos de la tabla
                    //     ancho/ alto/ texto/ borde/ salto de línea/ Centrado

                $sql = "SELECT movid, movnombre, movdinero, movdesc, movimientos.cjid, empnom FROM movimientos INNER JOIN tipomovimiento ON movimientos.movtipo = tipomovimiento.movtipo INNER Join cajas ON cajas.cjid = movimientos.cjid INNER JOIN empleados ON empleados.empid = cajas.empid";
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
                        $pdf->Cell(25, 6, $fila["movid"], 1, 0, 'C', 1);
                        $pdf->Cell(60, 6, $fila["movnombre"], 1, 0, 'C', 1);
                        $pdf->Cell(25, 6, $fila["movdinero"], 1, 0, 'C', 1);
                        $pdf->Cell(60, 6, $fila["movdesc"], 1, 1, 'C', 1);
                        $pdf->Cell(25, 6, $fila["cjid"], 1, 0, 'C', 1);
                        $pdf->Cell(25, 6, $fila["empnom"], 1, 0, 'C', 1);
                    }
                    $pdf->Output('', 'movimientos_completo.pdf');
                    // acá mando la salida y con nombre por defecto como "marcas_completo.pdf"
                    // primer parámetro: nada: muestra el archivo, D muestra para descargarlo
                }
                else    
                    echo 'No hay movimientos para mostrar';
            }
            else
            {
                if (isset($_GET['excel'])) 
                {
                    header('Content-type:application/vnd.ms-excel; charset-UT-8');
                    header('Content-Disposition: attachment;filename=movimientos_completo.xls');
                    header('Pragma: no-cache');
                    header('Expires: 0');
                    $sql = "SELECT movid, movnombre, movdinero, movdesc, movimientos.cjid, empnom FROM movimientos INNER JOIN tipomovimiento ON movimientos.movtipo = tipomovimiento.movtipo INNER Join cajas ON cajas.cjid = movimientos.cjid INNER JOIN empleados ON empleados.empid = cajas.empid";
                    $queryArticulos = $conn->query($sql);
                    if ($queryArticulos->num_rows > 0)
                    {
                        echo "<table border-\"0\"; border-color- \"black\">";
                        echo    "<tr style=\"background-color: beige\">";
                        echo        "<td style=\"width:100px\">";
                        echo            "Id";
                        echo        "<td>";
                        echo        "<td style=\"width:100px\">";
                        echo            "Tipo";
                        echo        "<td>";
                        echo        "<td style=\"width:100px\">";
                        echo            "Dinero";
                        echo        "<td>";
                        echo        "<td style=\"width:100px\">";
                        echo            "Descripcion";
                        echo        "<td>";
                        echo        "<td style=\"width:100px\">";
                        echo            "Caja";
                        echo        "<td>";
                        echo        "<td style=\"width:100px\">";
                        echo            "Empleado";
                        echo        "<td>";
                        echo    "<tr>";
                        while ($fila = $queryArticulos->fetch_assoc())
                        {
                            echo    "<tr>";
                            echo        "<td style=\"width:100px\">";
                            echo            $fila["movid"];
                            echo        "<td>";
                            echo        "<td style=\"width:100px\">";
                            echo             $fila["movnombre"];
                            echo        "<td>";
                            echo        "<td style=\"width:100px\">";
                            echo             $fila["movdinero"];
                            echo        "<td>";
                            echo        "<td style=\"width:100px\">";
                            echo             $fila["movdesc"];
                            echo        "<td>";
                            echo        "<td style=\"width:100px\">";
                            echo             $fila["cjid"];
                            echo        "<td>";
                            echo        "<td style=\"width:100px\">";
                            echo             $fila["empnom"];
                            echo        "<td>";
                            echo    "<tr>";                                                                    
                        }
                        echo    "</table>";                                                                    

                    }
                }
            }    
        }    

?>