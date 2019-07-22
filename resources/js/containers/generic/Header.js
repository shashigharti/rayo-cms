import React, {Component} from 'react';
import {userActions} from "../../actions";
import {connect} from 'react-redux';
import {Link} from 'react-router-dom';
import {withRouter} from 'react-router-dom';
import M from "materialize-css";

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
        if(!authentication.loggedIn) {
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
                    <nav
                        className="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-light-blue-cyan">
                        <div className="nav-wrapper">
                            <ul className="left">
                                <li>
                                    <h1 className="logo-wrapper">
                                        <Link className="brand-logo darken-1" to="/">
                                            <img src="/images/materialize-logo.png"
                                                alt="materialize logo"/><span
                                                className="logo-text hide-on-med-and-down">Dashboard</span>
                                        </Link></h1>
                                </li>
                            </ul>
                            <ul className="navbar-list right">
                                <li className="hide-on-med-and-down"><a
                                    className="waves-effect waves-block waves-light translation-button"
                                    href="javascript:void(0);" data-target="translation-dropdown"><span
                                    className="flag-icon flag-icon-gb"></span></a></li>
                                <li className="hide-on-large-only"><a
                                    className="waves-effect waves-block waves-light search-button"
                                    href="javascript:void(0);"><i className="material-icons">search </i></a></li>
                                <li><a className="waves-effect waves-block waves-light notification-button"
                                       href="javascript:void(0);" data-target="notifications-dropdown"><i
                                    className="material-icons">notifications_none
                                    <small className="notification-badge orange accent-3">5</small>
                                </i></a></li>
                                <li><a className="waves-effect waves-block waves-light profile-button"
                                       href="javascript:void(0);" data-target="profile-dropdown"><span
                                    className="avatar-status avatar-online">
                                    <img src={`https://ui-avatars.com/api/?name=${fullName}&rounded=true&bold=true`} alt="avatar"/><i></i></span></a>
                                </li>
                                <li><a className="waves-effect waves-block waves-light sidenav-trigger" href="#"
                                       data-target="slide-out-right"><i
                                    className="material-icons">format_indent_increase</i></a></li>
                            </ul>
                            <ul className="dropdown-content" id="translation-dropdown">
                                <li><a className="grey-text text-darken-1" href="#!"><i
                                    className="flag-icon flag-icon-gb"></i> English</a></li>
                                <li><a className="grey-text text-darken-1" href="#!"><i
                                    className="flag-icon flag-icon-fr"></i> French</a></li>
                                <li><a className="grey-text text-darken-1" href="#!"><i
                                    className="flag-icon flag-icon-cn"></i> Chinese</a></li>
                                <li><a className="grey-text text-darken-1" href="#!"><i
                                    className="flag-icon flag-icon-de"></i> German</a></li>
                            </ul>
                            <ul className="dropdown-content" id="notifications-dropdown">
                                <li>
                                    <h6>NOTIFICATIONS<span className="new badge">5</span></h6>
                                </li>
                                <li className="divider"></li>
                                <li><a className="grey-text text-darken-2" href="#!"><span
                                    className="material-icons icon-bg-circle cyan small">add_shopping_cart</span> A
                                    new order has been placed!</a>
                                    <time className="media-meta" dateTime="2015-06-12T20:50:48+08:00">2 hours ago
                                    </time>
                                </li>
                                <li><a className="grey-text text-darken-2" href="#!"><span
                                    className="material-icons icon-bg-circle red small">stars</span> Completed the
                                    task</a>
                                    <time className="media-meta" dateTime="2015-06-12T20:50:48+08:00">3 days ago
                                    </time>
                                </li>
                                <li><a className="grey-text text-darken-2" href="#!"><span
                                    className="material-icons icon-bg-circle teal small">settings</span> Settings
                                    updated</a>
                                    <time className="media-meta" dateTime="2015-06-12T20:50:48+08:00">4 days ago
                                    </time>
                                </li>
                                <li><a className="grey-text text-darken-2" href="#!"><span
                                    className="material-icons icon-bg-circle deep-orange small">today</span> Director
                                    meeting started</a>
                                    <time className="media-meta" dateTime="2015-06-12T20:50:48+08:00">6 days ago
                                    </time>
                                </li>
                                <li><a className="grey-text text-darken-2" href="#!"><span
                                    className="material-icons icon-bg-circle amber small">trending_up</span> Generate
                                    monthly report</a>
                                    <time className="media-meta" dateTime="2015-06-12T20:50:48+08:00">1 week ago
                                    </time>
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
                        <nav className="display-none search-sm">
                            <div className="nav-wrapper">
                                <form>
                                    <div className="input-field">
                                        <input className="search-box-sm" type="search" required=""/>
                                        <label className="label-icon" htmlFor="search"><i
                                            className="material-icons search-sm-icon">search</i></label><i
                                        className="material-icons search-sm-close">close</i>
                                    </div>
                                </form>
                            </div>
                        </nav>
                    </nav>
                    <nav className="white hide-on-med-and-down" style={{
                        zIndex: '-1'
                    }} id="horizontal-nav">
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
                    </nav>
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
