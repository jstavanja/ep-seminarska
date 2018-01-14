window.onload = () => {
  // Buttons
  const accountButton = document.querySelector('.button-account')
  const ordersButton = document.querySelector('.button-orders')

  // Pages
  const defaultPage = document.querySelector('.page-default')
  const accountPage = document.querySelector('.page-account')
  const ordersPage = document.querySelector('.page-orders')

  // Other
  const tbodyOrders = document.querySelector('.tbody-orders')
  const statusSelect = document.querySelector('.status-select')
  
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

    statusSelectRender(2);

  })

  statusSelect.addEventListener('change', (e) => {
    statusSelectRender(parseInt(e.target.value))
  })

  const statusSelectRender = (status_id) => {
    tbodyOrders.innerHTML = "";
    axios.post('/customer/getOrders')
      .then((res) => {

        const dataArray = res.data
        
        Object.keys(dataArray).forEach(key => {

          if (key === 0 || key === "0") return
          let dataObj = dataArray[key];
          if (dataObj.status != status_id) return
          let stArtiklov = dataObj.items.length;
          let orderId = dataObj.order_id;
          let cena = dataObj.items.reduce((total, item) => {
            return total + parseInt(item[0].price)
          }, 0)
          
          let htmlToAdd = ""
          htmlToAdd += `
          <tr>
            <td>${orderId}</td>`
          
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
              <a href="${base_url}customer/order/${orderId}" class="button is-primary is-small"><i class="fa fa-pencil-square"></i>Obdelaj</a>
            </td>
          </tr>`

          tbodyOrders.innerHTML += htmlToAdd

        })
      })
  }

}