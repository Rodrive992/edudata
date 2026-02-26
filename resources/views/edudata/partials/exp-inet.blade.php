{{-- resources/views/edudata/partials/exp-inet.blade.php --}}
{{-- VERSIÓN FINAL - CUADROS MÁS PEQUEÑOS Y ACLARACIÓN --}}

@php
    $anio = $anio ?? 2025;
    $titulo = $titulo ?? 'Ejecución de financiamiento INET';
    $subtitulo = $subtitulo ?? 'Control de expedientes y estado de avance';

    $expedientes = $expedientes ?? [
        [
            'expte' => 'EX-2025-01086222---CAT-INET#MECT',
            'concepto' =>
                'Contratación de Servicio de Catering Completo: Desayuno, Almuerzo, Merienda y Cena, destinado al Equipo Técnico Federal, personal de la D.P.E.T.A. y F.P., alumnos y docentes de diferentes establecimientos invitados, participantes del Congreso de E.T.A. – Encuentro Regional NOA, a desarrollarse del 11 al 13 de Junio de 2025, EJE EST. I Fortalecimiento de la Trayectoria – Línea de Acción “A”, financiado por el Fondo Nacional para la E.T.P. - Ley Nº 26.058. P.O. $34.110.000,00.',
            'dictamen' => '20216/2025',
            'aprobado' => 53931400,
            'a_ejecutar' => 34110000,
        ],
        [
            'expte' => 'EX-2025-01086384---CAT-INET#MECT',
            'concepto' =>
                'Contratación de Servicio de Catering Completo: Almuerzo, destinado al Equipo Técnico Federal, personal de la D.P.E.T.A. y F.P., alumnos y docentes de diferentes establecimientos invitados, participantes del Congreso de Educación Técnica Agropecuaria – Encuentro Regional NOA, a desarrollarse del 11 al 13 de Junio de 2025, EJE ESTRATÉGICO I Fortalecimiento de la Trayectoria – Línea de Acción “A”, financiado por el Fondo Nacional para la E.T.P. - Ley Nº 26.058. P.O. $3.000.000,00.',
            'dictamen' => '20216/2025',
            'aprobado' => 53931400,
            'a_ejecutar' => 3000000,
        ],
        [
            'expte' => 'EX-2025-01087059---CAT-INET#MECT',
            'concepto' =>
                'Adquisición de Combustible Diésel Grado 3 destinado al traslado del Equipo Técnico Federal, personal de la D.P.E.T.A. y F.P., alumnos y docentes de diferentes establecimientos invitados al Congreso de Educación Técnica Agropecuaria – Encuentro Regional NOA a desarrollarse del 11 al 13 de Junio de 2025, EJE ESTRATÉGICO I Fortalecimiento de la Trayectoria – Línea de Acción “A”, financiado por el Fondo Nacional para la E.T.P. - Ley Nº 26.058. P.O. $1.941.400,00.',
            'dictamen' => '20216/2025',
            'aprobado' => 53931400,
            'a_ejecutar' => 1709574,
        ],
        [
            'expte' => 'EX-2025-01087226---CAT-INET#MECT',
            'concepto' =>
                'Contratación Servicio Sonido e Iluminación y Pantalla destinado al Congreso de Educación Técnica Agropecuaria – Encuentro Regional NOA a desarrollarse del 11 al 13 de Junio de 2025. EJE ESTRATÉGICO I Fortalecimiento de la Trayectoria – Línea de Acción “A”, financiado por el Fondo Nacional para la Educación Técnico Profesional - Ley Nº 26.058. Presupuesto Oficial $7.500.000,00.',
            'dictamen' => '20216/2025',
            'aprobado' => 53931400,
            'a_ejecutar' => 7500000,
        ],
        [
            'expte' => 'EX-2025-01087559---CAT-INET#MECT',
            'concepto' =>
                'Adquisición de Insumos de librería, destinado al Congreso de Educación Técnica Agropecuaria – Encuentro Regional NOA a desarrollarse del 11 al 13 de Junio de 2025. EJE ESTRATÉGICO I Fortalecimiento de la Trayectoria – Línea de Acción “A”, financiado por el Fondo Nacional para la Educación Técnico Profesional - Ley Nº 26.058. Presupuesto Oficial $400.000,00.',
            'dictamen' => '20216/2025',
            'aprobado' => 53931400,
            'a_ejecutar' => 400000,
        ],
        [
            'expte' => 'EX-2025-01552628---CAT-INET#MECT',
            'concepto' =>
                'CD Nº 008/2025: Adquisición de Antenas de Internet Satelital. EJE ESTRATÉGICO IV “Tecnologías de la Info y la Comunicación” – Línea de Acción “C”, financiado por el F.N. para la E.T.P. Ley Nº 26.058.',
            'dictamen' => '20378/2025',
            'aprobado' => 8450000,
            'a_ejecutar' => 8450000,
        ],
        [
            'expte' => 'EX-2025-01659220---CAT-INET#MECT',
            'concepto' =>
                'Adquisición de Equipamiento, materiales e insumos informáticos (Aulas Tech) destinados a los alumnos del Centro de Educación Técnico Profesional Néstor Kirchner Zona Sur, CUE N°100092400. EJE ESTRATÉGICO IV “Mejora de entornos formativos” – Línea de Acción “C”, “Tecnologías de la Información y la Comunicación”, financiado por el Fondo Nacional para la Educación Técnico Profesional - Ley Nº 26.058. P. Of. $25.500.000,00.',
            'dictamen' => '20459/2025',
            'aprobado' => 25500000,
            'a_ejecutar' => 25500000,
        ],
        [
            'expte' => 'EX-2025-01674551---CAT-INET#MECT',
            'concepto' =>
                'Contratación de Servicio de Ploteo destinado a las siguientes Aulas Taller Móvil: Refrigeración y Climatización (CUE Nº 100090304) y Soldadura (CUE Nº 100090305). EJE ESTRATÉGICO IV Mejora de Entornos Formativos - “Funcionamiento de Aulas Talleres Móviles” Línea de Acción “D”, financiado por el Fondo Nacional para la Educación Técnico Profesional – Ley Nº 26.058. P. Of. $5.440.600,00.',
            'dictamen' => '20456/2025',
            'aprobado' => 14625800,
            'a_ejecutar' => 5440600,
        ],
        [
            'expte' => 'EX-2025-01674551---CAT-INET#MECT',
            'concepto' =>
                'Contratación de Servicio de Ploteo destinado a: Aula Taller Móvil Refrigeración y Climatización Anexo Nº4 (CUE Nº 100090304) y Aula Taller Móvil de Soldadura Anexo Nº5 (CUE Nº 100090305).',
            'dictamen' => '20456/2025',
            'aprobado' => 14625800,
            'a_ejecutar' => 5440600,
        ],
        [
            'expte' => 'EX-2025-01706484---CAT-INET#MECT',
            'concepto' =>
                'Adquisición de Equipamiento, materiales e insumos de ferretería destinados a los alumnos de los Establecimientos Escolares dependientes de la D.P.E.T.A. y F.P. EJE ESTRATÉGICO IV “Mejora de entornos formativos” – Línea de Acción “A”, financiado por el Fondo Nacional para la Educación Técnico Profesional - Ley Nº 26.058. P. Of. $177.690.242,50.',
            'dictamen' => '19074/2024',
            'aprobado' => 177690242.5,
            'a_ejecutar' => 11214905.23,
        ],
        [
            'expte' => 'EX-2025-01706484---CAT-INET#MECT',
            'concepto' =>
                'Adquisición de Equipamiento, materiales e insumos de ferretería destinados a los alumnos de la E.P.E.T. N°1 (CUE 100043400), E.P.E.T. N°2 (CUE 100042500), E.P.E.T. N°3 (CUE 100027100), E.P.E.T. N°4 (CUE 100062800), E.P.E.T. N°5 (CUE 100026700) y E.P.E.T. N°13 (CUE 100064000).',
            'dictamen' => '19074/2024',
            'aprobado' => 177690242.5,
            'a_ejecutar' => 11208720,
        ],
        [
            'expte' => 'EX-2025-01800111---CAT-INET#MECT',
            'concepto' =>
                'Adquisición de Equipamiento, materiales e insumos informáticos (Aulas Tech) destinados a los alumnos del Centro de Educación Técnico Profesional Néstor Kirchner Zona Sur, CUE N°100092400. EJE ESTRATÉGICO IV “Mejora de entornos formativos” – Línea de Acción “A”, financiado por el Fondo Nacional para la Educación Técnico Profesional - Ley Nº 26.058.',
            'dictamen' => '20457/2025',
            'aprobado' => 11881900,
            'a_ejecutar' => 11881900,
        ],
        [
            'expte' => 'EX-2025-01897573---CAT-INET#MECT',
            'concepto' =>
                'Adquisición de Equipamiento, materiales e insumos para producción destinados a los alumnos de la Escuela Municipal Fray Mamerto Esquiú (CUE N°100092200), E.P.E.T. N°1 (CUE 100043400) y E.P.E.T. N°8 (CUE 100085500). EJE ESTRATÉGICO IV “Mejora de entornos formativos” – Línea de Acción “A”, financiado por el Fondo Nacional para la Educación Técnico Profesional - Ley Nº 26.058. P. Of. $30.914.100,00.',
            'dictamen' => '20492/2025',
            'aprobado' => 30914100,
            'a_ejecutar' => 30914100,
        ],
        [
            'expte' => 'EX-2025-01924376---CAT-INET#MECT',
            'concepto' =>
                'Adquisición de Combustible Diésel Grado 3 destinado al traslado de estudiantes, docentes e integrantes del equipo técnico en vehículos oficiales, participantes de las OVINPIADAS REGIONALES NOA-CUYO NORTE, a desarrollarse del 24 al 26 de Septiembre de 2025. EJE ESTRATÉGICO I Fortalecimiento de la Trayectoria – Línea de Acción “A”, financiado por el Fondo Nacional para la E.T.P. Ley Nº 26.058. P.O. $1.309.000,00.',
            'dictamen' => '20543/2025',
            'aprobado' => 26211674,
            'a_ejecutar' => 1307436,
        ],
        [
            'expte' => 'EX-2025-01914280---CAT-INET#MECT',
            'concepto' =>
                'Contratación de Servicio de Catering Completo: Desayuno, Almuerzo y Cena, destinado a alumnos y docentes de diferentes establecimientos Agrotécnicos del NOA y al Equipo Técnico de la D.P.E.T.A. y F.P., participantes de las OVINPIADAS REGIONALES NOA-CUYO NORTE, a desarrollarse del 24 al 26 de Septiembre de 2025. P.O. $12.705.000,00.',
            'dictamen' => '20543/2025',
            'aprobado' => 26211674,
            'a_ejecutar' => 12705000,
        ],
        [
            'expte' => 'EX-2025-01914508---CAT-INET#MECT',
            'concepto' =>
                'Adquisición de Indumentaria destinada a alumnos de diferentes establecimientos Agrotécnicos de Catamarca, participantes de las OVINPIADAS REGIONALES NOA-CUYO NORTE, a desarrollarse del 24 al 26 de Septiembre de 2025. Presupuesto Oficial $2.776.950,00.',
            'dictamen' => '20543/2025',
            'aprobado' => 26211674,
            'a_ejecutar' => 2776950,
        ],
        [
            'expte' => 'EX-2025-01914841---CAT-INET#MECT',
            'concepto' =>
                'Adquisición de Insumos de librería, Credenciales y Certificados, destinados a las OVINPIADAS REGIONALES NOA-CUYO NORTE, a desarrollarse del 24 al 26 de Septiembre de 2025. Presupuesto Oficial $819.100,00.',
            'dictamen' => '20543/2025',
            'aprobado' => 26211674,
            'a_ejecutar' => 819100,
        ],
        [
            'expte' => 'EX-2025-01914921---CAT-INET#MECT',
            'concepto' =>
                'Adquisición de Medallas, Reconocimientos y Placas, destinados a las OVINPIADAS REGIONALES NOA-CUYO NORTE, a desarrollarse del 24 al 26 de Septiembre de 2025. Presupuesto Oficial $450.000,00.',
            'dictamen' => '20543/2025',
            'aprobado' => 26211674,
            'a_ejecutar' => 450000,
        ],
        [
            'expte' => 'EX-2025-01915383---CAT-INET#MECT',
            'concepto' =>
                'Contratación de Servicio de Publicidad y Propaganda Institucional, destinado a las OVINPIADAS REGIONALES NOA-CUYO NORTE, a desarrollarse del 24 al 26 de Septiembre de 2025. Presupuesto Oficial $1.400.000,00.',
            'dictamen' => '20543/2025',
            'aprobado' => 26211674,
            'a_ejecutar' => 1400000,
        ],
        [
            'expte' => 'EX-2025-01939052---CAT-INET#MECT',
            'concepto' =>
                'Contratación de Servicio Hospedaje, destinado a alumnos y docentes de diferentes establecimientos Agrotécnicos invitados del NOA y al Equipo Técnico de la D.P.E.T.A. y F.P., participantes de las OVINPIADAS REGIONALES NOA-CUYO NORTE, a desarrollarse del 24 al 26 de Septiembre de 2025. P.O. $5.200.000,00.',
            'dictamen' => '20543/2025',
            'aprobado' => 26211674,
            'a_ejecutar' => 5200000,
        ],
        [
            'expte' => 'EX-2025-02378374---CAT-INET#MECT',
            'concepto' =>
                'Adquisición de Equipamiento, Materiales e Insumos destinados a la Esc. Agrotécnica de Huaco, CUE 100050700. P. Of. $8.717.615,00. F.F. 1.4.',
            'dictamen' => '20826/2025',
            'aprobado' => 8717615,
            'a_ejecutar' => 8717615,
        ],
        [
            'expte' => 'EX-2025-01674062---CAT-INET#MECT',
            'concepto' =>
                'Contratación de Servicio de Ploteo destinado a las siguientes Aulas Taller Móvil: Textil e Indumentaria (CUE Nº100090301), Instalaciones Domiciliarias (CUE Nº100090302), Gastronomía (CUE Nº100090303).',
            'dictamen' => '20456/2025',
            'aprobado' => 14625800,
            'a_ejecutar' => 9185200,
        ],
        [
            'expte' => 'EX-2025-02424580---CAT-INET#MECT',
            'concepto' =>
                'Adquisición de animales de producción y reproductores (gallinas ponedoras y ovejas) para producción y reproducción, destinados a las Escuelas Agrotécnica Nº33 Ciudad de Tinogasta (CUE 100025100), Agrotécnica Huaco (CUE 100050700), Agrotécnica Nueva Coneta (CUE 100045500), Agrotécnica Alijilán (CUE 100061800) y Agroganadera Fray Vicente Alcaraz (CUE 100027500). EJE ESTRATÉGICO IV “Mejora de entornos formativos” – Línea de Acción “A”, financiado por el Fondo Nacional para la Educación Técnico Profesional - Ley Nº 26.058.',
            'dictamen' => '20827/2025',
            'aprobado' => 12380000,
            'a_ejecutar' => 12380000,
        ],
        [
            'expte' => 'EX-2025-02608021---CAT-INET#MECT',
            'concepto' =>
                'Adquisición de equipamiento, materiales e insumos para el desarrollo de actividades y uso seguro del entorno formativo en talleres, laboratorios, espacios productivos y deportivos, destinados a alumnos del Centro de Educación Técnico Profesional Néstor Kirchner Zona Sur.',
            'dictamen' => '20457/2025',
            'aprobado' => 11881900,
            'a_ejecutar' => 1650000,
        ],
        [
            'expte' => 'EX-2025-2614818---CAT-INET#MECT',
            'concepto' =>
                'Adquisición de Kits Arduino destinados al Centro de Educación Técnico Profesional Néstor Carlos Kirchner, CUE N°100092400.',
            'dictamen' => '20459/2025',
            'aprobado' => 750000,
            'a_ejecutar' => 750000,
        ],
        [
            'expte' => 'EX-2025-02679638---CAT-INET#MECT',
            'concepto' =>
                'CD N° 044: Mantenimiento y reparación de bomba destinada a la Esc. Agrotécnica Nueva Coneta (CUE: 100045500). EJE ESTRATÉGICO IV “Mejora de entornos formativos” – Línea de Acción “A”. P. Of. $1.100.000,00. F.F. 1.4.',
            'dictamen' => '20985/2025',
            'aprobado' => 3400000,
            'a_ejecutar' => 3400000,
        ],
        [
            'expte' => 'EX-2025-02797352---CAT-INET#MECT',
            'concepto' =>
                'Adquisición de Equipamiento e insumos para oficina destinados a la Dirección Provincial de Educación Técnica, Agrotécnica y Formación Profesional con el fin de garantizar el normal desarrollo de las tareas administrativas, pedagógicas y contables durante la finalización del año lectivo.',
            'dictamen' => '20913/2025',
            'aprobado' => 1747256,
            'a_ejecutar' => 947256,
        ],
        [
            'expte' => 'EX-2025-2861745---CAT-INET#MECT',
            'concepto' => 'Adquisición de lubricantes y cubiertas.',
            'dictamen' => '21154/2025',
            'aprobado' => 5250700,
            'a_ejecutar' => 5250700,
        ],
    ];

    $fmtMoney = function ($n) {
        if (!is_numeric($n)) {
            return '—';
        }
        return '$ ' . number_format($n, 2, ',', '.');
    };

    // Agrupar por dictamen para evitar duplicados en totales
    $dictamenesUnicos = [];
    $totalAprobado = 0;
    $totalEjecutar = 0;

    foreach ($expedientes as $e) {
        $dictamen = $e['dictamen'];

        // Si el dictamen no está en el array, lo agregamos y sumamos los montos
        if (!in_array($dictamen, $dictamenesUnicos)) {
            $dictamenesUnicos[] = $dictamen;
            $totalAprobado += $e['aprobado'];
        }

        // El monto a ejecutar SÍ se suma por cada expediente (son partidas individuales)
        $totalEjecutar += $e['a_ejecutar'];
    }

    $cant = count($expedientes);
    $cantDictamenes = count($dictamenesUnicos);
@endphp

<!-- CONTENEDOR PRINCIPAL -->
<div style="font-family: system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif; max-width: 100%; margin: 0 auto;">

    <!-- TARJETA PRINCIPAL -->
    <div
        style="background: white; border-radius: 24px; box-shadow: 0 20px 30px -10px rgba(0,0,0,0.1), 0 4px 8px rgba(0,0,0,0.05); overflow: hidden; border: 1px solid #e9eef2;">

        <!-- HEADER CON GRADIENTE Y DESCRIPCIÓN INSTITUCIONAL -->
        <div
            style="background: linear-gradient(135deg, #f0f9ff 0%, #e6f0fa 100%); padding: 28px 32px; border-bottom: 1px solid #e2e8f0;">

            <!-- Título principal: Financiamiento INET -->
            <div style="margin-bottom: 16px;">
                <span
                    style="background: #2563eb; color: white; padding: 6px 16px; border-radius: 40px; font-size: 0.85rem; font-weight: 600; display: inline-block; margin-bottom: 12px;">FINANCIAMIENTO
                    NACIONAL</span>
                <h1
                    style="margin: 0; font-size: 2rem; font-weight: 800; color: #0a1e3c; letter-spacing: -0.02em; line-height: 1.2;">
                    Instituto Nacional de Educación Tecnológica
                </h1>
                <p style="margin: 12px 0 0; font-size: 1.1rem; color: #1e293b; max-width: 800px;">
                    Fondos destinados al Ministerio de Educación, Ciencia y Tecnología de la Provincia de Catamarca ·
                    Año {{ $anio }}
                </p>
            </div>

            <!-- Separador sutil -->
            <div
                style="height: 1px; background: linear-gradient(90deg, transparent, #94a3b8, transparent); margin: 20px 0 16px;">
            </div>

            <!-- Título secundario y chips -->
            <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 20px;">
                <div style="display: flex; align-items: center; gap: 16px;">
                    <!-- Icono pequeño -->
                    <div
                        style="width: 48px; height: 48px; background: linear-gradient(135deg, #2563eb, #3b82f6); border-radius: 16px; display: flex; align-items: center; justify-content: center; box-shadow: 0 6px 12px rgba(37,99,235,0.15);">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white"
                            stroke-width="1.8">
                            <path d="M12 8c-3.866 0-7 1.79-7 4v7h14v-7c0-2.21-3.134-4-7-4z" />
                            <path d="M12 8a3 3 0 100-6 3 3 0 000 6z" />
                        </svg>
                    </div>
                    <div>
                        <h2 style="margin: 0; font-size: 1.4rem; font-weight: 700; color: #0a1e3c;">{{ $titulo }}
                            · {{ $anio }}</h2>
                        <p style="margin: 4px 0 0; font-size: 0.95rem; color: #475569;">{{ $subtitulo }}</p>
                    </div>
                </div>

                <!-- Chips -->
                <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                    <span
                        style="background: #2563eb; color: white; padding: 6px 18px; border-radius: 40px; font-size: 0.85rem; font-weight: 600; box-shadow: 0 4px 8px rgba(37,99,235,0.2);">INET</span>
                    <span
                        style="background: white; border: 1px solid #e2e8f0; color: #0f172a; padding: 6px 18px; border-radius: 40px; font-size: 0.85rem; font-weight: 600;">{{ number_format($cant, 0) }}
                        movimientos</span>
                    <span
                        style="background: white; border: 1px solid #e2e8f0; color: #0f172a; padding: 6px 18px; border-radius: 40px; font-size: 0.85rem; font-weight: 600;">{{ $cantDictamenes }}
                        dictámenes</span>
                    <span
                        style="background: white; border: 1px solid #e2e8f0; color: #0f172a; padding: 6px 18px; border-radius: 40px; font-size: 0.85rem; font-weight: 600;">Año
                        {{ $anio }}</span>
                </div>
            </div>
        </div>

        <!-- BODY -->
        <div style="padding: 32px;">

            <div
                style="background: white; border-radius: 20px; border: 1px solid #edf2f7; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.03);">

                <!-- Header de la lista -->
                <div
                    style="padding: 16px 20px; background: #f8fafc; border-bottom: 1px solid #edf2f7; display: flex; justify-content: space-between; align-items: center;">
                    <h3 style="margin: 0; font-size: 1.1rem; font-weight: 600; color: #0f172a;">Detalle de expedientes
                        INET {{ $anio }}</h3>
                    <span
                        style="background: #e2e8f0; color: #334155; padding: 4px 12px; border-radius: 30px; font-size: 0.8rem; font-weight: 500;">{{ count($expedientes) }}
                        movimientos · {{ $cantDictamenes }} dictámenes</span>
                </div>

                <!-- Scroll container con las filas -->
                <div style="max-height: 700px; overflow-y: auto; padding: 20px;">
                    <div style="display: flex; flex-direction: column; gap: 16px;">
                        @foreach ($expedientes as $index => $e)
                            <div
                                style="background: white; border-radius: 16px; border: 1px solid #e9eef2; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">

                                <!-- Cabecera con expediente y número -->
                                <div
                                    style="background: #f8fafc; padding: 12px 16px; border-bottom: 1px solid #edf2f7; display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
                                    <span
                                        style="font-weight: 600; color: #0f172a; font-size: 0.9rem; font-family: monospace; background: white; padding: 4px 10px; border-radius: 30px; border: 1px solid #e2e8f0;">
                                        {{ $e['expte'] }}
                                    </span>
                                    <span
                                        style="background: #2563eb10; color: #2563eb; border: 1px solid #2563eb20; padding: 3px 10px; border-radius: 30px; font-size: 0.7rem; font-weight: 600;">
                                        Movimiento {{ $index + 1 }}
                                    </span>
                                    <span
                                        style="background: #f1f5f9; color: #475569; border: 1px solid #e2e8f0; padding: 3px 10px; border-radius: 30px; font-size: 0.7rem; font-weight: 500;">
                                        Dictamen: {{ $e['dictamen'] }}
                                    </span>
                                </div>

                                <!-- Concepto completo -->
                                <div style="padding: 14px 16px; background: white; border-bottom: 1px solid #f1f5f9;">
                                    <div
                                        style="font-size: 0.85rem; color: #1e293b; line-height: 1.5; text-align: justify;">
                                        {{ $e['concepto'] }}
                                    </div>
                                </div>

                                <!-- Datos en grid de 2 columnas -->
                                <div
                                    style="display: grid; grid-template-columns: 1fr 1fr; background: #ffffff; border-top: 1px solid #f1f5f9;">

                                    <!-- Monto a ejecutar (este movimiento) -->
                                    <div style="padding: 12px 16px; border-right: 1px solid #f1f5f9;">
                                        <div
                                            style="font-size: 0.65rem; text-transform: uppercase; color: #64748b; margin-bottom: 4px; letter-spacing: 0.3px;">
                                            💰 Monto del movimiento</div>
                                        <div style="font-size: 0.9rem; font-weight: 700; color: #059669;">
                                            {{ $fmtMoney($e['a_ejecutar']) }}</div>
                                    </div>

                                    <!-- Monto total del dictamen (referencia) -->
                                    <div style="padding: 12px 16px;">
                                        <div
                                            style="font-size: 0.65rem; text-transform: uppercase; color: #64748b; margin-bottom: 4px; letter-spacing: 0.3px;">
                                            📋 Monto total del dictamen</div>
                                        <div style="font-size: 0.9rem; font-weight: 700; color: #2563eb;">
                                            {{ $fmtMoney($e['aprobado']) }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- TOTALES PEQUEÑOS Y DISCRETOS AL FINAL -->
                <div
                    style="padding: 14px 20px; background: #f9fafc; border-top: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center; font-size: 0.85rem;">
                    <div style="display: flex; gap: 24px;">
                        <div>
                            <span style="color: #64748b;">Total movimientos:</span>
                            <span
                                style="font-weight: 600; color: #0f172a; margin-left: 6px;">{{ number_format($cant, 0) }}</span>
                        </div>
                        <div>
                            <span style="color: #64748b;">Dictámenes únicos:</span>
                            <span
                                style="font-weight: 600; color: #0f172a; margin-left: 6px;">{{ $cantDictamenes }}</span>
                        </div>
                    </div>
                    <div style="display: flex; gap: 24px;">
                        <div>
                            <span style="color: #64748b;">Total aprobado:</span>
                            <span
                                style="font-weight: 600; color: #2563eb; margin-left: 6px;">{{ $fmtMoney($totalAprobado) }}</span>
                        </div>
                        <div>
                            <span style="color: #64748b;">Total a ejecutar:</span>
                            <span
                                style="font-weight: 600; color: #059669; margin-left: 6px;">{{ $fmtMoney($totalEjecutar) }}</span>
                        </div>
                    </div>
                </div>

                <!-- ACLARACIÓN FINAL -->
                <div
                    style="padding: 12px 20px; background: #f8fafc; border-top: 1px solid #e2e8f0; display: flex; align-items: center; gap: 8px;">
                    <div
                        style="background: #2563eb; width: 20px; height: 20px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="white"
                            stroke-width="3">
                            <path d="M20 12H4M12 4v16" />
                        </svg>
                    </div>
                    <div style="font-size: 0.8rem; color: #475569;">
                        <span style="font-weight: 600;">Importante:</span> Se muestran solamente expedientes completos
                        con recibo. Los montos totales por dictamen se contabilizan una única vez.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
