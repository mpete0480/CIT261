import {qs, onTouch} from './utilities.js';
import {readFromLS, writeToLS } from './ls.js';

class Todo{
    constructor(){
        this.todoElement = document.querySelector('#todos');
        this.todoKey = 'toDoList';
        this.listTodo();
    } 

 /**
 * foreach todo in list, build a li element for the todo, and append it to element
 * @param  {array} list The list of tasks to render to HTML
* @param {element} element The DOM element to insert our list elements into.
 */
renderTodoList = (list, element) =>{ 
    //clear the current list
    element.innerHTML = '';
    list.forEach(todo =>{
        const item = document.createElement("li");
        item.setAttribute('data-name',todo.id);
        item.innerHTML = `
        <li>
            <input type="checkbox" class="checkDone"><label for ="todo1" class="todoLabel">${todo.content}</label><button class="deleteTask" data-name="${todo.id}" id="delete${todo.id}">X</button>
        </li>`
        var eselector = `#delete${todo.id}`;
        element.appendChild(item);
        onTouch(eselector,this.removeTodo);
    })
}

    /**
     * Add a method to the Todos class called listTodos().  
     * It should use the renderTodoList function to output our todo list when called.
     * It should get called when a todo is added, or removed, and when the Todos class is instantiated.
     */

    listTodo = () =>{
        //console.log('this fired');
        var listOfTodos = getTodos(this.todoKey);
        this.renderTodoList(listOfTodos,this.todoElement);
        const tasksLeft = listOfTodos.length;
        document.querySelector('#tasksLeft').innerHTML = `Tasks Left ${tasksLeft}`;
    }
    /**
     * Add a method to the Todos class called addTodo. 
     * It should grab the input in the html where users enter the 
     * text of the task, then send that along with the key to a SaveTodo() function.  
     * Then update the display with the current list of tasks
     */
    addTodo = (event) =>{
        event.preventDefault();
        var newEntry = document.querySelector('#newEntry').value;
        var newKey = Date.now();
        saveTodo(newEntry,newKey);
        this.listTodo();
        document.querySelector('#newEntry').value = '';
        
    }

    /**
    * 
    * @param {string} todoId 
    */
    removeTodo = (event) => {
    var todoElement = event.target;
    var todoId = todoElement.getAttribute('data-name');
    var todoList = readFromLS('toDoList');
    const filteredToDoList = todoList.filter((item) => item.id != todoId);
    writeToLS(this.todoKey,filteredToDoList);
    this.listTodo();
    }




   
}

var todoList = null;

/**
 * build a todo object, add it to the todoList, and save the new list to local storage.
 * @param  {string} key The key under which the value is stored under in LS
* @param {string} task The text of the task to be saved. 

 */
function saveTodo(task, key) { 
    //build the new object
    var newTodo = {id: key, content: task, completed: false};
    //get the current todoList
    var todoList = getTodos('toDoList');
    //add task to list
    if (todoList === null){
        todoList = [];
    }
    todoList.push(newTodo);
    //save list
    writeToLS('toDoList',todoList);
    

}

/**
 * check the contents of todoList, a local variable containing a list of ToDos. 
 * If it is null then pull the list of todos from localstorage, 
 * update the local variable, and return it
 * @param  {string} key The key under which the value is stored under in LS
  * @return {array}     The value as an array of objects
 */
function getTodos(key) { 
    if (todoList === null){
         return readFromLS('toDoList');
    } else{
        return todoList;
    }
}

export {Todo};

