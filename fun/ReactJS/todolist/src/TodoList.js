import React, {Component} from 'react';
import TodoItems from './TodoItems';
import './TodoList.css';

class TodoList extends React.Component {
	constructor(props, context){
		super(props, context);

		this.state = {
			items: []
		};
		this.addItem = this.addItem.bind(this);
		this.deleteItem = this.deleteItem.bind(this);
	}

	addItem(e){
		var itemArray = this.state.items;

		var file = './data.json';

		if(this._inputElement.value !== ""){
			itemArray.unshift(
			{
				text: this._inputElement.value,
				key: Date.now()
			});

			this.setState({
				items: itemArray
			})

			this._inputElement.value = "";
		}

		console.log(itemArray);

		e.preventDefault();
	}

	deleteItem(key){
		var filteredItems = this.state.items.filter(function (item){
			return (item.key !== key);
		});

		this.setState({
			items: filteredItems

		});
	}

	render() {
		return (
			<div className="todoListMain">
				<div className = "header">
					<form onSubmit={this.addItem}>
						<input ref={(a)=>this._inputElement = a}

						placeholder="enter task">
						</input>
						<button type="submit">Add</button>
					</form>
				</div>
				<TodoItems entries = {this.state.items} 

					deleteTasks={this.deleteItem}/>
			</div>
		);
	}

};

export default TodoList;