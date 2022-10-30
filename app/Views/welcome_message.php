<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<title> Multiple Options Select Menu </title>-->

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <style>
    /* Google Fonts - Poppins */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        background-color: #e3f2fd;
    }

    .container {
        position: relative;
        max-width: 320px;
        width: 100%;
        margin: 80px auto 30px;
    }

    .select-btn {
        display: flex;
        height: 50px;
        align-items: center;
        justify-content: space-between;
        padding: 0 16px;
        border-radius: 8px;
        cursor: pointer;
        background-color: #fff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .select-btn .btn-text {
        font-size: 17px;
        font-weight: 400;
        color: #333;
    }

    .select-btn .arrow-dwn {
        display: flex;
        height: 21px;
        width: 21px;
        color: #fff;
        font-size: 14px;
        border-radius: 50%;
        background: #6e93f7;
        align-items: center;
        justify-content: center;
        transition: 0.3s;
    }

    .select-btn.open .arrow-dwn {
        transform: rotate(-180deg);
    }

    .list-items {
        position: relative;
        margin-top: 15px;
        border-radius: 8px;
        padding: 16px;
        background-color: #fff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        display: none;
    }

    .select-btn.open~.list-items {
        display: block;
    }

    .list-items .item {
        display: flex;
        align-items: center;
        list-style: none;
        height: 50px;
        cursor: pointer;
        transition: 0.3s;
        padding: 0 15px;
        border-radius: 8px;
    }

    .item-seach {
        display: flex;
        align-items: center;
        list-style: none;
        height: 50px;
        cursor: pointer;
        transition: 0.3s;
        padding: 0 15px;
        border-radius: 8px;
    }

    .list-items .item:hover {
        background-color: #e7edfe;
    }

    .item .item-text {
        font-size: 16px;
        font-weight: 400;
        color: #333;
    }

    .item .checkbox {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 16px;
        width: 16px;
        border-radius: 4px;
        margin-right: 12px;
        border: 1.5px solid #c0c0c0;
        transition: all 0.3s ease-in-out;
    }

    .item.checked .checkbox {
        background-color: #4070f4;
        border-color: #4070f4;
    }

    .checkbox .check-icon {
        color: #fff;
        font-size: 11px;
        transform: scale(0);
        transition: all 0.2s ease-in-out;
    }

    .item.checked .check-icon {
        transform: scale(1);
    }
    </style>

    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>

<body>
    <div class="container">
        <div class="select-btn">
            <span class="btn-text">Select Language</span>
            <span class="arrow-dwn">
                <i class="fa-solid fa-chevron-down"></i>
            </span>
        </div>

        <ul class="list-items">
            <li class="item-seach">
                <input type="text" style="width: 100%;padding: 8px 10px;border:none" onkeyup="filterFunction()"
                    id="myInput" placeholder="Search...">
            </li>
            <li class="item" onclick="getValue('HTML & CSS')">
                <span class="checkbox">
                    <i class="fa-solid fa-check check-icon"></i>
                </span>
                <span class="item-text">HTML & CSS</span>
            </li>
            <li class="item" onclick="getValue('Bootstrap')">
                <span class="checkbox">
                    <i class="fa-solid fa-check check-icon"></i>
                </span>
                <span class="item-text">Bootstrap</span>
            </li>
            <li class="item" key="JavaScript" onclick="getValue('JavaScript')">
                <span class="checkbox">
                    <i class="fa-solid fa-check check-icon"></i>
                </span>
                <span class="item-text">JavaScript</span>
            </li>
        </ul>
    </div>


    <!-- JavaScript -->
    <!--<script src="js/script.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    const selectBtn = document.querySelector(".select-btn"),
        items = document.querySelectorAll(".item");

    const tampung_value = document.getElementById("tampungan");

    selectBtn.addEventListener("click", () => {
        selectBtn.classList.toggle("open");
    });

    items.forEach(item => {
        item.addEventListener("click", (e) => {
            item.classList.toggle("checked");
            console.log(e);
            // tampung_value.value += e.target.innerText + '|';


            let checked = document.querySelectorAll(".checked"),
                btnText = document.querySelector(".btn-text");

            if (checked && checked.length > 0) {
                btnText.innerText = `${checked.length} Selected`;
            } else {
                btnText.innerText = "Select Language";
            }
        });
    })

    function filterFunction() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        div = document.getElementById("list-items");
        a = document.getElementsByClassName("item-text");
        item = document.getElementsByClassName("item");

        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                item[i].style.display = "";
            } else {
                item[i].style.display = "none";
            }
        }
    }

    const array_text = [];

    function getValue(text) {


        let index = array_text.indexOf(text);
        if (index >= 0) {
            array_text.splice(index, 1);
        } else {
            array_text.push(text);
        }

        var json_array = JSON.stringify(array_text);
        console.log(json_array);
    }
    </script>
</body>

</html>