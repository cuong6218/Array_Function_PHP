<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
            .error {
                color: #FF0000;
            }
            table{
                border-collapse: collapse;
                width: 100%;
            }
            td, th{
                border: solid 1px #ccc;
            }
            form{
                width: 450px;
            }
</style>
<body>
    <?php
        function loadData($filename){
            $jsondata = file_get_contents($filename);  //Reads entire file into a string
            $arr_data = json_decode($jsondata,true);   //Decodes a JSON string
            return $arr_data;
        }

        function saveDataJSON($filename, $name, $email, $phone){
            try{
                $contact = array(
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone
                );
            //converts json data into array
            $arr_data = loadData($filename);
            //Push user data to array
            array_push ($arr_data, $contact);
            //Convert updated array to JSON
            $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT); //Returns the JSON representation of a value
            //write json data into users.json file
            file_put_contents($filename, $jsondata);
            echo "Save data succeccful!";
        } catch (Exception $e){
            echo 'Error' , $e->getMessage(), "\n";
        }
    }

    $nameErr = NULL;
    $emailErr = NULL;
    $phoneErr = NULL;
    $name = NULL;
    $email = NULL;
    $phone = NULL;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $has_error = false;
        
        if (empty($name)){
            $nameErr = 'Please type your name';
            $has_error = true;
        }

        if (empty($email)){
            $emailErr = 'Please type your email';
            $has_error = true;
        } else {
            // FILTER_VALIDATE_EMAIL: Filters a variable with a specified filter
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr = "Your Email is wrong";
                $has_error = true;
            }
        }

        if (empty($phone)){
            $phoneErr = "Please type your phone";
            $has_error = true;
        }

        if ($has_error == false){
            saveDataJSON("data.json", $name, $email, $phone);
            $name = NULL;
            $email = NULL;
            $phone = NULL;
        }
    }
    ?>

    <h2>Registration Form</h2>
    <form method="post">
        <fieldset><legend>Detail</legend>
            Name: <input type="text" name="name" value="<?php echo $name;?>">
            <span class="error">* <?php echo $nameErr;?></span>
            <br/><br/>
            Email: <input type="text" name="email" value="<?php echo $email;?>">
            <span class="error">* <?php echo $emailErr;?></span>
            <br/><br/>
            Phone: <input type="text" name="phone" value="<?php echo $phone;?>">
            <span class="error">* <?php echo $phoneErr;?></span>
            <br/><br/>
            <input type="submit" name="submit" value="Register"/>
            <p><span class="error">* require field.</span></p>
        </fieldset>
    </form>

    <?php
        $datas = loadData('data.json');
    ?>
    <h2>List</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        <?php foreach($datas as $data): ?>
            <tr>
                <td><?= $data['name']; ?></td>
                <td><?= $data['email']; ?></td>
                <td><?= $data['phone']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>