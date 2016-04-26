<!doctype html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
</head>
<body ng-app="lolgrade">
<div class="container-fluid container-header">
    <div class="header-img row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 decorate">
            <div class="row text-center logo-block">
                <h1><a href="/" class="logo"><b class="header-sea-dark">LOL</b><b class="header-sea">Grade</b></a></h1>
            </div>

            <div class="row">
                <p class="article-text">
                    Welcome to the Summoners Rift! With this small application you can get which maximum grades your
                    team and enemies team have. Just enter your nickname, choose server and search.
                </p>
            </div>

            <div class="row text-center" ng-controller = "HeaderCtrl as header">
                <div class="col-md-8 resp-width">
                    <div class="input-group input-nickname">
                        <input type="text" class="form-control" aria-label="Text input with dropdown button" id="nickname">
                        <select class="selectpicker select-server" id="server">
                            <option value="NA">NA</option>
                            <option value="EUW">EUW</option>
                            <option value="EUNE">EUNE</option>
                            <option value="BR">BR</option>
                            <option value="TR">TR</option>
                            <option value="RU">RU</option>
                            <option value="LAN">LAN</option>
                            <option value="LAS">LAS</option>
                            <option value="OCE">OCE</option>
                            <option value="KR">KR</option>
                            <option value="JP">JP</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <button class="btn btn-primary srch-light btn-block" ng-click="header.getData()" id="srch" ng-disabled="isDisabled"><b>Search</b></button>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

    <div class="container container-summ">
        <div ui-view></div>
    </div>
</div>

<footer></footer>

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
<script src="{{URL::asset('js/controllers/SummonerController.js')}}"></script>
</body>
</html>