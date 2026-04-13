@extends("master")

    @section("content")

<form action ="/destinations/{{$destination->id}}/update" method="post" class="form-floating">
    @csrf
    @method("put")

    <div class ="form-floating mb-3 ">
        <input type ="text" class= "form-control"id ="floatingInput" placeholder="Asia Heritage" name ="name" value="{{$destination->name}}">
        <label for ="floatinginput">nama destinasi</label>

    </div>
    <div class="form-floating mb-3 ">
        <textarea name="description"id="" class="form-control" placholder="description">{{$destination->description}}</textarea>
        <label for="description">description</label>

    </div>
    <div class ="form floating mb -3">
        <input type="text" class="form-control"id="floatingInput" placeholder="pekanbaru" name="location" value="{{$destination->location}}">
        <label for="location">lokasi</label>

    </div>
    <div class ="form floating mb-3">
        <input type="number" class="form-control" id="floatingInput" placeholder ="100000" name="ticket_price" value="{{$destination->ticket_price}}">
        <label for="ticket_price">harga Tiket</label>
    
    </div>
    <div class ="form floating mb- 3">
     <input type="text" class= "form-control"id ="floatingInput" placeholder="08.00- 16.00" name="working_hours" value="{{$destination->working_hours}}">
      <label for="working_hours">jam operasional</label>

    </div>
    <div class="form floating mb- 3">
     <input type="text" class="form-control" id="floatingInput" placeholder="08.00- 16.00" name="working_days" value="{{$destination->working_days}}">
      <label for="working_days">Hari operasional</label>

    </div>
    <button type ="submit" class="btn btn-primary">submit</button>

</form>

@endsection





