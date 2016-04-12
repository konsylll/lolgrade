<!doctype html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
    </head>
    <body>
        <div class="container">
            <div class="row centered" style="padding:10px 0 10px 0;">
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="text" class="form-control " aria-label="Text input with dropdown button">
                        <select class="selectpicker">
                            <option>NA</option>
                            <option>EUW</option>
                            <option>BR</option>
                            <option>TR</option>
                            <option>Москальский</option>
                            <option>LAN</option>
                            <option>LAS</option>
                            <option>OCE</option>
                            <option>KR</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-primary srch-light btn-block">Search</button>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row team-100">

            <div class="col-md-2 col-sm-2 col-xs-2 compressed">
                <img src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/Aatrox_0.jpg" alt="..." class="img-summoner">
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2 compressed">
                <img src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/Ahri_0.jpg" alt="..." class="img-summoner">
            </div>
                <div class="col-md-2 col-sm-2 col-xs-2 compressed">
                <img src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/Akali_0.jpg" alt="..." class="img-summoner">
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2 compressed">
                <img src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/Jinx_0.jpg" alt="..." class="img-summoner">
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2 compressed">
                <img src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/Maokai_0.jpg" alt="..." class="img-summoner">
            </div>
        </div>
            <div class="row versus text-center">VS</div>
            <div class="row team-200">
            <div class="col-md-2 col-sm-2 col-xs-2 compressed">
                <img src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/Syndra_0.jpg" alt="..." class="img-summoner">
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2 compressed">
                <img src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/Ryze_0.jpg" alt="..." class="img-summoner">
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2 compressed">
                <img src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/Caitlyn_0.jpg" alt="..." class="img-summoner">
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2 compressed">
                <img src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/Bard_0.jpg" alt="..." class="img-summoner">
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2 compressed">
                <img src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/AurelionSol_0.jpg" alt="..." class="img-summoner">
            </div>
        </div>
        </div>

        <script src="{{URL::asset('js/vendor/jquery.js')}}"></script>
        <script src="{{URL::asset('js/vendor/angular.min.js')}}"></script>
        <script src="{{URL::asset('js/vendor/angular-route.min.js')}}"></script>
        <script src="{{URL::asset('js/vendor/angular-ui-router.min.js')}}"></script>
        <script src="{{URL::asset('js/vendor/bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('js/vendor/angular-resource.min.js')}}"></script>
        <script src="{{URL::asset('js/vendor/bootstrap-select.js')}}"></script>
        <script>$('.dropdown-toggle').dropdown()</script>
    </body>
</html>