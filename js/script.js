let templateSlider = $('.template-slider');
templateSlider.owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    dots: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 3
        }
    }
})


// let currentTab = 0;
// let allProfileTabs = document.querySelectorAll('.profile-tab');
// const btnNext = document.getElementById('btn-next');
// const btnPrev = document.getElementById('btn-prev');
// const profileForm = document.getElementById('profile-form');


// display tab
// const displayTab = (tabIndex) => {
//     allProfileTabs[tabIndex].style.display = "flex";

//     if(tabIndex == 0) btnPrev.style.display = "none";
//     else btnPrev.style.display = "flex";
//     if(tabIndex == (allProfileTabs.length - 1)){
//         btnNext.innerHTML = "Submit"
//     } else {
//         btnNext.innerHTML = "Next"
//     }
// }


// const nextPrev = (value) => {
//     if(value == 1 && !validateInputField()) return false;

//     allProfileTabs[currentTab].style.display = "none";
//     currentTab = currentTab + value;
//     if(currentTab >= allProfileTabs.length){
//         profileForm.submit();
//         return false;
//     }
//     displayTab(currentTab);
// }

// input field validation
// const validateInputField = () => {
//     let isValid = true;
//     let inputFields = allProfileTabs[currentTab].querySelectorAll('input');

//     for(i = 0; i < inputFields.length; i++){
//         if(inputFields[i].value.trim() == ""){
//             inputFields[i].classList.add('invalid-profile-input');
//             isValid = false;
//             const invalidFields = document.querySelectorAll('.invalid-profile-input');

//             invalidFields.forEach((invalidField) => {
//                 removeInvalidLine(invalidField);
//             });

//         }
//     }
//     return isValid;
// }

// displayTab(currentTab);

// remove the invalid outline
// const removeInvalidLine = (inputField) => {
//     setTimeout(() => {
//         inputField.classList.remove('invalid-profile-input');
//     }, 2000);
// }


// form repeater
$(document).ready(function () {
    $('.repeater').repeater({
        initEmpty: false,
        defaultValues: {
            'text-input': ''
        },
        show: function () {
            $(this).slideDown();
        },
        hide: function (deleteElement) {
            $(this).slideUp(deleteElement);
            setTimeout(() => {
                generateCV();
            }, 500);
        },
        isFirstItemUndeletable: true
    })
})

// cv dynamic
const cvForm = document.getElementById('profile-form');
// user inputs elements
let firstnameElem = cvForm.firstname,
    lastnameElem = cvForm.lastname,
    imageElem = cvForm.image,
    designationElem = cvForm.designation,
    addressElem = cvForm.address,
    cityElem = cvForm.city,
    emailElem = cvForm.email,
    summaryElem = cvForm.summary,
    phoneElem = cvForm.phone,
    facebookElem = cvForm.facebook;

// user output elements
let nameShow = document.getElementById('name_show'),
    designationShow = document.getElementById('designation_show'),
    phoneShow = document.getElementById('phone_show');
emailShow = document.getElementById('email_show'),
    addressShow = document.getElementById('address_show'),
    fbShow = document.getElementById('fb_show'),
    summaryShow = document.getElementById('summary_show'),
    imageShow = document.getElementById('image_show');

// views
let projectsContainer = document.querySelector('.projects-list');
let achievementsContainer = document.querySelector('.achievements-list');
let skillsContainer = document.querySelector('.skills-list');
let eduContainer = document.querySelector('.edu-list');
let expContainer = document.querySelector('.experience-list');

function getUserInputs() {
    let achievementsTitleElem = document.querySelectorAll('.achieve_title');
    let achievementsDescriptionElem = document.querySelectorAll('.achieve_description');
    let expTitleElem = document.querySelectorAll('.exp_jobtitle');
    let expCompanyElem = document.querySelectorAll('.exp_organization')
    let expLocationElem = document.querySelectorAll('.exp_location');
    let expStartDateElem = document.querySelectorAll('.exp_startdate');
    let expEndDateElem = document.querySelectorAll('.exp_enddate');
    let expDescriptionElem = document.querySelectorAll('.exp_description');
    let eduSchoolElem = document.querySelectorAll('.edu_school');
    let eduDegreeElem = document.querySelectorAll('.edu_degree');
    let eduCityElem = document.querySelectorAll('.edu_city');
    let eduStartDateElem = document.querySelectorAll('.edu_startdate');
    let eduGraduationDateElem = document.querySelectorAll('.edu_graduationdate');
    let eduDescriptionElem = document.querySelectorAll('.edu_description');
    let projTitleElem = document.querySelectorAll('.proj_title');
    let projLinkElem = document.querySelectorAll('.proj_link');
    let projDescriptionElem = document.querySelectorAll('.proj_description');
    let skillElem = document.querySelectorAll('.skill');

    return {
        firstname: firstnameElem.value,
        lastname: lastnameElem.value,
        designation: designationElem.value,
        address: addressElem.value,
        city: cityElem.value,
        email: emailElem.value,
        summary: summaryElem.value,
        phone: phoneElem.value,
        facebook: facebookElem.value,
        achievements: fetchAchievementsValues(achievementsTitleElem, achievementsDescriptionElem),
        experiences: fetchExperienceValues(expTitleElem, expCompanyElem, expLocationElem, expStartDateElem, expEndDateElem, expDescriptionElem),
        educations: fetchEducationValues(eduSchoolElem, eduDegreeElem, eduCityElem, eduStartDateElem, eduGraduationDateElem, eduDescriptionElem),
        projects: fetchProjectValues(projTitleElem, projLinkElem, projDescriptionElem),
        skills: fetchSkillValues(skillElem)
    }
}

function fetchAchievementsValues(...nodeLists) {
    let length = nodeLists[0].length;
    let tempArr = [];
    for (let i = 0; i < length; i++) {
        if ((nodeLists[0][i].value).trim().length > 1) {
            let obj = {};
            obj.achieve_title = nodeLists[0][i].value;
            obj.achieve_description = nodeLists[1][i].value;
            tempArr.push(obj);
        }
    }
    return tempArr;
}

function fetchExperienceValues(...nodeLists) {
    let length = nodeLists[0].length;
    let tempArr = [];
    for (let i = 0; i < length; i++) {
        if ((nodeLists[0][i].value).trim().length > 1) {
            let obj = {};
            obj.exp_title = nodeLists[0][i].value;
            obj.exp_company = nodeLists[1][i].value;
            obj.exp_location = nodeLists[2][i].value;
            obj.exp_startdate = nodeLists[3][i].value;
            obj.exp_enddate = nodeLists[4][i].value;
            obj.exp_description = nodeLists[5][i].value;
            tempArr.push(obj);
        }
    }
    return tempArr;
}

function fetchEducationValues(...nodeLists) {
    let length = nodeLists[0].length;
    let tempArr = [];
    for (let i = 0; i < length; i++) {
        if ((nodeLists[0][i].value).trim().length > 1) {
            let obj = {};
            obj.edu_school = nodeLists[0][i].value;
            obj.edu_degree = nodeLists[1][i].value;
            obj.edu_city = nodeLists[2][i].value;
            obj.edu_startdate = nodeLists[3][i].value;
            obj.edu_graduationdate = nodeLists[4][i].value;
            obj.edu_description = nodeLists[5][i].value;
            tempArr.push(obj);
        }
    }
    return tempArr;
}

function fetchProjectValues(...nodeLists) {
    let length = nodeLists[0].length;
    let tempArr = [];
    for (let i = 0; i < length; i++) {
        if ((nodeLists[0][i].value).trim().length > 1) {
            let obj = {};
            obj.proj_title = nodeLists[0][i].value;
            obj.proj_link = nodeLists[1][i].value;
            obj.proj_description = nodeLists[2][i].value;
            tempArr.push(obj);
        }
    }
    return tempArr;
}

function fetchSkillValues(...nodeLists) {
    let length = nodeLists[0].length;
    let tempArr = [];
    for (let i = 0; i < length; i++) {
        if ((nodeLists[0][i].value).trim().length > 1) {
            let obj = {};
            obj.skill = nodeLists[0][i].value;
            tempArr.push(obj);
        }
    }
    return tempArr;
}

// generate CV
function generateCV() {
    let data = getUserInputs();
    displayCV(data);
}

// display cv
function displayCV(userData) {
    nameShow.innerHTML = userData.firstname + " " + userData.lastname;
    phoneShow.innerHTML = userData.phone;
    emailShow.innerHTML = userData.email;
    addressShow.innerHTML = userData.address;
    fbShow.innerHTML = userData.facebook;
    designationShow.innerHTML = userData.designation;
    summaryShow.innerHTML = userData.summary;
    showProjectsList(userData.projects);
    showAchievementsList(userData.achievements);
    showSkillsList(userData.skills);
    showEduList(userData.educations);
    showExperienceList(userData.experiences);
}

// image preview
function previewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById('image').files[0]);
    oFReader.onload = function (ofEvent) {
        document.getElementById('image_show').src = ofEvent.target.result;
    }
}

function showProjectsList(list) {
    projectsContainer.innerHTML = "";
    list.forEach((listItem) => {
        let itemElem = document.createElement('div');
        itemElem.classList.add('sec-item-sub');
        itemElem.innerHTML = `
            <h4 class="sec-item-sub-title">${listItem.proj_title}</h4>
            <p class='sec-text'>${listItem.proj_link}</p>
            <p class='sec-text'>${listItem.proj_description}</p>
        `;
        projectsContainer.appendChild(itemElem);
    });

}

function showAchievementsList(list) {
    achievementsContainer.innerHTML = "";
    list.forEach((achieveItem) => {
        let itemElem = document.createElement('div');
        itemElem.classList.add('sec-item-sub');
        itemElem.innerHTML = `
            <h4 class="sec-item-sub-title">${achieveItem.achieve_title}</h4>
            <p class='sec-text'>${achieveItem.achieve_description}</p>
        `;
        achievementsContainer.appendChild(itemElem);
    })
}

function showSkillsList(list) {
    skillsContainer.innerHTML = "";
    list.forEach((skillItem) => {
        let itemElem = document.createElement('div');
        itemElem.classList.add('sec-item-sub');
        itemElem.innerHTML = `
            <li>${skillItem.skill}</li>
        `;
        skillsContainer.appendChild(itemElem);
    })
}

function showEduList(list) {
    eduContainer.innerHTML = "";
    list.forEach(eduItem => {
        let itemElem = document.createElement('div');
        itemElem.classList.add('sec-item-sub');
        itemElem.innerHTML = `
            <h4 class="sec-item-sub-title">${eduItem.edu_school}</h4>
            <p class='sec-text'>Degree: ${eduItem.edu_degree}</p>
            <p class='sec-text'> Join: ${eduItem.edu_startdate}- Graduation: ${eduItem.edu_graduationdate}</p>
            <p class='sec-text'>${eduItem.edu_description}</p>
        `;
        eduContainer.appendChild(itemElem);
    })
}

function showExperienceList(list) {
    expContainer.innerHTML = "";
    list.forEach(expItem => {
        let itemElem = document.createElement('div');
        itemElem.classList.add("sec-item-sub");
        itemElem.innerHTML = `
            <h4 class="sec-item-sub-title">${expItem.exp_title}</h4>
            <p class='sec-text'>${expItem.exp_company} / ${expItem.exp_location} </p>
            <p class='sec-text'>Start: ${expItem.exp_startdate} - End: ${expItem.exp_enddate}</p>
            <p class='sec-text'>${expItem.exp_description}</p>
        `;
        expContainer.appendChild(itemElem);
    })
}

function printCV() {
    window.print();
}