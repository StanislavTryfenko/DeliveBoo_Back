function validateRegisterForm() {

    const types = document.forms['registerForm']['typeList[]'];
    const password = document.forms['registerForm']['password'];
    const passwordCheck = document.forms['registerForm']['password-confirm'];


    let pushForm = false;

    let atLeastOneChecked = false;
    types.forEach(type => {
        if(type.checked) {
            atLeastOneChecked = true;
        }
    });
    if(!atLeastOneChecked) {
        alert("Please select at least one type");
        pushForm = false;
    }

    if(password.value !== passwordCheck.value) {
        alert("Passwords do not match");
        pushForm = false;
    }

    return pushForm;

}