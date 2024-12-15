import { caseTypes } from './caseTypes.js';


document.addEventListener('DOMContentLoaded', function () {
    const complaintDescription = document.getElementById('complaint-description');
    const evaluateBtn = document.getElementById('evaluateBtn');
    const complainantInputs = document.querySelectorAll('#complainant-container input');
    const respondentInputs = document.querySelectorAll('#respondent-container input');
    const caseCheckboxes = document.querySelectorAll('#case-options input[type="checkbox"]');
    const dropdownCategory = document.getElementById('dropdowncategory');
    const caseTypeDropdown = document.getElementById('caseTypeDropdown');


    function checkInputs() {
        const allComplainantFilled = Array.from(complainantInputs).every(input => input.value.trim() !== '');
        const allRespondentFilled = Array.from(respondentInputs).every(input => input.value.trim() !== '');

        if (allComplainantFilled && allRespondentFilled) {
            complaintDescription.removeAttribute('readonly');
        } else {
            complaintDescription.setAttribute('readonly', 'readonly');
        }
    }

    function autoFillCaseTypes() {
        const description = complaintDescription.value.toLowerCase(); // Convert to lowercase
        const words = description.split(/\s+/); // Split description into individual words
        let detectedCases = [];

        for (const [caseId, caseInfo] of Object.entries(caseTypes)) {
            // Create a regular expression for each keyword to ensure exact word matches
            const regex = new RegExp(`\\b(${caseInfo.keywords.join('|')})\\b`, 'i'); // 'i' for case-insensitive matching

            // Check if any keyword matches a whole word in the description
            if (regex.test(description)) {
                document.getElementById(caseId).checked = true;
                detectedCases.push(caseId);
            } else {
                document.getElementById(caseId).checked = false;
            }
        }

        // Update the dropdown or any other relevant UI element with detected case types
        updateCaseTypeDropdown(detectedCases);
    }

    function updateCaseTypeDropdown(detectedCases) {
        const caseTypeContainer = document.getElementById('caseTypeContainer');
        caseTypeContainer.innerHTML = ''; // Clear previous content

        if (detectedCases.length === 0) {
            dropdownCategory.disabled = true;
            dropdownCategory.textContent = 'Case Type';
        } else {
            detectedCases.forEach(caseId => {
                // Create dropdown button and hidden input
                const caseTypeButton = document.createElement('div');
                caseTypeButton.id = `${caseId}Button`;
                caseTypeButton.style = "display: flex; justify-content: flex-start; margin-top: 24px;";

                const hiddenCategory = document.createElement('input');
                hiddenCategory.type = 'hidden';
                hiddenCategory.name = `case_type[${caseId}]`; // Unique name for each case type
                hiddenCategory.id = `${caseId}HiddenCategory`;
                hiddenCategory.value = ''; // Default empty value

                const dropdownBtn = document.createElement('button');
                dropdownBtn.className = 'btn btn-info dropdown-toggle';
                dropdownBtn.type = 'button';
                dropdownBtn.setAttribute('data-bs-toggle', 'dropdown');
                dropdownBtn.setAttribute('aria-expanded', 'false');
                dropdownBtn.style = "width: 100%; height: 50px; font-size: 1rem; background-color: #ffffff; border: 1px solid #b1b1b1;";
                dropdownBtn.disabled = false;
                dropdownBtn.textContent = `Select Case Type for ${caseId.replace(/([A-Z])/g, ' $1').trim()}`;

                const caseTypeDropdown = document.createElement('ul');
                caseTypeDropdown.className = 'dropdown-menu';
                caseTypeDropdown.id = `${caseId}TypeDropdown`;

                // Fill dropdown menu with case types
                caseTypes[caseId].types.forEach(type => {
                    const li = document.createElement('li');
                    li.innerHTML = `<a class="dropdown-item" href="#">${type}</a>`;
                    li.querySelector('a').addEventListener('click', function (e) {
                        e.preventDefault();
                        hiddenCategory.value = type; // Update hidden input value
                        dropdownBtn.textContent = type; // Update button text
                        console.log(`Selected Case Type for ${caseId}: ${type}`); // Debug log
                    });
                    caseTypeDropdown.appendChild(li);
                });

                // Append elements to the container
                caseTypeButton.appendChild(hiddenCategory);
                caseTypeButton.appendChild(dropdownBtn);
                caseTypeButton.appendChild(caseTypeDropdown);
                caseTypeContainer.appendChild(caseTypeButton);
            });
        }
    }

    complainantInputs.forEach(input => input.addEventListener('input', checkInputs));
    respondentInputs.forEach(input => input.addEventListener('input', checkInputs));

    complaintDescription.addEventListener('input', function () {
        evaluateBtn.disabled = this.value.trim() === '';
    });

    evaluateBtn.addEventListener('click', function (event) {
        event.preventDefault();
        console.log('Identifying case...');
        autoFillCaseTypes();
        caseCheckboxes.forEach(checkbox => checkbox.disabled = false);

        // Enable the special case dropdown
        const specialCaseDropdown = document.getElementById('specialcasedrop');
        specialCaseDropdown.disabled = false;

        // Enable the input fields for Place of Incident, Incident Date, Incident Time
        document.getElementById('place-of-incident').disabled = false;
        document.getElementById('incidence-date').disabled = false;
        document.getElementById('incidence-time').disabled = false;

        // Enable the Confirm button
        const openModalButton = document.getElementById('openModalButton');
        openModalButton.disabled = false;
    });

    caseCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            updateCaseTypeDropdown(Array.from(caseCheckboxes).filter(cb => cb.checked).map(cb => cb.id));
        });
    });
});