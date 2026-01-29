import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    const filterSelect = document.querySelector('#filter-select');
    const startDate = document.querySelector('input[name="start_date"]');
    const endDate = document.querySelector('input[name="end_date"]');
    const menuToggle = document.getElementById('mobile-menu-toggle');
    const navMenu = document.querySelector('nav-menu');

    if (filterSelect) {
        filterSelect.addEventListener('change', function () {
            this.form.submit();
        });
    }

    if (startDate && endDate) {
        startDate.addEventListener('change', function () {
            if(endData.value < startDate.value) {
                alert('De einddatum mag niet eerder zijn dan de startdatum.');
                endDate.value = '';
            }
        });
    }

    if(menuToggle){
        menuToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            menuToggle.classList.toggle('open');
        });
    }

    const inputs = document.querySelectorAll('.input-field input');
    inputs.forEach(function(input) {
        input.addEventListener('focus', function() {
            this.parentNode.classList.add('focused');
        });
        input.addEventListener('blur', () => {
            input.parentElement.classList.remove('focused');
        });
    });

    const deleteButtons = document.querySelectorAll('.delete-comfirm');
    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function (event)
        {
            if (!confirm('Weet je zeker dat je dit wilt verwijderen?')) 
            {
                event.preventDefault();
            }
        });
    });
});

