function validateRegisterForm() {

    const types = document.forms['registerForm']['typeList[]'];
    const password = document.forms['registerForm']['password'];
    const passwordCheck = document.forms['registerForm']['password-confirm'];


    let pushForm = false;
    let atLeastOneChecked = false;
    let passwordChecked = false;

    types.forEach(type => {
        if(type.checked) {
            atLeastOneChecked = true;
        }
    });

    if(!atLeastOneChecked) {
        alert("Please select at least one type");      
    }

    if(password.value !== passwordCheck.value) {
        passwordChecked = false;
        alert("Passwords do not match");
    }

    if (atLeastOneChecked && passwordCheck){
        pushForm=true;
    } 
    
    return pushForm;

}