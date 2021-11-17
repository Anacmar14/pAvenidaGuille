$(document).ready(function () {
    $(document).on("click", "#addGraficar", function () {
        desde = $("#desdeFecha").val();
        hasta =  $("#hastaFecha").val();
        opcion = $("#tipoGrafico").val();
        var objeto = {
        desde: desde,
        hasta: hasta,
        };

        objeto = JSON.stringify(objeto);
        if (opcion == 1) {
            window.location.href = '../../graficas/indexventas.php?fechas='+objeto+'';
        }
        else if (opcion == 2) {
            window.location.href = '../../graficas/indexproductos.php?fechas='+objeto+'';
        } else {
            window.location.href = '../../graficas/indexingresosegresos.php?fechas='+objeto+'';
        }
    });
});