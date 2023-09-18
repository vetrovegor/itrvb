<?php

class Product
{
    public $id;
    public $name;
    public $price;

    function __construct($id, $name, $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    function disPlayInfo()
    {
        echo 'Id: ' . $this->id . ', Название: ' . $this->name . ', Цена: ' . $this->price;
    }
}

class Characteristic
{
    public $id;
    public $key;
    public $value;

    function __construct($id, $key, $value)
    {
        $this->id = $id;
        $this->key = $key;
        $this->value = $value;
    }
}

class ProductFullInfo extends Product
{
    public $image;
    public $description;
    public $characteristics;

    function __construct($id, $name, $price, $image, $description)
    {
        parent::__construct($id, $name, $price);
        $this->image = $image;
        $this->description = $description;
        $this->characteristics = [];
    }

    function disPlayInfo()
    {
        parent::disPlayInfo();
        echo ', Картинка: ' . $this->image . ', Описание: ' . $this->description;
    }

    function addCharacterisctic(Characteristic $characteristic)
    {
        array_push($this->characteristics, $characteristic);
    }

    function disPlayCharacterisctics()
    {
        echo 'Характеристики<br>';
        foreach ($this->characteristics as $characteristic) {
            echo $characteristic->key . ': ' . $characteristic->value . '<br>';
        }
    }
}

class ProductWithRelatedProducts extends Product
{
    public $relatedProducts;

    function __construct($id, $name, $price)
    {
        parent::__construct($id, $name, $price);
        $this->relatedProducts = [];
    }

    function addRelatedProduct(Product $relatedProduct) {
        array_push($this->relatedProducts, $relatedProduct);
    }

    function disPlayRelatedProducts()
    {
        echo 'Сопутствующие товары:<br>';
        foreach ($this->relatedProducts as $relatedProduct) {
            echo $relatedProduct->name . '<br>';
        }
    }
}

$productFullInfo = new ProductFullInfo(1, 'Lenovo', 50000, 'lenovo.jpg', 'Что за аппарат!');

$characteristic1 = new Characteristic(1, 'Вес', 100);
$characteristic2 = new Characteristic(2, 'Ширина', 150);
$characteristic3 = new Characteristic(1, 'Год', 2022);

$productFullInfo->addCharacterisctic($characteristic1);
$productFullInfo->addCharacterisctic($characteristic2);
$productFullInfo->addCharacterisctic($characteristic3);

$productFullInfo->disPlayCharacterisctics();

$productWithRelatedProducts = new ProductWithRelatedProducts(2, 'iPhone', 100000);

$relatedProduct1 = new Product(3, 'Зарядка', 5000);
$relatedProduct2 = new Product(4, 'Наушники', 20000);
$relatedProduct3 = new Product(5, 'Чехол', 3000);

$productWithRelatedProducts->addRelatedProduct($relatedProduct1);
$productWithRelatedProducts->addRelatedProduct($relatedProduct2);
$productWithRelatedProducts->addRelatedProduct($relatedProduct3);

$productWithRelatedProducts->disPlayRelatedProducts();

class Basket
{
    public $products;

    function __construct()
    {
        $this->products = [];
    }

    function addProduct(Product $product, $quantity = 1)
    {
        if (array_key_exists($product->id, $this->products)) {
            $this->products[$product->id]['quantity'] += $quantity;
        } else {
            $this->products[$product->id] = [
                'product' => $product,
                'quantity' => $quantity,
            ];
        }
    }

    function removeProduct($productId)
    {
        if (array_key_exists($productId, $this->products)) {
            $this->products[$productId]['quantity']--;

            if ($this->products[$productId]['quantity'] <= 0) {
                unset($this->products[$productId]);
            }
        }
    }

    function displayInfo()
    {
        foreach ($this->products as $item) {
            echo 'Товар: ' . $item['product']->name . ', Количество: ' . $item['quantity'] . '<br>';
        }
    }

    function getTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->products as $item) {
            $totalPrice += $item['product']->price * $item['quantity'];
        }
        return $totalPrice;
    }
}

class User
{
    public $id;
    public $name;

    function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    function displayInfo()
    {
        echo 'ID: ' . $this->id . ', Имя: ' . $this->name;
    }
}

class Review
{
    public $id;
    public $user;
    public $product;
    public $message;

    function __construct($id, User $user, Product $product, $message)
    {
        $this->id = $id;
        $this->user = $user;
        $this->product = $product;
        $this->message = $message;
    }

    function displayInfo()
    {
        echo 'ID: ' . $this->id . ', Имя пользователя: ' . $this->user->name . ', Товар: ' . $this->product->name . ', Отзыв: ' . $this->message;
    }
}

class FeedbackForm
{
    public $id;
    public $name;
    public $email;
    public $message;

    function __construct($id, $name, $email, $message)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    function displayInfo()
    {
        echo 'ID: ' . $this->id . ', Имя пользователя: ' . $this->name . ', Товар: ' . $this->email . ', Сообщение: ' . $this->message;
    }
}
