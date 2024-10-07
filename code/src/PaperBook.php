<?php

class PaperBook extends Book{
    private string $adress;
    public function __construct(string $name, string $author, int $year, string $ISBN, int $count, string $adress)
    {
        parent::__construct($name, $author, $year, $ISBN, $count);
        $this -> adress = $adress;
    }

    public function info(){
        echo parent::toString() . "\n\rАдрес библиотеки: " . $this->adress . "\n\r";        
    }

    public function getBook() {
        parent::setNum();
    }

    public function getPaperBook(){
        echo "Число взятых книг:" . parent::getNum() . "\n\r";
    }
}