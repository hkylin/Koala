({
    baseUrl: '.',
    dir: '../dist/scripts',
    mainConfigFile: 'main.js',
    findNestedDependencies: true,
    modules: [
      {
          name: 'pages/index'
      },
      {
          name: 'pages/detail'
      },
      {
          name: 'pages/login'
      },
      {
          name: 'pages/profile'
      },
      {
          name: 'pages/register'
      }
    ],
    fileExclusionRegExp: /^\./
})