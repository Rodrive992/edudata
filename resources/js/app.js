import './bootstrap';
import '../css/app.css';

// Componente global: lee totales desde data-attributes del elemento raíz
window.estadisticas = function(el) {
    const totalMatricula = Number(el?.dataset?.totalMatricula ?? 0);
    const totalEstab     = Number(el?.dataset?.totalEstab ?? 0);

    return {
        modal: null,
        totalMatricula,
        totalEstab,
        counters: { matricula: 0, establecimientos: 0 },

        init() {
            this.animateTo('matricula', this.totalMatricula, 1200);
            this.animateTo('establecimientos', this.totalEstab, 1000);
        },

        animateTo(key, target, duration = 1200) {
            const start = performance.now(), from = 0;
            const step = (t) => {
                const p = Math.min(1, (t - start) / duration);
                const eased = p < 0.5 ? 2*p*p : -1 + (4 - 2*p)*p; // easeInOutQuad
                this.counters[key] = Math.round(from + (target - from) * eased);
                if (p < 1) requestAnimationFrame(step);
            };
            requestAnimationFrame(step);
        },

        openModal(which) {
            this.modal = which;
            document.documentElement.classList.add('overflow-hidden');
        },
        closeModal() {
            this.modal = null;
            document.documentElement.classList.remove('overflow-hidden');
        },

        formatNumber(n) {
            try { return new Intl.NumberFormat('es-AR').format(n); } catch { return n; }
        }
    }
};

