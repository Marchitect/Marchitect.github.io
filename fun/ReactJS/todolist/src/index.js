import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import TodoList from './TodoList';

var destination = document.querySelector('#container');

ReactDOM.render(
	<div>
	<h1>Add and delete your todo tasks or shopping items with ease. </h1>
	<TodoList/>
	</div>,
	destination
);
