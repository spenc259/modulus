module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		less: {
			development: {
				options: {
					paths: [ 'wp-content/themes/elavon_strap/less' ],
					cleancss: true
				},
				files: {
					// result : source
					'wp-content/themes/elavon_strap/style.css': 'wp-content/themes/elavon_strap/less/style.less'
				}
			}
		},
		concat: {
			options: {
				separator: '\n'
			},
			dist: {
				src: [ 'wp-content/themes/elavon_strap/js/production/*.js' ],
				dest: 'wp-content/themes/elavon_strap/js/scripts.js'
			},
			production: {
				src: [ 'wp-content/themes/elavon_strap/css/production/*.css' ],
				dest: 'wp-content/themes/elavon_strap/style.css'
			}
		},
		uglify: {
			options: {
				banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
			},
			dist: {
				files: {
					'wp-content/themes/elavon_strap/js/scripts.min.js': [ '<%= concat.dist.dest %>' ]
				}
			}
		},
		cssmin: {
			options: {
				banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n',
				keepSpecialComments: false
			},
			target: {
				files: {
					// target file : source file
					'wp-content/themes/elavon_strap/style.css': 'wp-content/themes/elavon_strap/style.css'
				}
			}
		},
		usebanner: {
			taskName: {
				options: {
					position: 'top',
					banner:
						'/*\nTheme Name: Elavon Strap\nTheme URI:\nAuthor: Paul Spence, Intimation\nAuthor URI:\nDescription: Bootstrap v3 ACF based. A powerful framework for your website with all boostrap components and ACF functionality.\nVersion: 1.0.1\nText Domain: bootstrap-basic\nDomain Path: /languages/\n*/',
					linebreak: true
				},
				files: {
					src: [ 'wp-content/themes/elavon_strap/style.css' ]
				}
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-banner');

	grunt.registerTask('test', [ 'concat', 'uglify' ]);
	grunt.registerTask('css-test', [ 'less', 'cssmin', 'usebanner' ]);
	grunt.registerTask('production', [ 'concat', 'uglify', 'less', 'cssmin', 'usebanner' ]);
	grunt.registerTask('default', [ 'concat' ]);
};
