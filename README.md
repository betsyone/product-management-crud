# PHP CRUD Application

This is a simple PHP CRUD (Create, Read, Update, Delete) application. It allows users to manage products by performing operations such as adding, editing, deleting, and viewing products. The application displays product information including name, description, price, quantity, barcode, and timestamps. It also uses sessions for feedback messages and includes basic confirmation for deletion.

## Project Structure

- **`create.php`**: Page for adding new products to the database.
- **`daproduct.sql`**: SQL file containing the database schema for products.
- **`db.php`**: Database connection file.
- **`delete.php`**: Page for deleting products from the database.
- **`edit.php`**: Page for editing existing product information.
- **`index.php`**: The main page that lists all products and provides links to add, edit, and delete products.

## Installation

1. **Set up the Database**:
    - Import the `daproduct.sql` file into your MySQL database. You can use a tool like phpMyAdmin or the MySQL command line:
      ```bash
      mysql -u [username] -p [database_name] < daproduct.sql
      ```

2. **Configure Database Connection**:
    - Edit the `db.php` file to include your database connection details:
      ```php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "your_database_name";
      
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      ```

3. **Run the Application**:
    - Place all files in your web server's root directory (e.g., `htdocs` in XAMPP).
    - Access the application by navigating to `http://localhost/index.php` in your web browser.

## Features

- **Add Products**: Allows you to add new products to the database.
- **View Products**: Displays a list of all products with options to edit or delete.
- **Edit Products**: Modify existing product details.
- **Delete Products**: Remove products from the database with confirmation.

## Contributing

## License


