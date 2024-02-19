function toggleAttributes(element) {
    var attributesList = element.nextElementSibling;
    if (attributesList.style.display === 'none') {
        attributesList.style.display = 'block';
    } else {
        attributesList.style.display = 'none';
    }
}
