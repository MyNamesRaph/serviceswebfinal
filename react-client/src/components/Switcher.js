import * as React from 'react';
import Button from '@mui/material/Button';
import GetApi from './GetApi';
import PostApi from './PostApi';
import PutApi from './PutApi';
import DeleteApi from './DeleteApi';
import RandomApi from './RandomApi';

export default class Switcher extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            page: 0,
        }
    }

    render() {
        if (this.state.page === 0) {
            return (
                <div>
                    <Button variant="contained" onClick={() => this.setState({ page: 0 })}>GET</Button>
                    <Button variant="contained" onClick={() => this.setState({ page: 1 })}>POST</Button>
                    <Button variant="contained" onClick={() => this.setState({ page: 2 })}>DELETE</Button>
                    <Button variant="contained" onClick={() => this.setState({ page: 3 })}>PUT</Button>
                    <Button variant="contained" onClick={() => this.setState({ page: 4 })}>RANDOM</Button>


                    <GetApi/>
                </div>
                
            )
        }
        if (this.state.page === 1) {
            return (
                <div>
                    <Button variant="contained" onClick={() => this.setState({ page: 0 })}>GET</Button>
                    <Button variant="contained" onClick={() => this.setState({ page: 1 })}>POST</Button>
                    <Button variant="contained" onClick={() => this.setState({ page: 2 })}>DELETE</Button>
                    <Button variant="contained" onClick={() => this.setState({ page: 3 })}>PUT</Button>
                    <Button variant="contained" onClick={() => this.setState({ page: 4 })}>RANDOM</Button>


                    <PostApi/>
                </div>
                
            )
        }
        if (this.state.page === 2) {
            return (
                <div>
                    <Button variant="contained" onClick={() => this.setState({ page: 0 })}>GET</Button>
                    <Button variant="contained" onClick={() => this.setState({ page: 1 })}>POST</Button>
                    <Button variant="contained" onClick={() => this.setState({ page: 2 })}>DELETE</Button>
                    <Button variant="contained" onClick={() => this.setState({ page: 3 })}>PUT</Button>
                    <Button variant="contained" onClick={() => this.setState({ page: 4 })}>RANDOM</Button>


                    <DeleteApi/>
                </div>
                
            )
        }
        if (this.state.page === 3) {
            return (
                <div>
                    <Button variant="contained" onClick={() => this.setState({ page: 0 })}>GET</Button>
                    <Button variant="contained" onClick={() => this.setState({ page: 1 })}>POST</Button>
                    <Button variant="contained" onClick={() => this.setState({ page: 2 })}>DELETE</Button>
                    <Button variant="contained" onClick={() => this.setState({ page: 3 })}>PUT</Button>
                    <Button variant="contained" onClick={() => this.setState({ page: 4 })}>RANDOM</Button>


                    <PutApi/>
                </div>
                
            )
        }

        if (this.state.page === 4) {
            return (
                <div>
                    <Button variant="contained" onClick={() => this.setState({ page: 0 })}>GET</Button>
                    <Button variant="contained" onClick={() => this.setState({ page: 1 })}>POST</Button>
                    <Button variant="contained" onClick={() => this.setState({ page: 2 })}>DELETE</Button>
                    <Button variant="contained" onClick={() => this.setState({ page: 3 })}>PUT</Button>
                    <Button variant="contained" onClick={() => this.setState({ page: 4 })}>RANDOM</Button>

                    <RandomApi/>
                </div>
            )
        }

        return <div></div>;
    }
}