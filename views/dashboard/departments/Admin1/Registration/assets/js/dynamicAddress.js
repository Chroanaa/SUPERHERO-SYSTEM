document.addEventListener("DOMContentLoaded", function () {
    // Get elements
    const residentRadio = document.getElementById("resident");
    const nonResidentRadio = document.getElementById("non_resident");
    const homeAddressContainer = document.getElementById("home-address-container");
    const sitioDropdownContainer = document.getElementById("sitio-dropdown-container");
    const sitioNumberDropdown = document.querySelector('select[name="sitio"]');
    const sitioAddressDropdown = document.querySelector('select[name="street"]');
    const homeAddressInput = document.querySelector('input[name="address"]');
    const yearOfStayInput = document.getElementById("year_of_stay");
    const yearOfStayContainer = document.getElementById("year-of-stay-container");
    const yearOfStayLabel = document.getElementById("year-of-stay-label");
    const formElements = document.querySelectorAll("input, select, button"); // All form elements

    // Ensure that Resident Type radio buttons are enabled
    residentRadio.disabled = false;
    nonResidentRadio.disabled = false;

    // Initially disable all form elements except for Resident Type
    formElements.forEach(element => {
        if (element !== residentRadio && element !== nonResidentRadio) {
            element.disabled = true;
        }
    });

    // Function to enable form fields based on the resident type selection
    function enableFormFields() {
        if (residentRadio.checked) {
            homeAddressContainer.style.display = "block";
            sitioDropdownContainer.style.display = "block";
            yearOfStayContainer.style.display = "block";
            sitioAddressDropdown.disabled = false;
            yearOfStayInput.disabled = false;
        } else if (nonResidentRadio.checked) {
            homeAddressContainer.style.display = "block";
            sitioDropdownContainer.style.display = "none";
            yearOfStayContainer.style.display = "none";
            sitioAddressDropdown.disabled = true;
            yearOfStayInput.disabled = true;
        }

        // Enable the inputs inside the form based on the resident type
        formElements.forEach(element => {
            if (element !== residentRadio && element !== nonResidentRadio) {
                element.disabled = false;
            }
        });
    }

    // Event listeners for Resident Type radio buttons
    residentRadio.addEventListener("change", enableFormFields);
    nonResidentRadio.addEventListener("change", enableFormFields);

    // Initial check if one of the radio buttons is already selected
    if (residentRadio.checked) {
        enableFormFields();
    } else if (nonResidentRadio.checked) {
        enableFormFields();
    }

    // Sitio data
    const sitioData = {
        "Sitio 1": [
            "J.P Rizal", "Paguio", "Endraca compound", "Cursilista", "Pamana", "Castro compound", "Sta. Marcela",
            "Galvez Compound", "Rivera Compound", "Amity Ville", "Plain Ville"
        ],
        "Sitio 2": [
            "Juan Luna", "J.P. Rizal", "M. H Del pilar", "Jacinto", "Diego Silang", "Malvar", "Panganiban",
            "A. Dela cruz", "F. Balagtas"
        ],
        "Sitio 3": [
            "J.P. Rizal", "Visayas Avenue", "Francisco Park", "Bukaneg", "Balagtas", "Aguinaldo", "Panday Pira",
            "Lakandula", "M. Aquino", "Lopez Jaena"
        ],
        "Sitio 4": [
            "Jose Abad Santos", "Mabini", "Humabon", "Gomez", "Burgos", "Zamora", "Bonifacio", "J. Basa",
            "Naning Ponce"
        ],
        "Sitio 5": [
            "J.P. Rizal", "Jose Abad Santos", "Mabini", "Bonifacio", "T. Alonzo", "Paterno"
        ],
        "Sitio 6": [
            "Jose Abad Santos", "T. Alonzo", "Paterno", "Veronica", "Agoncillo", "Natividad", "Rajah Soliman"
        ],
        "Sitio 7": [
            "F. Calderon", "J. Palma", "Lapu-Lapu", "Gumamela", "Dahlia", "Rosas", "Camia", "Rosal", "Sampaguita",
            "Tarhaville Ave."
        ]
    };

    // Populate Sitio Address dropdown based on Sitio Number selection
    function updateSitioAddressDropdown(selectedSitio) {
        sitioAddressDropdown.innerHTML = ""; // Clear existing options
        if (sitioData[selectedSitio]) {
            sitioData[selectedSitio].forEach((address) => {
                const option = document.createElement("option");
                option.value = address;
                option.textContent = address;
                sitioAddressDropdown.appendChild(option);
            });
            sitioAddressDropdown.disabled = false; // Enable dropdown
        } else {
            sitioAddressDropdown.disabled = true; // Disable dropdown if no data
        }
    }

    // Event listener for Sitio Number change
    sitioNumberDropdown.addEventListener("change", function () {
        const selectedSitio = sitioNumberDropdown.value;
        updateSitioAddressDropdown(selectedSitio);
    });

    // Initial population of Sitio Address if already selected Sitio Number
    if (sitioNumberDropdown.value) {
        updateSitioAddressDropdown(sitioNumberDropdown.value);
    }
});