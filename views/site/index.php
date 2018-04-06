<?php
use app\models\Seccion;
use app\models\FormacionIntegral;
use app\models\SeccionFormacion;
use app\models\Personal;
use app\models\Enlace;
use app\models\Linea;
use app\models\Taller;
use app\models\Diplomado;
use app\models\Contacto;
use app\models\Noticia;
use app\models\Archivo;
use app\models\DatosUfi;
use app\models\UploadForm;
use app\models\NoticiaArchivo;
use app\models\CompetenciaFormacion;
use app\models\CompetenciaGenerica;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


$secciones=Seccion::find()->orderby("sec_orden")->all();
$formaciones=FormacionIntegral::find()->all();
$lineas=Linea::find()->all();
$noticias=Noticia::find()->all();
$diplomados=Diplomado::find()->all();
$personal=Personal::find()->all();
$DatosUfis=DatosUfi::find()->all();
$enlaces=Enlace::find()->all();
$competencias=CompetenciaGenerica::find()->all();



$verFormaciones=0;
$verDiplomados=false;
$verLineas=false;
$verNoticias=false;


$colorback=1;
?>

<div id="#top"></div>
	<section id="home">
<style>
div.ex3 {
    height: 635px;
    overflow: hidden;
}

div.ex2 {
    height: 635px;
    overflow: hidden;
}
</style>


		<div class="-container"> 
			<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
				<ol class="carousel-indicators" >
					<li style="background-color:white;border:2px solid #000;" data-target="#carousel" data-slide-to="0" class="active"></li>
					<li style="background-color:white;border:2px solid #000;" data-target="#carousel" data-slide-to="1"></li>
					<li style="background-color:white;border:2px solid #000;" data-target="#carousel" data-slide-to="2"></li>
					<li style="background-color:white;border:2px solid #000;" data-target="#carousel" data-slide-to="3"></li>
					<li style="background-color:white;border:2px solid #000;" data-target="#carousel" data-slide-to="4"></li>
				</ol>
				<!-- Carousel items -->
				<div class="ex2">
				<div class="carousel-inner">
					<div class="active item"><img src="images/k.png" alt="banner" width="100%" ></div>
					<div class=" item"><img  src="images/banner-bg.jpg" alt="banner"   width="100%" /></div>
					<div class=" item"><img  src="images/ufi3.jpg" alt="banner"  width="100% " ></div>
					<div class=" item"><img src="images/l.jpg" alt="banner"  width="100%" ></div>
					<div class=" item"><img  src="images/ufi5.jpg" alt="banner"  width="100%" ></div>
				</div>
				</div>
				<!-- Carousel nav -->
				<a class="carousel-control left" href="#carousel" data-slide="prev">&lsaquo;</a>
				<a class="carousel-control right" href="#carousel" data-slide="next">&rsaquo;</a>
			</div>	
		</div>  
		<div class="container hero-text2">        
			<div class="col-md-9">
				<h2>Why B-School?</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed bibendum orci eget nulla mattis, quis viverra tellus porta. Donec vitae neque ut velit eleifend commodo. Maecenas turpis odio, placerat eu lorem ut, suscipit commodo augue.  </p>   
			</div>  
			<div class="col-md-3">
				<a class="btn btn-apply" href="#"><i class="fa fa-play-circle"></i>Apply Now</a>  
			</div>
		</div>
	</section>
	<?php
	foreach ($secciones as $s=>$seccion){
		
if($seccion->sec_codigo==6 //&& Yii::$app->user->isGuest
		){ continue; }
		$colorback++;
        
	?>
	</br>
<?php if($colorback%2){ 
	echo '<section id="sec-'.$seccion->sec_orden.'" style="padding-top: 50px;background-color:#b0d0db;">';
	}else{
		echo '<section id="sec-'.$seccion->sec_orden.'" style="padding-top: 50px;">';
	} ?>
	
	<div class="container">
		<div class="heading text-center"> 
			<div class="pull-right">	



	<?php if(!Yii::$app->user->isGuest){ ?>
	
	<?= Html::a(" <i class=' ace-icon fa fa-pencil' style='font-size:20px;color:black;' data-toggle='tooltip' data-placement='top' title='Editar Sección'></i>", ['#sec'.$seccion->sec_codigo],[''=>'','data-toggle'=>'modal','data-target'=>'#sec'.$seccion->sec_codigo]) ?>				
				
				
	<?php } ?>
				<div id="sec<?= $seccion->sec_codigo?>"  style="position: table !important; overflow: auto; /* Enable scroll if needed */
					background-color: rgb(0,0,0); /* Fallback color */
					background-color: rgba(0,0,0,0.4); /* Black w/ opacity */" data-backdrop="false" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content modal-lg">									  
							<div id="modal-wizard-container">
								<div class="modal-header">
									<h4 class="green">Editando sección <?= $seccion->sec_nombre?> <button type="button" class="pull-right close" data-dismiss="modal">&times;</button></h4>
								</div>
								<div class="modal-body ">																		  
									<div class="row">
										<div class="col-xs-2 col-sm-6 col-lg-12 perfil-form text-left">
	<?= $this->render('/seccion/update', ['model' => $seccion,'id' => $seccion->sec_codigo,]) ?>		
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
			</div>
			  <!-- Heading -->
			<p style="text-align:center;font-size:35px;color:#438eb9;font-weight:bold;padding-left: 49px;"><?= $seccion->sec_nombre?></p>			  
			<p style="text-align:center;"><?= $seccion->sec_titulo?></p>
		</div><div class="area1 columns left">				   
	<?= (($seccion->sec_descripcion)?'<p >'.$seccion->sec_descripcion.'</p>':'')?>					  
			</div> 
		<div class="row feature design">
			
	
			<div class="container">
				<div class="panel-group" id="accordion1">
				
	<?php foreach ($DatosUfis as $d=>$Datos){ ?>
	<?php if($seccion->sec_codigo==$Datos->sec_codigo){ ?>
					<div class="panel panel-default">
						<div class="panel-heading" style="background-color:#438eb9">
							<h4 class="panel-title">
							  <a  title="Expandir" data-toggle="collapse" data-parent="#accordion1" href="#collapse<?= $Datos->dat_codigo?>"><div class="pull-left"><?= $Datos->dat_titulo?></div><div class="pull-right"><i class="fa fa-angle-double-down" aria-hidden="true"></i></div></a>
								<a></a><a></a>
	<?= Html::a(" <i class=' ace-icon fa fa-pencil ' style='font-size:25px;color:black;text-align:end;' data-toggle='tooltip' data-placement='top' title='Editar Dato UFI'></i>", ['#dat'.$Datos->dat_codigo],[''=>'','style'=>'text-align:end;width:359px;','data-toggle'=>'modal','data-target'=>'#dat'.$Datos->dat_codigo]) ?>
								<div id="dat<?= $Datos->dat_codigo?>"  style="position: table !important; overflow: auto; /* Enable scroll if needed */		
						background-color: rgb(0,0,0); /* Fallback color */
						background-color: rgba(0,0,0,0.4); /* Black w/ opacity */" data-backdrop="false" class="modal fade">
						<div class="modal-dialog" >
							<div class="modal-content modal-lg">							  
							<div id="modal-wizard-container2">
									<div class="modal-header">
										<h4 class="green">Editando Dato UFI <?= $Datos->dat_titulo?> <button type="button" class="pull-right close" data-dismiss="modal">&times;</button></h4>
									</div>
									<div class="modal-body ">                                  								  
										<div class="row">
											<div class="col-xs-2 col-sm-6 col-lg-12 perfil-form text-left">
											
	<?= $this->render('/datos-ufi/update', ['model' => $Datos,'id' => $Datos->dat_codigo]) ?>
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
							</h4>
						</div>
						<div id="collapse<?=$Datos->dat_codigo?>" class="panel-collapse collapse">						  
							<div class="panel-body"><?= $Datos->dat_descripcion?></div>
						</div>
					</div>				  
	<?php }} ?>
				</div> 
			</div>
	<?php  
			foreach ($enlaces as $e=>$enlace){
				if($enlace->sec_codigo==$seccion->sec_codigo){	
					$archivoenlace=Archivo::find()->where('arc_codigo='.$enlace->arc_codigo)->one();			
					?>
			<div class="col-sm-3">			
			<a style="width:284px;" data-toggle="tooltip" data-placement="top" title="Ir" href="<?= $enlace->enl_direccion ?>" target="_blank"><img src="archivos/datos_ufi/<?= $archivoenlace->arc_nombre.'.'.$archivoenlace->arc_extension ?>" border="0" alt="alt" ></a>
			<a style="background:#438EB9;padding-left: 5px;width:284px;" class="btn btn-success" id="<?= $enlace->enl_codigo ?>" target="_blank" href="<?= $enlace->enl_direccion ?>"><?= $enlace->enl_nombre ?> <i class="fa fa-external-link" aria-hidden="true"></i> </a>
			</div>
	<?php }} 
			
			for($i=0;$i<sizeof($formaciones);$i++){
				if($formaciones[$i]->sec_codigo==$seccion->sec_codigo){ 
				$verFormaciones++;
				$seccionesfor=SeccionFormacion::find()->where('for_codigo='.$formaciones[$i]->for_codigo)->all();
				$competenciasformacion=CompetenciaFormacion::find()->where('for_codigo='.$formaciones[$i]->for_codigo)->all();				
				if($verFormaciones==5){
					echo '	<div id="verfor" class="collapse">';}
				?>
			
			<div class="col-sm-3 text-center"> 				 
				<div class="box-item">
	<?php if(!Yii::$app->user->isGuest){ ?>
	<?= Html::a(" <i class=' ace-icon fa fa-pencil ' style='font-size:25px;color:black;' data-toggle='tooltip' data-placement='top' title='Editar Formación Integral'></i>", ['#for'.$formaciones[$i]->for_codigo],[''=>'','style'=>'text-align:end;margin-right: 0px;','data-toggle'=>'modal','data-target'=>'#for'.$formaciones[$i]->for_codigo]) ?>
	<?php } ?>	
					<div id="for<?= $formaciones[$i]->for_codigo?>"  style="position: table !important; overflow: auto; /* Enable scroll if needed */
						background-color: rgb(0,0,0); /* Fallback color */
						background-color: rgba(0,0,0,0.4); /* Black w/ opacity */" data-backdrop="false" class="modal fade">
						<div class="modal-dialog" >
							<div class="modal-content modal-lg">							  
								<div id="modal-wizard-container2">
									<div class="modal-header">
										<h4 class="green">Editando Formación <?= $formaciones[$i]->for_nombre?> <button type="button" class="pull-right close" data-dismiss="modal">&times;</button></h4>
									</div>
									<div class="modal-body ">                                  								  
										<div class="row">
											<div class="col-xs-2 col-sm-6 col-lg-12 perfil-form text-left">
											<?php
											?>
	<?= $this->render('/formacion-integral/update', ['model' => $formaciones[$i],'id' => $formaciones[$i]->for_codigo]) ?>										
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
					
					<div id="ford<?= $formaciones[$i]->for_codigo?>"  style="position: table !important; overflow: auto; /* Enable scroll if needed */
						background-color: rgb(0,0,0); /* Fallback color */
						background-color: rgba(0,0,0,0.4); /* Black w/ opacity */" data-backdrop="false" class="modal fade">
						<div class="modal-dialog" >
							<div class="modal-content modal-lg">							  
								<div id="modal-wizard-container2">
									<div class="modal-header">
										<h4 class="green"> Formación Integral <?= $formaciones[$i]->for_nombre?> <button type="button" class="pull-right close" data-dismiss="modal">&times;</button></h4>
									</div>
									<div class="modal-body ">                                  								  
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-lg-12 perfil-form text-left">
												<div class="table-responsive">
													<table class="table table-bordered ">
														
														<tbody>
															<tr style="background:#e3e3e3;color:#43273c;">													
																<th style="text-align:justify;font-family:sans-serif;background:#b5e61d" >Nombre</th>
																<td style="text-align:center;"><?= $formaciones[$i]->for_nombre?></td>																
															</tr>
															<tr style="background:#e3e3e3;color:#43273c;">													
																<th style="text-align:justify;font-family:sans-serif;background:#b5e61d" >Descripción</th>
																<td style="text-align:center;"><?= $formaciones[$i]->for_nombre?></td>																
															</tr>
															<tr style="background:#e3e3e3;color:#43273c;">													
																<th style="text-align:justify;font-family:sans-serif;background:#b5e61d" >Código</th>
																<td style="text-align:center;"><?= $formaciones[$i]->for_nombre?></td>																
															</tr>
															<tr style="background:#e3e3e3;color:#43273c;">													
																<th style="text-align:justify;font-family:sans-serif;background:#b5e61d" >Carreras</th>
																<td style="text-align:center;"><?= $formaciones[$i]->for_nombre?></td>																
															</tr>
															
															<tr style="background:#e3e3e3;color:#43273c;">													
																<td style="text-align:center;"><?= $formaciones[$i]->for_nombre?></td>																	
																<td style="text-align:center;"><?= $formaciones[$i]->for_descripcion?></td>																	
																<td style="text-align:center;"><?= $formaciones[$i]->for_codigo?></td>																	
																<td style="text-align:center;"><?= $formaciones[$i]->for_carreras?></td>
																		
																<td style="text-align:center;">
																<?php foreach($competenciasformacion as $sf=>$competenciafor){
																		foreach($competencias as $c=>$competencia){
																			if($competencia->cg_codigo==$competenciafor->cg_codigo){
																				echo 'Competencia '.($sf+1).'</br>'.$competencia->cg_nombre.'</br></br>';
																			}
																		}
																	
																	
																}?></td>
																	<?php foreach($seccionesfor as $sf=>$seccionfor){
															echo '<th style="text-align:justify;font-family:sans-serif;" >'.$sf.'</th>																	  															
															<th style="text-align:justify;font-family:sans-serif;" >'.$sf.'</th>																	  															
															<th style="text-align:justify;font-family:sans-serif;" >'.$sf.'</th>																	  															
															<th style="text-align:justify;font-family:sans-serif;" >'.$sf.'</th>';
															 } ?>
															</tr>
														</tbody>
													</table>		
												</div>							
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
					<i class="circle"><img src="images/5.png" alt=""></i>
					<h3><?= $formaciones[$i]->for_nombre?></h3>
					<p><?=substr( $formaciones[$i]->for_descripcion,0,100).'...'?></p>
					<?= Html::a(" Ver Información sobre la Formación", ['#ford'.$formaciones[$i]->for_codigo],[''=>'','style'=>'color:black;background-color:#438eb9;width:100%;margin-right:0px;font-size:13px;font-weight:bold;','data-toggle'=>'modal','data-target'=>'#ford'.$formaciones[$i]->for_codigo]) ?>
					
					
				</div>
			</br></div>
			
			<?php 
			if($verFormaciones==(sizeof($formaciones))){
				echo '</div>
				<div class=" text-center col-sm-12">
				</br></br>
				<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#verfor">Ver Todas</button>
				</br></br>
				</div>';
						
			}
			}} 
			
			for($i=0;$i<sizeof($lineas);$i++){
				if($lineas[$i]->est_lin_codigo==2){ continue; } 
				if($lineas[$i]->sec_codigo==$seccion->sec_codigo){ 
				$talleres=Taller::find()->where('lin_codigo='.$lineas[$i]->lin_codigo)->all();
				$competencialinea=CompetenciaGenerica::find()->where('cg_codigo='.$lineas[$i]->cg_codigo)->one();?>
					<div class="carousel-reviews broun-block" >
						<div class="container">
							<div class="row">
								<div id="carousel-reviews2<?= $lineas[$i]->lin_codigo?>" class="carousel slide" data-ride="carousel" data-interval="false">              
									<ol class="carousel-indicators" style="color:black;">
										<li style="background-color:white;border:1px solid #000;"  data-target="#carousel-reviews2<?= $lineas[$i]->lin_codigo?>" data-slide-to="0" class="active"></li>
										<li style="background-color:white;border:1px solid #000;"  data-target="#carousel-reviews2<?= $lineas[$i]->lin_codigo?>" data-slide-to="1"></li>
										<li style="background-color:white;border:1px solid #000;"  data-target="#carousel-reviews2<?= $lineas[$i]->lin_codigo?>" data-slide-to="2"></li>				
									</ol>
									<?php if(!Yii::$app->user->isGuest){ ?> 
									<?= Html::a(" <i class=' ace-icon fa fa-pencil ' style='font-size:25px;color:black;' data-toggle='tooltip' data-placement='top' title='Editar Linea'></i>", ['#lin'.$lineas[$i]->lin_codigo],[''=>'','style'=>'text-align:center;margin-right: 0px;width:100%;','data-toggle'=>'modal','data-target'=>'#lin'.$lineas[$i]->lin_codigo]) ?>
									<?php } ?>
									<div class="carousel-inner"  style="height:370px;">                    
										<div class="item active">  		 
											<div class="col-sm-12 success-box">						  
												<div class="wow bounceInUp" data-wow-delay="0.1s">													
													<div class="panel panel-primary">
														  
														 <div class="panel-body" style="text-align:center;background-color:#438eb9;height:350px;">
															<h1 class="col-sm-8 pull-left" style="color:#FFDF00;text-align:left;">
																Línea <?= $lineas[$i]->lin_nombre?>
															</h1>		
																
															<div class="col-sm-12"  style="color: white;">		
																<div class="col-sm-6 col-xs-6">		
																	<?= $lineas[$i]->lin_descripcion?>
																</div>	
																<div class="col-sm-6 col-xs-6">
																	<!--<a style="width:284px;" data-toggle="tooltip" data-placement="top" title="Ir" href="line<?= $lineas[$i]->lin_codigo?>">
																	<img src="http://eq42.fdo-may.ubiobio.cl/formacionintegral/images/talleres/INN.P.E.CHILL%C3%81N.png" class="img-responsive" style="height:220px !important;width:auto !important;margin:auto;" />														
																	</a>
																	<img src="http://eq42.fdo-may.ubiobio.cl/formacionintegral/images/talleres/INN.P.E.CHILL%C3%81N.png" class="img-responsive" style="height:220px !important;width:auto !important;margin:auto;" />		-->												
																	<?= Html::a("<img data-toggle='tooltip' data-placement='top' title='Ver Afiche' src='http://eq42.fdo-may.ubiobio.cl/formacionintegral/images/talleres/INN.P.E.CHILL%C3%81N.png' class='img-responsive' style='height:220px !important;width:auto !important;margin:auto;' />", ['#line'.$lineas[$i]->lin_codigo],[''=>'','style'=>'text-align:center;margin-right: 0px;','data-toggle'=>'modal','data-target'=>'#line'.$lineas[$i]->lin_codigo]) ?>

																</div>		
															</div>		
														  </div>		
														</div>	
												
												</div>							
											</div>						  
										</div> 
										<div class="item ">                                                      
											<div class="col-sm-12 success-box">						 
												<div class="wow bounceInUp" data-wow-delay="0.1s">
													<div class="panel panel-primary">
														  <div class="panel-body" style="text-align:center;background-color:#438eb9;height:350px;">
															<h1 class="col-sm-8 pull-left" style="color:#FFDF00;text-align:left;">
																Línea <?= $lineas[$i]->lin_nombre?>
															</h1>		
															<h1 class="col-sm-4 pull-left" style="color:#FFDF00;">
																Objetivos
															</h1>
															<div class="col-sm-3">
																<span class="col-sm-12 badge badge-secondary" style="background-color:#01662c;vertical-align:middle;font-size:20px;color:#c3dacd;border-radius: 7px;">Objetivos</span>																	
															</div>
															<div class="col-sm-9">
																<div class="table-responsive">
																	<table class="table table-bordered ">
																		<thead>	
																			<tr style="background:#b5e61d;">																	
																			<?php foreach($talleres as $t=>$taller){ ?>
																				 <th style="text-align:justify;font-family:sans-serif;" ><?= $taller->tal_nombre?></th>																	  
																			<?php }?>	
																			</tr>																			
																		</thead>
																		  <tbody>
																			<tr style="background:#e3e3e3;color:#43273c;">
																			<?php foreach($talleres as $t=>$taller){ ?>
																				<td style="text-align:center;"><?= $taller->tal_objetivos?></td>
																			<?php }?>	
																				</tr>
																		  </tbody>
																	</table>		
															  </div>														  
														  </div>														  
														  </div>														  
														</div>	
												</div>                             
											</div>                      
										</div> 
										<div class="item ">                                                      
											<div class="col-sm-12 success-box">						 
												<div class="wow bounceInUp" data-wow-delay="0.1s">
													<div class="panel panel-primary">
														  <div class="panel-body" style="text-align:center;background-color:#438eb9;height:350px;">
															<h1 class="col-sm-8 pull-left" style="color:#FFDF00;text-align:left;">
																Línea <?= $lineas[$i]->lin_nombre?>
															</h1>		
															<h1 class="col-sm-4 pull-left" style="color:#FFDF00;">
																Fechas
															</h1>
															<div class="col-sm-12 table-responsive " style="padding-left: 0px;">															
																<table class="table table-bordered ">
																	<thead>																																		
																		<tr style="background:#95b3d7;">
																		  <th style="text-align:center;" scope="col">Competencia</th>
																		  <th style="text-align:center;" scope="col">Talleres</th>
																		  <th style="text-align:center;" scope="col">Docente</th>
																		  <th style="text-align:center;" scope="col">Sede Chillán</th>
																		  <th style="text-align:center;" scope="col">Sede Concepción</th>																		  
																		</tr>																		
																	</thead>
																	  <tbody>
																	  <?php foreach($talleres as $t=>$taller){ ?>
																		<tr style="background:#ffffff;">
																		  <?php
																		  if($t==0){
																		  ?>
																			  <td rowspan="<?=sizeof($talleres)?>" style="vertical-align:middle;text-align:center;font-weight:bold;" scope="row"><?= $competencialinea->cg_nombre?></td>																			  
																		  <?php
																		  }
																		  ?>
																			<td style="text-align:center;"><?= $taller->tal_nombre?></td>
																			<td style="text-align:center;"><?= $taller->tal_docente?></td>
																			<td style="text-align:center;"><?= $taller->tal_fecha?></td>
																			<td style="text-align:center;"><?= $taller->tal_fecha?></td>
																		</tr>
																		<?php }?>																				
																	  </tbody>
																</table>																									  
															</div>		
														  </div>		
												  
														</div>	
												</div>
											</div>                      
										</div>  										
									</div>					
									<a style="background:#fffcfc00;width: 100px;" class="left carousel-control" href="#carousel-reviews2<?= $lineas[$i]->lin_codigo?>" data-slide="prev">
										<span class="glyphicon glyphicon-chevron-left"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a style="background:#fffcfc00;width: 100px;" class="right carousel-control" href="#carousel-reviews2<?= $lineas[$i]->lin_codigo?>" data-slide="next">
										<span class="glyphicon glyphicon-chevron-right"></span>
										<span class="sr-only">Next</span>
									</a>					
								</div>                        
							</div>
						</div>
					</div>					
			<?php }} 
			
			for($i=0;$i<sizeof($lineas);$i++){
				if($lineas[$i]->est_lin_codigo==1){ continue; } 
				if($lineas[$i]->sec_codigo==$seccion->sec_codigo){ 
				$talleres=Taller::find()->where('lin_codigo='.$lineas[$i]->lin_codigo)->all();
				$competencialinea=CompetenciaGenerica::find()->where('cg_codigo='.$lineas[$i]->cg_codigo)->one();
				?>
				</br>inactivas
					<div class="carousel-reviews broun-block" >
						<div class="container">
							<div class="row">
								<div id="carousel-reviews2<?= $lineas[$i]->lin_codigo?>" class="carousel slide" data-ride="carousel" data-interval="false">              
									<ol class="carousel-indicators" style="color:black;">
										<li style="background-color:white;border:1px solid #000;"  data-target="#carousel-reviews2<?= $lineas[$i]->lin_codigo?>" data-slide-to="0" class="active"></li>
										<li style="background-color:white;border:1px solid #000;"  data-target="#carousel-reviews2<?= $lineas[$i]->lin_codigo?>" data-slide-to="1"></li>
										<li style="background-color:white;border:1px solid #000;"  data-target="#carousel-reviews2<?= $lineas[$i]->lin_codigo?>" data-slide-to="2"></li>				
									</ol>
									<?php if(!Yii::$app->user->isGuest){ ?> 
									<?= Html::a(" <i class=' ace-icon fa fa-pencil ' style='font-size:25px;color:black;' data-toggle='tooltip' data-placement='top' title='Editar Linea'></i>", ['#lin'.$lineas[$i]->lin_codigo],[''=>'','style'=>'text-align:center;margin-right: 0px;width:100%;','data-toggle'=>'modal','data-target'=>'#lin'.$lineas[$i]->lin_codigo]) ?>
									<?php } ?>
									<div class="carousel-inner"  style="height:330px;">                    
										<div class="item active">  		 
											<div class="col-sm-12 success-box">						  
												<div class="wow bounceInUp" data-wow-delay="0.1s">													
													<div class="panel panel-primary">
														  
														 <div class="panel-body" style="text-align:center;background-color:#438eb9;height:300px;">
															<h1 style="color:#FFDF00;">
																Línea <?= $lineas[$i]->lin_nombre?>
															</h1>											  
														  </div>
														</div>								
												</div>							
											</div>						  
										</div> 
										<div class="item ">                                                      
											<div class="col-sm-12 success-box">						 
												<div class="wow bounceInUp" data-wow-delay="0.1s">
													<div class="panel panel-primary">
														  <div class="panel-body" style="text-align:center;background-color:#438eb9;height:300px;">
															<h1 style="color:#FFDF00;">
																<?= $lineas[$i]->lin_nombre?>
															</h1>											  
														  </div>
														  
														</div>	
												</div>                             
											</div>                      
										</div> 
										<div class="item ">                                                      
											<div class="col-sm-12 success-box">						 
												<div class="wow bounceInUp" data-wow-delay="0.1s">
													<div class="panel panel-primary">
														  <div class="panel-body" style="text-align:center;background-color:#438eb9;height:300px;">
															<h1 style="color:#FFDF00;">
																Fechas
															</h1>
																	<table class="table table-bordered ">
																	<thead>																																		
																		<tr style="background:#95b3d7;">
																		  <th style="text-align:center;" scope="col">Competencia Genérica</th>
																		  <th style="text-align:center;" scope="col">Talleres</th>
																		  <th style="text-align:center;" scope="col">Docente</th>
																		  <th style="text-align:center;" scope="col">Sede Chillán</th>
																		  <th style="text-align:center;" scope="col">Sede Concepción</th>																		  
																		</tr>																		
																	</thead>
																	  <tbody>
																	  <?php foreach($talleres as $t=>$taller){ ?>
																		<tr style="background:#ffffff;">
																		  <?php
																		  if($t==0){
																		  ?>
																			  <td rowspan="<?=sizeof($talleres)?>" style="vertical-align:middle;text-align:center;font-weight:bold;" scope="row"><?= $competencialinea->cg_nombre?></td>																			  
																		  <?php
																		  }
																		  ?>
																			<td style="text-align:center;"><?= $taller->tal_nombre?></td>
																			<td style="text-align:center;"><?= $taller->tal_docente?></td>
																			<td style="text-align:center;"><?= $taller->tal_fecha?></td>
																			<td style="text-align:center;"><?= $taller->tal_fecha?></td>
																		</tr>
																		<?php }?>																		
																	  </tbody>
																</table>															
														  </div>
														  
														</div>	
												</div>
											</div>                      
										</div>  										
									</div>					
									<a style="background:#fffcfc00;width: 100px;" class="left carousel-control" href="#carousel-reviews2<?= $lineas[$i]->lin_codigo?>" data-slide="prev">
										<span class="glyphicon glyphicon-chevron-left"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a style="background:#fffcfc00;width: 100px;" class="right carousel-control" href="#carousel-reviews2<?= $lineas[$i]->lin_codigo?>" data-slide="next">
										<span class="glyphicon glyphicon-chevron-right"></span>
										<span class="sr-only">Next</span>
									</a>					
								</div>                        
							</div>
						</div>
					</div>				  
			<?php }}   
			
			for($i=0;$i<sizeof($lineas);$i++){
				
					if($lineas[$i]->sec_codigo==$seccion->sec_codigo){ ?>	
						<div id="lin<?= $lineas[$i]->lin_codigo?>" data-backdrop="false" class="modal fade" style="	position: table !important;
																													overflow: auto;
																													background-color: rgb(0,0,0);
																													background-color: rgba(0,0,0,0.4); ">
							<div class="modal-dialog" >
								<div class="modal-content modal-lg">							  
									<div id="modal-wizard-container2">
										<div class="modal-header">
											<h4 class="green">Editando Linea <?= $lineas[$i]->lin_nombre?> <button type="button" class="pull-right close" data-dismiss="modal">&times;</button></h4>
										</div>
										<div class="modal-body ">                                  								  
											<div class="row">
												<div class="col-xs-2 col-sm-6 col-lg-12 perfil-form text-left">															
<?= $this->render('/linea/update', ['model' => $lineas[$i],'id' => $lineas[$i]->lin_codigo]) ?>				
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
						
						<div id="line<?= $lineas[$i]->lin_codigo?>" data-backdrop="false" class="modal fade" style="	position: table !important;
																													overflow: auto;
																													background-color: rgb(0,0,0);
																													background-color: rgba(0,0,0,0.4); ">
							<div class="modal-dialog" >
								<div class="modal-content modal-lg">							  
									<div id="modal-wizard-container2">
										<div class="modal-header">
											<h4 class="green">Afiche Linea de Talleres <?= $lineas[$i]->lin_nombre?> <button type="button" class="pull-right close" data-dismiss="modal">&times;</button></h4>
										</div>
										<div class="modal-body ">                                  								  
											<div class="row">
												<div class=" perfil-form text-left">															
												<img src="http://eq42.fdo-may.ubiobio.cl/formacionintegral/images/talleres/INN.P.E.CHILL%C3%81N.png" class="img-responsive"  />														
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
							
			<?php }} ?> 				
		
	<div class="col-sm-12">
<!--			<a style="background:#438EB9;"  class="btn btn-success btn-block" id="" href="">Ver todas</a> -->
			</div>
	<?php
			for ($i=0;$i<sizeof($diplomados);$i++){
				if($diplomados[$i]->sec_codigo==$seccion->sec_codigo){ ?>				
			<div class="col-md-3 text-center"> 
				<div class="box-item">
	<?php if(!Yii::$app->user->isGuest){ ?>
	<?= Html::a(" <i class=' ace-icon fa fa-pencil' style='font-size:25px;color:black;' data-toggle='tooltip' data-placement='top' title='Editar Diplomado'></i>", ['#dip'.$diplomados[$i]->dip_codigo],[''=>'','style'=>'text-align:end;margin-right: 0px;','data-toggle'=>'modal','data-target'=>'#dip'.$diplomados[$i]->dip_codigo]) ?>
	<?php } ?>
					<div id="dip<?= $diplomados[$i]->dip_codigo?>"  style="position: table !important; overflow: auto; /* Enable scroll if needed */
						background-color: rgb(0,0,0); /* Fallback color */
						background-color: rgba(0,0,0,0.4); /* Black w/ opacity */" data-backdrop="false" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content modal-lg">										  
									<div id="modal-wizard-container3">
										<div class="modal-header">
												<h4 class="green">Editando Diplomado <?= $diplomados[$i]->dip_nombre?> <button type="button" class="pull-right close" data-dismiss="modal">&times;</button></h4> 
										</div>
										<div class="modal-body ">																			  
											<div class="row">
												<div class="col-xs-2 col-sm-6 col-lg-12 perfil-form text-left">
	<?= $this->render('/diplomado/update', ['model' => $diplomados[$i],'id' => $diplomados[$i]->dip_codigo,]) ?>												
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
					<i class="circle"><img src="images/5.png" alt=""></i>
					<h3><?= $diplomados[$i]->dip_nombre?></h3>
					<p><?= substr( $diplomados[$i]->dip_descripcion,0,100).'...'?></p>
				</div>
			</div> 
			<?php if($i==(sizeof($diplomados)-1)){
				echo '<div class="col-sm-12">
						<a style="color:blue; text-align:left; font-size:20px; text-decoration:underline;" href="http://localhost/ufi/web/index.php#2"><p style="color:blue;">
						Ver Todas</p></a>
						</div>';
			}?>
	<?php }}		
	for($i=(sizeof($noticias)-1);$i>=0;$i--){
				if($noticias[$i]->sec_codigo==$seccion->sec_codigo){ 
					//$archivopersona=Archivo::find()->where('arc_codigo=select()')->all();			

				?>
			<div class="col-sm-3 text-center"> 				 
				<div class="box-item">
	<?php if(!Yii::$app->user->isGuest){ ?>
	<?= Html::a(" <i class=' ace-icon fa fa-pencil ' style='font-size:25px;color:black;' data-toggle='tooltip' data-placement='top' title='Editar Noticia'></i>", ['#not'.$noticias[$i]->not_codigo],[''=>'','style'=>'text-align:end;margin-right: 0px;','data-toggle'=>'modal','data-target'=>'#not'.$noticias[$i]->not_codigo]) ?>
	<?php } ?>	
					<div id="not<?= $noticias[$i]->not_codigo?>"  style="position: table !important; overflow: auto; /* Enable scroll if needed */
						background-color: rgb(0,0,0); /* Fallback color */
						background-color: rgba(0,0,0,0.4); /* Black w/ opacity */" data-backdrop="false" class="modal fade">
						<div class="modal-dialog" >
							<div class="modal-content modal-lg">							  
								<div id="modal-wizard-container2">
									<div class="modal-header">
										<h4 class="green">Editando Noticia <?= $noticias[$i]->not_titulo?> <button type="button" class="pull-right close" data-dismiss="modal">&times;</button></h4>
									</div>
									<div class="modal-body ">                                  								  
										<div class="row">
											<div class="col-xs-2 col-sm-6 col-lg-12 perfil-form text-left">
											<?php
											
												
											?>
	<?= $this->render('/noticia/update', ['model' => $noticias[$i],'id' => $noticias[$i]->not_codigo]) ?>										
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

					<h3><?= $noticias[$i]->not_titulo?></h3>
					<img  class="img-responsive"   src="archivos/noticia/DSC_2433-3-768x490.jpg" style="height:250px;" > 
					</br>
					<p><?=substr( $noticias[$i]->not_descripcion,0,100).'...'?></p>
						<a style="color:blue; text-align:left; font-size:15px; text-decoration:underline;" target="_blank" href="<?= $noticias[$i]->not_enlace?>"><p style="color:blue;"><?= substr( $noticias[$i]->not_enlace,0,30).'...'?></p></a>
				</div>
			</div>
			<?php if($i==0){
				echo '<div class="col-sm-12">
						<a style="color:blue; text-align:left; font-size:20px; text-decoration:underline;" href="http://localhost/ufi/web/index.php#2"><p style="color:blue;">
						Ver Todas</p></a>
						</div>';
			}?>
	<?php }} 
		for($i=0;$i<sizeof($personal);$i++){
			if($personal[$i]->sec_codigo==$seccion->sec_codigo){ 
				$archivopersona=Archivo::find()->where('arc_codigo='.$personal[$i]->arc_codigo)->one(); ?>				
			<div class="col-md-2 col-sm-2 col-xs-6"> 
	<?php if(!Yii::$app->user->isGuest){ ?>
	<?= Html::a(" <i class=' ace-icon fa fa-pencil' style='font-size:25px;color:black;' data-toggle='tooltip' data-placement='top' title='Editar Contacto'></i>", ['#pers'.$personal[$i]->pers_codigo],[''=>'','style'=>'text-align:end;margin-right:0px;width:100px;','data-toggle'=>'modal','data-target'=>'#pers'.$personal[$i]->pers_codigo]) ?>
	<?php } ?>
				<div id="pers<?= $personal[$i]->pers_codigo?>"  style="position: table !important; overflow: auto; /* Enable scroll if needed */
					background-color: rgb(0,0,0); /* Fallback color */
					background-color: rgba(0,0,0,0.4); /* Black w/ opacity */" data-backdrop="false" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content modal-lg">
								<div id="modal-wizard-container4">
									<div class="modal-header">
										<h4 class="green">Editando Contacto <?= $personal[$i]->pers_nombre?> <button type="button" class="pull-right close" data-dismiss="modal">&times;</button></h4> 
									</div>
									<div class="modal-body ">																			  
										<div class="row">
											<div class="col-xs-2 col-sm-6 col-lg-12 perfil-form text-left">
	<?= $this->render('/personal/update', ['model' => $personal[$i],'id' => $personal[$i]->pers_codigo,]) ?>
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
				<div class="team-member pDark"> 
					<div class="member-img"> 
						<img class="img-responsive" src="archivos/personal/<?=$archivopersona->arc_nombre.'.'.$archivopersona->arc_extension?>" style="height:250px;" > 
					</div>
	<?php 	if(!Yii::$app->user->isGuest){ ?>
					<a style="color:black;background:#ffffff;width: 164px;line-height:15px;margin-left:4px;"href="#foto-personal<?= $personal[$i]->pers_codigo?>"  data-target="#foto-personal<?= $personal[$i]->pers_codigo?>" data-toggle="modal" class="btn btn-green">Cambiar Foto</a>
					<div id="foto-personal<?= $personal[$i]->pers_codigo?>"  style="position: table !important; overflow: auto; /* Enable scroll if needed */
						background-color: rgb(0,0,0); /* Fallback color */
						background-color: rgba(0,0,0,0.4); /* Black w/ opacity */" data-backdrop="false" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content modal-lg">
								<div>
									<div class="modal-header">
										<h4 class="green">Editando Fotografía de <?= $personal[$i]->pers_nombre?> <button type="button" class="pull-right close" data-dismiss="modal">&times;</button></h4> 
									</div>
									<div class="modal-body ">																  
										<div class="row">
											<div class="col-xs-2 col-sm-6 col-lg-12 perfil-form text-left">
	<?= $this->render('/personal/updatefile', ['file' => new UploadForm(),'id'=> $archivopersona->arc_codigo,'archivo' => $archivopersona,]) ?>
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
	<?php } ?>
					<div class="team-title">
						<h4 style="color:#438eb9 "><b><?= $personal[$i]->pers_nombre?></b></h4>
						<span class="pos" style="font-style:italic;"><?= $personal[$i]->pers_cargo?></span>
						<a  style="color:#438eb9; text-align:left; font-size:15px; text-decoration:underline;"  data-toggle="tooltip" data-placement="top" title="Enviar Correo" href="mailto:<?= $personal[$i]->pers_correo?>"><?= $personal[$i]->pers_correo?></a>
						<span class="pos"><?= $personal[$i]->pers_telefono?></span>
								<section id="#abajo"></section>

					</div>
						<!--<div class="team-socials"> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-google-plus"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-dribbble"></i></a> <a href="#"><i class="fa fa-github"></i></a> </div>-->
				</div>
			</div>
	<?php }} ?>
		</div>
	</div>
</section>

<?php } ?>

<?php if($colorback%2){ 
	echo '<section id="sec-'.$seccion->sec_orden.'" style="padding-top: 50px;background-color:#b0d0db;">';
	}else{
		echo '<section id="sec-'.$seccion->sec_orden.'" style="padding-top: 50px;">';
	} ?>
<div class="parlex-back">
    <div class="container">
      <div class="row">
        <div class="heading text-center"> 
          <h2>Contáctanos</h2>
          <p>Si tienes alguna duda o comentario, envianos un mensaje</p>
        </div>
      </div>
      <div class="row mrgn30">		
		<?php 		
			$modelCON=new Contacto(); 
			echo $this->render('/contacto/create', ['model' => $modelCON,]);		
		?>				
      </div>
    </div>
  </div>
</section>


					
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

    function vermas() {
    var eldiv =document.getElementById("vermasdiv");
    eldiv.style.display="block"; }
 
	$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
 

 
</script>