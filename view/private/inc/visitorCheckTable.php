<div class="container-fluid d-flex flex-column align-items-center">
    <form action="" method="POST" class="mt-5 d-flex flex-column align-items-center">
        <div class="form-group">
            <label for="newVisitCode">Code :
                <input type="text" id="newVisitCode" name="newVisitCode" required>
            </label>
        </div>
        <div class="form-group">
            <label for="newVisitName">Name :
                <input type="text" id="newVisitName" name="newVisitName" required>
            </label>
        </div>
        <div class="form-group">
            <label for="newVisitMail">Mail :
                <input type="email" id="newVisitMail" name="newVisitMail" required>
            </label>
        </div>
        <div class="form-group d-flex flex-row">
            <label for="radioEN" class="mx-2">Eng :</label>
                <input class="ps-2 me-1" id="radioEN" type="radio" name="newVisitLang" checked value="en">
            <label for="radioFR" class="mx-2">Fre :</label>
                <input class="ps-2 me-1" type="radio" name="newVisitLang" id="radioFR" value="fr">            
        </div>
        <button class="btn btn-secondary text-white submitButton" type="submit"></button>
    </form>
<div class="table-responsive"> 
    <table class="table table-bordered table-striped text-center" data-toggle="table" data-show-columns="true" data-search="true"data-pagination="true">
    <thead>
            <tr>
                <th class="text-center" id="updateTableHeadName">Code</th>
                <th class="text-center" id="updateTableHeadTextEn">Name</th>
                <th class="text-center" id="updateTableHeadTextFr">Old</th>
                <th class="text-center" id="updateTableHeadType">New</th>                                    
                <th class="text-center" id="deleteVisitor">Delete</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            if (is_string($visitors)) { ?>
    <p class="h3 text-danger my-5">There are no entries yet</p>
            <?php    
            }else {
                foreach ($visitors as $visitor) {
                    ?>
                <tr>
                    <td><?=$visitor["code"]?></td>
                    <td><?=$visitor["nom"]?></td>
                    <td><?=$visitor["curr"]?></td>
                    <td><?=$visitor["new"]?></td>    
                    <td><a href ="?deleteVisitor&visId=<?=$visitor["id"]?>"><img src="images/trash.svg" alt="Delete"></a></td>
                </tr>
                <?php
          }        
        }                             
                ?>
        </tbody>
    </table>
        <form action="" method="POST" id = "visitorForm" class="d-flex justify-content-center">
            <input type="text" name="visitorUpdate" class="d-none">
            <button type="submit" class="btn btn-primary" id="mergeButton"></button>
        </form>                    
</div>
<?php if (!$getMessages) {?>
    <p class="h3 text-danger my-5">There are no messages yet</p>
<?php }else { ?>
<div class="table-responsive"> 
    <table class="table table-bordered table-striped text-center" data-toggle="table" data-show-columns="true" data-search="true"data-pagination="true">
    <thead>
            <tr>
                <th class="text-center">Name</th>
                <th class="text-center">Message</th>
                <th class="text-center">Date</th>
                <th class="text-center">Show Full Message</th>
                <th class="text-center" id="deleteMessage">Delete</th> 
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($getMessages as $mess) {
                    ?>
                <tr>
                    <td><?=$mess["sentBy"]?></td>
                    <td><?=$mess["mess"]?></td>
                    <td><?=$mess["thedate"]?></td>
                    <td><a href="?visitCheck&showMessage=<?=$mess["cp_messages_id"]?>">Show</a></td>
                    <td><a href ="?deleteMessage&messId=<?=$mess["cp_messages_id"]?>"><img src="images/trash.svg" alt="Delete"></a></td>
                                                                                   
                </tr>
                <?php
          }                                   
                ?>
        </tbody>
    </table>               
</div>
    <?php } ?>
        <?php if(isset($getOneMess)) { ?>
                <div class="d-flex flex-column align-items-center">
                    <p class="h3"><?=$getOneMess["sentBy"]?></p>
                    <pre>
                        <p><?=$getOneMess["mess"]?></p>
                    </pre>
                    <p class="h6 fst-italic"><?=$getOneMess["thedate"]?></p>
                </div>
        <?php } ?>
</div>