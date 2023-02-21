<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>List of the cars:</p>
    <table>
        <thead>
            <tr style="font-weight: bold">
                <td>Registration ID</td>
                <td>Manufacturer</td>
                <td>Model</td>
                <td>Year</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($carList as $car):?>

            <tr>
                <td><?php echo $car->getRegistrationId() ?></td>
                <td><?php echo $car->getManufacturer() ?></td>
                <td><?php echo $car->getModel() ?></td>
                <td><?php echo $car->getYear() ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>