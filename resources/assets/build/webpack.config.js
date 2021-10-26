"use strict"; // eslint-disable-line

const webpack = require("webpack");
const merge = require("webpack-merge");
const CleanPlugin = require("clean-webpack-plugin");
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const StyleLintPlugin = require("stylelint-webpack-plugin");
const CopyGlobsPlugin = require("copy-globs-webpack-plugin");
const FriendlyErrorsWebpackPlugin = require("friendly-errors-webpack-plugin");
const UglifyJSPlugin = require("uglify-js-plugin");
const OptimizeCssAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const {VueLoaderPlugin} = require("vue-loader");
const {ES6PromisePlugin} = require("es6-promise");

const desire = require("./util/desire");
const config = require("./config");

const assetsFilenames = (config.enabled.cacheBusting) ? config.cacheBusting : "[name]";

let webpackConfig = {
    context: config.paths.assets,
    entry: config.entry,
    devtool: config.enabled.sourceMaps ? "#source-map" : undefined,
    output: {
        path: config.paths.dist,
        publicPath: config.publicPath,
        filename: `scripts/${assetsFilenames}.js`
    },
    stats: {
        hash: false,
        version: false,
        timings: false,
        children: false,
        errors: false,
        errorDetails: false,
        warnings: false,
        chunks: false,
        modules: false,
        reasons: false,
        source: false,
        publicPath: false
    },
    module: {
        rules: [
            {
                enforce: "pre",
                test: /\.(js|vue)$/,
                include: config.paths.assets,
                use: "eslint"
            },
            {
                enforce: "pre",
                test: /\.(js|s?[ca]ss)$/,
                include: config.paths.assets,
                loader: "import-glob"
            },
            {
                test: /\.vue$/,
                use: ["vue-loader"]
            },
            {
                test: /\.js$/,
                exclude: [/node_modules(?![/|\\](bootstrap|foundation-sites))/],
                use: [
                    {loader: "cache"},
                    {loader: "babel-loader", options: {presets: ["@babel/preset-env"]}},
                    {loader: "buble", options: {objectAssign: "Object.assign"}}
                ]
            },
            {
                test: /\.css$/,
                exclude: config.paths.assets,
                use: [
                    {loader: "vue-style-loader"},
                    {loader: "style-loader"},
                    {loader: "css-loader"},
                ],
            },
            {
                test: /\.css$/,
                include: config.paths.assets,
                use: ExtractTextPlugin.extract({
                    fallback: "style",
                    use: [
                        {loader: "cache"},
                        {loader: "css", options: {sourceMap: config.enabled.sourceMaps}},
                        {loader: "postcss", options: {config: {path: __dirname, ctx: config}, sourceMap: config.enabled.sourceMaps}}
                    ]
                })
            },
            {
                test: /\.scss$/,
                exclude: config.paths.assets,
                use: [
                    {loader: "vue-style-loader"},
                    {loader: "css-loader"},
                    {loader: "sass-loader"},
                    {loader: "css", options: {sourceMap: config.enabled.sourceMaps}},
                    {loader: "postcss", options: {config: {path: __dirname, ctx: config}, sourceMap: config.enabled.sourceMaps}},
                ]
            },
            {
                test: /\.scss$/,
                include: config.paths.assets,
                use: ExtractTextPlugin.extract({
                    fallback: "style",
                    use: [
                        {loader: "cache"},
                        {loader: "css", options: {sourceMap: config.enabled.sourceMaps}},
                        {loader: "postcss", options: {config: {path: __dirname, ctx: config}, sourceMap: config.enabled.sourceMaps}},
                        {loader: "resolve-url", options: {sourceMap: config.enabled.sourceMaps}},
                        {loader: "sass", options: {sourceMap: config.enabled.sourceMaps, sourceComments: true}}
                    ]
                })
            },
            {
                test: /\.(png|jpe?g|gif|svg|ico)$/,
                include: config.paths.assets,
                loader: "url",
                options: {
                    limit: 10000,
                    name: `[path]${assetsFilenames}.[ext]`
                }
            },
            {
                test: /fonts\/.*\.(woff|woff2|eot|ttf|svg)$/,
                include: config.paths.assets,
                loader: "url",
                options: {
                    name: `[path]${assetsFilenames}.[ext]`
                }
            },
            {
                test: /\.(ttf|otf|eot|woff2?|png|jpe?g|gif|svg|ico)$/,
                include: /node_modules/,
                loader: "file-loader",
                options: {
                    limit: 10000,
                    outputPath: "vendor/",
                    name: `${config.cacheBusting}.[ext]`
                }
            },
            {
                test: /\.js$/,
                loader: "babel",
            }
        ]
    },
    resolve: {
        modules: [config.paths.assets, "node_modules"],
        enforceExtension: false,
        alias: {
            "vue$": "vue/dist/vue.esm.js"
        },
    },
    resolveLoader: {
        moduleExtensions: ["-loader"]
    },
    externals: {
        jquery: "jQuery"
    },
    plugins: [
        new CleanPlugin([config.paths.dist], {
            root: config.paths.root,
            verbose: false
        }),
        /**
         * It would be nice to switch to copy-webpack-plugin, but
         * unfortunately it doesn't provide a reliable way of
         * tracking the before/after file names
         */
        new CopyGlobsPlugin({
            pattern: config.copy,
            output: `[path]${assetsFilenames}.[ext]`,
            manifest: config.manifest
        }),
        new ExtractTextPlugin({
            filename: `styles/${assetsFilenames}.css`,
            allChunks: true,
            disable: config.enabled.watcher
        }),
        new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery",
            "window.jQuery": "jquery",
            Tether: "tether",
            "window.Tether": "tether",
            Promise: "es6-promise", // works as expected
        }),
        new webpack.LoaderOptionsPlugin({
            minimize: config.enabled.optimize,
            debug: config.enabled.watcher,
            stats: {colors: true}
        }),
        new webpack.LoaderOptionsPlugin({
            test: /\.s?css$/,
            options: {
                output: {path: config.paths.dist},
                context: config.paths.assets
            }
        }),
        new webpack.LoaderOptionsPlugin({
            test: /\.js$/,
            options: {
                eslint: {failOnWarning: false, failOnError: true}
            },
        }),
        new StyleLintPlugin({
            failOnError: !config.enabled.watcher,
            syntax: "scss"
        }),
        new FriendlyErrorsWebpackPlugin(),
        new VueLoaderPlugin(),
        new webpack.DefinePlugin({
            "process.env.NODE_ENV": config.env.production ? JSON.stringify("production") : JSON.stringify("development")
        })
    ]
};

/* eslint-disable global-require */ /** Let's only load dependencies as needed */

if (config.enabled.optimize) {
    webpackConfig = merge(webpackConfig, require("./webpack.config.optimize"));
}

if (config.env.production) {
    webpackConfig.plugins.push(new webpack.NoEmitOnErrorsPlugin());
}

if (config.enabled.cacheBusting) {
    const WebpackAssetsManifest = require("webpack-assets-manifest");
    
    webpackConfig.plugins.push(
        new WebpackAssetsManifest({
            output: "assets.json",
            space: 2,
            writeToDisk: false,
            assets: config.manifest,
            replacer: require("./util/assetManifestsFormatter"),
        })
    );
}

if (config.enabled.watcher) {
    webpackConfig.entry = require("./util/addHotMiddleware")(webpackConfig.entry);
    webpackConfig = merge(webpackConfig, require("./webpack.config.watch"));
}

/**
 * During installation via sage-installer (i.e. composer create-project) some
 * presets may generate a preset specific config (webpack.config.preset.js) to
 * override some of the default options set here. We use webpack-merge to merge
 * them in. If you need to modify Sage's default webpack config, we recommend
 * that you modify this file directly, instead of creating your own preset
 * file, as there are limitations to using webpack-merge which can hinder your
 * ability to change certain options.
 */
module.exports = merge.smartStrategy({
    "module.loaders": "replace",
    optimization: {
        minimizer: [
            new UglifyJSPlugin({
                cache: true,
            })
        ]
    }
})(webpackConfig, desire(`${__dirname}/webpack.config.preset`));
