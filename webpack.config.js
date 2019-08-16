var path = require('path');
module.exports = {
    entry: './resources/js/index.js',
    mode: 'development',
    output: {
        path: path.resolve(__dirname, './public'),
        filename: 'js/app.js'
    },
    module: {
      rules: [
        {
          test: /\.(js|jsx)$/,
          exclude: /node_modules/,
          use: {
            loader: "babel-loader"
          }
        },
        {
            test: /\.(s*)css$/,
            use: [
              {
                loader: "style-loader" // creates style nodes from JS strings
              },
              {
                loader: "css-loader" // translates CSS into CommonJS
              },
              {
                loader: "sass-loader" // compiles Sass to CSS
              }
            ]
        },
        {
          test: /\.(jpe?g|png|gif|svg)$/i, 
          loader: "file-loader?name=/images/[name].[ext]"
        }
      ]
    },
    devtool: "cheap-module-eval-source-map",
    externals: {
      // global app config object
      config: JSON.stringify({
          apiUrl: 'http://www.lgprofile.local/'
      })
    }
  };
