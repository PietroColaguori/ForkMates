function validateForm() {
    var category = document.getElementById("recipeCategory");
    if(category.value == "Choose...") {
        alert("Choose a category");
        return false;
    }
    alert("Recipe inserted!")
    return true;
}
