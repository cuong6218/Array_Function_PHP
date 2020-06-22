<?php
        $customer_list = array(
            "0" => array("name" => "Mai Văn Hoàn", "day_of_birth" => "1983/08/20", "address" => "Hà Nội", "image" => "images/img1.jpg"),
            "1" => array("name" => "Nguyễn Văn Nam", "day_of_birth" => "1983/08/21", "address" => "Bắc Giang", "image" => "images/img2.jpg"),
            "2" => array("name" => "Nguyễn Thái Hòa", "day_of_birth" => "1983/08/22", "address" => "Nam Định", "image" => "images/img3.jpg"),
            "3" => array("name" => "Trần Đăng Khoa", "day_of_birth" => "1983/08/17", "address" => "Hà Tây", "image" => "images/img4.jpg"),
            "4" => array("name" => "Nguyễn Đình Thi", "day_of_birth" => "1983/08/19", "address" => "Hà Nội", "image" => "images/img5.jpg") 
        );
        function searchByDate($customers, $from_date, $to_date) {
            if(empty($from_date) && empty($to_date)){
                return $customers;
            }
            $filtered_customers = [];
            foreach($customers as $customer){
                if(!empty($from_date) && (strtotime($customer['day_of_birth']) < strtotime($from_date)))
                    continue;
                if(!empty($to_date) && (strtotime($customer['day_of_birth']) > strtotime($to_date)))
                    continue;
                $filtered_customers[] = $customer;
            }
            return $filtered_customers;
        }
    ?>
    <?php
    $from_date = NULL;
    $to_date = NULL;
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $from_date = $_POST['from'];
        $to_date = $_POST['to'];
    }
    $filtered_customers = searchByDate($customer_list, $from_date, $to_date);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table, th, td{
        border: 1px solid black;
    }
    img{
        width: 100px;
        height: 100px;
    }
</style>
<body>
    <form method="post">
        <p>From: </p>
        <input type="text" name="from" placeholder="yyyy-mm-dd"/>
        <p>To: </p>
        <input type="text" name="to" placeholder="yyyy-mm-dd"/>
        <input type="submit" value="search"/>
    </form>
    
    <table border="0">
        <caption><h2>Danh sách khách hàng</h2></caption>
        <tr>
            <th>No.</th>
            <th>Customer name</th>
            <th>Birthday</th>
            <th>Address</th>
            <th>Image</th>
        </tr>
        <?php if (count($filtered_customers) ===0): ?>
            <tr>
                <td colspan="5" class="message">Không tìm thấy khách hàng nào</td>
            </tr>
        <?php endif; ?>

        <?php foreach($filtered_customers as $index => $customer): ?>
            <tr>
                <td><?php echo $index+1;?></td>
                <td><?php echo $customer['name'];?></td>
                <td><?php echo $customer['day_of_birth'];?></td>
                <td><?php echo $customer['address'];?></td>
                <td><div class="profile"><img src="<?php echo $customer['image'];?>"/></div></td>
            </tr>
        <?php endforeach;?>
    </table>
    
</body>
</html>