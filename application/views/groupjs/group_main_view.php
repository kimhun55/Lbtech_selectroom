<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Angular Sort and Filter</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootswatch/3.2.0/sandstone/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <style>
        body { padding-top:50px; }
    </style>

    <!-- JS -->
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>
    <script>
  angular.module('sortApp', [])

.controller('mainController', function($scope) {
  $scope.sortType     = 'name'; // set the default sort type
  $scope.sortReverse  = false;  // set the default sort order
  $scope.searchFish   = '';     // set the default search/filter term
  
  // create the list of sushi rolls 
  $scope.std = [
  		 <?php
  		foreach ($data['data'] as $k =>$std) {
  			unset($text);
  			foreach ($std as $key => $value) {
  				$text[] = $key.":'".$value."'";
  			}
  			$data_text[] = "{".implode(',', $text)."}";
  		}
  			echo implode(',', $data_text);
  		?>
  ];

  $scope.data = [{std_group_room : '1'},{std_group_room : '2'},{std_group_room : '3'},{std_group_room : '4'},{std_group_room : '5'}];
  
});</script>

</head>
<body>
<div class="container" ng-app="sortApp" ng-controller="mainController">
 
  <div class="alert alert-info">
    <p>Sort Type: {{ sortType }}</p>
    <p>Sort Reverse: {{ sortReverse }}</p>
    <p>Search Query: {{ searchFish }}</p>
  </div>
  
  <form>
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-search"></i></div>
        <input type="text" class="form-control" placeholder="Search da Fish" ng-model="searchFish">
      </div>      
    </div>
  </form>
  
  <table class="table table-bordered table-hover">
    
    <thead>
      <tr>
        <td>
          <a href="#" ng-click="sortType = 'stdCardID'; sortReverse = !sortReverse">
           stdCardID 
            <span ng-show="sortType == 'stdCardID' && !sortReverse" class="fa fa-caret-down"></span>
            <span ng-show="sortType == 'stdCardID' && sortReverse" class="fa fa-caret-up"></span>
          </a>
        </td>
        <td>
          <a href="#" ng-click="sortType = 'stdApplyNo'; sortReverse = !sortReverse">
         stdApplyNo
            <span ng-show="sortType == 'stdApplyNo' && !sortReverse" class="fa fa-caret-down"></span>
            <span ng-show="sortType == 'stdApplyNo' && sortReverse" class="fa fa-caret-up"></span>
          </a>
        </td>
        <td>
          <a href="#" ng-click="sortType = 'prefix_id_th'; sortReverse = !sortReverse">
          prefix_id_th
            <span ng-show="sortType == 'prefix_id_th' && !sortReverse" class="fa fa-caret-down"></span>
            <span ng-show="sortType == 'prefix_id_th' && sortReverse" class="fa fa-caret-up"></span>
          </a>
        </td>

        <td>
          <a href="#" ng-click="sortType = 'stu_fname_th'; sortReverse = !sortReverse">
          stu_fname_th
            <span ng-show="sortType == 'stu_fname_th' && !sortReverse" class="fa fa-caret-down"></span>
            <span ng-show="sortType == 'stu_fname_th' && sortReverse" class="fa fa-caret-up"></span>
          </a>
           <td>
          <a href="#" ng-click="sortType = 'stu_lname_th'; sortReverse = !sortReverse">
          stu_lname_th
            <span ng-show="sortType == 'stu_lname_th' && !sortReverse" class="fa fa-caret-down"></span>
            <span ng-show="sortType == 'stu_lname_th' && sortReverse" class="fa fa-caret-up"></span>
          </a>
        </td>
        		<td> option</td>
      </tr>
    </thead>
    
    <tbody>
      <tr ng-repeat="roll in std | orderBy:sortType:sortReverse | filter:searchFish">
        <td>{{ roll.stdCardID }}</td>
        <td>{{ roll.stdApplyNo }}</td>
        <td>{{ roll.prefix_id_th }}</td>
        <td>{{ roll.stu_fname_th }}</td>
        <td>{{ roll.stu_lname_th }}</td>
        <td style="text-align: center;">
 	  <form class="form-inline" method="post" action="">
	  <div class="form-group">
	  	<input type="hidden" name="stdCardID" value="{{ roll.stdCardID }}" />
	  	<input type="hidden" name="stdApplyNo" value="{{ roll.stdApplyNo }}"/>
	  	<input type="hidden" name="form_callback" value=""/>
	      <select name="mySelect" id="mySelect"
      ng-options="option.name for option in data.availableOptions track by option.id"
      ng-model="data.selectedOption"></select>
	  </div>
	  <button type="submit" class="btn btn-default">Send</button>
	</form>
 									
 								</td>
      </tr>
    </tbody>
    
  </table>
  
</div>
</body>
</html>