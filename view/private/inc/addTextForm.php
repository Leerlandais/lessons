
<?php
    $block = "";
    $_SESSION["cp_permission"] < 128 ? $block = "disabled" : $block = "";
  ?>

<?php

?>
<fieldset class="reset">
  <div class="container d-flex flex-row">
  <div class="container text-center">
    <fieldset class="reset"><legend  class="reset" id="addTextLegend"></legend>
    <form action="./" method="POST" id = "add-textForm" class="d-flex flex-column align-items-center">
      
      <label for="selectInp" id="addTextselectLabelName"></label>
      <input class="ps-2" type="text" name="selectInp" id="selectInp" aria-describedby="userNameField" placeholder="selector" <?=$block?>>
      
      <label for="englishInp" id="addTextEnLabelName"></label>
      <input class="ps-2" type="text" name="englishInp" id="englishInp" aria-describedby="userNameField" placeholder="english version" <?=$block?>>
      
      <label for="frenchInp" id="addTextFrLabelName"></label>
      <input class="ps-2" type="text" name="frenchInp" id="frenchInp" aria-describedby="userNameField" placeholder="french version" <?=$block?>>
      
      <div class="d-flex flex-row">
      <label for="typeInpSelector" class="radioIdLabel mx-2 inpLabelSelect" ></label>
      <input class="ps-2 me-1" type="radio" name="typeInp" id="typeInpSelector" checked value="selector">
        
        <label for="typeInpId" class="radioIdLabel mx-2 inpLabelID"></label>
        <input class="ps-2 me-1" type="radio" name="typeInp" id="typeInpId" checked value="id">
        
        <label for="typeInpClass" class="radioClassLabel mx-2 inpLabelClass"></label>
        <input class="ps-2 me-1" type="radio" name="typeInp" id="typeInpClass" value="class">
        
      </div>
      
      <button type="submit" class="submitButton" <?=$block?>></button>
    </form>
  </fieldset>
</div>
</fieldset>