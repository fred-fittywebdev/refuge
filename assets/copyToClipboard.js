const btnCopy = document.getElementById('btn-copy')

btnCopy.addEventListener('click', (event) => {
    event.preventDefault()
    const content = document.getElementById('content-copy').textContent
    navigator.clipboard.writeText(content)
})