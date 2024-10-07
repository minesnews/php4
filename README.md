# Основы PHP

## Домашнее задание № 4.

1. Придумайте класс, который описывает любую сущность из предметной области библиотеки: книга, шкаф, комната и т.п.

### Решение:

Создадим класс книга:

```
<?php

class Book{
}
```

2. Опишите свойства классов из п.1 (состояние).

### Решение:

Введем переменные в классе и определим их в методе __construct:

```
<?php

class Book{

    private int $id; // ID книги
    private string $name; // Имя книги
    private string $author; // Автор книги
    private int $year; // Год издательства
    private string $ISBN; //пример ISBN кода 978-5-699-12014-7
    private int $count; // Тираж

    public function __construct(string $name, string $author, int $year, string $ISBN, int $count)
    {
        $this -> name = $name;
        $this -> author = $author;
        $this -> year = $year;
        $this -> ISBN = $ISBN;
        $this -> count = $count;
    }
}
```

3. Опишите поведение классов из п.1 (методы).

### Решение:

Добавим методы для класса книга:

```
<?php

class Book{

    private int $id; // ID книги
    private string $name; // Имя книги
    private string $author; // Автор книги
    private int $year; // Год издательства
    private string $ISBN; //пример ISBN кода 978-5-699-12014-7
    private int $count; // Тираж

    public function __construct(string $name, string $author, int $year, string $ISBN, int $count)
    {
        $this -> name = $name;
        $this -> author = $author;
        $this -> year = $year;
        $this -> ISBN = $ISBN;
        $this -> count = $count;
    }

    public function toString(){ // Отобразить данные о книги
        echo "\n\rНазвание: " . $this->name . "\n\rАвтор: " . $this->author . "\n\rГод издания: " . $this->year . "\n\rISBN: " . $this->ISBN . "\n\rКоличество экземпляров: " . $this->count . "\n\r";
    }

    public function setID(int $setid){ // Установить id для книги
        $this->id = $setid;
    }

    public function getID(){ //Получить id книги
        echo "ID:" . $this->id . "\n\r";
    }
}
```

4. Придумайте наследников классов из п.1. Чем они будут отличаться?

### Решение:

Наследники класса: электронная книга, бумажная книга, они будут отличаться некоторыми методами и переменными.

5. Создайте структуру классов ведения книжной номенклатуры.
— Есть абстрактная книга.
— Есть цифровая книга, бумажная книга.
— У каждой книги есть метод получения на руки.

У цифровой книги надо вернуть ссылку на скачивание, а у физической – адрес библиотеки, где ее можно получить. У всех книг формируется в конечном итоге статистика по кол-ву прочтений.
Что можно вынести в абстрактный класс, а что надо унаследовать?

### Решение:

Код для абстрактной книги:

```
<?php

<?php

abstruct class Book{
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

    public function getNum(){
        echo "Число полученных книг:" . $this->num . "\n\r";
    }

    
}
```

Код для электронной книги:

```
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
}
```

Код для бумажной книги:

```
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
```

Код для создания книг:

```
<?php

require('./vendor/autoload.php');
require('src/Book.php');
require('src/ElectronBook.php');
require('src/PaperBook.php');

use App\Oop\App;

$app = new App();
$index1 = new ElectronBook("Электронная книга", "Петров Петр", 1997, "178-5-699-12014-7", 300, "app_run.php");
$index1 -> toString();
$index1 -> getElectronBook();
$index1 -> download();
$index1 -> info();
$index1 -> getElectronBook();

$index2 = new PaperBook("Бумажная книга", "Сидоров Иван", 2007, "378-4-699-12016-7", 300, "Москва");
$index2 -> toString();
$index2 -> getPaperBook();
$index2 -> getBook();
$index2 -> info();
$index2 -> getPaperBook();
```

6. Дан код:

```
<?php
class A {
  public function foo() {
    static $x = 0;
    echo ++$x;
  }
}
$a1 = new A();
$a2 = new A();
$a1->foo(); // output: 1
$a2->foo(); // output: 2
$a1->foo(); // output: 3
$a2->foo(); // output: 4
```

Что он выведет на каждом шаге? Почему?

Немного изменим п.5

```
<?php
class A {
  public function foo() {
    static $x = 0;
    echo ++$x;
  }
}
class B extends A
{
}
$a1 = new A();
$b1 = new B();
$a1->foo(); // output: 1
$b1->foo(); // output: 2
$a1->foo(); // output: 3
$b1->foo(); // output: 4
```

Что он выведет теперь?

### Решение:

Как мы видим, вывод в двух случаях одинаковый (1234), поскольку класс B наследуется от класса A и в классе B нет переопределяющих функций.
