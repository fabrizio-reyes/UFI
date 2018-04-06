<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@bower/plantilla/';
	//public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
		'css/isotope.css',
		'js/fancybox/jquery.fancybox.css',
		'css/animate.css',
		'js/owl-carousel/owl.carousel.css',
		'css/styles.css',
		'font/css/font-awesome.min.css',
		
    ];
    public $js = [
	
	

	//'js/jquery-1.8.2.min.js',
	'js/modernizr-latest.js',
	
	//'js/bootstrap.min.js',
	'js/jquery.isotope.min.js',
	'js/fancybox/jquery.fancybox.pack.js',
	'js/jquery.nav.js',
	'js/jquery.fittext.js',
	'js/waypoints.js',
	//'contact/jqBootstrapValidation.js',
	'contact/contact_me.js',
	'js/custom.js',
	'js/owl-carousel/owl.carousel.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
