<!DOCTYPE html>
<html>
  <head> 
       @include('admin.css')
       <style>
        table{
            border: 1px solid Skyblue;
            margin:auto;
            width: 100%;
        }
        table img{
            max-width: 60;
        }
        th{
            color:white;
            font-weight:bold;
            font-size:18px;
            text-align:center;
            background-color:red;
            padding: 10px;
        }
        td{
            color:white;
            font-weight:bold;
            text-align:center;
            padding: 10px;
        }
       </style>
  </head>
  <body>
        @include('admin.header')       
        @include('admin.sidebar')
        <div class="page-content">
            <div class="page-header">
                <div class="table-responsive">
                   <table>
                    <tr>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Food Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Change Status</th>
                    </tr>
                    @foreach($data as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->address}}</td>
                        <td>{{$data->title}}</td>
                        <td>{{$data->quantity}}</td>
                        <td>{{$data->price}}</td>
                        <td>
                            <img width="100" src="food_img/{{$data->image}}" alt="">
                        </td>
                        <td>{{$data->delivery_status}}</td>
                        <td>
                            <a class="btn btn-info" href="{{url('on_the_way',$data->id)}}">On the way</a>
                            <a class="btn btn-warning" href="{{url('deliverd',$data->id)}}">Delivered</a>
                            <a class="btn btn-danger" href="{{url('cancel',$data->id)}}">Cancel</a>
                        </td>
                    </tr>
                    @endforeach
                   </table>
                </div>
            </div>
        </div>
    @include('admin.js')
  </body>
</html>