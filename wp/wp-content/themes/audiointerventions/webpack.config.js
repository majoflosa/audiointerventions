const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const path = require('path');

module.exports = {
    entry: './assets/src/js/index.js',
    
    output: {
        path: __dirname,
        filename: 'assets/dist/js/main.js',
        publicPath: '/assets/img/'
    },

    devtool: 'source-map',

    module: {
        rules: [
            { test: /\.js$/, loader: 'babel-loader', exclude: /node_modules/ },
            { test: /\.s(c|a)ss$/, use: [
                {
                    loader: MiniCssExtractPlugin.loader,
                    // options: { hmr: process.env.NODE_ENV === 'development' }
                },
                {
                    loader: 'css-loader',
                    options: {
                        url: false,
                    }
                },
                'postcss-loader',
                'sass-loader'
            ] },
            { test: /\.(png|jpg|jpeg|gif)$/, loader: 'file-loader' }
        ]
    },

    plugins: [
        new MiniCssExtractPlugin({
            filename: 'assets/dist/css/main.css',
        }),
        new BrowserSyncPlugin({
            files: [
                './*.php',
                './**/*.php'
            ],
            proxy: 'https://audiointerventions-wp.ddev.site/'
        }),
        new OptimizeCSSAssetsPlugin()
    ]
};
