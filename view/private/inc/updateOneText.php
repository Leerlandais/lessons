<?php
if ($_SESSION["cp_permission"] !== 255) {
    ?>
        <div class="container d-flex flex-column align-items-center">
        <h2 id="securityWarning"></h2>
        </div>
    <?php
}else {
?>
<div class="container d-flex flex-column align-items-center text-center">
<fieldset class="reset">
    <legend class="reset" id="updateOneTextLegend"></legend>
    <form action="" method="POST" id = "updateOneTextForm" class="d-flex flex-column text-center">
    <label for="oneTextId" id="oneTextIdLabel">id-</label>
        <input type="text" class="text-center" name="oneTextId" aria-describedby="oneTextIdField" value="<?=$getOneText["id"]?>">
    <label for="oneTextElem" id="oneTextElemLabel">elem-</label>
        <input type="text" class="text-center" name="oneTextElem" value="<?=$getOneText["elem"]?>">
    <label for="oneTextEng" id="oneTextEngLabel">ang-</label>
        <textarea name="oneTextEng" value="<?=$getOneText["enText"]?>"><?=$getOneText["enText"]?></textarea>
    <label for="oneTextFre" id="oneTextFreLabel">fre-</label>
        <textarea name="oneTextFre" value="<?=$getOneText["frText"]?>"><?=$getOneText["frText"]?></textarea>

    <div class="d-flex flex-row justify-content-center text-center">
            <label for="labelTypeSelect" class="inpLabelSelect"></label>
                <input type="radio" name="selectorType"id="labelTypeSelect" class="ps-0 me-2" value="selector" <?php if($getOneText["theType"] === "selector") echo 'checked'?>>
            <label for="labelTypeId" class="inpLabelID"></label>
                <input type="radio" name="selectorType"id="labelTypeId" class="ps-0 me-2" value="id" <?php if($getOneText["theType"] === "id") echo 'checked'?>>
            <label for="labelTypeClass" class="inpLabelClass"></label>
                <input type="radio" name="selectorType"id="labelTypeClass" class="ps-0 me-2" value="class" <?php if($getOneText["theType"] === "class") echo 'checked'?>>
        </div>

        <div class="form-group text-center">
                 <button type="submit" class="btn btn-dark rounded-pill mt-3" id="updateButton">Changer</button> 
                 <badge class="btn btn-dark rounded-pill mt-3"><a href="./">Annuler</a></badge> 
                 </div>
</form>
</fieldset>
</div>

<?php } ?>