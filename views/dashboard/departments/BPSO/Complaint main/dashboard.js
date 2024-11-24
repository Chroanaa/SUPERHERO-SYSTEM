// function toggleSubMenu() {
//     const submenu = document.querySelector(".sidebar-submenu-show");
//     submenu.style.display = submenu.style.display === "none" || submenu.style.display === "" ? "block" : "none";
// }
// // ito naman para ipakita ang specific section
// function showSection(sectionId) { document.querySelectorAll("section").forEach(section => { section.style.display = "none";  });
// const sectionToShow = document.getElementById(sectionId);
//     if (sectionToShow) {
//         sectionToShow.style.display = "block";}}
// window.onload = function() {
//     showSection('dasboardsection');};
// window.onload = function() {
//     if (window.location.hash === '#complaintsection') {
//         document.getElementById('complaintsection').style.display = 'block';
//     }
// };


// Complaint pag filter ng table (SEARCHING LOL)

// let selectedCategory = 'All'; 
//     function selectCategory(category) {  
//         selectedCategory = category; document.getElementById("dropdownButton").textContent = category;
//         filterTable(); 
//     } 

//     function filterTable() { 
//         const searchInput = document.getElementById("search-input") ? document.getElementById("search-input").value.toLowerCase() : "";
//         const table = document.getElementById("tablecase");
//         const rows = table.getElementsByTagName("tr");
//         for (let i = 1; i < rows.length; i++) {
//             const cells = rows[i].getElementsByTagName("td");
//             const caseCategory = cells[2] ? cells[2].textContent : ""; 
//             const matchesCategory = (caseCategory === selectedCategory || selectedCategory === 'All');
//             const matchesSearch = searchInput === "" || rows[i].textContent.toLowerCase().includes(searchInput);
//             rows[i].style.display = matchesCategory && matchesSearch ? "" : "none";
//         }
//     }

// Pag gawa ng bagong textbox para sa complainant


// function addComplainant() {
//     const container = document.getElementById('complainant-container');
//     const nameInput = document.createElement('input');
//     nameInput.type = 'text';
//     nameInput.placeholder = 'Name';
//     nameInput.style.cssText = 'padding: 15px; font-size: 20px; height: 50px; width: 400px; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff; display: block; margin-bottom: 10px;';

   
//     const addressInput = document.createElement('input');
//     addressInput.type = 'text';
//     addressInput.placeholder = 'Address';
//     addressInput.style.cssText = 'padding: 13px; font-size: 20px; height: 50px; width: 400px; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff; display: block; margin-bottom: 10px;';

   
//     container.appendChild(nameInput);
//     container.appendChild(addressInput);

   
//     const button = document.getElementById('add-button');
//     const totalInputs = container.children.length;
//     button.style.top = (100 + totalInputs * 60) + 'px'; 
// }

//  add button para sa Respondent
// function addComplainant() {
//     const container = document.getElementById('complainant-container');
//     const newComplainant = `
//         <input type="text" name="complainant_name[]" placeholder="Name" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; max-width: 400px; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
//         <input type="text" name="complainant_address[]" placeholder="Address" style="padding: 15px; font-size: 1rem; height: 50px; width: 100%; max-width: 400px; border-radius: 3px; border: 1px solid #d4d4d4; background-color: #ffffff;">
//         <label class="pwud-question" style="font-size: 1rem;">
//             Is this person a PWUD?
//             <div style="display: flex; gap: 10px; align-items: center;">
//                 <input type="radio" name="complainant_pwud[]" value="yes"> Yes
//                 <input type="radio" name="complainant_pwud[]" value="no"> No
//             </div>
//         </label>
//     `;
//     container.insertAdjacentHTML('beforeend', newComplainant);
// }
 
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