window.onload = () => {
  closeButton = document.querySelector(".customer-close .button-modal-close");
  closeButton.addEventListener('click', (e) => {
    e.preventDefault()
    window.location.href = base_url + "seller"
  })
}