BuyOnline - Project 2 Documentation

URL:
•	To access the project, use the following link: https://mercury.swin.edu.au/cos80021/s105299366/Project2/buyonline.htm
List of Files:
HTML files:
1.	buyonline.htm
•	Home page for the BuyOnline platform.
2.	login.htm
•	Customer login page.
3.	mlogin.htm
•	Manager login page.
4.	register.htm
•	Customer registration page.
5.	buying.htm
•	Page for customers to view and purchase available items
6.	listing.htm
•	Item listing page that add products into the inventory(used by managers).
7.	processing.htm
•	Used by managers to process purchase orders.
8.	logout.htm
•	logout page.
JavaScript Files:
1.	listing.js
•	JavaScript for handling the dynamic listing of items.
2.	register.js
•	Handles form validation and submission for customer registration.
PHP Files:
1.	register.php
•	Handles customer registration process.
2.	customer_login.php
•	Authenticates customer login details.
3.	manager_login.php
•	Authenticates manager login details.
4.	add_item.php
•	Add new items to the goods list (accessible to managers).
5.	process_items.php
•	Manager tool for processing purchase orders.
6.	get_goods_data.php
•	Fetches goods information from the server to populate item listings.
7.	update_quantity.php
•	Updates item quantity when a purchase is made.
8.	update_quantity_remove.php
•	Handles removing items from the cart and updating quantities.
9.	confirm_purchase.php
•	Processes and confirms a customer's purchase.
10.	cancel_purchase.php
•	Handles cancelling customer purchase requests.
11.	redirect.php
•	Redirects users back to login page based on session validation.
12.	logout.php
•	Handles user session termination and logout processes.




Instructions for Use
Customer Workflow
1.	Registration
•	Customers should first register by navigating to register.htm. Once registered, they can log in via login.htm.
2.	Shopping
•	After login, customers can browse products via buying.htm and add items to their shopping cart.
•	If a customer confirms their purchase, the system will automatically update the inventory via confirm_purchase.php
•	If a customer cancels their purchase, the system will automatically update the inventory via cancel_purchase.php

3.	When logging out via logout.htm, the system ensures that any pending items in the cart are canceled before terminating the session.
Manager Workflow
1.	Login
•	Managers access their functionalities via mlogin.htm. This allows them to manage inventory and process customer orders.
2.	Listing
•	Managers can add items into the inventory using listing.htm
3.	Processing Orders
•	Using the processing.htm page, the manager can process the sold items.
4.	Logout
•	Manager can logout from the system using the logout button.






