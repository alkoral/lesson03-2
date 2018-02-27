<?php
echo "<h1>Выводим стоимость товаров</h1>";

interface Price
{
  public function getTitle();
}

interface Insurance
{
  public function addInsurance();
}

interface Shipping
{
  public function addShipping();
}

interface Recipe
{
  public function addRecipe();
}


class Product // наш суперкласс
{
  public $title;
  public $price;
  public function __construct($title, $price)
  {
    $this->title = $title;
    $this->price = $price;
  }
  public function getTitle()
  {
    return $this->title;
  }
    public function getPrice()
  {
    return $this->price;
  }
}

class Car extends Product implements Price, Insurance
{
  public $model;
  public $fuel;
  public $gearbox;
  public $color;
  public $discount;
  public $insurance = false;
  public function addInsurance() {
}
  public function getPrice() {
    if ($this->discount) {
      return round($this->price - ($this->price * $this->discount / 100));
    }
    else {
      return $this->price;
    }
  }
}

$toyota = new Car("Автомобиль", 1500000);
$toyota->model = 'Toyota Camry';
$toyota->fuel = 'бензин';
$toyota->gearbox = 'автоматическая';
$toyota->color = 'черная';
$toyota->discount = 10;
$toyota->addInsurance();
echo $toyota->title." ".$toyota->model." стоит ".$toyota->getPrice()." рублей<br>";

$bmw = new Car("Автомобиль", 2000000);
$bmw->model = 'BMW X3';
$bmw->fuel = 'дизель';
$bmw->gearbox = 'ручная';
$bmw->color = 'красная';
$bmw->discount = 0;

echo $bmw->title." ".$bmw->model." стоит ".$bmw->getPrice()." рублей<br><br>";

class Tv extends Product implements Price, Shipping
{
  public $brand;
  public $screen;
  public $size;
  public $color;
  public $shipping = false;
  public function addShipping() {
    $this->shipping = true;
  }
  public function getPrice() {
    if ($this->shipping) {
      return ($this->price + $this->shipping=500);
    }
    else {
      return $this->price;
      }
    }
}

$sony = new Tv("Телевизор", 30000);
$sony->brand = 'Sony';
$sony->screen = 'ЖК';
$sony->size = 42;
$sony->color = 'Серебристый';
$sony->shipping;
echo $sony->title." ".$sony->brand." стоит ".$sony->getPrice()." рублей<br>";

$samsung = new Tv("Телевизор", 28000);
$samsung->brand = 'Samsung';
$samsung->screen = 'Плазма';
$samsung->size = 40;
$samsung->color = 'Черный';
$samsung->addShipping();
echo $samsung->title." ".$samsung->brand." стоит ".$samsung->getPrice()." рублей<br><br>";

class Pen extends Product implements Price
{
  public $brand;
  public $material;
  public $ink_color;
  public $rechargeable;
  public $discount;
  public function getPrice() {
    if ($this->discount) {
      return round($this->price - ($this->price * $this->discount / 100));
    }
    else {
      return $this->price;
    }
  }
}

$bic = new Pen("Ручка", 50);
$bic->title = $bic->title." шариковая";
$bic->brand = "BIC";
$bic->material = "Пластик";
$bic->ink_color = "Синий";
$bic->rechargeable = "нет";
echo $bic->title." ".$bic->brand." стоит ".$bic->getPrice()." рублей<br>";

$parker = new Pen("Ручка", 1000);
$parker->title = $parker->title." чернильная";
$parker->brand = "Parker";
$parker->material = "Металл";
$parker->ink_color = "Черный";
$parker->rechargeable = "да";
echo $parker->title." ".$parker->brand." стоит ".$parker->getPrice()." рублей<br><br>";

class Duck extends Product implements Price, Recipe
{
  public $producer;
  public $weight;
  public $expires = false;
  public $note;
  public function addRecipe() {
  }
  public function getPrice() {
    if ($this->expires) {
      return $this->price=0;
    }
    else {
      return $this->price;
    }
  }
}

$duck_old = new Duck("Утка", 400);
$duck_old->producer = "Старые Васюки Ltd.";
$duck_old->weight = 2;
$duck_old->expires = true;
echo $duck_old->title." фабрики ".$duck_old->producer." стоит ".$duck_old->getPrice()." рублей<br>";
echo $duck_old->note;

$duck_fresh = new Duck("Утка", 600);
$duck_fresh->producer = "Новые Васюки Inc.";
$duck_fresh->weight = 3;
$duck_fresh->expires;
echo $duck_fresh->title." фабрики ".$duck_fresh->producer." стоит ".$duck_fresh->getPrice()." рублей<br><br>";

class Item extends Product implements Price
{
  public $category;
  public $discount;
  public function getPrice() {
    if ($this->discount) {
      return round($this->price - ($this->price * $this->discount / 100));
    }
    else {
      return $this->price;
    }
  }
}

$drink = new Product("Coca-Cola", 50);
$drink->category = "Напитки";
$drink->discount = 5;
echo "Товар ".$drink->title." из категории ".$drink->category." стоит ".$drink->getPrice()." рублей<br>";

$pizza = new Product("Пицца \"Маргарита\"", 750);
$pizza->category = "Закуски";
$pizza->discount = 15;
echo "Товар ".$pizza->title." из категории ".$pizza->category." стоит ".$pizza->getPrice()." рублей<br>";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Результат добавления суперкласса и интерфейсов для всех объектов</title>
</head>
<body>
  
</body>
</html>