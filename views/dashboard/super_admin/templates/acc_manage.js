document.addEventListener('DOMContentLoaded', function() {
    // Sample data (replace this with your actual data)
    const users = [
        { id: 1, firstName: 'John', lastName: 'Doe', email: 'john.doe@example.com', role: 'Admin1', status: 'Active' },
        { id: 2, firstName: 'Jane', lastName: 'Smith', email: 'jane.smith@example.com', role: 'Admin1', status: 'Inactive' },
        { id: 3, firstName: 'Bob', lastName: 'Johnson', email: 'bob.johnson@example.com', role: 'Admin2', status: 'Active' },
        { id: 4, firstName: 'Alice', lastName: 'Williams', email: 'alice.williams@example.com', role: 'Admin2', status: 'Inactive' },
        { id: 5, firstName: 'Charlie', lastName: 'Brown', email: 'charlie.brown@example.com', role: 'BADAC', status: 'Active' },
        { id: 6, firstName: 'Eva', lastName: 'Davis', email: 'eva.davis@example.com', role: 'BADAC', status: 'Inactive' },
        { id: 7, firstName: 'Frank', lastName: 'Miller', email: 'frank.miller@example.com', role: 'BPSO', status: 'Active' },
        { id: 8, firstName: 'Grace', lastName: 'Wilson', email: 'grace.wilson@example.com', role: 'BPSO', status: 'Inactive' },
        { id: 9, firstName: 'Henry', lastName: 'Moore', email: 'henry.moore@example.com', role: 'BCPC', status: 'Active' },
        { id: 10, firstName: 'Ivy', lastName: 'Taylor', email: 'ivy.taylor@example.com', role: 'LUPON', status: 'Inactive' },
        { id: 11, firstName: 'Jack', lastName: 'Anderson', email: 'jack.anderson@example.com', role: 'Admin1', status: 'Active' },
        { id: 12, firstName: 'Kelly', lastName: 'Thomas', email: 'kelly.thomas@example.com', role: 'Admin1', status: 'Inactive' },
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
            const statusClass = user.status === 'Active' ? 'text-primary' : 'text-danger';
            const row = `
                <tr>
                    <td>${user.firstName}</td>
                    <td>${user.lastName}</td>
                    <td>${user.email}</td>
                    <td><span class="text-danger">${user.role}</span></td>
                    <td><span class="${statusClass}">${user.status}</span></td>
                    <td>
                        <button class="btn btn-sm btn-primary btn-option" onclick="viewDetails(${user.id})">View</button>
                        <button class="btn btn-sm btn-warning btn-option" onclick="editDetails(${user.id})">Edit</button>
                        <button class="btn btn-sm btn-danger btn-option" onclick="deactivateUser(${user.id})">Deactivate</button>
                    </td>
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

    // Modal Functionality
    window.viewDetails = function(userId) {
        const user = users.find(u => u.id === userId);
        const modalBody = document.getElementById('viewDetailsModalBody');
        modalBody.innerHTML = `
            <p><strong>First Name:</strong> ${user.firstName}</p>
            <p><strong>Last Name:</strong> ${user.lastName}</p>
            <p><strong>Email:</strong> ${user.email}</p>
            <p><strong>Role:</strong> ${user.role}</p>
        `;
        const viewDetailsModal = new bootstrap.Modal(document.getElementById('viewDetailsModal'));
        viewDetailsModal.show();
    }

    window.editDetails = function(userId) {
        const user = users.find(u => u.id === userId);
        document.getElementById('editFirstName').value = user.firstName;
        document.getElementById('editLastName').value = user.lastName;
        document.getElementById('editEmail').value = user.email;
        document.getElementById('editRole').value = user.role;

        const editDetailsModal = new bootstrap.Modal(document.getElementById('editDetailsModal'));
        editDetailsModal.show();

        document.getElementById('saveEditButton').onclick = function() {
            // Here you would typically send the updated data to your server
            // For this example, we'll just update the local data
            user.firstName = document.getElementById('editFirstName').value;
            user.lastName = document.getElementById('editLastName').value;
            user.email = document.getElementById('editEmail').value;
            user.role = document.getElementById('editRole').value;

            displayTable(currentPage);
            editDetailsModal.hide();
        };
    }

    window.deactivateUser = function(userId) {
        const user = users.find(u => u.id === userId);
        document.getElementById('deactivateUserName').textContent = `${user.firstName} ${user.lastName}`;

        const deactivateUserModal = new bootstrap.Modal(document.getElementById('deactivateUserModal'));
        deactivateUserModal.show();

        document.getElementById('confirmDeactivateButton').onclick = function() {
            // Here you would typically send a request to your server to deactivate the user
            // For this example, we'll just remove the user from the local data
            const index = users.findIndex(u => u.id === userId);
            if (index > -1) {
                users.splice(index, 1);
            }

            displayTable(currentPage);
            displayPagination();
            deactivateUserModal.hide();
        };
    }

    // Initial display
    displayTable(currentPage);
    displayPagination();
});