// Get the button and submenu by their IDs
const manageCarsBtn = document.getElementById('manageCarsBtn');
const dropdown1 = document.getElementById('dropdown1');

// Add event listener to the button for click event
manageCarsBtn.addEventListener('click', function() {
    dropdown1.classList.toggle('hidden');
});

// Get the button and submenu by their IDs
const manageCustomersBtn = document.getElementById('manageCustomersBtn');
const dropdown2 = document.getElementById('dropdown2');

// Add event listener to the button for click event
manageCustomersBtn.addEventListener('click', function() {
    dropdown2.classList.toggle('hidden');
});