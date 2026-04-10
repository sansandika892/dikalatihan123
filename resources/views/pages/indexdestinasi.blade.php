@extends('master')

@section('content')
    <div class ="container">
          <a href=" /destinations/create" class="btn btn success"><button>Add Destinations </button ></a>
        <table class ="table table -striped-columns">

            <thead>
              <tr>
                <th>id</th>
                <th>name</th>
                <th>descrioptions</th>
                <th>location</th>
                <th>price</th>
                <th>working hours</th>
                <th>working days</th>
                <th>Actions</th>
               </tr>
            </thead>
            <tbody>
                
                @foreach ($destinations as $d)
                    <tr>
                        <td> <a href="/detaildestinasi/{{$d->id}}">{{$d->id}}</a> </td>

                        <td> {{ $d->name }} </td>
                        <td> {{ $d->description }} </td>
                        <td> {{ $d->lacation }} </td>
                        <td> {{ $d->ticket_price }} </td>
                        <td> {{ $d->working_hours }} </td>
                        <td> {{ $d->working_days }} </td>
                        <td>
                        
                         <a href = "/destinations/{{$d->id}}/edit" class="btn btn-warning">Edit,</a>
                            <form action="/destinations/{{$d->id}}"method ="post"style="display;inline;">
                            @csrf
                            @method ('DELETE')
                            <button type="submit" class="btn btn-danger"onclick="return confirm('Are you sure to delete {{$d->name}}?')
                            ">Delete</button>
                        </form>
                    </td>
                     </tr>
                @endforeach

   
    
                        </form>
                
               
            </tbody>




        </table>

    </div>
@endsection
