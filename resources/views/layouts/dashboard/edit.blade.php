<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Update Profile</title>

    <style>
        body {
        background: #BA68C8;
        font-family: cursive;
        }

        .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8;
        }

        .profile-button {
        background: #BA68C8;
        box-shadow: none;
        border: none;
        }

        .profile-button:hover {
        background: #682773;
        }

        .profile-button:focus {
        background: #682773;
        box-shadow: none;
        }

        .profile-button:active {
        background: #682773;
        box-shadow: none;
        }

        .back:hover {
        color: #682773;
        cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container w-75 rounded bg-white mt-5">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    {{-- <img class="rounded-circle mt-5"
                    src="{{ asset('../assets/images/' . (Auth::user()->profile_image ?: 'default.png')) }}"  width="90">

                    <span class="font-weight-bold">{{ Auth::user()->full_name }}</span><span class="text-black-50">{{ Auth::user()->email }}</span><span>United States</span> --}}

                    <form action="{{ route('profile.updateImage') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="profile_image">
                            <img class="rounded-circle mt-5" id="profile-preview"
                                src="{{ asset('assets/images/' . (Auth::user()->profile_image ?: 'default.png')) }}" width="90">
                            <input type="file" id="profile_image" name="profile_image" style="display: none;">
                        </label>
                        <p class="font-weight-bold">{{ Auth::user()->full_name }}</p>
                        <p class="text-black-50">{{ Auth::user()->email }}</p>
                        <button class="btn btn-primary mt-3" type="submit">Update Image</button>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>

                            <a href="/" class="text-dark">Back to home</a>
                        </div>
                        <h6 class="text-right">Edit Profile</h6>
                    </div>

                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" value="{{ Auth::user()->full_name }}" required>
                          </div>
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                          </div>
                          <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" id="password" name="password" minlength="8">
                          </div>
                        <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>
