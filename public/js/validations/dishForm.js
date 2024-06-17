function validateDishForm() {

    const name = document.forms['dishForm']['name'].value;
    const price = document.forms['dishForm']['price'].value;
    
    if (!name) {
        alert("Please enter a name");
        return false;
    }

    if (!price.match(/^\d+(\.\d{2})?$/)) {
        alert("Please enter a valid price");
        return false;
    }

    return true;

}