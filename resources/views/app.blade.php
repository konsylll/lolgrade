<!doctype html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
    </head>
    <body ng-app="lolgrade">
        <div class="row centered" style="padding:10px 0 10px 0;" ng-controller = "HeaderCtrl as header">
            <div class="col-md-1"></div>
            <div class="col-md-1">
                <h1>
                    <b class="header-sea-dark">LOL</b><b class="header-sea">Grade</b>
                </h1>
            </div>
            <div class="col-md-5">
                <div class="input-group">
                    <input type="text" class="form-control " aria-label="Text input with dropdown button" id="nickname">
                    <select class="selectpicker" id="server">
                        <option>NA</option>
                        <option>EUW</option>
                        <option>EUNE</option>
                        <option>BR</option>
                        <option>TR</option>
                        <option>RU</option>
                        <option>LAN</option>
                        <option>LAS</option>
                        <option>OCE</option>
                        <option>KR</option>
                        <option>JP</option>
                    </select>
                </div>
            </div>
            <div class="col-md-1">
                <button class="btn btn-primary srch-light btn-block" ng-click="header.getData()" id="srch" ng-disabled="isDisabled">Search</button>
            </div>
            <div class="col-md-2"></div>
        </div>

        <div class="container container-summ">
            <div ui-view></div>
        </div>

        <script src="{{URL::asset('js/vendor/jquery.js')}}"></script>
        <script src="{{URL::asset('js/vendor/angular.min.js')}}"></script>
        <script src="{{URL::asset('js/vendor/angular-route.min.js')}}"></script>
        <script src="{{URL::asset('js/vendor/angular-ui-router.min.js')}}"></script>
        <script src="{{URL::asset('js/vendor/bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('js/vendor/angular-resource.min.js')}}"></script>
        <script src="{{URL::asset('js/vendor/bootstrap-select.js')}}"></script>
        <script>$('.dropdown-toggle').dropdown()</script>

        <script src="{{URL::asset('js/app.js')}}"></script>
        <script src="{{URL::asset('js/controllers/HeaderController.js')}}"></script>
        <script src="{{URL::asset('js/controllers/ResultController.js')}}"></script>
    </body>
</html>