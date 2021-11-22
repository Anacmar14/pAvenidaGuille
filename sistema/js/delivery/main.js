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
          if (entrar == 0) {
            $(".abiertoCaja").css('display', 'block');
          }
          else if (entrar == 1){
            $(".abiertoCaja").css('display', 'none');
            $(".mensajeCajaCerrada").css('display', 'flex');
          }
        }
        else {
            $(".abiertoCaja").css('display', 'none');
            $(".mensajeCajaCerrada").css('display', 'flex');
          }
        
    }
  })

  tablaDeliveryEnProceso();
  tablaDeliveryFinalizada()
  function tablaDeliveryEnProceso() {
    $('#tablaDeliveryEnProceso').DataTable().destroy();
    opcion = 2;
    tablaProductos = $("#tablaDeliveryEnProceso").DataTable({
      lengthMenu: [[5], [5]],
      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Pedidos",
        "infoEmpty": "Mostrando 0 to 0 of 0 Pedidos",
        "infoFiltered": "(Filtrado de _MAX_ total Pedidos)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Pedidos",
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
        url: "../../procesos/delivery/consDelivery.php",
        method: "POST", //usamos el metodo POST
        data: { 
          opcion: opcion,
        }, //enviamos opcion 3
        dataSrc: "",
      },
      columns: [
        { data: "fvid" },
        { data: "empnom" },
        { data: "deliverydireccion" },
        { data: "deliverydescripcion" },
        { data: "created_at" },
        { data: "MinutosReales" },
        { data: "MinutosEntreCA" },
        { data: "updated_at" },
        { data: "MinutosEntreAR" },
        { defaultContent:
          "<div class='text-center'><button class='btn btn-secondary btn-sm btnEditarPedido' title='Editar Pedido'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnEliminarPedido' title='Eliminar Pedido'><i class='material-icons'>delete_outline</i></button></div>",
      }
      ],
    });

  }

  function tablaDeliveryFinalizada() {
    $('#tablaDeliveryFinalizada').DataTable().destroy();
    opcion = 7;
    tablaProductos = $("#tablaDeliveryFinalizada").DataTable({
      lengthMenu: [[5], [5]],
      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Pedidos",
        "infoEmpty": "Mostrando 0 to 0 of 0 Pedidos",
        "infoFiltered": "(Filtrado de _MAX_ total Pedidos)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Pedidos",
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
        url: "../../procesos/delivery/consDelivery.php",
        method: "POST", //usamos el metodo POST
        data: { 
          opcion: opcion,
        }, //enviamos opcion 3
        dataSrc: "",
      },
      columns: [
        { data: "fvid" },
        { data: "empnom" },
        { data: "deliverydireccion" },
        { data: "deliverydescripcion" },
        { data: "created_at" },
        { data: "updated_at" },
      ],
    });

  }

  $(document).on("click", "#addPedidoDelivery", function () {
    deliveryid = $("#idDelivery").val();
    deliverydireccion = $("#deliveryDireccion").val();
    fvid = $("#deliveryFactura").val();

    opcion = 0;
    $.ajax({
        url:"../../procesos/delivery/consDelivery.php",
        type:"POST",
        datatype:"JSON",
        data: {
          opcion: opcion,
          fvid: fvid,
        },
        success: function (data) {
          result = JSON.parse(data)
          tipo = result[0].tipo
          if (tipo == 0) {
            opcion = 1;
            $.ajax({
                url:"../../procesos/delivery/consDelivery.php",
                type:"POST",
                datatype:"JSON",
                data: {
                  opcion: opcion,
                  fvid: fvid,
                  deliveryid: deliveryid,
                  deliverydireccion: deliverydireccion,
                },
                success: function (data) {
                  tablaDeliveryEnProceso();
                  tablaDeliveryFinalizada();
                },
            })
          }
          else if (tipo == 1) {
            alert('Ya se asigno esta venta a una mesa')
          }
          else {
            alert('Ya se asigno esta venta a un delivery')
          }
        },
    })

    $("#idDelivery").val('');
    $("#deliveryDireccion").val('');
    $("#deliveryFactura").val('');
  });

  $(document).on("click", ".btnEditarPedido", function () {
    opcion = 3
    fila = $(this).closest("tr");
    fvid = fila.find("td:eq(0)").text();
    $.ajax({
        url:"../../procesos/delivery/consDelivery.php",
        type:"POST",
        datatype:"JSON",
        data: {
          opcion: opcion,
          fvid: fvid,
        },
        success: function (data) {
          result = JSON.parse(data)
          numeroestadoactual = result[0].deliveryestado
          estadoactual = result[0].deliverydescripcion
          factura = result[0].fvid
          $("#numeroDePedido").html(factura);
          $("#numeroDeFactura").val(factura);
          $("#deliveryEstadoActual").val(estadoactual);
          $("#DeliveryModal").css('display', 'flex');
        }
    })
  });

  $(document).on("click", "#TerminarDeEditarPedido", function () {
    factura = $("#numeroDeFactura").val();
    estadoactual = $("#deliveryEstadoActual").val();
    estadonuevo = $("#deliveryEstadoNuevo").val();
    console.log(estadonuevo)
    if (estadonuevo != 4){
    opcion = 4
      $.ajax({
        url:"../../procesos/delivery/consDelivery.php",
        type:"POST",
        datatype:"JSON",
        data: {
          opcion: opcion,
          fvid: factura,
          estado: estadonuevo,
        },
        success: function (data) {
          $("#DeliveryModal").css('display', 'none');
          $("#deliveryEstadoNuevo").val('');
          tablaDeliveryEnProceso();
          tablaDeliveryFinalizada();
        }
      })
    }
    else {
      opcion = 6
      $.ajax({
        url:"../../procesos/delivery/consDelivery.php",
        type:"POST",
        datatype:"JSON",
        data: {
          opcion: opcion,
          fvid: factura,
          estado: estadonuevo,
        },
        success: function (data) {
          $("#DeliveryModal").css('display', 'none');
          $("#deliveryEstadoNuevo").val('');
          tablaDeliveryEnProceso();
          tablaDeliveryFinalizada();
        }
      })
    } 
  })

  $(document).on("click", "#cerrarDelivery", function () {
    $("#DeliveryModal").css('display', 'none');
    $("#deliveryEstadoNuevo").val('');
  })

  $(document).on("click", ".btnEliminarPedido", function () {
    opcion = 5
    fila = $(this).closest("tr");
    fvid = fila.find("td:eq(0)").text();
    $.ajax({
      url:"../../procesos/delivery/consDelivery.php",
      type:"POST",
      datatype:"JSON",
      data: {
        opcion: opcion,
        fvid: fvid,
      },
      success: function (data) {
        tablaDeliveryEnProceso();
        tablaDeliveryFinalizada();
    }
  })
})

})
