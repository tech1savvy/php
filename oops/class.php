<?php
// 1. Abstract Class: Product (Abstract Base Class)
abstract class Product
{
    // Abstract method to display product details
    // Abstract methods have no body and must be implemented by subclasses
    abstract public function displayDetails();
}

// 2. Interface: Displayable
interface Displayable
{
    // Interface method to display product details
    // All classes implementing this interface must define this method
    public function displayProduct();
}

// 3. Book Class: Inherits from Product and Implements Displayable Interface
class Book extends Product implements Displayable
{
    // Private properties (Encapsulation)
    private $title;
    private $author;
    private $price;

    // Constructor function to initialize the properties (Constructor function)
    public function __construct($title, $author, $price)
    {
        // Calling setter methods for validation when initializing properties
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setPrice($price);
    }

    // Getter for title
    public function getTitle()
    {
        return $this->title;
    }

    // Setter for title with validation
    public function setTitle($title)
    {
        if (empty($title)) {
            echo "Title cannot be empty.<br>";
        } else {
            $this->title = $title; // Assign value to the private property
        }
    }

    // Getter for author
    public function getAuthor()
    {
        return $this->author;
    }

    // Setter for author with validation
    public function setAuthor($author)
    {
        if (empty($author)) {
            echo "Author cannot be empty.<br>";
        } else {
            $this->author = $author; // Assign value to the private property
        }
    }

    // Getter for price
    public function getPrice()
    {
        return $this->price;
    }

    // Setter for price with validation
    public function setPrice($price)
    {
        if ($price < 0) {
            echo "Price cannot be negative.<br>";
        } else {
            $this->price = $price; // Assign value to the private property
        }
    }

    // Implementing the displayProduct() method from Displayable interface
    public function displayProduct()
    {
        // This method is required by the Displayable interface and must be implemented
        echo "Book Title: " . $this->getTitle() . "<br>";
        echo "Author: " . $this->getAuthor() . "<br>";
        echo "Price: $" . $this->getPrice() . "<br><br>";
    }

    // Overriding the displayDetails() method from the abstract class Product
    public function displayDetails()
    {
        // This method is required by the abstract class Product
        echo "Book Details:<br>";
        echo "Title: " . $this->getTitle() . "<br>";
        echo "Author: " . $this->getAuthor() . "<br>";
        echo "Price: $" . $this->getPrice() . "<br><br>";
    }
}

// 4. Ebook Class: Inherits from Book and Overrides displayDetails()
class Ebook extends Book
{
    // Private property specific to Ebook
    private $fileSize;

    // Constructor for Ebook class (Constructor inheritance)
    public function __construct($title, $author, $price, $fileSize)
    {
        parent::__construct($title, $author, $price); // Call the parent class constructor
        $this->fileSize = $fileSize;
    }

    // Getter for fileSize
    public function getFileSize()
    {
        return $this->fileSize;
    }

    // Setter for fileSize
    public function setFileSize($fileSize)
    {
        if ($fileSize < 0) {
            echo "File size cannot be negative.<br>";
        } else {
            $this->fileSize = $fileSize; // Assign value to the private property
        }
    }

    // Overriding the displayDetails() method from the parent class (Function Overriding)
    public function displayDetails()
    {
        // Call the parent method to display common book details
        parent::displayDetails();
        echo "File Size: " . $this->getFileSize() . " MB<br><br>";
    }
}

// 5. Creating Objects and Calling Methods (Instantiation and Method Invocation)
// Create Book object
$book1 = new Book("The Great Gatsby", "F. Scott Fitzgerald", 10.99);
$book1->displayProduct(); // Calling the method from Displayable interface

// Create Ebook object
$ebook1 = new Ebook("Digital Fortress", "Dan Brown", 12.99, 5);
$ebook1->displayProduct(); // Calling the method from Displayable interface

// Create another Book object with invalid price
$book2 = new Book("1984", "George Orwell", -5); // Invalid price

// Display details using overridden method
echo "Displaying Book 1 details using overridden displayDetails():<br>";
$book1->displayDetails();

echo "Displaying Ebook 1 details using overridden displayDetails():<br>";
$ebook1->displayDetails();
