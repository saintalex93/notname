//function dateHash()
//{
//	var date = + new Date().toString();
//	return date;
//}
//


var gulp = require('gulp'),
htmlmin = require('gulp-htmlmin'),
clean_css = require('gulp-clean-css'),
minify_js = require('gulp-uglify'),
gulpIgnore = require('gulp-ignore');

var condition = './assets';



var paths = {
	site:{
		html: {
			destFolder: "assets/",
			srcFolder: ["./", "!./node_modules"],
			srcFiles: ["./**/*.php","!./assets/**/*.php", "!./package.json", "!./gulpfile.js"] //!ignorando pastas e arquivos !
		},


		css: {
			destFolder: "assets/CSS/",
			srcFolder: "CSS/",
			srcFiles: "./CSS/*.css"
		},

		js: {
			destFolder: "assets/JS/",
			srcFolder: "JS/",
			srcFiles: "./JS/*.js"
		}

	}
};

// Tarefas

// SITE

gulp.task('site_clean_css', function()
{
	return gulp.src([paths.site.css.srcFiles]) 
			.pipe(clean_css()) 
			.pipe(gulp.dest(paths.site.css.destFolder)); 
		});



gulp.task('site_html_minify', function() {
	return gulp.src(paths.site.html.srcFiles)
	.pipe(gulpIgnore.exclude(condition))
	.pipe(htmlmin({collapseWhitespace: true}))
	.pipe(gulp.dest(paths.site.html.destFolder));
});


gulp.task('site_js_minify', function() {
	return gulp.src(paths.site.js.srcFiles)
	.pipe(minify_js())
	.pipe(gulp.dest(paths.site.js.destFolder));
});


// SITE
gulp.task('site_watch_css', function()
{
	gulp.watch(paths.site.css.srcFiles, ['site_clean_css']);
});

gulp.task('site_watch_html', function()
{
	gulp.watch(paths.site.html.srcFiles, ['site_html_minify']);
});
gulp.task('site_watch_js', function()
{
	gulp.watch(paths.site.js.srcFiles, ['site_js_minify']);
});


gulp.task('default', [
	'site_watch_css',
	'site_watch_html',
	'site_watch_js'

	]);

gulp.task('run', [
	'site_html_minify',
	'site_js_minify',
	'site_clean_css'

	]);


