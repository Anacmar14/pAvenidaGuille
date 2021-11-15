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
        }
        else if (entrar == 1){  
          $(".container").css('display', 'none');
          $(".mensajeCajaCerrada").css('display', 'flex');
        }  
        }
      })
      
  var total = 0;
  var id, opcion;
  var arrayObjeto = [];
  var fila;
  var precio;
  tablaProductosComp=0
  var proveedor = 'S/P';
  var objeto = {
    id: 0,
    nombre: 'nombre',
    precio: 'precio',
    cantidad: 'cantidad',
  };
  var banderita = true;
  var valordescuento = 0;
  var banderitaproveedor= true;
  var totalPorProducto = 0;
  var fechadeldia = new Date();
  var fechadeldia = fechadeldia.toLocaleDateString("es-ES");
  var stock = 0;
  reloadTablaHistorial();
  reloadTablaLista();
  $("#home-tab").prop('disabled', true);
  opcion = 4;

  function reloadTablaProductosProv (proveedorQuien) {
    proveedorIde = proveedorQuien
  tablaProductosProv = $("#tablaProductosProv").DataTable({
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
        url: "../../procesos/compras/consProd.php",
        method: "POST", //usamos el metodo POST
        data: { opcion: opcion,
                proveedor: proveedorIde, }, //enviamos opcion 4 para que haga un SELECT
        dataSrc: "",
      },
      columns: [
        { data: "proid" },
        { data: "procodigo" },
        { data: "pronombre" },
        { data: "canom" },
        { data: "prostockactual" },
        { data: "proprecio" },
        { defaultContent:
            "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnAgregarCompra'><i class='material-icons'>add_shopping_cart</i></button>",
        },

      ],
    })
  }

  opcion = 4;
  tablaProveedores = $("#tablaProveedores").DataTable({
      lengthMenu: [[5], [5]],
      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Clientes",
        "infoEmpty": "Mostrando 0 to 0 of 0 Clientes",
        "infoFiltered": "(Filtrado de _MAX_ total Cliente)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Clientes",
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
        url: "../../procesos/compras/consProveedores.php",
        method: "POST", //usamos el metodo POST
        data: { opcion: opcion }, //enviamos opcion 4 para que haga un SELECT
        dataSrc: "",
      },
      columns: [
        { data: "provid" },
        { data: "provnom" },
        { data: "provemail" },
        { data: "provdire" },
        { data: "provtele" },
        { defaultContent:
            "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnAgregarProv'><i class='material-icons'>done</i></button>",
        },

      ],
    });

    function reloadTablaHistorial() {
      opcion = 8;
      tablaHistorialCompras = $("#tablaHistorialCompras").DataTable({
        language: {
          "decimal": "",
          "emptyTable": "No hay información",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Ventas",
          "infoEmpty": "Mostrando 0 to 0 of 0 Ventas",
          "infoFiltered": "(Filtrado de _MAX_ total Venta)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ Ventas",
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
        responsive: "true",
          dom: 'Bfrtilp',       
          buttons:[ 
          {
            extend:    'excelHtml5',
            text:      '<i class="fas fa-file-excel"></i> ',
            titleAttr: 'Exportar a Excel',
            className: 'btn btn-success',
            exportOptions: {
                columns: [ 0, 1, 2, 3]
            },
          },
          {
            extend:    'pdfHtml5',
            text:      '<i class="fas fa-file-pdf"></i> ',
            titleAttr: 'Exportar a PDF',
            className: 'btn btn-danger',
            exportOptions: {
                columns: [ 0, 1, 2, 3]
            },
          },
          {
            extend:    'print',
            text:      '<i class="fa fa-print"></i> ',
            titleAttr: 'Imprimir',
            className: 'btn btn-info',
            exportOptions: {
                columns: [ 0, 1, 2, 3]
            },
          },
        ],
        ajax: {
          url: "../../procesos/compras/consCompras.php",
          method: "POST", //usamos el metodo POST
          data: { opcion: opcion }, //enviamos opcion 4 para que haga un SELECT
          dataSrc: "",
        },
        columns: [
          { data: "fcid" },
          { data: "cjid"},
          { data: "fcfechahora" },
          { data: "provnom" },
          { data: "fctotal" },
          { defaultContent:
              "<div class='dt-buttons btn-group style='flex-wrap: nowrap' '><button class='btn btn-primary btn-sm btnVerMasDetalleCompras' title='Ver Mas'><i class='material-icons'>remove_red_eye</i></button><div class='oc'></div>",
          },

        ],
      });
    }

    function reloadTablaLista() {
      opcion = 4;
      tablaHistorialCompras = $("#tablaComprasLista").DataTable({
        language: {
          "decimal": "",
          "emptyTable": "No hay información",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Ventas",
          "infoEmpty": "Mostrando 0 to 0 of 0 Ventas",
          "infoFiltered": "(Filtrado de _MAX_ total Venta)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ Ventas",
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
        responsive: "true",
          dom: 'Bfrtilp',       
          buttons:[ 
          {
            extend:    'excelHtml5',
            text:      '<i class="fas fa-file-excel"></i> ',
            titleAttr: 'Exportar a Excel',
            className: 'btn btn-success',
            exportOptions: {
                columns: [ 0, 1, 2, 3]
            },
          },
          {
            extend:    'pdfHtml5',
            text:      '<i class="fas fa-file-pdf"></i> ',
            titleAttr: 'Exportar a PDF',
            className: 'btn btn-danger',
            exportOptions: {
                columns: [ 0, 1, 2, 3]
            },
          },
          {
            extend:    'print',
            text:      '<i class="fa fa-print"></i> ',
            titleAttr: 'Imprimir',
            className: 'btn btn-info',
            exportOptions: {
                columns: [ 0, 1, 2, 3]
            },
          },
        ],
        ajax: {
          url: "../../procesos/compras/consCompras.php",
          method: "POST", //usamos el metodo POST
          data: { opcion: opcion }, //enviamos opcion 4 para que haga un SELECT
          dataSrc: "",
        },
        columns: [
          { data: "fcid" },
          { data: "cjid"},
          { data: "fcfechahora" },
          { data: "provnom" },
          { data: "fctotal" },
          { defaultContent:
              "<div class='dt-buttons btn-group style='flex-wrap: nowrap' '><button class='btn btn-secondary btn-sm btnEditarCompra' title='Editar Compra'><i class='material-icons'>edit</i></button><button class='btn btn-primary btn-sm btnVerMasDetalleCompras' title='Ver Mas'><i class='material-icons'>remove_red_eye</i></button><div class='oc'><button class='btn btn-danger btn-sm btnOcultarCompra' title='Anular Compra'><i class='material-icons'>block</i></button></div><button class='btn btn-success btn-sm btnConfirmarCompra' title='Confirmar compra'><i class='material-icons'>check</i></button></div>",
          },

        ],
      });
    }

    $.ajax({
      url: "../../procesos/compras/consUsuario.php",
      type: "POST",
      datatype: "JSON",
      data: {},
      success: function (data) {
        result = JSON.parse(data);
        if (result == 1){
          $('#tablaHistorialCompras').DataTable().destroy();
          $('#tablaHistorialCompras').DataTable( {
              "pagingType": "full_numbers",
              "columnDefs": [
                  {
                      "targets": [ 1 ],
                      "visible": false,
                      "searchable": false
                  },
              ]
          } );
        }
      }
    }); 

    $.ajax({
      url: "../../procesos/compras/consUsuario.php",
      type: "POST",
      datatype: "JSON",
      data: {},
      success: function (data) {
        result = JSON.parse(data);
        if (result == 1){
          $('#tablaComprasLista').DataTable().destroy();
          $('#tablaComprasLista').DataTable( {
              "pagingType": "full_numbers",
              "columnDefs": [
                  {
                      "targets": [ 1 ],
                      "visible": false,
                      "searchable": false
                  },
              ]
          } );
        }
      }
    }); 

    $(document).on("click", ".btnConfirmarCompra", function () {
      fila = $(this).closest("tr");
      id = parseInt(fila.find("td:eq(0)").text());
      folio = id;
      opcion = 5;
      $.ajax({
        url: "../../procesos/compras/consCompras.php",
        type: "POST",
        datatype: "JSON",
        data: { opcion: opcion,
          folio: folio
        },
        success: function (data) {
          result = JSON.parse(data);
          info = result[0].chequeo;
          if (info == 1){
            alert('Ya se sumo al stock el folio numero '+folio+ ' anteriormente');
          }
          else{
            opcion = 6;
            $.ajax({
              url: "../../procesos/compras/consCompras.php",
              type: "POST",
              datatype: "JSON",
              data: { opcion: opcion,
                folio: folio
              },
              success: function (data) {
                result = JSON.parse(data);
                  for (let i = 0; i < result.length; i++) {

                    let id = result[i].proid;
                    let cantidad = result[i].dccantidad;
                    actualizarStock(id,cantidad);
                  }
                  alert('Stock actualizado satisfactoriamente')
                  opcion = 7;
                  $.ajax({
                    url: "../../procesos/compras/consCompras.php",
                    type: "POST",
                    datatype: "JSON",
                    data: { opcion: opcion,
                      folio: folio
                    },
                  }) 
              }
            }) 
          }
        }
      }) 
    })

    $(document).on("click", ".btnOcultarCompra", function () {
      fila = $(this).closest("tr");
      id = parseInt(fila.find("td:eq(0)").text());
      folio = id;
      opcion = 1;
      $.ajax({
        url: "../../procesos/compras/consCompras.php",
        type: "POST",
        datatype: "JSON",
        data: { opcion: opcion,
          folio: folio
        },
        success: function (data) {
          console.log('aquitoy')
          $('#tablaHistorialCompras').DataTable().destroy();
          $('#tablaComprasLista').DataTable().destroy();
          reloadTablaHistorial();
          reloadTablaLista();
        }
      }) 
    })

  $(document).on("click", ".btnVerMasDetalleCompras", function () {
      fila = $(this).closest("tr");
      id = parseInt(fila.find("td:eq(0)").text());
      folio = id;

      opcion = 3;
      tablaCompras = $("#tablaHistorialComprasDos").DataTable({
        language: {
          "decimal": "",
          "emptyTable": "No hay información",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Ventas",
          "infoEmpty": "Mostrando 0 to 0 of 0 Ventas",
          "infoFiltered": "(Filtrado de _MAX_ total Venta)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ Ventas",
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
          url: "../../procesos/compras/consCompras.php",
          method: "POST", //usamos el metodo POST
          data: { opcion: opcion,
                  folio: folio,
                 }, //enviamos opcion 4 para que haga un SELECT
          dataSrc: "",
        },
        columns: [
          { data: "dcorden" },
          { data: "pronombre" },
          { data: "dccantidad" },
          { data: "dcpreciounitario" },
          { data: "dcpreciototal" },
        ],
      });

      opcion = 2;
      $.ajax({
        url: "../../procesos/compras/consCompras.php",
        type: "POST",
        datatype: "JSON",
        data: {
          opcion:opcion,
          folio: folio,
        },
        success: function (data) {
          resultado = JSON.parse(data);
          totalDetalleCompras = resultado[0].fctotal;
          $("#totalModalCompras").html("<div class='d-flex justify-content-end'><div class='totalDivCol'><div class='input-group-prepend'><span class='input-group-text'>TOTAL:</span></div><label id='totalModalLabel' class='form-control'>"+totalDetalleCompras+"</label></div></div>");
         
        }
      }); 
      $("#backModalCompras").css('display', 'flex');
  })

  $(document).on("click", ".btnAgregarProv", function () {
    banderitaproveedor=false;
    fila = $(this).closest("tr");
    id = parseInt(fila.find("td:eq(0)").text());
    nombre = fila.find("td:eq(1)").text();
    proveedor=nombre;
    proveedorId=id;
    agregarProv();
    $("#home-tab").prop('disabled', false);
    $("#mensaje").css("display", 'none');
    $('#tablaProductosProv').DataTable().destroy();
    reloadTablaProductosProv (proveedorId);
  })
  // REEMPLAZAR Prov
  function agregarProv() {
    document.getElementById("tablaProveedorProv").innerHTML =""+proveedor+"";
  }

  $(document).on("click", "#btnCambiarProveedor", function () {
    location.reload();
  });


  //AGREGAR PROD
  var cantidad = 1;
  var numerofila = 1;
  $(document).on("click", ".btnAgregarCompra", function () {
      $("#profile-tab").prop('disabled', true);
      $("#mensaje2").css("display", 'block');
      $("#btnCambiarProveedor").css("display", 'block');
        fila = $(this).closest("tr");
        idv = parseInt(fila.find("td:eq(0)").text());
        nombre = fila.find("td:eq(2)").text();
        precio = parseInt(fila.find("td:eq(5)").text());

          objeto = {
            id: idv,
            nombre: nombre,
            precio: precio,
            cantidad: cantidad,
          };


          if(arrayObjeto.length === 0){
            agregarProd(idv)
            banderita = false;
          }else{
            for(i = 0; i < arrayObjeto.length ; i++){
              if(arrayObjeto[i].id === objeto.id){
                alert('Tu objeto ya existe en la tabla');
                banderita = false;
              }
            }
          }
          if(banderita){
            agregarProd(idv)
          }          
          banderita = true;
      });
    
//ELIMINAR CAMPOS TABLA PRODUCTOSCOMP
    $(document).on("click", ".btnEliminarComp", function () { 
    fila = $(this).closest("tr");
    precio2 = parseInt(fila.find("td:eq(1)").text());
    numeroparaborrarfila = fila.find("td:eq(3)").text();
    total = total - precio2;
    document.getElementById("total").innerHTML = ""+total;
    borrarfila = "borrarfila"+numeroparaborrarfila;

    idproducto = parseInt(fila.find("td:eq(4)").text());
    for (i= 0 ; i < arrayObjeto.length ; i++)
    {
      if(arrayObjeto[i].id == idproducto)
      {
        if (arrayObjeto.length == 1)
        {
          arrayObjeto = [];
        }
        arrayObjeto.splice(i,1);
        
        reloadTotal();
      }
    }
    reloadTable();
    });

  //FINALIZAR
  $(document).on("click", "#botoncModal", function () {
    $("#backModalDos").css('display', 'flex');
    //CREACION DE CABEZA DE VENTA
    if(banderitaproveedor){  
      proveedorId=0;
    }
    
    opcion = 10;
    $.ajax({
      url: "../../procesos/cajas/consCaja.php",
      type: "POST",
      datatype: "JSON",
      data: { opcion: opcion,
      },
      success: function (data) {
        result = JSON.parse(data);
        cjid = result[0].cajahoy;

      var opcion = 5;
      $.ajax({
        url:"../../procesos/compras/consProd.php",
        type:"POST",
        datatype:"JSON",
        data: {
          proveedor:proveedorId,
          opcion:opcion,
          cjid:cjid
        },
        success: function (data) {
          //CREACION DE DETALLE DE COMPRA
          result = JSON.parse(data);
          factura = result[0].factura;
          let orden = 1;
          for (let i = 0; i < arrayObjeto.length; i++) {

            let id = arrayObjeto[i].id;
            let precio = arrayObjeto[i].precio;
            let cantidad = arrayObjeto[i].cantidad;
            // actualizarStock(id,cantidad);
            opcion = 6;
              $.ajax({
                url: "../../procesos/compras/consProd.php",
                type: "POST",
                datatype: "JSON",
                data: {
                  opcion:opcion,
                  id:id,
                  precio:precio,
                  cantidad:cantidad,
                  orden:orden,
                  factura:factura,
                },
                success: function (data) {
                  //ACTUALIZACION DE LA CABEZA DE LA COMPRA
                  opcion = 7;
                  $.ajax({
                    url: "../../procesos/compras/consProd.php",
                    type: "POST",
                    datatype: "JSON",
                    data: {
                      opcion:opcion,
                      factura:factura,
                      total: totalPorProducto
                    },
                    success: function (data) {
                      // location.reload();
                    }
                  })
                },
              });
              orden++;
          }
        }
      });
      }
    });
  });

  //IMPRIMIR
  $(document).on("click", "#botonImprimirModal", function () {
    $("#backModal").hide();
    $("#backModalDos").hide();
    location.reload();
  });

  //Keyup de cantidad
  $(document).on("keyup", "#target", function () { 
    fila = $(this).closest("tr");
    valor = parseInt(fila.find("#target").val());
    idproducto = parseInt(fila.find("td:eq(4)").text());
    for (i= 0 ; i < arrayObjeto.length ; i++)
    {
      if(arrayObjeto[i].id == idproducto)
      {
        arrayObjeto[i].cantidad = valor;
      }
    }
    reloadTotal();
  });

  //FUNCION PARA AGREGAR PRODUCTO
  function agregarProd(idv) {
    arrayObjeto.push(objeto);
    reloadTotal();
    reloadTable();
    }

    //FUNCION PARA CARGAR LA TABLA
  function reloadTable(){
    $(".borrarfila").remove();
    for (i= 0 ; i < arrayObjeto.length ; i++)
    {
      tablaProductosComp=document.getElementById("tablaProductosComp").innerHTML +="<tr class='borrarfila' id='borrarfila"+numerofila+"'><td>" +arrayObjeto[i].nombre +" </td> <td>" +arrayObjeto[i].precio +"</td><td> <input id='target' class='form-control-center' value='"+arrayObjeto[i].cantidad+"'> </td> <td>"+numerofila+"</td> <td style='display: none'>" +arrayObjeto[i].id +" </td> <td> <button class='btn btn-danger btn-sm btnEliminarComp'><i class='material-icons'>remove_shopping_cart</i></button> </td></tr>";
    }
  }
  //modal tabla
  $(document).on("click", "#btnFinalizarComp", function () {
    if(arrayObjeto == 0){
      alert('Ingrese los productos')
    }else{

      $("#backModal").css('display', 'flex');;

      //facturagenerica
      opcion=8;
      $.ajax({
        url: "../../procesos/compras/consProd.php",
        type: "POST",
        datatype: "JSON",
        data: {
          opcion:opcion,
        },
        success: function (data) {
          resultFactura = JSON.parse(data);
          facturaGenerica = resultFactura[0].factura;
          facturaGenerica++;
          $("#facturaModal").html("<div class='totalt col-6'><div class='input-group-prepend'><span class='input-group-text'>FACTURA:</span></div><label id='facturaModalLabel' class='form-control'>"+facturaGenerica+"</label></div>");
        }
      });
      $("#fechaDelDiaModal").html("<div class='d-flex justify-content-end p-2'><div class='input-group-prepend'><span class='input-group-text' id='fechaDelDiaModalSpan'>"+fechadeldia+"</span></div></div>");
      $("#proveedorModal").html("<div class='totalt col-6'><div class='input-group-prepend'><span class='input-group-text'>PROVEEDOR:</span></div><label id='proveedorModalLabel' class='form-control'>"+proveedor+"</label></div>");
      $("#subTotalModal").html("<div class='d-flex justify-content-end'><div class='subTotalDivCol'><div class='input-group-prepend'><span class='input-group-text'>SUBTOTAL:</span></div><label id='subTotalModalLabel' class='form-control'>"+subtotal+"</label></div></div>");
      $("#totalModal").html("<div class='d-flex justify-content-end'><div class='totalDivCol'><div class='input-group-prepend'><span class='input-group-text'>TOTAL:</span></div><label id='totalModalLabel' class='form-control'>"+totalPorProducto+"</label></div></div>");
      
      for (i= 0 ; i < arrayObjeto.length ; i++)
      {
        idModalBody=document.getElementById("idModal").innerHTML +="<tr class='modalCerrar'><td>" +arrayObjeto[i].nombre +" </td> <td>" +arrayObjeto[i].precio +"</td><td> <p>"+arrayObjeto[i].cantidad+"</p> </td><td> <p>"+arrayObjeto[i].cantidad * arrayObjeto[i].precio +"</p> </td></tr>";
      }

    }

  })

  //Cerrar drower
  $(document).on("click", "#cerrarDrawer", function () {
    $("#backModal").hide();
    $(".modalCerrar").remove();
    tablaVentas.destroy();
  })

  $(document).on("click", "#cerrarDrawerCompras", function () {
    $("#backModalCompras").hide();
    tablaCompras.destroy();
  })

  $(document).on("click", "#cerrarDrawerCompra", function () {
    $("#backModal").hide();
    location.reload();
  })

  //Cerrar drowerDos
  $(document).on("click", "#cerrarDrawerImprimir", function () {
    $("#backModal").hide();
    $("#backModalDos").hide();
    location.reload();
  })
  //FUNCION PARA CARGAR EL TOTAL DE LA VENTA
  function reloadTotal(valordescuento){
    $("total").remove();
    totalPorProducto = 0;
    subtotal=0;
    for (i= 0 ; i < arrayObjeto.length ; i++)
    {
      totalPorProducto = totalPorProducto + (arrayObjeto[i].precio * arrayObjeto[i].cantidad);
    }
    if (valordescuento != undefined) {
    valordescuento = (valordescuento*totalPorProducto)/100;
    subtotal = totalPorProducto;
    totalPorProducto = totalPorProducto - valordescuento;
    document.getElementById("total").innerHTML = totalPorProducto;
    }
    else {
      subtotal = totalPorProducto;
    }

    if(isNaN(totalPorProducto)){
      reloadTotalVacio()
    }else{
      document.getElementById("total").innerHTML = totalPorProducto;
    }

  }

     //Keyup de descuento
    $(document).on("keyup", "#descuentito", function () {
      valordescuento = parseInt($("#descuentito").val());
      descuento = valordescuento;
      reloadTotal(descuento);
    });

    function reloadTotalVacio() {
      document.getElementById("total").innerHTML = '0';
    }


    function actualizarStock(id,cantidad) {
        opcion = 9;
        id = id;
        cantidad = cantidad;
        $.ajax({
          url: "../../procesos/compras/consProd.php",
          type: "POST",
          datatype: "JSON",
          data: {
            opcion:opcion,
            id: id,
          },
          success: function (data) {
            result = JSON.parse(data);
            stock = result[0].stock;
            opcion = 10;
            resultado = Number(stock) + Number(cantidad);
            $.ajax({
              url: "../../procesos/compras/consProd.php",
              type: "POST",
              datatype: "JSON",
              data: {
                opcion:opcion,
                id: id,
                resultado: resultado,
              },
            }); 
          }
        }); 
    }

});