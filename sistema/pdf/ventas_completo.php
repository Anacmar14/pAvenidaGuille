<?php

    // Inserto el código del archivo conxiondb_agenda que tiene la conexión a la base de datos
    require('../test/db.php');

    // si el formulario ha sido enviado procesa los datos del formulario                        
    if (isset($_GET['web'])) 
        {
            $variable = $_GET['web'];
            $sql="SELECT fvid, fvfechahora, fvtotal, clnom FROM facturaventas INNER JOIN clientes ON facturaventas.clid = clientes.clid AND fvid = '$variable'";
            $queryArticulos = $conn->query($sql);
            if ($queryArticulos->num_rows > 0)
            {
                echo "<h2>DATOS DEL FOLIO</h2>";
                echo "<table border-\"0\"; border-color- \"black\">";
                echo    "<tr style=\"background-color: beige\">";
                echo        "<td style=\"width:100px\">";
                echo            "Folio";
                echo        "<td>";
                echo        "<td style=\"width:200px\">";
                echo            "Fecha";
                echo        "<td>";
                echo        "<td style=\"width:200px\">";
                echo            "Cliente";
                echo        "<td>";
                echo        "<td style=\"width:150px\">";
                echo            "Total";
                echo        "<td>";
                echo    "<tr>";
                while ($fila = $queryArticulos->fetch_assoc())
                {
                    echo    "<tr>";
                    echo        "<td style=\"width:100px\">";
                    echo            $fila["fvid"];
                    echo        "<td>";
                    echo        "<td style=\"width:200px\">";
                    echo             $fila["fvfechahora"];
                    echo        "<td>";
                    echo        "<td style=\"width:200px\">";
                    echo            $fila["clnom"];
                    echo        "<td>";
                    echo        "<td style=\"width:150px\">";
                    echo            $fila["fvtotal"];
                    echo        "<td>";
                    echo    "<tr>";                                                                    
                }
                echo    "</table>";           
            }
            $sql2="SELECT detalleventas.idarticulo, articulos.nombre, dvcantidad, dvprecio FROM detalleventas INNER JOIN  articulos ON detalleventas.idarticulo = articulos.idarticulo AND fvid = '$variable' GROUP BY dvorden";
            $queryArticulos = $conn->query($sql2);
            if ($queryArticulos->num_rows > 0)
            {
                echo "<h4>LISTA DE COMPRAS</h4>";
                echo "<table border-\"0\"; border-color- \"black\">";
                echo    "<tr style=\"background-color: beige\">";
                echo        "<td style=\"width:100px\">";
                echo            "Id";
                echo        "<td>";
                echo        "<td style=\"width:200px\">";
                echo            "Nombre Producto";
                echo        "<td>";
                echo        "<td style=\"width:200px\">";
                echo            "Cantidad";
                echo        "<td>";
                echo        "<td style=\"width:150px\">";
                echo            "Precio";
                echo        "<td>";
                echo    "<tr>";
                while ($fila = $queryArticulos->fetch_assoc())
                {
                    echo    "<tr>";
                    echo        "<td style=\"width:100px\">";
                    echo            $fila["idarticulo"];
                    echo        "<td>";
                    echo        "<td style=\"width:200px\">";
                    echo             $fila["nombre"];
                    echo        "<td>";
                    echo        "<td style=\"width:200px\">";
                    echo            $fila["dvcantidad"];
                    echo        "<td>";
                    echo        "<td style=\"width:150px\">";
                    echo            $fila["dvprecio"];
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
                $variable = $_GET['pdf'];
                require("plantillaPDF6.php");   
                $pdf= new MiPDF();
                $pdf->AliasNBPages();
                    // para que tome el número de página y salga abajo en el footer
                $pdf->AddPage();
                $pdf->SetFont('Arial','B',12);
                $pdf->SetFillColor(232,232,232);
                    // color de fondo del encabezado
                $pdf->Ln(10);
                    // dejo un espacio de 10
                $pdf->Cell(25, 6, utf8_decode('Folio'), 1, 0, 'C', 1);
                $pdf->Cell(40, 6, 'Fecha', 1, 0, 'C', 1);
                $pdf->Cell(60, 6, 'Cliente', 1, 0, 'C', 1);
                $pdf->Cell(40, 6, 'Total', 1, 1, 'C', 1);
                    // son los Títulos de la tabla
                    //     ancho/ alto/ texto/ borde/ salto de línea/ Centrado

                $sql="SELECT fvid, fvfechahora, fvtotal, clnom FROM facturaventas INNER JOIN clientes ON facturaventas.clid = clientes.clid AND fvid = '$variable'";
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
                        $pdf->Cell(25, 6, $fila["fvid"], 1, 0, 'C', 1);
                        $pdf->Cell(40, 6, $fila["fvfechahora"], 1, 0, 'C', 1);
                        $pdf->Cell(60, 6, $fila["clnom"], 1, 0, 'C', 1);
                        $pdf->Cell(40, 6, $fila["fvtotal"], 1, 0, 'C', 1);
                    }
                    $pdf->Output('', 'ventas_completa.pdf');
                    // acá mando la salida y con nombre por defecto como "usuarios_completo.pdf"
                    // primer parámetro: nada: muestra el archivo, D muestra para descargarlo
                }
            }
            else
            {
                if (isset($_GET['ticket'])) 
                {
                    $variable = $_GET['ticket'];
                    $sql="SELECT fvid, fvfechahora, fvtotal, clnom FROM facturaventas INNER JOIN clientes ON facturaventas.clid = clientes.clid AND fvid = '$variable'";
                    $queryArticulos = $conn->query($sql);
                    if ($queryArticulos->num_rows > 0)
                    {
                        echo "<h2>DATOS DEL FOLIO</h2>";
                        echo "<table border-\"0\"; border-color- \"black\">";
                        echo    "<tr style=\"background-color: beige\">";
                        echo        "<td style=\"width:100px\">";
                        echo            "Folio";
                        echo        "<td>";
                        echo        "<td style=\"width:200px\">";
                        echo            "Fecha";
                        echo        "<td>";
                        echo        "<td style=\"width:200px\">";
                        echo            "Cliente";
                        echo        "<td>";
                        echo        "<td style=\"width:150px\">";
                        echo            "Total";
                        echo        "<td>";
                        echo    "<tr>";
                        while ($fila = $queryArticulos->fetch_assoc())
                        {
                            echo    "<tr>";
                            echo        "<td style=\"width:100px\">";
                            echo            $fila["fvid"];
                            echo        "<td>";
                            echo        "<td style=\"width:200px\">";
                            echo             $fila["fvfechahora"];
                            echo        "<td>";
                            echo        "<td style=\"width:200px\">";
                            echo            $fila["clnom"];
                            echo        "<td>";
                            echo        "<td style=\"width:150px\">";
                            echo            $fila["fvtotal"];
                            echo        "<td>";
                            echo    "<tr>";                                                                    
                        }
                        echo    "</table>";           
                    }
                    $sql2="SELECT detalleventas.idarticulo, articulos.nombre, dvcantidad, dvprecio FROM detalleventas INNER JOIN  articulos ON detalleventas.idarticulo = articulos.idarticulo AND fvid = '$variable' GROUP BY dvorden";
                    $queryArticulos = $conn->query($sql2);
                    if ($queryArticulos->num_rows > 0)
                    {
                        echo "<h4>LISTA DE COMPRAS</h4>";
                        echo "<table border-\"0\"; border-color- \"black\">";
                        echo    "<tr style=\"background-color: beige\">";
                        echo        "<td style=\"width:100px\">";
                        echo            "Id";
                        echo        "<td>";
                        echo        "<td style=\"width:200px\">";
                        echo            "Nombre Producto";
                        echo        "<td>";
                        echo        "<td style=\"width:200px\">";
                        echo            "Cantidad";
                        echo        "<td>";
                        echo        "<td style=\"width:150px\">";
                        echo            "Precio";
                        echo        "<td>";
                        echo    "<tr>";
                        while ($fila = $queryArticulos->fetch_assoc())
                        {
                            echo    "<tr>";
                            echo        "<td style=\"width:100px\">";
                            echo            $fila["idarticulo"];
                            echo        "<td>";
                            echo        "<td style=\"width:200px\">";
                            echo             $fila["nombre"];
                            echo        "<td>";
                            echo        "<td style=\"width:200px\">";
                            echo            $fila["dvcantidad"];
                            echo        "<td>";
                            echo        "<td style=\"width:150px\">";
                            echo            $fila["dvprecio"];
                            echo        "<td>";
                            echo    "<tr>";                                                                    
                        }
                        echo    "</table>";           
                    }
                }
            }    
        }    

?>