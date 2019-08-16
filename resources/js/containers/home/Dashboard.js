import React from 'react';
import {connect} from 'react-redux';
import {userActions} from './../../actions';
import Header from '../generic/Header';
import Footer from '../generic/Footer';
import {Main} from "../../components/Styled";


class Dashboard extends React.Component {
    constructor(props) {
        super(props);
    }

    componentDidMount() {
        this.props.dispatch(userActions.getAll());
    }

    handleDeleteUser(id) {
        return (e) => this.props.dispatch(userActions.delete(id));
    }

    render() {
        const {user, users} = this.props;
        return (
            <div>
                <Header/>
                <Main>
                    <div className="row">
                        <div className="col s12">
                            <div className="container">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At culpa dolores eos, est in itaque laborum nostrum odit omnis, provident quam quibusdam, quis reprehenderit veniam voluptate. Adipisci est quasi sed.
                            </div>
                        </div>
                    </div>
                </Main>
                <Footer/>
            </div>
        )
    }
}

function mapStateToProps(state) {
    const {users, authentication} = state;
    const {user} = authentication;
    return {
        user,
        users
    };
}

const connectedHomePage = connect(mapStateToProps)(Dashboard);
export {connectedHomePage as HomePage};
