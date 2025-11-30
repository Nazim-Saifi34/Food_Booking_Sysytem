<!DOCTYPE html>
<html lang="en">
<head>
	@include('home.css')
    <style>
        nav{
            padding: auto;
        }
        table{
            margin: 40px;
            border: 1px solid skyblue;
        }
        th{
            padding: 10px;
            text-align:center;
            background-color:red;
            color:white;
            font-weight:bold;
        }
        td{
            padding: 10px;
            color:white;
        }
        h4{
            margin: 40px;
            
            border: 1px solid grey;
        }
        a{
            margin: 40px;
        }
        .div_center{
            display:flex;
            justify-content:center;
            align-items:center;
            margin: 50px;
        }
        label{
            display:inline-block;
            width: 200px;            
        }
        .div_deg{
            padding: 10px;
        }
    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    <nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/home')}}">Home</a>
                </li>
            </ul>
            <a class="navbar-brand m-auto" href="#">
                <!-- <img src="assets/imgs/logo.svg" class="brand-img" alt=""> -->
                <span class="brand-txt">Foodster</span>
            </a>
            <ul class="navbar-nav">
                @if (Route::has('login'))
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{url('my_cart')}}">Cart</a>
                </li>
                <form action="{{route('logout')}}" method = "POST">
                    @csrf
                    <input  class="btn btn-primary ml-xl-4" type="submit" value = "Logout">
                </form>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">Register</a>
                </li>
                @endauth
                @endif
            </ul>
        </div>
    </nav>  <br><br><br><br>
<div id="gallary" class="text-center bg-dark text-light has-height-md middle-items wow fadeIn">
    <table>
        <tr>
            <th>Food Title</th>
            <th>Food Price</th>
            <th>Food Quantity</th>
            <th>Food image</th> 
            <th>Remove From Cart</th> 
        </tr>
        <?php
        $total_price = 0;
        ?>
        @foreach($data as $data)
        <tr>
            <td>{{$data->title}}</td>
            <td>{{$data->price}}</td>
            <td>{{$data->quantity}}</td>
            <td>
                <img width="150" src="food_img/{{$data->image}}" alt="">
            </td>
            <td>
                <a onclick = "return confirm('Are you sure to remove this item?')" class="btn btn-danger" href="{{url('remove_cart',$data->id)}}">Remove</a>
            </td>
        </tr>
        <?php
        $total_price = $total_price + $data->price;
        ?>
        @endforeach
    </table>
    <h4>The Total Price for your Cart is {{$total_price}}</h4>
</div>
<div class="div_center">
    <form action="{{url('confirm_order')}}" method="POST">
        @csrf
        <div class="div_deg">
            <label for="">Name</label>
            <input type="text" name="name" value="{{Auth()->user()->name}}">
        </div>
        <div class="div_deg">
            <label for="">E-mail</label>
            <input type="email" name="email" value="{{Auth()->user()->email}}">
        </div>
        <div class="div_deg">
            <label for="">Phone</label>
            <input type="number" name="phone" value="{{Auth()->user()->phone}}">
        </div>
        <div class="div_deg">
            <label for="">Address</label>
            <input type="text" name="address" value="{{Auth()->user()->address}}">
        </div>
        <div class="div_deg">
            <input class="btn btn-info" type="submit" value="Confirm Order">
        </div>
    </form>
</div>
</body>
</html>
