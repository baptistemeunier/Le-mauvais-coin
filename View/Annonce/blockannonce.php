<?php
/**
 * @var Int $k L'index de l'anonce dans le tableau d'annonce
 * @var Annonce $annonce L'annonce à afficher
 **/
if($k%2 == 0): ?>
<div class="grille">
	<div class="collone collone-1"></div>
<?php endif; ?>
	<div class="collone collone-4">
		<article>
			<header>
				<h2><a href="<?= $this->getUrl('view_annonce', ['id' => $annonce->getId()]) ?>"><?= $annonce->getTitreFormat() ?></a></h2>
			</header>
			<div style="
			margin-top: 20px;
			margin-left: 10%;
			width: 80%;
			height: 100px;
			background-color: #B2B2B2">
			</div>
			<p class="info">
				<?= $annonce->getVille() ?>
				<span class="prix"><?= $annonce->getPrixFormat() ?></span>
			</p>
			<footer>
				<p>
					<a href="?page=search/categories&cat=<?= ($annonce->getCategorieId())?$annonce->getCategorieId():"0" ?>"> <?= $annonce->getCategorieFormat() ?> </a>
					<span style="float: right;"><?= $annonce->getDateFormat() ?></span>
				</p>
			</footer>
		</article>
	</div>
	<div class="collone collone-1"></div>
<?php if($k%2 == 1): ?>
</div>
<?php endif; ?>
