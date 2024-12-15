
document.addEventListener('DOMContentLoaded', function() {
    // Sample data (replace this with your actual data)
    const users = [
        { firstName: 'John', lastName: 'Doe', email: 'john.doe@example.com', role: 'Unidentified' },
        { firstName: 'Jane', lastName: 'Smith', email: 'jane.smith@example.com', role: 'Unidentified' },
        { firstName: 'Bob', lastName: 'Johnson', email: 'bob.johnson@example.com', role: 'Unidentified' },
        { firstName: 'Alice', lastName: 'Williams', email: 'alice.williams@example.com', role: 'Unidentified' },
        { firstName: 'Charlie', lastName: 'Brown', email: 'charlie.brown@example.com', role: 'Unidentified' },
        { firstName: 'Eva', lastName: 'Davis', email: 'eva.davis@example.com', role: 'Unidentified' },
        { firstName: 'Frank', lastName: 'Miller', email: 'frank.miller@example.com', role: 'Unidentified' },
        { firstName: 'Grace', lastName: 'Wilson', email: 'grace.wilson@example.com', role: 'Unidentified' },
        { firstName: 'Henry', lastName: 'Moore', email: 'henry.moore@example.com', role: 'Unidentified' },
        { firstName: 'Ivy', lastName: 'Taylor', email: 'ivy.taylor@example.com', role: 'Unidentified' },
        { firstName: 'Jack', lastName: 'Anderson', email: 'jack.anderson@example.com', role: 'Unidentified' },
        { firstName: 'Kelly', lastName: 'Thomas', email: 'kelly.thomas@example.com', role: 'Unidentified' },
    ];

    const itemsPerPage = 8;
    let currentPage = 1;

    function displayTable(page) {
        const tableBody = document.getElementById('tableBody');
        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        const paginatedUsers = users.slice(start, end);

        tableBody.innerHTML = '';

        paginatedUsers.forEach(user => {
            const row = `
                <tr>
                    <td>${user.firstName}</td>
                    <td>${user.lastName}</td>
                    <td>${user.email}</td>
                    <td><span class="text-danger">${user.role}</span></td>
                </tr>
            `;
            tableBody.innerHTML += row;
        });
    }

    function displayPagination() {
        const totalPages = Math.ceil(users.length / itemsPerPage);
        const paginationElement = document.getElementById('pagination');
        paginationElement.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const li = document.createElement('li');
            li.classList.add('page-item');
            if (i === currentPage) {
                li.classList.add('active');
            }
            const a = document.createElement('a');
            a.classList.add('page-link');
            a.href = '#';
            a.textContent = i;
            a.addEventListener('click', (e) => {
                e.preventDefault();
                currentPage = i;
                displayTable(currentPage);
                displayPagination();
            });
            li.appendChild(a);
            paginationElement.appendChild(li);
        }
    }

    // Initial display
    displayTable(currentPage);
    displayPagination();
});