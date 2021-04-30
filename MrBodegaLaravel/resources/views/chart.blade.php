@extends('inc.header')

@section('content')



<div class="container">

    <h2>Graficas estadisticas</h2>

    <div class="row">
        <div class="col-md-12">
            <h3>Usuarios mas activos</h3>
            <canvas height="100px" id="myChart"></canvas>
        </div>
    </div>



    <div class="row">
        <div class="col-md-12 mt-5">
            <h3>Productos mas vendidos</h3>
            <canvas height="100px" id="mySecondChart"></canvas>
        </div>
        <input type="date" class="form-control" name="fechaDesde" id="fechaDesde">
        <input type="date" class="form-control" name="fechaHasta" id="fechaHasta">

    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [],
            datasets: [{
                label: 'Total',
                data: [],
                borderWidth: 1,
                backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(150, 200, 12, 0.2)',
                            'rgba(90, 245, 10, 0.2)',
                            'rgba(60, 100, 200, 0.2)',
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255,99,132,1)',
                            'rgba(150, 200, 12, 1)',
                            'rgba(90, 245, 10, 1)',
                            'rgba(60, 100, 200, 1)',
                        ],
            }]
        },
        options: {
            scales: {
                xAxes: [],
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    var updateChart = function() {
        $.ajax({
            url: "http://localhost:5000/api/Boleta/FetchTop5Customers",
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                var labels = [];
                var totales = [];
                for (var i in data) {
                    var nombre = data[i].nombre;
                    var total = data[i].total;
                    labels.push(nombre);
                    totales.push(total);
                }
                myChart.data.labels = labels;
                myChart.data.datasets[0].data = totales;
                myChart.update();
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    updateChart();
</script>

<script>
    $('#fechaDesde').change(function() {
        var date = $(this).val();
        d = new Date(date);
        var curr_date = d.getDate() + 1;
        var curr_month = d.getMonth() + 1;
        var curr_year = d.getFullYear();
        console.log(curr_date + "/" + curr_month + "/" + curr_year)
        var fechaDesde = curr_date + "/" + curr_month + "/" + curr_year;

        var d2 = $('#fechaHasta').val() ? new Date($('#fechaHasta').val()) : new Date();
        var curr_date2 = d2.getDate() + 1;
        var curr_month2 = d2.getMonth() + 1;
        var curr_year2 = d2.getFullYear();
        var fechaHasta = curr_date2 + "/" + curr_month2 + "/" + curr_year2;

        var ctx = document.getElementById("mySecondChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Cantidad',
                    data: [],
                    borderWidth: 1,
                    backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(150, 200, 12, 0.2)',
                            'rgba(90, 245, 10, 0.2)',
                            'rgba(60, 100, 200, 0.2)',
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255,99,132,1)',
                            'rgba(150, 200, 12, 1)',
                            'rgba(90, 245, 10, 1)',
                            'rgba(60, 100, 200, 1)',
                        ],
                }]
            },
            options: {
                scales: {
                    xAxes: [],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        var updateChart = function() {
            $.ajax({
                url: "http://localhost:5000/api/Boleta/FetchTop5Products?inicio=" + fechaDesde + "&fin=" + fechaHasta,
                type: 'GET',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    var labels = [];
                    var totales = [];
                    for (var i in data) {
                        var nombre = data[i].nombre;
                        var total = data[i].cantidad;
                        labels.push(nombre);
                        totales.push(total);
                    }
                    myChart.data.labels = labels;
                    myChart.data.datasets[0].data = totales;
                    myChart.update();
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
        updateChart();
    });
</script>

<script>
    $('#fechaHasta').change(function() {
        var date = $(this).val();
        d = new Date(date);
        var curr_date = d.getDate() + 1;
        var curr_month = d.getMonth() + 1;
        var curr_year = d.getFullYear();
        var fechaDesde = curr_date + "/" + curr_month + "/" + curr_year;

        var d2 = $('#fechaDesde').val() ? new Date($('#fechaDesde').val()) : new Date();
        var curr_date2 = d2.getDate() + 1;
        var curr_month2 = d2.getMonth() + 1;
        var curr_year2 = d2.getFullYear();
        var fechaHasta = curr_date2 + "/" + curr_month2 + "/" + curr_year2;

        var ctx = document.getElementById("mySecondChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Cantidad',
                    data: [],
                    borderWidth: 1,
                    backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(150, 200, 12, 0.2)',
                            'rgba(90, 245, 10, 0.2)',
                            'rgba(60, 100, 200, 0.2)',
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255,99,132,1)',
                            'rgba(150, 200, 12, 1)',
                            'rgba(90, 245, 10, 1)',
                            'rgba(60, 100, 200, 1)',
                        ],
                }]
            },
            options: {
                scales: {
                    xAxes: [],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        var updateChart = function() {
            $.ajax({
                url: "http://localhost:5000/api/Boleta/FetchTop5Products?inicio=" + fechaDesde + "&fin=" + fechaHasta,
                type: 'GET',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    var labels = [];
                    var totales = [];
                    for (var i in data) {
                        var nombre = data[i].nombre;
                        var total = data[i].cantidad;
                        labels.push(nombre);
                        totales.push(total);
                    }
                    myChart.data.labels = labels;
                    myChart.data.datasets[0].data = totales;
                    myChart.update();
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
        updateChart();
    });
</script>
@endsection