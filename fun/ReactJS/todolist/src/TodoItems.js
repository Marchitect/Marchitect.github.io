import React, {Component} from 'react';
import FlipMove from 'react-flip-move';

class TodoItems extends React.Component {
	constructor(props, context){
		super(props, context);

		this.createTasks =  this.createTasks.bind(this);
		this.deleteTasks = this.deleteTasks.bind(this);
	}

	createTasks(item){
		return <li onDoubleClick={(e)=>this.deleteTasks(item.key, e)}

		key={item.key} > {item.text} </li>
	}

	deleteTasks(key){
		this.props.deleteTasks(key);
	}

	render(){
		var todoEntries = this.props.entries;
		var listItems = todoEntries.map(this.createTasks);

		return(
			<ul className="theList">
				<FlipMove duration={250} easing="ease-out">
				{listItems}
				</FlipMove>
			</ul>
		);
	}
};

export default TodoItems;