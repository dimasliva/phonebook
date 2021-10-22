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
.button-add {
background-color: #37D061;
border: 2px solid white;
border-radius: 30px;
text-decoration: none;
padding: 10px 28px;
color: white;
margin-top: 10px;
display: inline-block;
transition: .3s all;
}
.button-add:hover {
background-color: white;
color: #2A9748;
border: 2px solid #2A9748;
}

.addInput {
width: 300px;
font-size:18px;
padding: 8px 12px;
border-radius: 5px;
outline: none;
}

.button {
background-color: #4784ef;
border: 2px solid white;
border-radius: 30px;
text-decoration: none;
padding: 10px 28px;
color: white;
margin-top: 10px;
display: inline-block;
transition: .3s all;
}
.button:hover {
background-color: white;
color: #4784ef;
border: 2px solid #4784ef;
}

.add-section {
background-color: rgba(0, 0, 0, 0.8);
width: 100%;
height: 100%;
position: absolute;
top: 0;
display: none;
justify-content: center;
align-items: center;
}

.add-section.active{
background-color: rgba(0, 0, 0, 0.8);
width: 100%;
height: 100%;
position: absolute;
top: 0;
display: flex;

}

.add-section-contents {
height: 90%;
width: 500px;
background-color: white;
text-align: center;
padding: 20px;
position: relative;
border-radius: 4px;
}

img {
    width: 100px;
}

input {
margin: 15px auto;
display: block;
width: 50%;
padding: 8px;
border: 1px solid gray;
}

.close {
position: absolute;
top: 0;
right: 10px;
font-size: 42px;
color: #333;
transform: rotate(45deg);
cursor: pointer;
transition: .3s all;
}
.close:hover {
color: #666;
}

#show:checked ~ .add-section{
    display:none;
}