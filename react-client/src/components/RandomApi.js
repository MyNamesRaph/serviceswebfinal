import * as React from 'react';
import axios from 'axios';

export default class RandomApi extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            min: 0,
            max: 100
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

        axios.get(`http://www.randomnumberapi.com/api/v1.0/random?min=${this.state.min}&max=${this.state.max}&count=1`, {
          })
          .then(function (response) {
            alert(response.data);
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
                Min: <input type = "number" name = "min" value={this.state.min} onChange={this.handleChange} />
                </label>
                <label>
                Max: <input type="number" name = "max" value={this.state.max} onChange={this.handleChange} />
                </label>
                <input type="submit" value="POST" />
            </form>
        );
    }
}