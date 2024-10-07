<?php

abstract class Book{
    private int $id;
    private string $name;
    private string $author;
    private int $year;
    private string $ISBN; //пример ISBN кода 978-5-699-12014-7
    private int $count;
    private int $num;

    public function __construct(string $name, string $author, int $year, string $ISBN, int $count)
    {
        $this -> name = $name;
        $this -> author = $author;
        $this -> year = $year;
        $this -> ISBN = $ISBN;
        $this -> count = $count;
        $this -> num = 0;
    }

    public function toString(){
        echo "\n\rНазвание: " . $this->name . "\n\rАвтор: " . $this->author . "\n\rГод издания: " . $this->year . "\n\rISBN: " . $this->ISBN . "\n\rКоличество экземпляров: " . $this->count . "\n\r";
    }

    public function setID(int $setid){
        $this->id = $setid;
    }

    public function getID(){
        echo "ID:" . $this->id . "\n\r";
    }

    public function addNum(){
        Book::setNum();
    }

    protected function setNum()
    {
        $this -> num +=1;
    }

    public function getNum(): string{
        return $this->num . "\n\r";
    }

    
}