@extends('layouts.app')
@include('header1')


<div class="row justify-content-start ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Project Details</h3>
                        <form action="" method="post">
                            <div class="table-responsive">
                                <table
                                    class="table 
                               
                                table-bordered
                                align-middle">
                                    <thead class="">
                                        <caption>Project Detailes</caption>
                                        <tr>
                                            <th>Projectname</th>
                                            <th>Description</th>
                                            <th>Company Name </th>
                                            <th>Location</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>



                                    <tbody class="table-group-divider">
                                        @if ($searchprojectdatabyid->count())


                                            @foreach ($searchprojectdatabyid as $item)
                                                <tr class="">
                                                    <td scope="row">{{ $item->projectname }}</td>
                                                    <td>{{ $item->description }}</td>
                                                    <td>{{ $item->company_name }}</td>
                                                    <td>{{ $item->location }}</td>
                                                    <td>

                                                        <a
                                                            href="{{ 'editproject/' . $item->project_id }}"class="btn btn-outline-success"><i
                                                                class="mdi mdi-grease-pencil"></i></a>
                                                        <a href="{{ 'deleteproject/' . $item->project_id }}"class="btn btn-outline-danger"
                                                            onclick="return confirm('Are you sure you want to delete this Comapny?');"><i
                                                                class="mdi mdi-close"></i></a>


                                                    </td>

                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5">
                                                    <div class="alert alert-danger">
                                                        
                                                        <a name="" id="" 
                                                            href="" ><h1 class="display-4 text-center"> No Data Found Click Here To Back </h1></a>
                                                    </div>


                                                </td>

                                            </tr>
                                        @endif
                                    </tbody>

                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@include('footer1')
