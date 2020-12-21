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
    <h1 class="text-center pt-5">EDIT</h1>
        <div class="flex-center position-ref full-height">

            <form method="post" action="{{route('update',$shows->id)}}">
                @csrf
                @if(count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $error)

                            <li class="alert-danger">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                <div class="form-group">
                    <label for="exampleInputEmail1">Code</label>
                    <input type="text" class="form-control" name="code" value="{{$shows->code}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">dslam ip</label>
                    <input type="text" class="form-control" name="dslam_ip" value="{{$shows->dslam_ip}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$shows->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Voice ip</label>
                    <input type="text" class="form-control" name="voice_ip"
                           value="{{long2ip($shows->voice_ip)}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Getway</label>
                    <input type="text" class="form-control" name="getway" value="{{$shows->getway}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Vlan</label>
                    <input type="text" class="form-control" name="vlan" value="{{$shows->vlan}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Proxy</label>
                    <input type="text" class="form-control" name="proxy" value="{{$shows->proxy}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Free ip</label>
                    <input type="text" class="form-control" name="free_ip" value="{{long2ip($shows->free_ip)}}">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <div>
                    <a class="mr-2" href="{{route('insert_page')}}">Go To Insert Page</a>
                    <a href="{{route('search_page')}}">Go To Search Page</a>
                </div>
            </form>

        </div>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    </body>
</html>
