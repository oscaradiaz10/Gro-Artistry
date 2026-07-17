/**
 * AJAX submission for the contact form.
 * Posts to includes/contact-handler.php and renders the response
 * without a full page reload.
 */
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('contactForm');
    if (!form) return;

    const statusBox = document.getElementById('formStatus');
    const submitBtn = document.getElementById('contactSubmitBtn');
    const btnText = submitBtn.querySelector('.btn-text');
    const defaultBtnText = btnText.textContent;

    function showAlert(type, message) {
        statusBox.innerHTML = `
            <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
        statusBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    function setLoading(isLoading) {
        submitBtn.disabled = isLoading;
        btnText.textContent = isLoading ? 'Sending...' : defaultBtnText;
    }

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        // Basic client-side validation (mirrors the "required" attributes)
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        setLoading(true);
        statusBox.innerHTML = '';

        fetch(form.action, {
            method: 'POST',
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            body: new FormData(form),
        })
            .then(function (response) {
                return response.json().then(function (data) {
                    return { ok: response.ok, data: data };
                });
            })
            .then(function (result) {
                if (result.data && result.data.success) {
                    showAlert('success', result.data.message);
                    form.reset();
                } else {
                    const message = (result.data && result.data.message) || 'Something went wrong. Please try again.';
                    showAlert('danger', message);
                }
            })
            .catch(function () {
                showAlert('danger', 'Something went wrong sending your message. Please check your connection and try again.');
            })
            .finally(function () {
                setLoading(false);
            });
    });
});
