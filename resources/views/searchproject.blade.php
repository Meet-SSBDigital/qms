@extends('layouts.app')
@include('header')

<div class="row">
    <div class="col-md-12">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <form action="" method="post">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Search Project</h4>
                        <div class="form-group row">

                            </option>

                            <div class="col-5">


                                <div id="bloodhound">
                                    <select class="form-control" id="ddl_companyName" name="ddl_companyName">
                                        <option value="All">Select
                                            Compapy</option>
                                        @foreach ($getdataforDDl as $key => $data)
                                            <option value="{{ $data->company_name }}">{{ $data->company_name }}</option>
                                        @endforeach

                                    </select>


                                </div>
                            </div>
                            <div class="col-5">
                                <div id="the-basics">
                                    <select class="form-control" id="ddl_projectname" name="ddl_projectname">
                                        <option value="All">Select Project</option>

                                    </select>
                                </div>


                            </div>
                            <div class="col-2">


                                <button type="submit" class="btn btn-primary mr-2" name="search_project" 
                                    value="">Submit</button>

                            </div>

                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
























<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#ddl_companyName').change(function() {
            let ddl_companyname = $('#ddl_companyName').val();
            // alert(ddl_companyname);
            $.ajax({

                url: "/getsearchproject",
                type: "post",
                data: 'ddl_companyname=' + ddl_companyname + '&_token={{ csrf_token() }}',

                success: function(response) {
                    $('#ddl_projectname').html(response);
                }
            });
        });
    });
</script>

@include('footer')
