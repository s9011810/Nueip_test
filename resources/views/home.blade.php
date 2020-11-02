@extends('welcome')

@section('content')
    <div class="container">
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">註冊</button>
{{--        <a href="{{ route('register') }}">註冊</a>--}}
    <!-- Modal -->
    <div class="modal" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">註冊</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                        <div class="form-group row">
                            <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                            <label for="login_name" class="col-md-4 col-form-label text-md-right">帳號</label>

                            <div class="col-md-6">
                                <input id="login_name" type="text" class="form-control @error('login_name') is-invalid @enderror" name="login_name" value="{{ old('login_name') }}" required autocomplete="login_name" autofocus>

                                @error('login_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">信箱</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">密碼</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">驗證密碼</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sex" class="col-md-4 col-form-label text-md-right">性別</label>

                            <div class="col-md-6">
                                <select class="form-control" id="sex" name="sex">
                                    <option>男</option>
                                    <option>女</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="remarks" class="col-md-4 col-form-label text-md-right">備註</label>

                            <div class="col-md-6">
                                <textarea id="remarks" name="remarks" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">生日</label>

                            <div class="col-md-6">
                                <input id="birthday" type="date" class="form-control" name="birthday" required>
                            </div>
                        </div>
                </div>
                <div class="modal-footer  d-flex justify-content-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">關閉</button>
                        <button type="submit"  class="btn btn-success" name="Insert" id="Insert" value="Insert">
                        確認新增</button>
                </div>
            </div>

        </div>
    </div>
    </div>
<script>
    $(document).ready(function(){
        $(document).on("click", "#Insert", function(event){
            let name = $('#login_name').val();
            let email = $('#email').val();
            let phone = $('#phone').val();
            let sex = $('#sex').val();
            let password = $('#password').val();
            let remarks = $('#remarks').val();
            let birthday = $('#birthday').val();
            if(name!=""&&email!=""&&phone!=""&&sex!=""&&password!=""&&remarks!=""&&birthday!=""){
                $.ajax({
                    url:"/register",
                    type:"POST",
                    data: {
                        _token: $("#csrf").val(),
                        type: 1,
                        name: name,
                        email: email,
                        phone: phone,
                        password: password,
                        remarks: remarks,
                        sex: sex,
                        birthday: birthday,
                    },
                    cache: false,
                    success: function (dataResult) {
                        console.log(dataResult);
                        let test_dataResult = JSON.parse(dataResult);
                        if(test_dataResult.statusCode==200){
                            window.location = "/register";
                        }
                        else if(test_dataResult.statusCode==201){
                            alert("Error occured !");
                        }
                    }
                })
            }
            else{
                alert('Please fill all the field !');
            }
        });
    });
    // function submit_form() {
    //     alert("確認新增");
    // }
</script>
@endsection
