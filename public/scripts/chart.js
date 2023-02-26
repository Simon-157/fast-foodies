   
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2", // "light1", "light2", "dark1", "dark2"
                title:{
                    text: "Order Volume by Day"
                },
                axisY: {
                    title: "Order Volume"
                },
                data: [{
                    type: "column",
                    showInLegend: true,
                    legendMarkerColor: "grey",
                    legendText: "Days",
                    dataPoints: [
                        { y: 10, label: "Monday" },
                        { y: 8, label: "Tuesday" },
                        { y: 15, label: "Wednesday" },
                        { y: 25, label: "Thursday" },
                        { y: 14, label: "Friday" },
                        { y: 18, label: "Saturday" },
                        { y: 25, label: "Sunday" }
                    ]
                }]
            });
            chart.render();

            
        }
        var ctx = document.getElementById("chart").getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
            labels: ['Pizza', 'Burgers', 'Sushi', 'Chinese', 'Mexican'],
            datasets: [{
                label: 'Food Delivery Orders',
                data: [20, 15, 10, 5, 25],
                backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(153, 102, 255)'
                ]
            }]
            },
            options: {}
        });