const btnDelete = document.getElementById('btnDelete')
const modal = document.getElementById('modalDialog')
const btnModalAgree = document.querySelector('.agree')
const btnModalCancel = document.querySelector('.cancel')

btnDelete.addEventListener('click', (e) => {
  e.preventDefault()
  modal.style.display = 'block'
})
btnModalAgree.addEventListener('click', () => {
  modal.style.display = 'none'
})
btnModalCancel.addEventListener('click', () => {
  modal.style.display = 'none'
})
