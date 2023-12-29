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
        <form action="search_car" method="GET" >
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
                                    <option>Off1 </option>
                                    <option>Off2</option>
                                    <option>Off3</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" name="color">
                                    <option placeholder="" value="">COLOR</option>
                                    <option>RED</option>
                                    <option>BLUE</option>
                                    <option>GREEN</option>
                                    <option>BLACK</option>
                                    <option>WHITE</option>
                                </select>
                            </div>
                        </div>
                        <div class="text" id="year">
                            <input type="number" name="year" placeholder="year" min="2000" max="2025">
                        </div>

                    </div>
                    <div class="row second">
                        <div class="input-field">
                            <div class="input-select">
                            <div class="text" id="model">
                                <input type="text" name="model" placeholder="model">
                            </div>

                            </div>
                            <div class="input-select">
                            <div class="text" id="model">
                                <input type="text" name="plate" placeholder="Plate number">
                            </div>
                            </div>
                        </div>
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" name="time">
                                    <option placeholder="" value="">TIME</option>
                                    <option>THIS WEEK</option>
                                    <option>SUBJECT B</option>
                                    <option>SUBJECT C</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" name="type">
                                    <option placeholder="" value="">TYPE</option>
                                    <option>TYPE</option>
                                    <option>RENTED</option>
                                    <option>OUT OF SERVICE</option>
                                    <option>ACTIVE</option>
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