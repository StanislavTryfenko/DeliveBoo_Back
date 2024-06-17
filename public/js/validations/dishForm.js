function validateDishForm() {

    const name = document.forms['dishForm']['name'].value;
    const price = document.forms['dishForm']['price'].value;
    const avaiable = document.forms['dishForm']['avaiable'].value;
    
    if (!name) {
        alert("Please enter a name");
        return false;
    }

    if (price.match(/[^0-9.]/)) {
        alert("Please enter a price");
        return false;
    }

    return true;

}