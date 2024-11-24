// Add event listeners for the checkboxes
document.addEventListener('DOMContentLoaded', () => {
    const minorInvolvedCheckbox = document.getElementById('minorInvolved');
    const drugInvolvedCheckbox = document.getElementById('drugInvolved');

    // Event listener for "Minor Involved"
    minorInvolvedCheckbox.addEventListener('change', (event) => {
        handleMinorInvolved(event.target);
        handleBothChecked(); // Separate function for handling both cases
    });

    // Event listener for "Drug Involved"
    drugInvolvedCheckbox.addEventListener('change', (event) => {
        handleDrugInvolved(event.target);
        handleBothChecked(); // Separate function for handling both cases
    });
});

// Function to handle both checkboxes being checked
function handleBothChecked() {
    const isMinorInvolved = document.getElementById('minorInvolved').checked;
    const isDrugInvolved = document.getElementById('drugInvolved').checked;

    if (isMinorInvolved && isDrugInvolved) {
        bothCheckedComplainant_Respondent();
    } else {
        // Optional: Add logic to revert changes when both are unchecked
    }
}

/// Function to handle when the "Minor Involved" checkbox is checked/unchecked
function handleMinorInvolved(checkbox) {
    const modal = new bootstrap.Modal(document.getElementById('minorInvolvedModal'));
    const specialCaseButton = document.getElementById('specialcasedrop');
    const hiddenSpecialCase = document.getElementById('hiddenSpecialCase');
    const BCPCForm = document.getElementById('bcpc-form-container');
    const dropdownCategory = document.getElementById('dropdowncategory');
    const dropdownMenu = dropdownCategory.nextElementSibling;
    const hiddenCategory = document.getElementById('hiddenCategory');

    if (checkbox.checked) {
        modal.show();

        // Disable the dropdown and set its value to BCPC
        specialCaseButton.textContent = 'BCPC';
        specialCaseButton.disabled = true;
        hiddenSpecialCase.value = 'BCPC';

        // Set default dropdown value to BCPC Case Type
        dropdownCategory.textContent = 'Case Type for BCPC';
        hiddenCategory.value = 'Case Type for BCPC';

        // Show BCPC form
        BCPCForm.style.display = 'block';

        // Update dropdown options for "Minor Involved" cases
        dropdownMenu.innerHTML = `
            <li type="button" onclick="updateButtonText('Physical Abuse', 'second_dropdown_category', event)" class="dropdown-item" style="cursor: pointer;">Physical Abuse</li>
            <li type="button" onclick="updateButtonText('Sexual Abuse', 'second_dropdown_category', event)" class="dropdown-item" style="cursor: pointer;">Sexual Abuse</li>
            <li type="button" onclick="updateButtonText('Emotional Abuse', 'second_dropdown_category', event)" class="dropdown-item" style="cursor: pointer;">Emotional Abuse</li>
            <li type="button" onclick="updateButtonText('Substance Abuse', 'second_dropdown_category', event)" class="dropdown-item" style="cursor: pointer;">Substance Abuse</li>
            <li type="button" onclick="updateButtonText('Neglection', 'second_dropdown_category', event)" class="dropdown-item" style="cursor: pointer;">Neglection</li>
            <li type="button" onclick="updateButtonText('Exploitation', 'second_dropdown_category', event)" class="dropdown-item" style="cursor: pointer;">Exploitation</li>
        `;

        // Show the "Adult" question
        updateAdultVisibility(true);
    } else {
        // Reset dropdown and remove BCPC form
        dropdownCategory.textContent = 'Case Type';
        hiddenCategory.value = '';
        dropdownMenu.innerHTML = `
            <li type="button" onclick="updateButtonText('Minor case', 'dropdowncategory', event)" class="dropdown-item" style="cursor: pointer;">Minor case</li>
            <li type="button" onclick="updateButtonText('Major case', 'dropdowncategory', event)" class="dropdown-item" style="cursor: pointer;">Major case</li>
        `;
        BCPCForm.style.display = 'none';

        // Hide the "Adult" question
        updateAdultVisibility(false);
    }
}

// Function to handle when the "Drug Involved" checkbox is checked/unchecked
function handleDrugInvolved(checkbox) {
    const modal = new bootstrap.Modal(document.getElementById('drugInvolvedModal'));
    const specialCaseButton = document.getElementById('specialcasedrop');
    const hiddenSpecialCase = document.getElementById('hiddenSpecialCase');
    const dropdownCategory = document.getElementById('dropdowncategory');
    const dropdownMenu = dropdownCategory.nextElementSibling;
    const hiddenCategory = document.getElementById('hiddenCategory');
    const pwudQuestions = document.querySelectorAll('.pwud-question');
    const complainantPwudQuestions = document.querySelectorAll('.complainant .pwud-question');

    if (checkbox.checked) {
        // Show the modal
        modal.show();

        // Disable the dropdown and set its value to BADAC
        specialCaseButton.textContent = 'BADAC';
        specialCaseButton.disabled = true;
        hiddenSpecialCase.value = 'BADAC';

        // Set default dropdown value to "Case Type for BADAC"
        dropdownCategory.textContent = 'Case Type for BADAC';
        hiddenCategory.value = 'Case Type for BADAC';

        // Update dropdown options for "Drug Involved" cases
        dropdownMenu.innerHTML = `
            <li type="button" onclick="updateButtonText('Severe', 'dropdowncategory', event)" class="dropdown-item" style="cursor: pointer;">Severe</li>
            <li type="button" onclick="updateButtonText('Mild', 'dropdowncategory', event)" class="dropdown-item" style="cursor: pointer;">Mild</li>
            <li type="button" onclick="updateButtonText('Moderate', 'dropdowncategory', event)" class="dropdown-item" style="cursor: pointer;">Moderate</li>
        `;

        // Show PWUD questions (excluding complainants if necessary)
        pwudQuestions.forEach(question => {
            question.style.display = question.closest('#complainant-exclude-pwud') ? 'none' : 'block';
        });

        // This will appear on load
        // updatePWUDVisibility(isDrugInvolvedChecked.checked);

    } else {
        // Enable the dropdown and reset its value
        specialCaseButton.textContent = 'Special Case Involved';
        specialCaseButton.disabled = false;
        hiddenSpecialCase.value = '';

        // Revert dropdown to default value
        dropdownCategory.textContent = 'Case Type';
        hiddenCategory.value = '';

        // Reset dropdown options
        dropdownMenu.innerHTML = `
            <li type="button" onclick="updateButtonText('Minor case', 'dropdowncategory', event)" class="dropdown-item" style="cursor: pointer;">Minor case</li>
            <li type="button" onclick="updateButtonText('Major case', 'dropdowncategory', event)" class="dropdown-item" style="cursor: pointer;">Major case</li>
        `;

        // Hide PWUD questions for all sections
        pwudQuestions.forEach(question => {
            question.style.display = 'none';
        });
    }
}

// Function to dynamically update visibility for PWUD questions
function updatePWUDVisibility(isVisible) {
    const pwudQuestions = document.querySelectorAll('.pwud-question');
    pwudQuestions.forEach(question => {
        question.style.display = isVisible ? 'block' : 'none';
    });
}

// Ensure updateAdultVisibility works correctly
function updateAdultVisibility(isVisible) {
    const adultQuestions = document.querySelectorAll('.adult-person');
    adultQuestions.forEach(question => {
        question.style.display = isVisible ? 'block' : 'none';
    });
}

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
        <input type="text" name="complainant_name_${complainantIndex}[]" placeholder="Name" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; max-width: 400px; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
        <input type="text" name="complainant_address_${complainantIndex}[]" placeholder="Address" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; max-width: 400px; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
        <fieldset style="border-radius: 5px; display: ${isMinorInvolvedChecked ? 'block' : 'none'};">
            <legend style="font-size: 1rem;">Is this person an Adult?</legend>
            <div style="display: flex; gap: 10px; align-items: center;">
                <input type="radio" name="complainant_adult_record_${complainantIndex}" value="yes" style="width: 18px; height: 18px">
                <label for="yes">Yes</label>
                <input type="radio" name="complainant_adult_record_${complainantIndex}" value="no" style="width: 18px; height: 18px;">
                <label for="no">No</label>
            </div>
        </fieldset>
    `;

    // Append the new complainant fields to the container
    container.appendChild(newComplainantDiv);

    // This will keep the logic bug as hell.
    // updateAdultVisibility(isMinorInvolvedChecked);
}


let respondentCount = 1; // Same logic with addComplainant()

function addRespondent() {
    const container = document.getElementById('respondent-container');
    const isMinorInvolvedChecked = document.getElementById('minorInvolved').checked;
    const isDrugInvolvedChecked = document.getElementById('drugInvolved').checked;

    // Generate unique name attributes using the complainantCount
    const respondentIndex = respondentCount++;

    // Add the new respondent fields
    const newRespondent = document.createElement('div');
    newRespondent.classList.add('respondent-entry');
    newRespondent.innerHTML = `
        <input type="text" name="respondent_name_${respondentIndex}[]" placeholder="Name" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; max-width: 400px; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
        <input type="text" name="respondent_address_${respondentIndex}[]" placeholder="Address" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; max-width: 400px; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
        
        <fieldset style="border: 1px solid #d4d4d4; padding: 10px; border-radius: 5px; display: ${isMinorInvolvedChecked ? 'block' : 'none'};">
            <legend style="font-size: 1rem;">Is this person an Adult?</legend>
            <div style="display: flex; gap: 10px; align-items: center;">
                <input type="radio" name="respondent_adult_${respondentIndex}[]" value="yes" style="width: 18px; height: 18px">
                <label for="yes">Yes</label>
                <input type="radio" name="respondent_adult_${respondentIndex}[]" value="no" style="width: 18px; height: 18px;">
                <label for="no">No</label>
            </div>
        </fieldset>
        
        <fieldset style="border: 1px solid #d4d4d4; padding: 10px; border-radius: 5px; display: ${isDrugInvolvedChecked ? 'block' : 'none'};">
        <legend class="pwud-question" style="font-size: 1rem;">
            Is this person a PWUD?
        </legend>
            <div style="display: flex; gap: 10px; align-items: center;">
                <input type="radio" name="respondent_pwud_${respondentIndex}[]" value="yes" style="width: 18px; height: 18px;">
                <label for="yes">Yes</label>
                <input type="radio" name="respondent_pwud_${respondentIndex}[]" value="no" style="width: 18px; height: 18px;">
                <label for="no">No</label>
            </div>
  
    `;

    // Append the new respondent to the container
    container.appendChild(newRespondent);

    // Select all PWUD questions within the newly added respondent
    const pwudQuestions = newRespondent.querySelectorAll('.pwud-question');

    // Update the display of each PWUD question based on the checkbox state
    pwudQuestions.forEach((question) => {
        if (isDrugInvolvedChecked) {
            question.style.display = 'block';
        } else {
            question.style.display = 'none';
        }
    });
}

// Remove secondary case type dropdown
function removeCaseTypeDropdowns() {
    const secondaryDropdown = document.getElementById('secondary-dropdowncategory');
    if (secondaryDropdown) {
        secondaryDropdown.parentElement.remove();
    }
}

function updateDropdownOptions() {
    const checkboxMinor = document.getElementById('Checkbox1').checked;
    const checkboxDrug = document.getElementById('Checkbox2').checked;
    const dropdownMenu = document.getElementById('dropdowncategory').nextElementSibling;

    let options = '';

    if (checkboxMinor) {
        options += `
            <li type="button" onclick="updateButtonText('Physical Abuse', 'second_dropdown_category', event)" class="dropdown-item" style="cursor: pointer;">Physical Abuse</li>
            <li type="button" onclick="updateButtonText('Sexual Abuse', 'second_dropdown_category', event)" class="dropdown-item" style="cursor: pointer;">Sexual Abuse</li>
            <li type="button" onclick="updateButtonText('Emotional Abuse', 'second_dropdown_category', event)" class="dropdown-item" style="cursor: pointer;">Emotional Abuse</li>
            <li type="button" onclick="updateButtonText('Substance Abuse', 'second_dropdown_category', event)" class="dropdown-item" style="cursor: pointer;">Substance Abuse</li>
            <li type="button" onclick="updateButtonText('Neglection', 'second_dropdown_category', event)" class="dropdown-item" style="cursor: pointer;">Neglection</li>
            <li type="button" onclick="updateButtonText('Exploitation', 'second_dropdown_category', event)" class="dropdown-item" style="cursor: pointer;">Exploitation</li>
        `;
    }

    if (checkboxDrug) {
        options += `
            <li type="button" onclick="updateButtonText('Severe', 'dropdowncategory', event)" class="dropdown-item" style="cursor: pointer;">Severe</li>
            <li type="button" onclick="updateButtonText('Mild', 'dropdowncategory', event)" class="dropdown-item" style="cursor: pointer;">Mild</li>
            <li type="button" onclick="updateButtonText('Moderate', 'dropdowncategory', event)" class="dropdown-item" style="cursor: pointer;">Moderate</li>
        `;
    }

    // Fallback default options
    if (!checkboxMinor && !checkboxDrug) {
        options = `
            <li type="button" onclick="updateButtonText('Minor case', 'dropdowncategory', event)" class="dropdown-item" style="cursor: pointer;">Minor case</li>
            <li type="button" onclick="updateButtonText('Major case', 'dropdowncategory', event)" class="dropdown-item" style="cursor: pointer;">Major case</li>
        `;
    }

    dropdownMenu.innerHTML = options;
}