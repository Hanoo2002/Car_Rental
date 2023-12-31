<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" />
    <link href="{{ asset('css/admin/view.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Advanced Car Search</title>
</head>

<body>
    @include('components.sidebar')
    <div class="s007">
        <form action="search_car" method="GET">
            @csrf
            <div class="inner-form">
                <div class="basic-search">
                </div>
                <div class="advance-search">
                    <span class="desc">Advanced Search</span>
                    <div class="row">
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" name="office">
                                    <option placeholder="" value="">OFFICE</option>
                                    @foreach($offs as $off)
                                    <option>{{ $off -> office_id}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" name="color">
                                    <option value="">COLOR</option>
                                    @foreach($res as $color)
                                    <option>{{ $color -> color }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="text" id="year">
                            <input type="number" name="year" placeholder="year" min="2000" max="2025">
                        </div>

                    </div>
                    <div class="row second">
                        <div class="input-field">
                            <div class="text" id="model">
                                <input type="text" name="model" placeholder="Model">
                            </div>



                        </div>
                        <div class="input-field">

                            <div class="text" id="plate">
                                <input type="text" name="plate" placeholder="Plate Number">
                            </div>

                        </div>
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" name="current_status">
                                    <option placeholder="" value="">Status</option>
                                    <option>busy</option>
                                    <option>available</option>
                                    <option>0ut_of_service </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row third">
                        <div class="input-field">
                            <button class="btn-search">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>

</html>