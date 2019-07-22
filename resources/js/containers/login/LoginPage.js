import React from 'react';
import { Link } from 'react-router-dom';
import { connect } from 'react-redux';
import { Form } from './../../components';
import { userActions } from './../../actions';
// import materialize
import M from "materialize-css";

class LoginPage extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            username: '',
            password: '',
            submitted: false
        };

        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    handleChange(e) {
        const { name, value } = e.target;
        this.setState({ [name]: value });
    }

    handleSubmit(e) {
        e.preventDefault();

        this.setState({ submitted: true });
        // const { username, password } = this.state;
        let email = e.target.elements.email.value;
        let password = e.target.elements.password.value;
        const { dispatch } = this.props;
        if (email && password) {
            dispatch(userActions.login(email, password));
        } else {
            alert("Please enter valid email / password");
        }
    }


    componentDidUpdate(prevProps, prevState, snapshot) {
        // If Logged in redirect to dashboard.
        const {authentication, alert, history} = this.props;
        authentication.loggedIn && history.push('/');

        if(alert.type !== prevProps.alert.type) {
            M.toast({html: alert.message});
            alert.type = ''; // Reset alert after user alerted
        }
    }

    render() {
        const { loggingIn } = this.props;
        const { username, password, submitted } = this.state;
        return (

            <div className="container">
                <div className="row">
                    <div className="col s12 m5 z-depth-4 card-panel border-radius-6 bg-opacity-8 offset-m3">
                        <h2 className="center-align">Login</h2>
                        <Form className="login-form" onSubmit={this.handleSubmit}>
                            <div className="row">
                                <div className="col s12 center-align">
                                    {/* <img src={logo} alt="Logo" className="responsive-img"/> */}
                                    <small>LG Profile MIS</small>
                                </div>
                            </div>
                            <div className="row margin">
                                <div className="input-field col s12">
                                    <i className="material-icons prefix pt-2">person_outline</i>
                                    <input id="email" name="email" type="text" className="validate" />
                                    <label htmlFor="email" className="center-align">Email</label>
                                </div>
                            </div>
                            <div className="row margin">
                                <div className="input-field col s12">
                                    <i className="material-icons prefix pt-2">lock_outline</i>
                                    <input id="current-password" name="password" type="password" className="validate" />
                                    <label htmlFor="current-password">Password</label>
                                </div>
                            </div>
                            <div className="row">
                                <div className="input-field col s12">
                                    <button className="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange  light-blue darken-3 col s12">Login </button>
                                </div>
                            </div>
                        </Form>
                        <div>
                            <p>Not Registered Yet? <Link to="/register">Register</Link></p>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

function mapStateToProps(state) {
    const {authentication, alert} = state;
    return {
        authentication, alert
    };
}

const connectedLoginPage = connect(mapStateToProps)(LoginPage);
export { connectedLoginPage as LoginPage }; 
