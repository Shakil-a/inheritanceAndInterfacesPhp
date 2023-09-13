<?php

// creating an interface for methods we will be using in the inventory class

interface InvetoryInterface{
  public function addItem($item);
  public function removeItem($item);
  public function listItems();
}


// a parent class called item with 3 properties a construct function for the title author and year, and three methods to return each of these properties
class Item {
    protected $title;
    protected $author;
    protected $year;

    public function __construct($title, $author, $year){
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
    }

        public function getTitle() {
            return $this->title;
        }
    
        public function getAuthor() {
            return $this->author;
        }
    
        public function getYear() {
            return $this->year;
        }
    }

// a child class called book that inherits the properties and methods from item and adds genre and publisher to it
class Book extends Item{
    protected $genre;
    protected $publisher;

    public function __construct($title, $author, $year, $genre, $publisher){
        parent::__construct($title, $author, $year);
        $this->genre = $genre;
        $this->publisher = $publisher;
    }

    public function getGenre(){
        return $this->genre;
    }

    public function getPublisher(){
        return $this->publisher;
    }
}

// a child class called DVD which inherits everything from item class and adds its duration and director properties with methods returning it
class Dvd extends Item{
    protected $duration;
    protected $director;

    public function __construct($title, $author, $year, $duration, $director){
        parent::__construct($title, $author, $year);
        $this->duration = $duration;
        $this->director = $director;
    }

    public function getDuration(){
        return $this->duration;
    }

    public function getDirector(){
        return $this->director;
    }
}

//a invetory class which uses the invetory interface and defines the three methods to add, delete and list the items
class invetory implements InvetoryInterface{
    // we first have a property called items which is an empty array which we fill with the items from either dvd or book
    public $items = [];

    // the add item method just adds the item we pass in to the empty array called items
    public function addItem($item)
    {
        $this->items[] = $item;
    }

    // the removeItem method checks first if the item we pass in is present in the array and if it is then removes it from the array
    public function removeItem($item)
    {
        // if(array_key_exists($item, $this->items)){
        //     unset($this->items[$item]);
        // }

        $index = array_search($item, $this->items);
        if ($index !== false) {
            unset($this->items[$index]);

    }}

    //list items lists the items inside the array 
    public function listItems() {
    // {
    //     return $this->items;
    // }

    foreach ($this->items as $item) {
        echo $item->getTitle() . ' by ' . $item->getAuthor() . ' (' . $item->getYear() . ')' . PHP_EOL;
    }
}}
//we create an instance of the invetory class so we can use the methods of adding,removing and listing items.
$inventory = new invetory();

//we create a book object from the book class with some data passed in 
$book = new Book("im learning coding", "shakil", 2023, "programming", "shakil");

//we then use the addItem method from the iventory object and pass in the book object we created 
$inventory->addItem($book);

//we then list this item and echo it to make sure the addItem method had worked.
echo $inventory->listItems();


