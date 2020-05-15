/*const form = document.forms['search'];
const input = form.searchInput;

//input.addEventListener('focus', () => alert('focused'), false);
input.addEventListener('blur', () => alert('blurred'), false);
input.addEventListener('change', ()=>alert('changed'), false); */


const form = document.forms['search'];
const input = form.searchInput;
input.value = `Search Here`;
input.addEventListener('focus', function(){
    if (input.value ==='Search Here') {
        input.value = '';
    }
}, false);

input.addEventListener('blur', function() {
    if (input.value === '') {
        input.value = `Search Here`;
    }
}, false);
form.addEventListener('submit', search, false);
function search(){
    alert (`You searched for ${input.value}`);
    event.preventDefault();
}