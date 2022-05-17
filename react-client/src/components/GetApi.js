import * as React from 'react';
import ApiList from './ApiList';
import axios from 'axios';

export default class GetApi extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            isLoading: true,
            rows : []
        }
    }

    render() {
        if (this.state.isLoading) {
            return <div>Loading...</div>;
        }
        
        return (
            <ApiList rows={this.state.rows}/>
        );
    }

    componentDidMount() {
        axios.get('http://127.0.0.1/apis')
        .then( (response) => {
            this.setState({
                rows:response.data,
                isLoading: false
            });
        })
    }
}