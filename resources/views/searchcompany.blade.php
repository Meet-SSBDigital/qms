@extends('layouts.app')
@include('header')

<div class="row">
    <div class="col-md-12">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <form action="" method="post">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Search Company</h4>
                        <div class="form-group row">

                            </option>

                            <div class="col-5">

                                <div id="the-basics">
                                    <select class="form-control" id="ddl_companyname" name="ddl_companyname">
                                        <option value="All">Select Company</option>
                                        @foreach ($getdataforDDl as $key => $data)
                                            <option value="{{ $data->company_name }}">{{ $data->company_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-5">

                                <div id="bloodhound">
                                    <select class="form-control" id="ddl_status" name="ddl_status">
                                        <option value="All">All</option>
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-2">


                                <button type="submit" class="btn btn-primary mr-2" name="submit"
                                    value="btn-search">Submit</button>

                            </div>

                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Advanced Table</p>
                <div class="row">
                    <div class="col-12">
                        <form action="" method="post">

                            {{-- @forelse ($companymasterdata as $company_data) --}}
                            @if ($companymasterdata != '[]')
                                <input type="hidden" id="txt_data" name="txt_data" value="1" />
                                <div class="table-responsive">
                                    <table class="display expandable-table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Company-Name</th>
                                                <th>Email</th>
                                                <th>City</th>
                                                <th>Mobile</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        @foreach ($companymasterdata as $company_data)
                                            <tbody>
                                                <tr>
                                                    <th scope="row"></th>
                                                    <td>{{ $company_data->company_name }}</td>
                                                    <td>{{ $company_data->email }}</td>
                                                    <td>{{ $company_data->city }}</td>
                                                    <td>{{ $company_data->mobile }}</td>
                                                    <td class="font-weight-medium">
                                                        @if ($company_data->isactive == '1')
                                                            <div class="badge badge-success">Active</div>
                                                        @else
                                                            <div class="badge badge-danger">Deactive</div>
                                                        @endif
                                                    </td>
                                                    <td><a href={{ 'update/' . $company_data->company_id }}
                                                            class="" title="Edit">

                                                            <button type="button"
                                                                class="btn btn-inverse-success btn-icon">
                                                                <i class="mdi mdi-grease-pencil"></i>
                                                            </button> </a>
                                                        <a href={{ 'delete/' . $company_data->company_id . '/' . $company_data->isactive }}
                                                            title="Delete">

                                                            <button type="button"
                                                                class="btn btn-inverse-danger btn-icon"
                                                                onclick="return confirm('Are you sure you want to delete this Comapny?');">
                                                                <i class="mdi mdi-close"></i>
                                                            </button>
                                                        </a>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            @else
                                <input type="hidden" id="txt_data" name="txt_data" value="<?php echo $companymasterdata; ?>" />

                                {{-- @php
                                    echo "<script> DivHideShow('0'); </script>"; 
                                        // DivHideShow();
                                    @endphp --}}

                                <div class="alert alert-danger" id="DivError">No Data Found</div>
                            @endif
                            {{-- @empty


                                        <div class="alert alert-danger">No Data Found</div>
                                    @endforelse --}}



                            <script>
                                //   var x = document.getElementById("DivError");
                                // x.style.display = "none";
                                // window.onload = function() {
                                //     var y = document.getElementById("txt_data").value;
                                //     var x = document.getElementById("DivError");
                                //     if (y === "[]") {
                                //         x.style.display = "none";
                                //         //hide
                                //     }else if(y == "1"){
                                //         x.style.display = "none";
                                //     }
                                //     else {
                                //         x.style.display = "block";
                                //         //show
                                //     }
                                    //  function DivHideShow(){
                                    //     var x = document.getElementById("txt_data").value;
                                    //     var y = document.getElementById("DivError");
                                    //     // x.style.display = "none";
                                    //     if (x === "0") {
                                    //         y.style.display = "block";
                                    //     } else {
                                    //         y.style.display = "none";
                                    //     }
                                    // }

                                    // });
                                };
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@include('footer')
