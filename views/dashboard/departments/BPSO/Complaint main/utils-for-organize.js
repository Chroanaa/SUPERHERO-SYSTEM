export function updatePWUDVisibility(isVisible) {
    const pwudQuestions = document.querySelectorAll('.pwud-question');
    pwudQuestions.forEach(question => {
        question.style.display = isVisible ? 'block' : 'none';
    });
}

export function removeCaseTypeDropdowns() {
    const secondaryDropdown = document.getElementById('secondary-dropdowncategory');
    if (secondaryDropdown) {
        secondaryDropdown.parentElement.remove();
    }
}

export function updateButtonText(text, dropdownId, event) {
    const dropdownButton = document.getElementById(dropdownId);
    dropdownButton.textContent = text;
    const hiddenInput = document.getElementById(`hidden${dropdownId}`);
    hiddenInput.value = text;
    event.stopPropagation();
}
