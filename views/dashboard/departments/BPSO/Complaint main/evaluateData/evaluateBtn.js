document.addEventListener('DOMContentLoaded', function () {
    const complaintDescription = document.getElementById('complaint-description');
    const evaluateBtn = document.getElementById('evaluateBtn');
    const complainantInputs = document.querySelectorAll('#complainant-container input');
    const respondentInputs = document.querySelectorAll('#respondent-container input');
    const caseCheckboxes = document.querySelectorAll('#case-options input[type="checkbox"]');
    const dropdownCategory = document.getElementById('dropdowncategory');
    const caseTypeDropdown = document.getElementById('caseTypeDropdown');

    const caseTypes = {
        minorInvolved: {
            keywords: ['bata', 'binugbog ang aking anak', 'inabuso yung bata', 'pagpapabaya sa bata'],
            types: ['Juvenile Delinquency', 'Child Endangerment', 'Neglection or Exploitation']
        },
        drugInvolved: {
            keywords: ['may bentahan ng droga', 'pinagbantaan ako dahil sa droga', 'droga', 'gamot na ipinagbabawal'],
            types: ['Drug Related Offense', 'Substance Trafficking', 'Rehabilitation Case']
        },
        theftInvolved: {
            keywords: ['nakawan', 'ninakawan', 'magnanakaw', 'pagnanakaw'],
            types: ['Stealing']
        },
        violenceInvolved: {
            keywords: ['may suntukan', 'sapakan', 'nagbabanta', 'patayan', 'may pinatay', 'karahasan'],
            types: ['Assault', 'Homicide or Attempted Murder', 'Gender-Based Violence']
        },
        domesticIssue: {
            keywords: ['abuso', 'karahasan sa tahanan', 'alitan sa pamilya', 'diskriminasyon'],
            types: ['Domestic Violence', 'Family Feud or Custody Dispute', 'Emotional or Verbal Abuse']
        },
        vandalismInvolved: {
            keywords: ['sulat sa pader', 'sira ang ari-arian', 'pagvandal', 'paninira sa pampublikong lugar'],
            types: ['Property Defacement', 'Public Infrastructure Damage', 'Graffiti Offense']
        },
        fraudInvolved: {
            keywords: ['panloloko', 'pekeng dokumento', 'pekeng kontrata', 'pandaraya', 'scam'],
            types: ['Forgery', 'Financial Fraud', 'Identity Theft']
        },
        harassmentInvolved: {
            keywords: ['pangha-harass', 'pananakot', 'hipo', 'verbal abuse', 'pambabastos', 'bastos'],
            types: ['Bullying', 'Sexual Harassment', 'Workplace Harassment']
        },
        publicDisturbance: {
            keywords: ['gulo sa kalsada', 'maingay', 'sigawan', 'away sa pampublikong lugar', 'videoke', 'ingay'],
            types: ['Public Nuisance', 'Unlawful Assembly', 'Disorderly Conduct']
        },
        cyberCrimeInvolved: {
            keywords: ['hacking', 'pagnanakaw ng impormasyon', 'online scam', 'cyber bullying'],
            types: ['Hacking', 'Identity Theft', 'Cyber Harassment']
        },
        trespassingInvolved: {
            keywords: ['panghihimasok', 'nanghihimasok', 'pagpasok sa hindi pagmay-ari', 'hindi may ari', 'trespassing', 'pang-aabala'],
            types: ['Unauthorized Entry', 'Property Trespassing', 'Breaking and Entering']
        }
    };

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
        const description = complaintDescription.value.toLowerCase();
        const words = description.split(/\s+/); // Split description into individual words
        let detectedCases = [];

        for (const [caseId, caseInfo] of Object.entries(caseTypes)) {
            // Check if any keyword matches a whole word in the description
            if (caseInfo.keywords.some(keyword => words.includes(keyword.toLowerCase()))) {
                document.getElementById(caseId).checked = true;
                detectedCases.push(caseId);
            } else {
                document.getElementById(caseId).checked = false;
            }
        }

        updateCaseTypeDropdown(detectedCases);
    }

    function updateCaseTypeDropdown(detectedCases) {
        const caseTypeContainer = document.getElementById('caseTypeContainer');

        // Clear the previous dropdown buttons and menus
        caseTypeContainer.innerHTML = '';

        // If no cases are detected, disable all dropdowns
        if (detectedCases.length === 0) {
            dropdownCategory.disabled = true;
            dropdownCategory.textContent = 'Case Type';
        } else {
            detectedCases.forEach(caseId => {
                // Create a new dropdown button for each detected case
                const caseTypeButton = document.createElement('div');
                caseTypeButton.id = `${caseId}Button`;
                caseTypeButton.style = "display: flex; justify-content: flex-start; margin-top: 24px;";

                const hiddenCategory = document.createElement('input');
                hiddenCategory.type = 'hidden';
                hiddenCategory.name = 'case_type';
                hiddenCategory.id = `${caseId}HiddenCategory`;
                hiddenCategory.value = '';

                const dropdownBtn = document.createElement('button');
                dropdownBtn.className = 'btn btn-info dropdown-toggle';
                dropdownBtn.type = 'button';
                dropdownBtn.setAttribute('data-bs-toggle', 'dropdown');
                dropdownBtn.setAttribute('aria-expanded', 'false');
                dropdownBtn.style = "width: 100%; height: 50px; font-size: 1rem; background-color: #ffffff; border: 1px solid #b1b1b1;";
                dropdownBtn.disabled = false;  // Enable the dropdown if cases are detected
                dropdownBtn.textContent = `Case Type for ${caseId.replace(/([A-Z])/g, ' $1').trim()}`;

                const caseTypeDropdown = document.createElement('ul');
                caseTypeDropdown.className = 'dropdown-menu';
                caseTypeDropdown.id = `${caseId}TypeDropdown`;

                // Add dropdown button and menu to the container
                caseTypeButton.appendChild(hiddenCategory);
                caseTypeButton.appendChild(dropdownBtn);
                caseTypeButton.appendChild(caseTypeDropdown);
                caseTypeContainer.appendChild(caseTypeButton);

                // Fill the dropdown menu with case types
                caseTypes[caseId].types.forEach(type => {
                    const li = document.createElement('li');
                    li.innerHTML = `<a class="dropdown-item" href="#">${type}</a>`;
                    li.querySelector('a').addEventListener('click', function (e) {
                        e.preventDefault();
                        document.getElementById(`${caseId}HiddenCategory`).value = this.textContent;
                        dropdownBtn.textContent = this.textContent;
                    });
                    caseTypeDropdown.appendChild(li);
                });
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