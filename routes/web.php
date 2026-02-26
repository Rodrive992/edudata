<?php

use Illuminate\Support\Facades\Route;

// Controllers
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
use App\Http\Controllers\SolicitudInformacionController;
use App\Http\Controllers\CoberturaCargosController;
use App\Http\Controllers\DatosEstadisticasController;
use App\Http\Controllers\SumarioController;
use App\Http\Controllers\FotosMantenimientoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Rutas públicas (EduData) + privadas (EduRed con auth)
|
*/

// Página principal - Acceso Público
Route::get('/', [DatosEstadisticasController::class, 'index'])->name('edudata.index');

// Url Edured - Acceso Público (login)
Route::get('/edured', [AuthController::class, 'showLoginForm'])->name('login');

// Secciones de EduData - Acceso Público
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

    // Normativa / Digesto (público)
    Route::get('/normativa', [NormativaController::class, 'index'])->name('edudata.normativa');
    Route::get('/normativa/{id}', [NormativaController::class, 'show'])->name('edudata.normativa.show');
    Route::get('/normativa/{id}/descargar', [NormativaController::class, 'download'])->name('edudata.normativa.download');
    Route::get('/normativa/{id}/archivo', [NormativaController::class, 'file'])->name('edudata.normativa.file');

    // Solicitud de información pública
    Route::get('/solicitud-info', [SolicitudInformacionController::class, 'index'])->name('edudata.solicitud-info');
    Route::post('/solicitud-info', [SolicitudInformacionController::class, 'store'])->name('edudata.solicitud-info.store');
    Route::get('/registro-solicitudes', [SolicitudInformacionController::class, 'registro'])->name('edudata.solicitud-info.registro_solicitudes_info');

    // Otras secciones
    Route::get('/asambleas', [CoberturaCargosController::class, 'index'])->name('edudata.asambleas');
    Route::get('/sumario', [SumarioController::class, 'index'])->name('edudata.sumario');
});

// Autenticación manual
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Zona privada EduRed
Route::prefix('edured')->middleware('auth')->group(function () {

    Route::get('/', [EduRedController::class, 'index'])->name('edured.index');
    Route::get('/historial', [EduRedController::class, 'solicitudes'])->name('edured.historial');

    Route::post('/generar-solicitud-edilicio', [SolicitudesEduRedController::class, 'nuevaSolicitudEdilicio'])
        ->name('edured.generar-solicitud-edilicio');

    Route::post('/generar-solicitud-vacante', [SolicitudesEduRedController::class, 'nuevaSolicitudVacante'])
        ->name('edured.generar-solicitud-vacante');

    // Herramientas
    Route::prefix('herramientas')->group(function () {

        // Digesto (carga/admin)
        Route::get('/digesto', [CargaDigestoController::class, 'index'])->name('edured.herramientas.digesto.index');
        Route::post('/digesto', [CargaDigestoController::class, 'store'])->name('edured.herramientas.digesto.store');
        Route::delete('/digesto/{digesto}', [CargaDigestoController::class, 'destroy'])->name('edured.herramientas.digesto.destroy');

        // ✅ NUEVO: editar/actualizar (modal)
        Route::get('/digesto/{digesto}/edit', [CargaDigestoController::class, 'edit'])->name('edured.herramientas.digesto.edit');
        Route::put('/digesto/{digesto}', [CargaDigestoController::class, 'update'])->name('edured.herramientas.digesto.update');

        // Gestión Solicitudes de Información (EDURED)
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
        Route::get('/edured/solicitudes/{solicitud}/respuesta', [SolicitudInformacionController::class, 'gestionRespuesta'])
            ->name('edured.herramientas.solicitudes-info.respuesta');

        // Publicar en el portal (mostrar_solicitud = 'si')
        Route::post('/edured/solicitudes/{solicitud}/publicar', [SolicitudInformacionController::class, 'publicar'])
            ->name('edured.herramientas.solicitudes-info.publicar');

        // Ocultar del portal (mostrar_solicitud = 'no')
        Route::post('/edured/solicitudes/{solicitud}/ocultar', [SolicitudInformacionController::class, 'ocultar'])
            ->name('edured.herramientas.solicitudes-info.ocultar');

        // Servir/descargar archivos de solicitudes
        Route::get('/edured/solicitudes/{solicitud}/file/dni-frente', [SolicitudInformacionController::class, 'fileDniFrente'])
            ->name('solicitudes.file.dni_frente');

        Route::get('/edured/solicitudes/{solicitud}/file/dni-reverso', [SolicitudInformacionController::class, 'fileDniReverso'])
            ->name('solicitudes.file.dni_reverso');

        Route::get('/edured/solicitudes/{solicitud}/file/respuesta', [SolicitudInformacionController::class, 'fileRespuesta'])
            ->name('solicitudes.file.respuesta');

        Route::get('/edured/solicitudes/{solicitud}/download/respuesta', [SolicitudInformacionController::class, 'downloadRespuesta'])
            ->name('solicitudes.download.respuesta');

        // Solicitud cargo vacante
        Route::get('/solicitucargos', [SolicitudCargoController::class, 'index'])
            ->name('edured.herramientas.solicitudcargos.index-legacy');

        Route::get('/solicitudcargos', [SolicitudCargoController::class, 'index'])
            ->name('edured.herramientas.solicitudcargos.index');

        Route::get('/solicitudcargos/{cargo}/generar', [SolicitudCargoController::class, 'generar'])
            ->name('edured.herramientas.solicitudcargos.generar');

        // Mantenimiento - Tareas Realizadas
        Route::prefix('mantenimiento/realizadas')->name('edured.herramientas.mantenimiento.realizadas.')->group(function () {
            Route::get('/cargar', [MantenimientoRealizadasController::class, 'create'])->name('create');
            Route::post('/cargar', [MantenimientoRealizadasController::class, 'store'])->name('store');

            Route::get('/archivos', [MantenimientoRealizadasController::class, 'indexArchivos'])->name('archivos.index');
            Route::get('/archivos/{id}/descargar', [MantenimientoRealizadasController::class, 'descargar'])->name('archivos.descargar');
            Route::delete('/archivos/{id}', [MantenimientoRealizadasController::class, 'destroyArchivo'])->name('archivos.destroy');
        });

        // Mantenimiento - Fotos
        Route::prefix('mantenimiento/fotos')->name('edured.herramientas.mantenimiento.fotos.')->group(function () {
            Route::get('/', [FotosMantenimientoController::class, 'index'])->name('index');
            Route::post('/', [FotosMantenimientoController::class, 'store'])->name('store');
            Route::put('/{foto}', [FotosMantenimientoController::class, 'update'])->name('update');
            Route::delete('/{foto}', [FotosMantenimientoController::class, 'destroy'])->name('destroy');
        });
    });
});