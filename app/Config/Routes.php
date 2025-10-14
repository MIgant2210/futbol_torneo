<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LoginController::index');

// LOGIN Y AUTENTICACIÓN
$routes->get('login', 'LoginController::index');
$routes->post('login/autenticar', 'LoginController::autenticar');
$routes->get('salir', 'LoginController::salir');
$routes->get('dashboard', 'DashboardController::index');

// GESTIÓN COMPLETA DE USUARIOS
$routes->get('usuarios', 'UsuarioController::index');                           // Lista de usuarios
$routes->get('registro', 'UsuarioController::registro');                        // Formulario registro
$routes->post('registro/guardar', 'UsuarioController::guardar');               // Guardar nuevo
$routes->get('usuarios/ver/(:num)', 'UsuarioController::ver/$1');              // Ver detalles
$routes->get('usuarios/editar/(:num)', 'UsuarioController::editar/$1');        // Formulario editar
$routes->post('usuarios/actualizar/(:num)', 'UsuarioController::actualizar/$1'); // Actualizar
$routes->get('usuarios/eliminar/(:num)', 'UsuarioController::eliminar/$1');    // Eliminar

// Si tienes verificación de usuarios, mantén estas
$routes->get('verificar', 'UsuarioController::verificar');
$routes->post('registro/confirmar', 'UsuarioController::confirmar');
$routes->get('usuarios/confirmar/(:segment)', 'UsuarioController::confirmar/$1');
$routes->get('usuarios/activar/(:num)', 'UsuarioController::activar/$1');
$routes->get('usuarios/desactivar/(:num)', 'UsuarioController::desactivar/$1');

// JUGADORES
$routes->get('jugadores', 'JugadorController::index');
$routes->get('jugadores/crear', 'JugadorController::crear');
$routes->post('jugadores/guardar', 'JugadorController::guardar');
$routes->get('jugadores/editar/(:num)', 'JugadorController::editar/$1');
$routes->post('jugadores/actualizar/(:num)', 'JugadorController::actualizar/$1');
$routes->get('jugadores/eliminar/(:num)', 'JugadorController::eliminar/$1');

// EQUIPOS
$routes->get('equipos', 'EquipoController::index');
$routes->get('equipos/crear', 'EquipoController::crear');
$routes->post('equipos/guardar', 'EquipoController::guardar');
$routes->get('equipos/editar/(:num)', 'EquipoController::editar/$1');
$routes->post('equipos/actualizar/(:num)', 'EquipoController::actualizar/$1');
$routes->get('equipos/eliminar/(:num)', 'EquipoController::eliminar/$1');
$routes->get('equipos/buscar', 'EquipoController::buscar');

// JORNADAS
$routes->get('jornadas', 'JornadaController::index');
$routes->get('jornadas/crear', 'JornadaController::crear');
$routes->post('jornadas/guardar', 'JornadaController::guardar');

// GOLES
$routes->get('goles/crear', 'GolController::crear');
$routes->post('goles/guardar', 'GolController::guardar');

// INCIDENCIAS
$routes->get('incidencias/crear', 'IncidenciaController::crear');
$routes->post('incidencias/guardar', 'IncidenciaController::guardar');

// REPORTES
$routes->get('reportes', 'ReporteController::jugadores');
$routes->get('reportes/goleadores', 'ReporteController::goleadores');
$routes->get('reportes/incidencias', 'ReporteController::incidencias');
$routes->get('reportes/jugador/(:num)', 'ReporteController::jugador/$1');

// TEST
$routes->get('test', 'TestController::index');
