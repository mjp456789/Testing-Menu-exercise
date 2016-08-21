
<?php
  $assetsURL = $this->module->getAssetsUrl();
  $moduleURL = Yii::app()->request->baseUrl.'/protected/modules/exercise';
?>

<!doctype html>
<html data-ng-app="exerciseApp">
    <head>
        <title>Interating over data</title>
        <link href="<?php echo Yii::app()->request->baseUrl?>/css/angular/styles.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl?>/css/angular/animations.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $assetsURL?>/css/main.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
<div id="mainmenu">
  <ul>
    <li data-ng-repeat="menu in menuOptions" ng-click="getStats(menu)">{{menu}}</li>
  </ul>
</div><!-- mainmenu -->
<div class="search-container">
        <input class="user-search" placeholder="Search" data-ng-model = "userFilter">
</div>
<div data-ng-view class="library-container"></div>
      <script src="<?php echo Yii::app()->request->baseUrl?>/js/angular/angular.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl?>/js/angular/angular-route.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl?>/js/angular/angular-animate.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl?>/js/angular/angular-ui.js"></script>

        <script src="<?php echo $assetsURL?>/angular/app.js"></script>
        <script src="<?php echo $assetsURL?>/angular/controllers/ExerciseController.js"></script>
        <script src="<?php echo $assetsURL?>/angular/controllers/ModalController.js"></script>

    </body>
<script>


var GLOBAL = {
  'assetsUrl':'<?php echo $assetsURL;?>',
  'moduleUrl':'<?php echo $moduleURL;?>',
  'statsObject':'<?php echo json_encode($statsObject);?>'
};

</script>
</html>
