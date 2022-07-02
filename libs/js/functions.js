document.addEventListener("DOMContentLoaded", function (event) {

    const showNavbar = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId)

        // Validate that all variables exist
        if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener('click', () => {
                // show navbar
                nav.classList.toggle('show')
                // change icon
                toggle.classList.toggle('bx-x')
                // add padding to body
                bodypd.classList.toggle('body-pd')
                // add padding to header
                headerpd.classList.toggle('body-pd')
            })
        }
    }

    showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')
    document.getElementById('header-toggle').classList.toggle('bx-x')
    document.getElementById('nav-bar').classList.toggle('show')
    document.getElementById('body-pd').classList.toggle('body-pd')
    document.getElementById('header').classList.toggle('body-pd')

    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')


    function colorLink() {
        if (linkColor) {
            linkColor.forEach(l => l.classList.remove('active'))
            this.classList.add('active')
        }
    }
    linkColor.forEach(l => l.addEventListener('click', colorLink))
});

$('.sidebarClick').click(function () {

    loadPage($(this).attr("name"));
});

function loadPage(page) {
    $('.dinamic').load(page + '.php');
}

function loadPageEdit(page, id) {
    var formData = {
        'session_edit': id
    };

    // process the form
    $.ajax({
        type: 'POST',
        url: 'session_setting.php',
        data: formData,
        dataType: 'json',
        encode: true,
        async: false
    });

    loadPage(page);
}



function clickAddCat() {

    var formData = {
        'cat_name': $('input[id=categorie-name]').val()
    };
    // process the form
    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: formData,
        dataType: 'json',
        encode: true

    });
    loadPage("sidebarCat");
}

function clickDelCat(id) {

    var formData = {
        'del_cat': 1,
        'id': id
    };
    // process the form
    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: formData,
        dataType: 'json',
        encode: true,
        async: false

    });
    loadPage("sidebarCat");
}

function clickDelGroup(id) {

    var formData = {
        'del_group': 1,
        'id': id
    };
    // process the form
    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: formData,
        dataType: 'json',
        encode: true,
        async: false

    });
    loadPage("sidebarUser");
}

function clickDelUser(id) {

    var formData = {
        'del_user': 1,
        'id': id
    };
    // process the form
    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: formData,
        dataType: 'json',
        encode: true,
        async: false

    });
    loadPage("sidebarUser");
}

function clickDelMedia(id) {

    var formData = {
        'del_media': 1,
        'id': id
    };
    // process the form
    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: formData,
        dataType: 'json',
        encode: true,
        async: false

    });
    loadPage("sidebarMedia");
}

function clickDelProd(id) {

    var formData = {
        'del_prod': 1,
        'id': id
    };
    // process the form
    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: formData,
        dataType: 'json',
        encode: true,
        async: false

    });
    loadPage("sidebarProd");
}

function clickDelSale(id) {
    var formData = {
        'del_sales': 1,
        'id': id
    };
    // process the form
    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: formData,
        dataType: 'json',
        encode: true,
        async: false

    });
    loadPage("sidebarSales");
}


function clickAddGroup() {
    var result;
    var formData = {
        'add_group': 1,
        'group-name': $('input[id=group-name]').val(),
        'group-level': $('input[id=group-level]').val(),
        'status': $('#status').find(":selected").val()
    };

    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: formData,
        dataType: 'json',
        encode: true,
        async: false,
        success: function (data) { result = data; console.log(data); },
    });
    if (result)
        loadPage("sidebarUser");
    else
        loadPage("add_group");
}

function clickAddUser() {
    var result;
    var formData = {
        'add_user': 1,
        'full-name': $('input[id=full-name]').val(),
        'username': $('input[id=username]').val(),
        'password': $('input[id=password]').val(),
        'level': $('#level').find(":selected").val()
    };

    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: formData,
        dataType: 'json',
        encode: true,
        async: false,
        success: function (data) { result = data; console.log(data); },
    });
    if (result)
        loadPage("sidebarUser");
    else
        loadPage("add_user");
}

function clickEditGroup() {
    var result;
    var formData = {
        'edit_group': 1,
        'id': $('p[id=group-id-edit]').text(),
        'group-name': $('input[id=group-name-edit]').val(),
        'group-level': $('input[id=group-level-edit]').val(),
        'status': $('#status-edit').find(":selected").val()
    };

    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: formData,
        dataType: 'json',
        encode: true,
        async: false,
        success: function (data) { result = data; console.log(data); }
    });
    if (result)
        loadPage("sidebarUser");
    else
        loadPage("edit_group");
}

function clickAddSale() {
    var result;
    var formData = {
        'add_sale': 1,
        'group-name': $('input[id=group-name]').val(),
        'group-level': $('input[id=group-level]').val(),
        'status': $('#status').find(":selected").val()
    };

    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: formData,
        dataType: 'json',
        encode: true,
        async: false,
        success: function (data) { result = data; console.log(data); },
    });
    if (result)
        loadPage("sidebarSales");
    else
        loadPage("add_sale");
}


function clickEditUser() {
    var result;
    var formData = {
        'edit_user': 1,
        'id': $('p[id=user-id-edit]').text(),
        'user-name': $('input[id=user-name-edit]').val(),
        'user-username': $('input[id=user-username-edit]').val(),
        'user-level': $('#role-edit').find(":selected").val(),
        'user-status': $('#status-edit').find(":selected").val(),
    };

    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: formData,
        dataType: 'json',
        encode: true,
        async: false,
        success: function (data) { result = data; console.log(data); }
    });
    if (result)
        loadPage("sidebarUser");
    else
        loadPage("edit_user");
}

function clickEditPassw() {
    var result;
    var formData = {
        'edit_pass': 1,
        'id': $('p[id=user-id-edit]').text(),
        'user-password': $('input[id=user-psw-edit]').val(),
    };

    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: formData,
        dataType: 'json',
        encode: true,
        async: false,
        success: function (data) { result = data; console.log(data); }
    });
    if (result)
        loadPage("sidebarUser");
    else
        loadPage("edit_user");
}


function clickEditCat() {
    var result;
    var formData = {
        'edit_cat': 1,
        'id': $('p[id=cat-id-edit]').text(),
        'categorie-name': $('input[id=categorie-name]').val(),
    };

    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: formData,
        dataType: 'json',
        encode: true,
        async: false,
        success: function (data) { result = data; console.log(data); }
    });
    if (result)
        loadPage("sidebarUser");
    else
        loadPage("edit_categorie");
}

function clickEditProd() {
    var result;
    var formData = {
        'edit_prod': 1,
        'product-id': $('p[id=prod-id-edit]').text(),
        'product-title': $('input[id=product-title]').val(),
        'product-categorie': $('#prod-cat-edit').find(":selected").val(),
        'product-photo': $('#product-photo').find(":selected").val(),
        'product-quantity': $('input[id=product-quantity]').val(),
        'buying-price': $('input[id=buying-price]').val(),
        'saleing-price': $('input[id=saleing-price]').val()
    };

    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: formData,
        dataType: 'json',
        encode: true,
        async: false,
        success: function (data) { result = data; console.log(data); }
    });
    if (result)
        loadPage("sidebarProd");
    else
        loadPage("edit_product");
}

function clickAddProd() {
    var result;
    var formData = {
        'add_product': 1,
        'product-title': $('input[id=product-title]').val(),
        'product-categorie': $('#prod-cat-edit').find(":selected").val(),
        'product-photo': $('#product-photo').find(":selected").val(),
        'product-quantity': $('input[id=product-quantity]').val(),
        'buying-price': $('input[id=buying-price]').val(),
        'saleing-price': $('input[id=saleing-price]').val()
    };

    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: formData,
        dataType: 'json',
        encode: true,
        async: false,
        success: function (data) { result = data; console.log(data); }
    });
    if (result)
        loadPage("sidebarProd");
    else
        loadPage("add_product");
}


function clickAddMedia() {
    var result;
    var formData = new FormData();

    formData.append('add_media', 1);
    formData.append('file_upload', $('#file_upload')[0].files[0]);

    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        async: false,
        success: function (data) { result = data; console.log(data); }
    });
    if (result)
        loadPage("sidebarMedia");
    else
        loadPage("sidebarMedia");
}

function clickEditSale() {
    var result;
    var formData = {
        'edit_sale': 1,
        'prod-id': $('p[id=prod-id-edit]').text(),
        'sale-id': $('p[id=sale-id-edit]').text(),
        'title': $('input[id=sale-title-edit]').val(),
        'quantity': $('input[id=sale-qty-edit]').val(),
        'price': $('input[id=sale-price-edit]').val(),
        'total': $('input[id=sale-total-edit]').val(),
        'date': $('input[id=sale-date-edit]').val()
    };

    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: formData,
        dataType: 'json',
        encode: true,
        async: false,
        success: function (data) { result = data; console.log(data); }
    });
    if (result)
        loadPage("sidebarSales");
    else
        loadPage("edit_sale");
}



function clickAddSale() {
    var result;
    var formData = {
        'add_sale': 1,
        's_id': $('input[id=s_id]').val(),
        'quantity': $('input[id=sale-qty-add]').val(),
        'price': $('input[id=sale-price-add]').val(),
        'total': $('input[id=sale-total-add]').val(),
        'date': $('input[id=sale-date-add]').val()
    };

    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: formData,
        dataType: 'json',
        encode: true,
        async: false,
        success: function (data) { result = data; console.log(data); }
    });
    if (result)
        loadPage("sidebarSales");
    else
        loadPage("add_sale");
}




$(document).ready(function () {

    //tooltip
    $('[data-toggle="tooltip"]').tooltip();
});
