<!doctype html>
<html lang="en">
  <head>
    <title>Calculator</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>

.form {
    display: flex;
    flex-wrap: wrap;
    padding: 10px
    /* justify-content: space-between; */
}

.form-group {
    flex: 0 0 20%; /* Adjust the width as needed */
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

.form-control {
    width: 80%;
    padding: 2px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
}


.btn-primary {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    display: inline-block; /* Ensure it's treated as a block element */
}


.btn-primary:hover {
    background-color: #0056b3;
}

</style>

</head>

  <body>
    <div class="sa-investment-inputs bb-sizing " style=" margin: auto; text-align: center; max-width: 1300px;">
    <div>
        <br><br>
        <h2 style="text-align: center;">Investment Return and Growth Calculator</h2> <br><br>
<div  class="sa-investment-inputs bb-sizing shadow" data-optly-a6eea483bd804d5982ce9ff1ed278106=""
data-optly-b98551708d5845fbb39409385e0a3524="" style="background-color: rgb(244, 244, 246);">
        <form class="form">
            <div class="form-group">
                <label  for="initialAmount" class="text-left">Initial Amount:</label>
            <input class="form-control" type="number" id="initialAmount" placeholder="Enter initial amount" required>

            </div>
            <div class="form-group ">

            <label for="additionalContribution">Additional Contribution:</label>
            <div class="form-group d-flex m-2">
            <input class="form-control" type="number" id="additionalContribution" placeholder="Enter additional contribution" required style="width: 70%;">

            {{-- <div class="form-group">

            <label for="tenure">Tenure:</label> --}}
            <div class="mx-2 ">
            <select class="form-control" id="tenure">
                <option value="weekly">Weekly</option>
                <option value="bi-weekly">Bi-Weekly</option>
                <option value="monthly">Monthly</option>
                <option value="semi-annual">Semi-Annually</option>
                <option value="annually">Annually</option>
            </select>
        </div>
        </div>
            </div>
            <div class="form-group">

            <label for="rateOfReturn" class="text-left">Rate of Return (%):</label>
            <input class="form-control" type="number" id="rateOfReturn" placeholder="Enter rate of return" required>
            </div>
            <div class="form-group">

            <label for="yearsToGrow" class="text-left">Years to Grow:</label>
            <input class="form-control" type="number" id="yearsToGrow" placeholder="Enter number of years" required>
            </div>
        </div>


        <button type="button" id="calculateBtn" onclick="calculate()" style="display: none;"></button>

        <script>
            document.addEventListener("keydown", function(event) {
                try {
                    if (event.key === "Enter") {
                        document.getElementById("calculateBtn").click();
                    }
                } catch (error) {
                    console.error("Error in script:", error);
                }
            });
        </script>




        </form>

    </div>
    <br><br>

    <div class="d-flex justify-content-center">
        <div style="max-width: 610px; margin-top: 2px;">
            <canvas id="stackedChart" style="height: 400px;"></canvas>
        </div>
        <div>
            <canvas id="pieChart" style="max-width: 400px; max-height: 300px;"></canvas>
        </div>
    </div>

<br>
<div id="result"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>

    <script>
        let stackedChartInstance;
        function calculate() {

            if (stackedChartInstance) {
        stackedChartInstance.destroy();
    }

            const initialAmount = parseFloat(document.getElementById('initialAmount').value);
            const annualContribution = parseFloat(document.getElementById('additionalContribution').value);
            const tenure = document.getElementById('tenure').value;
            const rateOfReturn = parseFloat(document.getElementById('rateOfReturn').value);
            const yearsToGrow = parseFloat(document.getElementById('yearsToGrow').value);

            let totalAmount = initialAmount;
            let resultHtml = '';
            let labels = [];
            let datasets = [];
            let startingAmountData = [];
            let totalContributionData = [];
            let totalInterestData = [];
            let totalInterestEarned = 0;
            let totalContribution = 0;
            resultHtml += '<table class="table table-striped table-hover">';
            resultHtml += '<tr><th>Year</th><th>Starting Amount</th><th>Annual Contribution</th><th>Total Contribution</th><th>Interest Earned</th><th>Total Interest Earned</th><th>End Balance</th></tr>';
            let contributionsPerYear = 0;
            for (let i = 1; i <= yearsToGrow; i++) {


                switch (tenure) {
                    case 'weekly':
                        contributionsPerYear = 52;
                        break;
                    case 'bi-weekly':
                        contributionsPerYear = 26;
                        break;
                    case 'monthly':
                        contributionsPerYear = 12;
                        break;
                    case 'semi-annual':
                        contributionsPerYear = 2;
                        break;
                    case 'annually':
                        contributionsPerYear = 1;
                        break;
                }

                const annualInterest = totalAmount * (rateOfReturn / 100);
                totalInterestEarned += annualInterest;
                totalAmount += annualContribution * contributionsPerYear + annualInterest;
                totalContribution += annualContribution;

                resultHtml += `<tr><td>${i}</td><td>${(totalAmount - annualContribution - annualInterest).toFixed(0)}</td><td>${annualContribution}</td><td>${totalContribution.toFixed(0)}</td><td>${annualInterest.toFixed(0)}</td><td>${totalInterestEarned.toFixed(0)}</td><td>${totalAmount.toFixed(0)}</td></tr>`;
                startingAmountData.push(parseFloat((totalAmount - annualContribution - annualInterest).toFixed(0)));
                totalContributionData.push(parseFloat(totalContribution.toFixed(0)));
                totalInterestData.push(parseFloat(annualInterest.toFixed(0)));
            // For chart data
                labels.push(`Year ${i}`);
                datasets.push({
                    label: `Year ${i}`,
                    backgroundColor: ['#4CAF50', '#2196F3', '#FFC107'],
                    data: [parseFloat(initialAmount.toFixed(0)), parseFloat(totalContribution.toFixed(0)), parseFloat(totalInterestEarned.toFixed(0))],
                });
            }
                resultHtml += '</table>';

            const resultElement = document.getElementById('result');
            resultElement.innerHTML = resultHtml;

            // Pie Chart
            const pieChartCanvas = document.getElementById('pieChart');
            const pieChartContext = pieChartCanvas.getContext('2d');

            new Chart(pieChartContext, {
                type: 'pie',
                data: {
                    labels: ['Starting Amount', 'Contributions', 'Interest Earned'],
                    datasets: [{
                        data: [initialAmount, annualContribution * contributionsPerYear * yearsToGrow, totalAmount - initialAmount - annualContribution * contributionsPerYear * yearsToGrow],
                        backgroundColor: ['#4CAF50', '#2196F3', '#FFC107'],
                    }],
                },
                options: {
                    responsive: false,
                    maintainAspectRatio: false,
                },
            });

            // Bar Chart
            const stackedChartCanvas = document.getElementById('stackedChart');
            const stackedChartContext = stackedChartCanvas.getContext('2d');

            new Chart(stackedChartContext, {
                type: 'bar',
                data: {
                labels: labels,
                datasets: [{
                    label: 'Starting Amount',
                    backgroundColor: "#4CAF50",
                    data: startingAmountData,
                }, {
                    label: 'Total Contribution',
                    backgroundColor: "#2196F3",
                    data: totalContributionData,
                }, {
                    label: 'Total Interest',
                    backgroundColor: "#FFC107",
                    data: totalInterestData,
                }],
            },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Stacked Bar chart for your data',
                        },
                    },
                    scales: {
                        x: {
                            stacked: true,
                        },
                        y: {
                            stacked: true,
                        }
                    }
                }
            });
        }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
