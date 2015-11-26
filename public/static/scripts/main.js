requirejs.config({

  baseUrl: '/public/static/scripts',
  
  paths: {
    // lib
    'jquery': 'lib/jquery',
    'jquery.cookie': 'lib/jquery-cookie',
    // 'materialize': 'lib/materialize.min',
    'bootstrap': 'lib/bootstrap.min',
    'serializeObject': 'lib/serializeObject',

    // module
    'handles': 'methods/handles',

    // app
    'register': 'app/register',
    'login': 'app/login',
    'logout': 'app/logout',
    'profile': 'app/profile',
    'picZoom': 'app/picZoom',
    'publishSecret': 'app/publishSecret',
    'gb_search': 'app/gb_search',
    'feed': 'app/feed'
  },

  'shim': {
    'jquery': {
      exports: '$'
    },
    'bootstrap' : {
      'deps' :['jquery']
    }
  }

});

requirejs(['logout']);
// requirejs(['jquery', 'bootstrap', 'handles', 'gb_search', 'logout', 'serializeObject', 'feed']);