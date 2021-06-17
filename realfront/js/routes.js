"use strict";
var routes = [
  {
    path: '/home/',
    pageName: 'home',
  },
  {
    path: '/login/',
    pageName: 'login',
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
  },

  {
    path: '/citytour/',
    url: './citytour.html',
  },

  {
    path: '/oleholeh/',
    url: './oleholeh.html',
  },

  {
    path: '/nominator/',
    url: './nominator.html',
    on:{
      pageInit: function(){
        getNominasi()
      }
    }
  },
  {
    path: '/kontak/',
    url: './kontak.html',
    on: {
      pageInit: function () {
        getKontak()
      }
    }
  },
  {
    path: '/daftar-nominator/:id/',
    url: './daftar-nominator.html',
    on:{
      pageInit: function (e, page) {
        getListNominasi(page.route.params.id)
      }
    }
  },
  {
    path: '/getdetailnominasi/:nik/',
    url: './getdetailnominasi.html',
    on:{
      pageInit: function (e, page) {
        getDetailNominasi(page.route.params.nik)
      }
    }
  },
];