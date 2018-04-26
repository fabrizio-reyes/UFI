<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\models\Seccion;
use app\models\FormacionIntegral;
use app\models\Personal;
use app\models\Enlace;
use app\models\Diplomado;
use app\models\Noticia;
use app\models\Linea;
use app\models\Archivo;
use app\models\DatosUfi;
use app\models\UploadForm;
use app\models\NoticiaArchivo;
use app\models\CompetenciaFormacion;
use app\models\Taller;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use kartik\editable\Editable;
use kartik\widgets\Growl;
use app\models\SeccionFormacion;

AppAsset::register($this);

$secciones=Seccion::find()->orderby("sec_orden")->all();

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<style>
 #sidebar-wrapper {
    margin-right: -250px;
    right: 0;
    width: 250px;
    background: rgb(0,0,0);
    position: fixed;
    height: 100%;
    overflow-y: auto;
    z-index: 1000;
    transition: all 0.5s ease-in 0s;
    -webkit-transition: all 0.5s ease-in 0s;
    -moz-transition: all 0.5s ease-in 0s;
    -ms-transition: all 0.5s ease-in 0s;
    -o-transition: all 0.5s ease-in 0s;
  }

  .sidebar-nav {
    position: absolute;
    top: 0;
    width: 250px;
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .sidebar-nav li {
    line-height: 50px;
    text-indent: 20px;
  }

  .sidebar-nav li a {
    color: #999999;
    display: block;
    text-decoration: none;
  }

  .sidebar-nav li a:hover {
    color: #fff;
    background: rgba(255,255,255,0.2);
    text-decoration: none;
  }

  .sidebar-nav li a:active, .sidebar-nav li a:focus {
    text-decoration: none;
  }

  .sidebar-nav > .sidebar-brand {
    height: 55px;
    line-height: 55px;
    font-size: 18px;
  }

  .sidebar-nav > .sidebar-brand a {
    color: #999999;
  }

  .sidebar-nav > .sidebar-brand a:hover {
    color: #fff;
    background: none;
  }

  #menu-toggle {
    top: 50%;
    right: 0;
    position: fixed;
    z-index: 1;
  }

  #sidebar-wrapper.active {
    right: 250px;
    width: 250px;
    transition: all 0.5s ease-out 0s;
    -webkit-transition: all 0.5s ease-out 0s;
    -moz-transition: all 0.5s ease-out 0s;
    -ms-transition: all 0.5s ease-out 0s;
    -o-transition: all 0.5s ease-out 0s;
  }

  .toggle {
    margin: 5px 5px 0 0;
  }
</style>


<?php 

foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
            <?php
            echo Growl::widget([
                'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
                'title' => (!empty($message['title'])) ? Html::encode($message['title']) : 'Title Not Set!',
                'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
                'body' => (!empty($message['message'])) ? Html::encode($message['message']) : 'Message Not Set!',
                'showSeparator' => true,
                'delay' => 1, //This delay is how long before the message shows
                'pluginOptions' => [
                    'delay' => (!empty($message['duration'])) ? $message['duration'] : 3000, //This delay is how long the message shows for
                    'placement' => [
                        'from' => (!empty($message['positonY'])) ? $message['positonY'] : 'top',
                        'align' => (!empty($message['positonX'])) ? $message['positonX'] : 'right',
                    ]
                ]
            ]);
            ?>
        <?php endforeach; ?>
	
<html lang="<?= Yii::$app->language ?>">
<head>

<?php
$script = <<< JS
  $("#menu-close").click(function(e) {
    e.preventDefault();
    $("#sidebar-wrapper").toggleClass("active");
  });
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#sidebar-wrapper").toggleClass("active");
  });
JS;
$this->registerJs($script);
?> 
<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
	<!-- Menú Flotante-->
	
	<div id="datos-ufi"  style="position: table !important; overflow: auto; /* Enable scroll if needed */
					background-color: rgb(0,0,0); /* Fallback color */
					background-color: rgba(0,0,0,0.4); /* Black w/ opacity */" data-backdrop="false" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content modal-lg">							  
							<div id="modal-wizard-container">
								<div class="modal-header">										  
									<h4 class="green">Creando Dato UFI <button type="button" class="pull-right close" data-dismiss="modal">&times;</button></h4> 
								</div>
								<div class="modal-body ">                                   								  
									<div class="row">
										<div class="col-xs-2 col-sm-6 col-lg-12 perfil-form text-left">
	<?php 
		
			$modelDU=new DatosUfi(); 
			echo $this->render('/datos-ufi/create', ['model' => $modelDU,]);
		
	?>													
										</div>
									</div>
								</div>
								<div class="modal-footer wizard-actions">
								<button class="btn btn-danger btn-sm pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>Cerrar</button>
								</div>
							</div>                           
						</div>
					</div>
	</div>
				
				
				<div id="for"  style="position: table !important; overflow: auto; /* Enable scroll if needed */
					background-color: rgb(0,0,0); /* Fallback color */
					background-color: rgba(0,0,0,0.4); /* Black w/ opacity */" data-backdrop="false" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content modal-lg">							  
							<div id="modal-wizard-container">
								<div class="modal-header">										  
									<h4 class="green">Creando Formación Integral<button type="button" class="pull-right close" data-dismiss="modal">&times;</button></h4> 
								</div>
								<div class="modal-body ">                                   								  
									<div class="row">
										<div class="col-xs-2 col-sm-6 col-lg-12 perfil-form text-left">
	<?php 
		
			$modelFi=new FormacionIntegral(); 
			echo $this->render('/formacion-integral/create', ['model' => $modelFi,'seccionesformacion'=>[new SeccionFormacion]]);
		
	?>													
										</div>
									</div>
								</div>
								<div class="modal-footer wizard-actions">
								<button class="btn btn-danger btn-sm pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>Cerrar</button>
								</div>
							</div>                           
						</div>
					</div>
				</div>
				
				<div id="dip"  style="position: table !important; overflow: auto; /* Enable scroll if needed */
					background-color: rgb(0,0,0); /* Fallback color */
					background-color: rgba(0,0,0,0.4); /* Black w/ opacity */" data-backdrop="false" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content modal-lg">							  
							<div id="modal-wizard-container">
								<div class="modal-header">										  
									<h4 class="green">Creando Diplomado <button type="button" class="pull-right close" data-dismiss="modal">&times;</button></h4> 
								</div>
								<div class="modal-body ">                                   								  
									<div class="row">
										<div class="col-xs-2 col-sm-6 col-lg-12 perfil-form text-left">
	<?php 
		
			$modelDi=new Diplomado(); 
			echo $this->render('/diplomado/create', ['model' => $modelDi,]);
		
	?>													
										</div>
									</div>
								</div>
								<div class="modal-footer wizard-actions">
								<button class="btn btn-danger btn-sm pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>Cerrar</button>
								</div>
							</div>                           
						</div>
					</div>
				</div>
				
				<div id="tal"  style="position: table !important; overflow: auto; /* Enable scroll if needed */
					background-color: rgb(0,0,0); /* Fallback color */
					background-color: rgba(0,0,0,0.4); /* Black w/ opacity */" data-backdrop="false" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content modal-lg">							  
							<div id="modal-wizard-container">
								<div class="modal-header">										  
									<h4 class="green">Creando Taller<button type="button" class="pull-right close" data-dismiss="modal">&times;</button></h4> 
								</div>
								<div class="modal-body ">                                   								  
									<div class="row">
										<div class="col-xs-2 col-sm-6 col-lg-12 perfil-form text-left">
	<?php 
		
			$modelTA=new Taller(); 
			echo $this->render('/taller/create', ['model' => $modelTA,]);
		
	?>													
										</div>
									</div>
								</div>
								<div class="modal-footer wizard-actions">
								<button class="btn btn-danger btn-sm pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>Cerrar</button>
								</div>
							</div>                           
						</div>
					</div>
				</div>
				
				<div id="lin"  style="position: table !important; overflow: auto; /* Enable scroll if needed */
					background-color: rgb(0,0,0); /* Fallback color */
					background-color: rgba(0,0,0,0.4); /* Black w/ opacity */" data-backdrop="false" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content modal-lg">							  
							<div id="modal-wizard-container">
								<div class="modal-header">										  
									<h4 class="green">Creando Línea de Talleres<button type="button" class="pull-right close" data-dismiss="modal">&times;</button></h4> 
								</div>
								<div class="modal-body ">                                   								  
									<div class="row">
										<div class="col-xs-2 col-sm-6 col-lg-12 perfil-form text-left">
	<?php 
		
			$modelLI=new Linea(); 
			echo $this->render('/linea/create', ['model' => $modelLI,'talleres'=>[new Taller]]);
		
	?>													
										</div>
									</div>
								</div>
								<div class="modal-footer wizard-actions">
								<button class="btn btn-danger btn-sm pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>Cerrar</button>
								</div>
							</div>                           
						</div>
					</div>
				</div>
				
				<div id="not"  style="position: table !important; overflow: auto; /* Enable scroll if needed */
					background-color: rgb(0,0,0); /* Fallback color */
					background-color: rgba(0,0,0,0.4); /* Black w/ opacity */" data-backdrop="false" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content modal-lg">							  
							<div id="modal-wizard-container">
								<div class="modal-header">										  
									<h4 class="green">Creando Noticia <button type="button" class="pull-right close" data-dismiss="modal">&times;</button></h4> 
								</div>
								<div class="modal-body ">                                   								  
									<div class="row">
										<div class="col-xs-2 col-sm-6 col-lg-12 perfil-form text-left">
	<?php 
		
			$modelNO=new Noticia(); 
			echo $this->render('/noticia/create', ['model' => $modelNO,]);
		
	?>													
										</div>
									</div>
								</div>
								<div class="modal-footer wizard-actions">
								<button class="btn btn-danger btn-sm pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>Cerrar</button>
								</div>
							</div>                           
						</div>
					</div>
				</div>
				
				<div id="per"  style="position: table !important; overflow: auto; /* Enable scroll if needed */
					background-color: rgb(0,0,0); /* Fallback color */
					background-color: rgba(0,0,0,0.4); /* Black w/ opacity */" data-backdrop="false" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content modal-lg">							  
							<div id="modal-wizard-container">
								<div class="modal-header">										  
									<h4 class="green">Creando Dato UFI <button type="button" class="pull-right close" data-dismiss="modal">&times;</button></h4> 
								</div>
								<div class="modal-body ">                                   								  
									<div class="row">
										<div class="col-xs-2 col-sm-6 col-lg-12 perfil-form text-left">
	<?php 
		
			$modelPER=new Personal(); 
			echo $this->render('/personal/create', ['model' => $modelPER,]);
		
	?>													
										</div>
									</div>
								</div>
								<div class="modal-footer wizard-actions">
								<button class="btn btn-danger btn-sm pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>Cerrar</button>
								</div>
							</div>                           
						</div>
					</div>
				</div>
				
				<?php // if(!Yii::$app->user->isGuest){ ?>
	<a id="menu-toggle" href="#" class="btn btn-primary btn-lg toggle">Crear Nuevo <i class="glyphicon glyphicon-plus"></i></a>
<div id="sidebar-wrapper">
	<ul class="sidebar-nav">
		<a id="menu-close" href="#" class="btn btn-default btn-lg pull-right toggle"><i class="glyphicon glyphicon-remove"></i></a>
		<li class="sidebar-brand">
			<a >Nuevo</a>
		</li>
		<li>	
			<?= Html::a(" Dato UFI", ['datos-ufi'],[''=>'','data-toggle'=>'modal','data-target'=>'#datos-ufi']) ?>     				
		</li>
		<li>	
			<?= Html::a(" Formación Integral", ['for'],[''=>'','data-toggle'=>'modal','data-target'=>'#for']) ?>				
		</li>
		<li>	
			<?= Html::a(" Diplomado", ['dip'],[''=>'','data-toggle'=>'modal','data-target'=>'#dip']) ?>				
		</li>
		<li>	
			<?= Html::a("Linea", ['lin'],[''=>'','data-toggle'=>'modal','data-target'=>'#lin']) ?>     				
		</li>
		<li>	
			<?= Html::a("Taller", ['tal'],[''=>'','data-toggle'=>'modal','data-target'=>'#tal']) ?>     				
		</li>
		<li>	
			<?= Html::a("Noticia", ['not'],[''=>'','data-toggle'=>'modal','data-target'=>'#not']) ?>		
		</li>
		<li>	
			<?= Html::a("Personal", ['per'],[''=>'','data-toggle'=>'modal','data-target'=>'#per']) ?>		
		</li>
		<li>
			<a href="#abajo">Bajar</a>
		</li>
	</ul>
</div>
				<?php // }
	$this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <!--<?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
-->

    <div class="" style=" <?=(strcmp(Url::current(),'/ufi/web/index.php/site/index')==0)?'':'padding-top: 140px;'?>">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
              <!--<?=Alert::widget()?>-->

        <?= $content ?>
    </div>
</div>
<header class="header" >
  <div class="container">
    <nav class="navbar navbar-inverse" role="navigation" style="background:#438EB9;">
      <div class="navbar-header">
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a style="
    padding-top: 7px;
" href="/ufi/web" class="navbar-brand scroll-top logo  animated bounceInLeft"><b><i><img src="images/logo.png" /></i></b></a> </div>

      <!--/.navbar-header-->
      <div id="main-nav" class="collapse navbar-collapse">
        <ul class="nav navbar-nav" id="mainNav">
          <li class="active" id="firstLink"><a href="#home" class="scroll-link">Home</a></li>
          <?php
			
		  for($i=0;$i<sizeof($secciones);$i++){
if($secciones[$i]->sec_codigo==6 //&& Yii::$app->user->isGuest
			  ){ continue; }
		  ?>
		  <li><a href="#sec-<?= $secciones[$i]->sec_orden?>" class="scroll-link"><?= $secciones[$i]->sec_nombre?></a> 
			<?php
			/*echo Editable::widget([
				'name'=>'province', 
				'asPopover' => false,
				'header' => 'Province',
				'format' => Editable::FORMAT_BUTTON,
				'inputType' => Editable::INPUT_DROPDOWN_LIST,
				'data'=>['l'=>$secciones[$i]->sec_nombre], // any list of values
				'options' => ['class'=>'form-control', 'prompt'=>'Select province...'],
				'editableValueOptions'=>['class'=>'text-danger']
				]);
				
				echo Editable::widget([
					'name'=>'person_name', 
					'asPopover' => false,
					'value' => $secciones[$i]->sec_nombre,
					'header' => 'Name',
					'format' => Editable::FORMAT_BUTTON,
					'size'=>'md',
					'options' => ['class'=>'form-control', 'placeholder'=>'Enter person name...']
				]);
				*/
				?>
</li>
          <?php
		  }
		  if(!Yii::$app->user->isGuest){
		  ?>



		
		 
		 
<?= Html::a(" <i class=' ace-icon fa fa-pencil' ></i>", ['#hora'],[''=>'','data-toggle'=>'modal','data-target'=>'#hora']) ?>
  
  <?php
		  }
		  ?>
<div id="hora"  style="position: table !important; overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */" data-backdrop="false" class="modal fade">
                            <div class="modal-dialog">
                              <div class="modal-content modal-lg">
							  
                                <div id="modal-wizard-container">
                                  <div class="modal-header">
                                    <h4 class="green">Editando menú<button type="button" class="pull-right close" data-dismiss="modal">&times;</button>
                                 </h4> </div>
									<div class="modal-body ">                                   								  
								   <div class="row">
									<div class="col-xs-2 col-sm-6 col-lg-12 perfil-form text-left">
									
										
										
									</div>
									</div>
                                  </div>
											
                                  
                                 <div class="modal-body " >
								 
								
								 
                                   <ol>
									<li class="list-group-item list-group-item-action">
									 <?= Html::a('Perfil', ['/perfil']) ?>
									 </li>
									 <li class="list-group-item list-group-item-action">
									 <?= Html::a('EstadoPerfil', ['/estado-perfil']) ?>
									 </li>
									 <li class="list-group-item list-group-item-action">
									 <?= Html::a('Usuario', ['/usuario']) ?>
									 </li>
									 <li class="list-group-item list-group-item-action">
									 <?= Html::a('UsuarioPerfil', ['/usuario-perfil']) ?>
									 </li>
									<li class="list-group-item list-group-item-action">
									 <?= Html::a('Seccion', ['/seccion']) ?>
									 </li>
									<li class="list-group-item list-group-item-action">
									 <?= Html::a('UsuarioSeccion', ['/usuario-seccion']) ?>
									 </li>
									 <li class="list-group-item list-group-item-action">
									 <?= Html::a('DatosUfi', ['/datos-ufi']) ?>
									 </li>
									 <li class="list-group-item list-group-item-action">
									 <?= Html::a('Enlace', ['/enlace']) ?>
									 </li>
									 <li class="list-group-item list-group-item-action">
									 <?= Html::a('Contacto', ['/contacto']) ?>
									 </li>
									 <li class="list-group-item list-group-item-action">
									 <?= Html::a('Noticia', ['/noticia']) ?>
									 </li>
									 <li class="list-group-item list-group-item-action">
									 <?= Html::a('Archivo', ['/archivo']) ?>
									 </li>
									 <li class="list-group-item list-group-item-action">
									 <?= Html::a('NoticiaArchivo', ['/noticia-archivo']) ?>
									 </li>
									 <li class="list-group-item list-group-item-action">
									 <?= Html::a('Personal', ['/personal']) ?>
									 </li>
									 <li class="list-group-item list-group-item-action">
									 <?= Html::a('FormacionIntegral', ['/formacion-integral']) ?>
									 </li>
									 <li class="list-group-item list-group-item-action">
									 <?= Html::a('SeccionFormacion', ['/seccion-formacion']) ?>
									 </li>
									 <li class="list-group-item list-group-item-action">
									 <?= Html::a('CompetenciaGenerica', ['/competencia-generica']) ?>
									 </li>
									 <li class="list-group-item list-group-item-action">
									 <?= Html::a('CompetenciaFormacion', ['/competencia-formacion']) ?>
									 </li>
									 <li class="list-group-item list-group-item-action">
									 <?= Html::a('Diplomado', ['/diplomado']) ?>
									 </li>
									 <li class="list-group-item list-group-item-action">
									 <?= Html::a('CompetenciaDiplomado', ['/competencia-diplomado']) ?>
									 </li>
									 <li class="list-group-item list-group-item-action">
									 <?= Html::a('TipoArchivo', ['/tipo-archivo']) ?>
									 </li>
									 <li class="list-group-item list-group-item-action">
									 <?= Html::a('DiplomadoArchivo', ['/diplomado-archivo']) ?>
									 </li>
									 <li class="list-group-item list-group-item-action">
									 <?= Html::a('Linea', ['/linea']) ?>
									 </li>
									 <li class="list-group-item list-group-item-action">
									 <?= Html::a('Taller', ['/taller']) ?>
									 </li>
									 <li class="list-group-item list-group-item-action">
									 <?= Html::a('CompetenciaTaller', ['/competencia-taller']) ?>
									 </li>
									 <li class="list-group-item list-group-item-action">
									 <?= Html::a('LineaArchivo', ['/linea-archivo']) ?>
									 </li>   					  
									</ol>
                                    
                                  </div>
                                  <div class="modal-footer wizard-actions">
                                  <button class="btn btn-danger btn-sm pull-right" data-dismiss="modal">
                                    <i class="ace-icon fa fa-times"></i>
                                    Cerrar
                                  </button>
                                </div>
                                </div>

                                
                              </div>
                            </div>
                          </div>
						  
        </ul>
      </div>
      <!--/.navbar-collapse--> 
    </nav>
    <!--/.navbar--> 
  </div>
  <!--/.container--> 
</header>
<!--/.header-->

<footer  style="background:#438EB9;">
<div class="container">
        <div class="row">
            <div class="col-md-9">
            	<div class="col">
                   <h4 style="color:black;font-weight:bold;">Unidad de Formación Integral</h4>
                   <ul style="color:black">
                        <li >Avenida Andrés Bello N°720 Campus Fernando May, Chillán</li>
                        <li>Fonos: (42) 2463184 - (42) 2463267 - (41) 3111830 </li>
                        <li>Email: <a data-toggle="tooltip" data-placement="top" title="Enviar Correo" href="mailto: formacionintegral@ubiobio.cl" title="Email Us"> formacionintegral@ubiobio.cl</a></li>
                       
						</br>
						

						<?php
						if(Yii::$app->user->isGuest ){
							echo Html::a("<i class='fa fa-key fa-2x'> Iniciar Sesión</i> ", ['/site/login']);
						}else{
							echo '<li data-toggle="tooltip" data-placement="top" title="Cerrar Sesión">'
							. Html::beginForm(['/site/logout'], 'post')
							. Html::submitButton(
								"<i class='fa fa-power-off  fa-2x' ></i> (" . Yii::$app->user->identity->username . ')',
								['class' => 'btn btn-link ']
							)
							. Html::endForm()
							. '</li>';
						}
						
						
						?>		
					</ul>
                 </div>
            </div>
            
           
            <div class="col-md-3">
            	<div class="col col-social-icons">
                    <h4>Síguenos</h4>
                    <a data-toggle="tooltip" data-placement="top" target="_blank" title="Unidad Formación Integral" href="http://www.facebook.com/formacionintegralubb"><i class="fa fa-facebook"></i></a>
                    <a data-toggle="tooltip" data-placement="top" target="_blank" title="Universidad del Bío-Bío Chile" href="https://www.youtube.com/user/udelbiobio"><i class="fa fa-youtube-play"></i></a>
					<a data-toggle="tooltip" data-placement="top" target="_blank" title="@integralubb" href="https://twitter.com/integralubb"><i class="fa fa-twitter"></i></a>
					<a data-toggle="tooltip" data-placement="top" title="Enviar Correo" href="mailto: formacionintegral@ubiobio.cl"><i class="fa fa-envelope"></i></a>
                </div>
            </div>
            
        </div>
         
    </div>
    
</footer>
<!--/.page-section-->
<section class="copyright">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center"> Copyright 2018 | All Rights Reserved -- Template by -  <a href="http://webThemez.com"> WebThemez.com</a> </div>
	</div>
    <!-- / .row --> 
  </div>
</section>
<a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"></i></a> 


<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
$(".carousel.flexible.default").flexCarousel(); 

</script>
<a id="abajo"></a>