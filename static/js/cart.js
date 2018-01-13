window.onload = () => {
  btnCompleteOrder = document.querySelector('.btn-complete-order')

  btnCompleteOrder.addEventListener('click', () => {
    window.location.href = '/index.php/cart/previewOrder'
  })
}