// gulpプラグインの読み込み
const gulp = require("gulp");
// Sassをコンパイルするプラグインの読み込み
const sass = require("gulp-sass");
const pug = require('gulp-pug');
const browserSync  = require('browser-sync');
const beautify = require('gulp-beautify');


gulp.task('browser-sync', function() {
    browserSync.init({
        server: {
            baseDir: "./public",
            index: "index.html"
        }
    });
});

gulp.task('reload', function(done) {
    browserSync.reload();
    done();
});

// Sassをコンパイルするタスクの設定
gulp.task("css", function () {
    return gulp.src('./src/sass/*.scss')// コンパイル対象のSassファイル
            .pipe(sass({
                outputStyle: 'expanded'
            })) // コンパイル実行
            //.pipe(autoprefixer()) // ベンダープレフィックスの付与
            // .pipe(gulp.dest('./public/css')).pipe(gulp.dest('./wp/css')); // 出力
            .pipe(gulp.dest('./public/css')); // 出力
            //.pipe(gulp.dest('./public/css')); // 出力
});

gulp.task("pug", function () {
    return gulp.src('./src/pug/pages/**/*.pug')// コンパイル対象のSassファイル
            .pipe(pug({
                pretty: true,
                basedir: './src/pug/'
            })) // コンパイル実行
            .pipe(beautify.html({ indent_size: 4,indent_with_tabs:true }))
            //.pipe(autoprefixer()) // ベンダープレフィックスの付与
            .pipe(gulp.dest('./public')); // 出力
});


gulp.task('watch', function() {
    // scssフォルダを監視し、変更があったらコンパイルする
    gulp.watch('./src/sass/**/*.scss',gulp.series('css'));
    gulp.watch(['./src/pug/**/*.pug'],gulp.series('pug'));
    gulp.watch('./public/**', gulp.series('reload'));
});


gulp.task('default', gulp.series(gulp.parallel('watch','reload','browser-sync'), function(done) {
    // do more stuff
    done();
}));
