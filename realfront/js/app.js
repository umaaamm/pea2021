"use strict";
// Dom7
var $ = Dom7;

// Init App
var app = new Framework7({
    root: '#app',
    theme: 'md',
    name: 'PEA 2021',
    routes: routes,
    view: {
        // pushState: true,
        stackPages: true,
    }
});

var mainView = app.views.create('.view-main', {
    url: './'
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

function getNominasi() {
    app.request.json('./php/nominasi.php', function (data) {
        var text = "";
        var i = "";
        for (i = 0; i < data.data.length; i++) {
            var obj = data.data[i];
            text += '<a href="/daftar-nominator/'+obj.id_nominasi+'/">' +
            '<div class="content section-wrapper">' +
            '<div class="mask"></div>' +
            '<img src="'+obj.gambar+'" alt="">' +
            '<div class="title">' +
            '<h3>'+obj.nama_nominasi+'</h3>' +
            '</div>' +
            '</div>' +
            '</a>'

        }
        const elementK = document.getElementById("nominasi");
        elementK.innerHTML = text;
    });
}

function getListNominasi(id) {
    app.request.json('./php/detailnominasi.php?id='+id, function (data) {
        console.log('data',data);
        var text = "";
        var i = "";
        for (i = 0; i < data.data.length; i++) {
            var obj = data.data[i];
            text += '<a href="/getdetailnominasi/'+obj.nik_pegawai+'/">' +
            '<div class="content">' +
            '<i class="ti-money"></i>' +
            '<div class="title-name">' +
            ' <h5>'+obj.nama_pegawai+'</h5>' +
            '<a>'+obj.nm_unit+'</a>' +
            '<p>Kategori:</p>' +
            ' <p>'+obj.nama_nominasi+'</p>' +
            '</div>' +
            '</div></a><br>'+
            '<div class="small-divider"></div>'

        }
        const elementK = document.getElementById("listnominasi");
        elementK.innerHTML = text;
    });
}

function getDetailNominasi(nik) {
    app.request.json('./php/getdetailnominasi.php?nik='+nik, function (data) {
        console.log('data detail',data);
        //title
        const nama_nominator = document.getElementById("nama_nominator");
        nama_nominator.innerHTML = data.data_detail[0].nama_pegawai;
        // //nama
        // const nama = document.getElementById("nama");
        // nama.innerHTML = data.data_detail[0].nama_pegawai;
        // // //nominasi
        // // const nominasi = document.getElementById("nominasi");
        // // nominasi.innerHTML = data.data_detail[0].nama_nominasi;
        // //seat no
        // const seat = document.getElementById("seat");
        // seat.innerHTML = data.data_detail[0].no_kursi;

        //for loop list 
        var text = "";
        var i = "";
        for (i = 0; i < data.data.length; i++) {
            var obj = data.data[i];
            text += '<div class="content">' +
            '<i class="ti-money"></i>' +
            '<div class="title-name">' +
            ' <h5>'+obj.nama_pegawai+'</h5>' +
            '<a>'+obj.nm_unit+'</a>' +
            '<p>Kategori:</p>' +
            ' <p>'+obj.nama_nominasi+'</p>' +
            '</div>' +
            '</div><br>'+
            '<div class="small-divider"></div>'

        }
        const elementK = document.getElementById("listnominasi_detail");
        elementK.innerHTML = text;
    });
}

$("#keluar").click(function () {
    localStorage.removeItem("status");
    localStorage.removeItem("id");
    localStorage.removeItem("username");
    app.dialog.alert("Sampai Jumpa Kembali :)");
    cek();
});

$("#ubah-password").click(function () {
    app.views.main.router.navigate('/update/');
});

$("#update_password").click(function () {
    app.dialog.alert("Sampai Jumpa Kembali :)");
});