<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/image (5).png') }}" />
    <title>Barangay Connect</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');


    body {
        font-family: 'Poppins', sans-serif;
        background: #ececec;
    }


    /*------------ Login container ------------*/


    .box-area {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
    }


    /*------------ Right box ------------*/




    /*------------ Custom Placeholder ------------*/


    ::placeholder {
        font-size: 16px;
    }


    .rounded-4 {
        border-radius: 20px;
    }


    .rounded-5 {
        border-radius: 30px;
    }


    /*------------ For small screens------------*/


    @media only screen and (max-width: 768px) {
        .box-area {
            padding: 20px;
        }


        .right-box {
            padding: 20px;
        }
    }
</style>
<body><br><br>
    <!-- Main Container -->
    
    <div class="container box-area">
        <!-- Login Container -->
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <!-- Right Box -->
         
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    
                    <input type="hidden" name="token" value="{{ $token }}">


                        <div class="header-text mb-4">
                            <h2>Welcome Back!</h2>
                            <p>You can now reset your password!</p>
                        </div>
                        @if(session('alert'))
                        <script>
                            alert("{{ session('alert') }}");
                        </script>
                    @endif
                    <div class="input-group mb-3">
                        <input type="text" id="email_address" class="form-control" name="email" required autofocus placeholder="Please input email">
                        <span class="input-group-text"><i class="far fa-envelope"></i></span>
                    </div>
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                   
                    <div class="input-group mb-3">
                        <input type="password" id="password" class="form-control" name="password" required autofocus placeholder="Input Password">
                        <span class="input-group-text"><i class="far fa-eye" id="togglePassword1" style="cursor: pointer;"></i></span>
                       
                    </div>
                    @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                   
                    <div class="input-group mb-3">
                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus placeholder="Confirm Password">
                        <span class="input-group-text"><i class="far fa-eye" id="togglePassword2" style="cursor: pointer;"></i></span>
                      
                    </div>
                    @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                       
                     
                           
                            <div style="margin-top:10px" class="input-group mb-3">
                                <button style="background-color: #11CC72;" type="submit" class="btn btn-lg btn-primary w-100 fs-6">
                                    Reset Password
                                </button>
                            </div>
                           
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap and other scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        const togglePassword1 = document.querySelector('#togglePassword1');
        const password1 = document.querySelector('#password');
   
        togglePassword1.addEventListener('click', function () {
            const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
            password1.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
   
        const togglePassword2 = document.querySelector('#togglePassword2');
        const password2 = document.querySelector('#password-confirm');
   
        togglePassword2.addEventListener('click', function () {
            const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
            password2.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>



