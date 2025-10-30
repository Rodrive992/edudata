<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EduRedController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SolicitudesEduRedController;
use App\Http\Controllers\MantenimientoRealizadasController;
use App\Http\Controllers\FormacionController;
use App\Http\Controllers\InnovacionController;
use App\Http\Controllers\AsuntosController;
use App\Http\Controllers\ProgramasProyectosController;
use App\Http\Controllers\TitulosController;
use App\Http\Controllers\EducacionTecnicaController;
use App\Http\Controllers\ResidenciaController;
use App\Http\Controllers\OrganigramaController;
use App\Http\Controllers\NormativaController;
use App\Http\Controllers\CargaDigestoController;
use App\Http\Controllers\SolicitudCargoController;
use App\Models\MantenimientoRealizadas;
use App\Http\Controllers\SolicitudInformacionController;
use App\Http\Controllers\CoberturaCargosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
*/

// Página principal - Acceso Publico
Route::get('/', function () {
    return view('edudata.index');
})->name('edudata.index');
// Url Edured - Acceso Publico
Route::get('/edured', [AuthController::class, 'showLoginForm'])->name('login');

// Secciones de EduData - Acceso Publico
Route::prefix('edudata')->group(function () {
    Route::get('/organigrama', [OrganigramaController::class, 'index'])->name('edudata.organigrama');
    Route::get('/asuntos', [AsuntosController::class, 'index'])->name('edudata.asuntos');
    Route::get('/mantenimiento', [MantenimientoRealizadasController::class, 'index'])->name('edudata.mantenimiento');
    Route::get('/formacion', [FormacionController::class, 'index'])->name('edudata.formacion');
    Route::get('/edutecnica', [EducacionTecnicaController::class, 'index'])->name('edudata.edutecnica');
    Route::get('/innovacion', [InnovacionController::class, 'index'])->name('edudata.innovacion');
    Route::get('/titulos', [TitulosController::class, 'index'])->name('edudata.titulos');
    Route::get('/programasyproyectos', [ProgramasProyectosController::class, 'index'])->name('edudata.programas');
    Route::get('/residencia', [ResidenciaController::class, 'index'])->name('edudata.residencia');
    Route::get('/normativa', [NormativaController::class, 'index'])->name('edudata.normativa');
    Route::get('/normativa/{id}', [NormativaController::class, 'show'])->name('edudata.normativa.show');
    Route::get('/normativa/{id}/descargar', [NormativaController::class, 'download'])->name('edudata.normativa.download');
    Route::get('/normativa/{id}/archivo', [NormativaController::class, 'file'])->name('edudata.normativa.file');
    Route::get('/solicitud-info', [SolicitudInformacionController::class, 'index'])->name('edudata.solicitud-info');
    Route::post('/solicitud-info', [SolicitudInformacionController::class, 'store'])->name('edudata.solicitud-info.store');
    Route::get('/registro-solicitudes', [SolicitudInformacionController::class, 'registro'])->name('edudata.solicitud-info.registro_solicitudes_info');
    Route::get('/asambleas', [CoberturaCargosController::class, 'index'])->name('edudata.asambleas');
});

// Autenticación manual
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('edured')->middleware('auth')->group(function () {
    Route::get('/', [EduRedController::class, 'index'])->name('edured.index');
    Route::get('/historial', [EduRedController::class, 'solicitudes'])->name('edured.historial');
    Route::post('/generar-solicitud-edilicio', [SolicitudesEduRedController::class, 'nuevaSolicitudEdilicio'])->name('edured.generar-solicitud-edilicio');
    Route::post('/generar-solicitud-vacante', [SolicitudesEduRedController::class, 'nuevaSolicitudVacante'])->name('edured.generar-solicitud-vacante');

    // EDU RED
    //Herramientas 
    Route::prefix('herramientas')->group(function () {
        //Digesto
        Route::get('/digesto', [CargaDigestoController::class, 'index'])->name('edured.herramientas.digesto.index');
        Route::post('/digesto', [CargaDigestoController::class, 'store'])->name('edured.herramientas.digesto.store');
        Route::delete('/digesto/{digesto}', [CargaDigestoController::class, 'destroy'])->name('edured.herramientas.digesto.destroy');

        // Gestión Solicitudes de Información (EDURED)
        // Admin / Gestión
        Route::get('/edured/solicitudes', [SolicitudInformacionController::class, 'gestionSolicitudes'])
            ->name('edured.herramientas.solicitudes-info.index');

        Route::get('/edured/solicitudes/{solicitud}/paso1', [SolicitudInformacionController::class, 'gestionPaso1'])
            ->name('edured.herramientas.solicitudes-info.paso1');

        Route::post('/edured/solicitudes/{solicitud}/rechazar', [SolicitudInformacionController::class, 'rechazar'])
            ->name('edured.herramientas.solicitudes-info.rechazar');

        Route::post('/edured/solicitudes/{solicitud}/continuar', [SolicitudInformacionController::class, 'continuar'])
            ->name('edured.herramientas.solicitudes-info.continuar');

        Route::get('/edured/solicitudes/{solicitud}/paso2', [SolicitudInformacionController::class, 'gestionPaso2'])
            ->name('edured.herramientas.solicitudes-info.paso2');

        Route::post('/edured/solicitudes/{solicitud}/responder', [SolicitudInformacionController::class, 'responder'])
            ->name('edured.herramientas.solicitudes-info.responder');

        // Ver respuesta (solo si respondida)
        Route::get(
            '/edured/solicitudes/{solicitud}/respuesta',
            [SolicitudInformacionController::class, 'gestionRespuesta']
        )
            ->name('edured.herramientas.solicitudes-info.respuesta');

        // Publicar en el portal (mostrar_solicitud = 'si')
        Route::post(
            '/edured/solicitudes/{solicitud}/publicar',
            [SolicitudInformacionController::class, 'publicar']
        )
            ->name('edured.herramientas.solicitudes-info.publicar');

        // (Opcional) Ocultar del portal (mostrar_solicitud = 'no')
        Route::post(
            '/edured/solicitudes/{solicitud}/ocultar',
            [SolicitudInformacionController::class, 'ocultar']
        )
            ->name('edured.herramientas.solicitudes-info.ocultar');

        // Servir/descargar archivos de solicitudes
        Route::get('/edured/solicitudes/{solicitud}/file/dni-frente',  [SolicitudInformacionController::class, 'fileDniFrente'])
            ->name('solicitudes.file.dni_frente');
        Route::get('/edured/solicitudes/{solicitud}/file/dni-reverso', [SolicitudInformacionController::class, 'fileDniReverso'])
            ->name('solicitudes.file.dni_reverso');
        Route::get('/edured/solicitudes/{solicitud}/file/respuesta',   [SolicitudInformacionController::class, 'fileRespuesta'])
            ->name('solicitudes.file.respuesta');

        Route::get('/edured/solicitudes/{solicitud}/download/respuesta', [SolicitudInformacionController::class, 'downloadRespuesta'])
            ->name('solicitudes.download.respuesta');
        //Solicitud cargo vacante
        // Mantener la ruta con typo para no romper enlaces previos
        Route::get('/solicitucargos', [SolicitudCargoController::class, 'index'])
            ->name('edured.herramientas.solicitudcargos.index-legacy');
        // Ruta correcta
        Route::get('/solicitudcargos', [SolicitudCargoController::class, 'index'])
            ->name('edured.herramientas.solicitudcargos.index');
        // Generar solicitud desde un cargo
        Route::get('/solicitudcargos/{cargo}/generar', [SolicitudCargoController::class, 'generar'])->name('edured.herramientas.solicitudcargos.generar');

        // Mantenimiento - Tareas Realizadas
        Route::prefix('mantenimiento/realizadas')->name('edured.herramientas.mantenimiento.realizadas.')->group(function () {
            // Form para cargar CSV
            Route::get('/cargar', [MantenimientoRealizadasController::class, 'create'])->name('create');
            // POST de carga/procesamiento
            Route::post('/cargar', [MantenimientoRealizadasController::class, 'store'])->name('store');
            // Listado de archivos cargados
            Route::get('/archivos', [MantenimientoRealizadasController::class, 'indexArchivos'])->name('archivos.index');
            // Descargar archivo original
            Route::get('/archivos/{id}/descargar', [MantenimientoRealizadasController::class, 'descargar'])->name('archivos.descargar');
            // Eliminar carga completa (archivo + filas)
            Route::delete('/archivos/{id}', [MantenimientoRealizadasController::class, 'destroyArchivo'])->name('archivos.destroy');
        });
    });
});
