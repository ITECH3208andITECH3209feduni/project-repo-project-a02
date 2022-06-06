
let currentTab = 0;
let allProfileTabs = document.querySelectorAll('.profile-tab');
const btnNext = document.getElementById('btn-next');
const btnPrev = document.getElementById('btn-prev');
const profileForm = document.getElementById('profile-form');


// display tab
const displayTab = (tabIndex) => {
    allProfileTabs[tabIndex].style.display = "flex";

    if(tabIndex == 0) btnPrev.style.display = "none";
    else btnPrev.style.display = "flex";
    if(tabIndex == (allProfileTabs.length - 1)){
        btnNext.innerHTML = "Submit"
    } else {
        btnNext.innerHTML = "Next"
    }
}


const nextPrev = (value) => {
    if(value == 1 && !validateInputField()) return false;

    allProfileTabs[currentTab].style.display = "none";
    currentTab = currentTab + value;
    if(currentTab >= allProfileTabs.length){
        profileForm.submit();
        return false;
    }
    displayTab(currentTab);
}

// input field validation
const validateInputField = () => {
    let isValid = true;
    let inputFields = allProfileTabs[currentTab].querySelectorAll('input');

    for(i = 0; i < inputFields.length; i++){
        if(inputFields[i].value.trim() == ""){
            inputFields[i].classList.add('invalid-profile-input');
            isValid = false;
            const invalidFields = document.querySelectorAll('.invalid-profile-input');

            invalidFields.forEach((invalidField) => {
                removeInvalidLine(invalidField);
            });
            
        }
    }
    return isValid;
}

displayTab(currentTab);

// remove the invalid outline
const removeInvalidLine = (inputField) => {
    setTimeout(() => {
        inputField.classList.remove('invalid-profile-input');
    }, 2000);
}
