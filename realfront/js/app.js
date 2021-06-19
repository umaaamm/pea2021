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

cek_login();
function cek_login() {
    var status = localStorage.getItem("status");
    if (status == "login") {
        app.views.main.router.navigate('/home/');
    } else {
        app.views.main.router.navigate('/login/');
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
                $("#password").val("");
            } else {
                $("#username").val("");
                $("#password").val("");
                localStorage.setItem("status", "login");
                localStorage.setItem("nik_pegawai", data[0].nik_pegawai);
                localStorage.setItem("nama", data[0].nama_pegawai);
                localStorage.setItem("jabatan", data[0].jabatan);
                localStorage.setItem("password", data[0].password);
                localStorage.setItem("no_kursi", data[0].no_kursi);
                localStorage.setItem("nama_nominasi", data[0].nama_nominasi);

                var today = new Date();
                var start = today.getHours();
                localStorage.setItem("jam_login", start);

                const nama_header = document.getElementById("nama");
                nama_header.innerHTML = localStorage.getItem("nama");

                // const nama_akun = document.getElementById("nama_akun");
                // nama_akun.innerHTML = localStorage.getItem("nama");

                // const jabatan_akun = document.getElementById("jabatan_akun");
                // jabatan_akun.innerHTML = localStorage.getItem("jabatan");

                // const nominasi_akun = document.getElementById("nominasi_akun");
                // nominasi_akun.innerHTML = localStorage.getItem("nama_nominasi");
                
                // const kursi_akun = document.getElementById("kursi_akun");
                // kursi_akun.innerHTML = localStorage.getItem("no_kursi");
                
                app.dialog.alert(data.pesan);
                app.views.main.router.navigate('/home/');
            }
        }
    });
});

function baca() {
    alert('baca fungsi')
    app.request.json('./php/tes.php', function (data) {
        console.log(data);
        const element = document.getElementById("nama");
        element.innerHTML = data.nama;
        // document.getElementById('qrtes').src=data.rootUrl;
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
            // '<div class="mask"></div>' +
            '<img src="'+obj.gambar+'" alt="">' +
            // '<div class="title">' +
            // '<h3>'+obj.nama_nominasi+'</h3>' +
            // '</div>' +
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
            '<img src="images/vita/user.png" alt="" width="120px">' +
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
        //nama
        const nama = document.getElementById("nama_detail");
        nama.innerHTML = data.data_detail[0].nama_pegawai;
        // nominasi
        const nominasi = document.getElementById("nominasi_detail");
        nominasi.innerHTML = data.data_detail[0].nama_nominasi;
        // seat no
        const seat = document.getElementById("kursi_detail");
        seat.innerHTML = data.data_detail[0].no_kursi;
        // jabatan
        const jabatan = document.getElementById("jabatan_detail");
        jabatan.innerHTML = data.data_detail[0].jabatan;

        //for loop list 
        var text = "";
        var i = "";
        for (i = 0; i < data.data.length; i++) {
            var obj = data.data[i];
            text += '<div class="content">' +
            '<img src="images/vita/user.png" alt="" width="120px">' +
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
    localStorage.removeItem("nik_pegawai");
    localStorage.removeItem("nama");
    localStorage.removeItem("jabatan");
    localStorage.removeItem("password");
    localStorage.removeItem("no_kursi");
    localStorage.removeItem("nama_nominasi");
    app.dialog.alert("Sampai Jumpa Kembali :)");
    cek_login();
});

$("#ubah-password").click(function () {
    app.views.main.router.navigate('/update/');
});

$("#update_password").click(function () {
    var password_lama = $("#password_lama").val();
    var password_baru = $("#password_baru").val();
    var password_konfirmasi = $("#password_konfirmasi").val();
    var passlama = (localStorage.getItem("password"));
    var username = (localStorage.getItem("nik_pegawai"));
    var len = password_baru.length;


    if (password_lama == '' || password_baru == '' || password_konfirmasi == '') {
        app.dialog.alert("Silahkan lengkapi form terlebih dahulu");
        return;
    }

    if (password_lama != passlama) {
        app.dialog.alert("Password lama tidak sesuai");
        return;
    }

    if (len < 6) {
        app.dialog.alert("Password baru minimal 6 karakter");
        return;        
    }

    if (password_baru != password_konfirmasi) {
        app.dialog.alert("Password baru tidak sesuai dengan konfirmasi password");
        return;
    }

    app.request({
        url: "./php/update_password.php",
        type: "POST",
        data: {
            "username": username,
            "password": password_konfirmasi
        },
        dataType: 'json',
        success: function (data) {
            console.log(data);
            if (data.error) {
                app.dialog.alert("Password lama tidak sesuai");
                app.dialog.alert(data.pesan);
                $("#password_lama").val("");
                $("#password_baru").val("");
                $("#password_konfirmasi").val("");
            } else {
                $("#password_lama").val("");
                $("#password_baru").val("");
                $("#password_konfirmasi").val("");
                app.dialog.alert(data.pesan);
                app.views.main.router.navigate('/home/');
            }
        }
    });
});

$("#akun_bottombar").click(function () {
    var nik_pegawai = localStorage.getItem("nik_pegawai");
    app.request({
        url: "./php/getakundetail.php",
        type: "POST",
        data: {
            "nik_pegawai": nik_pegawai,
        },
        dataType: 'json',
        success: function (data) {
            console.log(data);
            if (data.error) {
                app.dialog.alert("Terjadi Kesalahan");
            } else {
                // app.dialog.alert(data[0].nik_pegawai);
                const nama_akun = document.getElementById("nama_akun");
                nama_akun.innerHTML = data[0].nama_pegawai;

                const jabatan_akun = document.getElementById("jabatan_akun");
                jabatan_akun.innerHTML = data[0].jabatan;

                const nominasi_akun = document.getElementById("nominasi_akun");
                nominasi_akun.innerHTML = data[0].nama_nominasi;
                
                const kursi_akun = document.getElementById("kursi_akun");
                kursi_akun.innerHTML = data[0].no_kursi;
            }
        }
    });
});

$("#tab-rundown").click(function () {
    app.views.main.router.navigate('#tab-3');
});

function cek_session () {
    console.log('cek session');
    var jam_login = localStorage.getItem("jam_login");

    var today = new Date();
    var jam_sekarang = today.getHours();

    console.log(jam_sekarang);
    console.log(jam_login);
}

var interval = setInterval(function () { cek_session(); }, 10000);