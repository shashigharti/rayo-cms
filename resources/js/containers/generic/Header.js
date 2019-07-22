import React, {Component} from 'react';
import {userActions} from "../../actions";
import {connect} from 'react-redux';
import {Link, withRouter} from 'react-router-dom';
import M from "materialize-css";
import {ImageSpan, SecondaryNav, Nav} from "../../components/Styled";

class Header extends Component {
    constructor(props) {
        super(props);
        this.handleLogout = this.handleLogout.bind(this);
    }

    componentDidMount() {
        let elems = document.querySelectorAll('.dropdown-menu, .profile-button, .notification-button, .translation-button, .dropdown-settings');
        let instances = M.Dropdown.init(elems, {
            inDuration: 300,
            outDuration: 225,
            constrainWidth: false,
            hover: false,
            gutter: 0,
            coverTrigger: false,
            alignment: "right",
            stopPropagation: true
        });
    }

    componentDidUpdate(prevProps, prevState, snapshot) {
        const {authentication, history} = this.props;
        if (!authentication.loggedIn) {
            console.log("Logging out");
            history.push('/login');
        }
    }

    handleLogout() {
        // reset login status
        this.props.dispatch(userActions.logout());
    }

    render() {
        const {user} = this.props;
        const fullName = user ? user.first_name + ' ' + user.last_name : 'NA';
        return (
            <header className="page-topbar" id="header">
                <div className="navbar navbar-fixed">
                    <Nav className="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-light-blue-cyan">
                        <div className="nav-wrapper">
                            <ul className="left">
                                <li>
                                    <a className="waves-effect waves-block waves-light"
                                       href="javascript:void(0);">
                                        <ImageSpan>
                                            <img src="/images/materialize-logo.png"
                                                 alt="materialize logo" width="100%"/></ImageSpan> Dashboard</a>
                                </li>
                            </ul>
                            <ul className="navbar-list right">
                                <li>
                                    <a className="waves-effect waves-block waves-light search-button"
                                       href="javascript:void(0);">
                                        <i className="material-icons">search</i>
                                    </a>
                                </li>
                                <li><a className="waves-effect waves-block waves-light profile-button"
                                       href="javascript:void(0);" data-target="profile-dropdown">
                                    <ImageSpan>
                                        <img src={`https://ui-avatars.com/api/?name=${fullName}&rounded=true&bold=true`}
                                             alt="avatar"/></ImageSpan></a>
                                </li>
                            </ul>
                            <ul className="dropdown-content" id="profile-dropdown">
                                <li><Link className="grey-text text-darken-1" to="/"><i
                                    className="material-icons">person_outline</i> Profile</Link></li>
                                <li><a className="grey-text text-darken-1" href="page-faq.html"><i
                                    className="material-icons">help_outline</i> Help</a></li>
                                <li className="divider"></li>
                                <li><a className="grey-text text-darken-1" href="#" onClick={this.handleLogout}><i
                                    className="material-icons">keyboard_tab</i> Logout</a></li>
                            </ul>
                        </div>
                        {/*<nav className="display-none search-sm">*/}
                        {/*    <div className="nav-wrapper">*/}
                        {/*        <form>*/}
                        {/*            <div className="input-field">*/}
                        {/*                <input className="search-box-sm" type="search" required=""/>*/}
                        {/*                <label className="label-icon" htmlFor="search"><i*/}
                        {/*                    className="material-icons search-sm-icon">search</i></label><i*/}
                        {/*                className="material-icons search-sm-close">close</i>*/}
                        {/*            </div>*/}
                        {/*        </form>*/}
                        {/*    </div>*/}
                        {/*</nav>*/}
                    </Nav>
                    <SecondaryNav className="white hide-on-med-and-down" id="horizontal-nav">
                        <div className="nav-wrapper">
                            <ul className="left hide-on-med-and-down" id="ul-horizontal-nav"
                                data-menu="menu-navigation">
                                <li>
                                    <Link to="/">
                                        <i className="material-icons">dashboard</i>
                                        <span>Dashboard</span>
                                    </Link>
                                </li>
                                <li>
                                    <Link to="/map">
                                        <i className="material-icons">map</i>
                                        <span>Map</span>
                                    </Link>
                                </li>
                                <li>
                                    <Link to="/profile-reports">
                                        <i className="material-icons">note</i>
                                        <span>Profile Reports</span>
                                    </Link>
                                </li>
                            </ul>
                        </div>
                    </SecondaryNav>
                </div>
            </header>
        );
    }
}


function mapStateToProps(state) {
    const {users, authentication} = state;
    const {user} = authentication;
    return {
        user,
        users,
        authentication
    };
}

const connectedHeader = connect(mapStateToProps)(Header);
const connectedWithRouter = withRouter(connectedHeader);
export default connectedWithRouter;
