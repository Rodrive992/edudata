<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrganigramaController extends Controller
{
    public function index(Request $request)
    {
        $debug = $request->boolean('debug');

        // ==========================================================
        // 1) MISIONES Y FUNCIONES COMPLETAS DE TODAS LAS DEPENDENCIAS
        // ==========================================================

        // Ministerio
        // =========================
        // MINISTERIO
        // =========================
        $mfMinistro = [
            'mision' => 'Conducir la política educativa provincial y coordinar acciones estratégicas del Ministerio.',
            'funciones' => [
                'Definir lineamientos y prioridades de gestión.',
                'Coordinar el trabajo intersecretarial e interinstitucional.',
                'Supervisar el cumplimiento de planes, programas y metas.',
            ],
            'detalle_completo' => [
                'objetivos' => [
                    'Regular el ejercicio del derecho de enseñar y aprender en el territorio de la Provincia de Catamarca, conforme a los derechos y principios establecidos en la Constitución Nacional y los Tratados Internacionales, la Constitución Provincial, la Ley Nacional de Educación N° 26.206, Ley Provincial N° 3581, la Ley de Educación Técnico Profesional N° 26.058, la Ley de Educación Superior N° 24.521, la Ley Nacional de los Derechos de Niños, Niñas y Adolescentes N° 26.061, la Ley Provincial N° 5372, la Ley Nacional para la Promoción de la Convivencia y el Abordaje de la Conflictividad Social en las Instituciones Educativas N° 26.892, y las normas que se dicten en su consecuencia.',
                    'Proveer una educación integral, inclusiva, permanente y de calidad para todos sus habitantes, garantizando la igualdad, gratuidad, equidad y justicia social en el ejercicio de este derecho, con la participación de la comunidad educativa, las familias y las organizaciones sociales.',
                    'Definir y planificar la política educativa, con la finalidad de garantizar al educando y a la sociedad el derecho a la educación.',
                    'Garantizar el acceso de todos los ciudadanos a la información y al conocimiento como instrumentos centrales de la participación en un proceso de desarrollo con crecimiento económico y justicia social.',
                    'Garantizar el acceso de los/as ciudadanos en los niveles del sistema educativo sin restricciones, debiendo el establecimiento escolar expresar por escrito los motivos y causas por los que negase la inscripción o re-inscripción de los educandos.',
                    'Garantizar una Educación de calidad con igualdad de oportunidades y posibilidades, para el logro de la inclusión plena de todos/as los/as habitantes de la Provincia de Catamarca.',
                    'Garantizar una educación integral y propuestas de aprendizaje que desarrollen todas las dimensiones de las personas biopsicoespiritual y brinden las competencias necesarias para el desempeño social y laboral como para el acceso a estudios superiores y a la educación permanente.',
                    'Garantizar la inclusión educativa a través de políticas universales y de estrategias pedagógicas y de asignación de recursos que otorguen prioridades a los sectores más desfavorecidos de la sociedad.',
                    'Garantizar una formación ciudadana comprometida con los valores éticos y democráticos de participación, libertad, justicia, igualdad, solidaridad, resolución pacífica de conflictos, integrada y libre de violencia física y psicológica en las instituciones educativas de todos los niveles y modalidades del sistema educativo provincial, respeto a los derechos humanos, responsabilidad, honestidad, valoración y preservación del patrimonio natural y cultural.',
                    'Garantizar la adquisición de hábitos de vida saludable y de conocimientos, actitudes y valores vinculados a la educación vial, la educación para el consumo y a la prevención de adicciones como, asimismo, la formación en Educación Sexual integral en el marco de lo establecido en la Ley Nacional N° 26.150.',
                    'Actualización disciplinar y pedagógica permanente, gratuitas, en servicio y pertinentes a las necesidades de los/as profesionales de la educación y de las instituciones educativas provinciales.',
                    'Fortalecer el respeto y efectivo cumplimiento de las normas provinciales vigentes para la comunidad docente y no docente que trabaja en el sistema educativo de la provincia.',
                    'Fortalecer los saberes socialmente productivos reconociéndolos y garantizando su evaluación, acreditación y certificación.',
                    'Garantizar la formación que estimule la creatividad, el placer y promueva la comprensión de las distintas manifestaciones del arte, la cultura, la ciencia y la tecnología.',
                    'Promover y coordinar las políticas educativas con las otras políticas públicas para atender integralmente las necesidades de la población y aprovechar al máximo los recursos estatales, sociales, comunitarios y naturales.',
                    'Celebrar convenios con Nación, otras Provincias, Municipios y entidades públicas o privadas, para el desarrollo e implementación de los programas y la ejecución de acciones de su competencia.',
                ],
                'acciones' => [
                    'Brindar las oportunidades necesarias para el desarrollo y fortalecimiento de la formación integral y permanente de las personas, promoviendo en cada educando la capacidad de definir su proyecto de vida, basado en los valores de libertad, paz, solidaridad, igualdad, respeto a la diversidad, justicia, responsabilidad y bien común.',
                    'Diseñar las estrategias necesarias para la integración del sistema educativo provincial con el de otras jurisdicciones.',
                    'Mantener una estructura unificada en todo el territorio provincial, integrado por los servicios educativos de gestión estatal, gestión privada, gestión municipal, gestión cooperativa, y gestión social, que abarcan los distintos niveles y modalidades de la educación.',
                    'Autorizar y supervisar el funcionamiento de instituciones educativas de gestión privada, confesionales o no confesionales, de gestión cooperativa, y de gestión social y ejerciendo sus competencias específicas respecto de las instituciones educativas de gestión municipal.',
                    'Administrar la movilidad de alumnos/as y docentes, equivalencias de certificaciones y la continuidad de los estudios sin requisitos suplementarios.',
                    'Planificar intercambios interprovinciales e interdepartamentales, orientados a fortalecer procesos de capacitación y concientización fundamentados en el respeto a la diversidad y la valoración de la interculturalidad.',
                    'Fijar las políticas y estrategias educativas, conforme a los fines y objetivos de la presente Ley.',
                    'Asegurar el derecho a la educación a todos los habitantes de la Provincia.',
                    'Cumplir y hacer cumplir la presente Ley, disponiendo los actos administrativos y las medidas necesarias para su implementación.',
                    'Planificar, organizar, administrar y financiar el Sistema Educativo Provincial.',
                    'Elaborar, actualizar y aprobar los diseños curriculares y documentos de desarrollo curricular de todos los niveles y modalidades del Sistema Educativo Provincial, en el marco de lo acordado en el Consejo Federal de Educación.',
                    'Organizar y gestionar el sistema de evaluación de la calidad educativa en todo el ámbito provincial.',
                    'Relevar, producir y difundir información sustantiva del Sistema Educativo Provincial.',
                    'Organizar, supervisar y brindar asistencia técnico-pedagógica a las instituciones educativas de gestión estatal.',
                    'Planificar la Capacitación anual del recurso humano de su dependencia.',
                    'Crear y reestructurar establecimientos educativos afectándolos a experiencias pedagógicas conforme a las necesidades del medio y a las exigencias del sistema.',
                    'Procurar la eficiente distribución de los recursos humanos, físicos y financieros dentro del Sistema Educativo.',
                    'Determinar anualmente el reordenamiento de las plantas orgánicas funcionales conforme a la demanda educativa.',
                    'Autorizar, reconocer, supervisar y realizar los aportes correspondientes a las instituciones educativas de gestión privada, municipal, cooperativa y social.',
                    'Disponer la intervención normalizadora de los consejos regionales y/o unidades escolares en los casos de crisis institucional de acuerdo con lo que establezca la reglamentación.',
                    'Brindar información periódica, acerca de la evolución de los principales indicadores educativos y de los avances y logros de la planificación del período. Proveerá esta información a la Legislatura Provincial de acuerdo a la periodicidad que la reglamentación establezca.',
                    'Participar por si, o designando un representante en las reuniones del Consejo Federal de Educación y aplicar sus resoluciones resguardando la unidad del Sistema Educativo Nacional.',
                    'Expedir títulos y certificaciones de estudios, en el marco de su competencia provincial.',
                    'Planificar y ejecutar los programas que favorezcan la igualdad e inclusión educativa.',
                    'Planificar y gestionar los proyectos de infraestructura escolar.',
                    'Coordinar la política educativa con los programas de las demás áreas del Gobierno de la Provincia.',
                    'Concurrir en representación del Poder Ejecutivo a las reuniones de negociación paritaria docente provincial, con los representantes de los sindicatos de trabajadores de la educación.',
                    'Participar en la formulación, ejecución y evaluación del presupuesto provincial.',
                    'Coordinar la planificación y ejecución de todas las iniciativas de inversión pública y programas de desarrollo en el sistema educativo.',
                    'Planificar y reorganizar a través de la administración de los Recursos Humanos.',
                    'Coordinar y disponer la ejecución de las políticas sobre la educación técnica y regular todo lo atinente a lo que realice el Instituto Nacional de Educación Técnica (INET), representando por si, o por medio de representante designado por acto administrativo del Ministro, en los ámbitos permanentes de consulta tanto del Instituto Nacional de Educación Técnica (INET), como ante la Comisión Federal de la Educación Técnico Profesional y del Consejo Nacional de Educación, Trabajo y Producción (CoNETyP).',
                    'Representar al Poder Ejecutivo en el Centro de Desarrollo Científico y Tecnológico de la provincia (CEDECITCA), siendo su autoridad de aplicación.',
                    'Participar por si, o designando un representante en las reuniones del Consejo Federal de Ciencia y Tecnología, en coordinación con las áreas competentes.',
                ],
            ],
        ];


        // Secretarías
        $mfSecretaria = [
            'mision' => 'Planificar y ejecutar políticas del área, articulando con direcciones y equipos técnicos.',
            'funciones' => [
                'Organizar acciones y monitorear resultados del área.',
                'Coordinar direcciones y equipos técnicos vinculados.',
                'Impulsar proyectos de mejora y modernización de procesos.',
            ],
            'detalle_por_secretaria' => [
                'Secretaría de Innovación Educativa' => [
                    'objetivos' => [
                        'La Secretaría de Innovación Educativa del Ministerio de Educación, Ciencia y Tecnología tiene como misión promover la innovación educativa en todos los niveles y modalidades del Sistema Educativo Provincial, a través de un trabajo articulado con la Secretaría de Educación y la Secretaría de Planeamiento Educativo, que estarán a cargo de su implementación, impulsando una educación de calidad, inclusiva y adaptada a los desafíos del Siglo XXI.',
                        'Impulsar acciones de promoción de la salud, cuidados y derechos con los actores institucionales para propiciar el aprendizaje y desarrollo humano integral, el mejoramiento de la calidad de vida y el bienestar de todos los miembros de la comunidad educativa.',
                    ],
                    'acciones' => [
                        'Impulsar y coordinar, a través de un trabajo articulado, la política de innovación educativa para los niveles de educación inicial, primaria, secundaria y superior no universitaria, y sus modalidades en conformidad con la Ley de Educación Provincial y Educación Nacional y las pautas emanadas del Consejo Federal de Educación.',
                        'Participar en la planificación y diseño de políticas educativas provinciales conjuntamente con la Secretaría de Educación y la Secretaría de Planeamiento Educativo.',
                        'Promover programas o planes de gobierno tendientes al mejoramiento de la calidad de la educación obligatoria y modalidades de provincias, adaptados a los desafíos del Siglo XXI.',
                        'Participar en la elaboración de los lineamientos curriculares y pedagógicos para la educación obligatoria y la formación docente superior no universitaria, la formación técnica y profesional, y en conformidad con los acuerdos logrados en el Consejo Federal de Educación.',
                        'Promover la innovación educativa en los procesos de enseñanza y aprendizaje y en la gestión institucional de todos los niveles y modalidades del Sistema Educativo Provincial.',
                        'Promover marcos pedagógicos de la educación digital de todos los niveles y modalidades del sistema educativo, adaptada a los desafíos del Siglo XXI.',
                        'Promover el trabajo situado en territorio que permita conocer la realidad de cada institución e intervenir mediante estrategias específicas.',
                        'Establecer políticas de alimentación saludable adecuadas a los requerimientos nutricionales y situación cultural, económica y social en el ámbito escolar.',
                        'Promover la justicia pedagógica, la igualdad de oportunidades y la inclusión educativa a través del asesoramiento al personal docente, directivo y de supervisión para el abordaje de los conflictos escolares previa solicitud de la dirección de nivel y/o modalidad educativa.',
                        'Promover medidas preventivas con un trabajo articulado con la dirección de nivel y/o modalidad educativa, tendientes a prevenir casos de vulneración de derechos en niñas, niños y adolescentes.',
                        'Fortalecer los vínculos de la escuela y las familias a través de las cooperadoras escolares.',
                    ]
                ],
                'Secretaría de Articulación Institucional' => [
                    'objetivos' => [
                        'Coordinar, articular y fortalecer la integración institucional entre las distintas áreas del Ministerio de Educación, Ciencia y Tecnología, asegurando la implementación eficiente y coherente de las políticas públicas definidas por el Poder Ejecutivo Provincial. Asimismo, establecer, supervisar y auditar procedimientos administrativos, técnicos y operativos que garanticen respuestas eficaces a los requerimientos del sistema educativo, promoviendo la colaboración interjurisdiccional, la transparencia activa, la mejora continua de los procesos y la optimización de los recursos públicos.',
                    ],
                    'acciones' => [
                        'Coordinar la aplicación de políticas, estrategias y directrices emanadas del Ministro de Educación, Ciencia y Tecnología, en articulación con todas las Secretarías y unidades organizativas del Ministerio.',
                        'Atender los asuntos del Despacho Ministerial, gestionando la documentación, actos administrativos y requerimientos vinculados directamente con la función del Ministro.',
                        'Supervisar y organizar los flujos documentales y operativos de la gestión ministerial, asegurando su trazabilidad, legalidad y eficacia.',
                        'Establecer procedimientos internos que tiendan a mejorar la eficiencia administrativa y brindar respuestas oportunas a las demandas del sistema educativo provincial.',
                        'Diseñar e implementar mecanismos de auditoría interna sobre los procesos y circuitos administrativos, financieros y operativos del Ministerio, promoviendo prácticas de gestión ética, eficiente y basada en la rendición de cuentas.',
                        'Impulsar acciones de transparencia activa en la gestión institucional, garantizando el acceso público a la información relevante, conforme a la normativa vigente.',
                        'Celebrar convenios con organismos nacionales, provinciales, municipales y entidades públicas o privadas, para implementar programas, proyectos o acciones de interés educativo.',
                        'Promover la cooperación institucional entre las diversas estructuras del Ministerio y otras áreas del Estado, asegurando una gestión integrada.',
                        'Coordinar acciones con otras Secretarías del Ministerio para el diseño, ejecución, monitoreo y evaluación de planes, programas y políticas.',
                        'Consolidar la información generada por las direcciones y unidades dependientes, garantizando su sistematización, análisis y adecuada circulación.',
                        'Supervisar el desempeño de las áreas bajo su dependencia, asegurando el cumplimiento de las funciones asignadas con criterios de eficacia, eficiencia y legalidad.',
                        'Fiscalizar, en coordinación con la Dirección Provincial de Administración, las actividades presupuestarias, contables y financieras del Ministerio.',
                        'Intervenir en la elaboración de proyectos normativos, especialmente aquellos relacionados con la administración de recursos del Ministerio.',
                        'Producir informes técnicos y administrativos requeridos por la autoridad superior.',
                        'Mantener actualizado el compendio normativo (leyes, decretos, resoluciones, disposiciones) pertinente a la competencia ministerial.',
                        'Promover actos administrativos tendientes a mejorar la calidad del servicio del personal a su cargo, agilizando trámites y desburocratizando procesos.',
                        'Coordinar el registro, tramitación y seguimiento de la documentación oficial que ingresa y egresa del Ministerio, a través de la Dirección Provincial de Despacho.',
                        'Impulsar, junto a la Dirección Provincial de Administración, acciones articuladas con las distintas áreas del Ministerio para asegurar el funcionamiento regular de los procesos presupuestarios, contables y financieros.',
                        'Intervenir en los procedimientos de adquisición y contratación conforme a la normativa vigente.',
                        'Entender en la administración y desarrollo de los recursos humanos del Ministerio, en coordinación con las áreas pertinentes.',
                        'Coordinar el funcionamiento, utilización y mantenimiento del parque automotor ministerial, promoviendo su uso eficiente y responsable.',
                        'Supervisar la ejecución de reparaciones, controles técnicos y peritajes de los vehículos oficiales, conforme a la normativa del Poder Ejecutivo y la legislación vigente.',
                        'Emitir y actualizar el reglamento interno del Parque Automotor del Ministerio, estableciendo criterios para su uso y resguardo.',
                        'Verificar la vigencia y condiciones de las pólizas de seguros de los vehículos oficiales.',
                    ]
                ],
                'Secretaría de Planeamiento Educativo' => [
                    'objetivos' => [
                        'Fortalecer el sistema educativo provincial mediante la planificación estratégica y prospectiva, utilizando la recolección, producción y análisis de datos cuantitativos y cualitativos para identificar y abordar problemas demográficos, socioeconómicos, culturales y pedagógicos, optimizando el sistema educativo provincial, en concordancia con la Ley de Educación Provincial Núm. 5381.',
                    ],
                    'acciones' => [
                        'Organizar, administrar y actualizar información educativa, siguiendo estándares provinciales, nacionales e internacionales, facilitando estudios comparativos cuantitativos y cualitativos para atender diversas demandas de información.',
                        'Elaborar en coordinación con la Secretaría de Educación, la planificación estratégica de la política educativa provincial.',
                        'Ejecutar acciones de seguimiento, monitoreo y evaluación de los procesos de elaboración e implementación de los diseños curriculares de todos los niveles y modalidades.',
                        'Evaluar la implementación de las políticas educativas provinciales y nacionales, aplicando evaluaciones provinciales, nacionales e internacionales relacionadas con el aprendizaje y la enseñanza.',
                        'Diseñar e implementar programas de formación continua y desarrollo profesional para los docentes, que les permitan actualizar sus conocimientos, adquirir nuevas habilidades y mejorar sus prácticas pedagógicas.',
                        'Asegurar un sistema educativo provincial eficiente y actualizado a través de la administración completa de la infraestructura tecnológica y la creación de soluciones informáticas innovadoras.',
                        'Optimizar la gestión de la educación superior, impulsando la formación integral, la generación de conocimiento y la democratización del acceso; desarrollando programas de formación científica y profesional, fomentando la investigación y la creación artística, y articulando con el sector productivo para asegurar, que los programas y proyectos, respondan a las necesidades y prioridades del desarrollo regional y nacional.',
                    ]
                ],
                'Secretaría de Educación' => [
                    'objetivos' => [
                        'Asistir al Ministerio de Educación, Ciencia y Tecnología en todo lo inherente a planificación, elaboración, ejecución, control y evaluación de la política educativa de acuerdo con la finalidad, principios y lineamientos que establece la Constitución Nacional, los Tratados Internacionales sobre los Derechos Humanos, la Constitución de la Provincia de Catamarca, Ley de Educación Nacional N°26.206, Ley de Educación Superior N°24.521, Ley de Educación Técnico Profesional N°26.058, la Ley de Educación Provincial N°5.381 y demás normativas vigentes en materia educativa.',
                        'Ejercer la dirección y administración general del área, asumiendo la responsabilidad de la gestión educativa de los distintos organismos bajo su dependencia, garantizando la correcta aplicación de la legislación educativa Nacional y Provincial.',
                    ],
                    'acciones' => [
                        'Ejecutar los objetivos de las políticas educativas establecidas, referidas a programas de asistencia escolar, financiados con aportes Nacionales, Regionales y Jurisdiccionales, que aspiren a ofrecer igualdad de oportunidades educativas, a satisfacer necesidades socioeconómicas o que tengan por finalidad, la contención de sectores educativos socialmente más vulnerables.',
                        'Elaborar la planificación general del área a su cargo, programando, ejecutando, y evaluando su implementación, previa aprobación del Ministerio de Educación, Ciencia y Tecnología.',
                        'Coordinar pautas de trabajo y criterios para la gestión educativa que aseguren la máxima eficiencia técnica-pedagógica en la coordinación de los distintos organismos de su dependencia.',
                        'Coordinar técnicamente con las direcciones provinciales de su dependencia el desarrollo de los lineamientos sobre política educativa, definidos por el Ministerio de Educación, Ciencia y Tecnología.',
                        'Adoptar acciones conjuntas con las diferentes Direcciones Provinciales de su dependencia y demás organismos del Poder Ejecutivo Provincial a efectos de implementar programas relacionados con la salud, deporte y recreación en el ámbito escolar.',
                        'Adoptar medidas para el mejoramiento del rendimiento funcional de las unidades educativas, elevando la calidad de los resultados académicos de los alumnos y de la oferta educativa.',
                        'Intervenir en el diseño, elaboración y aplicación de disposiciones reglamentarias de carácter administrativo, técnicas y pedagógicas.',
                        'Coordinar acciones y estrategias con las Secretarias del Ministerio de Educación, Ciencia y Tecnología, en lo referente al apoyo técnico necesario para el desarrollo de la programación de la gestión educativa.',
                        'Coordinar el funcionamiento de programas y servicios complementarios a la acción educativa, de origen Nacional y Provincial.',
                        'Coordinar acciones con organismos del Poder Ejecutivo Provincial, Nacional y con otros organismos no gubernamentales, que permitan el desarrollo armónico del sistema educativo de la provincia.',
                        'Establecer criterios administrativos y técnicos para asegurar la legalidad y legitimidad de los títulos que legaliza y registra Dirección de Legalización y Registro de Títulos de la Provincia.',
                        'Proponer la actualización, estudio, diseño de textos y socialización de la legislación educativa.',
                        'Representar al Ministerio de Educación, Ciencia y Tecnología, cuando sea requerido por el responsable máximo de dicho Ministerio.',
                        'Participar en la elaboración del presupuesto anual del área y de las áreas que dependen de esta Secretaría.',
                        'Identificar necesidades y ejecutar acciones de capacitación del personal a su cargo.',
                        'Elaborar la memoria anual del área.',
                    ]
                ],
                'Secretaría de Ciencia y Tecnología' => [
                    'objetivos' => [
                        'El desarrollo Científico-Tecnológico de la provincia será promovido mediante políticas y la cooperación con jurisdicciones y organismos, nacionales e internacionales.',
                        'Impulsar y ejecutar la investigación, sus acciones, objetivos y metas.',
                        'Participar en la formulación de las políticas y en la planificación estratégica del desarrollo de la ciencia y la tecnología como instrumento, que permita fortalecer la capacidad de la provincia para dar respuesta a problemas sociales, ambientales, culturales y sectoriales prioritarios.',
                        'Asistir al ministerio de educación, ciencia y tecnología en la ejecución y evaluación de planes y programas de ciencia, tecnología e innovación productiva en el ámbito de la provincia.',
                        'Ejercer la dirección y administración de la secretaria, planificando objetivos a corto y largo plazo a través de la coordinación y la gestión de las áreas bajo su dependencia, garantizando la aplicación de la legislación nacional y provincial.',
                        'Incrementar en forma sostenible la competitividad del sector productivo, sobre la base del desarrollo de bienes y servicios mediante las nuevas tecnologías e innovación.',
                        'Fortalecer un modelo productivo que genere una mayor inclusión social y mejore la competitividad de la economía provincial.',
                        'Promover la creación de nexos entre el sector Científico-Tecnológico y el sector productivo, teniendo en cuenta la economía del conocimiento.',
                    ],
                    'acciones' => [
                        'Establecer los objetivos y políticas del área de su competencia.',
                        'Entender en el diseño de medidas e instrumentos para la promoción de la ciencia, la tecnología y la innovación; en particular en el impulso y administración de los fondos sectoriales en áreas prioritarias para el sector productivo o en los sectores con alto contenido de bienes públicos (en coordinación con la secretaría de coordinación institucional).',
                        'Estimular la investigación en las ciencias.',
                        'Desarrollar la metodología científica.',
                        'Estimular el desarrollo de las humanidades.',
                        'Tener a su cargo las aplicaciones de las ciencias.',
                        'Relevamiento de la ciencia y la tecnología en el contexto provincial.',
                        'Promover la formación, la actualización y perfeccionamiento de la comunidad educativa, a través de cursos, cursillos, simposios, seminarios, jornadas y congresos.',
                        'Asesorar sobre los temas de su ámbito al Ministerio de Educación, Ciencia y Tecnología, organismos de la provincia y otros recurrentes, si hubiere la autorización correspondiente.',
                        'Proponer la realización de investigaciones de proyectos especiales con diversa denominación y otras medidas qué, mediante la aplicación de la ciencia y la tecnología tiendan al mejoramiento de las condiciones de vida de la provincia.',
                        'Crear unidades, institutos y centros de investigación para las diversas disciplinas y niveles que contribuyan al desarrollo de la provincia, así también instalar laboratorios u otros centros especializados con el equipamiento adecuado, atendiendo a las necesidades de los investigadores de su área, dentro de lo que prevean los planes y programas aprobados.',
                        'Evaluar los proyectos de investigación propuestos por los becarios e investigadores. Así mismo, podrá la secretaria determinar directamente la temática a investigar y la clasificación de la misma.',
                        'Garantizar que las prácticas profesionales integren la etapa formativa de los estudiantes, con el propósito de consolidar, integrar y ampliar las capacidades de saberes que se corresponden con el perfil profesional.',
                        'Fomentar experiencias de formación profesional que fortalezca la integración laboral de las personas con mayor riesgo de exclusión social.',
                        'Llevar a cabo políticas de popularización y sensibilización de la ciencia, la tecnología, la inteligencia artificial y software.',
                        'Impulsar acciones con el fin de fomentar vocaciones científicas y de desarrollo de software en los más jóvenes, como así también la apropiación del conocimiento científico por parte de toda la comunidad.',
                        'Intervenir en la formulación de convenios internacionales de integración científica y tecnológica de carácter bilateral o multilateral, impulsando un activo intercambio cientifico-tecnologico, promoviendo el desarrollo de investigaciones conjuntas, como así también, transferencias de resultados al sector productivo.',
                        'Intervenir en la promoción y generación de tratados y convenios internacionales relativos a la ciencia, tecnología e innovación y entender en la aplicación de los mismos, sus leyes y reglamentos generales relativos a la materia.',
                        'Fomentar la articulación con otros sectores del estado provincial y nacional, el incremento de profesionales en carreras científicas-tecnologicas, en particular en el sector de las tecnologías de información y comunicación (TICs) y tecnología de propósito general (TGP) que permitan superar y acrecentar la disponibilidad de recursos humanos cualificados capaces de abordar la problemática de innovación necesaria para el desarrollo productivo.',
                    ]
                ],
            ]
        ];

        // Direcciones - Ejemplos básicos (completar con todas)
        $mfDireccion = [
            'mision' => 'Implementar operativamente políticas del área, brindando soporte técnico y seguimiento.',
            'funciones' => [
                'Gestionar procesos y trámites propios del área.',
                'Elaborar informes técnicos y administrativos.',
                'Articular con otras áreas para resolver demandas y mejorar servicios.',
            ],
            'detalle_por_direccion' => [
                'Dirección Provincial de Inteligencia Artificial y Alfabetización Digital' => [
                    'objetivos' => [
                        'Promover la integración ética, pedagógica e inclusiva de tecnologías emergentes —en particular, la inteligencia artificial, la alfabetización digital, el pensamiento computacional, la programación y la robótica educativa— en todos los niveles y modalidades del sistema educativo provincial.',
                        'Impulsar la formación docente, la equidad tecnológica y la ciudadanía digital en el ámbito educativo y social, garantizando el acceso al conocimiento tecnológico en todo el territorio provincial y articulando acciones con organismos nacionales e internacionales para acompañar la transformación digital del sistema educativo y su contribución a la modernización del Estado.',
                        'Fomentar un enfoque de educación disruptiva que replantee las metodologías tradicionales, integrando la creatividad, la innovación y el pensamiento crítico como ejes centrales de la transformación educativa.',
                    ],
                    'acciones' => [
                        'Diseñar e implementar, a través de un trabajo articulado con las direcciones de nivel, políticas públicas para el desarrollo de competencias digitales y el uso pedagógico de tecnologías emergentes en el sistema educativo.',
                        'Proponer lineamientos y normativas para la inclusión progresiva de contenidos de inteligencia artificial, programación, pensamiento computacional y ciudadanía digital en los diseños curriculares.',
                        'Coordinar, a través de un trabajo articulado con las direcciones de nivel, instancias de formación continua para docentes y equipos directivos en tecnologías emergentes, innovación pedagógica, metodologías activas y producción de contenidos educativos.',
                        'Relevar necesidades de conectividad, infraestructura y equipamiento tecnológico en instituciones educativas de toda la provincia, y proponer soluciones con enfoque territorial.',
                        'Impulsar planes de mejora tecnológica y autonomía energética en escuelas, priorizando el uso de energías renovables en zonas rurales.',
                        'Impulsar la implementación de plataformas educativas con inteligencia artificial para la personalización del aprendizaje y el fortalecimiento de trayectorias escolares.',
                        'Acompañar proyectos escolares que integren robótica, IA, sostenibilidad y resolución de problemáticas sociales desde una perspectiva tecnológica.',
                        'Promover la generación de contenidos didácticos digitales accesibles, inclusivos y adaptados a la diversidad social, lingüística y cultural del territorio provincial.',
                        'Promover y participar en ferias, concursos, hackatones, laboratorios educativos y experiencias que estimulen la creatividad, el pensamiento crítico y la resolución de problemas mediante tecnologías emergentes.',
                        'Desarrollar campañas y materiales de alfabetización digital, ética de la inteligencia artificial, ciudadanía digital, sostenibilidad y derechos digitales dirigida a estudiantes, docentes, familias y comunidad en general, a través de un trabajo articulado con las direcciones de nivel.',
                        'Impulsar políticas de inclusión digital con enfoque de género, diversidad e interculturalidad, garantizando la equidad territorial y el acceso al derecho a la educación tecnológica.',
                        'Diseñar, implementar y fortalecer sistemas tecnológicos integrados para la gestión pública educativa que mejoren los procesos de planificación, monitoreo, toma de decisiones y evaluación de políticas públicas.',
                        'Elaborar indicadores e instrumentos de evaluación para medir el impacto de las políticas de alfabetización tecnológica, conectividad y educación digital, a través de un trabajo articulado con las direcciones de la Secretaría de Planeamiento Educativo.',
                        'Promover convenios y alianzas estratégicas con universidades, organismos internacionales, empresas tecnológicas, organizaciones de la sociedad civil y otras jurisdicciones.',
                        'Participar en redes, programas, congresos y foros nacionales e internacionales sobre tecnología educativa, inteligencia artificial y alfabetización digital.',
                        'Impulsar experiencias piloto de educación disruptiva que integren entornos flexibles, aprendizaje personalizado y metodologías ágiles, promoviendo un cambio profundo en las prácticas escolares tradicionales.',
                        'Promover buenas prácticas en ciberseguridad educativa y resguardo de datos personales de estudiantes y docentes.',
                        'Desarrollar lineamientos para el uso ético, seguro y transparente de los datos generados por plataformas digitales educativas e inteligencia artificial.',
                        'Elaborar recomendaciones éticas, pedagógicas y jurídicas para el uso de IA generativa en entornos escolares, priorizando el bienestar de niñas, niños y adolescentes.',
                        'Impulsar la creación de laboratorios de innovación educativa (EdTech Labs) para el diseño, prueba y escalamiento de soluciones tecnológicas aplicadas a la mejora de los aprendizajes.',
                    ]
                ],
                'Dirección de Legalización y Registro de Títulos' => [
                    'objetivos' => [
                        'Asesorar sobre la temática de Títulos a todas las Áreas de Educación como así también a cualquier Área u Organismo de la Administración Pública Provincial, Nacional o Municipal que lo requieran.',
                        'Ejercer la administración general de la dirección en lo referido a las Certificaciones Educativas del Nivel Medio y Superior dependientes de jurisdicción provincial (Secundario, Técnicos, Modalidades Educativas) de Gestión Pública y Privada dependientes del Ministerio y eventualmente de otros Ministerios cuya dependencia institucional hubieran sido transferidas hacia los mismos.',
                        'Fortalecer la confiabilidad de la documentación educativa, unificando criterios en el procedimiento de emisión, Legalización y Registro de Títulos de Nivel Medio y Superior en la jurisdicción.',
                        'Registrar las firmas de todas las autoridades escolares de Unidades Educativas de Nivel Medio y Superior de la jurisdicción que intervienen en la documentación específica emitida.',
                        'Registrar los títulos de Nivel Medio y Superior en los Establecimientos Educativos en la jurisdicción provincial.',
                    ],
                    'acciones' => [
                        'Determinar las responsabilidades de quienes intervienen en la emisión, Legalización y Registro de Títulos de Nivel Medio y Superior en la jurisdicción mediante la instrumentación de actos administrativos de su competencia.',
                        'Proponer la unificación de criterios sustentables referidos a la Validez Nacional de Títulos y Estudios expedidos por Unidades Escolares de Nivel Medio y Superior de la jurisdicción provincial, requiriendo a las Áreas competentes el estado de avance y/o situación de la tramitación de la Validez Nacional ante Organismos de jurisdicción nacional.',
                        'Facilitar la movilidad estudiantil inter-jurisdiccional, intrajurisdiccional como así también la inserción de Sistemas Educativos Extranjeros tramitando y asistiendo a las Unidades Educativas como los Organismos de Nivel de la jurisdicción los Pases o Históricos Escolares de los alumnos en situación de movilidad.',
                        'Realizar Asistencia Técnica del Programa Sistema Federal de Títulos en todas las Unidades Educativas del Nivel Medio y Superior de la Provincia de Catamarca.',
                        'Informar al organismo de Validez Nacional de Títulos y Estudios del Ministerio de Educación de la Nación sobre Altas y Bajas de Firmas de Agentes Legalizadores de la Jurisdicción para mantener actualizado el Registro Nacional de Firmas Educativas Jurisdiccionales (RENAFEJU).',
                        'Instrumentar, viabilizar y llevar a cabo la destrucción de Planillas sobrantes y anuladas de cada Serie del Sistema Federal de Títulos de la jurisdicción con el acto administrativo establecido en normativa federal para este fin de cada serie del SFT y de acuerdo a lo normado por la normativa vigente en la materia.',
                        'Producir anualmente el Informe Final de la Provincia a la Jurisdicción Nacional sobre el uso de Planillas Seriadas enviadas por la Nación de cada Serie del Sistema Federal de Títulos.',
                        'Coordinar acciones de índole administrativa, técnica y funcional para instrumentar mecanismos para la expedición de Títulos a alumnos de Educación Especial en el marco de la normativa federal y provincial establecida a esos efectos por parte de Unidades Educativas de Nivel Medio y Superior de la Jurisdicción.',
                        'Resguardar la información correspondiente a Certificaciones Educativas Provinciales en soporte papel y/o soporte digital utilizando los medios que disponga y que provean las Tecnologías de la Información para mantener el archivo de las mismas desde la creación del Área.',
                        'Efectuar el Registro de Títulos con el procedimiento e instrumentos de archivo documental establecido por el Dcto. G. (CE) 3179/77, esto es en Libros Foliados y rubricados por la autoridad competente y/o en el Programa de Carga creado a tal fin y que simula la carga digital del Registro documental iniciado en la Provincia en el año 1977. Dichos registros serán realizados exclusivamente a requerimiento y/o solicitud expresa de los interesados para inscribirse como aspirantes a interinatos y/o suplencias de cargos y/u Horas Cátedras en las Juntas de Clasificación.',
                    ]
                ],
                'Dirección de Residencia Universitaria' => [
                    'objetivos' => [
                        'Gestionar el funcionamiento integral de la Residencia Universitaria en su máxima capacidad.',
                        'Promover el ingreso y permanencia de estudiantes del interior provincial con dificultades económicas.',
                        'Optimizar la infraestructura de la Residencia para proporcionar las condiciones adecuadas que les permita a los beneficiarios de las becas desarrollar sus objetivos académicos, proporcionando las necesidades básicas y de esparcimiento teniendo en cuenta criterios y normas para el cuidado de la salud integral.',
                        'Generar espacios de discusión dentro de la comunidad de residentes que permitan mejorar las formas de convivencia institucional.',
                        'Crear espacios de formación integral de los residentes y futuros profesionales.',
                        'Garantizar la provisión en tiempo y forma de los bienes y servicios que se requieren para el desempeño de las funciones de la Residencia.',
                        'Efectuar el control y registración de los bienes que pertenecen, ingresan, egresan o son dados de baja del patrimonio de la Residencia, manteniendo el detalle actualizado de su ubicación física y toda modificación al respecto.',
                        'Control y seguimiento del ingreso de los fondos a la Residencia.',
                    ],
                    'acciones' => [
                        'Distribuir tareas entre las distintas dependencias de la institución agilizando su funcionamiento.',
                        'Abrir el período de presentación de la documentación necesaria para cubrir las vacantes en la Residencia Universitaria.',
                        'Gestionar con otras dependencias del Estado o empresas privadas el mantenimiento de las instalaciones y equipamiento de la Residencia.',
                        'Crear un gabinete psicotécnico para generar espacios de discusión que mejoren la convivencia entre los residentes.',
                        'Planificar charlas de temáticas actuales sobre salud sexual y reproductiva, prevención de adicciones y violencia de género.',
                        'Brindar talleres de oratoria y técnicas de estudio para el mejor desenvolvimiento tanto en el ámbito académico como en el ejercicio profesional.',
                        'Tramitar las solicitudes referidas a la administración del personal de la Residencia.',
                        'Tramitar las solicitudes de compra, su seguimiento y recepción.',
                        'Controlar la gestión y rendición de cuentas del presupuesto asignado a la Residencia.',
                    ]
                ],
                'Dirección Provincial de Sumario Docente' => [
                    'objetivos' => [
                        'Ejercer la autoridad de aplicación del Régimen de Sumarios del Personal Docente del Ministerio de Educación Ciencia y Tecnología aprobado por Decreto C.E N°413/2000 o norma que en un futuro la reemplace, sus respectivas modificatorias, y demás, normas vigentes o que se dicten en dicha materia.',
                    ],
                    'acciones' => [
                        'Llevar adelante la investigación de conductas presuntamente irregulares o de indisciplina mediante la ejecución del procedimiento sumarial docente aprobado por decreto C.E N° 413/2000, sus modificatorias o norma que en un futuro la reemplace, aplicando o aconsejando, en su caso, las medidas o sanciones previstas en la legislación vigente.',
                        'Respetar y hacer respetar las disposiciones de la Ley Nacional de Educación N° 26.206, la Ley de Educación Técnico Profesional N° 26.058, la Ley de Educación Superior N° 24.521, Ley Provincial de Educación N° 5.381, el Estatuto Docente Ley N° 3.122 y demás normas reglamentarias reguladoras de derechos y obligaciones del personal docente de la provincia, como el Régimen de Licencias, Justificaciones y Franquicias, Acumulación de Cargos, Nomenclador de Cargos, Reglamentos de Coberturas y Concurso de cargos/Horas Cátedras, entre otras normas vigentes en dicha materia.',
                        'Aprobar y expedir los manuales de organización, procedimientos y de servicios al público para el buen funcionamiento del sistema normativo sumarial docente.',
                        'Administrar el capital humano, así como los recursos materiales y financieros que le sean confiados, procurando su eficaz y eficiente aplicación.',
                        'Ejercer la representación jurídica en materia de Sumarios Docentes del Ministerio de Educación, Ciencia y Tecnología por medio de mandato otorgado por el/la titular del Ministerio, ante autoridades judiciales y administrativas en asuntos contenciosos y no contenciosos, ya sea como actor demandado o tercer interesado, con la debida autorización, en su caso, de Fiscalía de Estado.',
                        'Formar parte de aquellos órganos colegiados en los que expresamente se le nombre o le sea conferida la representación por el Ministerio.',
                        'Opinar sobre el sentido que debe darse a la legislación de educación nacional y provincial en el ámbito sumarial docente.',
                        'Dictar las medidas correspondientes con el objeto de unificar criterios y procedimientos jurídicos de las diversas dependencias del Ministerio en coordinación con la Dirección Provincial de Asuntos Jurídicos.',
                        'Elaborar proyectos reglamentarios de sumarios administrativos en los que debe definirse la responsabilidad por daños de la comunidad educativa.',
                    ]
                ],
                'Dirección Provincial de Asuntos Jurídicos' => [
                    'objetivos' => [
                        'Atender a los asuntos legales relacionados con el Ministerio Educación, Ciencia y Tecnología, en el campo de la legislación general como particular en la materia educativa, para defensa de los intereses de la institución mediante el cumplimiento de las disposiciones vigentes, así como todo lo concerniente a los aspectos normológicos y axiológicos de las relaciones con el personal al Servicio del Ministerio.',
                    ],
                    'acciones' => [
                        'Cumplir y hacer cumplir con todos los ordenamientos legales relacionados al Ministerio de Educación, Ciencia y Tecnología.',
                        'Acordar con el Ministro el Despacho de los asuntos que le encomiende.',
                        'Definir y establecer las políticas para guiar y normar la realización de los programas de la dirección de Asuntos Jurídicos, en relación a la capacitación en materia normativa a directores y supervisores del ministerio.',
                        'Determinar y establecer la estructura orgánica y el funcionamiento del sistema normativo del ministerio de acuerdo a las políticas institucionales de la provincia.',
                        'Aprobar y expedir los manuales de organización, procedimientos y de servicios al público para el buen funcionamiento del sistema normativo.',
                        'Administrar los elementos humanos, así como los recursos materiales y financieros que les sean confiados, procurando su eficaz y eficiente aplicación.',
                        'Atender las relaciones cotidianas del Ministerio con todas las demás áreas del Gobierno Provincial en materia de actos y hechos jurídicos.',
                        'Ejercer la representación jurídica del Ministerio, por medio de mandato otorgado por el Ministerio ante autoridades judiciales y administrativas, en asuntos contenciosos y no contenciosos en las diversas ramas del derecho, ya sea como actor, demandado o tercer interesado, con la debida autorización, en su caso, de Fiscalía de Estado.',
                        'Formar parte de aquellos órganos colegiados en los que expresamente se le nombre o le sea conferida su representación por el Ministerio.',
                        'Opinar sobre el sentido que debe darse a la legislación educacional nacional y provincial.',
                        'Dictar las medidas correspondientes con objeto de unificar criterios y procedimientos jurídicos de las diversas dependencias del Ministerio.',
                        'Elaborar y validar según el caso, el instrumento jurídico en los cuales el Ministerio interviene.',
                        'Presentar denuncias, acusaciones o querellas cuando se vean afectados los intereses del Ministerio por actos que se consideren delictuosos.',
                        'Tomar conocimientos de todos los actos o hechos de carácter jurídico, que voluntariamente le sean expuestos por cualquier miembro de la comunidad educativa y hacerse cargo de su resolución según le corresponde, o turnarlo con el órgano competente.',
                        'Redactar y rubricar contratos y documentos sobre diversos actos jurídicos en que intervenga por delegación Ministerial.',
                        'Elaborar Proyectos reglamentarios de sumarios administrativos en los que debe definirse la responsabilidad por daños a la comunidad educativa.',
                    ]
                ],
                'Dirección Provincial de Programación y Mantenimiento Edilicio' => [
                    'objetivos' => [
                        'Programar acciones orientadas a la atención de la infraestructura edilicia de las instituciones educativas y de los organismos de conducción central.',
                        'Asesorar al Ministro en la planificación y ejecución de acciones de mantenimiento y mejoramiento de las edificaciones escolares en sus distintos niveles y áreas centrales.',
                        'Coordinar acciones en forma permanente con el Ministerio de Infraestructura y Obras Civiles.',
                    ],
                    'acciones' => [
                        'Relevar necesidades en materia de infraestructura edilicia y de medios necesarios para su atención.',
                        'Formular un plan anual de supervisión y verificación del estado de los edificios escolares de todo el territorio provincial, que posibilite evaluar fehacientemente el estado de los edificios escolares, a fin de priorizar las acciones y el destino de recursos.',
                        'Inspeccionar y documentar cualquier daño, deterioro o necesidad de reparación en la infraestructura de los edificios escolares, en conformidad con los responsables de los establecimientos educativos.',
                        'Determinar, planificar, supervisar y coordinar las actividades relacionadas con el mantenimiento correctivo (reparaciones imprevistas), mantenimiento preventivo y predictivo.',
                        'Realizar las solicitudes de compras de materiales y suministros necesarios para realizar las tareas de mantenimiento, ajustándose en un todo a la normativa vigente a tal efecto y conforme los lineamientos establecidos por su superior jerárquico.',
                        'Asegurar el mantenimiento de las áreas exteriores de los edificios escolares, lo cual implica desmalezamiento, control de malas hierbas, control y poda de arboleda y mantenimiento de los espacios recreativos.',
                        'Identificar las necesidades de obra y, para el caso de ser requerido, previo conocimiento del ministro, proceder a la selección y contratación de las empresas adecuadas para la ejecución de obra, y realizar el seguimiento y supervisión de los trabajos realizados.',
                        'Proyectar necesidades futuras de infraestructura edilicia, mediante la Carta o Mapa Escolar.',
                        'Realizar proyecciones de matrícula a corto, mediano y largo plazo, para la previsión de la ampliación o adecuación de espacios.',
                        'Determinar el emplazamiento de nuevos establecimientos educativos.',
                        'Programar con autorización del Ministro de Educación, Ciencia y Tecnología, intervenciones que respondan a las necesidades de mantenimiento, ampliaciones, refuncionalizaciones, reemplazo de edificios y construcción de nuevos, respetando la normativa de organismos nacionales, provinciales y municipales.',
                        'Actualizar la base de datos pertinente.',
                        'Asesorar sobre normas de higiene y seguridad laboral.',
                        'Informar mensualmente al Secretario de Coordinación Institucional, o a la autoridad superior que en el futuro lo remplace, respecto de las actividades que se desarrollan en el ámbito de la Dirección, a fin de realizar las previsiones de recursos pertinentes.',
                        'Establecer la programación de necesidades de mantenimiento preventivo y correctivo de la infraestructura edilicia del ministerio.',
                        'Planificar, programar, proyectar y ejecutar distintas intervenciones de mantenimiento preventivos y/o correctivos.',
                        'Establecer prioridades en la programación de las intervenciones de mantenimiento.',
                        'Evaluar permanentemente el avance y resultado del plan de mantenimiento, en conformidad con la metodología preestablecida.',
                        'Informar al ministro y sugerir distintos criterios de intervenciones técnicas constructivas sobre la infraestructura de la jurisdicción.',
                        'Interactuar con conocimiento y autorización del ministro y, según su competencia, con el Ministerio de Infraestructura y Obras Civiles en lo que respecta a los proyectos de construcción y las necesidades de infraestructura escolar.',
                        'Establecer un plan de acción para atender de manera inmediata la necesidad de asistencia que pudieran ser requeridas desde los establecimientos educativos que sufrieran daños edilicios causados por fenómenos meteorológicos.',
                        'Confeccionar un legajo de planos de formato papel existentes de los distintos establecimientos de la jurisdicción.',
                        'Generar, organizar y mantener actualizado, un archivo de gestión correspondiente a la Dirección.',
                        'Resguardar, actualizar y controlar la información lograda.',
                        'Promover el perfeccionamiento y capacitación de los agentes que integran la dirección.',
                    ]
                ],
                'Dirección Provincial de Transparencia Activa' => [
                    'objetivos' => [
                        'Satisfacer las necesidades de control interno interviniendo tanto en las operaciones desarrolladas como a desarrollarse, mediante el examen previo, concomitante y posterior de las actividades financieras, patrimoniales, contables y administrativas del Ministerio de Educación, Ciencia y Tecnología, verificando el cumplimiento de normas y procedimientos vigentes, informando y asesorando a los niveles Superiores de la Jurisdicción y elaborando informes independientes y objetivos sobre la responsabilidad directa u operativa de las operaciones, con el fin de asegurar eficacia, eficiencia y economía en el uso de los recursos.',
                        'Promover y garantizar el derecho de acceso a la información pública en el ámbito del Ministerio de Educación, Ciencia y Tecnología, conforme a los principios de transparencia activa establecidos en la Ley N° 5.535, la Ley Nacional N° 27.275 y demás normativa aplicable, mediante la generación, publicación y actualización permanente de la información relevante vinculada a la gestión, presupuesto, normativas, contrataciones y recursos del organismo.',
                    ],
                    'acciones' => [
                        'Ejercer las funciones que, como parte del control integral e integrado, prescribe la Ley N° 4.938, el Manual de Auditoría y demás normativa vigente o que se dicte en el futuro.',
                        'Examinar y evaluar en forma independiente, objetiva, sistemática y amplia, el funcionamiento de los sistemas, en particular el de control interno, verificando los desvíos con respecto a los objetivos planteados.',
                        'Elaborar y ejecutar el Plan Anual de Auditoría, conforme a los requerimientos del artículo 125 inciso g) de la Ley N° 4.938, elevándolo al Ministro de Educación y luego a la Subcontaduría General de Control.',
                        'Verificar el cumplimiento de las políticas, planes, normas y procedimientos establecidos por el Ministerio.',
                        'Auditar los procesos vinculados al personal docente, incluyendo coberturas, altas, bajas, licencias y liquidación de haberes, evaluando la razonabilidad de las erogaciones y su encuadre normativo.',
                        'Examinar los registros contables y patrimoniales, verificando su actualización, exactitud y adecuación a los sistemas oficiales de información financiera.',
                        'Controlar la aplicación efectiva del presupuesto asignado y el uso de los fondos públicos conforme a su destino.',
                        'Elaborar informes de auditoría e informes especiales a pedido de órganos superiores, el Tribunal de Cuentas, la Contaduría General o los órganos de control externo.',
                        'Coordinar y colaborar con los organismos de control de la Provincia para evitar duplicidad de esfuerzos y garantizar una cobertura efectiva.',
                        'Realizar el seguimiento de las observaciones y recomendaciones emitidas en los informes de auditoría interna, asegurando su implementación.',
                        'Asesorar técnicamente en la elaboración y adecuación de normas y procedimientos relacionados con el Sistema de Control Interno del Ministerio.',
                        'Producir informes, estudios o dictámenes a requerimiento de la Asesoría General de Gobierno, Fiscalía de Estado u otras áreas del Poder Ejecutivo.',
                        'Diseñar y mantener actualizada una plataforma o sección digital de transparencia activa, que incluya información pública relevante en formatos accesibles, reutilizables y comprensibles para la ciudadanía.',
                        'Coordinar con las distintas áreas del Ministerio la recolección y publicación de datos conforme a las obligaciones de transparencia activa.',
                        'Garantizar el cumplimiento de los principios de publicidad, máxima divulgación, apertura de datos, no discriminación y gratuidad en el acceso a la información.',
                        'Promover una cultura institucional basada en la transparencia y la rendición de cuentas, impulsando instancias de capacitación, difusión y mejora continua en materia de acceso a la información pública.',
                        'Ejecutar todas aquellas tareas que, en el ámbito de su competencia, le sean asignadas por la Secretaría de Articulación Institucional o la autoridad superior del Ministerio.',
                    ]
                ],
                'Dirección Provincial de Unidad Ejecutora de Programas y Proyectos' => [
                    'objetivos' => [
                        'Planificar, coordinar y ejecutar programas, planes y proyectos financiados con fondos provinciales, nacionales e internacionales para la mejora de la calidad educativa de la Provincia y ejecutar acciones, apoyando la toma de decisiones estratégicas conforme informes técnicos y datos estadísticos educativos de la Provincia, facilitando la formulación, seguimiento y evaluación de programas educativos, en consonancia con los objetivos estratégicos del Ministerio de Educación, Ciencia y Tecnología de Catamarca en articulación con las Direcciones de Nivel y las Direcciones de las diferentes modalidades educativas.',
                    ],
                    'acciones' => [
                        'Fortalecer la infraestructura, equipamiento y recursos pedagógicos de las instituciones educativas de la provincia a través de la implementación efectiva de programas específicos.',
                        'Articular con la Secretaría de Planeamiento Educativo, en la ejecución conforme informes técnicos y datos estadísticos provinciales respecto de la situación institucional provincial.',
                        'Articular con las demás Secretarías del Ministerio de Educación, Ciencia y Tecnología, la implementación de programas y planes provinciales, nacionales e internacionales en las diferentes Direcciones de Nivel y las Direcciones de las diferentes modalidades educativas.',
                        'Verificar el cumplimiento en la implementación, el seguimiento y la evaluación de los programas que se ejecuten.',
                        'Optimizar la gestión administrativa y técnica de proyectos educativos, garantizando su eficiencia, transparencia y cumplimiento de los objetivos establecidos.',
                        'Promover la innovación y el desarrollo educativo, incorporando nuevas tecnologías, metodologías y enfoques pedagógicos mediante programas estratégicos.',
                        'Generar mecanismos de monitoreo, evaluación y rendición de cuentas, que permitan asegurar la calidad y sostenibilidad de los programas y proyectos ejecutados.',
                        'Diseñar y formular proyectos educativos conforme a los lineamientos del Ministerio y los requerimientos de los organismos financiadores.',
                        'Coordinar la ejecución técnica, financiera y administrativa de los programas y proyectos asignados, en articulación con otras áreas ministeriales y actores territoriales.',
                        'Elaborar informes de avance, rendiciones y evaluaciones para organismos provinciales, nacionales e internacionales, asegurando el cumplimiento de plazos y requisitos técnicos.',
                        'Gestionar recursos humanos, materiales y financieros necesarios para la implementación de los programas y proyectos.',
                        'Brindar asistencia técnica y acompañamiento a las instituciones educativas beneficiarias para garantizar la correcta aplicación de los programas.',
                        'Mantener una base de datos actualizada sobre el estado de avance de cada proyecto y sus impactos.',
                        'Coordinar acciones con otros ministerios, organismos públicos y entidades de cooperación, a fin de optimizar recursos y lograr una mayor articulación institucional.',
                        'Difundir los programas y proyectos disponibles, facilitando el acceso a la información para las comunidades educativas y otros actores interesados.',
                    ]
                ],
                'Dirección Provincial de Administración' => [
                    'objetivos' => [
                        'Conducir, orientar y fiscalizar las actividades presupuestarias, contables y financieras del Ministerio de Educación, Ciencia y Tecnología, sujeto a los lineamientos dispuestos por la Secretaría de Coordinación Institucional, en el marco de la normativa vigente.',
                        'Mantener una relación directa de carácter técnico informativo con los órganos rectores del Sistema Presupuestario, de Finanzas, de Tesorería General y de Contaduría General de la Provincia, que le permita administrar el Presupuesto Provincial con criterios de economía, eficiencia y eficacia, participando en los aspectos contables, económicos y financieros de cada una de ellas.',
                    ],
                    'acciones' => [
                        'Establecer por los medios que considere necesarios, pautas de organización, administración y control en toda operatoria con incidencia económica financiera en la jurisdicción, desde el inicio del trámite administrativo hasta la emisión de la correspondiente orden de pago.',
                        'Integrar el Sistema de Contrataciones de cada Unidad Ejecutora observando el cumplimiento de la Ley N° 4938 de Administración Financiera, reglamentación, normas, políticas y procedimientos que se dicten en la materia.',
                        'Gestionar, administrar, programar y controlar los recursos financieros de la jurisdicción.',
                        'Dirigir y supervisar la elaboración de los proyectos de presupuesto de la jurisdicción, como así también controlar su ejecución en materia de recursos y gastos.',
                        'Registrar en el Sistema de Administración de Bienes del Estado el movimiento patrimonial.',
                        'Dirigir la contabilidad y operación de todas las Unidades Ejecutoras a fin de cumplimentar requisitos legales, técnicos e impositivos, destinados a evaluar la operatoria y rendimiento de la gestión.',
                        'Llevar la contabilidad presupuestaria y financiera de las distintas Unidades Ejecutoras del Ministerio.',
                        'Efectuar todos los trámites administrativos necesarios para la contratación de bienes y servicios, implementando el registro de todas las etapas del gasto a través del Sistema Financiero-Contable, en el marco legal vigente en la materia.',
                        'Realizar la gestión administrativa relacionada con el pago de haberes de acuerdo a la liquidación de haberes del personal del escalafón docente y del escalafón general que realice y le proporcione la Secretaría de Recursos Humanos de la jurisdicción.',
                        'Dirigir la confección de los EECC e información complementaria establecidos por Ley de Administración Financiera.',
                        'Brindar la información que le sea requerida por la autoridad superior y los organismos facultados para hacerlo.',
                        'Confeccionar las Rendiciones de Cuentas inherentes a su gestión, que deban ser presentadas ante el Tribunal de Cuentas de la Provincia.',
                        'Informar sobre los ingresos, egresos y variaciones presupuestarias y financieras a los Organismos de Control Interno y Externo.',
                        'Asesorar a los distintos responsables de la ejecución de programas específicos a efectos de que los actos y operaciones adoptadas permitan resguardar el patrimonio e intereses fiscales.',
                        'Realizar control previo concomitante y posterior de las actividades financieras a efectos de dar cumplimiento con las obligaciones contractuales comprometidas.',
                        'Llevar los registros de ejecución presupuestaria en las condiciones que fije la reglamentación respetando las etapas del gasto y recursos.',
                        'Respetar y hacer cumplir los principios generales a los que deberán ajustarse las contrataciones.',
                        'Gestionar y administrar los Fondos permanente y caja chica.',
                    ]
                ],
                'Dirección de Tesorería' => [
                    'objetivos' => [
                        'Asistir al Servicio Administrativo Financiero en el manejo de los fondos y valores que administra el ministerio.',
                        'Asistir a la Dirección Provincial de Administración en la planificación contable y financiera para la correcta ejecución presupuestaria del ministerio.',
                    ],
                    'acciones' => [
                        'Guardar y custodiar los fondos que integran el Fondo Rotatorio, Fondo Rotatorio Interno, Cajas Chicas y Cuentas Corrientes Bancarias de Programas Especiales o Recaudación propia.',
                        'Registrar diariamente los ingresos y egresos de los recursos del ministerio.',
                        'Gestionar, administrar y supervisar los Fondos Permanentes y Cajas Chicas, informando periódicamente la existencia de fondos y sus exigibilidades.',
                        'Confeccionar y remitir al Tribunal de Cuentas de la Provincia de Catamarca y demás organismos competentes las correspondientes rendiciones de cuentas.',
                        'Solicitar por intermedio de la Contaduría General de la Provincia la Reposición de los fondos rendidos ante el Tribunal de Cuentas.',
                        'Realizar las correspondientes conciliaciones bancarias. A tal fin se podrá requerir informes al banco o Tesorería General de la Provincia.',
                        'Confeccionar y realizar los pagos a proveedores, locadores de servicios, viáticos, retenciones y otros gastos que puedan ser de obligación del Servicio de Administración Financiera.',
                        'Planificar en conjunto con la Dirección Provincial de Administración las mejores prácticas administrativas contables para la ejecución presupuestaria del Ministerio.',
                        'Cumplir y hacer cumplir las disposiciones y regímenes en el ámbito del ministerio.',
                        'Contestar requerimientos, pedidos de informes del Tribunal de Cuentas o Tesorería General de la Provincia.',
                        'Realizar recibo de entradas de dinero en efectivo y proceder a realizar su depósito bancario correspondiente.',
                        'Disponer y mantener actualizado e inventariado el archivo de todas las operaciones con incidencias en las finanzas públicas.',
                    ]
                ],
                'Dirección de Compras' => [
                    'objetivos' => [
                        'Coordinar y ejecutar los procesos de licitación y compras dentro del ámbito del Ministerio, siguiendo los principios de transparencia, eficiencia, y economía establecidos por la normativa vigente.',
                        'Garantizar la correcta adquisición de bienes y servicios necesarios para el funcionamiento del Ministerio, optimizando los recursos públicos y asegurando el cumplimiento de los procedimientos legales y técnicos.',
                        'Supervisar y garantizar el cumplimiento de la Ley N° 4938 de Administración Financiera y las normativas de contratación pública en todas las etapas de los procesos de licitación y compra.',
                        'Desarrollar y aplicar estrategias para mejorar los procesos de contratación pública, asegurando la adecuada competencia y la obtención de los mejores precios y condiciones para el Ministerio.',
                    ],
                    'acciones' => [
                        'Elaborar y gestionar procesos de licitación: Desarrollar, coordinar y ejecutar las licitaciones de bienes, servicios y obras requeridas por el Ministerio de Educación, Ciencia y Tecnología, asegurando que se cumplan todos los requisitos establecidos en la legislación aplicable.',
                        'Controlar y dar seguimiento a los contratos: Supervisar la ejecución de los contratos celebrados en el marco de los procesos de licitación, garantizando que los proveedores cumplan con las condiciones acordadas, tanto en tiempo como en calidad.',
                        'Realizar compras directas y contrataciones menores: Implementar los procedimientos establecidos para las contrataciones directas y compras menores, siempre siguiendo los lineamientos de transparencia y eficiencia.',
                        'Asesorar en la confección de pliegos y documentos contractuales: Proveer asistencia técnica y normativa a las áreas del Ministerio en la redacción de pliegos de condiciones y demás documentos contractuales, asegurando su cumplimiento con la legislación vigente.',
                        'Coordinar con la Dirección Provincial de Administración: Trabajar en estrecha colaboración con la Dirección Provincial de Administración para garantizar que los procesos de licitación y compra estén alineados con los presupuestos y las disponibilidades financieras del Ministerio.',
                        'Supervisar y controlar los fondos destinados a compras: Asegurar que los fondos asignados para la adquisición de bienes y servicios sean correctamente administrados y que los pagos se realicen conforme a los términos establecidos en los contratos.',
                        'Registrar y archivar toda la documentación relativa a licitaciones y compras: Mantener un registro detallado y actualizado de todas las licitaciones, compras, contratos, y pagos realizados, asegurando la transparencia y facilitando el acceso a la información para auditorías y controles.',
                        'Realizar estudios de mercado y análisis de proveedores: Llevar a cabo estudios de mercado para identificar y evaluar proveedores potenciales, buscando siempre la mejor relación calidad-precio y promoviendo la competencia en los procesos de contratación.',
                        'Brindar informes y reportes periódicos: Proveer informes regulares a la Dirección Provincial de Administración y a la Secretaría de Articulación Institucional sobre el estado de los procesos de licitación y compras, identificando posibles áreas de mejora o situaciones que requieran atención inmediata.',
                        'Capacitar al personal del Ministerio: Organizar y coordinar la capacitación del personal involucrado en los procesos de licitación y compras para garantizar que se mantengan actualizados con respecto a las normativas, procedimientos y mejores prácticas en materia de contratación pública.',
                    ]
                ],
                'Dirección de Parque Automotor' => [
                    'objetivos' => [
                        'Coordinación, supervisión control de uso, mantenimiento, determinación de las necesidades de adquisición y gestión de provisión e vehículos, asignación, control de su correcto uso y cuidado control y gestión de provisión de los insumos que se requieran para su funcionamiento, como así también todo lo referente al parque automotor del Ministerio de Educación, Ciencia y Tecnología, a efectos de lograr una optimización de este recurso en el mencionado Ministerio, tendientes a garantizar a través del mismo y su ámbito, el cumplimiento de las políticas educativas proyectadas e implementadas por el Poder Ejecutivo Provincial, conforme los parámetros de la Ley N° 26.203 y Ley N°5.381.',
                    ],
                    'acciones' => [
                        'Coordinar, supervisar y controlar la utilización y el mantenimiento de las distintas unidades integrantes del Parque Automotor del Ministerio, velando siempre su cuidado y correcta utilización.',
                        'Intervenir en el procedimiento de mantenimiento y reparación de los vehículos oficiales de acuerdo a lo establecido por el reglamento del Parque Automotor del Poder Ejecutivo Provincial y la Ley que rige las contrataciones de la Provincia, a través de la realización de peritajes y controles técnicos.',
                        'Emitir el reglamento interno del Parque Automotor, tendiente a lograr un ordenado y organizado desarrollo de las acciones del mismo.',
                        'Controlar la correcta utilización y el cuidado que se les debe a los vehículos oficiales.',
                        'Controlar la vigencia de la cobertura asegurativa de los vehículos que integran el Parque Automotor del Ministerio.',
                        'Asignar y reasignar las unidades integrantes del Parque Automotor del Ministerio a las reparticiones del mismo, debiendo quedar este bajo cuidado permanente de la Dirección.',
                        'Intervenir en los procedimientos de contrataciones destinados a adquirir vehículos oficiales, emitiendo opinión vinculante en cuanto a la conveniencia de la adquisición y de las características técnicas del bien a adquirir.',
                        'Emitir autorizaciones para que los conductores oficiales puedan conducir vehículos de propiedad del Ministerio por fuera del territorio provincial en caso de que las comisiones oficiales así lo requieran.',
                        'Supervisar la regularidad registral de los vehículos oficiales pertenecientes a la flota del Ministerio, supervisando y exigiendo el cumplimiento de las normas vigentes en la materia.',
                        'Confeccionar, actualizar y archivar los legajos de los vehículos oficiales, en donde deberán contar copias de toda documentación relacionada a los mismos.',
                        'Cumplir y hacer cumplir toda Legislación Nacional y Provincial como así también convenios y reglamentaciones que se relacionan con su finalidad.',
                        'Promover la capacitación y especialización del personal.',
                        'Llevar a cabo las demás acciones o tareas complementarias, anexas, vinculadas y coadyuvantes, necesarias para alcanzar objetivo o misión asignada, que permita optimizar el objetivo de la gestión.',
                        'Brindar la colaboración e intervención necesaria en caso de siniestros sufridos por vehículos oficiales, actuando como interlocutora entre la Administración Pública y la compañía Aseguradora.',
                    ]
                ],
                'Dirección Provincial de Formación Profesional y Evaluación Educativa' => [
                    'objetivos' => [
                        'Fortalecer la calidad educativa provincial mediante la formación continua y el desarrollo profesional del personal docente.',
                        'Impulsar la mejora continua a través de la investigación y evaluación educativa, definiendo criterios y metodologías, producción y análisis de información para la toma de decisiones, y la implementación de evaluaciones provinciales, nacionales e internacionales, en articulación con las líneas estratégicas de la política educativa provincial.',
                    ],
                    'acciones' => [
                        'Diseñar e implementar programas de formación continua y desarrollo profesional para los docentes, que les permitan actualizar sus conocimientos, adquirir nuevas habilidades y mejorar sus prácticas pedagógicas.',
                        'Evaluar la implementación de las políticas educativas provinciales y nacionales, aplicando evaluaciones provinciales, nacionales e internacionales relacionadas con el aprendizaje y la enseñanza.',
                        'Implementar las evaluaciones provinciales, nacionales e internacionales vinculadas con el aprendizaje y la enseñanza de acuerdo a las definiciones de política educativa del Ministerio de Educación, Ciencia y Tecnología de la Provincia.',
                        'Ejecutar el Programa Nacional N° 32 - Información y Evaluación de la Calidad Educativa consistente en la implementación de los Operativos Nacionales e Internacionales de Evaluación educativa.',
                        'Definir criterios y metodologías para la elaboración de estudios que permitan identificar y atender problemas demográficos, socioeconómicos, culturales y pedagógicos que deben ser comprendidos en el planeamiento educativo, en articulación con las líneas estratégicas de la política educativa definida por la gestión.',
                        'Producir, sistematizar, analizar la información relacionada con la investigación educativa en pos del proceso de toma de decisiones de la Secretaría de Planeamiento Educativo.',
                    ]
                ],
                'Dirección Provincial de Estadística Educativa y Análisis Poblacional' => [
                    'objetivos' => [
                        'Contribuir a la mejora continua del sistema educativo provincial mediante la provisión de información estadística educativa precisa y relevante para la toma de decisiones estratégicas, a través de la recolección, producción y análisis de datos cuantitativos y cualitativos que permitan identificar y abordar problemas demográficos, socioeconómicos, culturales y pedagógicos.',
                    ],
                    'acciones' => [
                        'Coordinar y ejecutar el relevamiento, procesamiento y análisis de datos educativos para la gestión y toma de decisiones.',
                        'Desarrollar y administrar un sistema de información para la gestión educativa, articulando el flujo de información entre las unidades educativas.',
                        'Incorporar nuevas herramientas de análisis de datos que permitan recopilar, procesar, visualizar y extraer información para el análisis de indicadores educativos.',
                        'Implementar el Programa Nacional N° 32 - Información y Evaluación de la Calidad Educativa, gestionando los sistemas operativos, la recolección de datos educativos y realizando análisis estadísticos.',
                        'Implementar y administrar el Sistema Nominal de Alumnos de la Provincia en sintonía con el Sistema Integral de Información Digital Educativa (SINIDE), desarrollado por el Ministerio de Educación de la Nación.',
                        'Coordinar instancias de cooperación con otras áreas de la administración provincial, organismos nacionales, internacionales, organizaciones no gubernamentales, instituciones académicas en la producción de información educativa.',
                        'Administrar el Padrón de establecimientos educativos y el Mapa Escolar de la Provincia actualizando periódicamente la información estadística e integrando la información de otras fuentes intersectoriales y de otros ministerios provinciales.',
                        'Desarrollar programas de capacitación continua para los distintos actores institucionales involucrados en la producción y flujo de información del Sistema.',
                        'Elaborar el informe Anual Educativo de sobre la base de información de indicadores proveniente del sector de referencia.',
                    ]
                ],
                'Dirección de Sistemas y Desarrollo Tecnológico' => [
                    'objetivos' => [
                        'Garantizar la eficiencia y modernización del sistema educativo provincial mediante la gestión integral de la infraestructura tecnológica y el desarrollo de soluciones informáticas innovadoras.',
                    ],
                    'acciones' => [
                        'Planificar, implementar y mantener la infraestructura tecnológica de todas las unidades educativas que integran el Ministerio de Educación, Ciencia y Tecnología mediante la evaluación continua de las necesidades tecnológicas de cada unidad educativa, la elaboración de planes de inversión y actualización de equipos, la instalación y configuración de hardware y software, y el mantenimiento preventivo y correctivo de todos los sistemas informáticos.',
                        'Desarrollar y gestionar sistemas de información para la gestión administrativa y la comunicación entre las diferentes áreas del Ministerio y las unidades educativas: desarrollo, mantenimiento y soporte técnico de plataformas SAGE (RRHH y liquidación instituciones educativas privadas) y Autogestión Docentes (novedades escolares de instituciones educativas provinciales), LUA (Legajo de Alumnos de la Provincia), Siu Guaraní (Gestión de instituciones de nivel superior de la provincia), Administración de Formación Docente y sistema GDE (Gestión Documental Electrónica) del Ministerio de Educación, Ciencia y Tecnología.',
                        'Brindar soporte técnico y capacitación a los usuarios de las herramientas informáticas.',
                        'Elaborar e implementar políticas de seguridad informática para proteger la información del Ministerio, la realización de auditorías de seguridad y la capacitación del personal en materia de seguridad informática.',
                        'Gestionar la conectividad a internet en las instituciones educativas de la provincia: mediante la supervisión de la calidad del servicio, la resolución de problemas de conectividad y la búsqueda de soluciones para mejorar la conectividad en las zonas rurales o de difícil acceso.',
                        'Colaborar con otras áreas del Ministerio en la implementación de proyectos tecnológicos: participando en la planificación y ejecución de proyectos tecnológicos y la prestación de asesoramiento técnico.',
                        'Garantizar el cumplimiento de las normativas vigentes en materia de tecnología de la información.',
                    ]
                ],
                'Dirección Provincial de Educación Inicial' => [
                    'objetivos' => [
                        'Asistir a la Secretaría de Educación en la elaboración, ejecución y evaluación del programa general de políticas educativas específicas de la Educación inicial, en articulación con los otros Niveles y Modalidades Educativos/as.',
                        'Ejercer la dirección y administración general de la educación inicial, implementando y articulando las políticas educativas emanadas del Ministerio de Educación Ciencia y Tecnología y la Secretaría de Educación.',
                    ],
                    'acciones' => [
                        'Formular y proponer la política, objetivos y estrategias pedagógicas del Nivel de Educación Inicial.',
                        'Normar, orientar, monitorear y evaluar el desarrollo del servicio educativo de la Educación Inicial en las Instituciones y Programas Educativos, en coordinación con la instancia de gestión educativa descentralizada.',
                        'Elaborar y realizar las gestiones correspondientes, en coordinación con la Secretaría de Planeamiento Educativo para la validación del Diseño Curricular para la Educación Inicial, en articulación con la Dirección Provincial de Educación Primaria y a la Dirección Provincial de Educación Secundaria.',
                        'Orientar, monitorear y evaluar los procesos de adecuación, diversificación, implementación y evaluación curricular, así como la producción, adquisición, uso y distribución de materiales educativos para el nivel.',
                        'Formular lineamientos, acciones de política y estrategias para la implementación del uso de tecnologías de la información y de la comunicación, la informativa en la educación inicial, conforme los lineamientos fijados en las pautas educativas nacionales y provinciales.',
                        'Establecer las necesidades de formación docente, que deberá tener en cuenta el sistema de Formación Inicial y en Servicios/Continua para Docentes a cargo de programas escolarizados y no escolarizados de Educación Inicial.',
                        'Articular la Educación Inicial con los servicios sociales que promueven el desarrollo integral, de acuerdo a las necesidades de la población infantil.',
                        'Fortalecer la educación inclusiva de calidad de los niños con necesidades educativas especiales asociadas a discapacidades y/o cualidades excepcionales.',
                        'Generar mecanismos de sensibilización, participación cogestión de los padres de familia y de la Comunidad en la Educación Inicial.',
                        'Promover y gestionar proyectos de Cooperación Internacional dirigidos al incremento en acceso y el mejoramiento de la calidad de Educación Inicial.',
                        'Coordinar acciones con la Secretaría de Planeamiento Educativo para la Capacitación y Formación de Recursos Humanos.',
                        'Establecer criterios de trabajo destinados a Equipos de Supervisión, Equipo Técnico y Gabinete de Apoyo.',
                        'Intervenir en la elaboración de los marcos normativos que regulan la organización de los servicios educativos de su dependencia.',
                        'Establecer criterios y realizar la evaluación de los Supervisores del Nivel.',
                    ]
                ],
                'Dirección Provincial de Educación Primaria' => [
                    'objetivos' => [
                        'Asistir a la Secretaría de Educación en la elaboración, ejecución y evaluación del programa general de política educativa provincial, referida al Nivel de Educación Primaria.',
                        'Ejercer la dirección y administración general del área, implementando y articulando las políticas educativas emanadas de la Secretaría de Educación y del Ministerio en las instituciones de su dependencia.',
                    ],
                    'acciones' => [
                        'Conducir la gestión de los servicios de Educación Primaria que se prestan en las unidades dependientes de la Dirección.',
                        'Proponer estrategias y acciones de la Secretaría de Educación tendientes al mejoramiento de la calidad educativa del Nivel y al logro de las políticas fijadas para el área.',
                        'Planificar, coordinar, desarrollar y evaluar acciones que aseguren la implementación de los principios y lineamientos de la política educativa definida para las jurisdicciones provincial y nacional, destinadas a promover un mejoramiento efectivo de la gestión institucional y pedagógica en las instituciones escolares, así como también, un mejoramiento de las condiciones necesarias conducentes al logro de trayectorias escolares relevantes, sistemáticas, regulares y completas de todos los estudiantes, es decir, con logros de aprendizajes de todos los alumnos del nivel.',
                        'Coordinar acciones con la Secretaría de Planeamiento Educativo del Ministerio para la formulación, implementación y seguimiento del plan provincial de educación.',
                        'Definir necesidades y prioridades de investigación e innovación educativa y disponer la elaboración y ejecución de proyectos.',
                        'Definir acciones tendientes a indagar y revertir los factores que obstaculizan los procesos de enseñanza y de aprendizaje en las escuelas del nivel.',
                        'Participar en los operativos de evaluación.',
                        'Planificar y coordinar acciones de asistencia técnica y capacitación para Supervisores y directores de las Unidades Escolares.',
                        'Coordinar las acciones con la Supervisión General y el equipo de supervisores pedagógicos de zona en el área de su incumbencia y evaluar la ejecución de las mismas.',
                        'Disponer la elaboración de los marcos normativos regulatorios de la organización y funcionamiento de los servicios educativos bajo su dependencia.',
                        'Certificar y acreditar estudios y el cumplimiento de la obligatoriedad del nivel para la enseñanza común.',
                        'Comunicar a la Secretaria de Educación los proyectos y actividades previstas y los recursos necesarios para su cumplimiento.',
                        'Mantener un contacto permanente con los Departamentos, Divisiones y demás unidades orgánicas del área para acordar lineamientos comunes, en materia de gestión administrativa y pedagógica disponiendo medidas que aseguren un máximo de coordinación entre las distintas dependencias.',
                        'Realizar la calificación del Supervisor General y administrativo del área.',
                        'Elaborar la memoria anual.',
                    ]
                ],
                'Dirección Provincial de Educación Secundaria' => [
                    'objetivos' => [
                        'Asistir a la Secretaría de Educación en la elaboración, ejecución y evaluación de las políticas educativas provinciales referida al Nivel de Educación Secundaria tanto de contexto urbano como Rural.',
                        'Ejercer la dirección y Administración General del organismo, coordinando la gestión de las áreas bajo su dependencia, garantizando la aplicación de la legislación nacional y provincial.',
                        'Organizar, ordenar y gestionar las instituciones escolares de Nivel Secundario Urbanas y Rurales, asistiendo y acompañando en las dimensiones pedagógica-didáctica; Administrativa-Organizacional y Socio-Comunitaria.',
                        'Gestionar la implementación de acciones de cooperación técnico-pedagógica con organismos provinciales, nacionales e internacionales, para la formación y capacitación de los recursos Humanos docentes, para el fortalecimiento de las trayectorias escolares y el cuidado de las adolescencias.',
                        'Establecer criterios y pautas de trabajo que aseguren coordinación entre las distintas áreas y dependencias de la dirección, así como la articulación horizontal con las Direcciones que forman parte de la Secretaria de Educación.',
                    ],
                    'acciones' => [
                        'Conducir la gestión de las políticas educativas establecidas para el Nivel Secundario.',
                        'Asistir a las distintas unidades educativas de la provincia en los aspectos didáctico-pedagógico, administrativo - Organizacional y Socio-Comunitario para fortalecimiento de la calidad educativa en los contextos urbanos y rurales.',
                        'Elaborar la planificación general del área a su cargo programando, ejecutando y evaluando su implementación, previa aprobación del Ministerio de Educación, Ciencia y Tecnología.',
                        'Planificar y coordinar acciones de asistencia técnica en aspectos de gestión curricular e institucional.',
                        'Orientar y asistir en aspectos técnicos, pedagógicos y administrativos a los equipos de conducción de las unidades educativas dependientes, para el cumplimiento y logro de los objetivos específicos del Nivel.',
                        'Coordinar entre los distintos niveles y modalidades educativas proponiendo mecanismos eficaces y eficientes de gestión del nivel secundario.',
                        'Reorganizar los Recursos Humanos en función de las necesidades de servicio y la eficiencia en el desarrollo de los programas educativos.',
                        'Promover una adecuada diversificación de los planes de estudios de nivel secundario que atienda tanto a las expectativas y demandas de la población como a las de necesidades de desarrollo local y provincial.',
                        'Elaborar, revisar, evaluar y actualizar los Diseños Curriculares del nivel, con énfasis en la educación rural, adecuándola a los contextos, las demandas y las condiciones institucionales.',
                        'Confeccionar y mantener actualizada la base con los datos de todas las unidades educativas del nivel, con sus correspondientes matrículas, planta funcional, equipamiento e instalaciones edilicias.',
                        'Realizar los estudios y análisis necesarios para mantener actualizado el sistema de monitoreo de evaluación.',
                        'Diseñar y gestionar las acciones y estrategias de la evaluación del rendimiento académico de los alumnos de las unidades educativas pertenecientes al nivel secundario urbano y rural.',
                        'Coordinar acciones con la Secretaria de Planeamiento Educativo, dependiente del Ministerio de Educación, Ciencia y Tecnología, para la formulación y seguimiento de la planificación referida al nivel.',
                        'Certificar y acreditar estudios de nivel.',
                        'Clasificar a los supervisores del área.',
                        'Identificar necesidades y ejecutar acciones de capacitación del personal a su cargo.',
                        'Elaborar y elevar informes periódicos y la memoria anual a la Secretaría de Educación, referidos al desarrollo de las actividades del área.',
                    ]
                ],
                'Dirección Provincial de Educación Superior' => [
                    'objetivos' => [
                        'Asistir a la Secretaría de Educativa en la elaboración, ejecución y evaluación. El programa general de política educativa provincial referido al Nivel de Educación Superior de Formación Docente y Técnico Profesional, conforme a lo establecido con la Ley de Educación Superior N° 24.521, Ley de Educación Nacional N° 26.206, Ley de Educación Técnico Profesional N° 26.058 y Ley de Educación Provincial N° 5381.',
                        'Ejercer la dirección y Administración General del área, implementando y articulando las políticas educativas emanadas de la Secretaría Educativa y del Ministerio de Educación, Ciencia y Tecnología, asumiendo la responsabilidad de la gestión, garantizando la correcta aplicación de la legislación educativa nacional y provincial en materia de formación docente, técnico profesional.',
                        'Garantizar la igualdad de oportunidades en el ingreso, permanencia y egreso de los estudiantes de educación superior para fortalecer el talento humano de la provincia. Como herramienta para integrar las necesidades de la sociedad, sectores productivos gubernamentales y otros mediante la armonización y aprovechamiento de sus recursos a través de las experiencias académicas e investigativas en el ámbito provincial, nacional e internacional como instrumento de Justicia social.',
                    ],
                    'acciones' => [
                        'Promover políticas generales para el sistema formador, producidas en ámbitos integrados por las jurisdicciones y representantes de las universidades que forman docentes, que favorezca el trabajo conjunto en cuestiones compartidas por ambas instituciones relativas al ingreso, la retención, el egreso, las condiciones de desarrollo de las practicas, la vinculación de las carreras de formación inicial y continua la articulación con las escuelas de los niveles para los que forman. Entre otras.',
                        'Establecer en el marco de lo dispuesto por el Ministerio de Educación, Ciencia y Tecnología de las Políticas y los procesos de articulación e integración, tengan en cuenta los acuerdos federales relativos a: Regulaciones curriculares de formación docente inicial y continua. Planificación jurisdiccional y regional de las ofertas de formación docente inicial continua.',
                        'Acordar las acciones para establecer vínculos sistemáticos entre las instituciones formadoras y las escuelas sedes de las prácticas y residencias pedagógicas, ampliar ese vínculo a tareas comunes a través de la creación de proyectos de innovación y de mejora de las escuelas y de la formación. Incorporar formalmente a las escuelas como instituciones que también contribuyen a la formación de los futuros docentes.',
                        'Fortalecer la Articulación e integración de las instituciones superiores de formación docente y universidades en un sistema. Cuya unidad deberá estar dada por las orientaciones políticas concertadas en nivel nacional y provincial.',
                        'Proponer las normas pedagógicas y los planes y programas de estudio para la educación superior que impartan las instituciones educativas de la dirección en el ámbito de la formación docente, como en formación técnica profesional.',
                        'Proponer las políticas que resulten convenientes para el desarrollo de la educación superior al que se refiere las funciones de esta dirección provincial.',
                        'Establecer mecanismos de coordinación con las instituciones que impartan educación superior universitaria, a efecto de acordar políticas y acciones para la planeación y evaluación de este tipo educativo.',
                        'Promover que las instituciones de educación superior formulen, mediante procesos de planeación estratégica participativa, programas integrales de fortalecimiento institucional que les permitan alcanzar niveles superiores de desarrollo mediante proceso de planificación estratégica participativa.',
                        'Impulsar políticas para la actualización, formación y superación del personal académico de las instituciones al que se refiere en las funciones de esta dirección provincial.',
                        'Impulsar y fomentar el desarrollo y con su consolidación de cuerpos académicos, así como sus líneas de generación y aplicación innovadora del conocimiento en las instituciones a que se refiere en las funciones de esta dirección provincial.',
                        'Promover un proceso de autoevaluación y evaluación externa de los programas educativos y de la gestión institucional en los planteles al que se refiere en las funciones de esta dirección.',
                        'Impulsar en las instituciones a las que se refiere en las funciones de esta dirección, la atención a las recomendaciones formuladas por organismos evaluadores externos en relación con sus programas educativos, así como su gestión y administración institucional, con el propósito de que alcancen y mantengan sus reconocimientos de calidad.',
                        'Fomentar que las instituciones a las que se refieren las funciones de esta dirección cuentan con sistemas integrales de información que permitan la toma de las mejores decisiones y, que den sustento a los procesos de planeación y evaluación.',
                        'Participar en el estudio de decisiones, según sea el caso de los proyectos para la creación de instituciones de educación superior a las que se refiere en las funciones de esta dirección.',
                        'Promover la creación y continuidad de carreras de formación técnica profesional conforme a nuestro contexto geográfico, productivo y social.',
                        'Establecer indicadores para evaluar el desempeño de las instituciones educativas del tipo superior a las que se refiere en las funciones de esta dirección provincial.',
                        'Promover que las instituciones de educación superior realicen estudios y diagnósticos que permitan identificar las características y problemas de la educación superior, así como sistematizar, integrar y difundir la información necesaria para la evaluación global de este tipo educativo.',
                        'Evaluar el funcionamiento de las instituciones de educación superior de carácter no universitario en sus diversas modalidades.',
                        'Planificar y ejecutar políticas de articulación del sistema formador docente inicial y continua.',
                        'Fortalecer lo dispuesto por el Consejo Federal de Educación, organismo Interjurisdiccional de carácter permanente, como el ámbito de concertación. Acuerdo y coordinación de la política educativa nacional, debiendo asegurar la unidad y articulación del sistema educativo nacional.',
                        'Acordar que la función principal del sistema de formación docente es contribuir a la mejora general de la educación de la provincia de Catamarca y que sus propósitos específicos son: Formación inicial y continua de los agentes que se desempeñan en el sistema educativo en el marco de las políticas educativas que establece la ley de educación nacional. Producción de saberes sobre la enseñanza, la información y el trabajo docente, teniendo en cuenta que la tarea sustantiva de la profesión requiere conocimientos específicos y especializados que contemplen la complejidad del desempeño docente.',
                        'Establecer que el sistema de formación docente ampliará sus funciones para atender las necesidades de formación docente inicial y continua y los requerimientos de producción de saberes específicos, incluyendo, entre otras. las siguientes: - Formación inicial. - Actualización de la disciplina pedagógica de docentes en ejercicio. - Investigación de temáticas vinculadas a la enseñanza, el trabajo docente y la formación docente. - Asesoramiento pedagógico. - Preparación para el desempeño de cargos directivos y de supervisión. - Acompañamiento de los primeros desempeños docentes. - Formación pedagógica de agentes sin título docente y de profesionales de otras disciplinas que pretenden ingresar a la docencia. - Formación para el desempeño de distintas funciones en el sistema educativo. - Formación de docentes y no docentes para el desarrollo de actividades educativas en instituciones no escolares. (Instituciones penales de menores, centros recreativos, centros culturales. Etc.) - Producción de materiales didácticos para la enseñanza en las escuelas. Esta numeración no agota las funciones posibles ni supone que cada Institución formadora deba asumirlas todas en tanto constituyen funciones del sistema formador en su conjunto.',
                        'La cobertura de los puestos de trabajo para la atención de las prioridades de la política educativa.',
                        'La ampliación y diversificación de las funciones del sistema formador en relación con el mapa de necesidades del sistema educativo y de las condiciones y posibilidades de las instituciones formadoras.',
                    ]
                ],
                'Dirección Provincial de Modalidades Educativas' => [
                    'objetivos' => [
                        'Asistir a la Secretaria de Educación en el diseño, implementación y evaluación de las líneas de políticas educativas provinciales, articulando con las propuestas nacionales referidas a las modalidades del sistema educativo: Educación Técnico Profesional, Educación Artística, Educación Especial, Educación permanente de Jóvenes y Adultos, Educación Rural, Educación Intercultural Bilingüe, Educación en Contextos de Privación de Libertad y Educación Domiciliaria y Hospitalaria.',
                        'Intensificar las condiciones educativas -con especial énfasis en los sectores sociales más vulnerables- para que, durante todo el trayecto de la educación obligatoria, los estudiantes que acceden al sistema educativo formal permanezcan y progresen en él y egresen con los aprendizajes y capacidades, como así también en capacitaciones laborales y Formación Profesional, necesarias para desenvolverse como ciudadanos plenos.',
                        'Impulsar transformaciones institucionales y pedagógicas para la ampliación progresiva de las oportunidades educativas, involucrando corresponsablemente a las familias y la sociedad.',
                        'Estructurar la gestión de las modalidades educativas para dar respuesta a requerimientos específicos de formación y atender particularidades de carácter permanente o temporal, personal y/o contextual, con el propósito de garantizar la igualdad en el derecho a la educación y cumplir con las exigencias legal, técnicas y pedagógicas de los diferentes niveles educativos.',
                        'Propiciar en las instituciones de todos los niveles y modalidades la revisión y apropiación en contexto de los diseños curriculares, con énfasis en el desarrollo de capacidades (escribir, leer y comprender, resolver problemas, pensar críticamente, crear y trabajar con otros para comprender el Mundo) de profundización de los saberes de la lengua, las matemáticas, las ciencias, las artes y la educación física, la integración de por lo menos un lengua extranjera y el uso educativo de las tecnologías de la información y la comunicación (TIC).',
                        'Promover la enseñanza del aprendizaje y la práctica de derechos, deberes y valores humanos universales como constitutivos de la cultura escolar, formación para la práctica social y el desarrollo de una ciudadanía plena.',
                        'Adecuar y resignificar los sistemas de evaluación de manera tal que sea posible valorar el funcionamiento del sistema de educativo y los resultados de aprendizaje de los estudiantes y en vista a optimizar los procesos de toma de decisiones para la mejora educativa y sus modalidades.',
                        'Profundizar la instalación de una cultura evaluativa en las instituciones educativas, de todos los niveles y modalidades de los procesos de enseñanza y aprendizajes que acontecen en las mismas, como insumo imprescindible para la elaboración de los planes de mejora.',
                        'Optimizar los sistemas administrativos para mantener una estructura ágil y flexible, centrada en la escuela.',
                    ],
                    'acciones' => [
                        'Coordinar propuestas educativas desde la educación artística, Educación Técnica Profesional, Educación Permanente de Jóvenes y Adultos, Educación Intercultural Bilingüe, Educación en Contexto de Privación de la Libertad y Educación Domiciliaria y Hospitalaria que se desarrolla en diversos contextos y/o instituciones educativas.',
                        'Proponer acciones a la Secretaría de Educación, de acuerdo a los ejes transversales educativos nacionales y jurisdiccionales para el mejoramiento de la calidad de las modalidades que la componen y estrategias tendientes al logro de las políticas educativas fijadas para el área.',
                        'Actualizar la normativa jurisdiccional respecto a estructuras curriculares y diseños curriculares en los niveles educativos, en referencia a las modalidades y sus contextos.',
                        'Promover mesas intersectoriales de trabajo con los ministerios y/u Organismos privados y/o estatales, que administran espacios o contextos diversos y en donde se encuentran las instituciones educativas y/o estudiantes con trayectos educativos diferenciados por las modalidades.',
                        'Desarrollar propuestas destinadas a estimular la creación artística y la participación en diferentes manifestaciones culturales, así como en actividades de educación física y deportiva, articuladas con la educación formal.',
                        'Brindar información permanente sobre las ofertas educativas y culturales existentes.',
                        'Planificar y coordinar acciones de asistencia técnica en aspectos de gestión curricular e institucional.',
                        'Coordinar acciones con la Secretaría de Planeamiento Educativo para la formulación y seguimiento de la planificación referida a las normativas propias de las modalidades que integran la dirección.',
                        'Coordinar acciones con las instituciones para establecer capacitación y formación de Recursos Humanos en líneas prioritarias en planificación de acciones reales y concretas de acuerdo al contexto.',
                        'Definir necesidades y prioridades de investigación e innovación educativa y disponer la elaboración y ejecución de proyectos.',
                        'Diseñar estrategias para acompañar las trayectorias escolares de los estudiantes, de manera que las mismas sean completas y continuas.',
                        'Planificar acciones de asistencia técnica y capacitación para supervisores y directores de las unidades escolares.',
                        'Disponer la elaboración de los Marcos normativos regulatorios de la organización y Funcionamiento de los servicios educativos bajo su dependencia.',
                        'Planificar las acciones de la dirección, determinando prioridades, asignando y distribuyendo recursos profesionales de uso de infraestructura de equipamiento y financiamiento.',
                        'Comunicar a la subsecretaría los proyectos y actividades previstas y los recursos necesarios para su cumplimiento.',
                        'Confeccionar protocolos para los concursos de ofertas de Formación Profesional en forma conjunta con la Secretaría de Ciencia y Tecnología.',
                        'Continuar con capacitaciones dentro de las distintas modalidades educativas, enmarcadas en las mesas de diálogo, y en todos los departamentos de la provincia.',
                        'Capacitación y actualización puntuales, en territorio, a Directivos y docentes de escuelas Educación Intercultural Bilingüe.',
                        'Investigaciones para la elaboración de materiales didácticos sobre la cultura y cosmovisión actual de los pueblos originarios de la provincia.',
                        'Posibilitar gestiones de postulación y/o especialización en las distintas modalidades educativas a través de los institutos de formación docente de la provincia.',
                        'Gestionar fondos para publicaciones de textos y materiales didácticos para la MEIB.',
                        'Gestionar recursos económicos para el trabajo en territorio con las comunidades de pueblos originarios y las instituciones escolares, lo que respecta a capacitaciones, resolución de conflictos, establecimiento de acuerdos como estrategia para evitar las situaciones conflictivas en las escuelas de Educación Intercultural Bilingüe y realización de investigaciones. En el marco de la normativa vigente para la modalidad.',
                        'Coordinar acciones con todas las direcciones de nivel para propiciar una trayectoria educativa integral.',
                        'Continuar con capacitaciones interdisciplinarias con evaluación, para el fortalecimiento de los procesos creativos e interdisciplinarios para el logro de aprendizajes significativos.',
                        'Articular con los ministerios y/o áreas de turismo, cultura y tecnología, municipios y poder legislativo para la socialización de prácticas de formación artísticas con especialidad y artístico-técnica para la industria cultural (FAPIC) y establecimiento de circuitos de Industria cultural.',
                        'Establecer una coordinación de Educación Domiciliaria y Hospitalaria, en la dirección, y por parte de un docente en cada departamento, según las necesidades y demandas del estudiante que esté en situación de enfermedad.',
                        'Considerar y/o establecer normativas específicas donde las escuela/s, en la/s que tendrían su sede los docentes, sean centros habilitados para el acompañamiento a la trayectoria del estudiante.',
                        'Orientar mediante, las distintas coordinaciones y Supervisión de la Dirección Provincial de Modalidades Educativas, a los equipos de conducción de instituciones educativas de acuerdo a su modalidad.',
                        'Realizar protocolos de intervención para las modalidades y elaboración de documentación que deberá manejar las instituciones educativas, a fin de dar cumplimiento a los requerimientos establecidos en las normativas emitidas por el Consejo Federal de Educación y por el Ministerio de Educación, Ciencia y Tecnología de la Provincia.',
                        'Considerar las/os alumnas/os en situación de privación de la libertad que se encuentran en prisión domiciliaria y se encuentren comprendidos también en la Modalidad Jóvenes y Adultos, teniendo en cuenta la obligatoriedad de la educación hasta finalizar el nivel secundario.',
                        'Generar y diseñar planes, programas y proyectos de carácter jurisdiccional que tiendan a garantizar la trayectoria educativa de los estudiantes.',
                        'Mantener un contacto permanente con los departamentos, divisiones y demás unidades orgánicas del área, comunidades, para acordar lineamientos comunes en materia de gestión administrativa y pedagógica, disponiendo medidas que aseguren un máximo de coordinación entre las distintas dependencias.',
                        'Garantizar el acceso a la educación de calidad para estudiantes con discapacidad y necesidades educativas especiales, asegurando el cumplimiento efectivo de los principios de inclusión, estabilidad y accesibilidad establecidos en la Ley Nacional de Educación N° 26.206, en particular su artículo 44, y en la Ley Nacional de Protección Integral de los Derechos de Niños, Niñas y Adolescentes N° 26.061.',
                    ]
                ],
                'Dirección Provincial de Educación de Gestión Municipal Privada, Social y Cooperativa' => [
                    'objetivos' => [
                        'Ejercer el control sobre la versión, seguimiento y asesoramiento desde lo pedagógico y administrativo de las Instituciones Educativas de Gestión Privada, Municipal, Social y Cooperativa, ya que estos servicios educativos, conforme a la Ley de Educación Provincial 5.381 y la ley 3.387 Enseñanza Privada, están sujetos a la autorización, reconocimiento y supervisión administrativa y pedagógica del Ministerio de Educación Ciencia y Tecnología. Con el objeto de garantizar el cumplimiento de la normativa vigente y de las políticas de igualdad y la calidad educativa.',
                        'Asistir a la Secretaría de Educación en la elaboración, ejecución y evaluación del Programa General de Política Educativa Provincial, referida a la Educación Pública de Gestión Privada, Municipal, Social y Cooperativa.',
                    ],
                    'acciones' => [
                        'Garantizar el derecho a la Educación de todos los niños, niñas, jóvenes y adultos de la provincia de Catamarca hasta terminalidad obligatoria establecida por ley, sin discriminación de ninguna naturaleza y en base a la igualdad de oportunidades. Proporcionar orientación escolar de acuerdo a las edades de los educandos y modalidades del sistema a través del Equipo de Supervisión y Técnicos.',
                        'Gestionar acciones tendientes al funcionamiento en las dimensiones pedagógicas, administrativas y sociales, en los niveles que se articulan dentro de la Dirección.',
                        'Establecer acciones de supervisión, monitoreo y seguimiento de los diferentes procesos que se desarrollan en las instituciones de su dependencia.',
                        'Optimizar el uso de los diversos recursos con los que cuenta la Dirección para el mejoramiento de la calidad del servicio y establecer estrategias tendientes al logro de las políticas de transformación establecidas.',
                        'Proporcionar acciones para una efectiva articulación entre las distintas Direcciones.',
                        'Incentivar el trabajo de investigación e innovación educativa, respondiendo a las necesidades del nivel y a las nuevas políticas educativas jurisdiccionales.',
                        'Garantizar la gradualidad y coherencia de la propuesta curricular para cada nivel, articulando con otras Direcciones del Nivel Educativo.',
                        'Proporcionar acciones articuladas entre las distintas Direcciones.',
                        'Elaborar proyectos de investigación e innovación educativa que respondan a las necesidades del nivel y a las nuevas políticas educativas.',
                        'Evaluar la viabilidad de proyectos de los equipos técnicos tendientes al mejoramiento de la propuesta educativa de la Dirección.',
                        'Coordinar acciones con el área de capacitación y formación de recursos humanos para establecer las propiedades y planificar las propuestas de capacitación.',
                        'Intervenir en la elaboración de los marcos normativos para regular la organización de los servicios educativos.',
                        'Promover el trabajo desde la transversalidad sustentado en valores para fortalecer un buen clima institucional.',
                        'Realizar o disponer de las supervisiones y sanciones reglamentarias que resulten aplicables y necesarias para comprobar y hacer cumplir la educación y cumplimiento de las directivas legales vigentes que regulan el funcionamiento de las unidades escolares de Gestión Privada, Municipal, Social y Cooperativas.',
                    ]
                ],

                'Dirección Provincial de Educación Técnica, Agrotécnica y Formación Profesional' => [
                    'objetivos' => [
                        'Asistir a la Secretaría de Educación a partir de los lineamientos establecidos por el Ministerio de Educación, en el marco de la Ley de Educación Nacional N° 26.206, La Ley N° 26.058 de Educación Técnica y Profesional por los acuerdos federales y Ley provincial N° 5.381.',
                        'Fortalecer el carácter estratégico que tiene la educación técnico profesional en el desarrollo humano, social y cultural, en el crecimiento económico.',
                        'Atender a los lineamientos fijados en la Ley N° 26.058 de Educación Técnica Profesional, en concordancia con los principios, fines y objetivos. En las leyes provinciales y nacionales que regulan y orientan la educación técnica y Formación Profesional.',
                        'Ejercer la coordinación y administración del área bajo las premisas del Ministerio de Educación, Ciencia y Tecnología y la Secretaría de Educación, en las instituciones de modalidad de formación técnico profesional bajo su dependencia.',
                        'Fortalecer y encauzar los lineamientos delineados por la autoridad superior referido a la administración y ordenamiento del sistema educativo y en particular la educación técnica profesional, en el marco de la transformación educativa.',
                        'Establecer permanentes vinculaciones con el INET a fin de favorecer la implementación de los distintos planes proyectos y mecanismos para el mejoramiento continuo de la calidad de la educación técnica y formación profesional.',
                        'Asistir a la Secretaría de Educación en la elaboración, ejecución y evaluación del programa General de política educativa provincial, referida al Nivel de Educación Secundaria y Superior de formación técnico profesional, conforme a lo establecido en la Ley de Educación Superior N° 24.521, Ley de Educación Nacional N° 26.206, Ley de Educación Técnica Profesional N° 26.058 y Ley de Educación Provincial N°5.381.',
                        'En caso de autorización mediante acto administrativo emanado del Ministro de Educación, Ciencia y Tecnología, podrá ejercer la dirección y Administración General del área, implementando y articulando las políticas educativas emanadas de la Secretaría de Educación, asumiendo la responsabilidad de la gestión, garantizando la correcta aplicación de la legislación educativa nacional y provincial. En la materia de formación docente y técnico profesional.',
                    ],
                    'acciones' => [
                        'Garantizar el ordenamiento y regulación de la educación técnica y Formación Profesional de la provincia y en sus diferentes niveles educativos.',
                        'Facilitar y promover la mejora continua de la calidad de educación técnico profesional formando ciudadanos integrales comprometidos con el desarrollo local regional y nacional.',
                        'Garantizar la adquisición de conocimientos y el desarrollo de habilidades de calidad de los egresados de la formación profesional.',
                        'Articular permanentemente con los sectores productivos, laborales y la Comunidad en general en el proceso de investigación, planificación, ejecución y evaluación de planes, programas y proyectos socio educativos.',
                        'Diseñar propuestas curriculares que respondan a perfiles laborales requeridos en el mercado de trabajo y las necesidades de formación de la población destinataria.',
                        'Validar los diseños curriculares con los referentes del sector productivo, con especialistas y docentes de las instituciones a través del trabajo.',
                        'Proveer estrategias de seguimiento sistemático de los egresados destinados a conformar una banca de datos mínimos.',
                        'Adherir a los diferentes programas, fundamentalmente aquellos que posibiliten mejorar los niveles de calidad de la educación técnica y la Formación Profesional.',
                        'Fomentar a través de la educación técnico profesional, el desarrollo de programas de emprendedurismo y microcrédito.',
                        'Promover la capacidad de los equipos responsables de la implementación de las reformas de educación técnica profesional.',
                        'Fomentar experiencias de Formación Profesional que favorezcan la integración laboral de las personas con mayor riesgo de exclusión social.',
                        'Favorecer el desarrollo y la consolidación de actitudes prácticas tendientes a resguardar el ambiente.',
                        'Desarrollar un sistema de indicadores que tengan en cuenta los cambios educativos que se producen al interior de la institución y permiten redirecciones en los desvíos producidos.',
                        'Colaborar mediante acciones de asesoramiento, asistencia técnica y capacitación, a las unidades educativas de su dependencia.',
                        'Crear y mantener redes de experiencias entre unidades educativas que fortalezcan lazos y actúen como facilitador en el ordenamiento y regularización de la educación técnica profesional.',
                        'Propender a través de la educación técnico profesional el desarrollo local de su Comunidad de contexto.',
                        'Promover la cooperación, la mejora continua y a la calidad de la educación técnica profesional en sus diferentes niveles educativos.',
                        'Garantizar que las prácticas profesionalizantes integren la etapa formativa de los estudiantes con el propósito de consolidar, integrar y/o ampliar las capacidades de saberes que se corresponden con el perfil profesional.',
                        'Establecer los instrumentos y mecanismos necesarios que permitan la movilidad académica de estudiantes, profesores e investigadores como un medio eficaz para garantizar la calidad Educativa.',
                        'En caso que exista acto administrativo emanado del Ministro de Educación, Ciencia y Tecnología que lo autorice, deberá asegurar, en el marco de las normativas para los ejercicios financieros provinciales o nacionales, según competa, la vía y habilitación de los procedimientos para la gestión administrativa o contable que se desprenden de los fondos nacionales para la educación técnico profesional.',
                        'Resguardar la transparencia, la eficacia y la efectividad en la administración y rendición de los recursos financieros de los respectivos fondos.',
                        'Participación en las mesas de trabajo sobre formación técnica superior en INET.',
                        'Organización de foros intersectoriales con el sector productivo para definirlas demandas.',
                        'Realizar una evaluación detallada de las condiciones edilicias actuales de las escuelas agrotécnicas con el fin de determinar las futuras intervenciones, para brindar un espacio acorde a las necesidades básicas de los alumnos en el proceso de aprendizaje.',
                        'Identificar e informar al superior directo las áreas críticas que requieren mejoras inmediatas y priorizar acciones dirigidas a esas necesidades.',
                        'Proponer e implementar programas de formación continua para docentes centrados en las nuevas metodologías pedagógicas y las tendencias en educación agrotécnica.',
                        'Proponer la implementación de prácticas sostenibles en la enseñanza, enfocándose en métodos que requieran recursos económicos mínimos sujeto a la disponibilidad.',
                        'Desarrollar una plataforma digital para compartir materiales de estudio y buenas prácticas entre las escuelas agrotécnica de la provincia.',
                        'Facilitar la colaboración y el intercambio de ideas tanto dentro de la institución como así también con la sociedad local donde se desarrollan los estudiantes.',
                    ]
                ],
                'Dirección Provincial de Startups y Ecosistema Emprendedor' => [
                    'objetivos' => [
                        'Promover el desarrollo y fomentar un entorno propicio para la creación, crecimiento y consolidación de emprendimientos innovadores en la economía del conocimiento en el territorio provincial.',
                        'Impulsar la innovación y el desarrollo tecnológico, estimulando la adopción de tecnologías, la digitalización y la innovación abierta como factores clave de competitividad.',
                        'Fortalecer el ecosistema emprendedor provincial, promoviendo la articulación entre actores del sector público, privado, académico y de la sociedad civil para consolidar un entorno colaborativo y dinámico.',
                        'Facilitación del desarrollo de startups locales, acompañando a los emprendimientos en procesos de vinculación provincial, regional y participación en redes globales de innovación.',
                        'Fomentar la innovación y adopción de nuevas tecnologías emergentes en las startups y empresas locales.',
                    ],
                    'acciones' => [
                        'Llevar adelante una serie de acciones estratégicas destinadas a crear condiciones propicias para el surgimiento, fortalecimiento y expansión de emprendimientos innovadores en el territorio provincial.',
                        'Impulsar y promover la innovación y tecnología mediante la promoción de la transformación digital, la adopción de tecnologías emergentes, el desarrollo de programas de innovación abierta y desafíos para resolver problemáticas locales, además de brindar apoyo a startups con base científico-tecnológica.',
                        'Promover la interacción entre startups, empresas establecidas, universidades y centros de investigación para generar sinergias, transferencia de tecnología y nuevas oportunidades de negocio impulsando acciones tendientes a apoyar a las startups en su proceso de expansión.',
                        'Coordinar y diseñar herramientas para el desarrollo del ecosistema emprendedor, a partir de la articulación con otros actores, y con acciones que promuevan la participación federal de los municipios en la estrategia emprendedora.',
                        'Identificar y conectar a todos los actores relevantes del ecosistema emprendedor realizando también los estudios, análisis y publicaciones sobre el estado del ecosistema, las tendencias del mercado y las oportunidades para las startups.',
                        'Fomentar la participación de grupos subrepresentados en el emprendimiento, creando programas y políticas específicas que posean una mirada orientada a la promoción de la diversidad e inclusión.',
                        'Articular con universidades y centros de investigación y desarrollo para promover programas de emprendedurismo universitario e incubación tecnológica, fomentando la transferencia de conocimiento científico y tecnológico hacia las startups locales.',
                    ]
                ],
                'Dirección Provincial de Ciencia Aplicada y Formación Tecnológica' => [
                    'objetivos' => [
                        'Promover la aplicación del conocimiento científico y el desarrollo de la formación tecnológica para impulsar el desarrollo productivo, social y económico de la provincia.',
                    ],
                    'acciones' => [
                        'Identificar las necesidades de formación tecnológica de los diferentes sectores productivos y sociales.',
                        'Establecer puentes entre el sector científico y tecnológico y el sector productivo, fomentando el desarrollo de capital humano para la innovación a través de la formación de gerentes tecnológicos.',
                        'Diseñar e implementar programas de formación técnica profesional, capacitación y actualización en áreas estratégicas.',
                        'Construir espacios de conocimiento que interactúen con la comunidad educativa, profesional de la ciencia y la sociedad en general.',
                        'Articular con instituciones educativas, centros de investigación y el sector productivo para el desarrollo de proyectos de ciencia aplicada y transferencia tecnológica.',
                        'Fomentar la innovación y el emprendimiento de base tecnológica.',
                        'Promover la vinculación entre la ciencia, la tecnología y la sociedad, a través de actividades de divulgación y sensibilización.',
                        'Administrar aulas móviles, dotadas con la tecnología de los Centros de Innovación, para recorrer el interior y así llegar a las distintas localidades.',
                    ]
                ],
                'Dirección Provincial de Transformación Digital e Infraestructura Tecnológica' => [
                    'objetivos' => [
                        'Liderar y coordinar los procesos de transformación digital de la administración pública provincial, a través del desarrollo y la gestión de la infraestructura tecnológica y la implementación de soluciones innovadoras.',
                    ],
                    'acciones' => [
                        'Planificar, desarrollar y mantener la infraestructura tecnológica (redes, comunicaciones, centros de datos, etc.) necesaria para la transformación digital.',
                        'Implementar estrategias y políticas de transformación digital en coordinación con otras áreas gubernamentales.',
                        'Promover la adopción de tecnologías emergentes (inteligencia artificial, internet de las cosas, blockchain, etc.) en la administración pública.',
                        'Establecer estándares y protocolos para la interoperabilidad de los sistemas de información y la seguridad de la información.',
                        'Impulsar la capacitación y el desarrollo de habilidades digitales en los empleados públicos y la ciudadanía.',
                        'Generar instrumentos con el fin de promover, desarrollar y arraigar investigadores científicos y tecnológicos en el territorio provincial.',
                        'Perfeccionar la calidad educativa y nuevos oficios aplicando las nuevas tecnologías.',
                        'Evaluar los resultados de las acciones desarrolladas en el área de su competencia.',
                    ]
                ],
                'Dirección de Administración, Ejecución y Financiamiento Científico' => [
                    'objetivos' => [
                        'Fiscalizar y controlar la ejecución de los proyectos científicos y tecnológicos, mediante un sistema de auditorías con el fin de asegurar el eficiente y transparente uso de los recursos administrativos, financieros y presupuestarios de la Secretaría.',
                    ],
                    'acciones' => [
                        'Entender en las actividades relativas a la administración y control de fondos.',
                        'Evaluar el cumplimiento y la coordinación del ante proyecto presupuestario de la Secretaria de Ciencia y Tecnología.',
                        'Buscar y gestionar fuentes de financiamiento para proyectos científicos y tecnológicos, tanto a nivel nacional como internacional.',
                        'Asesorar a las distintas áreas dentro de la órbita de la secretaria sobre la confección de proyectos programas y planes relacionados a la investigación, ciencia, tecnología y todo lo concerniente a la gestión de los mismos.',
                        'Dirigir, coordinar, y fiscalizar la adquisición y abastecimiento de bienes y servicios requeridos por la Secretaria y sus dependencias, en el momento oportuno, al mínimo costo y en la calidad necesaria, observando para ello, la normativa vigente en materia de Contrataciones del Estado.',
                        'Controlar los bienes patrimoniales y su registro en el sistema de Administración de Bienes del Estado.',
                        'Controlar, supervisar y revisar los proyectos de actos administrativos elaborados por las distintas áreas, resguardando la legalidad de los mismos.',
                        'Controlar, supervisar la ejecución de proyectos científicos tecnológicos y elevar informe a la Secretaría.',
                        'Organizar al personal y motivar para cumplir sus objetivos designados por la Secretaria de Ciencia y Tecnología.',
                        'Producir informes relacionados a la ejecución presupuestaria de la Secretaria de Ciencia y Tecnología.',
                    ]
                ],
                'Dirección de Investigación, Innovación y Extensión' => [
                    'objetivos' => [
                        'Fomentar la investigación científica, la innovación y la extensión tecnológica, promoviendo la generación y transferencia de conocimiento para el desarrollo sostenible de la provincia.',
                    ],
                    'acciones' => [
                        'Diseñar e implementar programas y proyectos de investigación científica básica y aplicada.',
                        'Promover la innovación y la transferencia de tecnología hacia el sector productivo y la sociedad.',
                        'Establecer vínculos con el sistema científico-tecnológico nacional e internacional.',
                        'Desarrollar actividades de extensión y divulgación científica y tecnológica para acercar el conocimiento a la comunidad.',
                        'Apoyar la creación y el desarrollo de emprendimientos de base tecnológica.',
                        'Promover acciones conjuntas, como jornadas científicas y eventos sociales, que acerquen, la ciencia y la tecnología a las comunidades locales.',
                    ]
                ],
                'Dirección Provincial de Despacho' => [
                    'objetivos' => [
                        'Ejercer la dirección, coordinación, control de tramitación y administración general del Despacho del Ministro de Educación, Ciencia y Tecnología, y de la documentación administrativa que se formaliza, registra y custodia, además de entender, ordenar, controlar y supervisar los servicios generales que brinda mesas de Entradas y Salidas como así también Archivos del Ministerio.',
                    ],
                    'acciones' => [
                        'Entender sobre todos los asuntos que son propios de la función de despacho y atención general del trámite conforme a la normativa que lo rige.',
                        'Brindar a los funcionarios del Ministerio en general, el asesoramiento que le sea requerido dentro de los límites de su competencia.',
                        'Entender en el despacho de la documentación administrativa del Ministerio y sus dependencias administrativas, procurando su correcto diligenciamiento.',
                        'Protocolizar, organizar, resguardar y mantener actualizados los registros de los actos administrativos suscritos por el Ministro, de las disposiciones dictadas por las distintas autoridades del Organismo y de Convenios.',
                        'Disponer la publicación de los actos administrativos en el Boletín Oficial, de acuerdo a lo establecido en la normativa específica vigente.',
                        'Brindar, en el horario establecido para tal fin, atención al público interno o externo que se presente en Mesas de Entradas y Salidas y Archivos.',
                        'Registrar, clasificar y realizar la distribución de documentación que esté destinada al Ministerio o emitida por él a la dependencia administrativa u Organismo que corresponda.',
                        'Organizar y ejecutar las acciones necesarias a fin contar con información actualizada sobre el estado de trámite, y en su caso, estado de conservación, de la documentación que se tramita en el ámbito de su competencia.',
                        'Detectar y gestionar las necesidades de capacitación de los agentes que prestan servicios en el ámbito de su competencia.',
                        'Coordinar las acciones de los despachos y unidades sectoriales de las distintas jurisdicciones del Ministerio de Educación, Ciencia y Tecnología según lo establezca la Secretaria de Coordinación Institucional.',
                        'Participar en las acciones de las áreas de su dependencia supervisando el correcto y ágil cumplimiento de las funciones y tareas asignadas a cada uno de ellos, conforme a la normativa vigente.',
                        'Atender, supervisar, controlar y coordinar el despacho de toda la documentación que llega a la Dirección Provincial y que deba ser sometida al análisis del Ministerio, previo al pase del despacho para la firma del ministro.',
                        'Intervenir en el procedimiento administrativo de proyectos de leyes, decretos y resoluciones ministeriales.',
                        'Verificar que previo a la emisión del acto administrativo, hayan tomado intervención las áreas técnicas competentes en la materia según el caso, mediante dictamen.',
                        'Producir informes a requerimiento de la superioridad.',
                        'Intervenir y velar por el cumplimiento de las normas vigentes y las actuaciones administrativas.',
                        'Dirigir las tareas y mantener actualizado el registro y recopilación de leyes, decretos, resoluciones y convenios, en tanto se realice y sean de interés para el Ministerio.',
                        'Realizar todo acto administrativo que tienda a optimizar las prestaciones de servicio del personal de su dependencia dando celeridad a las mismas y evitando la burocratización excesiva.',
                        'Coordinar y dirigir todo lo relacionado con los registros de la documentación que ingrese, su trámite seguro y su eventual archivo, asegurando la actualización sistemática de los mismos.',
                        'Promover acciones de articulación con las distintas áreas que conforman el Ministerio.',
                    ]
                ],

            ]
        ];

        // ==========================================================
        // 2) MAPA NUMERO -> NOMBRE
        // ==========================================================
        $fotoIndex = [
            2318 => 'Alejandro Avellaneda',
            2309 => 'Silvia Ines Salazar',
            2328 => 'Carolina del Valle Reynoso',
            3527 => 'Matías Andrés Cabrera',
            3527 => 'Matías Andrés Cabrera',
            3535 => 'Renzo Augusto Gonzalez',
            3539 => 'Cesar Garetto',
            3548 => 'Andrea María Silvina Perea',
            3565 => 'Cristian Eduardo Agüero Arreguez',
            3575 => 'Julio Rubén Quiroga',
            3583 => 'Cintia Brizuela',

            3654 => 'Deborah Nancy Dumitru',
            3663 => 'Andrea Julieta Fuente',
            3668 => 'Samhara Saleme',
            3675 => 'Pablo Javier Figueroa',
            3681 => 'Ivanna Alejandra del V. Altamiranda',
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
            3764 => 'Cesar Leon Camji',
            3779 => 'Daiana Montivero',
            3557 => 'Lucas Rojas',

            3789 => 'Roxana María Inés Monasterio',
            3804 => 'Milena Chasampi Rios',
            3808 => 'Pablo Pedemonte',
            3829 => 'Jesica Alejandra Aybar',

            3832 => 'Nicolás Rosales Matienzo',
            3931 => 'Victoria María Gonzalez Rojas',
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

        $photoByNum = [];
        $photoByNameExact = [];

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

            $photoByNum[$num] = $url;

            $key = $normalize($persona);
            $photoByNameExact[$key] = $url;
        }

        $photoFor = function (?string $persona) use ($normalize, $photoByNameExact, $fotoIndex, $photoByNum) {
            if (!$persona || trim($persona) === '') {
                return null;
            }

            $target = $normalize($persona);

            if (array_key_exists($target, $photoByNameExact) && !empty($photoByNameExact[$target])) {
                return $photoByNameExact[$target];
            }

            foreach ($fotoIndex as $num => $name) {
                if ($normalize($name) === $target) {
                    return $photoByNum[$num] ?? null;
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
                'mf_key' => 'Secretaría de Innovación Educativa',
            ],
            [
                'type' => 'secretaria',
                't' => 'Secretaría de Articulación Institucional',
                'area' => 'Articulación Institucional',
                'n' => 'Milena Chasampi Rios',
                'l' => 'Pabellón N° 15 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
                'mf_key' => 'Secretaría de Articulación Institucional',
            ],
            [
                'type' => 'secretaria',
                't' => 'Secretaría de Planeamiento Educativo',
                'area' => 'Planeamiento Educativo',
                'n' => 'Mariana Del Valle Tapia',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'planeamiento@catamarca.edu.ar',
                'mf_key' => 'Secretaría de Planeamiento Educativo',
            ],
            [
                'type' => 'secretaria',
                't' => 'Secretaría de Educación',
                'area' => 'Educación',
                'n' => 'Roxana María Inés Monasterio',
                'l' => 'Pabellón N° 12 - CAPE',
                'e' => 'se@catamarca.edu.ar',
                'mf_key' => 'Secretaría de Educación',
            ],
            [
                'type' => 'secretaria',
                't' => 'Secretaría de Ciencia y Tecnología',
                'area' => 'Ciencia y Tecnología',
                'n' => 'Luis Rafael Castro',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
                'mf_key' => 'Secretaría de Ciencia y Tecnología',
            ],
        ];

        foreach ($secretarias as &$s) {
            $s['photo'] = $photoFor($s['n']);
        }
        unset($s);

        $direcciones = [
            // SECRETARÍA DE INNOVACIÓN EDUCATIVA
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Inteligencia Artificial y Alfabetización Digital',
                'area' => 'Inteligencia Artificial y Alfabetización Digital',
                'n' => 'Deborah Nancy Dumitru',
                'l' => 'Pabellón N° 13 - CAPE',
                'e' => 'dirinteligenciaartificial@catamarca.edu.ar',
                'mf_key' => 'Dirección Provincial de Inteligencia Artificial y Alfabetización Digital',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección de Legalización y Registro de Títulos',
                'area' => 'Legalización y Registro de Títulos',
                'n' => 'Julio Rubén Quiroga',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
                'mf_key' => 'Dirección de Legalización y Registro de Títulos',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección de Residencia Universitaria',
                'area' => 'Residencia Universitaria',
                'n' => 'Alejandro Renée Bambicha',
                'l' => 'Maximio Victoria S/N',
                'e' => 'rup@catamarca.edu.ar',
                'mf_key' => 'Dirección de Residencia Universitaria',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección de Sistemas y Desarrollo Tecnológico',
                'area' => 'Sistemas y Desarrollo Tecnológico',
                'n' => 'Pablo Pedemonte',
                'l' => 'Pabellón N° 11 - CAPE', // Quizás cambiar ubicación si está en otro pabellón
                'e' => 'sistemas@catamarca.edu.ar',
                'mf_key' => 'Dirección de Sistemas y Desarrollo Tecnológico',
                // Puedes agregar un campo para indicar dependencia directa
                'dependencia_directa' => true,
            ],

            // SECRETARÍA DE ARTICULACIÓN INSTITUCIONAL
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Administración',
                'area' => 'Administración',
                'n' => 'Lucas Rojas',
                'l' => 'Pabellón N° 15 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
                'mf_key' => 'Dirección Provincial de Administración',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Asuntos Jurídicos',
                'area' => 'Asuntos Jurídicos',
                'n' => 'Carolina del Valle Reynoso',
                'l' => 'Pabellón N° 12 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
                'mf_key' => 'Dirección Provincial de Asuntos Jurídicos',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Despacho',
                'area' => 'Despacho',
                'n' => 'Guillermo Eduardo Osella',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'mesadeentradas-despacho@catamarca.edu.ar',
                'mf_key' => 'Dirección Provincial de Despacho',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Programación y Mantenimiento Edilicio',
                'area' => 'Programación y Mantenimiento Edilicio',
                'n' => 'Silvia Inés Salazar',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
                'mf_key' => 'Dirección Provincial de Programación y Mantenimiento Edilicio',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Sumario Docente',
                'area' => 'Sumario Docente',
                'n' => 'Samhara Saleme',
                'l' => 'Pabellón N° 12 - CAPE',
                'e' => 'dirsumariodocente@catamarca.gov.ar',
                'mf_key' => 'Dirección Provincial de Sumario Docente',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Transparencia Activa',
                'area' => 'Transparencia Activa',
                'n' => 'Renzo Augusto Gonzalez',
                'l' => 'Pabellón N° 15 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
                'mf_key' => 'Dirección Provincial de Transparencia Activa',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Unidad Ejecutora de Programas y Proyectos',
                'area' => 'Unidad Ejecutora de Programas y Proyectos',
                'n' => 'Victoria María Gonzalez Rojas',
                'l' => 'Escuela Activa N°257',
                'e' => 'innovacion@catamarca.edu.ar',
                'mf_key' => 'Dirección Provincial de Unidad Ejecutora de Programas y Proyectos',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección de Compras',
                'area' => 'Compras',
                'n' => 'Daiana Montivero',
                'l' => 'Pabellón N° 15 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
                'mf_key' => 'Dirección de Compras',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección de Parque Automotor',
                'area' => 'Parque Automotor',
                'n' => 'Cristian Eduardo Agüero Arreguez',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
                'mf_key' => 'Dirección de Parque Automotor',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección de Tesorería',
                'area' => 'Tesorería',
                'n' => 'Florencia Anahí Merep',
                'l' => 'Pabellón N° 15 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
                'mf_key' => 'Dirección de Tesorería',
            ],

            // SECRETARÍA DE PLANEAMIENTO EDUCATIVO
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Desarrollo Profesional y Evaluación Educativa',
                'area' => 'Desarrollo Profesional y Evaluación Educativa',
                'n' => 'Alejandro Avellaneda',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'capacitacion@catamarca.edu.ar',
                'mf_key' => 'Dirección Provincial de Desarrollo Profesional y Evaluación Educativa',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Estadística Educativa y Análisis Poblacional',
                'area' => 'Estadística Educativa y Análisis Poblacional',
                'n' => 'David Sánchez',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'estadistica@catamarca.edu.ar',
                'mf_key' => 'Dirección Provincial de Estadística Educativa y Análisis Poblacional',
            ],

            // SECRETARÍA DE EDUCACIÓN
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Educación Inicial',
                'area' => 'Educación Inicial',
                'n' => 'Flavia Vanesa Chasampi',
                'l' => 'Pabellón N° 13 - CAPE',
                'e' => 'educacioninicial@catamarca.edu.ar',
                'mf_key' => 'Dirección Provincial de Educación Inicial',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Educación Primaria',
                'area' => 'Educación Primaria',
                'n' => 'Cesar Leon Camji',
                'l' => 'Pabellón N° 14 - CAPE',
                'e' => 'educacionprimaria@catamarca.edu.ar',
                'mf_key' => 'Dirección Provincial de Educación Primaria',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Educación Secundaria',
                'area' => 'Educación Secundaria',
                'n' => 'Andrea María Silvina Perea',
                'l' => 'Pabellón N° 13 - CAPE',
                'e' => 'educacionsecundaria@catamarca.edu.ar',
                'mf_key' => 'Dirección Provincial de Educación Secundaria',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Educación Superior',
                'area' => 'Educación Superior',
                'n' => 'Cintia Brizuela',
                'l' => 'Pabellón N° 13 - CAPE',
                'e' => 'educacionsuperior@catamarca.edu.ar',
                'mf_key' => 'Dirección Provincial de Educación Superior',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Educación Técnica, Agrotécnica y Formación Profesional',
                'area' => 'Educación Técnica, Agrotécnica y Formación Profesional',
                'n' => 'Matías Andrés Cabrera',
                'l' => 'Pabellón N° 26 - CAPE',
                'e' => 'educaciontecnicaagrotecticayfp@catamarca.edu.ar',
                'mf_key' => 'Dirección Provincial de Educación Técnica, Agrotécnica y Formación Profesional',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Educación de Gestión Municipal Privada, Social y Cooperativa',
                'area' => 'Educación de Gestión Municipal Privada, Social y Cooperativa',
                'n' => 'Pablo Javier Figueroa',
                'l' => 'Pabellón N° 13 - CAPE',
                'e' => 'educacionprivadaymunicipal@catamarca.edu.ar',
                'mf_key' => 'Dirección Provincial de Educación de Gestión Municipal Privada, Social y Cooperativa',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Modalidades Educativas',
                'area' => 'Modalidades Educativas',
                'n' => 'Andrea Julieta Fuente',
                'l' => 'Pabellón N° 14 - CAPE',
                'e' => 'modalidadeseducativas@catamarca.edu.ar',
                'mf_key' => 'Dirección Provincial de Modalidades Educativas',
            ],

            // SECRETARÍA DE CIENCIA Y TECNOLOGÍA
            [
                'type' => 'direccion',
                't' => 'Dirección de Administración, Ejecución y Financiamiento Científico',
                'area' => 'Administración, Ejecución y Financiamiento Científico',
                'n' => 'Jesica Alejandra Aybar',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
                'mf_key' => 'Dirección de Administración, Ejecución y Financiamiento Científico',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección de Investigación, Innovación y Extensión',
                'area' => 'Investigación, Innovación y Extensión',
                'n' => 'María Fernanda Carrizo Lopez',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
                'mf_key' => 'Dirección de Investigación, Innovación y Extensión',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Startups y Ecosistema Emprendedor',
                'area' => 'Startups y Ecosistema Emprendedor',
                'n' => 'Ivanna Alejandra del V. Altamiranda',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
                'mf_key' => 'Dirección Provincial de Startups y Ecosistema Emprendedor',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Ciencia Aplicada y Formación Tecnológica',
                'area' => 'Ciencia Aplicada y Formación Tecnológica',
                'n' => 'María Luz Diaz Rodriguez',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
                'mf_key' => 'Dirección Provincial de Ciencia Aplicada y Formación Tecnológica',
            ],
            [
                'type' => 'direccion',
                't' => 'Dirección Provincial de Transformación Digital e Infraestructura Tecnológica',
                'area' => 'Transformación Digital e Infraestructura Tecnológica',
                'n' => 'Carlos David Ponce',
                'l' => 'Pabellón N° 11 - CAPE',
                'e' => 'innovacion@catamarca.edu.ar',
                'mf_key' => 'Dirección Provincial de Transformación Digital e Infraestructura Tecnológica',
            ],
        ];

        foreach ($direcciones as &$d) {
            $d['photo'] = $photoFor($d['n']);
        }
        unset($d);

        // ==========================================================
        // 5) DEPENDENCIA: Dirección -> Secretaría
        // ==========================================================
        $dirToSecretaria = [
            'Dirección Provincial de Inteligencia Artificial y Alfabetización Digital' => 'Secretaría de Innovación Educativa',
            'Dirección de Legalización y Registro de Títulos' => 'Secretaría de Innovación Educativa',
            'Dirección de Residencia Universitaria' => 'Secretaría de Innovación Educativa',
            'Dirección de Sistemas y Desarrollo Tecnológico' => 'MINISTERIO',

            'Dirección Provincial de Administración' => 'Secretaría de Articulación Institucional',
            'Dirección Provincial de Asuntos Jurídicos' => 'Secretaría de Articulación Institucional',
            'Dirección Provincial de Despacho' => 'Secretaría de Articulación Institucional',
            'Dirección Provincial de Programación y Mantenimiento Edilicio' => 'Secretaría de Articulación Institucional',
            'Dirección Provincial de Sumario Docente' => 'Secretaría de Articulación Institucional',
            'Dirección Provincial de Transparencia Activa' => 'Secretaría de Articulación Institucional',
            'Dirección Provincial de Unidad Ejecutora de Programas y Proyectos' => 'Secretaría de Articulación Institucional',
            'Dirección de Compras' => 'Secretaría de Articulación Institucional',
            'Dirección de Parque Automotor' => 'Secretaría de Articulación Institucional',
            'Dirección de Tesorería' => 'Secretaría de Articulación Institucional',

            'Dirección Provincial de Desarrollo Profesional y Evaluación Educativa' => 'Secretaría de Planeamiento Educativo',
            'Dirección Provincial de Estadística Educativa y Análisis Poblacional' => 'Secretaría de Planeamiento Educativo',

            'Dirección Provincial de Educación Inicial' => 'Secretaría de Educación',
            'Dirección Provincial de Educación Primaria' => 'Secretaría de Educación',
            'Dirección Provincial de Educación Secundaria' => 'Secretaría de Educación',
            'Dirección Provincial de Educación Superior' => 'Secretaría de Educación',
            'Dirección Provincial de Educación Técnica, Agrotécnica y Formación Profesional' => 'Secretaría de Educación',
            'Dirección Provincial de Educación de Gestión Municipal Privada, Social y Cooperativa' => 'Secretaría de Educación',
            'Dirección Provincial de Modalidades Educativas' => 'Secretaría de Educación',

            'Dirección de Administración, Ejecución y Financiamiento Científico' => 'Secretaría de Ciencia y Tecnología',
            'Dirección de Investigación, Innovación y Extensión' => 'Secretaría de Ciencia y Tecnología',
            'Dirección Provincial de Startups y Ecosistema Emprendedor' => 'Secretaría de Ciencia y Tecnología',
            'Dirección Provincial de Ciencia Aplicada y Formación Tecnológica' => 'Secretaría de Ciencia y Tecnología',
            'Dirección Provincial de Transformación Digital e Infraestructura Tecnológica' => 'Secretaría de Ciencia y Tecnología',
        ];

        // Agrupar direcciones por secretaría
        $dirsBySecretaria = [];
        $direccionesSinAsignar = [];

        foreach ($direcciones as $d) {
            $secTitle = $dirToSecretaria[$d['t']] ?? null;
            if ($secTitle && $secTitle !== 'MINISTERIO') {
                $dirsBySecretaria[$secTitle] ??= [];
                $dirsBySecretaria[$secTitle][] = $d;
            } elseif (!$secTitle) {
                $direccionesSinAsignar[] = $d;
            }
            // Si $secTitle === 'MINISTERIO', no se agrega a ninguna lista
            // porque será manejada en la sección especial
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

        return view('edudata.organigrama.index', compact(
            'mfMinistro',
            'mfSecretaria',
            'mfDireccion',
            'ministro',
            'secretariasFull',
            'direccionesSinAsignar',
            'totalCount',
            'debug',
            'direcciones', // Asegúrate de incluir esta variable
            'dirToSecretaria' // También necesitarás esta para el filtro
        ));
    }
}
