import './bootstrap';
import 'bootstrap/dist/js/bootstrap.min.js';
import './navbar.js';

let inputSearch= document.querySelector('#inputSearch')
let btnSearch = document.querySelector('#btnSearch')
let btnviewSearch = document.querySelector('#btnviewSearch')
let iconbtn = document.querySelector('#iconbtn')



btnviewSearch.addEventListener('click',()=>{
    inputSearch.classList.toggle('d-none');
    btnSearch.classList.toggle('d-none');
    iconbtn.classList.toggle('fa-search')
    iconbtn.classList.toggle('fa-x')
    iconbtn.classList.toggle('tx-red')
    



})

