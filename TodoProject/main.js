import {readFromLS, writeToLS } from './ls.js';
import {Todo} from './todos.js';

var myTodo = new Todo; 
const testButton = document.querySelector('#addTodo');

testButton.addEventListener('click',myTodo.addTodo);


