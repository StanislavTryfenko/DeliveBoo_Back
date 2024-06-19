function validateDishForm() {

    const name = document.forms['dishForm']['name'].value;
    const price = document.forms['dishForm']['price'].value;

    if (!name) {
        alert("Aggiungi un Nome.");
        return false;
    }

    if (isNaN(price) || price < 0 || price > 999.99 || price.toString().split('.')[1] && price.toString().split('.')[1].length > 2) {
        alert("Aggiungi un Prezzo.");
        return false;
    }

    return true;

}