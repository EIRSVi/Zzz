MySQL

**********************************************************************
 SQL Queries: Practice your SQL Knowledge! 
**********************************************************************

**********************************************************************
 Credit to Schema : https://github.com/AndrejPHP/w3schools-database 
**********************************************************************
Run w3schools.sql to set up database, tables and data


----Schema----
Customers (CustomerID, CustomerName, ContactName, Address, City, PostalCode, Country)
Categories (CategoryID,CategoryName, Description)
Employees (EmployeeID, LastName, FirstName, BirthDate, Photo, Notes)
OrderDetails(OrderDetailID, OrderID, ProductID, Quantity)
Orders (OrderID, CustomerID, EmployeeID, OrderDate, ShipperID)
Products(ProductID, ProductName, SupplierID, CategoryID, Unit, Price)
Shippers (ShipperID, ShipperName, Phone)

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
