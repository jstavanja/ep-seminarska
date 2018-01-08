window.onload = () => {
  // Buttons
  const sellersButton = document.querySelector('.button-sellers')
  const newSellerButton = document.querySelector('.button-new-seller')
  const newSellerButtonCloseArray = document.getElementsByClassName("button-modal-close")

  // Pages
  const defaultPage = document.querySelector('.page-default')
  const sellersPage = document.querySelector('.page-sellers')

  // Modal
  const newSellerModal = document.querySelector('.modal-new-seller')
  
  // Event listeners for menu buttons
  sellersButton.addEventListener('click', () => {
    defaultPage.style.display = 'none'

    sellersPage.style.display = 'block'
  })

  newSellerButton.addEventListener('click', () => {
    newSellerModal.classList.add('is-active')
  })
  
  for (let i = 0; i < newSellerButtonCloseArray.length; i++) {
    newSellerButtonCloseArray[i].addEventListener('click', () => {
      newSellerModal.classList.remove('is-active')
    })
  }
}