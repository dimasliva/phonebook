<?php
    header("Content-type: text/css");
?>

*{
margin: 0;
padding: 0;
box-sizing: border-box;
}
.container {
width: 960px;
margin: 100px auto;
height: 100%;
position: relative;
}
.phonebook {
width:100%;
}
.phonebook th {
padding: 10px;
border: 1px solid black;
}
.phonebook td {
width: 250px;
padding: 10px 10px;
border: 1px solid black;
}
.phonebook td:nth-child(3) {
width: 100px;
}
.phonebook td:last-child {
width: 170px;
}
.btn {
border: none;
border-radius: 5px;
outline: none;
padding: 10px;
color: white;
font-family: Arial;
background-color: #4784ef;
cursor: pointer;

}
.btn-add {
background-color: forestgreen;
}
.btn-del {
background-color: red;
}
.addInput {
width: 300px;
font-size:18px;
padding: 8px 12px;
border-radius: 5px;
outline: none;
}