<?php
/**  @var Annonce $annonce **/
?>

<article class="block-annonce">
	<img alt="Photo <?= $annonce->getTitreFormat() ?>" src="<?= ROOT_RELATIVE ?>/img/empty.png">
	<div class="annonce-body">
		<h3><a href="<?= $this->getUrl('view_annonce', ['id' => $annonce->getId()]) ?>"><?= $annonce->getTitreFormat() ?></a></h3>
		<p><?= $annonce->getDescriptionFormat() ?></p>
	</div>
	<ul class="info">
		<li><i class="icons icons-categorie"></i> <a href="<?= $this->getUrl('view_categorie', ['id' => (($annonce->getCategorieId())?$annonce->getCategorieId():"0")]) ?>"> <?= $annonce->getCategorieFormat() ?> </a></li>
		<li><i class="icons icons-city"></i> <?= $annonce->getVille() ?></li>
		<li><i class="icons icons-euro"></i> <strong> <?= $annonce->getPrixFormat() ?></strong></li>
		<li><i class="icons icons-calendar"></i> <?= $annonce->getDateFormat() ?></li>
	</ul>
</article>