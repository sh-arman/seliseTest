<template>
    <div>
        <form method="POST" action="{{ route('register') }}">

                        <!-- Email input -->
                        <h4 class="text-center">Register To Store</h4>

                        <div class="form-outline mb-4">
                            <input type="text" name="firstname" class="form-control" />
                            <label class="form-label" for="form2Example1">Enter First Name</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="text" name="lastname" class="form-control" />
                            <label class="form-label" for="form2Example1">Enter Last Name</label>
                        </div>


                        <div class="form-outline mb-4">
                          <input type="email" name="email" id="form2Example1" class="form-control" />
                          <label class="form-label" for="form2Example1">Email address</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                          <input type="password" name="password" id="form2Example2" class="form-control" />
                          <label class="form-label" for="form2Example2">Password</label>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">Sign Up</button>

                        <!-- Register buttons -->
                        <div class="text-center">
                          <p>Already a member? <a href="{{ route('login-page') }}">Login</a></p>
                        </div>
                    </form>
    </div>
 </template>
