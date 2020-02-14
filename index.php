<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.min.css" />
    <title>Document</title>
</head>

<body>

    <?php
    require 'vendor/autoload.php';
    require 'app/TransactionConfig.php';

    use App\Adress;
    use App\Cielo;
    use App\Client;
    use App\Product;
    use App\ProductCollection;
    use App\Sale;
    use App\SandBox;
    use App\Transaction;
    use App\TransactionConfig;
    use Tools\CreditCard;
    use Utils\FormatValues;


    $objProductA = new Product([
        'id' => 1,
        'name' => 'Curso de PHP',
        'desc' => 'Lorem Impum dolor eat rumsted stofes ituam',
        'price' => '2270.90'
    ]);
    $objProductB = new Product([
        'id' => 2,
        'name' => 'Curso de Javascript',
        'desc' => 'Lorem Impum dolor eat rumsted stofes ituam',
        'price' => '1125.50'
    ]);
    $objProductC = new Product([
        'id' => 3,
        'name' => 'Curso de MySQL',
        'desc' => 'Lorem Impum dolor eat rumsted stofes ituam',
        'price' => '1210.00'
    ]);


    $objClient = new Client(
        [
            'id' => 1,
            'name' => 'Rangel Dheo',
            'age' => '37',
            'cpf' => '069.505.786-36'
        ],
        new Adress([
            'country'  => 'Brasil',
            'region'  => 'MG',
            'city'  => 'Arcos',
            'district'  => 'Centro',
            'street'  => 'Jarbas Ferreira Pires',
            'number'  => '220',
            'complement'  => 'Apto 105',
            'zipCode'  => '35588000'
        ])
    );

    $productCollection = new ProductCollection();
    $productCollection->addProductIntoList($objProductA);
    $productCollection->addProductIntoList($objProductB);
    $productCollection->addProductIntoList($objProductC);

    $objSale = new Sale($productCollection);

    $objGateWay = new Cielo(new SandBox());

    $objPaymentMethod = new CreditCard($objClient);

    $objTransaction = new Transaction();
    $objTransaction->commit($objSale, $objClient, $objGateWay, $objPaymentMethod);


    /**
     * Views
     */

    for ($productCollection->rewind(); $productCollection->valid(); $productCollection->next()) {
        $product = $productCollection->current();
    ?>
        <article>
            <h1> <?= $product->name ?> </h1>
            <p> <?= $product->desc ?> </p>
            <label><?= FormatValues::money($product->price); ?></label>
        </article>
    <?php
    }

    ?>
    <article class="total">
        <h1> Qtd de produtos: <?= $objSale->items->count() ?> </h1>
        <label><?= FormatValues::money($objSale->calculateTotal()); ?></label>
    </article>
    <article class="cliente">
        <h1>Cliente: <?= $objClient->name ?> </h1>
        <label>Cpf: <?= $objClient->cpf ?></label>
    </article>
    <article class="endereco">
        <h1>Endereço</h1>
        <label>Estado: <?= $objClient->adress->region ?></label>
        <label>Cidade: <?= $objClient->adress->city ?></label>
        <label>Bairro: <?= $objClient->adress->district ?></label>
        <label>Rua: <?= $objClient->adress->street ?></label>
        <label>Número: <?= $objClient->adress->number ?></label>
    </article>
</body>

</html>