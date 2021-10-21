<?php
    require "db_conn.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.php" media="screen">
    <title>Document</title>
    <style>

    </style>
</head>
<body>
    <div class="container">
        <div class="phonebook">
            <table class="phonebook">

                <tr class="phonebook__header">
                    <th class="phonebook__item">ФИО</th>
                    <th class="phonebook__item">Телефон</th>
                    <th class="phonebook__item">Кем приходится</th>
                    <th class="phonebook__item">Кнопки действий</th>
                </tr>
                <?php
                    $people = $conn->query("SELECT * FROM telephones ORDER BY id DESC");
                ?>

                <?php if($people->rowCount() === 0){ ?>

                <?php } ?>

                <?php while ($person = $people->fetch(PDO::FETCH_ASSOC)) {?>
                <tr class="phonebook__header">
                    <td class="phonebook__item"><?php echo $person['fname']?></td>
                    <td class="phonebook__item">+<?php echo $person['phone']?></td>
                    <td class="phonebook__item"><?php echo $person['bank']?></td>
                    <td class="phonebook__item">
                        <button id="<?php echo $person['id']?>" class="btn btn-edit">Редактировать</button>
                        <a href="app/remove.php?id=<?php echo $person['id'];?>">
                            <button id="<?php echo $person['id']?>" class="btn btn-del">Удалить</button>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <div class="add-section">
            <form action="app/add.php" method="POST" autocomplete="on">
                <?php if(isset($_GET['mess']) && $_GET['mess'] == 'fnameError') {?>
                    <input type="text" name="fname" placeholder="Enter your full name" style="border-color: #ff6666" class="addInput"/>
                    <input type="text" name="phone" placeholder="Enter your number of phone" class="addInput"/>
                    <input type="text" name="bank" placeholder="Enter name of your bank" class="addInput"/>
                    <button class="btn btn-add" type="submit">Add</button>

                <?php } else if(isset($_GET['mess']) && $_GET['mess'] == 'phoneError') {?>
                <input type="text" name="fname" placeholder="Enter your full name" class="addInput"/>
                <input type="text" name="phone" placeholder="Enter your number of phone" style="border-color: #ff6666" class="addInput"/>
                <input type="text" name="bank" placeholder="Enter name of your bank" class="addInput"/>
                <button class="btn btn-add" type="submit">Add</button>

                <?php } else if(isset($_GET['mess']) && $_GET['mess'] == 'bankError') {?>
                    <input type="text" name="fname" placeholder="Enter your full name" class="addInput"/>
                    <input type="text" name="phone" placeholder="Enter your number of phone" class="addInput"/>
                    <input type="text" name="bank" placeholder="Enter name of your bank" style="border-color: #ff6666" class="addInput"/>
                    <button class="btn btn-add" type="submit">Add</button>
                <?php } else if(isset($_GET['mess']) && $_GET['mess'] == 'Error') {?>
                    <input type="text" name="fname" placeholder="Enter your full name" style="border-color: #ff6666" class="addInput"/>
                    <input type="text" name="phone" placeholder="Enter your number of phone" style="border-color: #ff6666" class="addInput"/>
                    <input type="text" name="bank" placeholder="Enter name of your bank" style="border-color: #ff6666" class="addInput"/>
                    <button class="btn btn-add" type="submit">Add</button>
                <?php } else {?>

                <input type="text" name="fname" placeholder="Enter your full name" class="addInput"/>
                <input type="text" name="phone" placeholder="Enter your number of phone" class="addInput"/>
                <input type="text" name="bank" placeholder="Enter name of your bank" class="addInput"/>
                <button class="btn btn-add" type="submit">Add</button>
                <?php }?>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
        // $(document).ready(function () {
        //     $('.btn-del').click(function () {
        //         const id = $(this).attr('id');
        //         $.post("app/remove.php",
        //             {
        //                 id: id
        //             },
        //             (data) => {
        //                 if(data) {
        //                     $(this).parent().hide(600);
        //                 }
        //             }
        //         );
        //     });
        // })
    </script>
</body>
</html>