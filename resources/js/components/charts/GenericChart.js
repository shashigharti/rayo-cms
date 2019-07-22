import React, {Component} from 'react';
import {Chart} from "react-chartjs-3";

class GenericChart extends Component {
    componentDidMount() {
        const {id, context, gradientStroke, gradientFill, xaxis} = this.props.options.chart;
        let SLOption = {
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

        let LineSL1ctx = document.getElementById(id).getContext(context);
        let gStroke; // Gradient Stroke for Chart
        let gFill; // Gradient Fill for Chart

        if (gradientStroke.type === 'linear') {
            let {x0, y0, x1, y1} = gradientStroke.coordinates;
            gStroke = LineSL1ctx.createLinearGradient(x0, y0, x1, y1);
            gradientStroke.colorStop.forEach(stop => {
                let {offset, color} = stop;
                gStroke.addColorStop(offset, color);
            });
        } // Add more types as necessary

        if (gradientFill.type === 'linear') {
            let {x0, y0, x1, y1} = gradientFill.coordinates;
            gFill = LineSL1ctx.createLinearGradient(x0, y0, x1, y1);
            gradientFill.colorStop.forEach(stop => {
                let {offset, color} = stop;
                gFill.addColorStop(offset, color);
            });
        } // Add more types as necessary

        new Chart(LineSL1ctx, {
            type: "line",
            data: {
                labels: xaxis.labels,
                datasets: [
                    {
                        data: xaxis.data,
                        label: "My First Dataset",
                        borderColor: gStroke,
                        pointColor: "#fff",
                        pointBorderColor: gStroke,
                        pointBackgroundColor: "#fff",
                        pointHoverBackgroundColor: gStroke,
                        pointHoverBorderColor: gStroke,
                        pointRadius: 4,
                        pointBorderWidth: 1,
                        pointHoverRadius: 4,
                        pointHoverBorderWidth: 1,
                        fill: true,
                        backgroundColor: gFill,
                        borderWidth: 1,
                    }
                ]
            },
            options: SLOption
        });
    }

    render() {
        const {title, subTitle, dataLabel, rightLabel} = this.props.options.cardLabels;
        const {id} = this.props.options.chart;
        return (
            <div className="card pt-0 pb-0 animate fadeLeft">
                <div className="padding-2 ml-2">
                    <span className="new badge gradient-45deg-light-blue-cyan gradient-shadow mt-2 mr-2">{rightLabel}</span>
                    <p className="mt-2 mb-0">{title}</p>
                    <p className="no-margin grey-text lighten-3">{subTitle}</p>
                    <h5>{dataLabel}</h5>
                </div>
                <div className="row">
                    <div className="sample-chart-wrapper">
                        <canvas id={id} className="center" />
                    </div>
                </div>
            </div>
        );
    }
}

export default GenericChart;
