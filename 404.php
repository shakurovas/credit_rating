<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

use \Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");?>

<main class="p-404">
	<h1 class="title-404">404</h1>
	<h3 class="subtitle-404"><?=Loc::getMessage('PAGE_IS_NOT_FOUND');?></h3>
	<div class="p-404__btn-wrap">
		<a href="/" class="p-404__btn"><?=Loc::getMessage('BACK_TO_MAIN');?></a>
	</div>
</main>


<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>