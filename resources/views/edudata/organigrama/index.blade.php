@extends('layouts.app')

@section('title', 'Organigrama Ministerial')

@section('content')
    <style>
        [x-cloak] {
            display: none !important;
        }

        .organigrama-container {
            max-width: 1440px;
            margin: 0 auto;
        }

        /* Cards mejoradas */
        .card-pro {
            background: linear-gradient(135deg, #ffffff 0%, #fcfdff 100%);
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            position: relative;
            overflow: hidden;
        }

        .card-pro:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(34, 42, 89, 0.08);
            border-color: #d1d5db;
        }

        .card-accent {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(180deg, var(--accent-color) 0%, var(--accent-color-light) 100%);
        }

        /* Badges mejorados */
        .role-badge {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            padding: 0.35rem 0.9rem;
            border-radius: 20px;
            background: var(--badge-bg);
            color: var(--badge-color);
            border: 1px solid var(--badge-border);
            display: inline-flex;
            align-items: center;
            text-transform: uppercase;
            backdrop-filter: blur(8px);
        }

        /* Photo improvements */
        .photo-wrap {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, 0.08);
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .photo-wrap:hover {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            transform: scale(1.02);
        }

        .photo-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .photo-wrap:hover .photo-img {
            transform: scale(1.05);
        }

        /* Secretaría sections */
        .sec-block {
            background: linear-gradient(180deg, #ffffff 0%, #fafcff 100%);
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .sec-block:hover {
            border-color: #d1d5db;
            box-shadow: 0 8px 32px rgba(34, 42, 89, 0.06);
        }

        .sec-head {
            background: linear-gradient(90deg, rgba(34, 42, 89, 0.03) 0%, rgba(255, 255, 255, 0) 100%);
            border-bottom: 1px solid #f1f5f9;
            padding: 1.5rem 2rem;
        }

        /* Typography improvements */
        .titular-nombre {
            font-weight: 700;
            background: linear-gradient(90deg, var(--name-color) 0%, var(--name-color-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ============================================= */
        /* FIXES Y MEJORAS DE COLOR PARA NOMBRES         */
        /* ============================================= */

        /* Actualizar colores para dirección */
        .role-direccion {
            --accent-color: #3b82f6;
            --accent-color-light: #60a5fa;
            --badge-bg: rgba(59, 130, 246, 0.12);
            --badge-color: #1d4ed8;
            --badge-border: rgba(59, 130, 246, 0.3);
            --name-color: #1e40af;
            --name-color-light: #3b82f6;
        }

        /* Nombres en tarjetas de dirección - con buen contraste */
        .role-direccion .titular-nombre {
            background: linear-gradient(90deg, #1e40af 0%, #3b82f6 100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
            color: #1e40af !important;
            font-weight: 700;
            text-shadow: 0 1px 2px rgba(255, 255, 255, 0.5);
        }

        /* Para textos sin gradiente (fallback) */
        .card-pro .nombre-director {
            color: #1e40af !important;
            font-weight: 700;
        }

        /* También ajustar el color del texto del área/cargo para mejor contraste */
        .role-direccion .text-gray-900 {
            color: #111827 !important;
        }

        /* Ajustar color de badge para dirección */
        .role-direccion .role-badge {
            background: rgba(59, 130, 246, 0.15) !important;
            color: #1e40af !important;
            border-color: rgba(59, 130, 246, 0.3) !important;
            font-weight: 700;
        }

        /* Mejorar contraste en toda la tarjeta */
        .role-direccion .text-gray-600,
        .role-direccion .text-gray-700 {
            color: #4b5563 !important;
        }

        /* Filter buttons */
        .filter-btn {
            padding: 0.6rem 1.25rem;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: 8px;
            border: 1.5px solid transparent;
            transition: all 0.2s ease;
            background: #ffffff;
        }

        .filter-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .filter-btn.active {
            border-color: currentColor;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        /* Modal improvements */
        .modal-shine {
            position: absolute;
            inset: 0;
            background: linear-gradient(120deg, transparent 0%, rgba(255, 255, 255, 0.2) 45%, transparent 70%);
            transform: translateX(-120%);
            animation: shine 1.6s ease-in-out 1;
            pointer-events: none;
        }

        @keyframes shine {
            0% {
                transform: translateX(-120%);
                opacity: 0;
            }

            20% {
                opacity: 0.6;
            }

            100% {
                transform: translateX(120%);
                opacity: 0;
            }
        }

        /* Search box */
        .search-box {
            background: linear-gradient(135deg, #ffffff 0%, #fafcff 100%);
            border: 1.5px solid #e5e7eb;
            border-radius: 12px;
            padding: 1rem 1.5rem;
            transition: all 0.3s ease;
        }

        .search-box:focus-within {
            border-color: var(--primary-500);
            box-shadow: 0 0 0 3px rgba(100, 161, 213, 0.15);
        }

        /* Stats badge */
        .stats-badge {
            background: linear-gradient(135deg, var(--primary-50) 0%, var(--primary-100) 100%);
            border: 1px solid var(--primary-200);
            border-radius: 10px;
            padding: 0.5rem 1rem;
            font-weight: 600;
            color: var(--primary-900);
        }

        /* Ministerio specific */
        .role-ministro {
            --accent-color: var(--primary-900);
            --accent-color-light: #2a3475;
            --badge-bg: rgba(34, 42, 89, 0.12);
            --badge-color: var(--primary-900);
            --badge-border: rgba(34, 42, 89, 0.2);
            --name-color: var(--primary-900);
            --name-color-light: #2a3475;
        }

        /* Secretaría specific */
        .role-secretaria {
            --accent-color: var(--primary-700);
            --accent-color-light: #405ca4;
            --badge-bg: rgba(64, 92, 164, 0.12);
            --badge-color: var(--primary-700);
            --badge-border: rgba(64, 92, 164, 0.2);
            --name-color: var(--primary-700);
            --name-color-light: #405ca4;
        }

        /* Email copy button */
        .email-copy-btn {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 0.4rem 0.8rem;
            font-size: 0.75rem;
            font-weight: 600;
            color: #4b5563;
            transition: all 0.2s ease;
        }

        .email-copy-btn:hover {
            background: linear-gradient(135deg, var(--primary-50) 0%, var(--primary-100) 100%);
            border-color: var(--primary-300);
            color: var(--primary-700);
            transform: translateY(-1px);
        }

        /* Section headers */
        .section-header {
            position: relative;
            padding-left: 1rem;
        }

        .section-header::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0.25rem;
            bottom: 0.25rem;
            width: 4px;
            border-radius: 2px;
            background: linear-gradient(180deg, currentColor 0%, color-mix(in srgb, currentColor, transparent 30%) 100%);
        }

        /* Grid improvements */
        .direcciones-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.5rem;
        }

        /* ============================================= */
        /* LOADING SIMPLE - Solo modificación del blade  */
        /* ============================================= */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: white;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.3s ease;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #3b82f6;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* ============================================= */
        /* MEJORAS PARA BOTÓN Y MODAL DE MISIÓN/FUNCIONES */
        /* ============================================= */
        .mf-btn {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            border: 1px solid #bae6fd;
            color: #0369a1;
            font-weight: 600;
            font-size: 0.75rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            cursor: pointer;
        }

        .mf-btn:hover {
            background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%);
            border-color: #7dd3fc;
            color: #075985;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(3, 105, 161, 0.15);
        }

        .mf-btn svg {
            width: 14px;
            height: 14px;
        }

        /* ============================================= */
        /* MODAL DE MISIÓN Y FUNCIONES - MEJORADO        */
        /* ============================================= */
        .mf-modal-container {
            max-height: 95vh;
            display: flex;
            flex-direction: column;
        }

        .mf-modal-header {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            padding: 1.75rem 2rem;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .mf-modal-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #60a5fa 0%, #93c5fd 50%, #60a5fa 100%);
        }

        .mf-modal-content {
            flex: 1;
            overflow-y: auto;
            padding: 2rem;
            max-height: calc(85vh - 180px);
        }

        .mf-modal-content::-webkit-scrollbar {
            width: 8px;
        }

        .mf-modal-content::-webkit-scrollbar-track {
            background: #f8fafc;
            border-radius: 4px;
        }

        .mf-modal-content::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        .mf-modal-content::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        .mf-section {
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
            transition: all 0.2s ease;
        }

        .mf-section:hover {
            border-color: #d1d5db;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
        }

        .mf-section:last-child {
            margin-bottom: 0;
        }

        .mf-title {
            color: #1e40af;
            font-weight: 700;
            margin-bottom: 1rem;
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .mf-title::before {
            content: '';
            display: block;
            width: 4px;
            height: 20px;
            background: linear-gradient(180deg, #3b82f6 0%, #60a5fa 100%);
            border-radius: 2px;
        }

        .mf-subtitle {
            color: #374151;
            font-weight: 600;
            margin-bottom: 0.75rem;
            font-size: 1rem;
            padding-left: 1rem;
            border-left: 3px solid #dbeafe;
        }

        .mf-list {
            list-style-type: none;
            padding-left: 0;
            margin: 0;
        }

        .mf-list li {
            position: relative;
            padding-left: 1.5rem;
            margin-bottom: 0.75rem;
            color: #4b5563;
            font-size: 0.9375rem;
            line-height: 1.6;
            display: flex;
            align-items: flex-start;
        }

        .mf-list li:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0.5rem;
            width: 6px;
            height: 6px;
            background: #3b82f6;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .mf-list-compact li {
            margin-bottom: 0.4rem;
            font-size: 0.875rem;
        }

        .mf-tabs {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 1rem;
        }

        .mf-tab {
            padding: 0.5rem 1.25rem;
            background: transparent;
            border: none;
            color: #6b7280;
            font-weight: 600;
            font-size: 0.875rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
        }

        .mf-tab:hover {
            background: #f3f4f6;
            color: #4b5563;
        }

        .mf-tab.active {
            background: #dbeafe;
            color: #1e40af;
        }

        .mf-tab.active::after {
            content: '';
            position: absolute;
            bottom: -1rem;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 3px;
            background: #3b82f6;
            border-radius: 2px;
        }

        .mf-info-card {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            border: 1px solid #bae6fd;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .mf-info-card h4 {
            color: #0369a1;
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 0.9375rem;
        }

        .mf-info-card p {
            color: #0c4a6e;
            font-size: 0.875rem;
            line-height: 1.5;
        }

        .mf-count-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            background: #3b82f6;
            color: white;
            border-radius: 50%;
            font-size: 0.75rem;
            font-weight: 700;
            margin-left: 0.5rem;
        }

        .no-info-message {
            text-align: center;
            padding: 3rem 2rem;
            color: #6b7280;
            background: #f9fafb;
            border-radius: 12px;
            border: 1px dashed #d1d5db;
        }

        .mf-modal-footer {
            padding: 1.5rem 2rem;
            border-top: 1px solid #e5e7eb;
            background: #f9fafb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Animaciones para el modal */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .mf-section {
            animation: fadeIn 0.3s ease forwards;
        }

        .mf-section:nth-child(1) {
            animation-delay: 0.1s;
        }

        .mf-section:nth-child(2) {
            animation-delay: 0.2s;
        }

        .mf-section:nth-child(3) {
            animation-delay: 0.3s;
        }

        .mf-section:nth-child(4) {
            animation-delay: 0.4s;
        }

        /* Responsive improvements */
        @media (max-width: 768px) {
            .direcciones-grid {
                grid-template-columns: 1fr;
            }

            .sec-head {
                padding: 1.25rem;
            }

            .mf-modal-content {
                padding: 1.25rem;
                max-height: calc(85vh - 160px);
            }

            .mf-section {
                padding: 1rem;
            }

            .mf-title {
                font-size: 1.1rem;
            }

            .mf-list li {
                font-size: 0.875rem;
            }

            .mf-modal-header {
                padding: 1.5rem 1.25rem;
            }

            .mf-tabs {
                flex-wrap: wrap;
            }

            .mf-modal-footer {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .mf-modal-content {
                padding: 1rem;
            }

            .mf-section {
                padding: 0.875rem;
            }
        }

        /* Placeholder de imagen mejorado */
        .photo-placeholder {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
        }

        .photo-placeholder svg {
            margin-bottom: 0.5rem;
        }

        .photo-placeholder-text {
            font-size: 0.75rem;
            font-weight: 600;
            text-align: center;
            padding: 0 0.5rem;
        }

        /* Badge de estadísticas mejorado */
        .stats-badge {
            position: relative;
            overflow: hidden;
        }

        .stats-badge::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--primary-500) 0%, var(--primary-300) 100%);
        }
    </style>

    {{-- SIMPLE LOADING OVERLAY --}}
    <div id="loadingOverlay" class="loading-overlay">
        <div class="text-center">
            <div class="loading-spinner mx-auto mb-4"></div>
            <p class="text-gray-600 font-medium">Cargando organigrama...</p>
            <p class="text-sm text-gray-400 mt-2">Por favor, espere un momento</p>
        </div>
    </div>
    <script>
        window.__mfMinistro = @json($mfMinistro ?? []);
        window.__mfSecretariaDetalle = @json($mfSecretaria['detalle_por_secretaria'] ?? []);
        window.__mfDireccionDetalle = @json($mfDireccion['detalle_por_direccion'] ?? []);
    </script>

    <div class="organigrama-container px-4 py-8 lg:px-6 lg:py-10" x-data="{
        tab: 'all',
        q: '',
    
        // Modal Foto
        photoOpen: false,
        photo: { src: '', nombre: '', cargo: '', dependencia: '' },
    
        // Modal Misiones y Funciones
        mfOpen: false,
        mfData: {
            titulo: '',
            tipo: '',
            mision: '',
            funciones: [],
            objetivos: [],
            acciones: []
        },
        mfActiveTab: 'general',
    
        openPhoto(payload) {
            this.photo = payload;
            this.photoOpen = true;
            document.documentElement.classList.add('overflow-hidden');
        },
        closePhoto() {
            this.photoOpen = false;
            document.documentElement.classList.remove('overflow-hidden');
        },
    
        openMF(titulo, tipo, data) {
            this.mfData = {
                titulo: titulo,
                tipo: tipo,
                mision: (data && data.mision) ? data.mision : '',
                funciones: (data && data.funciones) ? data.funciones : [],
                objetivos: (data && data.objetivos) ? data.objetivos : [],
                acciones: (data && data.acciones) ? data.acciones : []
            };
            this.mfActiveTab = 'general';
            this.mfOpen = true;
            document.documentElement.classList.add('overflow-hidden');
        },
        closeMF() {
            this.mfOpen = false;
            document.documentElement.classList.remove('overflow-hidden');
        },
    
        setMFTab(tab) {
            this.mfActiveTab = tab;
        },
    
        getMinistroMFData() {
            const m = window.__mfMinistro || {};
            const det = (m && m.detalle_completo) ? m.detalle_completo : {};
            return {
                mision: m.mision || '',
                funciones: m.funciones || [],
                objetivos: det.objetivos || [],
                acciones: det.acciones || []
            };
        },
        getSecretariaMFData(mfKey) {
            const secretariaData = window.__mfSecretariaDetalle || {};
            return secretariaData[mfKey] || {};
        },
        getDireccionMFData(mfKey) {
            const direccionData = window.__mfDireccionDetalle || {};
            return direccionData[mfKey] || {};
        },
    
        copied: '',
        async copy(text) {
            try {
                await navigator.clipboard.writeText(text);
                this.copied = text;
                setTimeout(() => this.copied = '', 1200);
            } catch (e) {
                console.error('Error copying text:', e);
            }
        },
    
        match(item) {
            const qq = (this.q || '').trim().toLowerCase();
            if (this.tab !== 'all' && item.type !== this.tab) return false;
            if (!qq) return true;
            const hay = `${item.t} ${item.area ?? ''} ${item.n ?? ''} ${item.e ?? ''} ${item.l ?? ''}`.toLowerCase();
            return hay.includes(qq);
        },
    
        matchDir(item) {
            if (this.tab === 'secretaria') return false;
            if (this.tab === 'ministro') return false;
            return this.match(item);
        }
    }"
        @keydown.escape.window="closePhoto(); closeMF()" x-init="Promise.all(
            Array.from(document.images)
            .filter(img => img.src)
            .map(img => {
                if (img.complete) return Promise.resolve();
                return new Promise(resolve => {
                    img.addEventListener('load', resolve);
                    img.addEventListener('error', resolve);
                });
            })
        ).then(() => {
            setTimeout(() => {
                const el = document.getElementById('loadingOverlay');
                if (!el) return;
                el.style.opacity = '0';
                setTimeout(() => el.style.display = 'none', 300);
            }, 500);
        });">

        {{-- MODAL FOTO --}}
        <div x-cloak x-show="photoOpen" class="fixed inset-0 z-[90] flex items-end md:items-center justify-center p-4"
            role="dialog" aria-modal="true" aria-labelledby="modal-title">

            <div x-show="photoOpen" x-transition.opacity.duration.200ms
                class="absolute inset-0 bg-black/50 backdrop-blur-sm" @click="closePhoto()">
            </div>

            <div x-show="photoOpen" x-transition:enter="transition ease-out duration-250"
                x-transition:enter-start="opacity-0 translate-y-6 md:translate-y-0 md:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 md:scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 md:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 md:scale-95"
                class="relative w-full max-w-5xl bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-200">

                <div class="modal-shine"></div>

                <div class="px-8 py-6 border-b border-gray-100 bg-gradient-to-r from-primary-900 to-primary-800 text-white">
                    <div class="flex items-start justify-between gap-6">
                        <div class="min-w-0 flex-1">
                            <h3 id="modal-title" class="text-2xl font-bold truncate" x-text="photo.nombre"></h3>
                            <div class="flex flex-wrap items-center gap-2 mt-2">
                                <span class="text-sm font-semibold text-white/95" x-text="photo.cargo"></span>
                                <span class="text-white/70">•</span>
                                <span class="text-sm text-white/85 truncate" x-text="photo.dependencia"></span>
                            </div>
                        </div>
                        <button type="button"
                            class="flex-shrink-0 rounded-lg p-2 hover:bg-white/10 transition-colors duration-200"
                            @click="closePhoto()" aria-label="Cerrar modal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="p-6 md:p-8">
                    <div class="rounded-xl overflow-hidden border border-gray-200 bg-gray-50 shadow-inner">
                        <img :src="photo.src" :alt="'Foto de ' + photo.nombre"
                            class="w-full h-[60vh] md:h-[70vh] object-contain bg-gradient-to-br from-gray-50 to-gray-100">
                    </div>
                </div>

                <div class="px-8 py-5 border-t border-gray-100 bg-gray-50/50">
                    <div class="flex justify-end">
                        <button type="button"
                            class="px-5 py-2.5 text-sm font-semibold text-primary-900 hover:text-primary-700 hover:bg-primary-50 rounded-lg transition-colors duration-200"
                            @click="closePhoto()">
                            Cerrar vista
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- MODAL MISIÓN Y FUNCIONES - MEJORADO --}}
        <div x-cloak x-show="mfOpen" class="fixed inset-0 z-[91] flex items-end md:items-center justify-center p-4"
            role="dialog" aria-modal="true" aria-labelledby="mf-modal-title">

            <div x-show="mfOpen" x-transition.opacity.duration.200ms class="absolute inset-0 bg-black/50 backdrop-blur-sm"
                @click="closeMF()">
            </div>

            <div x-show="mfOpen" x-transition:enter="transition ease-out duration-250"
                x-transition:enter-start="opacity-0 translate-y-6 md:translate-y-0 md:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 md:scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 md:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 md:scale-95"
                class="relative w-full max-w-5xl bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-200 mf-modal-container">

                <div class="modal-shine"></div>

                <div class="mf-modal-header">
                    <div class="flex items-start justify-between gap-6">
                        <div class="min-w-0 flex-1">
                            <h3 id="mf-modal-title" class="text-2xl font-bold text-white truncate mb-2"
                                x-text="mfData.titulo"></h3>
                            <div class="flex items-center gap-3">
                                <span
                                    class="px-3 py-1 text-sm font-semibold bg-white/20 text-white rounded-full backdrop-blur-sm"
                                    x-text="mfData.tipo"></span>

                            </div>
                        </div>
                        <button type="button"
                            class="flex-shrink-0 rounded-lg p-2 hover:bg-white/10 transition-colors duration-200"
                            @click="closeMF()" aria-label="Cerrar modal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="mf-modal-content" x-show="mfActiveTab === 'general'">
                    <div class="mf-info-card" x-show="mfData.mision">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h1m0-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-blue-900 mb-2">Misión Principal</h4>
                                <p class="text-gray-700 leading-relaxed" x-text="mfData.mision"></p>
                            </div>
                        </div>
                    </div>

                    <template x-if="mfData.funciones && mfData.funciones.length > 0">
                        <div class="mf-section">
                            <h4 class="mf-title">
                                Funciones Principales
                                <span class="mf-count-badge" x-text="mfData.funciones.length"></span>
                            </h4>
                            <ul class="mf-list">
                                <template x-for="(funcion, index) in mfData.funciones" :key="index">
                                    <li>
                                        <span class="font-medium text-gray-800" x-text="funcion"></span>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </template>

                    <template x-if="mfData.objetivos && mfData.objetivos.length > 0">
                        <div class="mf-section">
                            <h4 class="mf-title">
                                Objetivos Específicos
                                <span class="mf-count-badge" x-text="mfData.objetivos.length"></span>
                            </h4>
                            <ul class="mf-list mf-list-compact">
                                <template x-for="(objetivo, index) in mfData.objetivos" :key="index">
                                    <li>
                                        <span class="text-gray-700" x-text="objetivo"></span>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </template>

                    <template x-if="mfData.acciones && mfData.acciones.length > 0">
                        <div class="mf-section">
                            <h4 class="mf-title">
                                Acciones y Actividades
                                <span class="mf-count-badge" x-text="mfData.acciones.length"></span>
                            </h4>
                            <ul class="mf-list mf-list-compact">
                                <template x-for="(accion, index) in mfData.acciones" :key="index">
                                    <li>
                                        <span class="text-gray-700" x-text="accion"></span>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </template>

                    <template
                        x-if="!mfData.mision && !mfData.funciones.length && !mfData.objetivos.length && !mfData.acciones.length">
                        <div class="no-info-message">
                            <div class="w-20 h-20 rounded-full bg-blue-50 flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-400"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <h4 class="text-lg font-semibold text-gray-600 mb-2">Información no disponible</h4>
                            <p class="text-gray-500 max-w-md mx-auto">La información de misiones y funciones para esta área
                                está siendo actualizada.</p>
                        </div>
                    </template>
                </div>

                <div class="mf-modal-footer">
                    <div class="text-sm text-gray-600">
                        <span class="font-medium">Ministerio de Educación, Ciencia y Tecnología</span> • Provincia de
                        Catamarca
                    </div>
                    <div class="flex gap-3">
                        <button type="button"
                            class="px-4 py-2 text-sm font-semibold text-gray-700 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors duration-200"
                            @click="closeMF()">
                            Cerrar
                        </button>
                        <button type="button"
                            class="px-5 py-2 text-sm font-semibold bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200"
                            @click="closeMF()">
                            Entendido
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- HEADER PRINCIPAL --}}
        <div class="mb-10">
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-8">
                <div class="space-y-2">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-9 h-9 rounded-lg bg-gradient-to-br from-primary-900 to-primary-700 flex items-center justify-center shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-white" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>

                        {{-- Título más sobrio --}}
                        <div class="leading-tight">
                            <h1 class="text-2xl lg:text-3xl font-extrabold text-primary-900 tracking-tight">
                                Organigrama Ministerial
                            </h1>
                            <div class="mt-1 text-xs font-semibold uppercase tracking-widest text-primary-700/80">
                                Ministerio de Educación, Ciencia y Tecnología
                            </div>
                        </div>
                    </div>

                    <p class="text-gray-600 text-base lg:text-lg max-w-3xl">
                        Estructura organizativa del Ministerio de Educación, Ciencia y Tecnología de la Provincia
                    </p>
                </div>

                <div class="flex items-center gap-4">
                    <div class="stats-badge">
                        <span class="text-gray-600 text-sm">Total de cargos:</span>
                        <span class="ml-2 text-xl font-bold text-primary-900">{{ $totalCount }}</span>
                    </div>
                </div>
            </div>

            {{-- BÚSQUEDA Y FILTROS --}}
            <div class="search-box mb-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="lg:col-span-2">
                        <label for="search-input" class="block text-sm font-semibold text-gray-700 mb-3">
                            Buscar en el organigrama
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input id="search-input" type="text" x-model.debounce.300ms="q"
                                class="w-full pl-12 pr-10 py-3.5 rounded-xl border border-gray-300 bg-white focus:border-primary-500 focus:ring-3 focus:ring-primary-100 transition-all duration-200"
                                placeholder="Nombre, área, email o ubicación...">
                            <button type="button"
                                class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors"
                                @click="q = ''" x-show="q" x-cloak aria-label="Limpiar búsqueda">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- NIVEL MINISTERIAL --}}
        <div class="mb-12">
            <div class="flex items-center gap-4 mb-6">
                <div class="section-header">
                    <h2 class="text-2xl font-bold text-gray-900">Nivel Ministerial</h2>

                </div>
                <div class="ml-auto">
                    <span
                        class="px-3 py-1.5 text-sm font-semibold rounded-full bg-primary-50 text-primary-900 border border-primary-200">
                        1 cargo
                    </span>
                </div>
            </div>

            <template x-if="match(@js($ministro))">
                <div class="card-pro role-ministro p-8">
                    <span class="card-accent"></span>

                    <div class="flex flex-col lg:flex-row gap-8">
                        <div class="flex-shrink-0">
                            <div class="photo-wrap w-32 h-32 lg:w-40 lg:h-40"
                                @if (!empty($ministro['photo'])) @click="openPhoto({
                                            src: '{{ $ministro['photo'] }}',
                                            nombre: '{{ $ministro['n'] }}',
                                            cargo: '{{ $ministro['t'] }}',
                                            dependencia: '{{ $ministro['area'] }}'
                                        })"
                                        class="cursor-pointer" @endif>
                                @if (!empty($ministro['photo']))
                                    <img src="{{ $ministro['photo'] }}" alt="{{ $ministro['n'] }}" class="photo-img"
                                        loading="lazy">
                                @else
                                    <div
                                        class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary-50 to-primary-100 photo-placeholder">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-primary-300"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span class="photo-placeholder-text">SIN FOTO</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="flex-1 min-w-0">
                            <div class="flex flex-wrap items-center gap-3 mb-4">
                                <span class="role-badge">MINISTERIO</span>
                                <button type="button" class="mf-btn"
                                    @click="openMF('{{ $ministro['area'] }}', 'MINISTERIO', getMinistroMFData())">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    Misiones y Funciones
                                </button>
                            </div>

                            <h3 class="text-3xl font-bold titular-nombre mb-2">{{ $ministro['n'] }}</h3>
                            <p class="text-xl text-gray-700 font-semibold mb-6">{{ $ministro['area'] }}</p>

                            <div class="space-y-4">
                                <div class="flex items-start gap-3">
                                    <div class="flex-shrink-0 mt-1">
                                        <div class="w-8 h-8 rounded-lg bg-primary-50 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-600"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-600">Ubicación</p>
                                        <p class="text-gray-800">{{ $ministro['l'] }}</p>
                                    </div>
                                </div>

                                <div class="flex flex-col sm:flex-row sm:items-start gap-4">
                                    <div class="flex items-start gap-3 flex-1">
                                        <div class="flex-shrink-0 mt-1">
                                            <div class="w-8 h-8 rounded-lg bg-primary-50 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-600"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <p class="text-sm font-medium text-gray-600">Correo electrónico</p>
                                            <p class="text-gray-800 break-all">{{ $ministro['e'] }}</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-3">
                                        <button type="button" class="email-copy-btn flex items-center gap-2"
                                            @click="copy('{{ $ministro['e'] }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2" />
                                            </svg>
                                            Copiar email
                                        </button>
                                        <span x-cloak x-show="copied === '{{ $ministro['e'] }}'"
                                            x-transition.opacity.duration.150ms
                                            class="text-sm font-semibold text-green-600">
                                            ✓ Copiado
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        {{-- DIRECCIONES DEPENDIENTES DIRECTAMENTE DEL MINISTRO --}}
        @php
            // Filtrar las direcciones que dependen directamente del Ministro
            $direccionesMinistro = [];
            foreach ($direcciones as $d) {
                $secTitle = $dirToSecretaria[$d['t']] ?? null;
                if ($secTitle === null || $secTitle === 'MINISTERIO') {
                    $direccionesMinistro[] = $d;
                }
            }
        @endphp

        @if (!empty($direccionesMinistro) && count($direccionesMinistro) > 0)
            <div class="mb-12">
                <div class="flex items-center gap-4 mb-6">
                    <div class="section-header">
                        <h2 class="text-2xl font-bold text-gray-900">Direcciones dependientes del Ministro</h2>
                        <p class="text-gray-600 text-sm mt-1">Unidades técnicas que reportan directamente</p>
                    </div>
                    <div class="ml-auto">
                        <span
                            class="px-3 py-1.5 text-sm font-semibold rounded-full bg-primary-50 text-primary-900 border border-primary-200">
                            {{ count($direccionesMinistro) }}
                        </span>
                    </div>
                </div>

                <div class="direcciones-grid">
                    @foreach ($direccionesMinistro as $d)
                        @php
                            // Obtener datos de misiones y funciones para esta dirección
                            $mfKeyDir = $d['mf_key'] ?? '';
                            $baseMFDir = [
                                'mision' => $mfDireccion['mision'] ?? '',
                                'funciones' => $mfDireccion['funciones'] ?? [],
                            ];
                            $specificMFDir = $mfDireccion['detalle_por_direccion'][$mfKeyDir] ?? [];
                            $mfDataDireccion = array_merge($baseMFDir, $specificMFDir);
                        @endphp

                        <template x-if="matchDir(@js($d))">
                            <div class="card-pro role-direccion p-5">
                                <span class="card-accent"></span>

                                <div class="flex items-start gap-4 mb-5">
                                    <div class="flex-shrink-0">
                                        <div class="photo-wrap w-16 h-16"
                                            @if (!empty($d['photo'])) @click="openPhoto({
                                            src: '{{ $d['photo'] }}',
                                            nombre: '{{ $d['n'] ?? 'A designar' }}',
                                            cargo: 'Dirección',
                                            dependencia: '{{ $d['t'] }}'
                                        })"
                                        class="cursor-pointer" @endif>
                                            @if (!empty($d['photo']))
                                                <img src="{{ $d['photo'] }}" alt="{{ $d['n'] ?? 'Foto' }}"
                                                    class="photo-img" loading="lazy">
                                            @else
                                                <div
                                                    class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary-50 to-primary-100 photo-placeholder">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-8 w-8 text-primary-300" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                    </svg>
                                                    <span class="photo-placeholder-text text-xs">SIN FOTO</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="flex-1 min-w-0">
                                        <span class="role-badge mb-2">DIRECCIÓN</span>
                                        <button type="button" class="mf-btn mb-2"
                                            @click="openMF('{{ $d['t'] }}', 'DIRECCIÓN', getDireccionMFData('{{ $d['t'] }}'))">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            Misiones y Funciones
                                        </button>
                                        <h5 class="font-bold text-gray-900 text-sm leading-tight mb-1 line-clamp-2">
                                            {{ $d['t'] }}</h5>
                                        <p class="text-sm font-semibold titular-nombre">
                                            {{ $d['n'] ?? 'A designar' }}</p>
                                        <div class="mt-2">
                                            <span
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium text-blue-700 bg-blue-50 rounded-full border border-blue-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                                </svg>
                                                Dependencia directa del Ministro
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-3">
                                    <div class="flex items-center gap-2 text-xs">
                                        <div
                                            class="w-5 h-5 rounded bg-primary-50 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-primary-500"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0  0z" />
                                            </svg>
                                        </div>
                                        <span class="text-gray-600 truncate">{{ $d['l'] }}</span>
                                    </div>

                                    <div class="flex items-center justify-between gap-2">
                                        <div class="flex items-center gap-2 text-xs min-w-0 flex-1">
                                            <div
                                                class="w-5 h-5 rounded bg-primary-50 flex items-center justify-center flex-shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-primary-500"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <span class="text-gray-600 truncate">{{ $d['e'] }}</span>
                                        </div>

                                        <button type="button" class="email-copy-btn flex-shrink-0"
                                            @click="copy('{{ $d['e'] }}')">
                                            Copiar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </template>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- SECRETARÍAS + DIRECCIONES DEPENDIENTES --}}
        <div class="mb-12">
            <div class="flex items-center gap-4 mb-6">
                <div class="section-header">
                    <h2 class="text-2xl font-bold text-gray-900">Secretarías y Direcciones dependientes</h2>
                    <p class="text-gray-600 text-sm mt-1">Estructura organizativa por áreas</p>
                </div>
            </div>

            <div class="space-y-8">
                @foreach ($secretariasFull as $s)
                    @php
                        $dirs = $s['direcciones'] ?? [];
                    @endphp

                    <template x-if="match(@js($s)) || {{ count($dirs) }} > 0">
                        <section class="sec-block">
                            {{-- Header Secretaría --}}
                            <div class="sec-head">
                                <div class="flex flex-col md:flex-row md:items-start gap-6">
                                    <div class="flex-shrink-0">
                                        <div class="photo-wrap w-24 h-24"
                                            @if (!empty($s['photo'])) @click="openPhoto({
                                                        src: '{{ $s['photo'] }}',
                                                        nombre: '{{ $s['n'] }}',
                                                        cargo: 'Secretaría',
                                                        dependencia: '{{ $s['t'] }}'
                                                    })"
                                                    class="cursor-pointer" @endif>
                                            @if (!empty($s['photo']))
                                                <img src="{{ $s['photo'] }}" alt="{{ $s['n'] }}"
                                                    class="photo-img" loading="lazy">
                                            @else
                                                <div
                                                    class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary-50 to-primary-100 photo-placeholder">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-12 w-12 text-primary-300" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                    </svg>
                                                    <span class="photo-placeholder-text">SIN FOTO</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="flex-1 min-w-0">
                                        <div class="flex flex-wrap items-center gap-3 mb-4">
                                            <span class="role-badge">SECRETARÍA</span>
                                            <button type="button" class="mf-btn"
                                                @click="openMF('{{ $s['t'] }}', 'SECRETARÍA', getSecretariaMFData('{{ $s['t'] }}'))">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                                Misiones y Funciones
                                            </button>
                                            <span
                                                class="text-xs font-semibold px-3 py-1.5 rounded-full bg-white border border-primary-200 text-primary-700">
                                                {{ count($dirs) }} dirección{{ count($dirs) !== 1 ? 'es' : '' }}
                                            </span>
                                        </div>

                                        <h3 class="text-2xl font-bold text-gray-900 leading-tight mb-2">
                                            {{ $s['t'] }}
                                        </h3>
                                        <p class="text-lg font-semibold text-primary-700 mb-5">
                                            {{ $s['n'] ?? 'A designar' }}
                                        </p>

                                        <div class="flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-8 text-sm">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="w-6 h-6 rounded-md bg-primary-50 flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-3.5 w-3.5 text-primary-600" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    </svg>
                                                </div>
                                                <span class="text-gray-700">{{ $s['l'] }}</span>
                                            </div>
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="w-6 h-6 rounded-md bg-primary-50 flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-3.5 w-3.5 text-primary-600" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <span class="text-gray-700 break-all">{{ $s['e'] }}</span>
                                                    <button type="button" class="email-copy-btn"
                                                        @click="copy('{{ $s['e'] }}')">
                                                        Copiar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Direcciones --}}
                            @if (count($dirs) > 0)
                                <div class="p-6">
                                    <div class="mb-4">
                                        <h4 class="text-lg font-semibold text-gray-700">Direcciones dependientes</h4>
                                    </div>
                                    <div class="direcciones-grid">
                                        @foreach ($dirs as $d)
                                            @php

                                                $nombreDir = $d['n'] ?? 'A designar';
                                            @endphp

                                            <template x-if="matchDir(@js($d))">
                                                <div class="card-pro role-direccion p-5">
                                                    <span class="card-accent"></span>

                                                    <div class="flex items-start gap-4 mb-5">
                                                        <div class="flex-shrink-0">
                                                            <div class="photo-wrap w-16 h-16"
                                                                @if (!empty($d['photo'])) @click="openPhoto({
                                                                            src: '{{ $d['photo'] }}',
                                                                            nombre: '{{ $d['n'] ?? 'A designar' }}',
                                                                            cargo: 'Dirección',
                                                                            dependencia: '{{ $d['t'] }}'
                                                                        })"
                                                                        class="cursor-pointer" @endif>
                                                                @if (!empty($d['photo']))
                                                                    <img src="{{ $d['photo'] }}"
                                                                        alt="{{ $d['n'] ?? 'Foto' }}" class="photo-img"
                                                                        loading="lazy">
                                                                @else
                                                                    <div
                                                                        class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary-50 to-primary-100 photo-placeholder">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="h-8 w-8 text-primary-300"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                                        </svg>
                                                                        <span class="photo-placeholder-text text-xs">SIN
                                                                            FOTO</span>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="flex-1 min-w-0">
                                                            <span class="role-badge mb-2">DIRECCIÓN</span>
                                                            <button type="button" class="mf-btn mb-2"
                                                                @click="openMF('{{ $d['t'] }}', 'DIRECCIÓN', getDireccionMFData('{{ $d['t'] }}'))">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                                </svg>
                                                                Misiones y Funciones
                                                            </button>
                                                            <h5
                                                                class="font-bold text-gray-900 text-sm leading-tight mb-1 line-clamp-2">
                                                                {{ $d['t'] }}</h5>
                                                            <p class="text-sm font-semibold titular-nombre">
                                                                {{ $d['n'] ?? 'A designar' }}</p>
                                                        </div>
                                                    </div>

                                                    <div class="space-y-3">
                                                        <div class="flex items-center gap-2 text-xs">
                                                            <div
                                                                class="w-5 h-5 rounded bg-primary-50 flex items-center justify-center flex-shrink-0">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-3 w-3 text-primary-500" viewBox="0 0 24 24"
                                                                    fill="none" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0  0z" />
                                                                </svg>
                                                            </div>
                                                            <span
                                                                class="text-gray-600 truncate">{{ $d['l'] }}</span>
                                                        </div>

                                                        <div class="flex items-center justify-between gap-2">
                                                            <div class="flex items-center gap-2 text-xs min-w-0 flex-1">
                                                                <div
                                                                    class="w-5 h-5 rounded bg-primary-50 flex items-center justify-center flex-shrink-0">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-3 w-3 text-primary-500"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                                    </svg>
                                                                </div>
                                                                <span
                                                                    class="text-gray-600 truncate">{{ $d['e'] }}</span>
                                                            </div>

                                                            <button type="button" class="email-copy-btn flex-shrink-0"
                                                                @click="copy('{{ $d['e'] }}')">
                                                                Copiar
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <div class="p-6">
                                    <div class="text-center py-8">
                                        <div
                                            class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <p class="text-gray-500">No hay direcciones asignadas para esta secretaría</p>
                                    </div>
                                </div>
                            @endif
                        </section>
                    </template>
                @endforeach
            </div>
        </div>

        {{-- DIRECCIONES SIN ASIGNACIÓN --}}
        @if (!empty($direccionesSinAsignar) && count($direccionesSinAsignar) > 0)
            <div class="mb-12">
                <div class="flex items-center gap-4 mb-6">
                    <div class="section-header">
                        <h2 class="text-xl font-bold text-gray-900">Direcciones sin asignación específica</h2>
                        <p class="text-gray-600 text-sm mt-1">Direcciones pendientes de asignación jerárquica</p>
                    </div>
                    <div class="ml-auto">
                        <span
                            class="px-3 py-1.5 text-sm font-semibold rounded-full bg-gray-100 text-gray-800 border border-gray-300">
                            {{ count($direccionesSinAsignar) }}
                        </span>
                    </div>
                </div>

                <div class="direcciones-grid">
                    @foreach ($direccionesSinAsignar as $d)
                        @php
                            // Obtener datos de misiones y funciones para esta dirección
                            $mfKeyDir = $d['mf_key'] ?? '';
                            $baseMFDir = [
                                'mision' => $mfDireccion['mision'] ?? '',
                                'funciones' => $mfDireccion['funciones'] ?? [],
                            ];
                            $specificMFDir = $mfDireccion['detalle_por_direccion'][$mfKeyDir] ?? [];
                            $mfDataDireccion = array_merge($baseMFDir, $specificMFDir);
                        @endphp

                        <template x-if="matchDir(@js($d))">
                            <div class="card-pro role-direccion p-5">
                                <span class="card-accent"></span>

                                <div class="flex items-start gap-4 mb-5">
                                    <div class="flex-shrink-0">
                                        <div class="photo-wrap w-16 h-16"
                                            @if (!empty($d['photo'])) @click="openPhoto({
                                                        src: '{{ $d['photo'] }}',
                                                        nombre: '{{ $d['n'] ?? 'A designar' }}',
                                                        cargo: 'Dirección',
                                                        dependencia: '{{ $d['t'] }}'
                                                    })"
                                                    class="cursor-pointer" @endif>
                                            @if (!empty($d['photo']))
                                                <img src="{{ $d['photo'] }}" alt="{{ $d['n'] ?? 'Foto' }}"
                                                    class="photo-img" loading="lazy">
                                            @else
                                                <div
                                                    class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary-50 to-primary-100 photo-placeholder">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-8 w-8 text-primary-300" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                    </svg>
                                                    <span class="photo-placeholder-text text-xs">SIN FOTO</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="flex-1 min-w-0">
                                        <span class="role-badge mb-2">DIRECCIÓN</span>
                                        <button type="button" class="mf-btn mb-2"
                                            @click="openMF('{{ $d['t'] }}', 'DIRECCIÓN', getDireccionMFData('{{ $d['t'] }}'))">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            Misiones y Funciones
                                        </button>
                                        <h5 class="font-bold text-gray-900 text-sm leading-tight mb-1 line-clamp-2">
                                            {{ $d['t'] }}</h5>
                                        <p class="text-sm font-semibold titular-nombre">{{ $d['n'] ?? 'A designar' }}</p>
                                    </div>
                                </div>

                                <div class="space-y-3">
                                    <div class="flex items-center gap-2 text-xs">
                                        <div
                                            class="w-5 h-5 rounded bg-primary-50 flex items-center justify-center flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-primary-500"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0  0z" />
                                            </svg>
                                        </div>
                                        <span class="text-gray-600 truncate">{{ $d['l'] }}</span>
                                    </div>

                                    <div class="flex items-center justify-between gap-2">
                                        <div class="flex items-center gap-2 text-xs min-w-0 flex-1">
                                            <div
                                                class="w-5 h-5 rounded bg-primary-50 flex items-center justify-center flex-shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-primary-500"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <span class="text-gray-600 truncate">{{ $d['e'] }}</span>
                                        </div>

                                        <button type="button" class="email-copy-btn flex-shrink-0"
                                            @click="copy('{{ $d['e'] }}')">
                                            Copiar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </template>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- INFORMACIÓN GENERAL --}}
        <div class="bg-gradient-to-r from-primary-50 to-white rounded-2xl border border-primary-200 p-8">
            <div class="flex items-center gap-4 mb-8">
                <div
                    class="w-12 h-12 rounded-xl bg-gradient-to-br from-primary-900 to-primary-700 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-primary-900">Información General</h3>
                    <p class="text-gray-600">Datos de contacto y horarios</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl border border-gray-200 p-5">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 rounded-lg bg-primary-50 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-600" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0  0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h4 class="font-bold text-gray-900">Ubicación Central</h4>
                    </div>
                    <p class="text-gray-700">Complejo Administrativo Provincial de Ejecución (CAPE)</p>
                    <p class="text-sm text-gray-600 mt-2">Pabellones 11 al 15 y 26</p>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 p-5">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 rounded-lg bg-primary-50 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-600" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h4 class="font-bold text-gray-900">Horario de Atención</h4>
                    </div>
                    <p class="text-gray-700">Lunes a Viernes</p>
                    <p class="text-sm text-gray-600 mt-2">07:00 - 14:00 hs</p>
                </div>
            </div>
        </div>

    </div>

    <script>
        // Simple script para manejar el loading
        document.addEventListener('DOMContentLoaded', function() {
            const loadingOverlay = document.getElementById('loadingOverlay');

            // Forzar un mínimo de tiempo de visualización (500ms)
            setTimeout(function() {
                // Verificar si las imágenes principales están cargadas
                const checkImagesLoaded = function() {
                    const images = document.querySelectorAll('.photo-img');
                    let loadedCount = 0;
                    let totalImages = images.length;

                    if (totalImages === 0) {
                        hideLoader();
                        return;
                    }

                    images.forEach(img => {
                        if (img.complete) {
                            loadedCount++;
                        } else {
                            img.addEventListener('load', function() {
                                loadedCount++;
                                if (loadedCount >= totalImages *
                                    0.8) { // 80% cargado es suficiente
                                    hideLoader();
                                }
                            });
                            img.addEventListener('error', function() {
                                loadedCount++;
                                if (loadedCount >= totalImages * 0.8) {
                                    hideLoader();
                                }
                            });
                        }
                    });

                    // Si ya están todas cargadas
                    if (loadedCount >= totalImages) {
                        hideLoader();
                    }

                    // Timeout de seguridad (5 segundos máximo)
                    setTimeout(hideLoader, 5000);
                };

                checkImagesLoaded();
            }, 500);

            function hideLoader() {
                loadingOverlay.style.opacity = '0';
                setTimeout(function() {
                    loadingOverlay.style.display = 'none';
                }, 300);
            }
        });
    </script>
@endsection
