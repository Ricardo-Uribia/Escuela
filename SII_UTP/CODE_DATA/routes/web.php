<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/prueba', function () { 
    return view('p');
});



//package agregado 
// https://github.com/barryvdh/laravel-dompdf

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/doLogin', 'Auth\\LoginController@doLogin')->name('doLogin');


Route::group(['middleware' => ['admin', 'auth'], 'namespace' => 'Backend\Administrador'], function(){
    Route::get('/admin/index', 'AdminPerfilController@index');
    Route::get('/admin/administrar/usuario', 'AdminPerfilController@addUserSystem');
    Route::get('/admin/get-usuarios/{tipo}', 'AdminPerfilController@getUpdate');
    //Route::post('/admin/get-usuarios/', 'AdminPerfilController@getUpdate');
    Route::get('/admin/getInfoUser/{id}', 'AdminPerfilController@getInfoUser' );
    Route::post('/admin/edit_profile', 'AdminPerfilController@update');
    Route::post('/admin/addUserSystem', 'AdminPerfilController@addUserSystem1')->name('register1');
});

/*Inicio de Rutas del módulo de configuración*/
Route::group(['middleware' => ['admin', 'auth'], 'namespace' => 'Backend\Configuracion'], function () {
    /*Rutas de configuracion de ciclos*/
    Route::view('/admin/configuracion/general', 'Backend/Configuracion.index');
    Route::get('/admin/ciclos/index', 'CiclosController@index');
    Route::get('/admin/ciclos/createForm', 'CiclosController@createForm');
    Route::post('/admin/ciclos/create', 'CiclosController@create')->name('form-ciclo');
    Route::get('/admin/config-ciclo/updateForm/{id}', 'CiclosController@updateForm');
    Route::post('/admin/config-ciclo/update/{id}', 'CiclosController@update');
    Route::get('/admin/config-ciclo/delete/{id}', 'CiclosController@delete');

    /*Rutas de configuracion de niveles*/
    Route::get('/admin/niveles/index', 'NivelesController@index');
    Route::get('/admin/niveles/createForm', 'NivelesController@createForm');
    Route::post('/admin/niveles/create', 'NivelesController@createNivel')->name('form-nivel');
    Route::post('/admin/carrera/create', 'NivelesController@create')->name('form-carrera');
    Route::get('/admin/config-carrera/updateForm/{id}', 'NivelesController@updateForm');
    Route::post('/admin/config-carrera/update/{id}', 'NivelesController@update');
    Route::get('/admin/config-carrera/delete/{id}', 'NivelesController@delete');


    /*Rutas de configuracion de cuentas*/
    Route::get('/admin/cuentas/index', 'CuentasController@index');
    Route::get('/admin/cuentas/createForm', 'CuentasController@createForm');
    Route::post('/admin/cuentas/create', 'CuentasController@create')->name('form-cuenta');
    Route::get('/admin/config-cuenta/updateForm/{id}', 'CuentasController@updateForm');
    Route::post('/admin/config-cuenta/update/{id}', 'CuentasController@update');
    Route::get('/admin/config-cuenta/delete/{id}', 'CuentasController@delete');

    /*Rutas de configuracion de cajas*/
    Route::get('/admin/cajas/index', 'CajasController@index');
    Route::get('/admin/cajas/createForm', 'CajasController@createForm');
    Route::post('/admin/cajas/create', 'CajasController@create')->name('form-caja');
    Route::get('/admin/config-caja/updateForm/{id}', 'CajasController@updateForm');
    Route::post('/admin/config-caja/update/{id}', 'CajasController@update');
    Route::get('/admin/config-caja/delete/{id}', 'CajasController@delete');

    //Rutas de uso general "any"
    Route::get('/any/select/work/ciclo/{id}', 'CiclosController@keepCiclo');
    Route::get('/any/fetch/ciclos', 'CiclosController@fetch');
});
/*Fin de rutas del módulo de configuración*/

/*Inicio de Rutas del módulo de empleados*/
Route::group(['middleware' => ['admin', 'auth'], 'namespace' => 'Backend\Empleados'], function(){
    Route::get('/admin/list-empleados', 'EmpleadosController@index');
    Route::get('/admin/empleado/createForm' , 'EmpleadosController@createForm')->name('form-empleado');
    Route::post('/admin/empleado/create', 'EmpleadosController@create')->name('add-employee');
    Route::get('/admin/edit-empleado-form/{id}', 'EmpleadosController@updateForm');
    Route::post('/admin/edit-empleado', 'EmpleadosController@update');
    Route::get('/admin/delete-empleado/{id}', 'EmpleadosController@destroy');
});
/*Fin de rutas del módulo de empleados*/


/*Inicio de Rutas del módulo de Cobranza*/
Route::group(['middleware' => ['auth','admin'], 'namespace' => 'Backend\Cobranza'], function(){
    /*Rutas del submodulo conceptos de pago*/
    Route::get('/admin/conceptos/cobro', 'ConceptosPagoController@index');
    Route::get('/admin/create/concepto/pago', 'ConceptosPagoController@createForm');
    Route::post('/admin/create/concepto/pago', 'ConceptosPagoController@create')->name('createConcepto');
    Route::post('/admin/config/concepto/', 'ConceptosPagoController@updateForm');
    Route::post('/admin/config/concepto/update', 'ConceptosPagoController@update')->name('updateConcepto');
    Route::get('/admin/config/delete/concepto/{id}', 'ConceptosPagoController@destroy');
/*Fin del submodulo de conceptos de pago*/
/*Rutas del submodulo de planes de pago*/
    Route::get('/admin/planes/pago', 'PlanesPagoController@index');
    Route::post('/admin/create/planpago', 'PlanesPagoController@create')->name('/admin/create/planpago');
    Route::get('/admin/configuracion/planpago', 'PlanesPagoController@registerContinue');
    Route::post('/admin/update/plan', 'PlanesPagoController@updateForm')->name('/admin/plan_edit');
    Route::post('/admin/update/planpago', 'PlanesPagoController@update')->name('updated_planpago');
    Route::post('/admin/details/planpago', 'PlanesPagoController@details')->name('details-plan');
     Route::get('/admin/planpago/delete/{id}', 'PlanesPagoController@destroy');
     Route::post('/admin/edit/planpago', 'PlanesPagoController@edit');

/*Fin del submodulo de planes de estudio*/
/*Rutas del submodulo de cuentas*/
    Route::get('/admin/crearcxc/alumno', 'PedidosController@createForm');
    Route::get('/admin/crearcxc/index', 'PedidosController@index');
    Route::post('/admin/search/alumno', 'PedidosController@search');
    Route::post('/admin/crearcxc/alumn', 'PedidosController@create');
    Route::post('/admin/view/cxc/alumno', 'PedidosController@details');
    Route::post('/admin/delete/alumn-cxc', 'PedidosController@delete');
/*Fin del submodulo de asignacion de cuentas*/
/*Rutas cobranza*/
    Route::get('/admin/cobranza/', 'CobranzaController@collectionPlans');
    Route::post('/admin/al', 'CobranzaController@buscarPlanPagoAlumno')->name('buscarAlumno');
    Route::get('/admin/ca/{id}', 'CobranzaController@getCaja');
    Route::post('/admin/cobrar/pago', 'CobranzaController@registrarPago')->name('cobrar-plan');
    Route::post('/admin/cobrar/conceptos', 'CobranzaController@')->name('cobrar-concepto');
    Route::get('/remover-item/{id}', 'CarritoController@actionDeleteShopCart')->name('eliminar-producto');
    Route::post('/prueba', 'CarritoController@actionShopCart')->name('prueba');
    Route::post('/prueba/delete', 'CobranzaController@prueba123');
    Route::get('/admin/cobranza/conceptos/esporadicos/', 'CobranzaController@collectionConcepts');
});

Route::group(['middleware' => 'admin', 'namespace' => 'Backend\Alumnos'], function () {
    Route::get('/admin/alumnos/index', 'AlumnosController@index');
    Route::get('/admin/alumnos/createForm', 'AlumnosController@createForm');
    Route::post('/admin/alumnos/updateForm', 'AlumnosController@updateForm');
    Route::post('/admin/alumnos/create', 'AlumnosController@create')->name('adm-form-alumno');
    Route::post('/admin/alumnos/update', 'AlumnosController@update');

    Route::post('/admin/alumnos/fetch-carreras', 'AlumnosController@fetchCarrerasWhereNivel');
    Route::post('/admin/alumnos/fetch-grupos', 'AlumnosController@fetchGruposWhereCarrera');

    

    //Grupos
    Route::get('/admin/grupos',     'GruposController@index');
    Route::get('/admin/grupos/details-pub/{codigo_carrera_ciclo}', 'GruposController@detailsPublicView');
    Route::get('/admin/grupos/createForm', 'GruposController@createForm');
    Route::post('/admin/grupos/create', 'GruposController@create')->name('form-grupo');
    Route::post('/admin/grupos/getCarrerasFromNivel', 'GruposController@getCarrerasFromNivel');
    Route::post('/admin/grupos/updateForm', 'GruposController@updateForm');
    Route::post('/admin/grupos/update', 'GruposController@update')->name('form-update-grupo');
    //Route::post('/admin/grupos/details', 'GruposController@details');
    




});

Route::group(['middleware' => 'admin', 'namespace' => 'Backend\Academico'], function () {

});




//PUBLCO
Route::group(['namespace' => 'Frontend\Adicionales'], function () {    

    Route::get('/pub/alumnos/createForm', 'AlumnosController@createForm');
    Route::post('/pub/alumnos/create', 'AlumnosController@create')->name('form-alumno-pub');
    Route::post('/pub/alumnos/find-curp-alumno', 'AlumnosController@details')->name('form-subir-documentos-alumno-pub');
    Route::post('/pub/alumnos/subir-documentos', 'AlumnosController@uploadDocuments')->name('form-pub-subir-documentos');
    Route::post('/pub/alumnos/send-mail-confirm-identidad', 'AlumnosController@sendMailConfirmIdentitityAlumn')->name('form-send-mail-confirm-identidad');
    Route::post('/pub/alumnos/ged-grupos-from-nivel', 'AlumnosController@getGruposFromNivel');    
    Route::post('/pub/download-pdf', 'AlumnosController@downloadPDF')->name('downloadPDF');

    Route::get('/pub/tok_ficha/{token_}', 'AlumnosController@makeChallengeAndRedirect');
    
});



















Route::get('/a/alumnos', 'CargaAcademicaController@index');

//Rutas Carga_Academica
Route::get('/carga_academica', 'CargaAcademicaController@index');
Route::get('/carga_academica/create', 'CargaAcademicaController@create');
Route::post('/carga_academica', 'CargaAcademicaController@store');
Route::post('/eliminar/carga_academica/{id}', 'CargaAcademicaController@destroy');

//Rutas registro
Route::resource('registro', 'RegistroController');
//Ruta momento para configuracion de registro de calificaciones
Route::resource('momento', 'MomentoController');
//Ruta criterio para configuracion de registro de calificaciones
Route::resource('criterio', 'CriterioController');

Route::resource('subir/documentos', 'DocumentosController');

Route::get('crear/nuevoAlumno', 'RegistroController@store');

Auth::routes(['register' => false]);

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'admin', 'namespace' => 'Administrador'], function () {
    Route::get('utp/obtener/datos/idCiclo/{id}', 'AdminController@sessionCiclo');
    //vista general del administrador
    Route::get('user/admin', 'AdminController@index');
    Route::get('lista/empleado', 'AdminController@getEmpleado1');
    Route::get('/Administrar/Usuarios', 'AdminController@adminUser');

    //Rutas de CrudProfe
    Route::get('lista/empleados/profe', 'CrudProfeController@index');
    Route::get('crear/profesor', 'CrudProfeController@crearProfesor');
    Route::resource('crearProfesor', 'AdminController');
    Route::get('/edit/profesor/{id}', 'CrudProfeController@edit');
    Route::post('act/profesor/{id}', 'CrudProfeController@update');
    Route::post('delete/empleado/{id}', 'CrudAdminController@delete');

    //Rutas para asignar Asignatura a un profesor
    Route::get('grupos/asignados', 'GrupoProfesorController@index');
    Route::any('profesor-{id}/grupos', 'GrupoProfesorController@gruposAsignados');
    Route::get('getGrupos', 'GrupoProfesorController@getGroup');

    //Rutas CRUD de empleadosAdministrativos
    Route::get('lista/empleados/admin', 'CrudAdminController@index');
    Route::get('crear/Empleado', 'CrudAdminController@create');
    Route::post('crear/nuevo/Empleado', 'CrudAdminController@store');
    Route::get('edit/empleado/{id}', 'CrudAdminController@edit');
    Route::post('act/empleado/{id}', 'CrudAdminController@updated');
    Route::get('delete/empleado/{id}', 'CrudAdminController@delete');

    Route::view('/configuracion', 'configuracion.general'); //ruta de configuracion

    //Rutas modulo conceptos de pago-{funcional}
    Route::get('utp/conceptosPago/', 'ConceptosPagoController@index');
    Route::get('utp/conceptosPago/create', 'ConceptosPagoController@create');
    Route::post('utp/conceptosPago/create', 'ConceptosPagoController@store');
    Route::get('utp/conceptosPago-edit-{id}', 'ConceptosPagoController@edit');
    Route::post('utp/conceptosPago-update-{id}', 'ConceptosPagoController@update');
    Route::delete('utp/conceptosPago-destroy-{id}', 'ConceptosPagoController@destroy');

    //Rutas  modulo conceptos de venta
    Route::get('utp/venta/concepto/', 'ConceptosVentaController@index');
    Route::get('utp/concepto/create', 'ConceptosVentaController@create');
    Route::post('utp/concepto/create', 'ConceptosVentaController@store');
    Route::get('utp/show/detalle-venta-{id}', 'ConceptosVentaController@show');

    //Route::post('utp/concepto/destroy/detalle-venta-{id}', 'ConceptosVentaController@destroy');
    Route::post('utp/conceptosPago/destroy/{id}', 'ConceptosPagoController@destroy');

    //Rutas de modulo de planes de pago-{funcional}
    Route::get('utp/planesPago', 'PlanesPagoController@index'); //ruta principal del modulo
    Route::post('utp/planesPago', 'PlanesPagoController@store'); //Ruta de insertar al modelo de planesMST
    Route::get('utp/filter-planesPago', 'PlanesPagoController@index1');
    Route::get('/configurar/planes', 'PlanesPagoController@getPLanMST'); //ruta de configuracion de planes
    Route::get('utp/planes-edit-{id}/ciclo-{ciclo}', 'PlanesPagoController@edit'); //ruta de edicion del plan
    Route::post('utp/planes-update-{id}', 'PlanesPagoController@update'); //ruta para actualizar el plan al modelo de PlanesPAgo
    Route::get('utp/planes/show-{id}', 'PlanesPagoController@show');
    Route::post('utp/planes-destroy-{id}', 'PlanesPagoController@destroy');
    Route::post('utp/planesMST-destroy-{id}', 'PlanesPagoController@destroyPlanMST');

    Route::get('utp/planes-editando-{id}-{ciclo}', 'PlanesPagoController@Editando');
    Route::post('utp/planes-actualizar-{id}-{ciclo}', 'PlanesPagoController@Actualizar');

    

    //Rutas de venta de planes -{funcional}

    Route::get('utp/crearCxC', 'VentaUtpController@crearCxC'); //f
    Route::post('utp/plan/create', 'VentaUtpController@store'); // f
    Route::get('utp/buscar/alumno/{dato?}', 'VentaUtpController@buscarAlumno'); // f

    Route::get('utp/venta/plan/create', 'VentaUtpController@create'); // f
    Route::get('utp/get/student', 'VentaUtpController@getStudent'); // f
    Route::post('utp/venta/plan/cobrar/', 'VentaUtpController@cobrar'); //  f
    Route::get('utp/venta/lista/venta/planes', 'VentaUtpController@index'); // f
    Route::get('utp/detalles/venta-planes-{id}', 'VentaUtpController@show'); //f
    Route::post('utp/destroy/plan-venta-{id}', 'VentaUtpController@destroy');
    Route::view('utp/estado/cuenta/alumno', 'admin.cobranza.estadoCuenta'); //f
    Route::get('utp/estado/cuenta/alumno-{dato?}', 'VentaUtpController@buscarAlumno');
    ///RutAS USERS CAJEROS
    //Rutas de modulo de planes de pago-{funcional}

    Route::get('cajero/buscar/alumno/{dato?}', 'VentaUtpController@buscarAlumno'); // f

    Route::get('cajero/venta/plan/create', 'VentaUtpController@create'); // f
    Route::get('cajero/get/student', 'VentaUtpController@getStudent'); // f
    Route::post('cajero/venta/plan/cobrar/', 'VentaUtpController@cobrar'); //  f
    Route::get('cajero/venta/lista/venta/planes', 'VentaUtpController@index'); // f
    Route::get('cajero/detalles/venta-planes-{id}', 'VentaUtpController@show'); //f
    Route::post('cajero/destroy/plan-venta-{id}', 'VentaUtpController@destroy');
    Route::view('cajero/estado/cuenta/alumno', 'admin.cobranza.estadoCuenta'); //f
    Route::get('cajero/estado/cuenta/alumno-{dato?}', 'VentaUtpController@buscarAlumno');

    //////view//////
    Route::view('asignar', 'admin.empleados.profe.asignarGrupo');

    //beytia
    Route::view('index', 'partials.rolAlumno.index');
    Route::view('correo', 'admin.correo.correoMasivo');

    //Rutas de modulo de cuentas-{funcinal}
    Route::get('configuracion/cuenta', 'CuentasController@index');
    Route::post('configuracion/cuenta', 'CuentasController@store');
    Route::get('configuracion-cuenta-edit-{id}', 'CuentasController@edit');
    Route::post('configuracion-cuenta-edit-{id}', 'CuentasController@update');
    Route::post('configuracion/cuenta-destroy-{id}', 'CuentasController@destroy');

    //Rutas de modulo de cajas -{funcional}
    Route::get('configuracion/caja', 'CajaController@index');
    Route::get('/editar/caja-{id}', 'CajaController@edit');
    Route::post('/configuracion/caja-update-{id}', 'CajaController@update');
    Route::get('/configuracion/nueva/caja', 'CajaController@create');
    Route::post('/configuracion/cajas/create', 'CajaController@store');
    Route::get('/configuracion/destroy-cuenta-{id}', 'CajaController@destroy'); // no funcional

    //Rutas de titulacion
    Route::get('utp/titulacion/alumnos', 'TitulacionController@index');
    Route::get('utp/titulacion/alumno/{id}', 'TitulacionController@titulacion');
    Route::get('utp/titulacion/etapa1/{id}', 'TitulacionController@etapa1');
    Route::get('alumno-{id_alumno}/titulacion/etapa2-{id_estadia}', 'TitulacionController@etapa2');
    Route::get('utp/titulacion/etapa3/{id}', 'TitulacionController@etapa3');
    Route::get('utp/asesor/titulacion/{id}', 'TitulacionController@asesor');
    Route::post('utp/registrar/evento/servicioSocial', 'TitulacionController@storeServicioSocial');
    Route::post('utp/titul-servicio-social-alumno/{id}', 'TitulacionController@editServicioSocial');
    Route::get('utp/borrar-servicio-social/{empresa}/{alumno}', 'TitulacionController@destroyServicioSocial');

    Route::get('configurar/modalidades', 'ModalidadController@index');
    Route::get('configurar/modalidad/create', 'ModalidadController@create');
    Route::post('configurar/modalidad/store', 'ModalidadController@store');
    Route::get('configurar/modalidad/edit-{id}', 'ModalidadController@edit');
    Route::post('configurar/modalidad/update-{id}', 'ModalidadController@update');
    Route::get('configurar/modalidad/destroy-{id}', 'ModalidadController@destroy');

    Route::get('configurar/empresas', 'EmpresaController@index');
    Route::get('configurar/empresa/create', 'EmpresaController@create');
    Route::post('configurar/empresa/store', 'EmpresaController@store');
    Route::get('configurar/empresa/edit-{id}', 'EmpresaController@edit');
    Route::post('configurar/empresa/update-{id}', 'EmpresaController@update');
    Route::get('configurar/empresa/destroy-{id}', 'EmpresaController@destroy');

    //Rutas de javaScript
    Route::get('towns/{id}', 'AdminController@getTowns');
    Route::get('listaEmpleado/general/{id}', 'AdminController@getEmpleado');
    Route::get('listaEmpleado/administrativos/{id}', 'CrudAdminController@getAdmin');
    Route::get('listaEmpleado/profesores/{id}', 'CrudProfeController@getProfesor');
    Route::get('Obtener/Datos/Empleado/', 'AdminController@getDateUser');
    Route::get('Obtener/Datos/Empleado/{id}', 'AdminController@getDateUserEmail');
    Route::get('Obtener/Datos/Alumno/', 'AdminController@getDataAlum');
    Route::get('Obtener/Datos/Alumno/{id}', 'AdminController@getDataAlumEmail');
    Route::post('add/userSystem', 'AdminController@addUserSystem');
    
});

Route::group(['namespace' => 'Empleados'], function () {
    //tas al controlador de profesores
    Route::get('user/profe', 'EmpleadosController@inicioPerfil'); ///general
    Route::get('lista/profesores', 'EmpleadosController@getEmpleado'); //general
    Route::get('listaEmpleado/{id}', 'EmpleadosController@getEmpleado2');
    //Route::resource('fotoPermil', 'EmpleadosController');
    Route::get('mostrarEmpleados', 'EmpleadosController@crear');
});

Route::group(['middleware' => 'auth', 'namespace' => 'Alumno'], function () {
    Route::get('user/alumno', 'AlumnoController@index');
    Route::get('crear/alumno', 'AlumnoController@crearAlumno');
    Route::get('buscar/alumnos', 'AlumnoController@buscarAlumno');
});

Route::group(['middleware' => 'emple', 'namespace' => 'Director'], function () {
    Route::get('user/director', 'DirecctorController@index');
});

Route::get('user/cajero', 'Magaly\MagalyController@index');

// Rutas de alumnos
Route::group(['namespace' => 'Alumno'], function () {
    Route::get('user/alumno', 'AlumnoController@index');
    Route::get('crear/alumno', 'AlumnoController@crearAlumno');
    Route::post('crear/alumno', 'AlumnoController@store');
    Route::get('buscar/alumnos', 'AlumnoController@buscarAlumno');
    Route::get('EditarAlumno/{id}', 'AlumnoController@editarAlumno');

    Route::resource('lista', 'AlumnoController');
    Route::get('crear/alumno/{id}', 'AlumnoController@crearAlumno2');
    Route::post('crear/alumno/{id}', 'AlumnoController@update');
    Route::post('crear/alumno/{id}', 'AlumnoController@update2');
    Route::post('editaralumno{id}', 'AlumnoController@Actualizar');

});

//Rutas de Documentos
Route::post('/documentos/', 'ArchivosController@store');
Route::post('/documentos/edit/{id}', 'ArchivosController@update');

//Grupos

Route::get('grupos', 'GruposController@grupos');

//Ruta de Planes
Route::match(['get', 'post'], 'planes', 'PlanesEstController@index'); //ver planes
Route::get('crear/plan', 'PlanesEstController@create'); //formulario
Route::post('crear/plan', 'PlanesEstController@store'); //guardar
Route::get('editar/plan/{id}', 'PlanesEstController@edit'); //formulario
Route::post('update/plan/{id}', 'PlanesEstController@update'); //actualizar registro
Route::post('eliminar/plan/{id}', 'PlanesEstController@destroy'); //eliminar
Route::get('/dropdown_asignatura/{id}', 'PlanesEstController@getAsignaturas');
Route::get('/dropdown_nivel/{id}', 'CarrerasController@getPlanes');
Route::get('/dropdown_grupo/{id}', 'CarrerasController@getGrupos');
Route::get('/dropdown_profesor/{id}', 'ProfesorController@getAsignatura_Profesor');

//Rutas de Asignaturas
Route::get('asignaturas/{id}', 'AsignaturasController@index'); //ver Asignaturas
Route::get('crear/asignatura/{id}', 'AsignaturasController@create');
Route::post('crear/asignatura/{id}', 'AsignaturasController@store'); //guardar registro
Route::get('editar/asignatura/{id}', 'AsignaturasController@edit');
Route::post('asignaturas/{id}', 'AsignaturasController@update'); //actualizar registro
Route::post('destroy/asignatura/{id}', 'AsignaturasController@destroy'); //Eliminar Asignatura

//Rutas de Niveles
Route::get('/configuracion', 'CarrerasController@config');
Route::get('crear/nivel', 'CarrerasController@crearNivel');
Route::post('crear/nivel', 'CarrerasController@store');
Route::get('nivel/{id}', 'CarrerasController@edit');
Route::post('nivel/{id}', 'CarrerasController@update');
Route::get('nivel/carrera/{id}', 'CarrerasController@destroy');

//Rutas de Grupos
//Route::get('grupos', 'gruposcontroller@grupos');
Route::get('crear/nuevoGrupo', 'GruposController@grupos');
Route::get('crear/nuevo/grupo', 'GruposController@crearGrupo');
Route::post('crear/nuevo/grupo', 'GruposController@store');
Route::get('grupo/{id}', 'GruposController@edit');
//Route::post('edit/grupo/{id}', 'GruposController@update'); //editar
Route::post('grupo/{id}', 'GruposController@destroy');
Route::get('lista/alumnos/grupos/{id}', 'GruposController@verAlumnos');
Route::get('grupos/alg', 'GruposController@verAlumnos');
Route::post('buscarAlumno/{id}', 'GruposController@agregarAlumno');
Route::post('/eliminar/alumno-grupo/{id}', 'GruposController@eliminarAlumno');

Route::get('buscarAlumno/{id}', 'GruposController@buscarAlumno');

Route::get('utp/alumno/{id}', 'GruposController@agregar'); //f
//Route::post('agregar/alumno', 'GruposController@agregarAlumno');
Route::post('agregar', 'GruposController@agregarAlumno');



//Ponderacion
Route::get('ponderacion', 'PonderacionController@index');
Route::post('actualizar/ponderacion', 'PonderacionController@store');
//Boleta Final
Route::get('boleta/final', 'RegistroCalifController@boletafinal'); //ver boleta final
//Reporte de tutores
Route::get('reporte/tutores', 'RegistroCalifController@reporteTutores'); // ver reporte tutores

//Registro de calificaciones formulario
Route::match(['get', 'post'], 'registro/calif/profesores', 'RegistroCalifController@index');
//Guardar Calificaciones
Route::post('guardar/calificaciones', 'RegistroCalifController@guardarCalificacion');

//RicardoAdministrador

//Actividades estracurriculares
Route::resource('tipo-evento', 'TipoEventoController');
Route::resource('catalogo-evento', 'CatalogoEventoController');
Route::get('registroevento/{id}', 'CatalogoEventoController@registroEvento');
Route::get('registroAlevento', 'CatalogoEventoController@alevento');
Route::resource('actividades', 'actividadesController');
Route::get('historial', 'CatalogoEventoController@historial');
Route::get('eventoacti', 'CatalogoEventoController@activos');

Route::get('buscarAlumnosAE/{id}', 'CatalogoEventoController@buscarAE');
Route::post('guardarAlumnosAE/{id}', 'CatalogoEventoController@agregarAE');

//Seguimiento egresados
Route::resource('seguimiento_egresados', 'Seguimiento_egresadosController');
Route::get('seguimiento_egresados/ver/{id}', 'Seguimiento_egresadosController@verAlumnosdeUnGrupo');
Route::get('seguimiento_egresados/nuevo/{id}', 'Seguimiento_egresadosController@nuevo');
Route::get('seguimiento_egresados/show/{id}', 'Seguimiento_egresadosController@ver');

//Estadia
Route::group(['namespace' => 'Alumno'], function () {

Route::get('grupos_seguimiento_egresados', 'Seguimiento_egresadosController@gruposricardo');
Route::get('seguimiento_estadia', 'AlumnoController@estadiaricardo');
Route::get('buscarAlumnoRick/{id}', 'catalogo_villasController@buscarrick');
Route::post('buscarAlumnoRick/{id}', 'catalogo_villasController@agregarricardo');

Route::get('estadia/ver/{id}', 'AlumnoController@verAlumnosdeUnGrupo');
Route::get('estadia/seg/{id}', 'AlumnoController@estadiaficha');
});

//Villas
Route::resource('grupos_villas', 'grupos_villasController');
Route::resource('catalogo_villas', 'catalogo_villasController');
Route::resource('alumnos_villas', 'alumnos_villasController');
Route::get('registro_villa/{id}', 'catalogo_villasController@registroVilla');
Route::post('alumnos_villas/eliminar/{id}', 'alumnos_villasController@eliminar');

//pruebas
//Route::get('buscarAlumnoVilla','catalogo_villasController@buscarAlumno');
//Route::post('buscar/Agregar','catalogo_villasController@agregarAlumno');
//Route::get('buscarAlumnoRick/{id}', 'catalogo_villasController@buscarrick');
//Route::post('buscarAlumnoRick/{id}', 'catalogo_villasController@agregarricardo');

Route::resource('alumnosegresados', 'alumnosegresadosController');
Route::get('actividad-extracurricular', 'RicardoController@actividad');
Route::get('civicos', 'RicardoController@civico');
Route::get('cursos', 'RicardoController@curso');
Route::get('culturales', 'RicardoController@cultural');
Route::get('visitas', 'RicardoController@visita');
Route::get('platicas', 'RicardoController@platica');

//Evaluacion Docente

Route::get('presentacion', 'EvaluaciondocenteController@presentacion');
//vista para el alumno
Route::get('alumno_ev_docente', 'EvaluaciondocenteController@alumno_ev_docente');

//aun no funcionan
Route::get('vistagruposed', 'EvaluaciondocenteController@reportegrupo');
Route::get('reporteprofe', 'EvaluaciondocenteController@create');
//creacion de preguntas
Route::resource('planed', 'PlanedController');
Route::resource('preguntased', 'PreguntasedController');
Route::get('planpreguntas/{id}', 'PreguntasedController@preguntas');

//asignacion de planed
Route::get('asignarplaned', 'EvaluaciondocenteController@asignarplaned');

Route::post('/edit/empleado/{id}', 'Empleados2Controller@edit');
Route::post('/ver/empleado/{id}', 'Empleados2Controller@show');

Route::get('empleado', 'Empleados2Controller@index');

Route::resource('empleado', 'Empleados2Controller');
Route::get('mostrar', 'EmpleadoController@index');
//Route::get('ver/empleado/{id}', 'EmpleadoController@show');

Route::resource('profesor', 'ProfesorController');

//Route::resource('asig-horasprofesor', 'asigHorasProfesorController');
//Route::resource('profesor-grupo', 'ProfesorGrupoController');
