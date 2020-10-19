/**
 * do a querySelector lookup
 * @param  {string} selector The selector passed to querySelector
  * @return {element}     The matching element or null if not found
 */

function qs(selector) { 

}


/**
 * add a touchend event listener to an element for mobile with a click event fallback for desktops
 * @param  {string} elementSelector The selector for the element to attach the listener to
* @param {function} callback The callback function to run
 */

function onTouch(elementSelector, callback) {

 }

 /**
 * foreach todo in list, build a li element for the todo, and append it to element
 * @param  {array} list The list of tasks to render to HTML
* @param {element} element The DOM element to insert our list elements into.
 
 */
function renderTodoList(list, element) { 
    //clear the current list
    element.innerHTML = '';
    list.forEach(todo =>{
        const item = document.createElement("li");
        item.setAttribute('data-name',todo.id);
        item.innerHTML = `
        <li>
             <input type="checkbox" class="checkDone"><label for ="todo1" class="todoLabel">${todo.content}</label><button class="deleteTask">X</button>
        </li>`
        element.appendChild(item);
        
    })
}

 export {qs, onTouch, renderTodoList};