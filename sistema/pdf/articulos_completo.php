<?php
    
    // Inserto el código del archivo conxiondb_agenda que tiene la conexión a la base de datos
    require('../bd/db2.php');

    // si el formulario ha sido enviado procesa los datos del formulario                        
    if (isset($_GET['web'])) 
        {

            $consulta = "SELECT proid, procodigo, pronombre,canom, prostockactual, proprecio FROM productos INNER JOIN categorias ON 
            productos.caid = categorias.caid";
            $queryArticulos = $conn->query($consulta);
            if ($queryArticulos->num_rows > 0)
            {
                echo "<table border-\"0\"; border-color- \"black\">";
                echo    "<tr style=\"background-color: beige\">";
                echo        "<td style=\"width:100px\">";
                echo            "Id";
                echo        "<td>";
                echo        "<td style=\"width:200px\">";
                echo            "Codigo";
                echo        "<td>";
                echo        "<td style=\"width:200px\">";
                echo            "Nombre";
                echo        "<td>";
                echo        "<td style=\"width:100px\">";
                echo            "Categorias";
                echo        "<td>";
                echo        "<td style=\"width:100px\">";
                echo            "Stock";
                echo        "<td>";
                echo        "<td style=\"width:100px\">";
                echo            "Precio";
                echo        "<td>";
                echo    "<tr>";
                while ($fila = $queryArticulos->fetch_assoc())
                {
                    echo    "<tr>";
                    echo        "<td style=\"width:100px\">";
                    echo            $fila["proid"];
                    echo        "<td>";
                    echo        "<td style=\"width:200px\">";
                    echo             $fila["procodigo"];
                    echo        "<td>";
                    echo        "<td style=\"width:200px\">";
                    echo             $fila["pronombre"];
                    echo        "<td>";
                    echo        "<td style=\"width:100px\">";
                    echo             $fila["canom"];
                    echo        "<td>";
                    echo        "<td style=\"width:100px\">";
                    echo            $fila["prostockactual"];
                    echo        "<td>";
                    echo        "<td style=\"width:100px\">";
                    echo            $fila["proprecio"];
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
                require("plantillaPDF1.php");   
                $pdf= new MiPDF();
                $pdf->AliasNBPages();
                    // para que tome el número de página y salga abajo en el footer
                $pdf->AddPage();
                $pdf->SetFont('Arial','B',12);
                $pdf->SetFillColor(232,232,232);
                    // color de fondo del encabezado
                $pdf->Ln(10);
                    // dejo un espacio de 10
                $pdf->Cell(20, 6, utf8_decode('Id'), 1, 0, 'C', 1);
                $pdf->Cell(40, 6, 'Codigo', 1, 0, 'C', 1);
                $pdf->Cell(60, 6, 'Nombre', 1, 0, 'C', 1);
                $pdf->Cell(30, 6, 'Categorias', 1, 0, 'C', 1);
                $pdf->Cell(20, 6, 'Stock', 1, 0, 'C', 1);
                $pdf->Cell(20, 6, 'Precio', 1, 1, 'C', 1);
                    // son los Títulos de la tabla
                    //     ancho/ alto/ texto/ borde/ salto de línea/ Centrado

                $sql = "SELECT proid, procodigo, pronombre, canom, prostockactual, proprecio FROM productos INNER JOIN categorias ON 
                productos.caid = categorias.caid";
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
                        $pdf->Cell(20, 6, $fila["proid"], 1, 0, 'C', 1);
                        $pdf->Cell(40, 6, $fila["procodigo"], 1, 0, 'C', 1);
                        $pdf->Cell(60, 6, $fila["pronombre"], 1, 0, 'L', 1);
                        $pdf->Cell(30, 6, $fila["canom"], 1, 0, 'C', 1);
                        $pdf->Cell(20, 6, $fila["prostockactual"], 1, 0, 'C', 1);
                        $pdf->Cell(20, 6, $fila["proprecio"], 1, 1, 'C', 1);
                    }
                    $pdf->Output('', 'articulos_completo.pdf');
                    // acá mando la salida y con nombre por defecto como "articulos_completo.pdf"
                    // primer parámetro: nada: muestra el archivo, D muestra para descargarlo
                }
                else    
                    echo 'No hay artículos para mostrar';
            }
            else
            {
                if (isset($_GET['excel'])) 
                {
                    header('Content-type:application/vnd.ms-excel; charset-UT-8');
                    header('Content-Disposition: attachment;filename=articulos_completo.xls');
                    header('Pragma: no-cache');
                    header('Expires: 0');
                    $sql = "SELECT proid, procodigo, pronombre, canom, prostockactual, proprecio FROM productos INNER JOIN marcas ON 
                    productos.caid = categorias.caid";
                    $queryArticulos = $conn->query($sql);
                    if ($queryArticulos->num_rows > 0)
                    {
                        echo "<table border-\"0\"; border-color- \"black\">";
                        echo    "<tr style=\"background-color: beige\">";
                        echo        "<td style=\"width:100px\">";
                        echo            "Id";
                        echo        "<td>";
                        echo        "<td style=\"width:150px\">";
                        echo            "Codigo";
                        echo        "<td>";
                        echo        "<td style=\"width:200px\">";
                        echo            "Nombre";
                        echo        "<td>";
                        echo        "<td style=\"width:100px\">";
                        echo            "Categorias";
                        echo        "<td>";
                        echo        "<td style=\"width:100px\">";
                        echo            "Stock";
                        echo        "<td>";
                        echo        "<td style=\"width:100px\">";
                        echo            "Precio";
                        echo        "<td>";
                        echo    "<tr>";
                        while ($fila = $queryArticulos->fetch_assoc())
                        {
                            echo    "<tr>";
                            echo        "<td style=\"width:100px\">";
                            echo            $fila["proid"];
                            echo        "<td>";
                            echo        "<td style=\"width:150px\">";
                            echo             $fila["procodigo"];
                            echo        "<td>";
                            echo        "<td style=\"width:200px\">";
                            echo             $fila["pronombre"];
                            echo        "<td>";
                            echo        "<td style=\"width:100px\">";
                            echo             $fila["canom"];
                            echo        "<td>";
                            echo        "<td style=\"width:100px\">";
                            echo            $fila["prostockactual"];
                            echo        "<td>";
                            echo        "<td style=\"width:100px\">";
                            echo            $fila["proprecio"];
                            echo        "<td>";
                            echo    "<tr>";                                                                    
                        }
                        echo    "</table>";                                                                    

                    }
                }
            }    
        }    

?>