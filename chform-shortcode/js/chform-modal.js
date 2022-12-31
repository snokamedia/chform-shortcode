document.addEventListener('DOMContentLoaded', function () {
    var modalButton = document.getElementById('chform-modal-button');
    var modal = document.getElementById('chform-modal');
    var closeButton = document.getElementsByClassName('chform-modal-close')[0];
    var speed = phpVars.speed;
    if (phpVars.modal_on_load) {
      animateModalOpen();
    }
    modalButton.addEventListener('click', function () {
      animateModalOpen();
    });
    closeButton.addEventListener('click', function () {
      animateModalClose();
    });
    window.addEventListener('click', function (event) {
      if (event.target === modal) {
        animateModalClose();
      }
    });
    function animateModalOpen() {
      modal.style.visibility = 'visible';
      var start = null;
      function step(timestamp) {
        if (!start) start = timestamp;
        var progress = timestamp - start;
        modal.style.opacity = progress / speed;
        if (progress < speed) {
          window.requestAnimationFrame(step);
        }
      }
      window.requestAnimationFrame(step);
    };
    function animateModalClose() {
      var start = null;
      function step(timestamp) {
        if (!start) start = timestamp;
        var progress = timestamp - start;
        modal.style.opacity = 1 - (progress / speed);
        if (progress < speed) {
          window.requestAnimationFrame(step);
        } else {
          modal.style.visibility = 'hidden';
        }
      }
      window.requestAnimationFrame(step);
    };
  });