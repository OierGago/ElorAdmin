document.addEventListener('DOMContentLoaded', function () {
    var dropdown = document.getElementById('dropdownMenu');
    var configIcon = document.querySelector('.config-icon');

    var isMouseOverIcon = false;
    var isMouseOverDropdown = false;

    configIcon.addEventListener('mouseover', function () {
        isMouseOverIcon = true;
        showDropdown();
    });

    configIcon.addEventListener('mouseout', function () {
        isMouseOverIcon = false;
        hideDropdown();
    });

    dropdown.addEventListener('mouseover', function () {
        isMouseOverDropdown = true;
        showDropdown();
    });

    dropdown.addEventListener('mouseout', function () {
        isMouseOverDropdown = false;
        hideDropdown();
    });

    function showDropdown() {
        if (isMouseOverIcon || isMouseOverDropdown) {
            dropdown.style.display = 'block';
        }
    }

    function hideDropdown() {
        if (!isMouseOverIcon && !isMouseOverDropdown) {
            dropdown.style.display = 'none';
        }
    }

    document.addEventListener('click', function (event) {
        var isClickInside = configIcon.contains(event.target) || dropdown.contains(event.target);

        if (!isClickInside) {
            hideDropdown();
        }
    });
});