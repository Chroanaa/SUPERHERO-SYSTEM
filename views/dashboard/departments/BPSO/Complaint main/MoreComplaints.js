// // This is for both checkboxes

function bothCheckedAddComplainant() {
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

function bothCheckedAddRespondent() {
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

function bothCheckedComplainant_Respondent() {
    const isMinorInvolvedChecked = document.getElementById('minorInvolved').checked;
    const isDrugInvolvedChecked = document.getElementById('drugInvolved').checked;
    const respondentBoth = document.getElementById('respondent-both-btn');
    const complainantBoth = document.getElementById('complainant-both-btn');
    const specialCaseButton = document.getElementById('specialcasedrop');
    const hiddenSpecialCase = document.getElementById('hiddenSpecialCase');
    const hiddenButtons = document.querySelectorAll('#hideGreen');

    // First Dropdown
    const dropdownCategory = document.getElementById('dropdowncategory');
    const dropdownMenu = dropdownCategory.nextElementSibling;
    const hiddenCategory = document.getElementById('hiddenCategory');

    // Second Dropdown
    const secondDropdownCategory = document.getElementById('second_dropdown_category');
    const secondDropdownMenu = secondDropdownCategory.nextElementSibling;
    const secondHiddenCategory = document.getElementById('SecondHiddenCategory');

    if (isMinorInvolvedChecked && isDrugInvolvedChecked) {
        updatePWUDVisibility(isDrugInvolvedChecked.checked);

        // Disable the dropdown and set its value to BCPC
        specialCaseButton.textContent = 'BADAC & BCPC';
        specialCaseButton.disabled = true;
        hiddenSpecialCase.value = 'BADAC & BCPC';

        // First Dropdown - Set default dropdown value to BADAC Case Type
        dropdownCategory.textContent = 'Case Type for BADAC';
        hiddenCategory.value = 'Case Type for BADAC';

        dropdownMenu.innerHTML = `
            <li type="button" onclick="updateButtonText('Severe', 'dropdowncategory', event)" class="dropdown-item" style="cursor: pointer;">Severe</li>
            <li type="button" onclick="updateButtonText('Mild', 'dropdowncategory', event)" class="dropdown-item" style="cursor: pointer;">Mild</li>
            <li type="button" onclick="updateButtonText('Moderate', 'dropdowncategory', event)" class="dropdown-item" style="cursor: pointer;">Moderate</li>
        `;

        // Second Dropdown - Set default dropdown value to BCPC Case Type
        secondDropdownCategory.textContent = 'Case Type for BCPC';
        secondHiddenCategory.value = 'Case Type for BCPC';

        secondDropdownMenu.innerHTML = `
            <li type="button" onclick="updateButtonText('Physical Abuse', 'second_dropdown_category', event)" class="dropdown-item" style="cursor: pointer;">Physical Abuse</li>
            <li type="button" onclick="updateButtonText('Sexual Abuse', 'second_dropdown_category', event)" class="dropdown-item" style="cursor: pointer;">Sexual Abuse</li>
            <li type="button" onclick="updateButtonText('Emotional Abuse', 'second_dropdown_category', event)" class="dropdown-item" style="cursor: pointer;">Emotional Abuse</li>
            <li type="button" onclick="updateButtonText('Substance Abuse', 'second_dropdown_category', event)" class="dropdown-item" style="cursor: pointer;">Substance Abuse</li>
            <li type="button" onclick="updateButtonText('Neglection', 'second_dropdown_category', event)" class="dropdown-item" style="cursor: pointer;">Neglection</li>
            <li type="button" onclick="updateButtonText('Exploitation', 'second_dropdown_category', event)" class="dropdown-item" style="cursor: pointer;">Exploitation</li>
        `;

        // Update the styles directly, since respondentBoth is a single DOM element
        respondentBoth.style.display = 'inline-flex';
        respondentBoth.style.justifyContent = 'center';
        respondentBoth.style.alignItems = 'center';

        complainantBoth.style.display = 'inline-flex';
        complainantBoth.style.justifyContent = 'center';
        complainantBoth.style.alignItems = 'center';

        hiddenButtons.forEach(hiddenBtn => {
            hiddenBtn.style.display = 'none';
            console.log(hiddenBtn);
        });

        secondDropdownCategory.style.display = 'block';

        updatePWUDVisibility(true);
        updateAdultVisibility(true);

    } else {
        // Revert to default state when checkboxes are unchecked

        updatePWUDVisibility(false);
        updateAdultVisibility(false);

        // Reset the dropdown buttons
        specialCaseButton.textContent = 'Select Special Case';
        specialCaseButton.disabled = false;
        hiddenSpecialCase.value = '';

        // First Dropdown - Reset to default
        dropdownCategory.textContent = 'Select Category';
        hiddenCategory.value = '';

        dropdownMenu.innerHTML = `
            <li type="button" onclick="updateButtonText('Minor case', 'dropdowncategory', event)" class="dropdown-item" style="cursor: pointer;">Option 1</li>
            <li type="button" onclick="updateButtonText('Major case', 'dropdowncategory', event)" class="dropdown-item" style="cursor: pointer;">Option 2</li>
        `;

        // Second Dropdown - Reset to default
        secondDropdownCategory.textContent = 'Select Secondary Category';
        secondHiddenCategory.value = '';

        secondDropdownMenu.innerHTML = `
            <li type="button" onclick="updateButtonText('Minor case', 'second_dropdown_category', event)" class="dropdown-item" style="cursor: pointer;">Option A</li>
            <li type="button" onclick="updateButtonText('Major case', 'second_dropdown_category', event)" class="dropdown-item" style="cursor: pointer;">Option B</li>
        `;

        // Reset button styles
        respondentBoth.style.display = 'none';
        complainantBoth.style.display = 'none';

        hiddenButtons.forEach(hiddenBtn => {
            hiddenBtn.style.display = 'inline-flex';
            console.log(hiddenBtn);
        });

        secondDropdownCategory.style.display = 'none';
    }
}

let childrenCount = 0; // Counter to track number of children added

function addChildren() {
    childrenCount++; // Increment the counter

    // Create a wrapper div to group all fields related to one child
    const childWrapper = document.createElement('div');
    childWrapper.id = `child-wrapper-${childrenCount}`;
    childWrapper.style.marginTop = '20px';

    // Define the HTML structure for the new child's form
    childWrapper.innerHTML = `
        <div class="mt-3 mb-3">
            <label for="child-name-${childrenCount}" class="mb-2">Child Name</label>
            <input type="text" id="child-name-${childrenCount}" name="child_name[]" placeholder="Child Name" style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
        </div>
        <div class="mt-3 mb-3">
            <label for="child-age-${childrenCount}" class="mb-2">Child Age (Numbers only)</label>
            <input type="number" id="child-age-${childrenCount}" name="child_age[]" placeholder="Child Age" style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
        </div>
        <div class="mt-3 mb-3">
            <label for="child-gender-${childrenCount}" class="mb-2">Gender</label>
            <select id="child-gender-${childrenCount}" name="child_gender[]" style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
                <option value="" default>Please specify:</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="rather-not-say">Rather not say</option>
            </select>
        </div>
        <div class="mt-3 mb-3">
            <label for="child-address-${childrenCount}" class="mb-2">Current Address</label>
            <input type="text" id="child-address-${childrenCount}" name="child_address[]" placeholder="Current address of children" style="width: 100%; padding: 13px; font-size: 1rem; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
        </div>
        <button type="button" class="remove-btn" data-id="${childrenCount}" style="font-size: 16px; color: #ffffff; background-color: #cc235e; border: none; border-radius: 3px; padding: 10px; cursor: pointer; margin-top: 10px; width: 100%;">Remove</button>
    `;

    // Append the wrapper to the parent container
    const bcpcForm = document.getElementById('bcpc-form');
    bcpcForm.appendChild(childWrapper);

    // Attach event listener for the remove button
    const removeButton = childWrapper.querySelector('.remove-btn');
    removeButton.addEventListener('click', function() {
        removeChild(childrenCount);
    });
}

function removeChild(childId) {
    // Remove the entire wrapper for this child
    const childWrapper = document.getElementById(`child-wrapper-${childId}`);
    if (childWrapper) {
        childWrapper.remove();
    } else {
        console.error(`Child wrapper with id child-wrapper-${childId} not found.`);
    }
}

// Attach event listener to the add button
document.getElementById('add-children-btn').addEventListener('click', addChildren);
