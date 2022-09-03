function createSlug(inputText, inputSlug, route, getParam){
    fetch(`${route}/checkSlug?${getParam}=${inputText.value}`)
        .then(response => response.json())
        .then(response => inputSlug.value = response.slug)
}