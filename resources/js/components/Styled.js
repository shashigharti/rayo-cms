// All Styled Components
import styled from 'styled-components';

// Background for nav
const navBackground = `
    background: #0288d1;
    background: -webkit-linear-gradient(45deg, #0288d1, #26c6da) !important;
    background: -moz- oldlinear-gradient(45deg, #0288d1, #26c6da) !important;
    background: -o-linear-gradient(45deg, #0288d1, #26c6da) !important;
    background: linear-gradient(45deg, #0288d1, #26c6da) !important; 
`;

export const ImageSpan = styled.span`
    line-height: 50px;
    position: relative;
    display: inline-block;
    width: 28px;
    vertical-align: bottom;
    white-space: nowrap;
    border-radius: 50px;
    
    img {
        width: 100%;
    }
`;

// Header, top nav
export const Nav = styled.nav`
    ${navBackground}
`;

// Header, secondary nav (below top nav)
export const SecondaryNav = styled.nav`
    margin-top: 64px;
    z-index: -1;
    #ul-horizontal-nav > li > a {
        padding: 0 18px;
    }
    ul li {
        text-align: center;
    }
    ul li a i {
        font-size: 1.4rem;
        line-height: 45px;
        display: block;
        height: 0;
        color: #787878;
    }
    ul li a span {
        position: relative;
        top: 14px;
        color: rgba(0, 0, 0, 0.87);
    }
`;


export const Main = styled.div`
    margin-top: 100px;
    min-height: -webkit-calc(100% - 116px);
    min-height: -moz-calc(100% - 116px);
    min-height: calc(100% - 116px);
    padding-left: 0;
    -webkit-transition: .3s ease all;
    -moz-transition: .3s ease all;
    -o-transition: .3s ease all;
    transition: .3s ease all;
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    backface-visibility: hidden;
`;

// Footer
export const PageFooter = styled.div`
    ${navBackground}
    padding-top: 0px !important;
`;
