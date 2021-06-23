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
    console.log('cek_login');
    fill_userdata();
    var status = sessionStorage.getItem("status");
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
                sessionStorage.setItem("status", "login");
                localStorage.setItem("nik_pegawai", data[0].nik_pegawai);
                localStorage.setItem("nama", data[0].nama_pegawai);
                localStorage.setItem("jabatan", data[0].jabatan);
                localStorage.setItem("password", data[0].password);
                localStorage.setItem("no_kursi", data[0].no_kursi);
                localStorage.setItem("nama_nominasi", data[0].nama_nominasi);
                localStorage.setItem("foto_profil", data[0].foto);

                var today = new Date();
                var start = today.getHours();
                localStorage.setItem("jam_login", start);

                // const nama_header = document.getElementById("nama");
                // nama_header.innerHTML = localStorage.getItem("nama");

                // const nama_akun = document.getElementById("nama_akun");
                // nama_akun.innerHTML = localStorage.getItem("nama");

                // const jabatan_akun = document.getElementById("jabatan_akun");
                // jabatan_akun.innerHTML = localStorage.getItem("jabatan");

                // const nominasi_akun = document.getElementById("nominasi_akun");
                // nominasi_akun.innerHTML = localStorage.getItem("nama_nominasi");
                
                // const kursi_akun = document.getElementById("kursi_akun");
                // kursi_akun.innerHTML = localStorage.getItem("no_kursi");
                
                app.dialog.alert(data.pesan);
                fill_userdata();
                app.views.main.router.navigate('/home/');
            }
        }
    });
});

function baca() {
    alert('baca fungsi')
    app.request.json('./php/generateabsen.php', function (data) {
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
            text += 
                '<a class="external" href="https://api.whatsapp.com/send?phone=62' + obj.no_hp.substring(1) + '"">' +
                '<div class="content">' +
                '<img src="' + obj.foto + '" alt="" width="120px" />' +
                    '<div class="title-name">' +
                        '<h4 style="margin-top:10px;">' + obj.nama + '</h4>' +
                        '<p>' + obj.bagian + '</p>' +
                        // '<div class="item-subtitle" style="background-color: green;display: table;margin: 0px 0px 0px 0px;padding:5px;font-size:14px;background-color:#00ab4e;color:#ffffff;text-align=center;float:right;"><b>' + obj.no_hp + '</div>' +
                        '<div class="button" style="background-color: green;display: table;margin: 0px 0px 0px 0px;padding:0px 15px 0px 15px;font-size:14px;background-color:#00ab4e;color:#ffffff;text-align:center;float:right;width:150px;border-radius: 5px;"><b>' + obj.no_hp + '</b>' + '</div>' +
                    '</div>' +
                '</div>' +
                '</a>' +
                '<div class="small-divider"></div>'

        }
        const elementK = document.getElementById("demo");
        elementK.innerHTML = text;
    });
}

function getListTestimoni() {
    app.request.json('./php/listtestimoni.php', function (data) {
        var text = "";
        var i = "";
        for (i = 0; i < data.data.length; i++) {
            var obj = data.data[i];
            text += 
                '<div class="content">' +
                '<img src="https://dev.pea2021.info/images/vita/peserta/'+obj.foto+'" alt="" width="120px" />' +
                    '<div class="title-name">' +
                        // '<h5 style="margin-top:10px;">' + obj.pesan + '</h5>'+
                        '<p style="margin-top:10px;text-align:justify;"> <b>" </b>' + obj.pesan + '<b> "</b></p><span style="color:#00ab4e;">'+ obj.nama_pegawai+'</span><br><br>' +
                        // '<div class="item-subtitle" style="background-color: green;display: table;margin: 0px 0px 0px 0px;padding:5px;font-size:14px;background-color:#00ab4e;color:#ffffff;text-align=center;float:right;"><b>' + obj.no_hp + '</div>' +
                        // '<div class="button" style="background-color: green;display: table;margin: 0px 0px 0px 0px;padding:0px 15px 0px 15px;font-size:14px;background-color:#00ab4e;color:#ffffff;text-align:center;float:right;width:150px;border-radius: 5px;"><b>' + obj.no_hp + '</b>' + '</div>' +
                    '</div>' +
                '</div>' +
                // '</a>' +
                '<div class="small-divider"></div>'

        }
        const elementK = document.getElementById("testi");
        elementK.innerHTML = text;
    });
}

function getNominasi() {
    app.request.json('./php/nominasi.php', function (data) {
        var text = "";
        var i = "";
        for (i = 0; i < data.data.length; i++) {
            var obj = data.data[i];
            if(obj.id_nominasi == '11' || obj.id_nominasi == '12'){
                continue;
            }
            text += '<a href="/kategori/'+obj.id_nominasi+'/">' +
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

function getKategori(id_nominasi) {
    app.request.json('./php/kategori.php?id_nominasi='+id_nominasi, function (data) {
        var text = "";
        var i = "";
        for (i = 0; i < data.data.length; i++) {
            var obj = data.data[i];
            text += '<a href="/daftar-nominator/'+obj.id_kategori+'/">' +
            '<div class="content section-wrapper">' +
            // '<div class="mask"></div>' +
            '<img src="'+obj.gambar_kategori+'" alt="">' +
            // '<div class="title">' +
            // '<h3>'+obj.nama_nominasi+'</h3>' +
            // '</div>' +
            '</div>' +
            '</a>'

        }
        const elementK = document.getElementById("kategori");
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
            '<img src="https://dev.pea2021.info/images/vita/peserta/'+obj.foto+'" alt="" width="120px">' +
            '<div class="title-name">' +
            ' <h5 style="font-size: 20px;margin-top: 2px;" >'+obj.nama_pegawai+'</h5>' +
            ' <p>'+obj.nama_ketegori+'</p>' +
            '<p style="color: #00ab4e;">'+obj.nm_unit+'</p>' +
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
        //foto
        document.getElementById('foto_akun_nominasi').src='https://dev.pea2021.info/images/vita/peserta/'+data.data_detail[0].foto;;
        //nama
        const nama = document.getElementById("nama_detail");
        nama.innerHTML = data.data_detail[0].nama_pegawai;
        // nominasi
        const nominasi = document.getElementById("nominasi_detail");
        nominasi.innerHTML = data.data_detail[0].nama_nominasi;
        // kategori
        const kategori = document.getElementById("kategori_detail");
        kategori.innerHTML = data.data_detail[0].nama_ketegori;
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
            '<img src="https://dev.pea2021.info/images/vita/peserta/'+obj.foto+'" alt="" width="120px">' +
            '<div class="title-name">' +
            ' <h5 style="font-size: 20px;margin-top: 2px;" >'+obj.nama_pegawai+'</h5>' +
            ' <p>'+obj.nama_ketegori+'</p>' +
            '<p style="color: #00ab4e;">'+obj.nm_unit+'</p>' +
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
    localStorage.removeItem("jam_login");
    localStorage.removeItem("id_tracking");
    app.dialog.alert("Sampai Jumpa Kembali :)");
    sessionStorage.removeItem("status");
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

//testimoni
$("#simpan_testimoni").click(function () {
    var testimoni = $("#testimoni").val();

    var len = testimoni.length;

    if (len >= 120) {
        app.dialog.alert("Maksimal pesan adalah 120 huruf.");
        return;        
    }

    app.request({
        url: "./php/testimoni.php",
        type: "POST",
        data: {
            "nik_pegawai": localStorage.getItem("nik_pegawai"),
            "nama_pegawai": localStorage.getItem("nama"),
            "pesan": testimoni,
            "foto": localStorage.getItem('foto_profil')
        },
        dataType: 'json',
        success: function (data) {
            console.log('lllll',data);
            if (data.error) {
                app.dialog.alert("Pesan Testimoni anda gagal disimpan.");
                app.dialog.alert(data.pesan);
                $("#testimoni").val("");
            } else {
                $("#testimoni").val("");
                app.dialog.alert(data.pesan);
                app.views.main.router.navigate('/home/');
            }
        }
    });
});
//end testimoni

$("#akun_bottombar").click(function () {
    console.log('get_akun_detail')
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
                if (nik_pegawai == 'P84023') {
                    nominasi_akun.innerHTML = data[0].nama_nominasi+' & The Best Innovation';                    
                }
                else {
                    nominasi_akun.innerHTML = data[0].nama_nominasi;                    
                }
                
                const kursi_akun = document.getElementById("kursi_akun");
                kursi_akun.innerHTML = data[0].no_kursi;

                document.getElementById('foto_akun').src='https://dev.pea2021.info/images/vita/peserta/'+localStorage.getItem("foto_profil");

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

var interval = setInterval(function () { cek_session(); }, 50000);

function fill_userdata() {
    console.log(localStorage.getItem("nama"));
    console.log(localStorage.getItem("jam_login"));
    console.log(sessionStorage.getItem("status"));
    console.log(localStorage.getItem("foto_profil"));

    //fill nama di selamat datang
    const nama_header = document.getElementById("nama");
    nama_header.innerHTML = localStorage.getItem("nama");

    document.getElementById('foto_toolbar').src='https://dev.pea2021.info/images/vita/peserta/'+localStorage.getItem("foto_profil");

}

$("#rundown1").click(function () {
    var id='10';
    app.request.json('./php/getrundown.php?id='+id, function (data) {
        console.log('data',data);
        var text = "";
        var i = "";
        for (i = 0; i < data.data.length; i++) {
            var count = 1+i;
            var obj = data.data[i];
            text += 
            '<div class="accordion-item-toggle">' +
                '<p style="font-size: 14px";>'+count+'. '+obj.aktivitas+
            '</div>' +
            '<div class="data-table">' +
                '<table>' +
                    '<tbody>' +
                        '<tr>' +
                            '<td class="label-cell" style="color: #00ab4e; font-size: 13px">'+obj.waktu_mulai.substring(0,5)+' s.d. '+obj.waktu_selesai.substring(0,5)+' WITA</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td class="label-cell" style="font-size: 13px">'+obj.keterangan_1+'</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td class="label-cell" style="font-size: 13px"> Note: '+obj.keterangan_2+'</td>' +
                        '</tr>' +
                    '</tbody>' +
                '</table>' +
            '</div>'
        }
        const elementK = document.getElementById("rundown-1-tab");
        elementK.innerHTML = text;
    });  
});

$("#rundown2").click(function () {
    var id='11';
    app.request.json('./php/getrundown.php?id='+id, function (data) {
        console.log('data',data);
        var text = "";
        var i = "";
        for (i = 0; i < data.data.length; i++) {
            var count = 1+i;
            var obj = data.data[i];
            text += 
            '<div class="accordion-item-toggle">' +
                '<p style="font-size: 14px";>'+count+'. '+obj.aktivitas+
            '</div>' +
            '<div class="data-table">' +
                '<table>' +
                    '<tbody>' +
                        '<tr>' +
                            '<td class="label-cell" style="color: #00ab4e; font-size: 13px">'+obj.waktu_mulai.substring(0,5)+' s.d. '+obj.waktu_selesai.substring(0,5)+' WITA</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td class="label-cell" style="font-size: 13px">'+obj.keterangan_1+'</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td class="label-cell" style="font-size: 13px"> Note: '+obj.keterangan_2+'</td>' +
                        '</tr>' +
                    '</tbody>' +
                '</table>' +
            '</div>'
        }
        const elementK = document.getElementById("rundown-2-tab");
        elementK.innerHTML = text;
    });  
});

$("#rundown3").click(function () {
    var id='12';
    app.request.json('./php/getrundown.php?id='+id, function (data) {
        console.log('data',data);
        var text = "";
        var i = "";
        for (i = 0; i < data.data.length; i++) {
            var count = 1+i;
            var obj = data.data[i];
            text += 
            '<div class="accordion-item-toggle">' +
                '<p style="font-size: 14px";>'+count+'. '+obj.aktivitas+
            '</div>' +
            '<div class="data-table">' +
                '<table>' +
                    '<tbody>' +
                        '<tr>' +
                            '<td class="label-cell" style="color: #00ab4e; font-size: 13px">'+obj.waktu_mulai.substring(0,5)+' s.d. '+obj.waktu_selesai.substring(0,5)+' WITA</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td class="label-cell" style="font-size: 13px">'+obj.keterangan_1+'</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td class="label-cell" style="font-size: 13px"> Note: '+obj.keterangan_2+'</td>' +
                        '</tr>' +
                    '</tbody>' +
                '</table>' +
            '</div>'
        }
        const elementK = document.getElementById("rundown-3-tab");
        elementK.innerHTML = text;
    });  
});

$("#rundown4").click(function () {
    var id='13';
    app.request.json('./php/getrundown.php?id='+id, function (data) {
        console.log('data',data);
        var text = "";
        var i = "";
        for (i = 0; i < data.data.length; i++) {
            var count = 1+i;
            var obj = data.data[i];
            text += 
            '<div class="accordion-item-toggle">' +
                '<p style="font-size: 14px";>'+count+'. '+obj.aktivitas+
            '</div>' +
            '<div class="data-table">' +
                '<table>' +
                    '<tbody>' +
                        '<tr>' +
                            '<td class="label-cell" style="color: #00ab4e; font-size: 13px">'+obj.waktu_mulai.substring(0,5)+' s.d. '+obj.waktu_selesai.substring(0,5)+' WITA</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td class="label-cell" style="font-size: 13px">'+obj.keterangan_1+'</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td class="label-cell" style="font-size: 13px"> Note: '+obj.keterangan_2+'</td>' +
                        '</tr>' +
                    '</tbody>' +
                '</table>' +
            '</div>'
        }
        const elementK = document.getElementById("rundown-4-tab");
        elementK.innerHTML = text;
    });  
});

$("#rundown5").click(function () {
    var id='20';
    app.request.json('./php/getrundown.php?id='+id, function (data) {
        console.log('data',data);
        var text = "";
        var i = "";
        for (i = 0; i < data.data.length; i++) {
            var count = 1+i;
            var obj = data.data[i];
            text += 
            '<div class="accordion-item-toggle">' +
                '<p style="font-size: 14px";>'+count+'. '+obj.aktivitas+
            '</div>' +
            '<div class="data-table">' +
                '<table>' +
                    '<tbody>' +
                        '<tr>' +
                            '<td class="label-cell" style="color: #00ab4e; font-size: 13px">'+obj.waktu_mulai.substring(0,5)+' s.d. '+obj.waktu_selesai.substring(0,5)+' WITA</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td class="label-cell" style="font-size: 13px">'+obj.keterangan_1+'</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td class="label-cell" style="font-size: 13px"> Note: '+obj.keterangan_2+'</td>' +
                        '</tr>' +
                    '</tbody>' +
                '</table>' +
            '</div>'
        }
        const elementK = document.getElementById("rundown-5-tab");
        elementK.innerHTML = text;
    });  
});

$("#rundown6").click(function () {
    var id='30';
    app.request.json('./php/getrundown.php?id='+id, function (data) {
        console.log('data',data);
        var text = "";
        var i = "";
        for (i = 0; i < data.data.length; i++) {
            var count = 1+i;
            var obj = data.data[i];
            text += 
            '<div class="accordion-item-toggle">' +
                '<p style="font-size: 14px";>'+count+'. '+obj.aktivitas+
            '</div>' +
            '<div class="data-table">' +
                '<table>' +
                    '<tbody>' +
                        '<tr>' +
                            '<td class="label-cell" style="color: #00ab4e; font-size: 13px">'+obj.waktu_mulai.substring(0,5)+' s.d. '+obj.waktu_selesai.substring(0,5)+' WITA</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td class="label-cell" style="font-size: 13px">'+obj.keterangan_1+'</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td class="label-cell" style="font-size: 13px"> Note: '+obj.keterangan_2+'</td>' +
                        '</tr>' +
                    '</tbody>' +
                '</table>' +
            '</div>'
        }
        const elementK = document.getElementById("rundown-6-tab");
        elementK.innerHTML = text;
    });  
});

$("#rundown1-btn").click(function () {
    var id = 10;
    var nik = localStorage.getItem("nik_pegawai");

    app.request.json('./php/generateabsen.php?id='+id+'&nik='+nik, function (data) {

        console.log(data);
        
        const element = document.getElementById("nama");
        element.innerHTML = data.nama;
        
        document.getElementById('qrtes').src=data.rootUrl;

        const nom = document.getElementById("nominasi_qr");
        if (nik == 'P84023') {
            nom.innerHTML = data.nominasi_nama+' & The Best Regional Office of The Year';                    
        }
        else {
            nom.innerHTML = data.nominasi_nama;                    
        }

        const seat = document.getElementById("kursi_qr");
        seat.innerHTML = data.no_kursi;

        const event = document.getElementById("nama_event");
        event.innerHTML = data.nama_event;
    });
    app.views.main.router.navigate('/absensi/');
});

$("#rundown2-btn").click(function () {
    var id = 11;
    var nik = localStorage.getItem("nik_pegawai");

    app.request.json('./php/generateabsen.php?id='+id+'&nik='+nik, function (data) {

        console.log(data);
        
        const element = document.getElementById("nama");
        element.innerHTML = data.nama;
        
        document.getElementById('qrtes').src=data.rootUrl;

        const nom = document.getElementById("nominasi_qr");
        if (nik == 'P84023') {
            nom.innerHTML = data.nominasi_nama+' & The Best Regional Office of The Year';                    
        }
        else {
            nom.innerHTML = data.nominasi_nama;                    
        }

        const seat = document.getElementById("kursi_qr");
        seat.innerHTML = data.no_kursi;

        const event = document.getElementById("nama_event");
        event.innerHTML = data.nama_event;
    });
    app.views.main.router.navigate('/absensi/');
});

$("#rundown3-btn").click(function () {
    var id = 12;
    var nik = localStorage.getItem("nik_pegawai");

    app.request.json('./php/generateabsen.php?id='+id+'&nik='+nik, function (data) {

        console.log(data);
        
        const element = document.getElementById("nama");
        element.innerHTML = data.nama;
        
        document.getElementById('qrtes').src=data.rootUrl;

        const nom = document.getElementById("nominasi_qr");
        if (nik == 'P84023') {
            nom.innerHTML = data.nominasi_nama+' & The Best Regional Office of The Year';                    
        }
        else {
            nom.innerHTML = data.nominasi_nama;                    
        }

        const seat = document.getElementById("kursi_qr");
        seat.innerHTML = data.no_kursi;

        const event = document.getElementById("nama_event");
        event.innerHTML = data.nama_event;
    });
    app.views.main.router.navigate('/absensi/');
});

$("#rundown4-btn").click(function () {
    var id = 13;
    var nik = localStorage.getItem("nik_pegawai");

    app.request.json('./php/generateabsen.php?id='+id+'&nik='+nik, function (data) {

        console.log(data);
        
        const element = document.getElementById("nama");
        element.innerHTML = data.nama;
        
        document.getElementById('qrtes').src=data.rootUrl;

        const nom = document.getElementById("nominasi_qr");
        if (nik == 'P84023') {
            nom.innerHTML = data.nominasi_nama+' & The Best Regional Office of The Year';                    
        }
        else {
            nom.innerHTML = data.nominasi_nama;                    
        }

        const seat = document.getElementById("kursi_qr");
        seat.innerHTML = data.no_kursi;

        const event = document.getElementById("nama_event");
        event.innerHTML = data.nama_event;
    });
    app.views.main.router.navigate('/absensi/');
});

$("#rundown5-btn").click(function () {
    var id = 20;
    var nik = localStorage.getItem("nik_pegawai");

    app.request.json('./php/generateabsen.php?id='+id+'&nik='+nik, function (data) {

        console.log(data);
        
        const element = document.getElementById("nama");
        element.innerHTML = data.nama;
        
        document.getElementById('qrtes').src=data.rootUrl;

        const nom = document.getElementById("nominasi_qr");
        if (nik == 'P84023') {
            nom.innerHTML = data.nominasi_nama+' & The Best Regional Office of The Year';                    
        }
        else {
            nom.innerHTML = data.nominasi_nama;                    
        }

        const seat = document.getElementById("kursi_qr");
        seat.innerHTML = data.no_kursi;

        const event = document.getElementById("nama_event");
        event.innerHTML = data.nama_event;
    });
    app.views.main.router.navigate('/absensi/');
});

$("#rundown6-btn").click(function () {
    var id = 30;
    var nik = localStorage.getItem("nik_pegawai");

    app.request.json('./php/generateabsen.php?id='+id+'&nik='+nik, function (data) {

        console.log(data);
        
        const element = document.getElementById("nama");
        element.innerHTML = data.nama;
        
        document.getElementById('qrtes').src=data.rootUrl;

        const nom = document.getElementById("nominasi_qr");
        if (nik == 'P84023') {
            nom.innerHTML = data.nominasi_nama+' & The Best Innovation';                    
        }
        else {
            nom.innerHTML = data.nominasi_nama;                    
        }

        const seat = document.getElementById("kursi_qr");
        seat.innerHTML = data.no_kursi;

        const event = document.getElementById("nama_event");
        event.innerHTML = data.nama_event;
    });
    app.views.main.router.navigate('/absensi/');
});

$("#generate-no").click(function () {
    app.request.json('./php/getpetugastracking.php', function (data) {
        console.log('data',data);
        var text = '<option value="" disabled selected>--Pilih Petugas--</option>';
        var i = "";
        for (i = 0; i < data.data.length; i++) {
            var count = 1+i;
            var obj = data.data[i];
            text += 
                '<option value="'+obj.id_kontak+'">'+obj.nama+'</option>'
        }
        const dropdown = document.getElementById("list_petugas_tracking");
        dropdown.innerHTML = text;
    });
    app.views.main.router.navigate('/registerbarang/');
});

$("#testimoni_anda").click(function () {
    app.request.json('./php/getusertestimoni.php?nik_pegawai='+localStorage.getItem("nik_pegawai"), function (data) {
        console.log('data',data);
        if(data.hasil){
            app.views.main.router.navigate('/listtestimoni/');
        }else{
            app.views.main.router.navigate('/testimoni/');
        }
    });
});

$("#register_barang").click(function () {
    var keterangan_barang = $("#keterangan_barang").val();
    var list_petugas_tracking = $("#list_petugas_tracking").val();
    var nik_pegawai = localStorage.getItem("nik_pegawai");

    if (keterangan_barang == '' || list_petugas_tracking == '') {
        app.dialog.alert('Lengkapi form register barang terlebih dahulu');
        return;
    }

    app.request({
        url: "./php/register_barang.php",
        type: "POST",
        data: {
            "keterangan_barang": keterangan_barang,
            "list_petugas_tracking": list_petugas_tracking,
            "nik_pegawai": nik_pegawai,
        },
        dataType: 'json',
        success: function (data) {
            console.log(data);
            if (data.error) {
                app.dialog.alert("Terjadi Kesalahan");
                $("#keterangan_barang").val("");
                $("#list_petugas_tracking").val("");
            } else {
                $("#keterangan_barang").val("");
                $("#list_petugas_tracking").val("");
                $("#password_konfirmasi").val("");
                app.dialog.alert('Berhasil register barang');
                load_barang();
                app.views.main.router.navigate('/home/');
            }
        }
    });
});

function load_barang() {
    var nik_pegawai = localStorage.getItem("nik_pegawai");
    app.request.json('./php/getbarangtracking.php?nik_pegawai='+nik_pegawai, function (data) {
        console.log('data detail',data);
        //for loop list 
        var text = "";
        var i = "";
        for (i = 0; i < data.data.length; i++) {
            var obj = data.data[i];
            text += 

                '<div class="product-order-wrapper">'+
                    '<div class="row">'+
                        '<div class="col-70">'+
                            '<div class="content">'+
                                '<span style="color: #00ab4e; font-size:16px;">No Bagasi : ' + obj.no_bagasi + '</span>'+
                                '<br>'+
                                '<span style="color: #7e7e7e;">' + obj.keterangan + '</span>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-30">'+
                            '<div class="content">'+
                                // '<a class="external" href="https://api.whatsapp.com/send?phone=62' + obj.no_hp.substring(1) + '" target="_blank">' +
                                // '<a href="/detailtrack/'+obj.id_tracking+'/"><div class="button">Tracking</div></a>'+
                                // '<a href="#'+obj.id_tracking+'/"><div class="button" id="btn-track-detail">Tracking</div></a>'+
                                '<div class="button" id="btn-track-detail" style="border-radius:5px;" onclick="getDetailTracking('+obj.id_tracking+')">Tracking</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'

        }
        const elementK = document.getElementById("list-barang-register");
        elementK.innerHTML = text;
    });
}

$("#tracking_bottombar").click(function () {
    localStorage.removeItem("id_tracking");
    load_barang()
});

function getDetailTracking(id_tracking) {
    localStorage.setItem("id_tracking", id_tracking);

    app.request.json('./php/getbarangtrackingdetail.php?id_tracking='+id_tracking, function (data) {
        console.log('data',data);

        const elementK = document.getElementById("deskripsi-barang-detail");
        elementK.innerHTML = data.data[0].no_bagasi+' ['+data.data[0].keterangan_val+']';

        if (data.data[0].status == 1) {
        const status = document.getElementById("status-barang-detail");
        status.innerHTML =         
            '<div class="content">'+
               '<i class="ti-check" style="width: 50px;height: 50px;line-height: 50px;text-align: center;background: #c9f175;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Pooling</p>'+
                        '<p style="text-align: left; font-size: 12px;">Barang sudah diserahkan ke Panitia dan sudah mendapatkan nomor bagasi</p>'+
                        '<p style="text-align: justify; font-size: 10px;">PIC: '+data.data[0].nama+' | '+data.data[0].no_hp+'</p>'+
                   '</div>'+
            '</div>'+
            '<div class="small-divider"></div>' +
            '<div class="content">'+
                '<i class="" style="width: 50px;height: 50px;line-height: 50px;text-align: center;background: #f3f3f3;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Dalam Perjalanan</p>'+
                        '<p style="text-align: left; font-size: 12px;">Barang/bagasi sedang diantar ke tempat tujuan menginap</p>'+
                    '</div>'+
            '</div>'+
            '<div class="small-divider"></div>'+
            '<div class="content">'+
                '<i class="" style="width: 50px;height: 50px;line-height: 50px;text-align: center;background: #f3f3f3;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Check In</p>'+
                        '<p style="text-align: left; font-size: 12px;">Barang/bagasi sedang dalam proses check-in di tempat tujuan</p>'+
                    '</div>'+
            '</div>'+
            '<div class="small-divider"></div>'+
            '<div class="content">'+
                '<i class="" style="width: 50px;height: 50px;line-height: 50px;text-align: center;background: #f3f3f3;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Barang Sampai</p>'+
                        '<p style="text-align: left; font-size: 12px;">Barang/bagasi sudah sampai di tempat tujuan</p>'+
                    '</div>'+
            '</div>'+
            '<br>'+
            '<div class="small-divider"></div>'+
            '<div class="content">'+
                '<i class="" style="width: 50px;height: 50px;line-height: 50px;text-align: center;background: #f3f3f3;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Barang Diterima</p>'+
                        '<p style="text-align: left; font-size: 12px;">Proses Selesai</p>'+
                    '</div>'+
            '</div>'+
            '<br>'+
            '<div class="small-divider"></div>'

            $("#terima-barang-btn").show();
            $("#terima-barang-btn-done").hide();
        } else if (data.data[0].status == 2) {
        const status = document.getElementById("status-barang-detail");
        status.innerHTML =         
            '<div class="content">'+
               '<i class="ti-check" style="width: 60px;height: 60px;line-height: 60px;text-align: center;background: #c9f175;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Pooling</p>'+
                        '<p style="text-align: left; font-size: 12px;">Barang sudah diserahkan ke Panitia dan sudah mendapatkan nomor bagasi</p>'+
                        '<p style="text-align: justify; font-size: 10px;">PIC: '+data.data[0].nama+' | '+data.data[0].no_hp+'</p>'+
                   '</div>'+
            '</div>'+
            '<div class="small-divider"></div>' +
            '<div class="content">'+
                '<i class="ti-truck" style="width: 60px;height: 60px;line-height: 60px;text-align: center;background: #7ee551;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Dalam Perjalanan</p>'+
                        '<p style="text-align: left; font-size: 12px;">Barang/bagasi sedang diantar ke tempat tujuan menginap</p>'+
                        '<p style="text-align: justify; font-size: 10px;">PIC: '+data.data[0].nama+' | '+data.data[0].no_hp+'</p>'+
                    '</div>'+
            '</div>'+
            '<div class="small-divider"></div>'+
            '<div class="content">'+
                '<i class="" style="width: 60px;height: 60px;line-height: 40px;text-align: center;background: #f3f3f3;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Check In</p>'+
                        '<p style="text-align: left; font-size: 12px;">Barang/bagasi sedang dalam proses check-in di tempat tujuan</p>'+
                    '</div>'+
            '</div>'+
            '<div class="small-divider"></div>'+
            '<div class="content">'+
                '<i class="" style="width: 60px;height: 60px;line-height: 40px;text-align: center;background: #f3f3f3;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Barang Sampai</p>'+
                        '<p style="text-align: left; font-size: 12px;">Barang/bagasi sudah sampai di tempat tujuan</p>'+
                    '</div>'+
            '</div>'+
            '<div class="small-divider"></div>'+
            '<div class="content">'+
                '<i class="" style="width: 60px;height: 60px;line-height: 40px;text-align: center;background: #f3f3f3;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Barang Diterima</p>'+
                        '<p style="text-align: left; font-size: 12px;">Proses Selesai</p>'+
                    '</div>'+
            '</div>'+
            '<br>'+
            '<div class="small-divider"></div>'

            $("#terima-barang-btn").show();
            $("#terima-barang-btn-done").hide();
        } else if (data.data[0].status == 3) {
        const status = document.getElementById("status-barang-detail");
        status.innerHTML =         
            '<div class="content">'+
               '<i class="ti-check" style="width: 60px;height: 60px;line-height: 60px;text-align: center;background: #c9f175;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Pooling</p>'+
                        '<p style="text-align: left; font-size: 12px;">Barang sudah diserahkan ke Panitia dan sudah mendapatkan nomor bagasi</p>'+
                        '<p style="text-align: justify; font-size: 10px;">PIC: '+data.data[0].nama+' | '+data.data[0].no_hp+'</p>'+
                   '</div>'+
            '</div>'+
            '<div class="small-divider"></div>' +
            '<div class="content">'+
                '<i class="ti-truck" style="width: 60px;height: 60px;line-height: 60px;text-align: center;background: #7ee551;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Dalam Perjalanan</p>'+
                        '<p style="text-align: left; font-size: 12px;">Barang/bagasi sedang diantar ke tempat tujuan menginap</p>'+
                        '<p style="text-align: justify; font-size: 10px;">PIC: '+data.data[0].nama+' | '+data.data[0].no_hp+'</p>'+
                    '</div>'+
            '</div>'+
            '<div class="small-divider"></div>'+
            '<div class="content">'+
                '<i class="ti-map-alt" style="width: 60px;height: 60px;line-height: 60px;text-align: center;background: #15a301;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Check In</p>'+
                        '<p style="text-align: left; font-size: 12px;">Barang/bagasi sedang dalam proses check-in di tempat tujuan</p>'+
                        '<p style="text-align: justify; font-size: 10px;">PIC: '+data.data[0].nama+' | '+data.data[0].no_hp+'</p>'+
                    '</div>'+
            '</div>'+
            '<div class="small-divider"></div>'+
            '<div class="content">'+
                '<i class="" style="width: 60px;height: 60px;line-height: 40px;text-align: center;background: #f3f3f3;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Barang Sampai</p>'+
                        '<p style="text-align: left; font-size: 12px;">Barang/bagasi sudah sampai di tempat tujuan</p>'+
                    '</div>'+
            '</div>'+
            '<div class="small-divider"></div>'+
            '<div class="content">'+
                '<i class="" style="width: 60px;height: 60px;line-height: 40px;text-align: center;background: #f3f3f3;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Barang Diterima</p>'+
                        '<p style="text-align: left; font-size: 12px;">Proses Selesai</p>'+
                    '</div>'+
            '</div>'+
            '<br>'+
            '<div class="small-divider"></div>'

            $("#terima-barang-btn").show();
            $("#terima-barang-btn-done").hide();
        } else if (data.data[0].status == 4) {
        const status = document.getElementById("status-barang-detail");
        status.innerHTML =         
            '<div class="content">'+
               '<i class="ti-check" style="width: 60px;height: 60px;line-height: 60px;text-align: center;background: #c9f175;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Pooling</p>'+
                        '<p style="text-align: left; font-size: 12px;">Barang sudah diserahkan ke Panitia dan sudah mendapatkan nomor bagasi</p>'+
                        '<p style="text-align: justify; font-size: 10px;">PIC: '+data.data[0].nama+' | '+data.data[0].no_hp+'</p>'+
                   '</div>'+
            '</div>'+
            '<div class="small-divider"></div>' +
            '<div class="content">'+
                '<i class="ti-truck" style="width: 60px;height: 60px;line-height: 60px;text-align: center;background: #7ee551;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Dalam Perjalanan</p>'+
                        '<p style="text-align: left; font-size: 12px;">Barang/bagasi sedang diantar ke tempat tujuan menginap</p>'+
                        '<p style="text-align: justify; font-size: 10px;">PIC: '+data.data[0].nama+' | '+data.data[0].no_hp+'</p>'+
                    '</div>'+
            '</div>'+
            '<div class="small-divider"></div>'+
            '<div class="content">'+
                '<i class="ti-map-alt" style="width: 60px;height: 60px;line-height: 60px;text-align: center;background: #15a301;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Check In</p>'+
                        '<p style="text-align: left; font-size: 12px;">Barang/bagasi sedang dalam proses check-in di tempat tujuan</p>'+
                        '<p style="text-align: justify; font-size: 10px;">PIC: '+data.data[0].nama+' | '+data.data[0].no_hp+'</p>'+
                    '</div>'+
            '</div>'+
            '<div class="small-divider"></div>'+
            '<div class="content">'+
                '<i class="ti-share" style="width: 60px;height: 60px;line-height: 60px;text-align: center;background: #457c19;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Barang Sampai</p>'+
                        '<p style="text-align: left; font-size: 12px;">Barang/bagasi sudah sampai di tempat tujuan</p>'+
                        '<p style="text-align: justify; font-size: 10px;">PIC: '+data.data[0].nama+' | '+data.data[0].no_hp+'</p>'+
                    '</div>'+
            '</div>'+
            '<div class="small-divider"></div>'+
            '<div class="content">'+
                '<i class="" style="width: 60px;height: 60px;line-height: 60px;text-align: center;background: #f3f3f3;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Barang Diterima</p>'+
                        '<p style="text-align: left; font-size: 12px;">Proses Selesai</p>'+
                    '</div>'+
            '</div>'+
            '<br>'+
            '<div class="small-divider"></div>'

            $("#terima-barang-btn").show();
            $("#terima-barang-btn-done").hide();
        } else if (data.data[0].status == 5) {
        const status = document.getElementById("status-barang-detail");
        status.innerHTML =         
            '<div class="content">'+
               '<i class="ti-check" style="width: 60px;height: 60px;line-height: 60px;text-align: center;background: #c9f175;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Pooling</p>'+
                        '<p style="text-align: left; font-size: 12px;">Barang sudah diserahkan ke Panitia dan sudah mendapatkan nomor bagasi</p>'+
                        '<p style="text-align: justify; font-size: 10px;">PIC: '+data.data[0].nama+' | '+data.data[0].no_hp+'</p>'+
                   '</div>'+
            '</div>'+
            '<div class="small-divider"></div>' +
            '<div class="content">'+
                '<i class="ti-truck" style="width: 60px;height: 60px;line-height: 60px;text-align: center;background: #7ee551;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Dalam Perjalanan</p>'+
                        '<p style="text-align: left; font-size: 12px;">Barang/bagasi sedang diantar ke tempat tujuan menginap</p>'+
                        '<p style="text-align: justify; font-size: 10px;">PIC: '+data.data[0].nama+' | '+data.data[0].no_hp+'</p>'+
                    '</div>'+
            '</div>'+
            '<div class="small-divider"></div>'+
            '<div class="content">'+
                '<i class="ti-map-alt" style="width: 60px;height: 60px;line-height: 60px;text-align: center;background: #15a301;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Check In</p>'+
                        '<p style="text-align: left; font-size: 12px;">Barang/bagasi sedang dalam proses check-in di tempat tujuan</p>'+
                        '<p style="text-align: justify; font-size: 10px;">PIC: '+data.data[0].nama+' | '+data.data[0].no_hp+'</p>'+
                    '</div>'+
            '</div>'+
            '<div class="small-divider"></div>'+
            '<div class="content">'+
                '<i class="ti-share" style="width: 60px;height: 60px;line-height: 60px;text-align: center;background: #457c19;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Barang Sampai</p>'+
                        '<p style="text-align: left; font-size: 12px;">Barang/bagasi sudah sampai di tempat tujuan</p>'+
                        '<p style="text-align: justify; font-size: 10px;">PIC: '+data.data[0].nama+' | '+data.data[0].no_hp+'</p>'+
                    '</div>'+
            '</div>'+
            '<div class="small-divider"></div>'+
            '<div class="content">'+
                '<i class="ti-face-smile" style="width: 60px;height: 60px;line-height: 60px;text-align: center;background: #294710;color: #fff;display: inline-block;border-radius: 50%;margin-right: 15px;font-size: 18px;float: left; "></i>'+
                    '<div class="title-name">'+
                        '<p style="text-align: left; color: #00ab4e; font-weight: bold;font-size: 12px;">Barang Diterima</p>'+
                        '<p style="text-align: left; font-size: 12px;">Proses Selesai</p>'+
                        '<p style="text-align: justify; font-size: 10px;">PIC: '+data.data[0].nama+' | '+data.data[0].no_hp+'</p>'+
                    '</div>'+
            '</div>'+
            '<div class="small-divider"></div>'

            $("#terima-barang-btn").hide();
            $("#terima-barang-btn-done").show();
        }
    });

    app.views.main.router.navigate('/detailtrack/');
}

$("#ambil_merchandise_banner").click(function () {
    var id = 10;
    var nik = localStorage.getItem("nik_pegawai");

    app.request.json('./php/generatemerch.php?id='+id+'&nik='+nik, function (data) {

        console.log(data);
        
        const element = document.getElementById("nama");
        element.innerHTML = data.nama;
        
        document.getElementById('qrmerch').src=data.rootUrl;
    });
    app.views.main.router.navigate('/ambil_merchandise/');
});

$("#terima-barang-btn").click(function () {
    var id_tracking = localStorage.getItem("id_tracking");
    app.dialog.confirm('Barang Sudah Diterima ?', 'Konfimasi Penerimaan', function () {
        app.request({
            url: "./php/konfirmasi_barang.php",
            type: "POST",
            data: {
                "id_tracking": id_tracking,
            },
            dataType: 'json',
            success: function (data) {
                console.log(data);
                if (data.error) {
                    app.dialog.alert(data.pesan);
                } else {
                    app.dialog.alert(data.pesan);
                    app.views.main.router.navigate('/home/');
                }
            }
        });
    });
});

$("#lihat-testimoni").click(function () {
    app.views.main.router.navigate('/listtestimoni/');
});