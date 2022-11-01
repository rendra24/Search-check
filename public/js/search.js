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
        $('#location').val(json_array);
    }