window.onload = () => {
  // Buttons
  const accountButton = document.querySelector('.button-account')
  const ordersButton = document.querySelector('.button-orders')

  // Pages
  const defaultPage = document.querySelector('.page-default')
  const accountPage = document.querySelector('.page-account')
  const ordersPage = document.querySelector('.page-orders')
  
  // Event listeners for menu buttons
  accountButton.addEventListener('click', () => {
    defaultPage.style.display = 'none'
    ordersPage.style.display = 'none'

    accountPage.style.display = 'block'
  })

  ordersButton.addEventListener('click', () => {
    defaultPage.style.display = 'none'
    accountPage.style.display = 'none'

    ordersPage.style.display = 'block'
  })

}