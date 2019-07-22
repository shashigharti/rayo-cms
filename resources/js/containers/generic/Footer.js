import React, {Component} from 'react';
import {PageFooter} from "../../components/Styled";

class Footer extends Component {
    render() {
        return (
            <PageFooter className="page-footer">
                <div className="footer-copyright">
                    <div className="container center-align">
                        <span>&copy; {new Date().getFullYear()}
                            <a href="/" className="white-text" target="_blank"> ROBUST IT CONCEPTS</a> All rights reserved.
                        </span>
                    </div>
                </div>
            </PageFooter>
        );
    }
}

export default Footer;
