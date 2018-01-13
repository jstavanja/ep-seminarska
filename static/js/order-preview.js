window.onload = () => {
  btnCompleteOrder = document.querySelector('.btn-complete-order')

  btnCompleteOrder.addEventListener('click', () => {
    axios.post('/cart/completeOrder')
    .then((res) => {
      if (res.data.success) {
        document.querySelector(".card").innerHTML = "<h3 class=\"is-success animated fadeIn bounce\">Uspešno ste oddali naročilo. </h3><a href=\"/\">Nazaj na domačo stran.</a>"
      }
    })
  })
}