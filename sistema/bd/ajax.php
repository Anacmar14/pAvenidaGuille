<?php
    include ('db.php');

    if (isset($_POST)) {
        $num = $_POST['num'];
        switch ($num) {
            case 1 :
                {
                    $a = $_POST['nombre'];
                    $query = "SELECT nombre, stockactual, precio FROM articulos WHERE nombre LIKE '$a%'";
                    $result = mysqli_query($conn,$query);

                    while($ver = mysqli_fetch_row($result)) {
                        $json=array(
                            'nombrea' => $ver[0],
                            'stocka' => $ver[1],
                            'precioa' => $ver[2],
                        );
                    }
                    $r = json_encode($json);
                    echo $r;
                }
                break;
            case 2 :
                {
                    $a = $_POST['id'];
                    $query = "SELECT nombre, stockactual, precio FROM articulos WHERE idarticulo LIKE '$a%'";
                    $result = mysqli_query($conn,$query);

                    while($ver = mysqli_fetch_row($result)) {
                        $json=array(
                            'nombrea' => $ver[0],
                            'stocka' => $ver[1],
                            'precioa' => $ver[2],
                        );
                    }
                    $r = json_encode($json);
                    echo $r;
                }
                break;
            case 99 :
                {
                    $c = $_POST['cliente'];
                    $query = "SELECT clid, clnom, clemail, cldire, cltele FROM clientes WHERE clid = '$c'";
                    $result = mysqli_query($conn,$query);
                    $ver = mysqli_fetch_row($result);
                        $json=array(
                            'idc' => $ver[0],
                            'nombrec' => $ver[1],
                            'emailc' => $ver[2],
                            'direc' => $ver[3],
                            'telec' => $ver[4],
                        );
            
                    $r = json_encode($json);
                    echo $r;
                }
                break;
        }
    }
?>