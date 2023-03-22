let menu = document.querySelector('.header .nav .menu');
//for header functionality
document.querySelector('#menu-btn').onclick =() =>{
    menu.classList.toggle('active');
}
window.onscroll = () =>{
    menu.classList.remove('active');
}

document

.querySelectorAll('input[type="number"]').forEach(inputNumber => {
    inputNumber.oninput = () =>{
        if(inputNumber.Value.length > inputNumber.maxLength) inputNumber.value 
        = inputNumber.value.slice(0, inputNumber.maxLength);
    };
});