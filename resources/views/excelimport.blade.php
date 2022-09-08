@extends('layouts.app')
@include('header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Excel</title>
</head>
<body>
    {{-- <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div> --}}

      <div class="row">
        <div class="col-md-12 pb-2 offset-md-3">
            <div class="card" style="width: 20rem;">
                <img src="../images/carousel/banner_8.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Import Csv</h5>
                 <form action="{{ route('Audit-import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                    
                      <input type="file"
                        class="form-control" name="exlfile" id="exlfile" aria-describedby="helpId" placeholder="">
                      <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>  
                    <input name="btn-import" id="btn-import" class="btn btn-info" type="submit" >
                    
                    <a href="{{ route('show-Export') }}" name="btn-export " id="btn-export" class="btn btn-info"  value="">Export</a>
                 </form>
                  
                </div>
              </div>
        </div>
      </div>
      
</body>
</html>
@include('footer')