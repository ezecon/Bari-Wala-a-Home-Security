const hamburger = document.querySelector('.header .nav-bar .nav-list .hamburger');
const mobile_menu = document.querySelector('.header .nav-bar .nav-list ul');
const menu_item = document.querySelectorAll('.header .nav-bar .nav-list ul li a');
const header = document.querySelector('.header.container');

hamburger.addEventListener('click', () => {
	hamburger.classList.toggle('active');
	mobile_menu.classList.toggle('active');
});

document.addEventListener('scroll', () => {
	var scroll_position = window.scrollY;
	if (scroll_position > 250) {
		header.style.backgroundColor = '#29323c';
	} else {
		header.style.backgroundColor = 'transparent';
	}
});

menu_item.forEach((item) => {
	item.addEventListener('click', () => {
		hamburger.classList.toggle('active');
		mobile_menu.classList.toggle('active');
	});
});

 var order = [];

        function addToOrder(item) {
            order.push(item);
            renderOrderList();
        }

        function renderOrderList() {
            var orderList = document.getElementById('orderList');
            orderList.innerHTML = '';

            for (var i = 0; i < order.length; i++) {
                var li = document.createElement('li');
                li.textContent = order[i];
                orderList.appendChild(li);
            }
        }

        document.getElementById('services container2').addEventListener('click', function(event) {
            if (event.target.classList.contains('add-to-order')) {
                var item = event.target.getAttribute('data-item');
                addToOrder(item);
            }
        });

        document.getElementById('submitOrder').addEventListener('click', function() {
            // Process the order
            // ... your code for order processing goes here ...

            // Clear the order
            order = [];
            renderOrderList();
            alert('Order submitted successfully!');
        });