# RPI Free & For Sale

## Team 18
Joyce Fang, Yuchen Luo, and Ilhwan Song

## Link to GitHub Repository
https://github.com/xiaolef/rpifreeforsale.git

## Problem
Current administrators of the RPI Free & For Sale Facebook Group are not allowing access to RPI students. Although the RPI Facebook group Free and For Sale exists, it is no longer active anymore. This new website will enable RPI students to buy and sell items more easily and efficiently among other RPI students.

## What it does
A simple and easy website that helps RPI students exchange items for free and/or buy and sell items. It includes a product listing page of all of the items for sale, an “upload” feature where a seller can fill a form about the item they wish to sell, a login and sign up page, and product descriptions of items being sold.

## Who it serves
Any RPI student who wishes to buy or sell items. In order for students to post an item on the website, the student must currently be enrolled in RPI.

## In Context of Existing Applications
Websites such as Craigslist and Amazon are fairly similar to how our website functions. Craigslist has a “create a posting” button which will be like the upload feature on our website. Amazon has listings of products, which is what we hope to achieve with the layout and design of the items for sale. However, the difference of our website from Craigslist or Amazon is that RPI Free and For Sale is meant to serve only RPI students. We hope that once project becomes fully functional, it will allow all RPI students use the website and feel secure.

## Areas of Focus
### Primary Area
Area 4: Pull real data from a database — Save the data submitted by the user and use database to display items
### Secondary Area
Area 1: HTML, CSS, and graphics for page layout and design — Design a homepage with filter bar, item listing page, upload page

## Conclusion
All three of our team members lacked experiences in creating a website and using a database, so we received a lot of help from the professor, Youtube videos, and other websites. Problems we ran into include: uploading user input data to the database using mySQL and PHP (Syntax errors), saving files from users and moving the files to the specific folder location, how to dynamically display data from the database by reading the data using PHP and mySQL, creating search bar and filter items within the database, how to link the connection between the user input and database. 

In the future, we hope in include an actual login system that allows all RPI students to have access (using Central Authentication Service), a system on the website that notifies the seller when contact the seller forms have been submitted, using Internet Message Access Protocol to send and receive confirmation codes to improve the security of the website, and a messaging system that allows buyers and sellers to get in contact directly on the website.

## Launch Instructions

### Install and run on localhost
1. Clone the files to your localhost htdocs folder
2. Go to phpMyAdmin and create a database called "rpifreeforsale"
3. Go to the database and import the file "itemsTable.sql" from the rpifreeforsale folder
4. In the file includes/dbconnect.inc.php, change the password in line 10 (the 2nd 'root') to your own password.
5. Copy and paste http://localhost:8080/rpifreeforsale/login.html for Mac and use http://localhost/rpifreeforsale/login.html for Windows
6. On the login page, type in "bob" for username and "123456" for password
7. Now you will directed to the homepage of RPI Free & For Sale
