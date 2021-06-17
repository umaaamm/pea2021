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