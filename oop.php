<?php

class Book
{
    private $title;
    private $availableCopies;

    public function __construct($title, $availableCopies)
    {
        $this->title = $title;
        $this->availableCopies = $availableCopies;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAvailableCopies()
    {
        return $this->availableCopies;
    }

    public function borrowBook()
    {
        if ($this->availableCopies > 0) {
            $this->availableCopies--;
            return true;
        } else {
            return false;
        }
    }

    public function returnBook()
    {
        $this->availableCopies++;
    }
}

class Member
{
    private $name;
    private $borrowedBooks = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function borrowBook(Book $book)
    {
        if ($book->borrowBook()) {
            $this->borrowedBooks[] = $book;
            return true;
        } else {
            return false;
        }
    }

    public function returnBook(Book $book)
    {
        if (($key = array_search($book, $this->borrowedBooks, true)) !== false) {
            $book->returnBook();
            unset($this->borrowedBooks[$key]);
        }
    }
}

$book1 = new Book("The Great Gatsby", 5);
$book2 = new Book("To Kill a Mockingbird", 3);

// Create 2 members
$member1 = new Member("John Doe");
$member2 = new Member("Jane Smith");

// Member 1 borrows book 1
$member1->borrowBook($book1);
// Member 2 borrows book 2
$member2->borrowBook($book2);

// Print available copies
echo "Available copies of \"" . $book1->getTitle() . "\": " . $book1->getAvailableCopies() . "\n";
echo "Available copies of \"" . $book2->getTitle() . "\": " . $book2->getAvailableCopies() . "\n";