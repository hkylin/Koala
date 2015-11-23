// Grunt configuration.
module.exports = function(grunt) {
  grunt.initConfig({

    requirejs: {
      base: {
        options: {
          almond: true,
          wrap: true,
          preserveLicenseComments: false,
          wrapShim: true, // 兼容非标准的rquirejs模块
          baseUrl: "public/static/scripts",
          mainConfigFile: "public/static/scripts/main.js",
          findNestedDependencies: true,
          name: "pages/base",
          out: "public/static/dist/scripts/pages/base.js"
        }
      },
      index: {
        options: {
          almond: true,
          wrap: true,
          preserveLicenseComments: false,
          wrapShim: true, // 兼容非标准的rquirejs模块
          baseUrl: "public/static/scripts",
          mainConfigFile: "public/static/scripts/main.js",
          findNestedDependencies: true,
          name: "pages/index",
          out: "public/static/dist/scripts/pages/index.js"
        }
      },
      detail: {
        options: {
          almond: true,
          wrap: true,
          preserveLicenseComments: false,
          wrapShim: true, // 兼容非标准的rquirejs模块
          baseUrl: "public/static/scripts",
          mainConfigFile: "public/static/scripts/main.js",
          findNestedDependencies: true,
          name: "pages/detail",
          out: "public/static/dist/scripts/pages/detail.js"
        }
      },
      login: {
        options: {
          almond: true,
          wrap: true,
          preserveLicenseComments: false,
          wrapShim: true, // 兼容非标准的rquirejs模块
          baseUrl: "public/static/scripts",
          mainConfigFile: "public/static/scripts/main.js",
          findNestedDependencies: true,
          name: "pages/login",
          out: "public/static/dist/scripts/pages/login.js"
        }
      },
      profile: {
        options: {
          almond: true,
          wrap: true,
          preserveLicenseComments: false,
          wrapShim: true, // 兼容非标准的rquirejs模块
          baseUrl: "public/static/scripts",
          mainConfigFile: "public/static/scripts/main.js",
          findNestedDependencies: true,
          name: "pages/profile",
          out: "public/static/dist/scripts/pages/profile.js"
        }
      },
      register: {
        options: {
          almond: true,
          wrap: true,
          preserveLicenseComments: false,
          wrapShim: true, // 兼容非标准的rquirejs模块
          baseUrl: "public/static/scripts",
          mainConfigFile: "public/static/scripts/main.js",
          findNestedDependencies: true,
          name: "pages/register",
          out: "public/static/dist/scripts/pages/register.js"
        }
      }
    }

  });
 
  grunt.loadNpmTasks('grunt-requirejs');

  // Default task(s).
  grunt.registerTask('default', ['requirejs']);
 
};
