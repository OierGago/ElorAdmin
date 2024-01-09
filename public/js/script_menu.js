document.addEventListener('DOMContentLoaded', function () {
    var dropdown = document.getElementById('dropdownMenu');
    var configIcon = document.querySelector('.config-icon');

    configIcon.addEventListener('click', function (event) {
        event.stopPropagation(); // Evitar que el clic llegue al documento y cierre inmediatamente el menú
        toggleDropdown();
    });

    document.addEventListener('click', function () {
        hideDropdown();
    });

    // Añadir evento para cerrar el menú al hacer clic fuera del menú
    dropdown.addEventListener('click', function (event) {
        event.stopPropagation(); // Evitar que el clic llegue al documento
        // Aquí puedes agregar lógica adicional según la opción del menú en la que se haya hecho clic
    });

    function toggleDropdown() {
        if (dropdown.style.display === 'block') {
            hideDropdown();
        } else {
            showDropdown();
        }
    }

    function showDropdown() {
        dropdown.style.display = 'block';
    }

    function hideDropdown() {
        dropdown.style.display = 'none';
    }

    document.addEventListener('DOMContentLoaded', function () {
        const submenuToggle = document.querySelector('.submenu-toggle');
    
        submenuToggle.addEventListener('mouseover', function () {
            this.parentElement.querySelector('.dropdown-submenu').classList.toggle('show');
            this.classList.toggle('collapsed');
        });
    });
});