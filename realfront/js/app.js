"use strict";
// Dom7
var $ = Dom7;

// Init App
var app = new Framework7({
    root: '#app',
    theme: 'md',
    routes: routes,
    view: {
        pushState: true,
        stackPages: true,
    }
});

var mainView = app.views.create('.view-main', {
    url: './index.html'
});

cek();
function cek() {
    var status = localStorage.getItem("status");
    if (status == "login") {
        app.views.main.router.navigate('/home/');
    } else {
        app.views.main.router.navigate('/login/');
        baca()
    }
}

$("#masuk").click(function () {
    var username = $("#username").val();
    var password = $("#password").val();
    app.request({
        url: "./php/masuk.php",
        type: "POST",
        data: {
            "username": username,
            "password": password
        },
        dataType: 'json',
        success: function (data) {
            console.log(data);
            if (data.error) {
                app.dialog.alert(data.pesan);
                $("#username").val("");
                $("#password").val("");
            } else {
                $("#username").val("");
                $("#password").val("");
                localStorage.setItem("status", "login");
                localStorage.setItem("id", data[0].id_petugas);
                localStorage.setItem("username", data[0].username);
                app.dialog.alert(data.pesan);
                app.views.main.router.navigate('/home/');
            }
        }
    });
});

function baca() {
    app.request.json('./php/tes.php', function (data) {
        console.log(data);
        const element = document.getElementById("nama");
        element.innerHTML = data.nama;
        document.getElementById('qrtes').src=data.rootUrl;
    });
}

function getKontak() {
    app.request.json('./php/kontak.php', function (data) {
        var text = "";
        var i = "";
        for (i = 0; i < data.data.length; i++) {
            var obj = data.data[i];
            text += '<a class="external" href="https://api.whatsapp.com/send?phone=62' + obj.no_hp.substring(1) + '" target="_blank">' +
                '<div class="list media-list no-ios-edges">' +
                '<ul>' +
                '<li class="item-content">' +
                '<div class="item-media">' +
                '<img src="' + obj.foto + '" width="50" height="50" style="border-radius: 50%;" />' +
                '</div>' +
                '<div class="item-inner">' +
                '<div class="item-title-row">' +
                '<div class="item-title">' + obj.nama + '</div>' +
                '</div>' +
                '<div class="item-subtitle">' + obj.bagian + '</div>' +
                '<div class="item-subtitle" style="background-color: green;display: table;margin: 0px 0px 0px 0px;padding:5px;font-size:12px;background-color:green;color:#ffffff;text-align=left;"><b>' + obj.no_hp + '</b>' + '</div>' +
                ' </div>' +
                '</li>' +
                '</ul>' +
                '</div>' +
                '</a>'

        }
        const elementK = document.getElementById("demo");
        elementK.innerHTML = text;
    });
}