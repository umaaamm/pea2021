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
	url: './edit-profile.html'
});
    
function baca() {
    app.request.json('./php/tes.php', function (data) {
        console.log(data);

        const element = document.getElementById("nama");
        element.innerHTML = data.nama;

        // const element = document.getElementById("tes");
        // element.innerHTML = data.nama;
        // const tes = document.getElementById("qrtes");
        // tes.innerHTML = data.rootUrl;
        // document.getElementById('qrtes').innerHtml = '<img src="' +data.rootUrl+'"/>';

        document.getElementById('qrtes').src=data.rootUrl;
    });
}