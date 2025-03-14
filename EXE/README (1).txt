MySQL

**********************************************************************
 SQL Queries: Practice your SQL Knowledge! 
**********************************************************************

**********************************************************************
 Credit to Schema : https://github.com/AndrejPHP/w3schools-database 
**********************************************************************
Run w3schools.sql to set up database, tables and data


----Schema----
Customers (customer_id, customer_ame, contact_ame, address, city, postal_code, country)
Categories (category_id,category_name, description)
Employees (employee_id, last_name, first_name, birth_date, photo, notes)
OrderDetails(orderdetail_id, order_id, product_id, quantity)
Orders (order_id, customer_id, employee_id, order_date, shipper_id)
Products(product_id, product_name, supplier_id, category_id, unit, price)
Shippers (shipper_id, shipper_name, phone)

Questions
1. Select customer name together with each order the customer made
2. Select order id together with name of employee who handled the order
3. Select customers who did not placed any order yet
4. Select order id together with the name of products
5. Select products that no one bought
6. Select customer together with the products that he bought
7. Select product names together with the name of corresponding category
8. Select orders together with the name of the shipping company
9. Select customers with id greater than 50 together with each order they made
10. Select employees together with orders with order id greater than 10400
11. Select the most expensive product
12. Select the second most expensive product
13. Select name and price of each product, sort the result by price in decreasing order
14. Select 5 most expensive products
15. Select 5 most expensive products without the most expensive (in final 4 products)
16. Select name of the cheapest product (only name) without using LIMIT and OFFSET
17. Select employees with LastName that starts with 'D'
18.  Select number of employees with LastName that starts with 'D'
19 Select Customers with LastName that starts with 'D'
20. Select customer name together with the number of orders made by the corresponding customer sort the result by number of orders in dec order
21. Add up the price of all products
22. Select orderID together with the total price of that Order, order the result by total price of order in increasing order
23. Select customer who spend the most money
24. Select customer who spend the most money and lives in Canada
25. Select customer who spend the second most money*/
26. Select shipper together with the total price of proceed orders








//////////////////////////////////////





please create model, migration, factory faker, controller crud, and lroute api , avoid code conflict. make it dont and test relationship query

// Test with HTTP Clients all products
Route::prefix('v1')->namespace('App\Http\Controllers\API\version1')->group(function () {
    Route::apiResource('categories',      'CategoryController');
    Route::apiResource('suppliers',       'SupplierController');
    Route::apiResource('products',        'ProductController');
    Route::apiResource('order-details',   'OrderDetailsController');
    Route::apiResource('orders',          'OrdersController');
    Route::apiResource('shippers',        'ShipperController');
    Route::apiResource('customers',       'CustomerController');
    
    Route::apiResource('employees',       'EmployeeController');

    
/*******************************************************************

CRUD: http://127.0.0.1:8000/api/v1/keywords  

GET|HEAD        api/v1/products ............. products.index › API\version1\ProductController@index
POST            api/v1/products ............. products.store › API\version1\ProductController@store
GET|HEAD        api/v1/products/{product} ... products.show › API\version1\ProductController@show
PUT|PATCH       api/v1/products/{product} ... products.update › API\version1\ProductController@update
DELETE          api/v1/products/{product} ... products.destroy › API\version1\ProductController@destroy
##### categoire table
id		
string 		 	category_name
text		 	descriptipn
unsignBigInteger 	parent_id
timestampes	
softDeletes	


##### supplier table
id		
string			supplier_name
string			contact_name
string			postal_code
string			address
string			city
string			country
string			phone
softDeletes	
timestamps	

##### product table
id
unsignedBigInteger 	supplier_id
unsignedBigInteger 	category_id
string			product_name
integer			quantity
decimal			unit_price
string			img
decimal			cost
string			code
string 			barcode
string 			status
timestamps
    
//Foreign keys
foreign			category_id
foreign			supplier_id


##### customer table
id();
string			customer_name
string			contact_name
string			address
string			city
string			postal_code
string			country
string			phone
timestamps
softDeletes


##### employee table
id
string			first_name
string			last_name
string			email
string			photo
text			note
timestamps
softDeletes

##### shiper table
id
string			shipper_name
string			phone
string			photo
timestamps
oftDeletes

##### order_details table
id
unsignedBigInteger	order_id
unsignedBigInteger	product_id
integer			quantity
decimal			unit_price
decimal			discount
decimal			total
text			note\
timestamps

//foriegn key
foreign			order_id
foreign			product_id


##### orders table
id
unsignedBigInteger	customer_id
unsignedBigInteger	employee_id
unsignedBigInteger	shipper_id
date			order_date
timestamps

//foriegn key
foreign			customer_id
foreign			employee_id
foreign			shipper_id

I'll help you create all the necessary files for your API. I'll break this down into several parts:
First, let's create the migrations
Then the models with relationships
Factories with Faker data
Controllers with CRUD operations
The routes are already set up, but I'll show any necessary adjustments

