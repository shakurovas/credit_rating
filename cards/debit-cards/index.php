<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Дебетовые карты");

use \Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
?>

<main>
    <section class="container">
        <div class="section-content">
                <nav class="desktop-category-nav mb-6">
                    <a href="/cards/debit-cards/" class="text-1 link active"><?=Loc::getMessage('DEBIT_CARDS_TITLE');?></a>
                    <a href="/cards/credit-cards/" class="text-1 link"><?=Loc::getMessage('CREDIT_CARDS_TITLE');?></a>
                </nav>

                
                <?php
                $APPLICATION->IncludeComponent(
	"bitrix:catalog.filter", 
	"debit_cards_filter", 
	array(
		"IBLOCK_TYPE" => "bank_products",
		"IBLOCK_ID" => "9",
		"FILTER_NAME" => "arrFilter",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "BANK",
			1 => "CARD_CATEGORY",
			2 => "CARD_FEATURES",
			3 => "PAYMENT_SYSTEM",
			4 => "GETTING_METHOD",
			5 => "SERVICE_COST",
			6 => "BONUS_TYPE",
			7 => "",
		),
		"OFFERS_FIELD_CODE" => "",
		"OFFERS_PROPERTY_CODE" => "",
		"PRICE_CODE" => array(
		),
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"LIST_HEIGHT" => "5",
		"TEXT_WIDTH" => "20",
		"NUMBER_WIDTH" => "5",
		"SAVE_IN_SESSION" => "N",
		"PREFILTER_NAME" => "preFilter",
		"PAGER_PARAMS_NAME" => "arrPager",
		"COMPONENT_TEMPLATE" => "debit_cards_filter"
	),
	false
);
?>
<?php
    $GLOBALS['arrFilter']["SECTION_CODE"] = 'debit_cards';
	$GLOBALS['arrFilter']['PROPERTY']['=PAYMENT_SYSTEM'] = $_GET['arrFilter_pf']['PAYMENT_SYSTEM'];
    $GLOBALS['arrFilter']['PROPERTY']['=BANK'] = $_GET['arrFilter_pf']['BANK'];
    $GLOBALS['arrFilter']['PROPERTY']['=CARD_CATEGORY'] = $_GET['arrFilter_pf']['CARD_CATEGORY'];
    $GLOBALS['arrFilter']['PROPERTY']['=CARD_FEATURES'] = $_GET['arrFilter_pf']['CARD_FEATURES'];
	$GLOBALS['arrFilter']['PROPERTY']['=BONUS_TYPE'] = $_GET['arrFilter_pf']['BONUS_TYPE'];
?>

                <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"debit_cards", 
	array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "Y",
		"IBLOCK_TYPE" => "bank_products",
		"IBLOCK_ID" => "9",
		"NEWS_COUNT" => "5",
		"SORT_BY1" => (isset($_GET["sort_by"])&&!empty($_GET["sort_by"]))?$_GET["sort_by"]:"SORT",
		"SORT_ORDER1" => (isset($_GET["order"])&&!empty($_GET["order"]))?$_GET["order"]:"DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "arrFilter",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "BONUS_PERCENT",
			1 => "AFFILIATE_LINK",
			2 => "IS_ACTION_NOW",
			3 => "SERVICE_RATING",
			4 => "SERVICE_COST",
			5 => "OPENING_RATE",
			6 => "BONUS_TYPE",
			7 => "",
			8 => "",
			9 => "",
			10 => "",
			11 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_LAST_MODIFIED" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
		"PARENT_SECTION" => "5",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"DISPLAY_TOP_PAGER" => "Y",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Дебетовые карты",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "show_more",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"PAGER_BASE_LINK_ENABLE" => "Y",
		"SET_STATUS_404" => "Y",
		"SHOW_404" => "Y",
		"MESSAGE_404" => "",
		"PAGER_BASE_LINK" => "/cards/debit-cards/index.php",
		"PAGER_PARAMS_NAME" => "arrPager",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "debit_cards",
		"STRICT_SECTION_CHECK" => "N",
		"FILE_404" => ""
	),
	false
);?>
        </div>
    </section>

    <section class="container">
        <div class="section-content">

            <h2 class="title mb-4 mb-lg-6"><?=Loc::getMessage('POPULAR_BANKS');?></h2>


            <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"banks", 
	array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "Y",
		"IBLOCK_TYPE" => "banks",
		"IBLOCK_ID" => "12",
		"NEWS_COUNT" => "3",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "WITHOUT_BANK_VISITING",
			1 => "HAS_HOLDINGS_SERVICE",
			2 => "HAS_HYPOTHECS_SERVICE",
			3 => "LICENSE",
			4 => "AFFILIATE_LINK",
			5 => "THE_FIRST_LOAN_WITHOUT_PERCENT",
			6 => "K5M_RATING",
			7 => "SERVICE_RATING",
			8 => "IS_FROM_18",
			9 => "CAN_BE_APPROVED_WHEN_BAD_HISTORY",
			10 => "IS_ALWAYS_APPROVED",
			11 => "TERM_FROM_3_YEARS",
			12 => "PHONE",
			13 => "TERM",
			14 => "RATE",
			15 => "SUM",
			16 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_LAST_MODIFIED" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"DISPLAY_TOP_PAGER" => "Y",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Банки",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "show_more_banks",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"PAGER_BASE_LINK_ENABLE" => "Y",
		"SET_STATUS_404" => "Y",
		"SHOW_404" => "Y",
		"MESSAGE_404" => "",
		"PAGER_BASE_LINK" => "/cards/debit-cards/index.php",
		"PAGER_PARAMS_NAME" => "arrPager",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "banks",
		"STRICT_SECTION_CHECK" => "N",
		"FILE_404" => ""
	),
	false
);?>
            
        </div>
    </section>
</main>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
