<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAT SHOP 230012</title>
</head>

<body>
    <h1>CAT SHOP 230012</h1>
    <h2>CAT LIST</h2>
    <hr>
    
    <p><a href="<?= site_url('cats230012/add') ?>">Add New Pet</a></p>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Type</th>
            <th>Gender</th>
            <th>(Month)</th>
            <th>Price</th>
            <th colspan="2">Action</th>
        </tr>

        <?php 
        $i = 1;
        foreach($cats as $cat): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $cat->name_230012 ?></td>
                <td><?= $cat->type_230012 ?></td>
                <td><?= $cat->gender_230012 ?></td>
                <td><?= $cat->age_230012 ?></td>
                <td><?= $cat->price_230012 ?></td>
                <td><a href="<?= site_url('cats230012/edit/' . $cat->id_230012) ?>">Edit</a></td>
                <td><a href="<?= site_url('cats230012/delete/' . $cat->id_230012) ?>">Delete</a></td>
            </tr>
        <?php endforeach ?>
    </table>

    <p><a href="../index.php">BACK TO HOME</a></p>
</body>

</html>