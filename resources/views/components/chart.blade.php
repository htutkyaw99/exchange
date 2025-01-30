{{-- @dd($rates) --}}
<div class="mx-auto max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl w-full bg-white rounded-lg shadow-sm dark:bg-gray-800">
    <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
        <p id="title" class="text-lg font-bold text-gray-500 dark:text-gray-400">Last 7 days rates base on USD
            <span class="font-number">1</span>
            Dollar
        </p>
    </div>
    <div id="labels-chart" class="px-2.5"></div>
    <div
        class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between mt-5 p-4 md:p-6 pt-0 md:pt-0">
        <div class="flex justify-between items-center pt-5">
            <!-- Button -->
            <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown" data-dropdown-placement="bottom"
                class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                type="button">
                Last 7 days
                <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="lastDaysdropdown"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                            7 days</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                            30 days</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                            90 days</a>
                    </li>
                </ul>
            </div>


            <select id="currency"
                class="block w-fit py-2.5 px-0 text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                <option selected value="MYR">Select Currency</option>
                <option value="MYR">MYR</option>
                <option value="PHP">PHP</option>
                <option value="SGD">SGD</option>
                <option value="THB">THB</option>
            </select>


        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.46.0/dist/apexcharts.min.js"></script>


<script>
    const rates = @json($rates);

    const distinctDates = [...new Set(rates.map(rate => rate.date))];

    // Currency-specific rates
    const rateMapping = {
        MYR: rates.filter(rate => rate.target_id === 2).map(rate => rate.rate),
        PHP: rates.filter(rate => rate.target_id === 3).map(rate => rate.rate),
        SGD: rates.filter(rate => rate.target_id === 4).map(rate => rate.rate),
        THB: rates.filter(rate => rate.target_id === 5).map(rate => rate.rate),
    };

    const currencyLabels = {
        MYR: "Malaysian Ringgit",
        PHP: "Philippines Peso",
        SGD: "Singapore Dollar",
        THB: "Thai Baht",
    };

    const ccSelect = document.getElementById("currency");

    // Initial setup
    let selectedCurrency = ccSelect.value;
    let chart;

    const renderChart = () => {
        const label = currencyLabels[selectedCurrency];
        const data = rateMapping[selectedCurrency];

        // if (!data) {
        //     console.error(`No data found for ${selectedCurrency}`);
        //     return;
        // }

        const options = {
            xaxis: {
                categories: distinctDates,
                labels: {
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: "text-xs font-normal fill-gray-500 dark:fill-gray-400",
                    },
                },
            },
            yaxis: {
                labels: {
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: "text-xs font-normal fill-gray-500 dark:fill-gray-400",
                    },
                    formatter: value => value.toFixed(2),
                },
            },
            series: [{
                name: label,
                data: data,
                color: "#1A56DB",
            }, ],
            chart: {
                height: "100%",
                type: "area",
                fontFamily: "Inter, sans-serif",
                toolbar: {
                    show: false
                },
            },
            fill: {
                type: "gradient",
                gradient: {
                    opacityFrom: 0.55,
                    opacityTo: 0,
                    shade: "#1C64F2",
                },
            },
            stroke: {
                width: 6
            },
            dataLabels: {
                enabled: false
            },
            tooltip: {
                enabled: true
            },
            grid: {
                show: false
            },
        };

        // If chart already exists, update it
        if (chart) {
            chart.updateOptions(options);
        } else {
            chart = new ApexCharts(document.getElementById("labels-chart"), options);
            chart.render();
        }
    };

    // Initial chart rendering
    renderChart();

    // Event listener for currency selection
    ccSelect.addEventListener("change", function() {
        selectedCurrency = this.value;
        renderChart();
    });
</script>
