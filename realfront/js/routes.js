"use strict";
var routes = [
  {
    path: '/index/',
    Url: './index.html',
    on: {
          pageInit: function () {
            function_index()
        }
    }
  },

  {
    path: '/search/',
    url: './search.html',
  },

  {
    path: '/product/',
    url: './product.html',
  },

  {
    path: '/product-details/',
    componentUrl: './product-details.html',
  },

  {
    path: '/sambutan/',
    componentUrl: './sambutan.html',
  },

  {
    path: '/cart/',
    url: './cart.html',
  },

  {
    path: '/checkout/',
    url: './checkout.html',
  },

  {
    path: '/wishlist/',
    componentUrl: './wishlist.html',
  },

  {
    path: '/account/',
    url: './account.html',
  },

  {
    path: '/account-buyer/',
    url: './account-buyer.html',
  },

  {
    path: '/categories-details/',
    url: './categories-details.html',
  },

  {
    path: '/transaction/',
    url: './transaction.html',
  },


  {
    path: '/categories/',
    url: './categories.html',
  },


  {
    path: '/sign-in/',
    url: './sign-in.html',
  },

  {
    path: '/sign-up/',
    url: './sign-up.html',
  },

  {
    path: '/settings/',
    url: './settings.html',
  },

  {
    path: '/settings-password/',
    url: './settings-password.html',
  },

  {
    path: '/settings-email/',
    url: './settings-email.html',
  },

  {
    path: '/edit-profile/',
    url: './edit-profile.html',
    on: {
          pageInit: function () {
            alert('asdalsjdkalsjd')
        }
    }
  },

  {
    path: '/blog/',
    url: './blog.html',
  },

  {
    path: '/blog-single/',
    url: './blog-single.html',
  },

  {
    path: '/order-history/',
    url: './order-history.html',
  },

  {
    path: '/tracking-order/',
    url: './tracking-order.html',
  },

  {
    path: '/notification/',
    url: './notification.html',
  },

  {
    path: '/about/',
    url: './about.html',
  },

  {
    path: '/contact/',
    url: './contact.html',
  },

  {
    path: '/pea/',
    url: './pea.html',
    on: {
          pageInit: function (e) {
          cek()
        }
    }
  },

  {
    path: '/nominator/',
    url: './nominator.html',
  },

  {
    path: '/daftar-nominator/',
    url: './daftar-nominator.html',
  },
];

function cek(){
    app.request.json('./php/tes.php', function (data) {
        const tes = document.getElementById("judul_atas");
        tes.innerHTML = data.nama;
    });
}

function function_index(){
    app.request.json('./php/tes.php', function (data) {
        const element = document.getElementById("nama");
        element.innerHTML = data.nama;
    });
}