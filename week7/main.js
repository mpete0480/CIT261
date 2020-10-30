const textButton = document.querySelector('#number');
const apiButton = document.querySelector('#chuck');
const outputDiv = document.querySelector('#output');

const textURL = `http://numbersapi.com/random`;
const apiURL = `https://api.chucknorris.io/jokes/random`;

textButton.addEventListener('click',()=> {
    fetch (textURL)
    .then ( response => {
        outputDiv.innerHTML = 'Waiting for response...';
    if (response.ok) {
        return response;
    }
        throw Error(response.statusText);
    })
    .then ( response => response.text() )
    .then ( text => outputDiv.innerText = text )
    .catch( error => console.log('There was an error:',error))
},false);

apiButton.addEventListener('click',()=> {
    fetch (textURL)
    .then ( response => {
        outputDiv.innerHTML = 'Waiting for response...';
    if (response.ok) {
        return response;
    }
        throw Error(response.statusText);
    })
    .then ( response => response.text() )
    .then ( text => outputDiv.innerText = text )
    .catch( error => console.log('There was an error:',error))
},false);