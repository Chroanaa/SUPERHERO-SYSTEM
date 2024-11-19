document.getElementById('addCaseForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const caseNumber = document.getElementById('caseNumber').value;
    const pwud = document.getElementById('pwud').value;
    const complainants = document.getElementById('complainants').value;
    const caseType = document.getElementById('caseType').value;
    const respondent = document.getElementById('respondent').value;
    const caseStatus = document.getElementById('caseStatus').value;
    const description = document.getElementById('description').value;
    const dateTime = document.getElementById('dateTime').value;
    const place = document.getElementById('place').value;

    const newRow = `
          <tr>
             <td>${caseNumber}</td>
             <td>${complainants}</td>
             <td>${respondent}</td>
             <td>${pwud}</td>
             <td>${description}</td>
             <td>${place}</td>
             <td>${new Date(dateTime).toLocaleString()}</td>
             <td>${caseType}</td>
             <td>${caseStatus}</td>
             <td>
                <button type="button" style="background-color:#1E477D; color:white" class="btn edit-btn" data-bs-toggle="modal" data-bs-target="#editSection">EDIT</button>
             </td>
          </tr>
    `;

    document.querySelector('.dashboard-table tbody').insertAdjacentHTML('beforeend', newRow);
    document.getElementById('addCaseForm').reset();
    document.querySelector('#addSection .btn-close').click();
    addEditEventListeners();
});

function addEditEventListeners() {
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.removeEventListener('click', handleEditClick); // Remove existing listener
        button.addEventListener('click', handleEditClick); // Add new listener
    });
}

function handleEditClick() {
    const row = this.closest('tr');
    const caseNumber = row.children[0].textContent;
    const complainants = row.children[1].textContent;
    const respondent = row.children[2].textContent;
    const pwud = row.children[3].textContent;
    const description = row.children[4].textContent;
    const place = row.children[5].textContent;
    const dateTime = row.children[6].textContent;
    const caseType = row.children[7].textContent;
    const caseStatus = row.children[8].textContent;

    document.querySelector('#editSection input[name="caseNumber"]').value = caseNumber;
    document.querySelector('#editSection input[name="complainants"]').value = complainants;
    document.querySelector('#editSection input[name="respondent"]').value = respondent;
    document.querySelector('#editSection input[name="pwud"]').value = pwud;
    document.querySelector('#editSection textarea[name="description"]').value = description;
    document.querySelector('#editSection input[name="place"]').value = place;
    document.querySelector('#editSection input[name="dateTime"]').value = new Date(dateTime).toISOString().slice(0, 16);
    document.querySelector('#editSection select[name="caseType"]').value = caseType;
    document.querySelector('#editSection select[name="caseStatus"]').value = caseStatus;

    document.querySelector('#editSection .btn-success').onclick = function () {
        row.children[0].textContent = document.querySelector('#editSection input[name="caseNumber"]').value;
        row.children[1].textContent = document.querySelector('#editSection input[name="complainants"]').value;
        row.children[2].textContent = document.querySelector('#editSection input[name="respondent"]').value;
        row.children[3].textContent = document.querySelector('#editSection input[name="pwud"]').value;
        row.children[4].textContent = document.querySelector('#editSection textarea[name="description"]').value;
        row.children[5].textContent = document.querySelector('#editSection input[name="place"]').value;
        row.children[6].textContent = new Date(document.querySelector('#editSection input[name="dateTime"]').value).toLocaleString();
        row.children[7].textContent = document.querySelector('#editSection select[name="caseType"]').value;
        row.children[8].textContent = document.querySelector('#editSection select[name="caseStatus"]').value;

        // Close the modal
        const modalElement = document.getElementById('editSection');
        const modal = bootstrap.Modal.getInstance(modalElement);
        modal.hide();
    };
}

document.getElementById('searchInput').addEventListener('input', function () {
    const searchTerm = this.value.toLowerCase();
    const rows = document.querySelectorAll('.dashboard-table tbody tr');

    rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        const rowText = Array.from(cells).map(cell => cell.textContent.toLowerCase()).join(' ');
        row.style.display = rowText.includes(searchTerm) ? '' : 'none';
    });
});

addEditEventListeners();