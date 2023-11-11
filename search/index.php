<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск");
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:search.page", 
	"credit_rating", 
	array(
		"RESTART" => "Y",
		"CHECK_DATES" => "N",
		"USE_TITLE_RANK" => "N",
		"DEFAULT_SORT" => "rank",
		"arrFILTER" => array(
			0 => "iblock_FAQs",
			1 => "iblock_banks",
			2 => "iblock_reviews",
			3 => "iblock_bank_products",
		),
		"SHOW_WHERE" => "N",
		"SHOW_WHEN" => "N",
		"PAGE_RESULT_COUNT" => "12",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"DISPLAY_TOP_PAGER" => "Y",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Результаты поиска",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_TEMPLATE" => "show_more",
		"USE_SUGGEST" => "N",
		"SHOW_ITEM_TAGS" => "N",
		"SHOW_ITEM_DATE_CHANGE" => "N",
		"SHOW_ORDER_BY" => "N",
		"SHOW_TAGS_CLOUD" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "credit_rating",
		"NO_WORD_LOGIC" => "N",
		"FILTER_NAME" => "",
		"USE_LANGUAGE_GUESS" => "Y",
		"TAGS_SORT" => "NAME",
		"TAGS_PAGE_ELEMENTS" => "150",
		"TAGS_PERIOD" => "",
		"TAGS_URL_SEARCH" => "",
		"TAGS_INHERIT" => "Y",
		"FONT_MAX" => "50",
		"FONT_MIN" => "10",
		"COLOR_NEW" => "000000",
		"COLOR_OLD" => "C8C8C8",
		"PERIOD_NEW_TAGS" => "",
		"SHOW_CHAIN" => "Y",
		"COLOR_TYPE" => "Y",
		"WIDTH" => "100%",
		"SHOW_RATING" => "",
		"RATING_TYPE" => "",
		"PATH_TO_USER_PROFILE" => "",
		"arrFILTER_main" => "",
		"arrFILTER_iblock_FAQs" => array(
			0 => "all",
		),
		"arrFILTER_iblock_banks" => array(
			0 => "all",
		),
		"arrFILTER_iblock_reviews" => array(
			0 => "all",
		),
		"arrFILTER_iblock_bank_products" => array(
			0 => "all",
		),
		"arrWHERE" => array(
			0 => "iblock_bank_products",
		)
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
