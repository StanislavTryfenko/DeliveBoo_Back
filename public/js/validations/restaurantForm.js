function validateRestaurantForm() {

    const name = document.forms['restaurantForm']['name'].value;
    const address = document.forms['restaurantForm']['address'].value;
    const phone_number = document.forms['restaurantForm']['phone_number'].value;
    const contact_email = document.forms['restaurantForm']['contact_email'].value;
    const types = document.forms['restaurantForm']['typeList[]'];
    const vat = document.forms['restaurantForm']['vat'].value;

    if (!name) {
        alert("Please enter a name");
        return false;
    }

    if (!address) {
        alert("Please enter an address");
        return false;
    }

    if (!phone_number.match(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im)) {
        alert("Please enter a valid phone number");
        return false;
    }

    if (!contact_email.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/)) {
        alert("Please enter a valid email");
        return false;
    }

    let atLeastOneChecked = false;
    types.forEach(type => {
        if(type.checked) {
            atLeastOneChecked = true;
        }
    });
    if(!atLeastOneChecked) {
        alert("Please select at least one type");
        return false;
    }

    if (!vat.match(/^[0-9]{11}$/)) {
        alert("Please enter a valid vat");
        return false;
    }

    return true;

}