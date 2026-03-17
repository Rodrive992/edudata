@php
    $inicialOrdinarias = [
        ['titulo' => '1° Asamblea ordinaria', 'fecha' => '31 de mayo de 2025', 'cargos' => 67],
        ['titulo' => '2° Asamblea ordinaria', 'fecha' => '12 de junio de 2025', 'cargos' => 66],
        ['titulo' => '3° Asamblea ordinaria', 'fecha' => '03 de julio de 2025', 'cargos' => 69],
        ['titulo' => '4° Asamblea ordinaria', 'fecha' => '21 de agosto de 2025', 'cargos' => 18],
        ['titulo' => '5° Asamblea ordinaria', 'fecha' => '08 de septiembre de 2025', 'cargos' => 50],
        ['titulo' => '6° Asamblea ordinaria', 'fecha' => '09 de octubre de 2025', 'cargos' => 110],
        ['titulo' => '7° Asamblea ordinaria', 'fecha' => '30 de octubre de 2025', 'cargos' => 91],
        ['titulo' => '8° Asamblea ordinaria', 'fecha' => '26 de noviembre de 2025', 'cargos' => 96],
    ];

    $inicialExtra = [
        ['titulo' => '1° Asamblea extraordinaria', 'fecha' => '08 de agosto de 2025', 'cargos' => 27],
        ['titulo' => '2° Asamblea extraordinaria', 'fecha' => '12 de septiembre de 2025', 'cargos' => 13],
        ['titulo' => '3° Asamblea extraordinaria', 'fecha' => '24 de octubre de 2025', 'cargos' => 11],
    ];

    $secundarioOrdinarias = [
        ['titulo' => '1° Asamblea ordinaria', 'fecha' => '02 de junio de 2025', 'cargos' => 366],
        ['titulo' => '2° Asamblea ordinaria', 'fecha' => '11 de junio de 2025', 'cargos' => 259],
        ['titulo' => '3° Asamblea ordinaria', 'fecha' => '1° de julio de 2025', 'cargos' => 462],
        ['titulo' => '4° Asamblea ordinaria', 'fecha' => '22 de agosto de 2025', 'cargos' => 344],
        ['titulo' => '5° Asamblea ordinaria', 'fecha' => '05 de septiembre de 2025', 'cargos' => 148],
        ['titulo' => '6° Asamblea ordinaria', 'fecha' => '13 de octubre de 2025', 'cargos' => 298],
        ['titulo' => '7° Asamblea ordinaria', 'fecha' => '29 de octubre de 2025', 'cargos' => 254],
        ['titulo' => '8° Asamblea ordinaria', 'fecha' => '26 de noviembre de 2025', 'cargos' => 215],
    ];

    $secundarioExtra = [
        ['titulo' => '1° Asamblea extraordinaria', 'fecha' => '11 de agosto de 2025', 'cargos' => 26],
        ['titulo' => '2° Asamblea extraordinaria', 'fecha' => '14 de octubre de 2025', 'cargos' => 6],
        ['titulo' => '3° Asamblea extraordinaria', 'fecha' => '17 de octubre de 2025 (Antofagasta de la Sierra)', 'cargos' => 15],
        ['titulo' => '4° Asamblea extraordinaria', 'fecha' => '24 de octubre de 2025 (cabecera 0)', 'cargos' => 18],
    ];

    $superiorLlamados = [
        ['titulo' => '1º llamado', 'fecha' => '24 de junio de 2025', 'cargos' => 187],
        ['titulo' => '2º llamado', 'fecha' => '30 de junio / 08 de julio', 'cargos' => 392],
        ['titulo' => '3º llamado', 'fecha' => '15 de septiembre de 2025', 'cargos' => 111],
        ['titulo' => '4º llamado', 'fecha' => '19 de septiembre de 2025', 'cargos' => 165],
        ['titulo' => '5º llamado', 'fecha' => '11 de noviembre de 2025', 'cargos' => 119],
    ];

    $iesParticipantes = [
        'IES Andalgalá', 'IES Belén', 'IES Capayán', 'IES Chavarría', 
        'IES Clara J. Armstrong', 'IES Corpacci', 'IES Fiambalá', 
        'IES José Cubas', 'IES Maldones', 'IES Pomán', 'IES Recreo', 
        'IES Santa María', 'IES Santa Rosa', 'IES Tinogasta', 'ISAC', 
        'ISEF', 'ISTI',
    ];

    $totalInicialOrd = collect($inicialOrdinarias)->sum('cargos');
    $totalInicialExt = collect($inicialExtra)->sum('cargos');
    $totalInicial    = $totalInicialOrd + $totalInicialExt;

    $totalSecOrd = collect($secundarioOrdinarias)->sum('cargos');
    $totalSecExt = collect($secundarioExtra)->sum('cargos');
    $totalSec    = $totalSecOrd + $totalSecExt;

    $totalSup    = collect($superiorLlamados)->sum('cargos');
    $totalGeneral = $totalInicial + $totalSec + $totalSup;

    $eventosInicial = count($inicialOrdinarias) + count($inicialExtra);
    $eventosSec     = count($secundarioOrdinarias) + count($secundarioExtra);
    $eventosSup     = count($superiorLlamados);
    $eventosTotal   = $eventosInicial + $eventosSec + $eventosSup;

    $promInicial = round($totalInicial / max($eventosInicial, 1));
    $promSec     = round($totalSec / max($eventosSec, 1));
    $promSup     = round($totalSup / max($eventosSup, 1));

    $maxInicial = collect(array_merge($inicialOrdinarias, $inicialExtra))->sortByDesc('cargos')->first();
    $maxSec     = collect(array_merge($secundarioOrdinarias, $secundarioExtra))->sortByDesc('cargos')->first();
    $maxSup     = collect($superiorLlamados)->sortByDesc('cargos')->first();

    $porcInicial = $totalGeneral > 0 ? ($totalInicial / $totalGeneral) * 100 : 0;
    $porcSec     = $totalGeneral > 0 ? ($totalSec / $totalGeneral) * 100 : 0;
    $porcSup     = $totalGeneral > 0 ? ($totalSup / $totalGeneral) * 100 : 0;
    
    $distribucionSuperior = [
        ['ies' => 'Andalgalá', 'cargos' => 11+47+12+1+7],
        ['ies' => 'Belén', 'cargos' => 9+57+12+15+7],
        ['ies' => 'Capayán', 'cargos' => 15+28+0+7+0],
        ['ies' => 'Chavarría', 'cargos' => 9+0+0+23+18],
        ['ies' => 'Clara J. Armstrong', 'cargos' => 8+0+1+8+5],
        ['ies' => 'Corpacci', 'cargos' => 0+0+4+4+0],
        ['ies' => 'Fiambalá', 'cargos' => 8+33+2+0+6],
        ['ies' => 'José Cubas', 'cargos' => 18+8+3+11+9],
        ['ies' => 'Maldones', 'cargos' => 16+36+21+15+6],
        ['ies' => 'Pomán', 'cargos' => 22+46+12+22+2],
        ['ies' => 'Recreo', 'cargos' => 25+27+12+0+33],
        ['ies' => 'Santa María', 'cargos' => 4+48+21+6+3],
        ['ies' => 'Santa Rosa', 'cargos' => 4+32+6+13+4],
        ['ies' => 'Tinogasta', 'cargos' => 25+30+5+15+2],
        ['ies' => 'ISAC', 'cargos' => 4+0+0+21+10],
        ['ies' => 'ISEF', 'cargos' => 3+0+0+0+2],
        ['ies' => 'ISTI', 'cargos' => 6+0+0+4+5],
    ];
@endphp

<style>
    /* Estilos base - sin reset global */
    .stats-shell {
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    /* Hero Section */
    .stats-hero {
        background: linear-gradient(135deg, #ffffff, #f8fafc);
        border: 1px solid #e2e8f0;
        border-radius: 1rem;
        padding: 1.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        border-left: 4px solid #3b82f6;
    }

    .stats-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.25rem 1rem;
        background: #dbeafe;
        border-radius: 2rem;
        font-size: 0.7rem;
        font-weight: 600;
        color: #1e40af;
        margin-bottom: 1rem;
        border: 1px solid #bfdbfe;
    }

    .badge-dot {
        width: 0.4rem;
        height: 0.4rem;
        background: #2563eb;
        border-radius: 50%;
        box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
    }

    .stats-hero-subtitle {
        font-size: 0.85rem;
        color: #475569;
        line-height: 1.5;
        margin-bottom: 1rem;
        max-width: 800px;
    }

    /* Botón de resumen */
    .resumen-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.6rem 1.2rem;
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        border: none;
        border-radius: 0.5rem;
        font-size: 0.8rem;
        font-weight: 500;
        color: white;
        cursor: pointer;
        transition: all 0.15s ease;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);
        border: 1px solid #3b82f6;
    }

    .resumen-btn:hover {
        background: linear-gradient(135deg, #1d4ed8, #1e40af);
        transform: translateY(-1px);
        box-shadow: 0 6px 10px -1px rgba(37, 99, 235, 0.3);
    }

    /* Métricas principales - Responsive grid */
    .hero-metrics {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.75rem;
    }

    @media (min-width: 640px) {
        .hero-metrics {
            grid-template-columns: repeat(4, 1fr);
        }
    }

    .hero-metric {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 0.75rem;
        padding: 1rem;
        transition: all 0.15s ease;
        border-bottom: 3px solid transparent;
        box-shadow: 0 2px 4px rgba(0,0,0,0.02);
    }

    .hero-metric:nth-child(1) {
        border-bottom-color: #3b82f6;
        background: linear-gradient(135deg, #ffffff, #eff6ff);
    }
    .hero-metric:nth-child(2) {
        border-bottom-color: #8b5cf6;
        background: linear-gradient(135deg, #ffffff, #f5f3ff);
    }
    .hero-metric:nth-child(3) {
        border-bottom-color: #10b981;
        background: linear-gradient(135deg, #ffffff, #ecfdf5);
    }
    .hero-metric:nth-child(4) {
        border-bottom-color: #f59e0b;
        background: linear-gradient(135deg, #ffffff, #fffbeb);
    }

    .hero-metric:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 12px -4px rgba(0,0,0,0.1);
    }

    .metric-value {
        font-size: clamp(1.2rem, 4vw, 1.6rem);
        font-weight: 700;
        color: #0f172a;
        line-height: 1.2;
        margin-bottom: 0.2rem;
    }

    .metric-label {
        font-size: clamp(0.6rem, 2vw, 0.7rem);
        font-weight: 600;
        color: #475569;
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }

    .metric-footnote {
        font-size: 0.6rem;
        color: #64748b;
        margin-top: 0.2rem;
        font-weight: 500;
    }

    /* Grid principal - Responsive */
    .dashboard-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    @media (min-width: 1024px) {
        .dashboard-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    /* Cards */
    .card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 1rem;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        transition: all 0.15s ease;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    }

    .card:nth-child(1) {
        border-top: 4px solid #3b82f6;
    }
    .card:nth-child(2) {
        border-top: 4px solid #8b5cf6;
    }
    .card:nth-child(3) {
        border-top: 4px solid #10b981;
    }

    .card:hover {
        border-color: #94a3b8;
        box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
    }

    .card-header {
        padding: 1rem 1.25rem 0.5rem;
        border-bottom: 2px solid #f1f5f9;
        background: #f8fafc;
    }

    .card-title {
        font-size: 1rem;
        font-weight: 700;
        color: #0f172a;
        display: flex;
        align-items: center;
        gap: 0.4rem;
        flex-wrap: wrap;
        margin-bottom: 0.2rem;
    }

    .title-icon {
        font-size: 1.2rem;
    }

    .card-subtitle {
        font-size: 0.7rem;
        color: #64748b;
        font-weight: 500;
        margin-left: 1.6rem;
    }

    .card-body {
        padding: 1rem 1.25rem;
        flex: 1;
        overflow-y: auto;
        max-height: 500px;
        scrollbar-width: thin;
        scrollbar-color: #94a3b8 #e2e8f0;
        background: #ffffff;
    }

    .card-body::-webkit-scrollbar {
        width: 4px;
    }

    .card-body::-webkit-scrollbar-track {
        background: #f1f5f9;
    }

    .card-body::-webkit-scrollbar-thumb {
        background: #94a3b8;
        border-radius: 4px;
    }

    /* KPIs pequeños - Responsive */
    .kpi-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.5rem;
        margin-bottom: 1rem;
    }

    @media (min-width: 480px) {
        .kpi-grid {
            grid-template-columns: repeat(4, 1fr);
        }
    }

    .kpi-item {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 0.5rem;
        padding: 0.75rem 0.5rem;
        text-align: center;
        transition: all 0.15s ease;
        border-bottom: 2px solid transparent;
    }

    .kpi-item:hover {
        border-bottom-color: #3b82f6;
        background: #ffffff;
        transform: scale(1.02);
    }

    .kpi-number {
        font-size: clamp(0.9rem, 3vw, 1.2rem);
        font-weight: 700;
        color: #0f172a;
        line-height: 1.2;
        margin-bottom: 0.1rem;
    }

    .kpi-label {
        font-size: 0.6rem;
        font-weight: 600;
        color: #475569;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    /* Separadores */
    .section-divider {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin: 0.75rem 0;
        color: #475569;
        font-size: 0.65rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }

    .divider-line {
        flex: 1;
        height: 2px;
        background: linear-gradient(90deg, #e2e8f0, #94a3b8, #e2e8f0);
    }

    .divider-icon {
        font-size: 0.9rem;
    }

    /* Items de asamblea */
    .asamblea-item {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 0.5rem;
        padding: 0.75rem;
        margin-bottom: 0.5rem;
        transition: all 0.15s ease;
        border-left: 3px solid transparent;
    }

    .asamblea-item:hover {
        border-left-color: #3b82f6;
        background: #ffffff;
        transform: translateX(2px);
        box-shadow: 0 4px 8px -2px rgba(0,0,0,0.1);
    }

    .asamblea-header {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.3rem;
    }

    .asamblea-titulo {
        font-size: 0.8rem;
        font-weight: 600;
        color: #1e293b;
    }

    .asamblea-cargos {
        font-size: 0.75rem;
        font-weight: 700;
        color: #2563eb;
        background: #dbeafe;
        padding: 0.2rem 0.6rem;
        border-radius: 1rem;
        border: 1px solid #bfdbfe;
        white-space: nowrap;
    }

    .asamblea-fecha {
        font-size: 0.65rem;
        color: #64748b;
        display: flex;
        align-items: center;
        gap: 0.2rem;
        margin-bottom: 0.4rem;
        font-weight: 500;
        word-break: break-word;
    }

    .progress-bar {
        width: 100%;
        height: 0.3rem;
        background: #e2e8f0;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: inset 0 1px 2px rgba(0,0,0,0.05);
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #3b82f6, #2563eb);
        border-radius: 1rem;
        transition: width 0.3s ease;
        box-shadow: 0 0 0 1px rgba(37, 99, 235, 0.2);
    }

    /* Insight card */
    .insight-card {
        background: #f0f9ff;
        border: 1px solid #bae6fd;
        border-radius: 0.5rem;
        padding: 0.75rem;
        margin: 0.75rem 0;
        border-left: 4px solid #0284c7;
        box-shadow: 0 2px 4px rgba(2, 132, 199, 0.1);
    }

    .insight-title {
        font-size: 0.7rem;
        font-weight: 700;
        color: #0369a1;
        margin-bottom: 0.3rem;
        display: flex;
        align-items: center;
        gap: 0.3rem;
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }

    .insight-content {
        font-size: 0.8rem;
        color: #0c4a6e;
        font-weight: 500;
    }

    .insight-content strong {
        color: #0284c7;
        font-weight: 700;
        background: #e0f2fe;
        padding: 0.1rem 0.3rem;
        border-radius: 0.2rem;
    }

    /* Distribución */
    .distribution-card {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 0.5rem;
        padding: 0.75rem;
        margin-bottom: 1rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.02);
    }

    .distribution-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.5rem;
        flex-wrap: wrap;
    }

    .distribution-label {
        width: 70px;
        font-size: 0.7rem;
        font-weight: 600;
        color: #1e293b;
    }

    .distribution-bar {
        flex: 1;
        min-width: 100px;
        height: 0.4rem;
        background: #e2e8f0;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: inset 0 1px 2px rgba(0,0,0,0.05);
    }

    .distribution-fill {
        height: 100%;
        background: linear-gradient(90deg, #3b82f6, #2563eb);
        border-radius: 1rem;
        transition: width 0.3s ease;
        box-shadow: 0 0 0 1px rgba(37, 99, 235, 0.2);
    }

    .distribution-value {
        min-width: 3rem;
        text-align: right;
        font-size: 0.7rem;
        font-weight: 700;
        color: #2563eb;
        background: #dbeafe;
        padding: 0.1rem 0.3rem;
        border-radius: 0.2rem;
    }

    /* Tabla de institutos - Responsive */
    .institutos-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 0.5rem;
        margin-top: 0.5rem;
    }

    @media (min-width: 480px) {
        .institutos-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    .instituto-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.4rem 0.5rem;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 0.4rem;
        font-size: 0.75rem;
        transition: all 0.15s ease;
        border-left: 3px solid #3b82f6;
    }

    .instituto-item:hover {
        background: #ffffff;
        transform: translateX(2px);
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .instituto-nombre {
        color: #1e293b;
        font-weight: 500;
    }

    .instituto-cargos {
        font-weight: 700;
        color: #2563eb;
        background: #dbeafe;
        padding: 0.15rem 0.5rem;
        border-radius: 1rem;
        font-size: 0.65rem;
        border: 1px solid #bfdbfe;
    }

    /* Llamados superior - Responsive */
    .llamados-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.4rem;
        margin: 0.75rem 0;
    }

    @media (min-width: 480px) {
        .llamados-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (min-width: 640px) {
        .llamados-grid {
            grid-template-columns: repeat(5, 1fr);
        }
    }

    .llamado-item {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 0.4rem;
        padding: 0.5rem 0.2rem;
        text-align: center;
        transition: all 0.15s ease;
        border-bottom: 3px solid #10b981;
    }

    .llamado-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.2);
    }

    .llamado-cargos {
        font-size: 0.9rem;
        font-weight: 700;
        color: #065f46;
    }

    .llamado-titulo {
        font-size: 0.55rem;
        color: #047857;
        font-weight: 600;
        margin-top: 0.1rem;
    }

    /* Support grid - Responsive */
    .support-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    @media (min-width: 768px) {
        .support-grid {
            grid-template-columns: 1.5fr 1fr;
        }
    }

    .support-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 1rem;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
    }

    .support-card:first-child {
        border-left: 4px solid #8b5cf6;
    }
    .support-card:last-child {
        border-left: 4px solid #f59e0b;
    }

    .support-header {
        padding: 1rem 1.25rem;
        border-bottom: 2px solid #f1f5f9;
        background: #f8fafc;
    }

    .support-title {
        font-size: 0.9rem;
        font-weight: 700;
        color: #0f172a;
        display: flex;
        align-items: center;
        gap: 0.4rem;
    }

    .support-body {
        padding: 1rem 1.25rem;
        flex: 1;
        overflow-y: auto;
        max-height: 300px;
        background: #ffffff;
    }

    /* Modal - Responsive */
    .modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(4px);
        z-index: 1000;
        align-items: center;
        justify-content: center;
        padding: 1rem;
    }

    .modal-overlay.active {
        display: flex;
    }

    .modal-content {
        background: #ffffff;
        border-radius: 1rem;
        max-width: 800px;
        width: 100%;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        animation: modalFade 0.2s ease-out;
        border: 1px solid #e2e8f0;
    }

    @keyframes modalFade {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }

    .modal-header {
        padding: 1.25rem 1.5rem;
        border-bottom: 2px solid #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: sticky;
        top: 0;
        background: linear-gradient(135deg, #f8fafc, #ffffff);
        z-index: 10;
        border-left: 4px solid #3b82f6;
    }

    .modal-header h2 {
        font-size: 1.1rem;
        font-weight: 700;
        color: #0f172a;
    }

    .modal-close {
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
        font-size: 1.2rem;
        cursor: pointer;
        color: #475569;
        transition: all 0.15s ease;
        line-height: 1;
        width: 2rem;
        height: 2rem;
        border-radius: 0.4rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-close:hover {
        background: #e2e8f0;
        color: #0f172a;
        transform: scale(1.1);
    }

    .modal-body {
        padding: 1.5rem;
    }

    .modal-section {
        margin-bottom: 1.5rem;
    }

    .modal-section-title {
        font-size: 0.9rem;
        font-weight: 700;
        color: #0f172a;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #e2e8f0;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.4rem;
    }

    .modal-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    @media (min-width: 640px) {
        .modal-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    .modal-stat {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 0.5rem;
        padding: 0.75rem;
        border-left: 3px solid #3b82f6;
    }

    .modal-stat-label {
        font-size: 0.7rem;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        margin-bottom: 0.25rem;
        font-weight: 600;
    }

    .modal-stat-value {
        font-size: 1rem;
        font-weight: 700;
        color: #0f172a;
    }

    .modal-list {
        list-style: none;
        padding: 0;
    }

    .modal-list-item {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 0.5rem 0;
        border-bottom: 1px solid #f1f5f9;
        font-size: 0.85rem;
        gap: 0.5rem;
    }

    .modal-list-item:last-child {
        border-bottom: none;
    }

    .modal-list-label {
        color: #475569;
        font-weight: 500;
    }

    .modal-list-value {
        font-weight: 700;
        color: #2563eb;
        background: #dbeafe;
        padding: 0.1rem 0.5rem;
        border-radius: 1rem;
        font-size: 0.8rem;
    }

    .modal-highlight {
        background: #f0f9ff;
        border: 1px solid #bae6fd;
        border-radius: 0.5rem;
        padding: 1rem;
        margin-top: 1rem;
        border-left: 4px solid #0284c7;
    }

    .modal-highlight p {
        margin-bottom: 0.5rem;
        font-size: 0.85rem;
        color: #0c4a6e;
        font-weight: 500;
    }

    .modal-highlight strong {
        color: #0284c7;
        font-weight: 700;
        background: #e0f2fe;
        padding: 0.1rem 0.3rem;
        border-radius: 0.2rem;
    }

    /* Utilidades adicionales */
    .w-full {
        width: 100%;
    }

    .text-sm {
        font-size: 0.875rem;
    }

    .font-semibold {
        font-weight: 600;
    }

    .mb-0 {
        margin-bottom: 0;
    }
</style>

<div class="stats-shell">
    <!-- Hero Section -->
    <div class="stats-hero">
        <div class="stats-hero-badge">
            <span class="badge-dot"></span>
            <span>📊 Estadísticas 2025 · Datos oficiales</span>
        </div>
        
        <div class="stats-hero-subtitle">
            Síntesis anual de la cobertura por nivel educativo, organizada por asambleas ordinarias, 
            extraordinarias y llamados de cobertura.
        </div>

        <!-- Botón de resumen -->
        <button class="resumen-btn" onclick="document.getElementById('modalResumen').classList.add('active')">
            <span>📋</span>
            Ver resumen completo de datos
        </button>

        <div class="hero-metrics">
            <div class="hero-metric">
                <div class="metric-value">{{ number_format($totalInicial, 0, ',', '.') }}</div>
                <div class="metric-label">Inicial · Primario</div>
                <div class="metric-footnote">{{ $eventosInicial }} asambleas</div>
            </div>
            <div class="hero-metric">
                <div class="metric-value">{{ number_format($totalSec, 0, ',', '.') }}</div>
                <div class="metric-label">Secundario</div>
                <div class="metric-footnote">{{ $eventosSec }} asambleas</div>
            </div>
            <div class="hero-metric">
                <div class="metric-value">{{ number_format($totalSup, 0, ',', '.') }}</div>
                <div class="metric-label">Superior</div>
                <div class="metric-footnote">{{ $eventosSup }} llamados</div>
            </div>
            <div class="hero-metric">
                <div class="metric-value">{{ number_format($totalGeneral, 0, ',', '.') }}</div>
                <div class="metric-label">Total General</div>
                <div class="metric-footnote">{{ $eventosTotal }} eventos</div>
            </div>
        </div>
    </div>

    <!-- Grid Principal -->
    <div class="dashboard-grid">
        <!-- Inicial / Primario -->
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <span class="title-icon">📘</span>
                    Inicial · Primario · Especial
                </div>
                <div class="card-subtitle">{{ $eventosInicial }} asambleas · {{ number_format($totalInicial, 0, ',', '.') }} cargos</div>
            </div>
            <div class="card-body">
                <div class="kpi-grid">
                    <div class="kpi-item">
                        <div class="kpi-number">{{ number_format($totalInicialOrd, 0, ',', '.') }}</div>
                        <div class="kpi-label">Ordinarias</div>
                    </div>
                    <div class="kpi-item">
                        <div class="kpi-number">{{ number_format($totalInicialExt, 0, ',', '.') }}</div>
                        <div class="kpi-label">Extraord.</div>
                    </div>
                    <div class="kpi-item">
                        <div class="kpi-number">{{ $eventosInicial }}</div>
                        <div class="kpi-label">Eventos</div>
                    </div>
                    <div class="kpi-item">
                        <div class="kpi-number">{{ $promInicial }}</div>
                        <div class="kpi-label">Promedio</div>
                    </div>
                </div>

                <div class="insight-card">
                    <div class="insight-title">
                        <span>🔥</span> Mayor cobertura
                    </div>
                    <div class="insight-content">
                        <strong>{{ $maxInicial['titulo'] }}</strong> · {{ $maxInicial['fecha'] }} · 
                        <strong>{{ number_format($maxInicial['cargos'], 0, ',', '.') }} cargos</strong>
                    </div>
                </div>

                <!-- Ordinarias -->
                <div class="section-divider">
                    <span class="divider-icon">📋</span>
                    <span>Asambleas Ordinarias</span>
                    <span class="divider-line"></span>
                </div>
                
                @foreach ($inicialOrdinarias as $item)
                    @php $percent = $maxInicial['cargos'] > 0 ? ($item['cargos'] / $maxInicial['cargos']) * 100 : 0; @endphp
                    <div class="asamblea-item">
                        <div class="asamblea-header">
                            <span class="asamblea-titulo">{{ $item['titulo'] }}</span>
                            <span class="asamblea-cargos">{{ number_format($item['cargos'], 0, ',', '.') }}</span>
                        </div>
                        <div class="asamblea-fecha">📅 {{ $item['fecha'] }}</div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: {{ $percent }}%;"></div>
                        </div>
                    </div>
                @endforeach

                <!-- Extraordinarias -->
                <div class="section-divider" style="margin-top: 0.75rem;">
                    <span class="divider-icon">⚡</span>
                    <span>Asambleas Extraordinarias</span>
                    <span class="divider-line"></span>
                </div>
                
                @foreach ($inicialExtra as $item)
                    @php $percent = $maxInicial['cargos'] > 0 ? ($item['cargos'] / $maxInicial['cargos']) * 100 : 0; @endphp
                    <div class="asamblea-item">
                        <div class="asamblea-header">
                            <span class="asamblea-titulo">{{ $item['titulo'] }}</span>
                            <span class="asamblea-cargos">{{ number_format($item['cargos'], 0, ',', '.') }}</span>
                        </div>
                        <div class="asamblea-fecha">📅 {{ $item['fecha'] }}</div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: {{ $percent }}%;"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Secundario -->
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <span class="title-icon">📗</span>
                    Secundario y Modalidades
                </div>
                <div class="card-subtitle">{{ $eventosSec }} asambleas · {{ number_format($totalSec, 0, ',', '.') }} cargos</div>
            </div>
            <div class="card-body">
                <div class="kpi-grid">
                    <div class="kpi-item">
                        <div class="kpi-number">{{ number_format($totalSecOrd, 0, ',', '.') }}</div>
                        <div class="kpi-label">Ordinarias</div>
                    </div>
                    <div class="kpi-item">
                        <div class="kpi-number">{{ number_format($totalSecExt, 0, ',', '.') }}</div>
                        <div class="kpi-label">Extraord.</div>
                    </div>
                    <div class="kpi-item">
                        <div class="kpi-number">{{ $eventosSec }}</div>
                        <div class="kpi-label">Eventos</div>
                    </div>
                    <div class="kpi-item">
                        <div class="kpi-number">{{ $promSec }}</div>
                        <div class="kpi-label">Promedio</div>
                    </div>
                </div>

                <div class="insight-card">
                    <div class="insight-title">
                        <span>🔥</span> Mayor cobertura
                    </div>
                    <div class="insight-content">
                        <strong>{{ $maxSec['titulo'] }}</strong> · {{ $maxSec['fecha'] }} · 
                        <strong>{{ number_format($maxSec['cargos'], 0, ',', '.') }} cargos</strong>
                    </div>
                </div>

                <!-- Ordinarias -->
                <div class="section-divider">
                    <span class="divider-icon">📋</span>
                    <span>Asambleas Ordinarias</span>
                    <span class="divider-line"></span>
                </div>
                
                @foreach ($secundarioOrdinarias as $item)
                    @php $percent = $maxSec['cargos'] > 0 ? ($item['cargos'] / $maxSec['cargos']) * 100 : 0; @endphp
                    <div class="asamblea-item">
                        <div class="asamblea-header">
                            <span class="asamblea-titulo">{{ $item['titulo'] }}</span>
                            <span class="asamblea-cargos">{{ number_format($item['cargos'], 0, ',', '.') }}</span>
                        </div>
                        <div class="asamblea-fecha">📅 {{ $item['fecha'] }}</div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: {{ $percent }}%;"></div>
                        </div>
                    </div>
                @endforeach

                <!-- Extraordinarias -->
                <div class="section-divider" style="margin-top: 0.75rem;">
                    <span class="divider-icon">⚡</span>
                    <span>Asambleas Extraordinarias</span>
                    <span class="divider-line"></span>
                </div>
                
                @foreach ($secundarioExtra as $item)
                    @php $percent = $maxSec['cargos'] > 0 ? ($item['cargos'] / $maxSec['cargos']) * 100 : 0; @endphp
                    <div class="asamblea-item">
                        <div class="asamblea-header">
                            <span class="asamblea-titulo">{{ $item['titulo'] }}</span>
                            <span class="asamblea-cargos">{{ number_format($item['cargos'], 0, ',', '.') }}</span>
                        </div>
                        <div class="asamblea-fecha">📅 {{ $item['fecha'] }}</div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: {{ $percent }}%;"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Distribución y Superior -->
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <span class="title-icon">📊</span>
                    Distribución y Nivel Superior
                </div>
                <div class="card-subtitle">Participación por nivel y llamados</div>
            </div>
            <div class="card-body">
                <div class="distribution-card">
                    <div class="distribution-item">
                        <span class="distribution-label">Inicial</span>
                        <div class="distribution-bar">
                            <div class="distribution-fill" style="width: {{ $porcInicial }}%;"></div>
                        </div>
                        <span class="distribution-value">{{ number_format($porcInicial, 1) }}%</span>
                    </div>
                    <div class="distribution-item">
                        <span class="distribution-label">Secundario</span>
                        <div class="distribution-bar">
                            <div class="distribution-fill" style="width: {{ $porcSec }}%;"></div>
                        </div>
                        <span class="distribution-value">{{ number_format($porcSec, 1) }}%</span>
                    </div>
                    <div class="distribution-item">
                        <span class="distribution-label">Superior</span>
                        <div class="distribution-bar">
                            <div class="distribution-fill" style="width: {{ $porcSup }}%;"></div>
                        </div>
                        <span class="distribution-value">{{ number_format($porcSup, 1) }}%</span>
                    </div>
                </div>

                <div class="kpi-grid">
                    <div class="kpi-item">
                        <div class="kpi-number">{{ $eventosTotal }}</div>
                        <div class="kpi-label">Eventos</div>
                    </div>
                    <div class="kpi-item">
                        <div class="kpi-number">{{ count($iesParticipantes) }}</div>
                        <div class="kpi-label">Institutos</div>
                    </div>
                    <div class="kpi-item">
                        <div class="kpi-number">{{ $promSup }}</div>
                        <div class="kpi-label">Prom. Sup.</div>
                    </div>
                    <div class="kpi-item">
                        <div class="kpi-number">{{ number_format($totalGeneral / max($eventosTotal, 1), 0, ',', '.') }}</div>
                        <div class="kpi-label">Prom. Gral.</div>
                    </div>
                </div>

                <div class="section-divider">
                    <span class="divider-icon">🏛️</span>
                    <span>Llamados Nivel Superior</span>
                    <span class="divider-line"></span>
                </div>

                <div class="llamados-grid">
                    @foreach ($superiorLlamados as $item)
                    <div class="llamado-item">
                        <div class="llamado-cargos">{{ number_format($item['cargos'], 0, ',', '.') }}</div>
                        <div class="llamado-titulo">{{ $item['titulo'] }}</div>
                    </div>
                    @endforeach
                </div>

                <div class="insight-card">
                    <div class="insight-title">
                        <span>📌</span> Análisis ejecutivo
                    </div>
                    <div class="insight-content">
                        <strong>Secundario</strong> concentra el {{ number_format($porcSec, 1) }}% del total
                        (<strong>{{ number_format($totalSec, 0, ',', '.') }}</strong> cargos), seguido por 
                        <strong>Superior</strong> ({{ number_format($porcSup, 1) }}%) e 
                        <strong>Inicial</strong> ({{ number_format($porcInicial, 1) }}%).
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Grid Soporte - Institutos con sus cargos -->
    <div class="support-grid">
        <div class="support-card">
            <div class="support-header">
                <div class="support-title">
                    <span class="title-icon">🏛️</span>
                    Institutos Superiores · Distribución de cargos
                </div>
            </div>
            <div class="support-body">
                <div class="institutos-grid">
                    @foreach ($distribucionSuperior as $instituto)
                    <div class="instituto-item">
                        <span class="instituto-nombre">{{ $instituto['ies'] }}</span>
                        <span class="instituto-cargos">{{ number_format($instituto['cargos'], 0, ',', '.') }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="support-card">
            <div class="support-header">
                <div class="support-title">
                    <span class="title-icon">📋</span>
                    Resumen General
                </div>
            </div>
            <div class="support-body">
                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 2px solid #e2e8f0;">
                        <span style="font-size: 0.8rem; color: #475569; font-weight: 600;">Total cargos</span>
                        <span style="font-weight: 700; color: #2563eb;">{{ number_format($totalGeneral, 0, ',', '.') }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid #e2e8f0;">
                        <span style="font-size: 0.8rem; color: #475569;">Eventos totales</span>
                        <span style="font-weight: 600;">{{ $eventosTotal }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid #e2e8f0;">
                        <span style="font-size: 0.8rem; color: #475569;">Institutos participantes</span>
                        <span style="font-weight: 600;">{{ count($iesParticipantes) }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 0.5rem 0;">
                        <span style="font-size: 0.8rem; color: #475569;">Promedio por evento</span>
                        <span style="font-weight: 700; color: #2563eb;">{{ number_format($totalGeneral / max($eventosTotal, 1), 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Resumen -->
    <div id="modalResumen" class="modal-overlay" onclick="if(event.target === this) this.classList.remove('active')">
        <div class="modal-content">
            <div class="modal-header">
                <h2>📋 Resumen completo de cobertura 2025</h2>
                <button class="modal-close" onclick="document.getElementById('modalResumen').classList.remove('active')">×</button>
            </div>
            <div class="modal-body">
                <!-- Totales Generales -->
                <div class="modal-section">
                    <div class="modal-section-title">
                        <span>📊</span> Totales Generales
                    </div>
                    <div class="modal-grid">
                        <div class="modal-stat">
                            <div class="modal-stat-label">Total cargos</div>
                            <div class="modal-stat-value">{{ number_format($totalGeneral, 0, ',', '.') }}</div>
                        </div>
                        <div class="modal-stat">
                            <div class="modal-stat-label">Eventos totales</div>
                            <div class="modal-stat-value">{{ $eventosTotal }}</div>
                        </div>
                        <div class="modal-stat">
                            <div class="modal-stat-label">Promedio por evento</div>
                            <div class="modal-stat-value">{{ number_format($totalGeneral / max($eventosTotal, 1), 0, ',', '.') }}</div>
                        </div>
                        <div class="modal-stat">
                            <div class="modal-stat-label">Institutos superiores</div>
                            <div class="modal-stat-value">{{ count($iesParticipantes) }}</div>
                        </div>
                    </div>
                </div>

                <!-- Por nivel -->
                <div class="modal-section">
                    <div class="modal-section-title">
                        <span>📚</span> Distribución por Nivel
                    </div>
                    <div class="modal-grid">
                        <div class="modal-stat">
                            <div class="modal-stat-label">Inicial / Primario</div>
                            <div class="modal-stat-value">{{ number_format($totalInicial, 0, ',', '.') }}</div>
                            <div style="font-size: 0.7rem; color: #2563eb; font-weight: 600; margin-top: 0.2rem;">{{ number_format($porcInicial, 1) }}% · {{ $eventosInicial }} asambleas</div>
                        </div>
                        <div class="modal-stat">
                            <div class="modal-stat-label">Secundario</div>
                            <div class="modal-stat-value">{{ number_format($totalSec, 0, ',', '.') }}</div>
                            <div style="font-size: 0.7rem; color: #2563eb; font-weight: 600; margin-top: 0.2rem;">{{ number_format($porcSec, 1) }}% · {{ $eventosSec }} asambleas</div>
                        </div>
                        <div class="modal-stat">
                            <div class="modal-stat-label">Superior</div>
                            <div class="modal-stat-value">{{ number_format($totalSup, 0, ',', '.') }}</div>
                            <div style="font-size: 0.7rem; color: #2563eb; font-weight: 600; margin-top: 0.2rem;">{{ number_format($porcSup, 1) }}% · {{ $eventosSup }} llamados</div>
                        </div>
                    </div>
                </div>

                <!-- Inicial / Primario -->
                <div class="modal-section">
                    <div class="modal-section-title">
                        <span>🎓</span> Inicial / Primario / Especial
                    </div>
                    <ul class="modal-list">
                        <li class="modal-list-item">
                            <span class="modal-list-label">Asambleas ordinarias</span>
                            <span class="modal-list-value">{{ $eventosInicial - count($inicialExtra) }} · {{ number_format($totalInicialOrd, 0, ',', '.') }}</span>
                        </li>
                        <li class="modal-list-item">
                            <span class="modal-list-label">Asambleas extraordinarias</span>
                            <span class="modal-list-value">{{ count($inicialExtra) }} · {{ number_format($totalInicialExt, 0, ',', '.') }}</span>
                        </li>
                        <li class="modal-list-item">
                            <span class="modal-list-label">Mayor cobertura</span>
                            <span class="modal-list-value">{{ $maxInicial['titulo'] }} · {{ number_format($maxInicial['cargos'], 0, ',', '.') }}</span>
                        </li>
                        <li class="modal-list-item">
                            <span class="modal-list-label">Promedio por asamblea</span>
                            <span class="modal-list-value">{{ $promInicial }} cargos</span>
                        </li>
                    </ul>
                </div>

                <!-- Secundario -->
                <div class="modal-section">
                    <div class="modal-section-title">
                        <span>📗</span> Secundario y Modalidades
                    </div>
                    <ul class="modal-list">
                        <li class="modal-list-item">
                            <span class="modal-list-label">Asambleas ordinarias</span>
                            <span class="modal-list-value">{{ $eventosSec - count($secundarioExtra) }} · {{ number_format($totalSecOrd, 0, ',', '.') }}</span>
                        </li>
                        <li class="modal-list-item">
                            <span class="modal-list-label">Asambleas extraordinarias</span>
                            <span class="modal-list-value">{{ count($secundarioExtra) }} · {{ number_format($totalSecExt, 0, ',', '.') }}</span>
                        </li>
                        <li class="modal-list-item">
                            <span class="modal-list-label">Mayor cobertura</span>
                            <span class="modal-list-value">{{ $maxSec['titulo'] }} · {{ number_format($maxSec['cargos'], 0, ',', '.') }}</span>
                        </li>
                        <li class="modal-list-item">
                            <span class="modal-list-label">Promedio por asamblea</span>
                            <span class="modal-list-value">{{ $promSec }} cargos</span>
                        </li>
                    </ul>
                </div>

                <!-- Superior -->
                <div class="modal-section">
                    <div class="modal-section-title">
                        <span>🏛️</span> Nivel Superior
                    </div>
                    <ul class="modal-list">
                        @foreach ($superiorLlamados as $item)
                        <li class="modal-list-item">
                            <span class="modal-list-label">{{ $item['titulo'] }} · {{ $item['fecha'] }}</span>
                            <span class="modal-list-value">{{ number_format($item['cargos'], 0, ',', '.') }}</span>
                        </li>
                        @endforeach
                        <li class="modal-list-item" style="border-top: 2px solid #e2e8f0; margin-top: 0.5rem; padding-top: 0.75rem;">
                            <span class="modal-list-label">Total superior</span>
                            <span class="modal-list-value">{{ number_format($totalSup, 0, ',', '.') }}</span>
                        </li>
                        <li class="modal-list-item">
                            <span class="modal-list-label">Promedio por llamado</span>
                            <span class="modal-list-value">{{ $promSup }} cargos</span>
                        </li>
                    </ul>
                </div>

                <!-- Institutos Superiores -->
                <div class="modal-section">
                    <div class="modal-section-title">
                        <span>🏫</span> Institutos Superiores
                    </div>
                    <div style="display: grid; grid-template-columns: repeat(1, 1fr); gap: 0.5rem;">
                        @foreach ($distribucionSuperior as $instituto)
                        <div style="display: flex; justify-content: space-between; padding: 0.3rem 0; border-bottom: 1px dashed #e2e8f0; font-size: 0.8rem;">
                            <span style="color: #475569;">{{ $instituto['ies'] }}</span>
                            <span style="font-weight: 700; color: #2563eb;">{{ number_format($instituto['cargos'], 0, ',', '.') }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Destacados -->
                <div class="modal-highlight">
                    <p><strong>📌 Dato destacado:</strong> El nivel <strong>Secundario</strong> concentra la mayor cantidad de cargos con <strong>{{ number_format($totalSec, 0, ',', '.') }}</strong> ({{ number_format($porcSec, 1) }}% del total).</p>
                    <p><strong>📌 Mayor cobertura:</strong> La <strong>{{ $maxSec['titulo'] }}</strong> de Secundario con <strong>{{ number_format($maxSec['cargos'], 0, ',', '.') }}</strong> cargos.</p>
                    <p><strong>📌 Participación:</strong> <strong>{{ count($iesParticipantes) }}</strong> institutos superiores participaron en los {{ $eventosSup }} llamados, totalizando <strong>{{ number_format($totalSup, 0, ',', '.') }}</strong> cargos.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Cerrar modal con tecla ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const modal = document.getElementById('modalResumen');
            if (modal) {
                modal.classList.remove('active');
            }
        }
    });

    // Cerrar modal al hacer click fuera del contenido
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('modalResumen');
        if (modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    this.classList.remove('active');
                }
            });
        }
    });
</script>