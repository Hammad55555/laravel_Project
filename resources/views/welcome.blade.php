<!doctype html>
<html lang="en">

<head>
    <title>Charts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .sa-investment-inputs {
            max-width: 600px;
            /* Adjust the maximum width as needed */
            margin: 0 auto;
            padding: 20px;
        }

        .sa-inputs {
            width: 100%;
        }

        .investment-amount,
        .investment-contributions,
        .investment-inputs,
        .sa-invest-return-c,
        .sa-invest-growth-c {
            margin-bottom: 20px;
        }

        .label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .tightcontainer {
            display: flex;
            align-items: center;
        }

        .dollar,
        .percentage,
        .autonumeric {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .msg-container {
            margin-top: 5px;
            font-size: 12px;
        }

        .dismiss {
            color: #555;
            cursor: pointer;
        }

        .investment-inputs {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .investment-inputs>div {
            width: 48%;
            /* Adjust the width as needed */
        }

        .clearfix {
            clear: both;
        }
    </style>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />
    <!-- Add this line in the head section of your layout file -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- MDB CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />


</head>

</head>

<body>

    </head>

    <body>
        <br><br>




        <div class="sa-investment-inputs bb-sizing shadow" data-optly-a6eea483bd804d5982ce9ff1ed278106=""
            data-optly-b98551708d5845fbb39409385e0a3524="" style="background-color: rgb(244, 244, 246);">
            <table class="sa-inputs" data-optly-a6eea483bd804d5982ce9ff1ed278106="">
                <tbody data-optly-a6eea483bd804d5982ce9ff1ed278106="">
                    <tr data-optly-a6eea483bd804d5982ce9ff1ed278106="">
                        <td data-optly-a6eea483bd804d5982ce9ff1ed278106="">
                            <div class="investment-amount" data-optly-a6eea483bd804d5982ce9ff1ed278106="">
                                <div class="label" data-optly-a6eea483bd804d5982ce9ff1ed278106="">Starting Amount:
                                </div><span class="tightcontainer dollar"
                                    data-optly-a6eea483bd804d5982ce9ff1ed278106=""> <input type="text" class="dollar"
                                        data-optly-a6eea483bd804d5982ce9ff1ed278106=""> </span>
                                {{-- <div class="msg-container" data-optly-a6eea483bd804d5982ce9ff1ed278106=""> <span
                                        class="msg-text" data-optly-a6eea483bd804d5982ce9ff1ed278106=""></span> <i
                                        class="dismiss" data-optly-a6eea483bd804d5982ce9ff1ed278106="">Dismiss</i>
                                </div> --}}
                            </div>
                        </td>
                        <td data-optly-a6eea483bd804d5982ce9ff1ed278106="">
                            <div class="investment-contributions" data-optly-a6eea483bd804d5982ce9ff1ed278106="">
                                <div class="label" data-optly-a6eea483bd804d5982ce9ff1ed278106="">Additional
                                    Contribution:</div>
                                <div class="clearfix" data-optly-a6eea483bd804d5982ce9ff1ed278106=""></div>
                                <div class="contribution-amount" data-optly-a6eea483bd804d5982ce9ff1ed278106=""> <span
                                        class="tightcontainer dollar" data-optly-a6eea483bd804d5982ce9ff1ed278106="">
                                        <input type="text" class="dollar"
                                            data-optly-a6eea483bd804d5982ce9ff1ed278106=""> </span>
                                    {{-- <div class="msg-container" data-optly-a6eea483bd804d5982ce9ff1ed278106=""> <span
                                            class="msg-text" data-optly-a6eea483bd804d5982ce9ff1ed278106=""></span> <i
                                            class="dismiss" data-optly-a6eea483bd804d5982ce9ff1ed278106="">Dismiss</i>
                                    </div> --}}
                                </div>
                                <select id="frequency" name="ud-additional-contributions-freq">
                                    <option value="52">Weekly</option>
                                    <option value="26">Bi-Weekly</option>
                                    <option value="12">Monthly</option>
                                    <option value="2">Semi-Annually</option>
                                    <option value="1">Annually</option>
                                </select>
                                <div class="clearfix" data-optly-a6eea483bd804d5982ce9ff1ed278106=""></div>
                            </div>
                        </td>
                        <td data-optly-a6eea483bd804d5982ce9ff1ed278106="">
                            <div class="investment-inputs wider-col" data-optly-a6eea483bd804d5982ce9ff1ed278106="">
                                <div class="sa-invest-return-c" data-optly-a6eea483bd804d5982ce9ff1ed278106="">
                                    <div class="label" data-optly-a6eea483bd804d5982ce9ff1ed278106=""><span
                                            class="glossary tooltipstered" data-align="top" data-title="Rate of Return"
                                            data-content="The rate at which your investments will grow."
                                            data-optly-a6eea483bd804d5982ce9ff1ed278106="" data-converted="1">Rate of
                                            Return:</span></div> <span class="tightcontainer percentage"
                                        data-optly-a6eea483bd804d5982ce9ff1ed278106=""> <input type="text"
                                            class="autonumeric percentage sa-invest-return" data-m-dec="2"
                                            data-v-max="100" data-a-dec="." data-a-sep=","
                                            data-optly-a6eea483bd804d5982ce9ff1ed278106=""></span>
                                    {{-- <div class="msg-container" data-optly-a6eea483bd804d5982ce9ff1ed278106=""> <span
                                            class="msg-text" data-optly-a6eea483bd804d5982ce9ff1ed278106=""></span> <i
                                            class="dismiss" data-optly-a6eea483bd804d5982ce9ff1ed278106="">Dismiss</i>
                                    </div> --}}
                                </div>
                            </div>
                        </td>
                        <td data-optly-a6eea483bd804d5982ce9ff1ed278106="">
                            <div class="investment-inputs" data-optly-a6eea483bd804d5982ce9ff1ed278106="">
                                <div class="sa-invest-growth-c" data-optly-a6eea483bd804d5982ce9ff1ed278106="">
                                    <div class="label" data-optly-a6eea483bd804d5982ce9ff1ed278106="">Years to Grow:
                                    </div> <input class="sa-invest-growth autonumeric" type="text" data-m-dec="0"
                                        data-v-max="99" data-a-dec="." data-a-sep=","
                                        data-optly-a6eea483bd804d5982ce9ff1ed278106="">
                                    {{-- <div class="msg-container" data-optly-a6eea483bd804d5982ce9ff1ed278106=""> <span
                                            class="msg-text" data-optly-a6eea483bd804d5982ce9ff1ed278106=""></span> <i
                                            class="dismiss" data-optly-a6eea483bd804d5982ce9ff1ed278106="">Dismiss</i>
                                    </div> --}}
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div>
                <button class="btn"
                    style="display: block; margin: 0 auto;  color: black; padding: 10px 20px; font-size: 16px; cursor: pointer;">
                    Calculate
                </button>
            </div>
        </div>
        <br> <br>
        <div class="sa-investment-inputs bb-sizing shadow" data-optly-a6eea483bd804d5982ce9ff1ed278106=""
            data-optly-b98551708d5845fbb39409385e0a3524="" style="background-color: rgb(244, 244, 246);">
            <canvas id="stacked-bar-chart"></canvas>
            <script>
                var data = @json($data->first());

                // Stacked Bar chart
                const dataStackedBar = {
                    type: 'bar',
                    data: {
                        labels: ['2023', '2024', '2025', '2026', '2027'],

                        datasets: [{
                                label: "Starting Amount",
                                data: [data.starting_amount],
                                backgroundColor: "#F7464A",
                            },
                            {
                                label: "Total Contribution",
                                data: [data.total_contribution],
                                backgroundColor: "#46BFBD",
                            },
                            {
                                label: "Total Interest Earned",
                                data: [data.total_interest_earned],
                                backgroundColor: "#FDB45C",
                            }
                        ],


                    },
                };

                const optionsStackedBar = {
                    scales: {
                        x: {
                            stacked: true,
                        },
                        y: {
                            stacked: true,
                        },
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    label = `${label}: ${context.formattedValue}`;
                                    return label;
                                },
                            },
                        },
                    },
                };

                new Chart(
                    document.getElementById('stacked-bar-chart'),
                    dataStackedBar,
                    optionsStackedBar
                );
            </script>
        </div>
        <div class="sa-investment-inputs bb-sizing shadow" data-optly-a6eea483bd804d5982ce9ff1ed278106=""
            data-optly-b98551708d5845fbb39409385e0a3524="" style="background-color: rgb(244, 244, 246);">


            <canvas id="pieChart" width="400" height="400"></canvas>



            <script>
                // Assume there's only one item in the $data collection
                var data = @json($data->first());

                // pie
                var ctxP = document.getElementById("pieChart").getContext('2d');
                var myPieChart = new Chart(ctxP, {
                    type: 'pie',
                    data: {
                        labels: ["Starting Amount", "Total Contribution", "Total Interest Earned"],
                        datasets: [{
                            data: [data.starting_amount, data.total_contribution, data.total_interest_earned],
                            backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C"],
                            hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870"]
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        width: 300,
                        height: 300
                    }
                });
            </script>

        </div> <br><br>
        <div class="sa-investment-inputs bb-sizing shadow" data-optly-a6eea483bd804d5982ce9ff1ed278106=""
            data-optly-b98551708d5845fbb39409385e0a3524="">

            <table class="table table-striped table-hover">
                <thead class="bg-secondary">
                    <tr>
                        <th scope="col" style="font-weight: bold;">Year</th>
                        <th scope="col" style="font-weight: bold;">Starting Amount</th>
                        <th scope="col" style="font-weight: bold;">Annual Contribution</th>
                        <th scope="col" style="font-weight: bold;">Total Contribution</th>
                        <th scope="col" style="font-weight: bold;">Interest Earned</th>
                        <th scope="col" style="font-weight: bold;">Total Interest Earned</th>
                        <th scope="col" style="font-weight: bold;">End Balance</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->year }}</td>
                            <td>{{ $item->starting_amount }}</td>
                            <td>{{ $item->annual_contribution }}</td>
                            <td>{{ $item->total_contribution }}</td>
                            <td>{{ $item->interest_earned }}</td>
                            <td>{{ $item->total_interest_earned }}</td>
                            <td>{{ $item->End_balance }}</td>
                            <!-- Display other columns -->
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>

        <!-- Add these lines at the end of the body section of your layout file -->
        {{-- <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>

        {{-- <div style="text-align: left;">
        <canvas id="pieChart" width="400" height="400"></canvas>
    </div>

    <script>
      // pie
      var ctxP = document.getElementById("pieChart").getContext('2d');
      var myPieChart = new Chart(ctxP, {
        type: 'pie',
        data: {
          labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
          datasets: [{
            data: [300, 50, 100, 40, 120],
            backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
            hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          width: 300,
          height: 300
        }
      });
    </script>


 --}}


    </body>

</html>
