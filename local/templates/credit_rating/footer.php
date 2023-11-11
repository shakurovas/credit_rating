<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
use \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?>

<footer class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="section-content">
                    <!-- <nav class="footer-nav"> -->
                        <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"bottom_menu", 
	array(
		"ROOT_MENU_TYPE" => "bottom",
		"MAX_LEVEL" => "2",
		"CHILD_MENU_TYPE" => "submenu_footer",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "Y",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"COMPONENT_TEMPLATE" => "bottom_menu"
	),
	false
);?>
                    <!-- </nav> -->
                </div>            
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="section-content">
                    <p class="text text-blue text-center"><?=Loc::getMessage('ALL_RIGHTS_RESERVED');?></p>
                </div>
            </div>
        </div>
        
    </footer>

</body>
</html>
