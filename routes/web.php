<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeudaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DeseadoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\ShoppingCartDetailController;
use App\Http\Controllers\NotificacionController;
//hola
Auth::routes();
//-------------VISTAS DE LOS VISITANTES-----------//
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/tienda', [HomeController::class, 'tienda'])->name('home.tienda');
Route::get('/nosotros', [HomeController::class, 'nosotros'])->name('home.nosotros');
Route::get('/contactanos', [HomeController::class, 'contactanos'])->name('home.contactanos');
Route::post('/contactanos/mensaje', [HomeController::class, 'contactanos_mensaje'])->name('home.contactanosMensaje');
Route::get('/detalle/{producto}', [HomeController::class, 'detalle'])->name('home.detalle');
Route::get('/buscar', [HomeController::class, 'filtrado'])->name('home.filtrado');
Route::get('/buscar/categoria/{id}', [HomeController::class, 'filtradoCategoriaSidebar'])->name('home.filtradoCategoria');
Route::get('/buscar/precio', [HomeController::class, 'filtradoPrecioSidebar'])->name('home.filtradoPrecio');
Route::get('/ordenar/productos', [HomeController::class, 'ordenarProductos'])->name('home.ordenarProductos');

Route::post('/payments/pay', [PaymentController::class, 'pay'])->name('pay');
//-------------VISTAS O FUNCIONALIDADES DE LOS CLIENTES YA REGISTRADOS ----------//
Route::group(['middleware' => 'cliente'], function () {
    Route::post('/comentar/{producto}', [ClienteController::class, 'comentar'])->name('cliente.comentar');
    Route::get('/perfil', [ClienteController::class, 'perfil'])->name('cliente.perfil');
    Route::post('/perfil/actualizar-perfil', [ClienteController::class, 'actualizarPerfil'])->name('cliente.actualizarPerfil');
    Route::get('/orden/detalle/{pedido}', [PedidoController::class, 'show'])->name('cliente.show');
    Route::get('/pasarela', [ClienteController::class, 'pasarela'])->name('cliente.pasarela');
    Route::post('/pasarela', [ClienteController::class, 'pagar'])->name('cliente.pagar');
    Route::get('/perfil/pdf/pedido/{id}', [ClienteController::class, 'pdfPedido'])->name('cliente.pdfPedido');
    Route::resource('deseado', DeseadoController::class);
    Route::get('/deseado/eliminar/{id}', [DeseadoController::class, 'eliminar'])->name('deseado.eliminar');
    Route::post('/deseado/pasar-carrito', [DeseadoController::class, 'agregarCarrito'])->name('deseado.agregarCarrito');
});




// RUTAS PARA REDIRECCION AL PAGAR CON PAYPAL
Route::get('/compra/pagada/{pedido}', [ClienteController::class, 'compraPagada'])->name('compra.pagada');
Route::get('/compra/fallida', [ClienteController::class, 'compraFallida'])->name('compra.fallida');


//RUTAS DEL CARRITO DE COMPRA
Route::post('/actualizar-carrito', [ShoppingCartController::class, 'actualizar'])->name('shoppingcart.actualizar');
Route::resource('shopping_cart_detail', ShoppingCartDetailController::class)->only(['update', 'store'])->names('shopping_cart_details');
Route::get('/producto-carrito/retirar/{scd}', [ShoppingCartDetailController::class, 'retirar'])->name('shoppingCartDetail.retirar');
Route::get('/cesta', [ShoppingCartController::class, 'cesta'])->name('shoppingcart.cesta');


//======= RUTAS DE NOTIFICACIONES =========//
Route::get('/notificaciones/todas', [NotificacionController::class, 'ver_todas'])->name('notificacion.todas');
Route::get('marcar_orden_leida/{notificacion_id}/{orden_id}', [NotificacionController::class, 'marcar_orden_leida'])->name('marcar_orden_leida');
Route::get('marcar_pedido_leido/{notificacion_id}/{pedido_id}', [NotificacionController::class, 'marcar_pedido_leido'])->name('marcar_pedido_leido');



//--------------VISTAS O FUNCIONALIDADES PARA LOS ADMINISTRADORES---//
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/dashboard',[AdminController::class,'dash'])->name('admin.dash');
  
    Route::resource('categoria', CategoriaController::class);
    Route::resource('producto', ProductoController::class);
    Route::resource('inventario', InventarioController::class);
    Route::resource('proveedor', ProveedorController::class);
    Route::resource('deuda', DeudaController::class);

    

    Route::get('/notificacion/eliminar/{id}', [NotificacionController::class, 'eliminar'])->name('notificacion.eliminar');

    Route::get('/deuda/abonar/{id}', [DeudaController::class, 'abonarDeuda'])->name('deuda.abonarProveedor');
    Route::get('/deuda/cancelada', [DeudaController::class, 'show'])->name('deuda.cancelada');
    Route::get('/deuda/abonos/{id}', [DeudaController::class, 'verAbonos'])->name('deuda.abonos');
    Route::post('/deuda/abonar', [DeudaController::class, 'guardarAbono'])->name('deuda.guardarAbono');
    Route::get('/deuda/proveedor/{id}', [DeudaController::class, 'deudasByProveedor'])->name('deuda.deudasByProveedor');
    Route::get('/deuda/eliminar/{id}',[DeudaController::class,'eliminarDeuda'])->name('deuda.eliminarDeuda');

 
    Route::post('/productos/inventario/filtro', [ProductoController::class, 'filtrarProductos'])->name('productos.filtrar');
    Route::post('/productos/inventario/filtro2', [ProductoController::class, 'filtrarProductos2'])->name('productos.filtrar2');
    Route::get('/productos/categoria/{id}', [ProductoController::class, 'productosByCategoria'])->name('producto.productosByCategoria');
    Route::post('/productos/filtro', [ProductoController::class, 'productosByCategoriaInventario'])->name('producto.productosByCategoriaInventario');
    Route::get('/productos/inventario/{id}', [ProductoController::class, 'productosByInventario'])->name('producto.productosByInventario');
    Route::get('/pedidos', [AdminController::class, 'pedidos'])->name('admin.pedidos');
    // Route::get('/',[AdminController::class,'fondo'])->name('admin.fondo');
    Route::get('/pedidos-vendedor', [AdminController::class, 'pedidosVendedor'])->name('admin.pedidosVendedor');

    Route::get('/detalle/pedido/{pedido}', [AdminController::class, 'showPedido'])->name('admin.detallePedidos');
    Route::get('/detalle/pedido-vendedor/{id}', [AdminController::class, 'showPedidoVendedor'])->name('admin.detallePedidosVendedor');
    Route::get('/detalle/estado/{id}', [AdminController::class, 'cambiarEstadoPedido'])->name('admin.cambiarEstadoPedido');
    Route::get('/detalle/estadoorden/{id}', [AdminController::class, 'cambiarEstadoOrden'])->name('admin.cambiarEstadoOrden');

    Route::get('/vendedor/agregar', [AdminController::class, 'agregarVendedor'])->name('admin.agregarVendedor');
    Route::post('/vendedor/agregar', [AdminController::class, 'guardarVendedor'])->name('admin.guardarVendedor');
    Route::get('/vendedores/listar', [AdminController::class, 'listarVendedores'])->name('admin.listarVendedores');
    Route::get('/vendedor/{id}/edit', [AdminController::class, 'detallesVendedor'])->name('admin.detallesVendedor');
    Route::post('/vendedor/editar/{id}', [AdminController::class, 'editarVendedor'])->name('admin.editarVendedor');
    Route::post('/vendedor/eliminar/{id}', [AdminController::class, 'eliminarVendedor'])->name('admin.eliminarVendedor');

    //================ RUTAS PARA GESTION DE LA INFORMACION DE LA EMPRESA =====//
    // Route::resource('empresa',EmpresaCotroller::class)->names('empresa');/
    Route::get('/empresa/editar', [EmpresaController::class, 'editar'])->name('empresa.empresaEditar');
    Route::post('/empresa/guardar', [EmpresaController::class, 'guardarDatos'])->name('empresa.guardarDatos');

    Route::get('/miembro/agregar', [AdminController::class, 'agregarMiembro'])->name('admin.agregarMiembro');
    Route::post('/miembro/agregar', [AdminController::class, 'guardarMiembro'])->name('admin.guardarMiembro');
    Route::get('/miembros/listar', [AdminController::class, 'listarMiembros'])->name('admin.listarMiembros');
    Route::get('/miembros/ventas/{id}', [AdminController::class, 'ventasByMiembro'])->name('admin.ventasByMiembro');
    Route::get('/miembro/eliminar/{id}',[AdminController::class,'eliminarMiembro'])->name('admin.eliminarMiembro');
    Route::get('/clientes/abonos', [AdminController::class, 'verAbonos'])->name('admin.verAbonos');
    Route::post('/clientes/abonos', [AdminController::class, 'abonosByCliente'])->name('admin.abonosByCliente');
    Route::get('/clientes/detalle/{id}', [AdminController::class, 'detalleByCliente'])->name('admin.detalleByCliente');


    //============ RUTAS PARA PDFS DEL ADMINISTRADOR =========//
    Route::get('/pdf/cliente/pedido/{id}', [AdminController::class, 'pdfPedidoCliente'])->name('admin.pdfPedidoCliente');
    Route::get('/pdf/cliente/orden/{id}', [AdminController::class, 'pdfOrdenVendedor'])->name('admin.pdfOrdenVendedor');
    Route::get('/pdf/cliente/abono/{idabono}/{idcliente}/{saldo}', [AdminController::class, 'pdfAbono'])->name('admin.pdfAbono');
    Route::get('/pdf/cliente/credito-cancelado/{id}',[AdminController::class,'pdfCreditoCancelado'])->name('admin.pdfCreditoCancelado');
    Route::get('/pdf/productos/{cantidad}',[AdminController::class, 'productos'])->name('admin.pdfProductos');
    Route::get('/pdf/productos/{cantidad}/inventario/{id}',[AdminController::class,'productosByInventario'])->name('admin.pdfProductosByInventario');

    //===========VISTAS PARA EL VENDEDOR, PERO QUE TMBN EL ADMIN TENDRA ACCESO =======//
    Route::get('/venta/agregar', [AdminController::class, 'agregarVenta'])->name('admin.agregarVenta');
    Route::post('/venta/guardar', [AdminController::class, 'guardarVenta'])->name('admin.guardarVenta');
    Route::get('/perfil-vendedor',[AdminController::class,'perfilVendedor'])->name('admin.perfilVendedor');
    Route::get('/ventas/misventas', [AdminController::class, 'misVentas'])->name('admin.misVentas');
    Route::get('/ventas/detalle/{id}', [AdminController::class, 'showVenta'])->name('admin.detalleVenta');
    Route::post('/abonos/abonar', [AdminController::class, 'agregarAbono'])->name('admin.agregarAbono');
    Route::get('/abonos/abonar/{idcliente}/{idorden}', [AdminController::class, 'guardarAbono'])->name('admin.guardarAbono');
    Route::post('/abonos/guardar', [AdminController::class, 'storeAbono'])->name('admin.storeAbono');
    Route::get('/clientes', [AdminController::class, 'verClientes'])->name('admin.verClientes');
    Route::get('/clientes/credito/cancelado', [AdminController::class, 'creditosCancelados'])->name('admin.creditosCancelados');
    Route::get('/clientes/credito/pendiente', [AdminController::class, 'creditosPendientes'])->name('admin.creditosPendientes');
    Route::get('/clientes/ordenes/{id}', [AdminController::class, 'ordenesCliente'])->name('admin.ordenesCliente');
    Route::get('/clientes/credito-cancelado/eliminar/{clienteid}/{ordenid}',[AdminController::class,'eliminarClienteCreditoCancelado'])->name('admin.eliminarClienteCreditoCancelado');

    Route::get('/perfil-administracion',[AdminController::class,'perfilAdministracion'])->name('admin.perfilAdministracion');
    Route::post('/pefil-administracion',[AdminController::class,'updatePerfilAdministracion'])->name('admin.updatePerfilAdministracion');

    //============================================ RUTAS PARA VER LOS MENSAJES DEL FORMULARIO DE CONTACTANOS ============//

    Route::get('/mensajes',[AdminController::class,'verMensajes'])->name('admin.verMensajes');
    Route::get('/mensajes/eliminar/{id}',[AdminController::class,'eliminarMensaje'])->name('admin.eliminarMensaje');

});
