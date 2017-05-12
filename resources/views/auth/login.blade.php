@extends('layouts.auth')
@section('title','Login User')
@section('contents')
<!--Preloader-->
<div class="preloader-it">
    <div class="la-anim-1"></div>
</div>
<!--/Preloader-->
<div class="wrapper pa-0">
    <!-- Main Content -->
    <div class="page-wrapper pa-0 ma-0">
        <div class="container-fluid">
            <!-- Row -->
            <div class="table-struct full-width full-height">
                <div class="table-cell vertical-align-middle">
                    <div class="auth-form  ml-auto mr-auto no-float">
                        <div class="panel panel-default card-view mb-0">
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">Sign In</h6>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="row">
                                     <div class="col-sm-12 col-xs-12">
                                        <div class="form-wrap">
                                            <form action="/postLogin" method="POST">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="exampleInputEmail_2">Email address</label>
                                                    <div class="input-group">
                                                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                                                        <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="exampleInputpwd_2">Password</label>
                                                    <div class="input-group">
                                                        <input type="password" name="password" class="form-control" placeholder="Enter password">
                                                        <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="checkbox checkbox-success pr-10 pull-left">
                                                        <input id="checkbox_2"  type="checkbox">
                                                        <label for="checkbox_2"> keep me logged in </label>
                                                    </div>
                                                    <a class="capitalize-font txt-danger block pt-5 pull-right" href="#">forgot password</a>
                                                    <div class="clearfix"></div>
                                                </div>

                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-success btn-block" value="Submit">
                                                </div>
                                            </form>
                                            <div class="form-group mb-0">
                                                <span class="inline-block pr-5">Don't have an account?</span>
                                                <a class="inline-block txt-danger" href="{{url('register')}}">Sign Up</a>
                                            </div>  

                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->   
    </div>

</div>
<!-- /Main Content -->

</div>
@endsection
@section('js')
{{ HTML::script('dist/js/auth.js') }}
<script type="text/javascript">
    $(document).ready(function () {
        $('#scn').attr('disabled', 'disabled');
        $('select[name="role_id"]').on('change', function () {
            var others = $(this).val();
            if (others == "2") {
                $('#scn').removeAttr('disabled');
            } else {
                $("#scn").val("");
                $('#scn').attr('disabled', 'disabled');
            }
        });
    });
</script>
@endsection