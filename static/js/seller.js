window.onload = () => {
  // Buttons
  const ordersButton = document.querySelector('.button-orders')
  const itemsButton = document.querySelector('.button-items')
  const customersButton = document.querySelector('.button-customers')
  const newCustomerButton = document.querySelector('.button-new-customer')
  const newCustomerButtonCloseArray = document.getElementsByClassName("button-modal-close")

  // Pages
  const defaultPage = document.querySelector('.page-default')
  const ordersPage = document.querySelector('.page-orders')
  const itemsPage = document.querySelector('.page-items')
  const customersPage = document.querySelector('.page-customers')

  // Modal
  const newCustomerModal = document.querySelector('.modal-new-customer')
  
  // Event listeners for menu buttons
  ordersButton.addEventListener('click', () => {
    defaultPage.style.display = 'none'
    customersPage.style.display = 'none'
    itemsPage.style.display = 'none'

    ordersPage.style.display = 'block'
  })

  itemsButton.addEventListener('click', () => {
    defaultPage.style.display = 'none'
    customersPage.style.display = 'none'
    ordersPage.style.display = 'none'

    itemsPage.style.display = 'block'
  })

  customersButton.addEventListener('click', () => {
    defaultPage.style.display = 'none'
    ordersPage.style.display = 'none'
    itemsPage.style.display = 'none'

    customersPage.style.display = 'block'
  })

  newCustomerButton.addEventListener('click', () => {
    newCustomerModal.classList.add('is-active')
  })
  
  for (let i = 0; i < newCustomerButtonCloseArray.length; i++) {
    newCustomerButtonCloseArray[i].addEventListener('click', () => {
      newCustomerModal.classList.remove('is-active')
    })
  }
}