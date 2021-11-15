$(document).ready(function () {
  var entrar=0;
  opcion = 0;
  $.ajax({
      url:"../../procesos/cajas/consCaja.php",
      type:"POST",
      datatype:"JSON",
      data: {
        opcion: opcion,
      },
      success: function (data) {
      result = JSON.parse(data);
      if (result.length != 0) {
          entrar = result[0].cjcierre;
      }
        if (entrar == 0) {
          $(".container").css('display', 'block');
          var saldoTotal = 0;
          var currentdate = new Date(); 
      
      
          var datetime = currentdate.getDate() + "/"
                      + (currentdate.getMonth()+1)  + "/" 
                      + currentdate.getFullYear() + " -- "  
                      + currentdate.getHours() + ":"  
                      + currentdate.getMinutes() + ":" 
                      + currentdate.getSeconds();
          var result;
          var caja= {
            cjid: 0,
            cjcierre: 0,
            cjmontoincial: 0,
            cjsaldo: 0,
          }
          $('#fechaHora').val(datetime);
          $('#fechaHora').prop("readonly", true);
          nombreCajero()
          function nombreCajero() {
            opcion = 7;
            $.ajax({
              url:"../../procesos/cajas/consCaja.php",
              type:"POST",
              datatype:"JSON",
              data: {
                opcion: opcion,
                datetime: datetime
              },
              success: function (data) {
              result = JSON.parse(data);
              cajeroNombre = result;
              $('#nombreCajero').val(cajeroNombre)
            }
          })
          }
          $('#nombreCajero').prop("readonly", true);
          reloadApertura();
      
          function reloadApertura(){
            opcion = 1;
            $.ajax({
              url:"../../procesos/cajas/consCaja.php",
              type:"POST",
              datatype:"JSON",
              data: {
                opcion: opcion,
              },
              success: function (data) {
                result = JSON.parse(data);
                caja.cjid = result[0].cjid;
                caja.cjcierre = result[0].cjcierre;
                caja.cjmontoincial = result[0].cjmontoincial;
                caja.cjsaldo = result[0].cjsaldo;
                if(caja.cjmontoincial == 0){
                  $("#backModal").css('display', 'flex');
                }
                tablaMovimientos();
                $('.inputMontoInicial').val(caja.cjmontoincial)
                $('.inputCajero').val($('#nombreCajero').val())
                $('.inputFecha').val($('#fechaHora').val())
              }
          })
      
          }
      
          $(document).on("click", "#cajaCerrado", function () {
              $("#CajaCerrada").css('display', 'flex');
          })
        
          $(document).on("click", "#subirCaja", function () {
            opcion = 2;
            $.ajax({
              url:"../../procesos/cajas/consCaja.php",
              type:"POST",
              datatype:"JSON",
              data: {
                opcion: opcion,
                cjid: caja.cjid,
                cjcierre: caja.cjcierre,
                cjmontoincial: caja.cjmontoincial,
                cjsaldo: caja.cjsaldo
              },
              success: function (data) {
              location.reload();
            }
          })
          });
      
          $(document).on("keyup", "#inputApertura", function () { 
            caja.cjmontoincial =  $('#inputApertura').val();
          });
      
          $(document).on("click", "#cajaDetalle", function () {
            $('#tablaCaja').DataTable().destroy();
            opcion = 3;
            tablaProductos = $("#tablaCaja").DataTable({
              lengthMenu: [[5], [5]],
              language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Cajas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Cajas",
                "infoFiltered": "(Filtrado de _MAX_ total Cajas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Cajas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                  }
              },
              ajax: {
                url: "../../procesos/cajas/consCaja.php",
                method: "POST", //usamos el metodo POST
                data: { opcion: opcion }, //enviamos opcion 3
                dataSrc: "",
              },
              columns: [
                { data: "cjid" },
                { data: "cjfecha" },
                { data: "cjmontoincial" },
                { data: "tipocajadesc" },
                { data: "cjsaldo" },
                { data: "cjtoting" },
                { data: "cjtotegr" },
                { data: "cjtotalingmov" },
                { data: "cjtotalegrmov" },
                { data: "cjfechahoracierre" },
                { data: "empnom" },    
              ],
            });
            $("#arqueoCaja").css('display', 'flex');
          });
      
          function tablaMovimientos() {
            opcion = 4;
            tablaProductos = $("#tablaMovimientos").DataTable({
              lengthMenu: [[5], [5]],
              language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "Mostrando 0 to 0 of 0 Productos",
                "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Productos",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                  }
              },
              ajax: {
                url: "../../procesos/cajas/consCaja.php",
                method: "POST", //usamos el metodo POST
                data: { 
                  opcion: opcion,
                  cjid: caja.cjid
                }, //enviamos opcion 3
                dataSrc: "",
              },
              columns: [
                { data: "movid" },
                { data: "movnombre" },
                { data: "movdinero" },
                { data: "movdesc" },
                { defaultContent:
                  "<div class='text-center'><button class='btn btn-danger btn-sm btnEliminarMovimiento'><i class='material-icons'>remove_shopping_cart</i></button></div>",
              }
              ],
            });
            // $.ajax({
            //   url:"../../procesos/cajas/consCaja.php",
            //   type:"POST",
            //   datatype:"JSON",
            //   data: {
            //     opcion: opcion,
            //     cjid: caja.cjid
            //   },
            //   success: function (data) {
            //     result = JSON.parse(data);
            //     totalIngreso = 0;
            //     totalEgreso = 0;
            //     saldoParcial = 0;
            //     saldoTotal = 0;
            //       for (let i = 0; i < result.length; i++) {
            //         if(result[i].movtipo == 1){
            //           totalIngreso = Number(totalIngreso) + Number(result[i].movdinero);
            //         }else{
            //           totalEgreso = Number(result[i].movdinero) + Number(totalEgreso);
            //         }
            //       }
            //     saldoParcial = totalIngreso - totalEgreso;
      
            //     if(saldoParcial<0){
            //       saldoTotal = + caja.cjmontoincial + saldoParcial
            //     }
            //     if(saldoParcial >= 0){
            //       saldoTotal = + caja.cjmontoincial + saldoParcial
            //     }
            //     tipo =  $('.inputSaldo').val(saldoTotal);
            // }
            // })
      
          opcion= 8;
          $.ajax({
              url:"../../procesos/cajas/consCaja.php",
              type:"POST",
              datatype:"JSON",
              data: {
                opcion: opcion,
                cjid: caja.cjid
              },
              success: function (data) {
                result = JSON.parse(data);
                let egresos = result[0].egresos
                let ingresos = result[1].ingresos
                let movimientosingresos = result[2].movimientosingresos
                let movimientosegresos = result[3].movimientosegresos
                $('.inputIngVen').val(ingresos);
                $('.inputEgrComp').val(egresos);
                $('.inputIngMov').val(movimientosingresos);
                $('.inputEgrMov').val(movimientosegresos);
                let saldoTotal = Number(caja.cjmontoincial) + Number(ingresos) + Number(movimientosingresos) - Number(egresos) - Number(movimientosegresos)
                $('.inputSaldo').val(saldoTotal);
            }
          })
      
          }
      
          $(document).on("click", ".btnEliminarMovimiento", function () {
            opcion = 6
            fila = $(this).closest("tr");
            movid = fila.find("td:eq(0)").text();
            $.ajax({
              url:"../../procesos/cajas/consCaja.php",
              type:"POST",
              datatype:"JSON",
              data: {
                opcion: opcion,
                movid: movid,
              },
              success: function (data) {
                $('#tablaMovimientos').DataTable().destroy();
                tablaMovimientos();
            }
          })
        })
      
          $(document).on("click", "#cerrarArqueo", function () {
            $("#arqueoCaja").css('display', 'none');
          })
      
          $(document).on("click", "#cerrarCaja", function () {
            $("#CajaCerrada").css('display', 'none');
          })
      
          $(document).on("click", "#cerrarCajaX", function () {
            $("#CajaCerrada").css('display', 'none');
          })
      
          $(document).on("click", "#addMovimiento", function () {
            tipo = $("#tipoMovimiento:checked").val();
            dinero =  $('#dineroMovimiento').val();
            descripcion =  $('#descripcionMovimiento').val();
            opcion = 5;
            $.ajax({
              url:"../../procesos/cajas/consCaja.php",
              type:"POST",
              datatype:"JSON",
              data: {
                opcion: opcion,
                tipo: tipo,
                dinero:dinero,
                descripcion:descripcion,
                cjid: caja.cjid
              },
              success: function (data) {
              $('#tablaMovimientos').DataTable().destroy();
              tablaMovimientos();
              $("#tipoMovimiento").prop('checked', false);
              $("#descripcionMovimiento").val('');
              $("#dineroMovimiento").val('');
            }
          })
          });
      
          $(document).on("click", "#cajaSi", function () {
            // console.log($('.inputSaldo').val())
            opcion= 8;
            $.ajax({
                url:"../../procesos/cajas/consCaja.php",
                type:"POST",
                datatype:"JSON",
                data: {
                  opcion: opcion,
                  cjid: caja.cjid
                },
                success: function (data) {
                  result = JSON.parse(data);
                  let egresos = result[0].egresos
                  let ingresos = result[1].ingresos
                  let movimientosingresos = result[2].movimientosingresos
                  let movimientosegresos = result[3].movimientosegresos
                  let empid = result[4].empid;
                  let saldo = Number(caja.cjmontoincial) + Number(ingresos) + Number(movimientosingresos) - Number(egresos) - Number(movimientosegresos)
                  opcion= 9;
                  $.ajax({
                    url:"../../procesos/cajas/consCaja.php",
                    type:"POST",
                    datatype:"JSON",
                    data: {
                      opcion: opcion,
                      cjid: caja.cjid,
                      saldo: saldo,
                      ingresos: ingresos,
                      movimientosingresos: movimientosingresos,
                      egresos: egresos,
                      movimientosegresos: movimientosegresos,
                      empid: empid
                    },
                    success: function (data) {   
                      location.reload();
                  }
                })
                  
              }
            })
      
          })
      
        }
        else if (entrar == 1){
          $(".container").css('display', 'none');
          $(".mensajeCajaCerrada").css('display', 'flex');
        }
      }
  })
})
