window.onload = () => {
  btnCompleteOrder = document.querySelector('.btn-complete-order')

  btnCompleteOrder.addEventListener('click', () => {
    axios.post('/cart/completeOrder')
    .then((res) => {
      if (res.data.success) {
        document.getElementById("items-body").innerHTML = "<div class=\"order-success animated fadeIn bounce\">Your order was successfully submitted.</div>"
      }
    })
  })
}