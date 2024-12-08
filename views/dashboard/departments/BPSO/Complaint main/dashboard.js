// Para sa radio button bitch

let complainantCount = 1;  // Counter for keeping track of the complainant sections

function addComplainant() {
    const container = document.getElementById('complainant-container');
    const isMinorInvolvedChecked = document.getElementById('minorInvolved').checked;

    // Create a new div container for the complainant fields
    const newComplainantDiv = document.createElement('div');
    newComplainantDiv.style.display = 'flex';
    newComplainantDiv.style.flexDirection = 'column';
    newComplainantDiv.style.gap = '10px';

    // Generate unique name attributes using the complainantCount
    const complainantIndex = complainantCount++;

    // Create the new complainant fields with unique name attributes
    newComplainantDiv.innerHTML = `
        <input type="text" name="complainant_name_${complainantIndex}[]" placeholder="Name" class="form-control">
        <input type="text" name="complainant_address_${complainantIndex}[]" placeholder="Address" class="form-control">
    `;

    // Append the new complainant fields to the container
    container.appendChild(newComplainantDiv);

    // This will keep the logic bug as hell.
    // updateAdultVisibility(isMinorInvolvedChecked);
}


let respondentCount = 1; // Same logic with addComplainant()

function addRespondent() {
    const container = document.getElementById('respondent-container');

    // Generate unique name attributes using the complainantCount
    const respondentIndex = respondentCount++;

    // Add the new respondent fields
    const newRespondent = document.createElement('div');
    newRespondent.classList.add('respondent-entry');
    newRespondent.style.display = 'flex';
    newRespondent.style.flexDirection = 'column';
    newRespondent.style.gap = '10px';
    newRespondent.innerHTML = `
        <input type="text" name="respondent_name_${respondentIndex}[]" placeholder="Name" class="form-control">
        <input type="text" name="respondent_address_${respondentIndex}[]" placeholder="Address" class="form-control">
    `;

    // Append the new respondent to the container
    container.appendChild(newRespondent);
}

// dropdown ng button
function updateButtonText(text, buttonId, event) {
    const button = document.getElementById(buttonId);
    button.textContent = text;
    if (buttonId === 'specialcasedrop') {
        document.getElementById('hiddenSpecialCase').value = text;
    } else if (buttonId === 'dropdowncategory') {
        document.getElementById('hiddenCategory').value = text;
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const minorInvolvedCheckbox = document.getElementById('minorInvolved');
    const bcpcFormContainer = document.getElementById('bcpc-form-container');
    const specialCaseDropdown = document.getElementById('specialcasedrop');

    console.log(minorInvolvedCheckbox)
    
    // Listen for checkbox change event
    minorInvolvedCheckbox.addEventListener('change', function () {
        if (minorInvolvedCheckbox.checked) {
            // Show the BCPC form container if Minor Involved is checked and special case is BCPC
            bcpcFormContainer.style.display = 'block';
        } else {
            // Hide it if the condition is not met
            bcpcFormContainer.style.display = 'none';
        }
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const drugInvolvedCheckbox = document.getElementById('drugInvolved');
    const badacFormContainer = document.getElementById('badac-form-container');
    const specialCaseDropdown = document.getElementById('specialcasedrop');

    console.log(drugInvolvedCheckbox)
    
    // Listen for checkbox change event
    drugInvolvedCheckbox.addEventListener('change', function () {
        if (drugInvolvedCheckbox.checked) {
            // Show the BCPC form container if Minor Involved is checked and special case is BCPC
            badacFormContainer.style.display = 'block';
        } else {
            // Hide it if the condition is not met
            badacFormContainer.style.display = 'none';
        }
    });
});