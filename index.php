<?php
require "db_conn.php";
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $edit_state = true;
    $sql = "SELECT * FROM telephones WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id]);
    $personEdit = $stmt->fetch(PDO::FETCH_OBJ);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="icon.png" />
    <link rel="stylesheet" href="css/style.php" media="screen">
    <title>Telephonebook</title>
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

            <?php if ($people->rowCount() === 0) { ?>

            <?php } ?>

            <?php foreach ($people as $person): ?>
                <tr class="phonebook__header">
                    <td class="phonebook__item"><?php echo $person['fname'] ?></td>
                    <td class="phonebook__item">+<?php echo $person['phone'] ?></td>
                    <td class="phonebook__item"><?php echo $person['bank'] ?></td>
                    <td class="phonebook__item">

                        <!--Edit-->

                        <a href="index.php?id=<?php echo $person['id']; ?>" class="edit">
                            <button id="<?php echo $person['id'] ?>" name="update" class="btn btn-edit"
                                    type="submit">
                                Редактировать
                            </button>
                        </a>
                        <!--Delete-->
                        <a href="app/remove.php?id=<?php echo $person['id']; ?>">
                            <button id="<?php echo $person['id'] ?>" class="btn btn-del">Удалить</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <!--  Edit click  -->
    <?php if (isset($_GET['id'])) { ?>
    <section class="hero">
        <div class="hero-content">
            <h1>Редактировать клиента</h1>
            <a href="javascript:void(0)" id="button" class="button">Редактировать</a>
        </div>
    </section>
    <!--    Create button    -->
    <?php } else { ?>
        <section class="hero">
            <div class="hero-content">
                <h1>Создание клиента</h1>
                <a href="javascript:void(0)" id="button" class="button-add">Создать</a>
            </div>
        </section>
    <?php } ?>

    <!--    -->
    <div class="add-section">
        <div class="add-section-contents">

            <div class="close" id="show">+</div>
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0a/Gnome-stock_person.svg/480px-Gnome-stock_person.svg.png"
                 alt="">

            <?php if ($edit_state == true) { ?>
                <form action="app/edit.php?id=<?php echo $person['id'] ?>" method="POST" autocomplete="on"
                      class="contactForm">
                    <input type="text" name="fname" placeholder="Enter your full name" class="addInput"
                           value="<?php echo $personEdit->fname; ?>" class="addInput"/>
                    <input type="text" name="phone" placeholder="Enter your number of phone" class="addInput"
                           value="<?php echo $personEdit->phone ?>"/>
                    <input type="text" name="bank" placeholder="Enter name of your bank" class="addInput"
                           value="<?php echo $personEdit->bank; ?>"/>
                    <button class="btn btn-add" name="update" type="submit">Edit</button>

                </form>
            <?php } else { ?>

                <form action="app/add.php" method="POST" autocomplete="on" class="contactForm">
                    <?php if (isset($_GET['mess']) && $_GET['mess'] == 'fnameError') { ?>
                        <input type="text" name="fname" placeholder="Enter your full name" style="border-color: #ff6666"
                               class="addInput"/>
                        <input type="text" name="phone" placeholder="Enter your number of phone" class="addInput"/>
                        <input type="text" name="bank" placeholder="Enter name of your bank" class="addInput"/>
                        <button class="btn btn-add" type="submit">Add</button>

                    <?php } else if (isset($_GET['mess']) && $_GET['mess'] == 'phoneError') { ?>
                        <input type="text" name="fname" placeholder="Enter your full name" class="addInput"/>
                        <input type="text" name="phone" placeholder="Enter your number of phone"
                               style="border-color: #ff6666"
                               class="addInput"/>
                        <input type="text" name="bank" placeholder="Enter name of your bank" class="addInput"/>
                        <button class="btn btn-add" type="submit">Add</button>

                    <?php } else if (isset($_GET['mess']) && $_GET['mess'] == 'bankError') { ?>
                        <input type="text" name="fname" placeholder="Enter your full name" class="addInput"/>
                        <input type="text" name="phone" placeholder="Enter your number of phone" class="addInput"/>
                        <input type="text" name="bank" placeholder="Enter name of your bank"
                               style="border-color: #ff6666"
                               class="addInput"/>
                        <button class="btn btn-add" type="submit">Add</button>
                    <?php } else if (isset($_GET['mess']) && $_GET['mess'] == 'Error') { ?>
                        <input type="text" name="fname" placeholder="Enter your full name" style="border-color: #ff6666"
                               class="addInput"/>
                        <input type="text" name="phone" placeholder="Enter your number of phone"
                               style="border-color: #ff6666"
                               class="addInput"/>
                        <input type="text" name="bank" placeholder="Enter name of your bank"
                               style="border-color: #ff6666"
                               class="addInput"/>
                        <button class="btn btn-add" type="submit">Add</button>

                    <?php } else { ?>

                        <input type="text" name="fname" placeholder="Enter your full name" class="addInput"/>
                        <input type="text" name="phone" placeholder="Enter your number of phone" class="addInput"/>
                        <input type="text" name="bank" placeholder="Enter name of your bank" class="addInput"/>
                        <button class="btn btn-add" type="submit">Add</button>
                    <?php } ?>
                </form>
            <?php } ?>

        </div>
    </div>
</div>
<script>
    document.querySelector('#button').addEventListener('click', function () {
        document.querySelector('.add-section').classList.add("active");
    });

    document.querySelector('#show.close').addEventListener("click", function () {
        document.querySelector('.add-section').classList.remove("active");
    });

    // document.querySelector('.edit').addEventListener('click', function () {
    //     document.querySelector('.add-section').classList.add("active");
    // });


</script>
</body>
</html>