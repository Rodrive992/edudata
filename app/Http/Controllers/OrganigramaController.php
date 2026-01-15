<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrganigramaController extends Controller
{
    public function index(Request $request)
    {
        $debug = $request->boolean('debug'); // ?debug=1

        // =========================
        // 1) MISIONES Y FUNCIONES
        // =========================
        $mfMinistro = [
            'mision' => 'Conducir la política educativa provincial y coordinar acciones estratégicas del Ministerio.',
            'funciones' => [
                'Definir lineamientos y prioridades de gestión.',
                'Coordinar el trabajo intersecretarial e interinstitucional.',
                'Supervisar el cumplimiento de planes, programas y metas.',
            ],
        ];

        $mfSecretaria = [
            'mision' => 'Planificar y ejecutar políticas del área, articulando con direcciones y equipos técnicos.',
            'funciones' => [
                'Organizar acciones y monitorear resultados del área.',
                'Coordinar direcciones y equipos técnicos vinculados.',
                'Impulsar proyectos de mejora y modernización de procesos.',
            ],
        ];

        $mfDireccion = [
            'mision' => 'Implementar operativamente políticas del área, brindando soporte técnico y seguimiento.',
            'funciones' => [
                'Gestionar procesos y trámites propios del área.',
                'Elaborar informes técnicos y administrativos.',
                'Articular con otras áreas para resolver demandas y mejorar servicios.',
            ],
        ];

        // ==========================================================
        // 2) MAPA NUMERO -> NOMBRE (DSC_####.jpg)  (PRIMER PLANO)
        // ==========================================================
        // Regla: usar el archivo siguiente.
        // Excepciones:
        // - 3663 queda igual
        // - 3789 queda igual
        // - 3808 queda igual
        // - 3686 pasa a 3688
        $fotoIndex = [
            3527 => 'Matías Andrés Cabrera',
            3535 => 'Renzo Augusto Gonzalez',
            3539 => 'Cesar Garetto',
            3548 => 'Andrea María Silvina Perea',
            3557 => 'Lucas Rojas',
            3565 => 'Cristian Eduardo Agüero Arreguez',
            3575 => 'Julio Rubén Quiroga',
            3583 => 'Cintia Brizuela',

            3654 => 'Deborah Nancy Dumitru',
            3663 => 'Julieta Fuente',
            3668 => 'Samhara Saleme',
            3675 => 'Pablo Javier Figueroa',
            3681 => 'Ivanna Alejandra del V. Altamiranda',  // ojo: en tu nota decías que 3686 pasa a 3688, pero acá lo dejaste en 3686. Mantengo tu array.
            3688 => 'María Luz Diaz Rodriguez',
            3695 => 'María Fernanda Carrizo Lopez',
            3699 => 'Alejandro Renée Bambicha',
            3705 => 'Luis Rafael Castro',
            3713 => 'Guillermo Eduardo Osella',
            3721 => 'Flavia Vanesa Chasampi',
            3730 => 'Florencia Anahí Merep',
            3734 => 'Carlos David Ponce',
            3745 => 'Ivana Elizabeth Herrera',
            3755 => 'Mariana Del Valle Tapia',
            3764 => 'Cesar Leon Cangi',
            3779 => 'Daiana Montivero',

            3789 => 'Roxana María Inés Monasterio',
            3804 => 'Milena Chasampi Rios',
            3808 => 'Pablo Pedemonte',
            3829 => 'Jesica Alejandra Aybar',

            3832 => 'Nicolás Rosales Matienzo',
        ];

        // =========================
        // 3) HELPERS
        // =========================
        $normalize = function (?string $name): string {
            if (!$name) return '';
            $n = Str::of($name)->ascii()->lower();
            $n = $n->replace([',', '.', ';', ':'], ' ');
            $n = $n->replaceMatches('/\s+/', ' ')->trim();
            return (string) $n;
        };

        $dirAbs = public_path('images/organigrama');

        $debugPhotos = [
            'public_path' => $dirAbs,
            'checked' => [],
        ];

        $photoByName = [];

        foreach ($fotoIndex as $num => $persona) {
            $fileRelLower = "images/organigrama/DSC_{$num}.jpg";
            $fileRelUpper = "images/organigrama/DSC_{$num}.JPG";

            $absLower = public_path($fileRelLower);
            $absUpper = public_path($fileRelUpper);

            $existsLower = file_exists($absLower);
            $existsUpper = file_exists($absUpper);

            $url = null;
            if ($existsLower) $url = asset($fileRelLower);
            elseif ($existsUpper) $url = asset($fileRelUpper);

            $variants = glob($dirAbs . DIRECTORY_SEPARATOR . "DSC_{$num}*.jp*g");
            $variantBasenames = array_map('basename', $variants);

            $key = $normalize($persona);
            $photoByName[$key] = $url;

            $debugPhotos['checked'][] = [
                'num' => $num,
                'persona' => $persona,
                'key' => $key,
                'try_lower' => $fileRelLower,
                'try_upper' => $fileRelUpper,
                'exists_lower' => $existsLower,
                'exists_upper' => $existsUpper,
                'resolved_url' => $url,
                'variants_found' => $variantBasenames,
            ];
        }

        $photoFor = function (?string $persona) use ($normalize, $photoByName) {
            if (!$persona) return null;

            $target = $normalize($persona);

            // 1) Exacto
            if (array_key_exists($target, $photoByName) && !empty($photoByName[$target])) {
                return $photoByName[$target];
            }

            // 2) Substring
            foreach ($photoByName as $k => $url) {
                if (empty($url)) continue;
                if (str_contains($target, $k) || str_contains($k, $target)) {
                    return $url;
                }
            }

            // 3) Tokens (2+ coincidencias)
            $tokens = array_values(array_filter(explode(' ', $target)));
            foreach ($photoByName as $k => $url) {
                if (empty($url)) continue;
                $kt = array_values(array_filter(explode(' ', $k)));
                $common = array_intersect($tokens, $kt);
                if (count($common) >= 2) {
                    return $url;
                }
            }

            return null;
        };

        // =========================
        // 4) DATOS ORGANIGRAMA
        // =========================
        $ministro = [
            'type' => 'ministro',
            't' => 'Ministro/a',
            'area' => 'Ministerio de Educación, Ciencia y Tecnología',
            'n' => 'Nicolás Rosales Matienzo',
            'l' => 'Pabellón N° 11 - CAPE',
            'e' => 'educacion@catamarca.edu.ar',
            'photo' => $photoFor('Nicolás Rosales Matienzo'),
            'mf' => $mfMinistro,
        ];

        $secretarias = [
            [
                'type' => 'secretaria',
                't' => 'Secretaría de Innovación Educativa',
                'area' => 'Innovación Educativa',
                'n' => 'Cesar Garetto',
                'l' => 'Pabellón N° 13 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
            ],
            [
                'type' => 'secretaria',
                't' => 'Secretaría de Articulación Institucional',
                'area' => 'Articulación Institucional',
                'n' => 'Milena Chasampi Rios',
                'l' => 'Pabellón N° 15 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
            ],
            [
                'type' => 'secretaria',
                't' => 'Secretaría de Planeamiento Educativo',
                'area' => 'Planeamiento Educativo',
                'n' => 'Mariana Del Valle Tapia',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'planeamiento@catamarca.edu.ar',
            ],
            [
                'type' => 'secretaria',
                't' => 'Secretaría de Educación',
                'area' => 'Educación',
                'n' => 'Roxana María Inés Monasterio',
                'l' => 'Pabellón N° 12 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
            ],
            [
                'type' => 'secretaria',
                't' => 'Secretaría de Ciencia y Tecnología',
                'area' => 'Ciencia y Tecnología',
                'n' => 'Luis Rafael Castro',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
            ],
        ];
        foreach ($secretarias as &$s) $s['photo'] = $photoFor($s['n']);
        unset($s);

        $direcciones = [
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Inteligencia Artificial y Alfabetización Digital',
                'area' => 'Inteligencia Artificial y Alfabetización Digital',
                'n' => 'Deborah Nancy Dumitru',
                'l' => 'Pabellón N° 13 - CAPE',
                'e' => 'dirinteligenciaartificial@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Despacho',
                'area' => 'Despacho',
                'n' => 'Guillermo Eduardo Osella',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'mesadeentradas-despacho@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Sumario Docente',
                'area' => 'Sumario Docente',
                'n' => 'Samhara Saleme',
                'l' => 'Pabellón N° 12 - CAPE',
                'e' => 'dirsumariodocente@catamarca.gov.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Asuntos Jurídicos',
                'area' => 'Asuntos Jurídicos',
                'n' => 'Carolina del Valle Reynoso',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Programación y Mantenimiento Edilicio',
                'area' => 'Programación y Mantenimiento Edilicio',
                'n' => 'Silvia Ines Zalazar',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Transparencia Activa',
                'area' => 'Transparencia Activa',
                'n' => 'Renzo Augusto Gonzalez',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Unidad Ejecutora de Programas y Proyectos',
                'area' => 'Unidad Ejecutora de Programas y Proyectos',
                'n' => 'Victoria María Gonzalez Rojas',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Administración',
                'area' => 'Administración',
                'n' => 'Rosa del Valle Galian',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección de Parque Automotor',
                'area' => 'Parque Automotor',
                'n' => 'Cristian Eduardo Agüero Arreguez',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Desarrollo Profesional y Evaluación Educativa',
                'area' => 'Desarrollo Profesional y Evaluación Educativa',
                'n' => 'Melisa Ludmila Schonhals',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'capacitacion@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Estadística Educativa y Análisis Poblacional',
                'area' => 'Estadística Educativa y Análisis Poblacional',
                'n' => 'Ivana Elizabeth Herrera',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'estadistica@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Educación Inicial',
                'area' => 'Educación Inicial',
                'n' => 'Flavia Vanesa Chasampi',
                'l' => 'Pabellón N° 13 - CAPE',
                'e' => 'educacioninicial@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Educación Primaria',
                'area' => 'Educación Primaria',
                'n' => 'Cesar Leon Cangi',
                'l' => 'Pabellón N° 14 - CAPE',
                'e' => 'educacionprimaria@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Educación Secundaria',
                'area' => 'Educación Secundaria',
                'n' => 'Andrea María Silvina Perea',
                'l' => 'Pabellón N° 13 - CAPE',
                'e' => 'educacionsecundaria@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Educación Superior',
                'area' => 'Educación Superior',
                'n' => 'Cintia Brizuela',
                'l' => 'Pabellón N° 13 - CAPE',
                'e' => 'educacionsuperior@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Modalidades Educativas',
                'area' => 'Modalidades Educativas',
                'n' => 'Fuente, Andrea Julieta',
                'l' => 'Pabellón N° 14 - CAPE',
                'e' => 'modalidadeseducativas@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Educación de Gestión Municipal Privada, Social y Cooperativa',
                'area' => 'Educación de Gestión Municipal Privada, Social y Cooperativa',
                'n' => 'Pablo Javier Figueroa',
                'l' => 'Pabellón N° 13 - CAPE',
                'e' => 'educacionprivadaymunicipal@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Educación Técnica, Agrotécnica y Formación Profesional',
                'area' => 'Educación Técnica, Agrotécnica y Formación Profesional',
                'n' => 'Matías Andrés Cabrera',
                'l' => 'Pabellón N° 26 - CAPE',
                'e' => 'educaciontecnicaagrotecticayfp@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Startups y Ecosistema Emprendedor',
                'area' => 'Startups y Ecosistema Emprendedor',
                'n' => 'Ivanna Alejandra del V. Altamiranda',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Ciencia Aplicada y Formación Tecnológica',
                'area' => 'Ciencia Aplicada y Formación Tecnológica',
                'n' => 'María Luz Diaz Rodriguez',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Transformación Digital e Infraestructura Tecnológica',
                'area' => 'Transformación Digital e Infraestructura Tecnológica',
                'n' => 'Carlos David Ponce',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección de Legalización y Registro de Títulos',
                'area' => 'Legalización y Registro de Títulos',
                'n' => 'Julio Rubén Quiroga',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección de Residencia Universitaria',
                'area' => 'Residencia Universitaria',
                'n' => 'Alejandro Renée Bambicha',
                'l' => 'Maximio Victoria S/N',
                'e' => 'rup@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección de Tesorería',
                'area' => 'Tesorería',
                'n' => 'Florencia Anahí Merep',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección de Compras',
                'area' => 'Compras',
                'n' => 'Daiana Montivero',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección de Sistemas y Desarrollo Tecnológico',
                'area' => 'Sistemas y Desarrollo Tecnológico',
                'n' => 'Pablo Pedemonte',
                'l' => 'Pabellón N° 13 - CAPE',
                'e' => 'dsdt@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección de Administración, Ejecución y Financiamiento Científico',
                'area' => 'Administración, Ejecución y Financiamiento Científico',
                'n' => 'Jesica Alejandra Aybar',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección de Investigación, Innovación y Extensión',
                'area' => 'Investigación, Innovación y Extensión',
                'n' => 'María Fernanda Carrizo Lopez',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
            ],
        ];

        foreach ($direcciones as &$d) $d['photo'] = $photoFor($d['n']);
        unset($d);

        // ==========================================================
        // 5) DEPENDENCIA: Dirección -> Secretaría (PASADO AL CONTROLLER)
        // ==========================================================
        $dirToSecretaria = [
            // Secretaría de Innovación Educativa
            'Dirección Provincial de Inteligencia Artificial y Alfabetización Digital' => 'Secretaría de Innovación Educativa',
            'Dirección Provincial de Transformación Digital e Infraestructura Tecnológica' => 'Secretaría de Innovación Educativa',
            'Dirección Provincial de Ciencia Aplicada y Formación Tecnológica' => 'Secretaría de Innovación Educativa',
            'Dirección Provincial de Startups y Ecosistema Emprendedor' => 'Secretaría de Innovación Educativa',
            'Dirección de Sistemas y Desarrollo Tecnológico' => 'Secretaría de Innovación Educativa',

            // Secretaría de Articulación Institucional
            'Dirección Provincial de Despacho' => 'Secretaría de Articulación Institucional',
            'Dirección Provincial de Sumario Docente' => 'Secretaría de Articulación Institucional',
            'Dirección Provincial de Asuntos Jurídicos' => 'Secretaría de Articulación Institucional',
            'Dirección Provincial de Transparencia Activa' => 'Secretaría de Articulación Institucional',
            'Dirección Provincial de Unidad Ejecutora de Programas y Proyectos' => 'Secretaría de Articulación Institucional',
            'Dirección Provincial de Administración' => 'Secretaría de Articulación Institucional',
            'Dirección Provincial de Programación y Mantenimiento Edilicio' => 'Secretaría de Articulación Institucional',
            'Dirección de Tesorería' => 'Secretaría de Articulación Institucional',
            'Dirección de Compras' => 'Secretaría de Articulación Institucional',
            'Dirección Provincial de Parque Automotor' => 'Secretaría de Articulación Institucional',

            // Secretaría de Planeamiento Educativo
            'Dirección Provincial de Desarrollo Profesional y Evaluación Educativa' => 'Secretaría de Planeamiento Educativo',
            'Dirección Provincial de Estadística Educativa y Análisis Poblacional' => 'Secretaría de Planeamiento Educativo',

            // Secretaría de Educación
            'Dirección Provincial de Educación Inicial' => 'Secretaría de Educación',
            'Dirección Provincial de Educación Primaria' => 'Secretaría de Educación',
            'Dirección Provincial de Educación Secundaria' => 'Secretaría de Educación',
            'Dirección Provincial de Educación Superior' => 'Secretaría de Educación',
            'Dirección Provincial de Modalidades Educativas' => 'Secretaría de Educación',
            'Dirección Provincial de Educación de Gestión Municipal Privada, Social y Cooperativa' => 'Secretaría de Educación',
            'Dirección Provincial de Educación Técnica, Agrotécnica y Formación Profesional' => 'Secretaría de Educación',
            'Dirección de Legalización y Registro de Títulos' => 'Secretaría de Educación',
            'Dirección de Residencia Universitaria' => 'Secretaría de Educación',

            // Secretaría de Ciencia y Tecnología
            'Dirección de Administración, Ejecución y Financiamiento Científico' => 'Secretaría de Ciencia y Tecnología',
            'Dirección de Investigación, Innovación y Extensión' => 'Secretaría de Ciencia y Tecnología',
        ];

        // Agrupar direcciones por secretaría
        $dirsBySecretaria = [];
        $direccionesSinAsignar = [];

        foreach ($direcciones as $d) {
            $secTitle = $dirToSecretaria[$d['t']] ?? null;
            if ($secTitle) {
                $dirsBySecretaria[$secTitle] ??= [];
                $dirsBySecretaria[$secTitle][] = $d;
            } else {
                $direccionesSinAsignar[] = $d;
            }
        }

        // Construir secretarias "full" (con direcciones dependientes)
        $secretariasFull = [];
        foreach ($secretarias as $s) {
            $secTitle = $s['t'];
            $secretariasFull[] = [
                ...$s,
                'direcciones' => $dirsBySecretaria[$secTitle] ?? [],
            ];
        }

        $totalCount = 1 + count($secretarias) + count($direcciones);

        // =========================
        // DEBUG JSON
        // =========================
        if ($debug && $request->boolean('json')) {
            return response()->json([
                'public_images_organigrama' => $dirAbs,
                'checked_files' => $debugPhotos['checked'],
                'tip' => 'Si variants_found tiene algo (ej: DSC_1234 (1).jpg), renombralo a DSC_1234.jpg',
                'direcciones_sin_asignar' => $direccionesSinAsignar,
            ]);
        }

        return view('edudata.organigrama.index', compact(
            'mfMinistro',
            'mfSecretaria',
            'mfDireccion',
            'ministro',
            'secretariasFull',
            'direccionesSinAsignar',
            'totalCount',
            'debug'
        ));
    }
}
