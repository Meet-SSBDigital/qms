@extends('layouts.app')
@include('header')
<style>
    <style>.hidden {
        display: none;
    }
</style>
<div class="theme-setting-wrapper">
    <div id="settings-trigger"><i class="ti-settings"></i></div>
    <div id="theme-settings" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <p class="settings-heading">SIDEBAR SKINS</p>
        <div class="sidebar-bg-options selected" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
        </div>
        <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
        </div>
        <p class="settings-heading mt-2">HEADER SKINS</p>
        <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
        </div>
    </div>
</div>
<div id="right-sidebar" class="settings-panel">
    <i class="settings-close ti-close"></i>
    <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
                aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab"
                aria-controls="chats-section">CHATS</a>
        </li>
    </ul>
    <div class="tab-content" id="setting-content">
        <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
            aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
                <form class="form w-100">
                    <div class="form-group d-flex">
                        <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                        <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                    </div>
                </form>
            </div>
            <div class="list-wrapper px-3">
                <ul class="d-flex flex-column-reverse todo-list">
                    <li>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="checkbox" type="checkbox">
                                Team review meeting at 3.00 PM
                            </label>
                        </div>
                        <i class="remove ti-close"></i>
                    </li>
                    <li>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="checkbox" type="checkbox">
                                Prepare for presentation
                            </label>
                        </div>
                        <i class="remove ti-close"></i>
                    </li>
                    <li>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="checkbox" type="checkbox">
                                Resolve all the low priority tickets due today
                            </label>
                        </div>
                        <i class="remove ti-close"></i>
                    </li>
                    <li class="completed">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="checkbox" type="checkbox" checked>
                                Schedule meeting for next week
                            </label>
                        </div>
                        <i class="remove ti-close"></i>
                    </li>
                    <li class="completed">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="checkbox" type="checkbox" checked>
                                Project review
                            </label>
                        </div>
                        <i class="remove ti-close"></i>
                    </li>
                </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
                <div class="wrapper d-flex mb-2">
                    <i class="ti-control-record text-primary mr-2"></i>
                    <span>Feb 11 2018</span>
                </div>
                <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
                <div class="wrapper d-flex mb-2">
                    <i class="ti-control-record text-primary mr-2"></i>
                    <span>Feb 7 2018</span>
                </div>
                <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
        </div>
        <!-- To do section tab ends -->
        <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
                <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
                    All</small>
            </div>
            <ul class="chat-list">
                <li class="list active">
                    <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span
                            class="online"></span></div>
                    <div class="info">
                        <p>Thomas Douglas</p>
                        <p>Available</p>
                    </div>
                    <small class="text-muted my-auto">19 min</small>
                </li>
                <li class="list">
                    <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span
                            class="offline"></span></div>
                    <div class="info">
                        <div class="wrapper d-flex">
                            <p>Catherine</p>
                        </div>
                        <p>Away</p>
                    </div>
                    <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                    <small class="text-muted my-auto">23 min</small>
                </li>
                <li class="list">
                    <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span
                            class="online"></span></div>
                    <div class="info">
                        <p>Daniel Russell</p>
                        <p>Available</p>
                    </div>
                    <small class="text-muted my-auto">14 min</small>
                </li>
                <li class="list">
                    <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span
                            class="offline"></span></div>
                    <div class="info">
                        <p>James Richardson</p>
                        <p>Away</p>
                    </div>
                    <small class="text-muted my-auto">2 min</small>
                </li>
                <li class="list">
                    <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span
                            class="online"></span></div>
                    <div class="info">
                        <p>Madeline Kennedy</p>
                        <p>Available</p>
                    </div>
                    <small class="text-muted my-auto">5 min</small>
                </li>
                <li class="list">
                    <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span
                            class="online"></span></div>
                    <div class="info">
                        <p>Sarah Graves</p>
                        <p>Available</p>
                    </div>
                    <small class="text-muted my-auto">47 min</small>
                </li>
            </ul>
        </div>
        <!-- chat tab ends -->
    </div>
</div>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Quotation </h4>
            <p class="card-description">
                Basic Detailes For Quotation
            </p>
            <form class="forms-sample" method="POST" action="{{ route('quotationdatainsert') }}"
                enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName1">Company Name</label>
                            {{-- <input type="text" class="form-control" id="company_name" name="company_name"
                            placeholder="Name" required> --}}
                            <select class="form-control" id="ddl_companyname" name="ddl_companyname">
                                <option>Select Company</option>
                                @foreach ($company_name as $item)
                                    <option value="{{ $item->company_name }}">{{ $item->company_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @if ($errors->any())
                            <h4>{{ $errors->first() }}</h4>
                        @endif
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ddl_Project">Project Name</label>
                            <select class="form-control" id="ddl_Project" name="ddl_Project">
                                <option value="">Select Project</option>

                            </select>

                        </div>
                    </div>
                </div>

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">

                        <h4 class="card-title">Sub-Quotstion</h4>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered faqs " id="faqs">
                                <thead>
                                    <tr>
                                        <th>
                                            No
                                        </th>
                                        <th>
                                            Quotstion-From
                                        </th>
                                        <th>
                                            Price
                                        </th>
                                        <th>
                                            Attachment
                                        </th>
                                        <th>
                                            T&C
                                        </th>
                                        <th>
                                            Action
                                        </th>

                                    </tr>
                                </thead>
                                <tbody id="tbl_posts_body">

                                    <tr id="">
                                        <td>
                                            <div class="form-group">
                                                1.
                                            </div>
                                        </td>

                                        <td class="py-1">
                                            <div class="form-group">

                                                <input type="text" class="form-control" id="quotstion_from"
                                                    name="quotstion_from[]" placeholder="Quotstion_from" required>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">

                                                <input type="text" class="form-control" id="price[]"
                                                    name="price[]" placeholder="Price" required>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">

                                                <input class="form-control" type="file" name="attach[]"
                                                    id="formFileMultiple" multiple>
                                                <small id="helpId" class="form-text text-muted">Pdf Or Doc</small>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">


                                                <textarea style="width: 150px" class="form-control" id="T&C" name="TandC[]" placeholder="T&C"></textarea>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-group">

                                                <button type="button"class="btn btn-inverse-warning btn-fw"
                                                    id="btn_addmore" onclick="addfaqs();">
                                                    <i class="ti-plus btn-icon-prepend"></i>

                                                </button>

                                            </div>
                                        </td>
                                    </tr>

            </form>
            </tbody>
            </table>
        </div>
    </div>
</div>
<button type="submit" class="btn btn-inverse-success btn-fw" name="btn_quotation">
    <i class="ti-file btn-icon-prepend"></i>
    Submit
</button>
<button type="reset" class="btn btn-inverse-danger btn-fw">
    <i class="ti-reload btn-icon-prepend"></i>
    Reset
</button>
</form>


</div>
</div>
</div>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Quotation </h4>
            <p class="card-description">
                Basic Detailes For Quotation
            </p>
            <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="table-responsive">
                    <table id="table-1" class="display expandable-table" style="width:100%">
                        <thead>
                            <tr>

                                <th>
                                    Quotstion-From
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Attachment
                                </th>
                                <th>
                                    T&C
                                </th>
                                <th>
                                    Action
                                </th>

                            </tr>

                        </thead>
                        @foreach ($fetchdata as $databyid)
                            <tbody>

                                <tr id="">
                                    <td>{{ $databyid->quotstion_from }}</td>
                                    <td>{{ $databyid->price }}</td>
                                    <td>
                                        @php
                                            $image = $databyid->attach;
                                            
                                            $newimg = explode('|', $image);
                                        @endphp


                                        <div class="div">
                                            <div class="row ">

                                                @foreach ($newimg as $item)
                                                    @if (in_array($image = pathinfo($item, PATHINFO_EXTENSION), ['jpg', 'png', 'bmp','gif']))
                                                        <img class="img-thumbnail hidden" id="imageGallery" src="{{ $item }}"style="width: 100px; height: 100px;">
                                                    @else
                                                        <a href="{{ $item }}"><br>Download File <i class='ti-file btn-icon-prepend'
                                                                style='color:red'></i> </a>
                                                    @endif 
                                                @endforeach

                                            </div>
                                        </div>


                                        {{-- <img src=" " alt="" srcset="" class="img-thumbnail" > --}}


                                    </td>
                                    <td>{{ $databyid->TandC }}</td>
                                    <td>

                                        <a href="{{url('subquotation/'.$databyid->sub_id)}}" class="btn btn-inverse-warning btn-fw"><i
                                                class="ti-pencil-alt  btn-icon-prepend"> </i></a>
                                        <a href="{{url('Delete/'.$databyid->sub_id)}}" title="Detele" class="btn btn-inverse-danger btn-fw" onclick="return confirm('Are you sure you want to delete this item')"> <i class="ti-trash  btn-icon-prepend"> </i> </a>
                                    </td>


                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                    
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.da tatables.net/1.10.19/js/jquery.dataTables.min.js" ></script> --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('#ddl_companyname').change(function() {
            let ddl_companyname = $('#ddl_companyname').val();
            // alert(ddl_companyname);
            $.ajax({

                url: "/quotation",
                type: "post",
                data: 'ddl_companyname=' + ddl_companyname + '&_token={{ csrf_token() }}',

                success: function(response) {
                    $('#ddl_Project').html(response);
                }
            });
        });
    });
    $(document).ready( function () {
$('#myTable').DataTable();
} );
    // $(document).ready(function() {
    //     $("#btn_addmore").on("click", function() {

    //         $("#add_more").append('<td><div class="form-group">  1.</div> </td><td class="py-1"><div class="form-group"> <input type="text" class="form-control" id="quotstion_from"name="quotstion_from" placeholder="Quotstion_from" required></div></td><td><div class="form-group"><input type="text" class="form-control" id="price" name="price"  placeholder="Price" required></div></td><td><div class="form-group"> <input class="form-control" type="file" id="formFileMultiple" multiple></div> </td> <td><div class="form-group"><input type="text" class="form-control" id="T&C" name="T&C"placeholder="T&C" required> </div> </td> <td><div class="form-group"><button type="button"class="btn btn-inverse-warning btn-fw" id="removeTab"><i class="ti-plus btn-icon-prepend"></i></button></div> </td>');

    //     });


    //     $("#removeTab").on("click", function() {
    //         $("#add_more").children().last().remove();
    //     });
    // });
    // var faqs_row = 0;
    var Count = 2;

    function addfaqs() {
        if (Count > 5) {
            alert("You can only add 5 records.");
        } else {
            html = '<tr class="cb" id="faqs-row' + Count + '">';
            html += '<td><div class="form-group">' + Count + '</div></td> ';
            html +=
                '<td><div class="form-group"><input type="text" class="form-control"  id="quotstion_from' + Count +
                '" name="quotstion_from[]" placeholder="Quotstion_from" required></div></td>';
            html +=
                '<td> <div class="form-group"><input type="text" class="form-control" id="price' + Count +
                '" name="price[]" placeholder="Price" required></div></td>';
            html +=
                '<td> <div class="form-group"><input class="form-control" type="file" id="formFileMultiple' + Count +
                '" multiple name="attach[]"></div></td>';
            html +=
                '<td> <div class="form-group"><input type="text" class="form-control" id="T&C' + Count +
                '" name="TandC[]" placeholder="T&C" ></div></td>';
            html +=
                '<td> <div class="form-group"><button type="button" class="btn btn-inverse-danger btn-fw remove" id="removeTab" ><i class="ti-close btn-icon-prepend"></i></button></div></td>';

            html += '</tr>';
            Count++;
            $('#faqs tbody').append(html);
        }


        //    // faqs_row++;
    }


    $('tbody').on('click', '.remove', function() {
        elements = $(".cb");
        current = parseInt($(this).id);
        for (let itr = current; itr < elements.length - 1; itr++) {
            elements[itr].value = elements[itr + 1].value;
        }
        elements[elements.length - 1].remove();
        Count--;
    });

    
    $('.btn_quotation').on('click', function() {
        $('.faqs .cb').each(function(index, item) {
            console.log($('#amt1_' + index).val());

        });
    });
    $(document).ready(function() {
        $("#imageGallery").imagePopup({
            //overlay: "rgba(0, 100, 0, 0.5)"


        });

    });
</script>

@include('footer')
