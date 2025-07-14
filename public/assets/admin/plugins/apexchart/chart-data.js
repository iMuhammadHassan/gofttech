"use strict";
$(document).ready(function () {
    function generateData(baseval, count, yrange) {
        var i = 0;
        var series = [];
        while (i < count) {
            var x = Math.floor(Math.random() * (750 - 1 + 1)) + 1;
            var y =
                Math.floor(Math.random() * (yrange.max - yrange.min + 1)) +
                yrange.min;
            var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;
            series.push([x, y, z]);
            baseval += 86400000;
            i++;
        }
        return series;
    }
    if ($("#invoice_chart").length > 0) {
        var pieCtx = document.getElementById("invoice_chart"),
            pieConfig = {
                colors: ["#7638ff", "#ff737b", "#fda600", "#1ec1b0"],
                series: [55, 40, 20, 10],
                chart: {
                    fontFamily: "Poppins, sans-serif",
                    height: 350,
                    type: "donut",
                },
                labels: ["Paid", "Unpaid", "Overdue", "Draft"],
                legend: { show: false },
                responsive: [
                    {
                        breakpoint: 480,
                        options: {
                            chart: { width: 200 },
                            legend: { position: "bottom" },
                        },
                    },
                ],
            };
        var pieChart = new ApexCharts(pieCtx, pieConfig);
        pieChart.render();
    }
    if ($("#s-col").length > 0) {
        var sCol = {
            chart: { height: 350, type: "bar", toolbar: { show: false } },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "55%",
                    endingShape: "rounded",
                },
            },
            dataLabels: { enabled: false },
            stroke: { show: true, width: 2, colors: ["transparent"] },
            series: [
                {
                    name: "Net Profit",
                    data: [44, 55, 57, 56, 61, 58, 63, 60, 66],
                },
                {
                    name: "Revenue",
                    data: [76, 85, 101, 98, 87, 105, 91, 114, 94],
                },
            ],
            xaxis: {
                categories: [
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                ],
            },
            yaxis: { title: { text: "$ (thousands)" } },
            fill: { opacity: 1 },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return "$ " + val + " thousands";
                    },
                },
            },
        };
        var chart = new ApexCharts(document.querySelector("#s-col"), sCol);
        chart.render();
    }    
    if ($("#donut-chart").length > 0) {
        var donutChart = {
            chart: { height: 350, type: "donut", toolbar: { show: false } },
            series: [44, 55, 41, 17],
            responsive: [
                {
                    breakpoint: 480,
                    options: {
                        chart: { width: 200 },
                        legend: { position: "bottom" },
                    },
                },
            ],
        };
        var donut = new ApexCharts(
            document.querySelector("#donut-chart"),
            donutChart
        );
        donut.render();
    }
    if ($("#radial-chart").length > 0) {
        var radialChart = {
            chart: { height: 350, type: "radialBar", toolbar: { show: false } },
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        name: { fontSize: "22px" },
                        value: { fontSize: "16px" },
                        total: {
                            show: true,
                            label: "Total",
                            formatter: function (w) {
                                return 249;
                            },
                        },
                    },
                },
            },
            series: [44, 55, 67, 83],
            labels: ["Apples", "Oranges", "Bananas", "Berries"],
        };
        var chart = new ApexCharts(
            document.querySelector("#radial-chart"),
            radialChart
        );
        chart.render();
    }
});
