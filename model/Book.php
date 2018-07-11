<?php
include 'config/ConnectDB.php';
class Book
{	 
	private $id;

	private $name;

	private $author;

	private $year;

	/**
	 * Construct , copy in internet :)))
	 */
	public function __construct()
	{
		$argv = func_get_args();
        switch(func_num_args() ) {
            case 1:
                self::__construct1();
                break;
            case 4:
                self::__construct2($argv[0], $argv[1], $argv[2], $argv[3]);
                break;
         }
	}

	/**
	 * Construct default
	 */
	public function __construct1()
	{

	}
	
	/**
	 * Construct 4 parameters
	 */
	public function __construct2($id, $name, $author, $year)
	{
		$this->id = $id;
		$this->name = $name;
		$this->author = $author;
		$this->year = $year;
	}

	/**
	 * Get list all of books
	 */ 
	public function all()
	{
		global $conn;
		$array = array();
		$sql = "SELECT * FROM book";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				$objBook = new Book($row["id"],$row["name"],$row["author"],$row["year"]);
				array_push($array,$objBook);
			}
		}
		return $array;
	}

	/**
	 * Create a book, store into database
	 */ 
	public function store()
	{
		global $conn;
		$sql = "INSERT INTO book(name, author, year) VALUE('".$this->getName()."','".$this->getAuthor()."','".$this->getYear()."')";
		if (mysqli_query($conn, $sql)) {
			return 1;
		} else {
			return 0;
		}
	}

	/**
	 * Get a book by id
	 */ 
	public function find($id)
	{
		global $conn;
		$objBook;
		$sql = "SELECT *  FROM book WHERE id = " .$id;
		$result = mysqli_query($conn ,$sql);
		if(mysqli_num_rows($result)>0){
			if($row=mysqli_fetch_array($result)) {
				$objBook = new Book($row['id'],$row['name'],$row['author'],$row['year']);
			}
		}
		return $objBook;
	}

	/**
	 * Update a book
	 */ 
	public function update()
	{
		global $conn;
		$sql = "UPDATE book SET name = '".$this->getName()."', author = '".$this->getAuthor()."', year = '".$this->getYear()."' WHERE id = ".$this->getId();
		if (mysqli_query($conn, $sql)) {
			return 1;
		} else {
			return 0;
		}
	}

	/**
	 * Delete a book by id
	 */ 
	public function delete($id)
	{
		global $conn;
		$sql = "DELETE FROM book WHERE id = ". $id;
		if (mysqli_query($conn, $sql)) {
			return 1;
		} else {
			return 0;
		}
	}

	/**
	 * Search books
	 */ 
	public function search($keyword)
	{
		global $conn;
		$array = array();
		$sql = "SELECT * FROM book WHERE name LIKE BINARY '%".$keyword."%'";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				$objBook = new Book($row["id"],$row["name"],$row["author"],$row["year"]);
				array_push($array,$objBook);
			}
		}
		return $array;
	}

	/**
	 * Get the value of id
	 */ 
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the value of id
	 *
	 * @return  self
	 */ 
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * Get the value of name
	 */ 
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set the value of name
	 *
	 * @return  self
	 */ 
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Get the value of author
	 */ 
	public function getAuthor()
	{
		return $this->author;
	}

	/**
	 * Set the value of author
	 *
	 * @return  self
	 */ 
	public function setAuthor($author)
	{
		$this->author = $author;

		return $this;
	}

	/**
	 * Get the value of year
	 */ 
	public function getYear()
	{
		return $this->year;
	}

	/**
	 * Set the value of year
	 *
	 * @return  self
	 */ 
	public function setYear($year)
	{
		$this->year = $year;

		return $this;
	}
	function __autoload($class_name) {
		require_once $class_name . '.php';
		  $this->year = $year;
	}

    /**
     * Get the value of con
     */ 
    public function getCon()
    {
        return $this->con;
    }

    /**
     * Set the value of con
     *
     * @return  self
     */ 
    public function setCon($con)
    {
        $this->con = $con;

        return $this;
	}
	/**
	 * To String a book
	 */
	public function toString()
	{
		return $this->getId() . ", ". $this->getName().", ".$this->getAuthor(). ", ".$this->getYear()."\n";
	}
}


    