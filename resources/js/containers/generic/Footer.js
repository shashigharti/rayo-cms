import React, {Component} from 'react';

class Footer extends Component {
    render() {
        return (
            <footer
                className="page-footer footer footer-static footer-dark gradient-45deg-light-blue-cyan gradient-shadow navbar-border navbar-shadow">
                <div className="footer-copyright">
                    <div className="container">
                        <span>&copy; {new Date().getFullYear()}
                            <a href="/" target="_blank"> ROBUST IT CONCEPTS</a> All rights reserved.
                        </span>
                    </div>
                </div>
            </footer>
        );
    }
}

export default Footer;
