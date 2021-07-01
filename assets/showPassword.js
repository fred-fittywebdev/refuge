const pw = document.getElementById('inputPassword')
const toggle = document.getElementById('btnShow')

toggle.addEventListener('click', (event) => {
    event.preventDefault()
    if(pw.type === "password") {
        pw.setAttribute('type', "text")
        toggle.classList.add('hide')
    } else {
        pw.setAttribute('type', "password")
        toggle.classList.remove('hide')
    }
})