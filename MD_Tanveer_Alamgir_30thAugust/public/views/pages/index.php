<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE; ?></title>
</head>
<body>  
    <section>
        <h1>Client's list</h1>
        <table>
            <thead>
                <tr>
                    <?php foreach($data['allClientkeys'] as $key): ?>
                        <th><?php echo $key; ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['allClients'] as $eachClient): ?>
                    <tr>
                        <?php foreach($eachClient as $attribute) : ?>
                            <td><?php echo  $attribute; ?></td>
                        <?php endforeach; ?>
                        <td>
                            <a href="<?php echo URL_ROOT . "client/edit/" . $eachClient['id'] ?>">
                                Edit
                            </a>
                            <a href="<?php echo URL_ROOT . "client/delete/" . $eachClient['id'];?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </section>

    <section>
        <a href="<?php echo URL_ROOT . "client/create/";?>">Add a client</a>
    </section>
    
</body>
</html>