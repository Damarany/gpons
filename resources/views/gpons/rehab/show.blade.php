<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="card text-center" style="width: 18rem;">
                @foreach($shows as $show)
                <div class="card-header">
                    <span class="font-weight-bold">Code:</span> {{$show->code}}
                </div>
                <ul class="list-group list-group-flush">

                    <li class="list-group-item">
                        <span class="font-weight-bold">Dslam IP:</span> {{$show->dslam_ip}}
                    </li>
                    <li class="list-group-item">
                        <span class="font-weight-bold">Name:</span> {{$show->name}}
                    </li>
                    <li class="list-group-item">
                        <span class="font-weight-bold">Voice IP:</span> {{long2ip($show->voice_ip)}}
                    </li>
                    <li class="list-group-item">
                        <span class="font-weight-bold">Getway:</span> {{$show->getway}}
                    </li>
                    <li class="list-group-item">
                        <span class="font-weight-bold">Vlan:</span> {{$show->vlan}}
                    </li>
                    <li class="list-group-item">
                        <span class="font-weight-bold">Proxy:</span> {{$show->proxy}}
                    </li>
                    <li class="list-group-item">
                        <span class="font-weight-bold">id:</span> {{$show->id}}
                    </li>
                    <li class="list-group-item">
                        <span class="font-weight-bold">free IP: </span> {{long2ip($show->free_ip)}}
                    </li>
                    @endforeach
                </ul>
                    @php
                        $my_ip = long2ip($show->voice_ip+1);
                        $my_id = $show->id;
                        $free_ip = $show->free_ip
                    @endphp
                    <a href='{{URL::route('next_ip',[$my_ip,$my_id,$free_ip])}}' class="flex-center mt-1">

                        <button type="button" name="next" class="btn btn-success flex-center">next IP</button>
                    </a>
                    <a href='{{URL::route('edit',$my_id)}}' class="flex-center mt-1">

                        <button type="button" name="edit" class="btn btn-primary flex-center">EDIT</button>
                    </a>
                    <a href="{{route('search_page')}}">Go To Search Page</a>
                    <a href="{{route('insert_page')}}">Go To Insert Page</a>

            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    </body>
</html>
