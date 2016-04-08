<!doctype html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
    </head>
    <body>
        <div class="container">
            <div class="row centered" style="padding:10px 0 10px 0;">
                <div class="col-md-offset-2"/>
                <div class="col-md-6">
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
                <div class="col-md-2">
                    <button class="btn btn-primary srch-light btn-block">Search</button>
                </div>
                <div class="col-md-offset-2"/>
            </div>
            <div class="row">

            </div>
        </div>

        <script src="{{URL::asset('js/vendor/jquery.js')}}"></script>
        <script src="{{URL::asset('js/vendor/angular.min.js')}}"></script>
        <script src="{{URL::asset('js/vendor/angular-route.min.js')}}"></script>
        <script src="{{URL::asset('js/vendor/angular-ui-router.min.js')}}"></script>
        <script src="{{URL::asset('js/vendor/bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('js/vendor/angular-resource.min.js')}}"></script>
        <script src="{{URL::asset('js/vendor/bootstrap-select.js')}}"</script>
        <script>$('.dropdown-toggle').dropdown()</script>
    </body>
</html>