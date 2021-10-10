const empty = document.getElementById("label");
const add = document.getElementById("button-addon2");
const list = document.getElementById("list");

add.onclick = function () {
    var listTugas = empty.value;
    empty.value = "";

    const listItem = document.createElement("li");
    var delete_btn = document.createElement("button");

    delete_btn.setAttribute("id", "button");

    listItem.innerText = listTugas;
    delete_btn.innerText = "Delete";
    listItem.appendChild(delete_btn);
    list.appendChild(listItem);

    delete_btn.onclick = function () {
        list.removeChild(listItem);
    }
}