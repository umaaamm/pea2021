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
    path: '/kategori/:id_nominasi/',
    url: './kategori.html',
    on:{
      pageInit: function (e, page) {
        console.log("ksini");
        getKategori(page.route.params.id_nominasi)
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

  {
    path: '/ubah-password/',
    componentUrl: './ubah-password.html',
  },
  {
    path: '/update/',
    pageName: 'update',
  },
  {
    path: '/venue/',
    url: './venue.html',
  },

  {
    path: '/venue-a/',
    url: './venue-a.html',
  },
  {
    path: '/venue-b/',
    url: './venue-b.html',
  },
  {
    path: '/venue-c/',
    url: './venue-c.html',
  },
  {
    path: '/venue-d/',
    url: './venue-d.html',
  },
  {
    path: '/venue-e/',
    url: './venue-e.html',
  },
  {
    path: '/dresscode/',
    url: './dresscode.html',
  },
  {
    path: '/absensi/',
    pageName: 'absensi',
  },
  {
    path: '/listtestimoni/',
    url: 'listtestimoni.html',
    on:{
      pageInit: function(e, page){
        getListTestimoni();
      }
    }
  },
  {
    path: '/registerbarang/',
    pageName: 'registerbarang',
  },

  {
    path: '/testimoni/',
    pageName: 'testimoni_form',
  },

  {
    path: '/getdetailtracking/:id_tracking/',
    url: './getdetailtracking.html',
    on:{
      pageInit: function (e, page) {
        getDetailTracking(page.route.params.id_tracking)
      }
    }
  },

  {
    path: '/ambil_merchandise/',
    pageName: 'ambil_merchandise',
  },

  {
    path: '/detailtrack/',
    pageName: 'detailtrack',
  },

  {
    path: '/sambutan-dirut/',
    url: './sambutan-dirut.html',
  },
  {
    path: '/sambutan-dirsdm/',
    url: './sambutan-dirsdm.html',
  },

  {
    path: '/venue-sekretariat/',
    url: './venue-sekretariat.html',
  },
  {
    path: '/venue-kesehatan/',
    url: './venue-kesehatan.html',
  },
  {
    path: '/venue-musholla/',
    url: './venue-musholla.html',
  },
  {
    path: '/venue-restaurant/',
    url: './venue-restaurant.html',
  },
  {
    path: '/venue-swimmingpool/',
    url: './venue-swimmingpool.html',
  },
  {
    path: '/pea-info/',
    url: './pea-info.html',
  },
  {
    path: '/panitia/',
    url: './panitia.html',
  },
];