document.addEventListener('DOMContentLoaded', function () {
    function openModalFromUrl() {
        // Check for presence of modal URL parameter
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('modal')) {
            // If present, trigger modal to open
            document.getElementById('chform-modal').style.display = 'block';
        }
    }
    var modalButton = document.getElementById('chform-modal-button');
    var modal = document.getElementById('chform-modal');
    var closeButton = document.getElementsByClassName('chform-modal-close')[0];
    // Call function to open modal from URL parameter
    openModalFromUrl();
    modalButton.addEventListener('click', function () {
        modal.style.display = 'block';
    });
    closeButton.addEventListener('click', function () {
        modal.style.display = 'none';
    });
    window.addEventListener('click', function (event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
});