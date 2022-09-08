@extends('layouts.app')
@include('header')

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
                        <form class="forms-sample" action="" enctype="multipart/form-data" autocomplete="off">
                       {{-- @foreach ($newdata as $item)
                           
                       @endforeach --}}
     

                            <div class="form-group" id="InnerQuotstion_from">
                                <label for="exampleInputUsername1"> Quotstion-From</label>
                                <input type="text" class="form-control" id="quotstion_from" value=""
                                    name="quotstion_from" placeholder="Quotstion_from" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Price</label>
                                <input type="text" class="form-control" id="price" value="" name="price"
                                    placeholder="Price" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">T&C</label>
                                <textarea class="form-control" id="T&C" name="TandC" placeholder="T&C"> </textarea>

                            </div>
                            <div class="form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    Remember me
                                </label>
                            </div>
                            <button type="button" class="btn btn-inverse-primary mr-2">Submit</button>
                            <button type="button" class="btn btn-inverse-danger">Delete</button>
                            {{-- @endforeach --}}
                        </form>

                    </div>
                </div>
            </div>


            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Picture</h4>
                        <p class="card-description">

                        </p>
                        <form class="forms-sample">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Attachment</label>
                                <input class="form-control" type="file" name="attach" id="formFileMultiple"
                                    multiple>

                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@include('footer')
