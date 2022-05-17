import * as React from 'react';
import ApiList from './ApiList';
import axios from 'axios';

export default class PutApi extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            id : 0,
            name: "",
            url: "",
            description: ""
        }
    }

    handleChange = (event) => {
        const target = event.target;
        const value = target.value;
        const name = target.name;
    
        this.setState({
          [name]: value
        });
      }
    
      handleSubmit = (event) => {

        axios.put('http://127.0.0.1/apis/' + this.state.id, {
            name: this.state.name,
            url: this.state.url,
            description: this.state.description
          })
          .then(function (response) {
            alert(response);
          })
          .catch(function (error) {
            console.log(error);
          });
        event.preventDefault();
      }

    render() {
        return (
            <form onSubmit={this.handleSubmit}>
                <label>
                Id: <input type = "number" name = "id" value={this.state.id} onChange={this.handleChange} />
                </label>
                <label>
                Nom: <input name = "name" value={this.state.name} onChange={this.handleChange} />
                </label>
                <label>
                URL: <input type="text" name = "url" value={this.state.url} onChange={this.handleChange} />
                </label>
                <label>
                Description: <input type="text" name = "description" value={this.state.description} onChange={this.handleChange} />
                </label>
                <input type="submit" value="POST" />
            </form>
        );
    }
}