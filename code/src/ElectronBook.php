<?php

class ElectronBook extends Book{
    private string $link;
    public function __construct(string $name, string $author, int $year, string $ISBN, int $count, string $link)
    {
        parent::__construct($name, $author, $year, $ISBN, $count);
        $this -> link = $link;
    }

    public function info(){
        echo parent::toString() . "\n\rСсылка на скачивание: " . $this->link . "\n\r";        
    }

    public function download() {
        parent::setNum();
    }

    public function getElectronBook(){
        echo "Число скачанных книг:" . parent::getNum() . "\n\r";
    }
}