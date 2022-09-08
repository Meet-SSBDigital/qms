@extends('layouts.app')
@include('header1')
<style>
    .animate-charcter
{
   text-transform: uppercase;
  background-image: linear-gradient(
    -225deg,
    #231557 0%,
    #44107a 29%,
    #ff1361 67%,
    #fff800 100%
  );
  background-size: auto auto;
  background-clip: border-box;
  background-size: 200% auto;
  color: #fff;
  background-clip: text;
  text-fill-color: transparent;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: textclip 2s linear infinite;
  display: inline-block;
      font-size: 50px;
}

@keyframes textclip {
  to {
    background-position: 200% center;
  }
}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sub-Quotstion</h4>
                        <p class="card-description">
                            Update Sub-Quotstion
                        </p>
                        
                        @foreach ($newdata as $item)
                        <form class="forms-sample" action="{{route('Updatebyid.qts')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
@csrf
                                <div class="form-group" id="InnerQuotstion_from">
                                    <label for="exampleInputUsername1"> Quotstion-From</label>
                                    <input type="hidden" name="sub_id" value="{{ $item->sub_id }}">
                                    <input type="text" class="form-control" id="quotstion_from"
                                        value="{{ $item->quotstion_from }}" name="quotstion_from"
                                        placeholder="Quotstion_from" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Price</label>
                                    <input type="text" class="form-control" id="price"
                                        value="{{ $item->price }}" name="price" placeholder="Price" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">T&C</label>
                                    <textarea class="form-control" id="T&C" name="TandC" placeholder="T&C"> {{ $item->TandC }}</textarea>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Attachment</label>
                                    <input class="form-control" type="file" name="attach" id="formFileMultiple" multiple>
                                    @php
                                        $image = $item->attach;
                                        
                                        $newimg = explode('|', $image);
                                    @endphp
                                    @foreach ($newimg as $item)
                                        @if (in_array($image = pathinfo($item, PATHINFO_EXTENSION), ['jpg', 'png', 'bmp', 'gif']))
                                            <img class="img-thumbnail hidden" id="imageGallery"
                                                src="../{{ $item }}"style="width: 100px; height: 100px;">
                                        @else
                                            <a href="../{{ $item }}"><br>Download File <i class='ti-file btn-icon-prepend'
                                                    style='color:red'></i> </a>
                                        @endif
                                    @endforeach                                </div>
                                <div class="form-check form-check-flat form-check-primary">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        Remember me
                                    </label>
                                </div>
                                <button type="submit" name="btn_update" class="btn btn-inverse-primary mr-2">Submit</button>
                        <button type="button" class="btn btn-inverse-danger">Delete</button>
                        </form>
                        @endforeach
                                {{-- @endforeach --}}


                    </div>
                </div>
            </div>


            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Picture</h4>
                        <p class="card-description">

                        </p>

                       
                       <img src="../images/carousel/banner_11.jpg" alt="" class="img-fluid img-thumbnail" width="100%" height="100%" srcset="">
                       <h3 class="animate-charcter"> Update Data</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@include('footer')
