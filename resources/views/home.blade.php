@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <script>
                        var year = ['2021', '2021', '2021', '2021', '2021', '2021', '2021', '2021'];
                        var user = ['5', '5', '5', '5', '5', '5', '5'];
                        var barChartData = {
                            labels: year,
                            datasets: [{
                                label: 'User',
                                backgroundColor: "pink",
                                data: user
                            }]
                        };

                        window.onload = function() {
                            var ctx = document.getElementById("canvas").getContext("2d");
                            window.myBar = new Chart(ctx, {
                                type: 'bar',
                                data: barChartData,
                                options: {
                                    elements: {
                                        rectangle: {
                                            borderWidth: 2,
                                            borderColor: '#c1c1c1',
                                            borderSkipped: 'bottom'
                                        }
                                    },
                                    responsive: true,
                                    title: {
                                        display: true,
                                        text: 'Yearly User Joined'
                                    }
                                }
                            });
                        };
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection