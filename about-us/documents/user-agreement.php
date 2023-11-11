<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Пользовательское соглашение");
$APPLICATION->SetTitle("Пользовательское соглашение");

use \Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
?>

<main>

    <section class="container">
        <div class="section-content">
            <h1 class="title mb-4 mb-lg-6"><?=$APPLICATION->ShowTitle();?></h1>
            <?php $APPLICATION->IncludeComponent(
                "bitrix:main.include", 
                ".default", 
                array(
                    "AREA_FILE_SHOW" => "file",
                    "AREA_FILE_SUFFIX" => "inc",
                    "AREA_FILE_RECURSIVE" => "Y",
                    "EDIT_TEMPLATE" => "",
                    "COMPONENT_TEMPLATE" => ".default",
                    "PATH" => "/include/user_agreement.php"
                ),
                false
            );
            ?>
        </div>
    </section>

</main>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>