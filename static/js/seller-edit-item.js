window.onload = () => {
  closeButton = document.querySelector(".button-modal-close");
  closeButton.addEventListener('click', (e) => {
    e.preventDefault()
    window.location.href = "/index.php/seller"
  })
}