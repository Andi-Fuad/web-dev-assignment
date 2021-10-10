const item = document.getElementById("label");
const add = document.getElementById("button-addon2");
const list = document.getElementById("list");
let check = [];

add.onclick = function () {
    const barang = item.value;
    const listItem = document.createElement("li");
    listItem.innerText = barang;
    
    if (barang == "") {
        alert("Item Name Can't Be Blank");
        return;
    }

    for (let i=0; i < check.length; i++) {
        if (listItem.innerText.toUpperCase() == check[i]) {
            alert("You Already Have That Item");
            return;
        }
    }
    check.push(listItem.innerText.toUpperCase());

    const delete_btn = document.createElement("button");

    delete_btn.setAttribute("id", "button");
    delete_btn.innerText = "Delete";
    listItem.appendChild(delete_btn);
    list.appendChild(listItem);
    
    delete_btn.onclick = function () {
        if (confirm("Anda Yakin Untuk Menghapus Item?") == true) {
            list.removeChild(listItem);
        }
    }
    
}
