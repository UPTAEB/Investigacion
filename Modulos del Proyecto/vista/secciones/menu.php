<?php session_start(); ?>
<?php if (!$_SESSION)
{
$nombre="Iniciar Sesi&oacute;n";
$url="/?action=sesion";
}
else
{
$nombre="Mi Perfil";
$url="/?controller=front&action=perfil&id_action=1";
}
?>


<div class="container">
			<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">
								<li class="gn-search-item">
									<input placeholder="Buscar" type="text" class="gn-search">
									<a class="gn-icon gn-icon-search"><span>Buscar</span></a>								</li>
								<li>
									<a href="<?php echo $url; ?>" class="gn-icon gn-icon-download"><?php echo $nombre; ?></a>								</li>
								<li><a href="/?action=info" class="gn-icon gn-icon-help">Quienes Somos</a></li>
								<li>
									<a href="/?action=contactos" class="gn-icon gn-icon-archive">Contactanos</a>								</li>
									<li>
									 							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<li><a href="/"><img src="vista/recursos/img/orquidea2.jpg" width="35" height="35" />Orquidea</a></li>
				<li class="hidden-xs">
                    <ul class="company-social">
                        <li class="social-facebook"><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li class="social-twitter"><a href="https://www.twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    </ul>	
                </li>
			</ul>
</div>