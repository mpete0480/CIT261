import {qs, onTouch, renderTodoList} from './utilities.js';
import {readFromLS, writeToLS } from './ls.js';

class Todo{
    constructor(){
        this.todoElement = document.querySelector('#todos');
        this.todoKey = 'toDoList';
    } 

    /**
     * Add a method to the Todos class called listTodos().  
     * It should use the renderTodoList function to output our todo list when called.
     * It should get called when a todo is added, or removed, and when the Todos class is instantiated.
     */

    listTodo = ()=>{
        //console.log('this fired');
        var listOfTodos = getTodos(this.todoKey);
        renderTodoList(listOfTodos,this.todoElement);
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

