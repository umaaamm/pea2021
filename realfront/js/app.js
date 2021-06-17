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


baca()
function baca() {
    app.request.json('./php/tes.php', function (data) {
        // alert('fungsi baca')
        console.log(data);
        // localStorage.setItem("status", "login");
        // localStorage.setItem("id", data.nama);
        
        const element = document.getElementById("nama");
        element.innerHTML = data.nama;

        document.getElementById('qrtes').src=data.rootUrl;
    });
}