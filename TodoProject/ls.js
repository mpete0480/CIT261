/**
 * read a value from local storage and parse it as JSON 
 * @param {string} key The key under which the value is stored under in LS
 * @return {array} The value as an array of objects
 */


function readFromLS(key){
    var data = localStorage.getItem(key);
    var parsedData = JSON.parse(data);
    return parsedData;
}

/**
 * write an array of objects to local storage under the provided key
 * @param {*} key The key under which the value is stored under in LS
 * @param {*} data The information to be stored as an array of objects. 
 * must be serialized
 */

function writeToLS(key,data){ 
    localStorage.setItem(key,JSON.stringify(data));

}


export {readFromLS, writeToLS };