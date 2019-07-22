import React, {Component} from 'react';
import {Chart} from 'react-chartjs-3';

class EarningsChart extends Component {
    
    componentDidMount() {
        const {labels, data, colorStart, colorStop, id} = this.props.chart.chartData;

        Chart.defaults.earnningLineShadow = Chart.defaults.line;
        let draw = Chart.controllers.line.prototype.draw;
        let custom = Chart.controllers.line.extend({
            draw: function () {
                draw.apply(this, arguments);
                let ctx = this.chart.chart.ctx;
                let _stroke = ctx.stroke;
                ctx.stroke = function () {
                    ctx.save();
                    ctx.shadowColor = "rgba(255, 111, 0, 0.3";
                    ctx.shadowBlur = 14;
                    ctx.shadowOffsetX = 2;
                    ctx.shadowOffsetY = 16;
                    _stroke.apply(this, arguments);
                    ctx.restore();
                };
            }
        });
        Chart.controllers.earnningLineShadow = custom;

//Chart gradient strock
        let Earningctx = document.getElementById(id).getContext("2d");
        let gradientStroke = Earningctx.createLinearGradient(500, 0, 0, 200);
        gradientStroke.addColorStop(0, colorStart);
        gradientStroke.addColorStop(1, colorStop);
//Chart data
        let earningChartData = {
            labels,
            datasets: [
                {
                    label: "This year dataset",
                    lineTension: 0,
                    fill: false,
                    pointRadius: 0,
                    pointBorderWidth: 0,
                    borderColor: gradientStroke,
                    borderWidth: 3,
                    data
                }
            ]
        };

        let earningChartOptions = {
            responsive: true,
            maintainAspectRatio: true,
            datasetStrokeWidth: 3,
            pointDotStrokeWidth: 4,
            tooltipFillColor: "rgba(0,0,0,0.6)",
            layout: {
                padding: {
                    left: 50,
                    right: 0,
                    top: 0,
                    bottom: 0
                }
            },
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
                        display: false
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

        let MonthlyEarningChart = new Chart(Earningctx, {
            type: "earnningLineShadow",
            data: earningChartData,
            options: earningChartOptions
        });
    }

    render() {
        const {title, period, earning} = this.props.chart.cardLabels;
        const {id} = this.props.chart.chartData;
        return (
            <div id="weekly-earning" className="card animate fadeUp">
                <div className="card-content">
                    <h4 className="header m-0">{title}<i
                        className="material-icons right grey-text lighten-3">more_vert</i>
                    </h4>
                    <p className="no-margin grey-text lighten-3 medium-small">{period}</p>
                    <h3 className="header">{earning}<i
                        className="material-icons deep-orange-text text-accent-2">arrow_upward</i>
                    </h3>
                    <canvas id={id} className="" height="150" />
                    <div className="center-align">
                        <p className="lighten-3">Total Weekly Earning</p>
                        <a className="waves-effect waves-light btn gradient-45deg-purple-deep-orange gradient-shadow">View
                            Full</a>
                    </div>
                </div>
            </div>
        );
    }
}

export default EarningsChart;
