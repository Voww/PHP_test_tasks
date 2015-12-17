# ims_media_stock
IMS Media test task for PHP Programmer position.

# 1. Introduction.

IMS Media Stock Database project is developed as a task for completion of PHP Programmer position requirements. 
The project represents PHP developer's skills in object-oriented approach, xml files parsing, MySQL database 
creation and data processing using internal PHP libraries. The project's database is developed to demonstrate 1:1, 
1:M data relationships, 1-st, 2-nd and 3-rd normal forms of a databases architecture.

The 'ims_media_stock' database describes a stock list of an abstract trading company which supplies construction 
materials and related services. The company accepts XML-formatted stock reports and imports them into the database.

The task source codes are located at a git-hub repository URL https://github.com/Voww/PHP_test_tasks/tree/master/imsmedia . 
The task description file is .\imsmedia\resources\Задание для php-разработчика.txt. And an examle XML report 
there is situated at the same location .\imsmedia\resources\example.xml.

#2. System requirements.

The IMS Media Stock Database project was developed under certain system conditions and software which finally 
define minimal system requirements to your server. To run the project you will have installed 
software below listed:

* PHP 5.5.12 or higher;
* MySQL Community Server (GPL) 5.7.7-rc-log or higher;
* Web-server Apache-2.4.9 or higher.

The next software might be installed optionally:

* JDK 1.7.0_45 or higher;
* MySQL workbench 6.3 or compatible;
* IDE environment IntelliJ IDEA 14.1.4 or compatible.

#3. Installation.

To pick up the project on your local web-server, please follow these installation instructions.

* Download on your local machine the IMS Media Stock Database source code from a git-hub repository link 
https://github.com/Voww/PHP_test_tasks/tree/master/imsmedia.
* Open path .\imsmedia\resources\ and find a file named 'db_install.sql'. Execute the sql-script from console or 
using MySQL workbench or IDE. 
* Create at the MySQL database a new user 'root' with a password 'toor' having administration rights on the 
'ims_media_stock' database. You can change host name, user name and password parameters by editing 
a file .\imsmedia\dao\localhost_db_connection.ini.
* Verify the database installation typing in a MySQL console "USE ims_media_stock;" (Enter) then
"SHOW TABLES FROM ims_media_stock;" (Enter). If the database installed correctly, your will obtain the such list 
of tables: category, currency, measurement, product.
* Deploy the .\imsmedia\ directory content to your Apache server public directory.
* Open an url http://yourHostName/imsmedia/ (http://localhost/imsmedia/ by default).
If you see a text 'IMS Media test task' it means the resources are deployed correctly and 
the IMS Media Stock project is ready to use.

#4. Common project description.

The IMS Media Stock Project describes a process of data import from an XML-formatted file to a MySQL database. 
While importing the file contents is parsed by PHP XML Parser library and converted into an object relational tree. 
There are four classes of value objects at IMS Media Stock model:

* product;
* category; 
* measurement;
* currency.

The 'product' instance contains an information about certain product properties including articul, name, price etc. 
The 'category' describes groups of similar products and subcategories. The 'measurement' class serves to define a 
product measurement unit. The 'currency' allows to specify a certain product currency code. Each product refers to 
an instance of a parent category, a measurement unit and to a currency. And each category also can refer to a parent 
category. This way we have value objects combined into relational model.

According to the philosophy above described, the database also have four separate tables corresponding to value objects 
classification:

* product;
* category; 
* measurement;
* currency.

Finally a script outputs a string representation of parsed objects instances and stores them in a database.

#5. Importing an XML report into a database.

Open an url http://yourHostName/imsmedia/ where you can see a main page. Press a button 'XML import page' to switch to
an XML import page. Press a button 'Back' to return back. Press a button 'Select a file' to upload an XML file.

Choose a local file using popup selector window. For example you can select a file .\imsmedia\resources\example.xml .
Confirm your choice and ensure the selected file name is displayed. Then press 'Submit' button to upload a file to your
server. The uploaded file appears at .\imsmedia\uploads directory. An import process stats automatically. It can take 
a few seconds depending on a file size and a system performance. 

As a result you can see a succes message and a string representation of parsed objects. In case of error it will be 
error message there.

To verify the 'ims_media_stock' database import please type in an MySQL console the next commands:
 
* SELECT * FROM ims_media_stock.category;
* SELECT * FROM ims_media_stock.product;
* SELECT * FROM ims_media_stock.currency;
* SELECT * FROM ims_media_stock.measurement;

If the import procedure was correct you can see the tables filled with parsed values.

#6. Summary

The IMS Media Stock Database project describes a process of data conversion from an XML-formatted file into relational 
tree model and import into a MySQL database. And maybe the project helps to it's author to obtain a position of a PHP
programmer at the IMS Media company.

 

