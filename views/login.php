<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<div class="container d-flex flex-column justify-content-center vh-100 align-items-center">
    <h3 class="bg-success my-4 text-white p-3">Login Form</h3>
    <form action="/login" method="post"
            class="container d-flex flex-column align-items-center">
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="text"  class="form-control" name="phone"/>
            <label class="form-label" >Phone</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" name="password" class="form-control"/>
            <label class="form-label" >Password</label>
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
<!--                <div class="form-check">-->
<!--                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked/>-->
<!--                    <label class="form-check-label" for="form2Example31"> Remember me </label>-->
<!--                </div>-->
            </div>

        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

        <!-- Register buttons -->
        <div class="text-center">
            <p>Not a member? <a href="#!">Register</a></p>
            <p>or sign up with:</p>
            <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
            </button>

            <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-google"></i>
            </button>

            <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-github"></i>
            </button>
        </div>
    </form>
</div>
</body>
</html>