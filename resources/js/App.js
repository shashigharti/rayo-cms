import React from 'react';
import {BrowserRouter as Router, Route} from 'react-router-dom';
import {connect} from 'react-redux';
import {HomePage} from './containers/home/Dashboard';
import {LoginPage} from './containers/login/LoginPage';
import {RegisterPage} from './containers/register/RegisterPage';
// import materialize
import M from "materialize-css";
import 'materialize-css/dist/css/materialize.min.css'
import {PrivateRoute} from "./components";
import * as serviceWorker from './serviceWorker';


class App extends React.Component {
    constructor(props) {
        super(props);
        const {dispatch} = this.props;
    }

    componentDidMount() {
        M.AutoInit();

        // Register service worker
        serviceWorker.register();
    }

    render() {
        const {alert} = this.props;
        return (
            <div>
                <Router>
                    <PrivateRoute exact path="/" component={HomePage}/>
                    <Route path="/login" component={LoginPage}/>
                    <Route path="/register" component={RegisterPage}/>
                </Router>
            </div>
        );
    }
}

function mapStateToProps(state) {
    const {alert} = state;
    return {
        alert
    };
}

const connectedApp = connect(mapStateToProps)(App);
export {connectedApp as App};
