<?php

//headerBottom.php


echo'
                </ul>
            </div>
        </nav>
    </div>
    <!-- Navigation !END! -->      

    <!-- Sticky Language Menu - Desktop only -->
    <!-- <div id="sticky">
    <a class="dropdown-item font-weight-bold" class="stickyLang" href="#"><img src="../../img/cro_lang.png" id="croIcon" alt="Croatian Flag Icon" height="30" width="30"></a>
    <a class="dropdown-item font-weight-bold" class="stickyLang" href="#"><img src="../../img/ger_lang.png" id="gerIcon" alt="German Flag Icon" height="30" width="30"></a>
    <a class="dropdown-item font-weight-bold" class="stickyLang" href="#"><img src="../../img/eng_lang.png" id="engIcon" alt="English Flag Icon" height="30" width="30"></a>
    </div> -->
    <!-- Sticky Language Menu - Desktop only  !END!-->
';

echo '

    <div id="profileNavigation" class="backgroundBlack">
        <div class="interface">
            <div id="logo">
                <a href="index.php"><p class="text-center font-weight-bolder mt-3">Firm</p></a>
            </div>
            <div id="btnPos"><a href="#" class="profileBtn">X</a></div>
            
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#profile">LogIn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#home">SignUp</a>
                </li>
            </ul>

            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active show" id="profile">
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <span>E-mail:</span><input type="email" name="email" id="inputEmail" class="form-control my-3"  required autofocus>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <span>Password:</span><input type="password" name="passw" id="inputPassword" class="form-control my-3"  required>
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"><span class="ml-2">Remember me</span>
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
                </div>
                <div class="tab-pane fade" id="home">
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <span>E-mail:</span><input type="email" name="email" id="inputEmail" class="form-control my-3"  required autofocus>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <span>Password:</span><input type="password" name="passw" id="inputPassword" class="form-control my-3"  required>
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"><span class="ml-2">Remember me</span>
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
                </div>
            </div>
        </div> 
    </div>
';

?>