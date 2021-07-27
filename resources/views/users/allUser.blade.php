@extends('master')

@section('title', 'Admin Dashboard')
@section('dashboard-title', 'Dashboard')
@section('breadcrumb-title', 'Show All User Information')

@section('stylesheet')
    <!-- <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@8.10.0/dist/sweetalert2.css" rel="stylesheet"> -->
@endsection

@section('container')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-gray-light">
                            <h3 class="card-title">User List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; ?>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->mobile}}</td>
                                            @if ($user->role=='user')
                                               <td><button class="btn btn-success btn-xs">User</button></td>
                                            @else
                                               <td><button class="btn btn-danger btn-xs">No Role</button></td>
                                            @endif
                                        @if ($user->status==1)
                                            <td><button class="btn btn-success btn-xs">Active</button></td>
                                        @else
                                            <td><button class="btn btn-danger btn-xs">Not Active</button></td>
                                        @endif
                                        <td>{{$user->created_at}} </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('custom_script')
<script>
    $(document).ready(function() {
        $('#example2').DataTable( {
            "info": true,
            "autoWidth": false,
            scrollX:'50vh',
            scrollY:'50vh',
            scrollCollapse: true,
        } );
    } );
</script>
@endsection