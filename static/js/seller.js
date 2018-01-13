window.onload = () => {
  // Buttons
  const ordersButton = document.querySelector('.button-orders')
  const itemsButton = document.querySelector('.button-items')
  const customersButton = document.querySelector('.button-customers')
  const newCustomerButton = document.querySelector('.button-new-customer')
  const newCustomerButtonCloseArray = document.getElementsByClassName("button-modal-close")
  const newItemButton = document.querySelector('.button-new-item');

  // Pages
  const defaultPage = document.querySelector('.page-default')
  const ordersPage = document.querySelector('.page-orders')
  const itemsPage = document.querySelector('.page-items')
  const customersPage = document.querySelector('.page-customers')

  // Modal
  const newCustomerModal = document.querySelector('.modal-new-customer')
  const newItemModal = document.querySelector('.modal-new-item')

  // Other
  const tbodyOrders = document.querySelector('.tbody-orders')
  const statusSelect = document.querySelector('.status-select')

  // Event listeners for menu buttons
  ordersButton.addEventListener('click', () => {
    defaultPage.style.display = 'none'
    customersPage.style.display = 'none'
    itemsPage.style.display = 'none'

    ordersPage.style.display = 'block'

    statusSelectRender(2)
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
  
  newItemButton.addEventListener('click', () => {
    newItemModal.classList.add('is-active')
  })

  for (let i = 0; i < newCustomerButtonCloseArray.length; i++) {
    newCustomerButtonCloseArray[i].addEventListener('click', (e) => {
      e.preventDefault()
      newCustomerModal.classList.remove('is-active')
      newItemModal.classList.remove('is-active')
    })
  }

  statusSelect.addEventListener('change', (e) => {
    statusSelectRender(parseInt(e.target.value))
  })

  const statusSelectRender = (status_id) => {
    tbodyOrders.innerHTML = "";
    axios.post('/seller/getOrders')
      .then((res) => {

        const dataArray = res.data
        
        Object.keys(dataArray).forEach(key => {

          if (key === 0 || key === "0") return
          let dataObj = dataArray[key];
          if (dataObj.status != status_id) return

          console.log(dataObj)
          let stArtiklov = dataObj.items.length;
          let orderId = dataObj.order_id;
          let customer = dataObj.customer;
          let cena = dataObj.items.reduce((total, item) => {
            return total + parseInt(item[0].price)
          }, 0)
          
          let htmlToAdd = ""
          htmlToAdd += `
          <tr>
            <td>${orderId}</td>
            <td>${customer}</td>`
          
          if (dataObj.status == 0) {
            htmlToAdd += '<td><i class="fa fa-times has-text-danger"></i></td>'
          } else if (dataObj.status == 1) {
            htmlToAdd += '<td><i class="fa fa-check has-text-success"></i></td>'
          } else if (dataObj.status == 2) {
            htmlToAdd += '<td><i class="fa fa-spinner has-text-warning"></i></td>'
          }

          htmlToAdd += `
            <td>${stArtiklov}</td>
            <td>${cena}$</td>
            <td>
              <a href="/seller/order/${orderId}" class="button is-primary is-small"><i class="fa fa-pencil-square"></i>Obdelaj</a>
            </td>
          </tr>`

          tbodyOrders.innerHTML += htmlToAdd

        })
      })
  }
}