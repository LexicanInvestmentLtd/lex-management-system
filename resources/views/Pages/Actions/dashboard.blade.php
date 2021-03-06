@extends('app')
@section('contents')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Dashboard</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Dashboards</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted font-weight-medium">Users</p>
                                            <h4 class="mb-0">{{count($users)}}</h4>
                                        </div>

                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title">
                                                <i class="bx bx-user font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <a href="{{route('user.view-employees')}}">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted font-weight-medium">Employees</p>
                                                <h4 class="mb-0">{{count($employee_numbers)}}</h4>
                                            </div>

                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-user-circle font-size-24"></i>
                                                            </span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted font-weight-medium">Stores</p>
                                            <h4 class="mb-0">{{count($stores)}}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-primary">
                                                            <i class="bx bx-store-alt font-size-24"></i>
                                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted font-weight-medium">Department</p>
                                            <h4 class="mb-0">{{count($departments)}}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-primary">
                                                            <i class="bx bxs-landmark font-size-24"></i>
                                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--<!-- end row -->

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4 float-sm-left">Email Sent</h4>
                            <div class="float-sm-right">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Week</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Month</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">Year</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                            <div id="stacked-column-chart" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div>--}}
                </div>
            </div>
            <!-- end row -->

            <div class="row d-none">
                <div class="col-xl-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-5">Latest System  logs</h4>
                            <ul class="verti-timeline list-unstyled">
                                {{--@foreach($logs as $log)--}}
                                    <li class="event-list">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-right-arrow-circle font-size-18"></i>
                                        </div>
                                        <div class="media">
                                            <div class="mr-3">
                                                <h5 class="font-size-14">{{--{{$log->created_at}}--}} <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ml-2"></i></h5>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    {{--{{$log->user->first_name. " " . $log->action}}--}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                {{--@endforeach--}}
                            </ul>
                            <div class="text-center mt-4"><a href="#" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ml-1"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Latest Registered Users</h4>
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Email</th>
                                        <th>First Name</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                         {{--@foreach($latest_users as $latest_user)--}}
                                             <tr>
                                                 {{--<td>{{$latest_user->email}}</td>
                                                 <td>{{$latest_user->first_name}}</td>
                                                 <td>{{$latest_user->created_at}}</td>--}}
                                                 <td>
                                                     <!-- Button trigger modal -->
                                                     <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-toggle="modal" data-target=".exampleModal">
                                                         View Details
                                                     </button>
                                                 </td>
                                             </tr>
                                         {{--@endforeach--}}
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                {{--<div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Latest Transactions</h4>
                            <div class="text-center">
                                <div class="mb-4">
                                    <i class="bx bx-map-pin text-primary display-4"></i>
                                </div>
                                <h3>1,456</h3>
                                <p>San Francisco</p>
                            </div>

                            <div class="table-responsive mt-4">
                                <table class="table table-centered table-nowrap">
                                    <tbody>
                                    <tr>
                                        <td style="width: 30%">
                                            <p class="mb-0">San Francisco</p>
                                        </td>
                                        <td style="width: 25%">
                                            <h5 class="mb-0">1,456</h5></td>
                                        <td>
                                            <div class="progress bg-transparent progress-sm">
                                                <div class="progress-bar bg-primary rounded" role="progressbar" style="width: 94%" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="mb-0">Los Angeles</p>
                                        </td>
                                        <td>
                                            <h5 class="mb-0">1,123</h5>
                                        </td>
                                        <td>
                                            <div class="progress bg-transparent progress-sm">
                                                <div class="progress-bar bg-success rounded" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="mb-0">San Diego</p>
                                        </td>
                                        <td>
                                            <h5 class="mb-0">1,026</h5>
                                        </td>
                                        <td>
                                            <div class="progress bg-transparent progress-sm">
                                                <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>--}}
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Latest Employee</h4>
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Title</th>
                                        <th>Surname</th>
                                        <th>First Name</th>
                                        <th>Other Name</th>
                                        <th>DOB</th>
                                        <th>State</th>
                                        <th>Home Town</th>
                                        <th>Lg</th>
                                        <th>Reg. Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($employees as $key => $employee)
                                        <tr>
                                            <td>{{$employee->title_id != null ? $employee->title->title : "Nill"}}</td>
                                            <td>
                                                {{$employee->surname != null ? $employee->surname : "Nill"}}
                                            </td>
                                            <td>
                                                {{$employee->first_name != null ? $employee->first_name : "Nill"}}                                        </td>
                                            <td>
                                                {{$employee->other_name != null ? $employee->other_name : "Nill"}}
                                            </td>
                                            <td>
                                                {{$employee->dob != null ? $employee->dob : "Nill"}}
                                            </td>
                                            <td>
                                                {{$employee->state_id != null ? $employee->state->state : "Nill"}}
                                            </td>
                                            <td>
                                                {{$employee->home_town_id != null ? $employee->homeTown->home_town : "Nill"}}
                                            </td>
                                            <td>
                                                {{$employee->lg_id != null ? $employee->lg->lg : "Nill"}}
                                            </td>
                                            <td>
                                                {{$employee->registrationStatus!= null ? $employee->registrationStatus->percentage.'%' : 0}}
                                            </td>
                                            <td>
                                                <a href="{{route('user.view-employee-details', ['token' => $employee->token])}}">
                                                <span data-toggle="tooltip" data-placement="top" title data-original-title="Edit Employee's Details">
                                                    <i class="mdi mdi-eye mdi-24px"></i>
                                                </span>
                                                </a>
                                                {{--
                                                     <a href="{{route('user.activate-user', ['token' => $user->token])}}">
                                                         <span data-toggle="tooltip" data-placement="top" title data-original-title="Activate User">
                                                             <i class="mdi mdi-check-outline mdi-24px"></i>
                                                         </span>
                                                     </a>

                                                 <a href="#edit-user-{{$key}}" data-toggle="modal" >
                                                     <span data-toggle="tooltip" data-placement="top" title data-original-title="Edit User's Role">
                                                         <i class="mdi mdi-account-convert mdi-24px"></i>
                                                     </span>
                                                 </a>--}}
                                                {{--@if($user->role_id == 1)
                                                    <a href="#edit-user-{{$key}}" data-toggle="modal" >
                                                        <span data-toggle="tooltip" data-placement="top" title data-original-title="Edit User's Membership Level">
                                                            <i class="mdi mdi-account-convert mdi-24px"></i>
                                                        </span>
                                                    </a>
                                                @endif
                                                <a href="{{route('admin.view-user-details', ['token' => $user->token])}}">
                                                    <span data-toggle="tooltip" data-placement="top" title data-original-title="View User's Details">
                                                        <i class="mdi mdi-eye-circle mdi-24px"></i>
                                                    </span>
                                                </a>
                                                @if($user->active == 1)
                                                    <a href="{{route('admin.suspend-user', ['token' => $user->token])}}">
                                                        <span data-toggle="tooltip" data-placement="top" title data-original-title="Suspend User">
                                                            <i class="mdi mdi-close-thick mdi-24px"></i>
                                                        </span>
                                                    </a>
                                                @else
                                                    <a href="{{route('admin.activate-user', ['token' => $user->token])}}">
                                                        <span data-toggle="tooltip" data-placement="top" title data-original-title="Activate User">
                                                            <i class="mdi mdi-check-outline mdi-24px"></i>
                                                        </span>
                                                    </a>
                                                @endif--}}
                                                {{--
                                                                                            <button class="btn btn-sm btn-outline-primary waves-effect waves-light" data-toggle="modal" data-target="#edit-store-{{$key}}"> Edit</button>
                                                --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
@endsection
