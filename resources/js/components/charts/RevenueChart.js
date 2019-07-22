import React, {Component} from 'react';
import {Chart} from 'react-chartjs-3';

class RevenueChart extends Component {
    
    componentDidMount() {
        const {presentDataSet, pastDataSet, id1, id2} = this.props.chart;
        // Line chart with color shadow: Revenue for 2018 Chart
        let thisYearctx = document.getElementById(id1).getContext("2d");
        let lastYearctx = document.getElementById(id2).getContext("2d");

        // Chart shadow LineAlt
        Chart.defaults.LineAlt = Chart.defaults.line;
        let draw = Chart.controllers.line.prototype.draw;
        let custom = Chart.controllers.line.extend({
            draw: function () {
                draw.apply(this, arguments);
                let ctx = this.chart.chart.ctx;
                let _stroke = ctx.stroke;
                ctx.stroke = function () {
                    ctx.save();
                    ctx.shadowColor = "rgba(156, 46, 157,0.5)";
                    ctx.shadowBlur = 20;
                    ctx.shadowOffsetX = 2;
                    ctx.shadowOffsetY = 20;
                    _stroke.apply(this, arguments);
                    ctx.restore();
                };
            }
        });
        Chart.controllers.LineAlt = custom;

        // Chart shadow LineAlt2
        Chart.defaults.LineAlt2 = Chart.defaults.line;
        draw = Chart.controllers.line.prototype.draw;
        custom = Chart.controllers.line.extend({
            draw: function () {
                draw.apply(this, arguments);
                let ctx = this.chart.chart.ctx;
                let _stroke = ctx.stroke;
                ctx.stroke = function () {
                    ctx.save();
                    _stroke.apply(this, arguments);
                    ctx.restore();
                };
            }
        });
        Chart.controllers.LineAlt2 = custom;

        let thisYearData = presentDataSet;

        let lastYearData = pastDataSet;
        let thisYearOption = {
            responsive: true,
            maintainAspectRatio: true,
            datasetStrokeWidth: 3,
            pointDotStrokeWidth: 4,
            tooltipFillColor: "rgba(0,0,0,0.6)",
            legend: {
                display: false,
                position: "bottom"
            },
            hover: {
                mode: "label"
            },
            scales: {
                xAxes: [
                    {
                        display: false
                    }
                ],
                yAxes: [
                    {
                        ticks: {
                            padding: 10,
                            stepSize: 20,
                            max: 100,
                            min: 0,
                            fontColor: "#9e9e9e"
                        },
                        gridLines: {
                            display: true,
                            drawBorder: false,
                            lineWidth: 1,
                            zeroLineColor: "#e5e5e5"
                        }
                    }
                ]
            },
            title: {
                display: false,
                fontColor: "#FFF",
                fullWidth: false,
                fontSize: 40,
                text: "82%"
            }
        };
        let lastYearOption = {
            responsive: true,
            maintainAspectRatio: true,
            datasetStrokeWidth: 3,
            pointDotStrokeWidth: 4,
            tooltipFillColor: "rgba(0,0,0,0.6)",
            legend: {
                display: false,
                position: "bottom"
            },
            hover: {
                mode: "label"
            },
            scales: {
                xAxes: [
                    {
                        display: false
                    }
                ],
                yAxes: [
                    {
                        ticks: {
                            padding: 10,
                            stepSize: 20,
                            max: 100,
                            min: 0
                        },
                        gridLines: {
                            display: true,
                            drawBorder: false,
                            lineWidth: 1
                        }
                    }
                ]
            },
            title: {
                display: false,
                fontColor: "#FFF",
                fullWidth: false,
                fontSize: 40,
                text: "82%"
            }
        };

        // This Year Chart
        new Chart(thisYearctx, {
            type: "LineAlt",
            data: thisYearData,
            options: thisYearOption
        });

        // Last Year Chart
        new Chart(lastYearctx, {
            type: "LineAlt2",
            data: lastYearData,
            options: lastYearOption
        });
    }

    render() {
        const {title, percent} = this.props.chart.cardLabels;
        const {id1, id2} = this.props.chart;
        return (
            <div id="revenue-chart" className="card animate fadeUp">
                <div className="card-content">
                    <h4 className="header mt-0">
                        {title}
                        <span className="purple-text small text-darken-1 ml-1">
                     <i className="material-icons">keyboard_arrow_up</i> {percent} %</span>
                        <a className="waves-effect waves-light btn gradient-45deg-purple-deep-orange gradient-shadow right">Details</a>
                    </h4>
                    <div className="row">
                        <div className="col s12">
                            <div className="yearly-revenue-chart">
                                <canvas id={id1} className="firstShadow"
                                        height="350" />
                                <canvas id={id2} height="350" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default RevenueChart;
