import * as React from 'react';
import ApiList from './ApiList';
import axios from 'axios';

export default class DeleteApi extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
          id : 0
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

        axios.delete('http://127.0.0.1/apis/' + this.state.id, {
            name: this.state.name,
            url: this.state.url,
            description: this.state.description
          },{
            headers: {
              'Authorization': `Basic ${Buffer.from(`admin:notasafepassword`, 'utf8').toString('base64')}` 
            }
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
                <input type="submit" value="POST" />
            </form>
        );
    }
}