function validateDishForm() {

    const name = document.forms['dishForm']['name'].value;
    const price = document.forms['dishForm']['price'].value;
    
    if (!name) {
        alert("Please enter a name");
        return false;
    }

    if (isNaN(price) || price < 0 || price > 999.99 || price.toString().split('.')[1] && price.toString().split('.')[1].length > 2) {
        alert("Please enter a valid price");
        return false;
    }

    return true;

}