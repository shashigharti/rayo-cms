import React from 'react';
import {connect} from 'react-redux';
import {userActions} from './../../actions';
import Header from '../generic/Header';
import Footer from '../generic/Footer';
let CanvasJSChart = CanvasJSReact.CanvasJSChart;


class Dashboard extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            options: {
                animationEnabled: true,
                title:{
                    text: "Monthly Sales - 2017"
                },
                axisX: {
                    valueFormatString: "MMM"
                },
                axisY: {
                    title: "Sales (in USD)",
                    prefix: "$",
                    includeZero: false
                },
                data: [{
                    yValueFormatString: "$#,###",
                    xValueFormatString: "MMMM",
                    type: "spline",
                    dataPoints: [
                        { x: new Date(2017, 0), y: 25060 },
                        { x: new Date(2017, 1), y: 27980 },
                        { x: new Date(2017, 2), y: 42800 },
                        { x: new Date(2017, 3), y: 32400 },
                        { x: new Date(2017, 4), y: 35260 },
                        { x: new Date(2017, 5), y: 33900 },
                        { x: new Date(2017, 6), y: 40000 },
                        { x: new Date(2017, 7), y: 52500 },
                        { x: new Date(2017, 8), y: 32300 },
                        { x: new Date(2017, 9), y: 42000 },
                        { x: new Date(2017, 10), y: 37160 },
                        { x: new Date(2017, 11), y: 38400 }
                    ]
                }]
            },
            pieChartOptions: {
                exportEnabled: true,
                animationEnabled: true,
                title: {
                    text: "Web Traffic"
                },
                data: [{
                    type: "pie",
                    startAngle: 75,
                    toolTipContent: "<b>{label}</b>: {y}%",
                    showInLegend: "true",
                    legendText: "{label}",
                    indexLabelFontSize: 16,
                    indexLabel: "{label} - {y}%",
                    dataPoints: [
                        { y: 18, label: "Direct" },
                        { y: 49, label: "Organic Search" },
                        { y: 9, label: "Paid Search" },
                        { y: 5, label: "Referral" },
                        { y: 19, label: "Social" }
                    ]
                }]
            },
            mSeriesChartOptions: {
                animationEnabled: true,
                title:{
                    text: "Number of New Customers"
                },
                axisY : {
                    title: "Number of Customers",
                    includeZero: false
                },
                toolTip: {
                    shared: true
                },
                data: [{
                    type: "spline",
                    name: "2016",
                    showInLegend: true,
                    dataPoints: [
                        { y: 155, label: "Jan" },
                        { y: 150, label: "Feb" },
                        { y: 152, label: "Mar" },
                        { y: 148, label: "Apr" },
                        { y: 142, label: "May" },
                        { y: 150, label: "Jun" },
                        { y: 146, label: "Jul" },
                        { y: 149, label: "Aug" },
                        { y: 153, label: "Sept" },
                        { y: 158, label: "Oct" },
                        { y: 154, label: "Nov" },
                        { y: 150, label: "Dec" }
                    ]
                },
                    {
                        type: "spline",
                        name: "2017",
                        showInLegend: true,
                        dataPoints: [
                            { y: 172, label: "Jan" },
                            { y: 173, label: "Feb" },
                            { y: 175, label: "Mar" },
                            { y: 172, label: "Apr" },
                            { y: 162, label: "May" },
                            { y: 165, label: "Jun" },
                            { y: 172, label: "Jul" },
                            { y: 168, label: "Aug" },
                            { y: 175, label: "Sept" },
                            { y: 170, label: "Oct" },
                            { y: 165, label: "Nov" },
                            { y: 169, label: "Dec" }
                        ]
                    }]
            }
        };
    }

    componentDidMount() {
        this.props.dispatch(userActions.getAll());
    }

    handleDeleteUser(id) {
        return (e) => this.props.dispatch(userActions.delete(id));
    }

    render() {
        const {user, users} = this.props;
        let {options, pieChartOptions, mSeriesChartOptions} = this.state;
        return (
            <div>
                <Header/>
                <div id="main">
                    <div className="row">
                        <div className="col s12">
                            <div className="container">
                                <div id="daily-data-chart">
                                    <div className="row">
                                        <div className="col s12">
                                            <CanvasJSChart options={mSeriesChartOptions} />
                                        </div>
                                    </div>
                                </div>
                                <div id="sales-chart">
                                    <div className="row">
                                        <div className="col s12 m8 l8">
                                            <CanvasJSChart options = {options}/>
                                        </div>
                                        <div className="col s12 m4 l4">
                                            <CanvasJSChart options = {pieChartOptions}/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
