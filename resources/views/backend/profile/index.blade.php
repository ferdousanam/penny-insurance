@extends('backend.layouts.app')

@section('title','Profile')


@push('css')
@endpush


@section('content')
    <!-- modals -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
                </div>
                <form id="edit-profile-form" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ route('profile.update', Auth::user()->id) }}">
                    <div class="modal-body">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="first-name" required="required" class="form-control col-md-7 col-xs-12" value="{{ Auth::user()->first_name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="{{ Auth::user()->last_name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="email" class="form-control col-md-7 col-xs-12" type="text" name="email" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="control-label col-md-3 col-sm-3 col-xs-12">Phone</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="phone" class="form-control col-md-7 col-xs-12" type="text" name="phone" value="{{ Auth::user()->phone }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fax" class="control-label col-md-3 col-sm-3 col-xs-12">Fax</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="fax" class="form-control col-md-7 col-xs-12" type="text" name="fax" value="{{ Auth::user()->fax }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="address" class="form-control col-md-7 col-xs-12" type="text" name="address" value="{{ Auth::user()->address }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="update_info" value="update-info" class="btn btn-primary">Update
                            Info
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <div class="modal fade edit-plan" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="updatePlanModal">Update Plan</h4>
                </div>
                <form id="edit-profile-form" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ route('profile.update', Auth::user()->id) }}">
                    <div class="modal-body">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="form-control" name="plan">
                                    <option>Choose Plan</option>
                                    @foreach ($all_plans as $plan)
                                        <option value="{{ $plan->id }}" <?php echo (Auth::user()->plan_id == $plan->id) ? 'selected' : '' ?>>{{ $plan->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="update_plan" value="update" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>User Profile</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>User Report
                                <small>Activity report</small>
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                <div class="profile_img">
                                    <div id="crop-avatar">
                                        <!-- Current avatar -->
                                        <img class="img-responsive avatar-view" src="{{ asset('backend/images/picture.jpg') }}" alt="Avatar" title="Change the avatar">
                                    </div>
                                </div>
                                <h3>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </h3>

                                <ul class="list-unstyled user_data">
                                    <li><i class="fa fa-map-marker user-profile-icon"></i>
                                        {{ Auth::user()->address }}
                                    </li>

                                    <li>
                                        <i class="fa fa-phone-square user-profile-icon"></i>
                                        {{ Auth::user()->phone }}
                                    </li>

                                    <li class="m-top-xs">
                                        <i class="fa fa-fax user-profile-icon"></i>
                                        {{ Auth::user()->fax }}
                                    </li>
                                </ul>

                                <!-- Edit Profile modal -->
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg">
                                    <i class="fa fa-edit m-right-xs"></i>Edit Profile
                                </button>
                                <br/>

                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>Success!</strong>
                                        {{ $message }}
                                    </div>
                                @endif
                                <div class="profile_title">
                                    <div class="col-md-6">
                                        <h2>Administrative/Billing Info</h2>
                                    </div>
                                </div>

                                <hr/>

                                <div class="col-md-6">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="current-plan">Current
                                        Plan <span class="required">*</span> :
                                    </label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        {{ Auth::user()->plan->name }}
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target=".edit-plan">
                                            Change Plan
                                        </button>
                                    </div>
                                    <div class="clearfix"></div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Owner's Email
                                        <span class="required">*</span> :
                                    </label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        {{ Auth::user()->email }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@push('scripts')

@endpush
