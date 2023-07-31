document.addEventListener('DOMContentLoaded', () => {
    // Handle the button click event
    document.getElementById('load-data-btn').addEventListener('click', () => {
        // Fetch the CSRF token from the meta tag
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Fetch the table element
        //const table = document.getElementById('data-table');

        // Fetch the table body element
        //const tbody = table.querySelector('tbody');

        // Get all table rows from the table body
        const table = document.getElementById("data-table");
        const data = [];
        for (let i = 1; i < table.rows.length; i++) {
            const row = table.rows[i];
            const rowData = {
                alert() {
                    name: row.cells[0].innerText
                },
                name: row.cells[0].innerText,
                age: row.cells[1].innerText,
                country: row.cells[2].innerText
            };
            data.push(rowData);
        }
        // const rows = document.querySelectorAll('data-table tbody tr');
        //
        // // Prepare an array to store the data
        // const tableData = [];
        //
        // // Iterate through each row and extract data from cells
        // for (let i = 0; i < rows.length; i++) {
        //     const rowData = [];
        //     const cells = rows[i].getElementsByTagName('td');
        //     for (let j = 0; j < cells.length; j++) {
        //         rowData.push(cells[j].textContent.trim());
        //     }
        //     tableData.push(rowData);
        // }


        // rows.forEach((row) => {
        //     const registerId = row.cells[0].textContent;
        //     const name = row.cells[1].textContent;
        //     const email = row.cells[2].textContent;
        //
        //     // Push data as an object to the data array
        //     data.push({ registerId, name, email});
        // });

        // Send the data to the server using fetch API (or other AJAX methods)
        fetch("/generate-report", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data)
        })


        // fetch('/generate-report', {
        //     method: 'POST',
        //     headers: {
        //         'Content-Type': 'application/json',
        //         'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
        //     },
        //     body: JSON.stringify(data)
        // })
            // .then(response => response.text())
            // .then(response => {
            //     // Handle the response here if needed
            //     console.log(response);
            //     // For example, you can redirect to the report URL
            //     window.location.href = '/show-report';
            // })
            // .catch(error => {
            //     // Handle errors here
            //     console.error(error);
            // });
    });
});
