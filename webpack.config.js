const path = require('path');

module.exports = {
	entry: {
		app: './src/js/index.js'
	},
	output: {
		filename: '[name].bundle.js',
		path: path.resolve(__dirname, 'dist')
	},
	devtool: 'inline-source-map',
	devServer: {
		contentBase: './dist'
	},
	module: {
		rules: [ { test: /\.js$/, exclude: /node_modules/, loader: 'babel-loader' } ]
	}
};
