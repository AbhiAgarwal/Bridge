<?php include_once('classes/signup.class.php'); ?>
<?php include_once('header.php'); ?>
<html>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="css/style2.css" type="text/css" media="screen"/>

<style>
		#section1{
	padding:30px;
	width:1000px;
	margin:0 auto;
	color:rgb(55,55,55);
}
#section1 h1{
	font-family:"BebasRegular", Arial, sans-serif;
	font-size:30px;
	font-weight:800;
	z-index:2;
}
#name, #username, #password, #email, #password_confirm{
	font-family:"PacificoRegular",Arial,sans-serif;
	font-size:30px;
	color:rgb(55,55,55);
	width:250px;
	z-index:2;
}

.input-xlarge { width: 254px; height: 20px; }

#name, #username, #password, #email, #password_confirm a{
	color:rgb(55,55,55);
	text-decoration:none;
	cursor:pointer;
	border: 0;
}
#name, #username, #password, #email, #password_confirm a:hover{
	color:rgb(55,55,55);
	text-decoration:none;
	cursor:pointer;
}
#signup_username{
	position:relative;
	bottom:15px;
	border-style:none;
	border-bottom-style:solid;
	background-color: transparent;
	outline:none;
	width:100px;
	height:20px;
	font-family:"BallparkWeiner",Arial,sans-serif;
	font-size:30px;
}

	</style>

	<style>
        span.reference{
            position:fixed;
            left:5px;
            top:5px;
            font-size:10px;
            text-shadow:1px 1px 1px #fff;
        }
        span.reference a{
            color:#555;
            text-decoration:none;
			text-transform:uppercase;
        }
        span.reference a:hover{
            color:#000;
            
        }
        h1{
            color:#ccc;
            font-size:36px;
            text-shadow:1px 1px 1px #fff;
            padding:20px;
        }
    </style>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript" src="sliding.form.js"></script>


<body>
	<div class="hero-unit" style="background-image:url('assets/css/bg.png');">
	<p style="background-color:#FFFFFF">
		<div class="row">
			        <div id="content">
            <h1>Fancy Sliding Form with jQuery</h1>
            <div id="wrapper">
                <div id="steps">
                    <form id="formElem" name="formElem" action="" method="post">
                        <fieldset class="step">
                            <legend>Account</legend>
                            <p>
                                <label for="username">User name</label>
                                <input id="username" name="username" />
                            </p>
                            <p>
                                <label for="email">Email</label>
                                <input id="email" name="email" placeholder="info@tympanus.net" type="email" AUTOCOMPLETE=OFF />
                            </p>
                            <p>
                                <label for="password">Password</label>
                                <input id="password" name="password" type="password" AUTOCOMPLETE=OFF />
                            </p>
                        </fieldset>
                        <fieldset class="step">
                            <legend>Personal Details</legend>
                            <p>
                                <label for="name">Full Name</label>
                                <input id="name" name="name" type="text" AUTOCOMPLETE=OFF />
                            </p>
                            <p>
                                <label for="country">Country</label>
                                <input id="country" name="country" type="text" AUTOCOMPLETE=OFF />
                            </p>
                            <p>
                                <label for="phone">Phone</label>
                                <input id="phone" name="phone" placeholder="e.g. +351215555555" type="tel" AUTOCOMPLETE=OFF />
                            </p>
                            <p>
                                <label for="website">Website</label>
                                <input id="website" name="website" placeholder="e.g. http://www.codrops.com" type="tel" AUTOCOMPLETE=OFF />
                            </p>
                        </fieldset>
                        <fieldset class="step">
                            <legend>Payment</legend>
                            <p>
                                <label for="cardtype">Card</label>
                                <select id="cardtype" name="cardtype">
                                    <option>Visa</option>
                                    <option>Mastercard</option>
                                    <option>American Express</option>
                                </select>
                            </p>
                            <p>
                                <label for="cardnumber">Card number</label>
                                <input id="cardnumber" name="cardnumber" type="number" AUTOCOMPLETE=OFF />
                            </p>
                            <p>
                                <label for="secure">Security code</label>
                                <input id="secure" name="secure" type="number" AUTOCOMPLETE=OFF />
                            </p>
                            <p>
                                <label for="namecard">Name on Card</label>
                                <input id="namecard" name="namecard" type="text" AUTOCOMPLETE=OFF />
                            </p>
                        </fieldset>
                        <fieldset class="step">
                            <legend>Settings</legend>
                            <p>
                                <label for="newsletter">Newsletter</label>
                                <select id="newsletter" name="newsletter">
                                    <option value="Daily" selected>Daily</option>
                                    <option value="Weekly">Weekly</option>
                                    <option value="Monthly">Monthly</option>
                                    <option value="Never">Never</option>
                                </select>
                            </p>
                            <p>
                                <label for="updates">Updates</label>
                                <select id="updates" name="updates">
                                    <option value="1" selected>Package 1</option>
                                    <option value="2">Package 2</option>
                                    <option value="0">Don't send updates</option>
                                </select>
                            </p>
							<p>
                                <label for="tagname">Newsletter Tag</label>
                                <input id="tagname" name="tagname" type="text" AUTOCOMPLETE=OFF />
                            </p>
                        </fieldset>
						<fieldset class="step">
                            <legend>Confirm</legend>
							<p>
								Everything in the form was correctly filled 
								if all the steps have a green checkmark icon.
								A red checkmark icon indicates that some field 
								is missing or filled out with invalid data. In this
								last step the user can confirm the submission of
								the form.
							</p>
                            <p class="submit">
                                <button id="registerButton" type="submit">Register</button>
                            </p>
                        </fieldset>
                    </form>
                </div>
                <div id="navigation" style="display:none;">
                    <ul>
                        <li class="selected">
                            <a href="#">Account</a>
                        </li>
                        <li>
                            <a href="#">Personal Details</a>
                        </li>
                        <li>
                            <a href="#">Payment</a>
                        </li>
                        <li>
                            <a href="#">Settings</a>
                        </li>
						<li>
                            <a href="#">Confirm</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
	</div>    
    </div>
</div>
  </body>

</div>
</p>
</div>
</html>
<?php include_once('footer2.php'); ?>