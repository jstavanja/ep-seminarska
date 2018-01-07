window.onload = function () {
  var carousel = document.querySelector('.carousel');
  var flkty = new Flickity(carousel, {
    wrapAround: true,
    autoPlay: true
  });

  var modalWelcome = document.querySelector('.modal');
  modalWelcome.classList.add('is-active');
  var modalContent = document.querySelector('.modal-content');
  modalContent.classList.add('animated');
  modalContent.classList.add('fadeInLeft');

  var modalCloseButton = document.querySelector('.delete')
  modalCloseButton.addEventListener('click', function () {
    modalWelcome.classList.remove('is-active');
  });
};