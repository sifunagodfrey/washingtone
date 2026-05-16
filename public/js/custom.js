// =========================
// WELCOME POPUP (7-day expiry)
// =========================
(function () {
    const popupKey   = 'neptunes_welcome_popup';
    const expiryDays = 7;
    const now        = new Date().getTime();
    const stored     = localStorage.getItem(popupKey);
    const hasExpired = !stored || (now - parseInt(stored)) > (expiryDays * 24 * 60 * 60 * 1000);

    function initPopup() {
        const modalEl = document.getElementById('welcomeModal');
        if (!modalEl) return;

        if (hasExpired) {
            setTimeout(function () {
                const modal = new bootstrap.Modal(modalEl);
                modal.show();
            }, 1500);

            modalEl.addEventListener('hidden.bs.modal', function () {
                localStorage.setItem(popupKey, new Date().getTime().toString());
            });
        }
    }

    document.addEventListener('DOMContentLoaded', initPopup);
})();