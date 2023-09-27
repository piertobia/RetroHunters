let selectLeng = document.querySelector('#selectLeng')
let lengIT = document.querySelector('#lengIT')
let lengEN = document.querySelector('#lengEN')
let lengES = document.querySelector('#lengES')


selectLeng.addEventListener('click',()=>{
    lengIT.classList.toggle('d-none')
    lengEN.classList.toggle('d-none')
    lengES.classList.toggle('d-none')
})