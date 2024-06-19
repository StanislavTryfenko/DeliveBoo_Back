function validateRegisterForm() {

    const types = document.forms['registerForm']['typeList[]'];
    const password = document.forms['registerForm']['password'];
    const passwordCheck = document.forms['registerForm']['password-confirm'];


    let pushForm = true;

    let atLeastOneChecked = false;
    types.forEach(type => {
        if (type.checked) {
            atLeastOneChecked = true;
        }
    });
    if (!atLeastOneChecked) {
        alert("Per favore seleziona almeno una Tipologia per il Tuo Ristorante");
        pushForm = false;
    }

    if (password.value !== passwordCheck.value) {
        alert("Le password non corrispondono!");
        pushForm = false;
    }

    return pushForm;

}