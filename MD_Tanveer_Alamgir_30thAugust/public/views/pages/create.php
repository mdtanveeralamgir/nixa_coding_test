<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo TITLE; ?></title>
    </head>
    <body>
        <form action=
                "<?php 
                    echo  URL_ROOT . "client/store/";
                ?>"
                method="POST"
        >
            <label for="firstName">
                First Name
            </label>
            <input type="text" id="firstName" name="firstName" value=" <?php echo $data['firstName']; ?> ">

            <label for="lastName">
                Last Name
            </label>
            <input type="text" id="lastName" name="lastName" value="<?php echo $data['lastName']; ?>">

            <label for="phoneNumber">
                Phone number
            </label>
            <input type="text" id="phoneNumber" name="phoneNumber" value="<?php echo $data['phoneNumber']; ?>">

            <label for="dateContacted">
                Contact date
            </label>
            <input type="text" id="dateContacted" name="dateContacted" value="<?php echo $data['dateContacted']; ?>">
            
            <input type="submit" value="Submit">
        </form>
    </body>
</html>