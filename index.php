<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Кредитный рейтинг 2023");

use \Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

global $arrFilter;
// $arrFilter = array(/*параметры для фильтрации*/);


// echo '<pre>';
// print_r($_GET);
// echo '</pre>';

?>

<main>

    <section class="container">
        <div class="section-content">
                <h1 class="title index-title mb-4"><?=$APPLICATION->ShowTitle();?></h1>
              
                <?php
                $APPLICATION->IncludeComponent(
	"bitrix:catalog.filter", 
	"loans_filter", 
	array(
		"IBLOCK_TYPE" => "bank_products",
		"IBLOCK_ID" => "7",
		"FILTER_NAME" => "arrFilter",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "ADDITIONAL_TERMS",
			1 => "HAS_CREDIT_HISTORY",
			2 => "DEBTOR_CATEGORY",
			3 => "THE_FIRST_LOAN_WITHOUT_PERCENT",
			4 => "CAN_BE_APPROVED_WHEN_BAD_HISTORY",
			5 => "GETTING_METHOD",
			6 => "TERM",
			7 => "SUM",
			8 => "DOCUMENTS",
			9 => "",
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
		"COMPONENT_TEMPLATE" => "loans_filter"
	),
	false
);
?>
<?php     
    $GLOBALS['arrFilter']['PROPERTY']['=DEBTOR_CATEGORY'] = $_GET['arrFilter_pf']['DEBTOR_CATEGORY'];
    $GLOBALS['arrFilter']['PROPERTY']['=GETTING_METHOD'] = $_GET['arrFilter_pf']['GETTING_METHOD'];
    $GLOBALS['arrFilter']['PROPERTY']['=DOCUMENTS'] = $_GET['arrFilter_pf']['DOCUMENTS'];
    $GLOBALS['arrFilter']['PROPERTY']['=ADDITIONAL_TERMS'] = $_GET['arrFilter_pf']['ADDITIONAL_TERMS'];
    $GLOBALS['arrFilter']['PROPERTY']['=HAS_CREDIT_HISTORY'] = $_GET['arrFilter_pf']['HAS_CREDIT_HISTORY'];
// echo '<pre>';
// print_r($arrFilter);
// echo '</pre>';

// echo '<pre>';
// print_r($_GET);
// echo '</pre>';
?>
            <!-- <div class="my-sort-container mb-6">
                <div class="my-sort" data-default="<?//=Loc::getMessage('SORT');?>">
                    <div class="my-sort__outer-box">
                        <div class="my-sort__current-value"></div>
                        <div class="my-sort__icon">
                            <img src="<?//=SITE_TEMPLATE_PATH;?>/img/icons/sort.svg" alt="">
                        </div>
                    </div>
                    <div class="my-sort__droplist">
                    
                        <label for="popularity"><input <?//if ($_GET["sort_by"] == "PROPERTY_SERVICE_RATING") echo 'checked';?> type="radio" name="sort" id="popularity" value="<?//=Loc::getMessage('BY_POPULARITY');?>"> <?//=Loc::getMessage('BY_POPULARITY');?></label>
                        <label for="rate"><input <?//if ($_GET["sort_by"] == "PROPERTY_RATE") echo 'checked';?> type="radio" name="sort" id="rate" value="<?//=Loc::getMessage('BY_RATE');?>"> <?//=Loc::getMessage('BY_RATE');?></label>
                        <label for="sum"><input <?//if ($_GET["sort_by"] == "PROPERTY_SUM") echo 'checked';?> type="radio" name="sort" id="sum" value="<?//=Loc::getMessage('BY_SUM');?>"> <?//=Loc::getMessage('BY_SUM');?></label>                                
                    </div>
                </div>
            </div> -->


            <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"loans", 
	array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "Y",
		"IBLOCK_TYPE" => "bank_products",
		"IBLOCK_ID" => "7",
		"NEWS_COUNT" => "12",
		"SORT_BY1" => (isset($_GET["sort_by"])&&!empty($_GET["sort_by"]))?$_GET["sort_by"]:"SORT",
		"SORT_ORDER1" => (isset($_GET["order"])&&!empty($_GET["order"]))?$_GET["order"]:"DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "arrFilter",
		"FIELD_CODE" => array(
			0 => "PREVIEW_PICTURE",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "IS_SECTION_PARTNER",
			1 => "AFFILIATE_LINK",
			2 => "SERVICE_RATING",
			3 => "SERVICE",
			4 => "TERM",
			5 => "RATE",
			6 => "SUM",
			7 => "",
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
		"PAGER_TITLE" => "Займы",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "show_more",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"PAGER_BASE_LINK_ENABLE" => "Y",
		"SET_STATUS_404" => "Y",
		"SHOW_404" => "Y",
		"MESSAGE_404" => "",
		"PAGER_BASE_LINK" => "",
		"PAGER_PARAMS_NAME" => "arrPager",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "loans",
		"STRICT_SECTION_CHECK" => "N",
		"FILE_404" => ""
	),
	false
);?>

        </div>
    </section>

    <section class="container slider-container">
        <div class="section-content">

            <h2 class="title mb-4"><?=$APPLICATION->ShowTitle();?></h2>


            <div class="scrolling-tabs top" data-sheets-container="#sheets-container-1">
                <div class="scrolling-tabs-wrapper ">
                    <button class="scrolling-tab" data-target="#sheet-1"><?=Loc::getMessage('CREDITS');?></button>
                    <button class="scrolling-tab" data-target="#sheet-2"><?=Loc::getMessage('CREDIT_CARDS');?></button>
                    <button class="scrolling-tab" data-target="#sheet-3"><?=Loc::getMessage('DEBIT_CARDS');?></button>
                    <button class="scrolling-tab" data-target="#sheet-4"><?=Loc::getMessage('CAR_CREDIT');?></button>
                    <button class="scrolling-tab" data-target="#sheet-5"><?=Loc::getMessage('HYPOTHEC');?></button>
                    <button class="scrolling-tab" data-target="#sheet-6"><?=Loc::getMessage('DEPOSITS');?></button>
                    
                </div>
            </div>
    
            <div id="sheets-container-1" class="rating-sheets">
                <div class="s-sheet active" id="sheet-1">
                    <?php
                    $APPLICATION->IncludeComponent(
                        "bitrix:news.list", 
                        "ratings_tabs", 
                        array(
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "Y",
                            "DISPLAY_PREVIEW_TEXT" => "Y",
                            "AJAX_MODE" => "Y",
                            "IBLOCK_TYPE" => "bank_products",
                            "IBLOCK_ID" => "8",
                            "NEWS_COUNT" => "4",
                            "SORT_BY1" => "PROPERTY_SERVICE_RATING",
                            "SORT_ORDER1" => "DESC",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER2" => "ASC",
                            "FILTER_NAME" => "",
                            "FIELD_CODE" => array(
                                0 => "PREVIEW_PICTURE",
                                1 => "",
                            ),
                            "PROPERTY_CODE" => array(
                                0 => "",
                                1 => "",
                                2 => "AFFILIATE_LINK",
                                3 => "SERVICE_RATING",
                                4 => "SERVICE",
                                5 => "TERM",
                                6 => "RATE",
                                7 => "SUM",
                                8 => "",
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
                            "PAGER_TITLE" => "",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => "",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "Y",
                            "PAGER_BASE_LINK_ENABLE" => "Y",
                            "SET_STATUS_404" => "Y",
                            "SHOW_404" => "Y",
                            "MESSAGE_404" => "",
                            "PAGER_BASE_LINK" => "",
                            "PAGER_PARAMS_NAME" => "arrPager",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "COMPONENT_TEMPLATE" => "ratings_tabs",
                            "STRICT_SECTION_CHECK" => "N",
                            "FILE_404" => ""
                        ),
                        false
                    );?>
                </div>
                <div class="s-sheet " id="sheet-2">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.list", 
                        "ratings_tabs", 
                        array(
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "Y",
                            "DISPLAY_PREVIEW_TEXT" => "Y",
                            "AJAX_MODE" => "Y",
                            "IBLOCK_TYPE" => "bank_products",
                            "IBLOCK_ID" => "9",
                            "NEWS_COUNT" => "4",
                            "SORT_BY1" => "PROPERTY_SERVICE_RATING",
                            "SORT_ORDER1" => "DESC",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER2" => "ASC",
                            "FILTER_NAME" => "",
                            "FIELD_CODE" => array(
                                0 => "PREVIEW_PICTURE",
                                1 => "",
                            ),
                            "PROPERTY_CODE" => array(
                                0 => "",
                                1 => "",
                                2 => "AFFILIATE_LINK",
                                3 => "SERVICE_RATING",
                                4 => "SERVICE",
                                5 => "TERM",
                                6 => "RATE",
                                7 => "SUM",
                                8 => "",
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
                            "PARENT_SECTION" => "6",
                            "PARENT_SECTION_CODE" => "",
                            "INCLUDE_SUBSECTIONS" => "Y",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "3600",
                            "CACHE_FILTER" => "Y",
                            "CACHE_GROUPS" => "Y",
                            "DISPLAY_TOP_PAGER" => "Y",
                            "DISPLAY_BOTTOM_PAGER" => "Y",
                            "PAGER_TITLE" => "",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => "",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "Y",
                            "PAGER_BASE_LINK_ENABLE" => "Y",
                            "SET_STATUS_404" => "Y",
                            "SHOW_404" => "Y",
                            "MESSAGE_404" => "",
                            "PAGER_BASE_LINK" => "",
                            "PAGER_PARAMS_NAME" => "arrPager",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "COMPONENT_TEMPLATE" => "ratings_tabs",
                            "STRICT_SECTION_CHECK" => "N",
                            "FILE_404" => ""
                        ),
                        false
                    );?>
                </div>
                <div class="s-sheet " id="sheet-3">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.list", 
                        "ratings_tabs", 
                        array(
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "Y",
                            "DISPLAY_PREVIEW_TEXT" => "Y",
                            "AJAX_MODE" => "Y",
                            "IBLOCK_TYPE" => "bank_products",
                            "IBLOCK_ID" => "9",
                            "NEWS_COUNT" => "4",
                            "SORT_BY1" => "PROPERTY_SERVICE_RATING",
                            "SORT_ORDER1" => "DESC",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER2" => "ASC",
                            "FILTER_NAME" => "",
                            "FIELD_CODE" => array(
                                0 => "PREVIEW_PICTURE",
                                1 => "",
                            ),
                            "PROPERTY_CODE" => array(
                                0 => "",
                                1 => "",
                                2 => "AFFILIATE_LINK",
                                3 => "SERVICE_RATING",
                                4 => "SERVICE",
                                5 => "TERM",
                                6 => "RATE",
                                7 => "SUM",
                                8 => "",
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
                            "PAGER_TITLE" => "",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => "",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "Y",
                            "PAGER_BASE_LINK_ENABLE" => "Y",
                            "SET_STATUS_404" => "Y",
                            "SHOW_404" => "Y",
                            "MESSAGE_404" => "",
                            "PAGER_BASE_LINK" => "",
                            "PAGER_PARAMS_NAME" => "arrPager",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "COMPONENT_TEMPLATE" => "ratings_tabs",
                            "STRICT_SECTION_CHECK" => "N",
                            "FILE_404" => ""
                        ),
                        false
                    );?>
                </div>
                <div class="s-sheet " id="sheet-4">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.list", 
                        "ratings_tabs", 
                        array(
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "Y",
                            "DISPLAY_PREVIEW_TEXT" => "Y",
                            "AJAX_MODE" => "Y",
                            "IBLOCK_TYPE" => "bank_products",
                            "IBLOCK_ID" => "8",
                            "NEWS_COUNT" => "4",
                            "SORT_BY1" => "PROPERTY_SERVICE_RATING",
                            "SORT_ORDER1" => "DESC",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER2" => "ASC",
                            "FILTER_NAME" => "",
                            "FIELD_CODE" => array(
                                0 => "PREVIEW_PICTURE",
                                1 => "",
                            ),
                            "PROPERTY_CODE" => array(
                                0 => "",
                                1 => "",
                                2 => "AFFILIATE_LINK",
                                3 => "SERVICE_RATING",
                                4 => "SERVICE",
                                5 => "TERM",
                                6 => "RATE",
                                7 => "SUM",
                                8 => "",
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
                            "PARENT_SECTION" => "8",
                            "PARENT_SECTION_CODE" => "",
                            "INCLUDE_SUBSECTIONS" => "Y",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "3600",
                            "CACHE_FILTER" => "Y",
                            "CACHE_GROUPS" => "Y",
                            "DISPLAY_TOP_PAGER" => "Y",
                            "DISPLAY_BOTTOM_PAGER" => "Y",
                            "PAGER_TITLE" => "",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => "",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "Y",
                            "PAGER_BASE_LINK_ENABLE" => "Y",
                            "SET_STATUS_404" => "Y",
                            "SHOW_404" => "Y",
                            "MESSAGE_404" => "",
                            "PAGER_BASE_LINK" => "",
                            "PAGER_PARAMS_NAME" => "arrPager",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "COMPONENT_TEMPLATE" => "ratings_tabs",
                            "STRICT_SECTION_CHECK" => "N",
                            "FILE_404" => ""
                        ),
                        false
                    );?>
                </div>
                <div class="s-sheet" id="sheet-5">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.list", 
                        "ratings_tabs", 
                        array(
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "Y",
                            "DISPLAY_PREVIEW_TEXT" => "Y",
                            "AJAX_MODE" => "Y",
                            "IBLOCK_TYPE" => "bank_products",
                            "IBLOCK_ID" => "10",
                            "NEWS_COUNT" => "4",
                            "SORT_BY1" => "PROPERTY_SERVICE_RATING",
                            "SORT_ORDER1" => "DESC",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER2" => "ASC",
                            "FILTER_NAME" => "",
                            "FIELD_CODE" => array(
                                0 => "PREVIEW_PICTURE",
                                1 => "",
                            ),
                            "PROPERTY_CODE" => array(
                                0 => "",
                                1 => "",
                                2 => "AFFILIATE_LINK",
                                3 => "SERVICE_RATING",
                                4 => "SERVICE",
                                5 => "TERM",
                                6 => "RATE",
                                7 => "SUM",
                                8 => "",
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
                            "PAGER_TITLE" => "",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => "",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "Y",
                            "PAGER_BASE_LINK_ENABLE" => "Y",
                            "SET_STATUS_404" => "Y",
                            "SHOW_404" => "Y",
                            "MESSAGE_404" => "",
                            "PAGER_BASE_LINK" => "",
                            "PAGER_PARAMS_NAME" => "arrPager",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "COMPONENT_TEMPLATE" => "ratings_tabs",
                            "STRICT_SECTION_CHECK" => "N",
                            "FILE_404" => ""
                        ),
                        false
                    );?>
                </div>
                <div class="s-sheet" id="sheet-6">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.list", 
                        "ratings_tabs", 
                        array(
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "Y",
                            "DISPLAY_PREVIEW_TEXT" => "Y",
                            "AJAX_MODE" => "Y",
                            "IBLOCK_TYPE" => "bank_products",
                            "IBLOCK_ID" => "11",
                            "NEWS_COUNT" => "4",
                            "SORT_BY1" => "PROPERTY_SERVICE_RATING",
                            "SORT_ORDER1" => "DESC",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER2" => "ASC",
                            "FILTER_NAME" => "",
                            "FIELD_CODE" => array(
                                0 => "PREVIEW_PICTURE",
                                1 => "",
                            ),
                            "PROPERTY_CODE" => array(
                                0 => "",
                                1 => "",
                                2 => "AFFILIATE_LINK",
                                3 => "SERVICE_RATING",
                                4 => "SERVICE",
                                5 => "TERM",
                                6 => "RATE",
                                7 => "SUM",
                                8 => "",
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
                            "PAGER_TITLE" => "",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => "",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "Y",
                            "PAGER_BASE_LINK_ENABLE" => "Y",
                            "SET_STATUS_404" => "Y",
                            "SHOW_404" => "Y",
                            "MESSAGE_404" => "",
                            "PAGER_BASE_LINK" => "",
                            "PAGER_PARAMS_NAME" => "arrPager",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "COMPONENT_TEMPLATE" => "ratings_tabs",
                            "STRICT_SECTION_CHECK" => "N",
                            "FILE_404" => ""
                        ),
                        false
                    );?>
                </div>
                
            </div>
        </div>
    </section>

    <section class="container">
        <div class="section-content">
            <h2 class="title mb-2 mb-md-5"><?=Loc::getMessage('ABOUT_COMPANY');?></h2>

            <div class="bg-white b-radius px-4 py-4">
                <p class="text-3 mb-3 mb-md-5">
                <?php $APPLICATION->IncludeComponent(
                        "bitrix:main.include", 
                        ".default", 
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "AREA_FILE_RECURSIVE" => "Y",
                            "EDIT_TEMPLATE" => "",
                            "COMPONENT_TEMPLATE" => ".default",
                            "PATH" => "/include/about_company_text_main.php"
                        ),
                        false
                    );?>
                </p>

                <div class="contacts-block">
                    <a href="tel: <?php $APPLICATION->IncludeComponent(
                            "bitrix:main.include", 
                            ".default", 
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "AREA_FILE_RECURSIVE" => "Y",
                                "EDIT_TEMPLATE" => "",
                                "COMPONENT_TEMPLATE" => ".default",
                                "PATH" => "/include/phone.php"
                            ),
                            false
                        );?>" class="contacts-block__link">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.3228 4.10022C18.486 3.92279 19.677 3.98092 20.8226 4.27487L20.8226 4.27487C22.3372 4.66348 23.7716 5.46417 24.9542 6.67429L24.3015 7.34218L24.9542 6.67429C26.1368 7.8844 26.9194 9.35219 27.2991 10.902C27.5864 12.0743 27.6432 13.2929 27.4698 14.4832C27.3946 14.9992 26.9249 15.3551 26.4207 15.2782C25.9165 15.2013 25.5687 14.7206 25.6438 14.2047C25.7816 13.2593 25.7363 12.2915 25.5084 11.3615L25.5084 11.3615C25.2077 10.1341 24.5886 8.97178 23.6488 8.01008C22.7089 7.04839 21.573 6.41499 20.3736 6.10723C19.4647 5.87402 18.5188 5.82775 17.5949 5.96866C17.0907 6.04557 16.621 5.68966 16.5459 5.1737C16.4707 4.65774 16.8185 4.17713 17.3228 4.10022Z" fill="#636775"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5508 8.60742C18.9456 8.39466 20.4215 8.83774 21.4977 9.93886L21.4977 9.93888C22.5739 11.0401 23.0068 12.5504 22.7989 13.9776C22.7237 14.4936 22.254 14.8495 21.7498 14.7726C21.2456 14.6957 20.8977 14.2151 20.9729 13.6991C21.0983 12.8385 20.8373 11.9346 20.1923 11.2747C20.1923 11.2747 20.1923 11.2747 20.1923 11.2747M20.1923 11.2747C19.5473 10.6147 18.664 10.3476 17.823 10.4759C17.3187 10.5528 16.8491 10.1969 16.7739 9.68091C16.6987 9.16495 17.0465 8.68433 17.5508 8.60742" fill="#636775"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.27777 7.85003C6.26488 7.85003 5.63307 8.77875 5.92242 9.65625C6.95991 12.8025 8.89327 17.5356 11.7766 20.4859L11.7766 20.486C14.6598 23.4363 19.2854 25.4146 22.3601 26.4762L22.3602 26.4762C23.2177 26.7723 24.1253 26.1259 24.1253 25.0894V21.8946C24.1253 21.7803 24.0648 21.675 23.9672 21.6195L23.9671 21.6194L21.2476 20.0723C21.1588 20.0218 21.0513 20.0194 20.9605 20.0659L20.9604 20.0659L18.0602 21.5497C17.8788 21.6425 17.6726 21.6716 17.4735 21.6325L17.6474 20.7049C17.4735 21.6325 17.4732 21.6324 17.4729 21.6324L17.4723 21.6323L17.4708 21.632L17.4674 21.6313L17.4581 21.6294L17.4303 21.6235C17.4077 21.6185 17.3771 21.6116 17.3391 21.6024C17.2632 21.5841 17.1576 21.5566 17.0274 21.5182C16.7675 21.4414 16.4073 21.32 15.9888 21.1375C15.1553 20.774 14.0673 20.1584 13.082 19.1502L13.082 19.1502C12.0968 18.1421 11.4935 17.0272 11.1366 16.1731C10.9574 15.7441 10.8378 15.3749 10.7621 15.1085C10.7242 14.9751 10.6972 14.8669 10.679 14.7891C10.6699 14.7502 10.6631 14.7188 10.6582 14.6957L10.6523 14.6672L10.6505 14.6578L10.6498 14.6542L10.6495 14.6528L10.6494 14.6521C10.6493 14.6518 10.6493 14.6515 11.5554 14.4712L10.6493 14.6515C10.6104 14.447 10.6387 14.2351 10.7297 14.0488L12.1801 11.0806L12.1801 11.0806C12.2255 10.9877 12.2232 10.8779 12.1739 10.787L10.6685 8.01213C10.6142 7.91203 10.5111 7.85003 10.3994 7.85003H7.27777ZM12.5345 14.5795C12.5346 14.5801 12.5348 14.5806 12.5349 14.5811C12.593 14.7856 12.6884 15.0816 12.8342 15.4305C13.1272 16.132 13.6136 17.0226 14.3874 17.8144C14.3874 17.8144 14.3874 17.8144 14.3874 17.8144M14.3874 17.8144C15.1611 18.6061 16.0295 19.1018 16.7126 19.3996C17.0523 19.5478 17.3405 19.6445 17.5394 19.7032C17.5397 19.7033 17.5401 19.7034 17.5405 19.7035L20.1347 18.3763C20.1348 18.3762 20.1348 18.3762 20.1348 18.3762C20.771 18.0507 21.5231 18.0676 22.1446 18.4212L21.7274 19.1892L22.1446 18.4212L24.8641 19.9683C25.5477 20.3571 25.9715 21.0945 25.9715 21.8946V25.0894C25.9715 27.3068 23.9254 29.0104 21.7699 28.2662C18.6565 27.1912 13.6763 25.1015 10.4711 21.8217C7.26595 18.5421 5.22368 13.446 4.17316 10.2602L4.98804 9.97886L4.17316 10.2602C3.44586 8.05459 5.11077 5.96094 7.27777 5.96094H10.3994C11.1819 5.96094 11.9027 6.39522 12.2825 7.09508L12.2825 7.09516L13.788 9.8701L13.788 9.87012C14.1329 10.5059 14.1492 11.2749 13.8313 11.9255C13.8313 11.9255 13.8313 11.9255 13.8313 11.9255L12.5345 14.5795" fill="#636775"/>
                        </svg> 
                    </a>

                    <a href="mailto: <?php $APPLICATION->IncludeComponent(
                            "bitrix:main.include", 
                            ".default", 
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "AREA_FILE_RECURSIVE" => "Y",
                                "EDIT_TEMPLATE" => "",
                                "COMPONENT_TEMPLATE" => ".default",
                                "PATH" => "/include/email.php"
                            ),
                            false
                        );?>" class="contacts-block__link">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.66675 6C1.66675 5.44772 2.11446 5 2.66675 5H29.3334C29.8857 5 30.3334 5.44772 30.3334 6V26C30.3334 26.5523 29.8857 27 29.3334 27H2.66675C2.11446 27 1.66675 26.5523 1.66675 26V6ZM3.66675 7V25H28.3334V7H3.66675Z" fill="#636775"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.86656 5.40006C2.19793 4.95823 2.82474 4.86869 3.26656 5.20006L15.9999 14.7501L28.7332 5.20006C29.1751 4.86869 29.8019 4.95823 30.1332 5.40006C30.4646 5.84189 30.3751 6.46869 29.9332 6.80006L16.5999 16.8001C16.2443 17.0667 15.7555 17.0667 15.3999 16.8001L2.06656 6.80006C1.62473 6.46869 1.53519 5.84189 1.86656 5.40006Z" fill="#636775"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.66675 6C1.66675 5.44772 2.11446 5 2.66675 5H16.0001C16.5524 5 17.0001 5.44772 17.0001 6C17.0001 6.55228 16.5524 7 16.0001 7H3.66675V16C3.66675 16.5523 3.21903 17 2.66675 17C2.11446 17 1.66675 16.5523 1.66675 16V6Z" fill="#636775"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15 6C15 5.44772 15.4477 5 16 5H29.3333C29.8856 5 30.3333 5.44772 30.3333 6V16C30.3333 16.5523 29.8856 17 29.3333 17C28.781 17 28.3333 16.5523 28.3333 16V7H16C15.4477 7 15 6.55228 15 6Z" fill="#636775"/>
                        </svg> 
                    </a>
                    <span class="text-3"><?=Loc::getMessage('WE_WILL_ANSWER_YOUR_QUESTIONS');?></span>
                </div>
            </div>
            
        </div>
    </section>

    <section class="container slider-container">
        <div class="section-content">
            <h2 class="title mb-4 mb-md-6"><?=Loc::getMessage('NEW_COMPANIES_AND_BANKS_REVIEWS');?></h2>

            <div class="reviews-container">
                <button class="reviews-nav prev">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.4719 14.5454L17.0786 20L22.4719 25.4545" stroke="#1A2030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg> 
                </button>
                <div class="swiper swiper-reviews">

                    <div class="swiper-wrapper">
                        <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"reviews", 
	array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "reviews",
		"IBLOCK_ID" => "6",
		"NEWS_COUNT" => "100",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "DETAIL_TEXT",
			2 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "AUTHOR",
			1 => "BANK",
			2 => "RATING",
			3 => "",
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
		"PAGER_TITLE" => "Отзывы",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "Y",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"PAGER_BASE_LINK_ENABLE" => "Y",
		"SET_STATUS_404" => "Y",
		"SHOW_404" => "Y",
		"MESSAGE_404" => "",
		"PAGER_BASE_LINK" => "",
		"PAGER_PARAMS_NAME" => "arrPager",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "reviews",
		"STRICT_SECTION_CHECK" => "N",
		"FILE_404" => ""
	),
	false
);?>
                        
                    </div>
                </div>
                <button class="reviews-nav next">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.4719 14.5454L17.0786 20L22.4719 25.4545" stroke="#1A2030" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg> 
                </button>
            </div>
        </div>
    </section>


    <section class="container">
        <div class="section-content">
            <h2 class="title mb-4 mb-md-5"><?=Loc::getMessage('FAQs');?></h2>

            <div class="accordion faq text-3 text-dark">
                
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list", 
                    "faqs", 
                    array(
                        "DISPLAY_DATE" => "Y",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "Y",
                        "AJAX_MODE" => "N",
                        "IBLOCK_TYPE" => "FAQs",
                        "IBLOCK_ID" => "5",
                        "NEWS_COUNT" => "100",
                        "SORT_BY1" => "SORT",
                        "SORT_ORDER1" => "DESC",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER2" => "ASC",
                        "FILTER_NAME" => "",
                        "FIELD_CODE" => array(
                            0 => "NAME",
                            1 => "DETAIL_TEXT",
                            2 => "",
                        ),
                        "PROPERTY_CODE" => array(),
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
                        "PAGER_TITLE" => "Вопросы и ответы",
                        "PAGER_SHOW_ALWAYS" => "Y",
                        "PAGER_TEMPLATE" => "",
                        "PAGER_DESC_NUMBERING" => "Y",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "Y",
                        "PAGER_BASE_LINK_ENABLE" => "Y",
                        "SET_STATUS_404" => "Y",
                        "SHOW_404" => "Y",
                        "MESSAGE_404" => "",
                        "PAGER_BASE_LINK" => "",
                        "PAGER_PARAMS_NAME" => "arrPager",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "N",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "COMPONENT_TEMPLATE" => "faqs",
                        "STRICT_SECTION_CHECK" => "N",
                        "FILE_404" => ""
                    ),
                    false
                );?>
                
            </div>
        </div>
    </section>
</main>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>