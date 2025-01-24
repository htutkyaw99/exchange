<script>
    const currencyDropdown = document.getElementById('currency-dropdown');
    const tableBody = document.getElementById('curTable');

    // PHP data to JS (passing currency flags and the selected currency)
    const currencySvg = @json($currencySvg);
    const selectedCur = '{{ $selectedCur }}';

    // API Key (used for both cases)
    const apiKey = 'fca_live_aFF6gipUdLoqjZBVYBWXMWU43w7qDTADvV85y9pU';

    // Function to fetch data dynamically based on selected base currency
    const fetchCurrencyData = async (baseCurrency) => {
        let currencies = ['EUR', 'THB', 'INR', 'JPY', 'USD']; // Possible currencies
        let currencyList = currencies.filter(currency => currency !== baseCurrency); // Remove base currency

        // Construct the API URL dynamically based on the base currency
        const apiUrl =
            `https://api.freecurrencyapi.com/v1/latest?apikey=${apiKey}&currencies=${currencyList.join(',')}&base_currency=${baseCurrency}`;

        try {
            const response = await fetch(apiUrl);
            const data = await response.json();

            // Check if data is available and in expected format
            if (data && data.data) {
                return data.data; // Return the currency rates
            } else {
                console.error('Invalid data structure:', data);
                return {};
            }
        } catch (error) {
            console.error('Error fetching currency data:', error);
            return {};
        }
    };

    // Function to update the table dynamically based on fetched data
    const updateTable = (currencyRates, baseCurrency) => {
        // Reset the table body to avoid duplicating rows
        tableBody.innerHTML = '';

        // Iterate over the currency rates
        Object.entries(currencyRates).forEach(([currency, rate]) => {
            // Skip the base currency row
            if (currency === baseCurrency) return;

            // Create a table row dynamically
            const row = document.createElement('tr');
            row.id = `curOpt-${currency}`;
            row.className = 'bg-white dark:bg-gray-800 text-end';

            // Create the row content for currency name and values
            const currencyCell = `
                <th scope="row"
                    class="px-6 py-4 mx-auto font-medium text-gray-900 whitespace-nowrap dark:text-white text-center flex items-center justify-start gap-3">
                    <img class="w-[32px] h-[32px]" src="${currencySvg[currency]}" alt="">
                    ${currency}
                </th>`;

            const rateCells = `
                <td class="px-6 py-4">${rate.toFixed(2)}</td>
                <td class="px-6 py-4">${(rate * 25).toFixed(2)}</td>
                <td class="px-6 py-4">${(rate * 50).toFixed(2)}</td>
                <td class="px-6 py-4">${(rate * 75).toFixed(2)}</td>
            `;

            // Append cells to the row
            row.innerHTML = currencyCell + rateCells;

            // Append the row to the table body
            tableBody.appendChild(row);
        });
    };


    // Event listener for dropdown change
    currencyDropdown.addEventListener('change', async function() {
        const selectedCurrency = this.value; // Get selected value

        // Fetch the currency data based on the selected currency
        const currencyRates = await fetchCurrencyData(selectedCurrency);

        // Update the table with the fetched data
        updateTable(currencyRates, selectedCurrency);
    });

    // Initial fetch and table update on page load
    document.addEventListener('DOMContentLoaded', async function() {
        const selectedCurrency = currencyDropdown.value;

        // Fetch the currency data based on the selected currency
        const currencyRates = await fetchCurrencyData(selectedCurrency);

        // Update the table with the fetched data
        updateTable(currencyRates, selectedCurrency);
    });
</script>
