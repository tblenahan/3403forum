<?php
session_start();
$status = $_REQUEST['status'] ?? null;
$psw = $_POST['psw'];

//users input password must match this
$coolPasswordToTestAgainst = "12Pa$$$$";



if($psw == $coolPasswordToTestAgainst){
    $_SESSION['loggedin'] = true;
}

echo $_SESSION['loggedin'];


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Deserts!</title>
</head>

<body>

    <!-- successful registration modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thank you for registering!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Thank you for registering for the CIRES Mentoring Program. You should receive an email shortly confirming your participation.  If you do not receive an email within 5 minutes, please contact ciresmentoring@colorado.edu
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>

    <!-- login modal -->
    <div id="login" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="login-form" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div id="psw-login-alert" class="alert alert-warning" role="alert" style="display: none;">
                            Your password must meet the requirements.
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="psw" type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button onclick="ifLoginValidSubmit()" class="btn btn-success">Login</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- register modal -->
    <div id="register" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="reg-form">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div id="psw-reg-alert" class="alert alert-warning" role="alert" style="display: none;">
                            Your password must meet the requirements.
                        </div>
                        <div class="form-group">
                            <label for="reg-password">Password</label>
                            <input type="password" class="form-control" id="reg-password">
                        </div>
                        <div class="form-group">
                            <label for="reg-confirmPassword">Password</label>
                            <input type="password" class="form-control" id="reg-confirmPassword">
                        </div>
                        <button onclick="ifRegValidSubmit()" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- header jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Tim's Desert Forum
            </h1>
            <p class="lead">Welcome! Feel free to post your latest, greates, or just favorite desert recipe.</p>
        </div>
    </div>

    <!-- navigation -->
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                aria-controls="pills-home" aria-selected="true">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                aria-controls="pills-profile" aria-selected="false">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-posts-tab" data-toggle="pill" href="#pills-posts" role="tab"
                aria-controls="pills-post" aria-selected="false">Posts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-login-tab" data-toggle="modal" role="tab" href="" data-target="#login"
                aria-controls="pills-login" aria-selected="false">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-register-tab" data-toggle="modal" role="tab" href="" data-target="#register"
                aria-controls="pills-register" aria-selected="false">Register</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="container-fluid">
                <h2 class="text-center">Latest Deserts Posted by Users</h2>

                <!-- example post -->
                <div class="container h-100">
                    <div class="row align-items-center h-100">
                        <div class="col-6 mx-auto">
                            <div class="card mt-4 mb-4">
                                <img class="card-img-top" src="./img/cheescake.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk
                                        of
                                        the
                                        card's content.</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><label>
                                            <h5>Author:</h5>
                                        </label> Cras justo odio</li>
                                </ul>
                                <div class="card-body">
                                    <button onclick="commentShowHide(1)" id="comment-post-id-1" class="btn btn-info">Comment</button>
                                    <div id="comment-area-post-id-1" style="display: none;">
                                        <form>
                                            <textarea></textarea>
                                            <div>
                                                <button type="submit" id="submit-comment" class="btn btn-primary">Post Comment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- example post -->
                <div class="container h-100">
                    <div class="row align-items-center h-100">
                        <div class="col-6 mx-auto">
                            <div class="card mt-4 mb-4">
                                <img class="card-img-top" src="./img/cheescake.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk
                                        of
                                        the
                                        card's content.</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><label>
                                            <h5>Author:</h5>
                                        </label> Cras justo odio</li>
                                </ul>
                                <div class="card-body">
                                    <button onclick="commentShowHide(2)" id="comment-post-id-2" class="btn btn-info">Comment</button>
                                    <div id="comment-area-post-id-2" style="display: none;">
                                        <form>
                                            <textarea></textarea>
                                            <div>
                                                <button type="submit" id="submit-comment" class="btn btn-primary">Post Comment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- example post -->
                <div class="container h-100">
                    <div class="row align-items-center h-100">
                        <div class="col-6 mx-auto">
                            <div class="card mt-4 mb-4">
                                <img class="card-img-top" src="./img/cheescake.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk
                                        of
                                        the
                                        card's content.</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><label>
                                            <h5>Author:</h5>
                                        </label> Cras justo odio</li>
                                </ul>
                                <div class="card-body">
                                    <button onclick="commentShowHide(3)" id="comment-post-id-3" class="btn btn-info">Comment</button>
                                    <div id="comment-area-post-id-3" style="display: none;">
                                        <form>
                                            <textarea></textarea>
                                            <div>
                                                <button type="submit" id="submit-comment" class="btn btn-primary">Post Comment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
        <div class="tab-pane fade" id="pills-posts" role="tabpanel" aria-labelledby="pills-posts-tab">
            <h3 class="text-center">Your Posts</h3>
            <div class="text-center">
                <button type="button" class="btn btn-secondary">Create New Post</button>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <!-- custom javascript -->
    <script src="./index.js"></script>

    <?php 
        //check if user has successfully registered echo javascript to show the appropriate modal
        if(isset($status) && $status == "success") {
            echo '<script type="text/javascript">$(window).on("load",function(){$("#successModal").modal("show");});</script>'; 
        }
    ?>
</body>

</html>