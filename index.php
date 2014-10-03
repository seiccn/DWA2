<?php 
session_start(); #programs runs from start to finish, persistant array between php calls, id makes it unique
error_reporting(E_ALL); # Report all PHP errors
ini_set('display_errors',E_ALL | E_STRICT);
?>

<!DOCTYPE html>
<html lang="en">
	
<head>

<!-- Basic configuration -->
<title>Portfolio of Stephanie Ness for Dynamic Web Applications</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="Stephanie Ness">
<meta name="description" content="Basic portfolio website for DWA15.">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="HTML, CSS, Portfolio">


<link rel="shortcut icon" href="img/icon.png">
<link rel="apple-touch-icon" href="img/touch.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/touch72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/touch114.png">



<!-- Patch for Internet Explorer -->
<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Own CSS -->
<link href="css/custom.css" rel="stylesheet">

<!-- Bootstrap CSS File; in one line, smaller file size -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Embed respond.min.js from github scottdehl -->

<script src="js/respond.js"></script>

<!--  Fonts from https://www.google.com/fonts/ -->
<link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,300italic,700italic,400italic' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


<meta charset="utf-8">
<meta name="description" content="classmax"/>
<meta name="google" content=""/>
<meta name="googlebot" content="noindex,nofollow"/>
<meta name="keywords" content=""/>
<meta name="robots" content=""/>
<meta name="verify" content=""/>
</head>
<body>


<!-- Navigation fixed to the top -->
<!-- Navigation fixed to the top -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                	
                
                Stephanie Ness Portfolio
                </a>
<!-- endtag of the div class="navbar-header" -->                 
		</div>
<!-- Navigation items -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="http://stephanien.siteground.net/dwa15/project1/DWA1/">Project 1</a>
                    </li>
                    <li>
                        <a href="http://stephanien.siteground.net/dwa15/project1/DWA2/index.php">Project 2</a>
                    </li>
                    <li>
                        <a href="#">Project 3</a>
                    </li>
                     <li>
                        <a href="#">Project 4</a>
                    </li>
                </ul>
<!-- endtag of the class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" -->                
			</div>
<!-- endtag of the div class="container" -->
	</div>
<!-- endtag of the nav class="navbar navbar-default navbar-fixed-top" -->
</nav>


<!-- Header -->
<!-- Header -->
    <div class="customheader">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="greeting">
                        <h1>Project 2: </h1>
                        <hr class="customdivision">
 
                    </div>
                </div>
            </div>

        </div>
<!-- end of the container  -->

    </div>
<!-- end of my custom header -->

<?php

/* In class php we generate the passwords, in index php we have the form and the input.
 * Embed the class.php, require checks if the class is already loaded once */

require_once('class.php');

/* Check if name words was submitted by the form via the method attribute POST which is only limited by server configuration.*/

if (isset($_POST['words'])) {
	
/* We name a variable and assign the value of the array*/
	$p_words=(int)$_POST['words'];
	//Avoid user from entering a lot of words.
	if ($p_words<0 || $p_words>50) {
		echo "Please limit the number of words to 50.";
		$p_words="";
		$p_numbers=0;
		$p_special=0;
		$p_uppercase=0;
		$formdisplay="";
	} else {
		
	/* We do the same for the name numbers of the form below. The difference is that we check whether the checkbox was selected.*/
		if (isset($_POST['numbers'])) {
			if ($_POST['numbers']=="on") {
				$p_numbers=true;
			} else {
				$p_numbers=false;
			}
		} else {
			$p_numbers=false;
		}
	
	/* We do the same for the name special. Again, we check whether it was checked.*/
		if (isset($_POST['special'])) {
			if ($_POST['special']=="on") {
				$p_special=true;
			} else {
				$p_special=false;
			}
		} else {
			$p_special=false;
		}
	
	/* We do the same for the name uppercase. Again, we check whether it was checked.*/
		if (isset($_POST['uppercase'])) {
			if ($_POST['uppercase']=="on") {
				$p_uppercase=true;
			} else {
				$p_uppercase=false;
			}
		} else {
			$p_uppercase=false;
		}
	
	/* We have embedded the class Gen() in line 135. It is inside of class.php $pw is the class that we can use without having to use inheritance. In $pw we now have Gen()*/
		
		$pw=new Gen();
	
	/* We call the function Start with the values of the form and save it into the variable $formdisplay which we are going to display later. */
		$formdisplay= $pw->Start($p_words, $p_numbers, $p_special, $p_uppercase);
	}
} else {
	$p_words="";
	$p_numbers=0;
	$p_special=0;
	$p_uppercase=0;
	$formdisplay="";
}
?>

    <div class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="clearfix"></div>
                  <h2 class="boxheading">XKCD Style Calculator</h2>
                  <p><h3></h3>What is the title of your application?</h3>

The title of my application is XKCD Style Password generator.

<h3>What is the main purpose of goal of your application?</h3>

The goal of the calculator is to generate passwords using a list in a database. You may specify the number of words and whether numbers, special chars and uppercase chars shall be used.

The calculator uses uncommon non-gibberish base words and will generate a random phrase consisting of the number of words that you specified. My password generator includes German last names that make the phrases easier to remember for native speakers.

In information theory, entropy is the average amount of information contained in each message received. To calculate the entropy of a password, the character set is raised to the power of the password length.
A “good/strength” password has at least 80 bits of security, i.e., 2^{80} = 1.2*10^{24} different possibilities for the random passwords. 
To have 80 bits of security, a password needs about 13 characters while a passphrase only needs about 5 words! However, a passphrase chosen out of 10K words needs 7 words to have the same strength.
To overcome the 7 word problem, we exchanged several characters of the words with random numbers, random special characters and uppercase letters. We use a list of 478 words, but the random words already include 3 random letters at the start which are included in the list. Thus the list consisting of words with random letters and German last names that we use already makes our passwords more secure.

The entropy is calculated with the formula:
log_{2}(x) = ln(x)/ln(2).)
                  	
                  </p>

					<form action="index.php" method="POST">
						<TABLE>
							<TR>
								<TD>Number of words</TD>
								<TD><INPUT type="text" name="words" maxlength="2" size="2" value="<?php echo $p_words;?>"></TD>
							</TR>
							<TR>
								<TD>Use numbers</TD>
								<TD><INPUT type="checkbox" name="numbers"<?php if ($p_numbers) { echo " checked"; } ?>></TD>
							</TR>
							<TR>
								<TD>Use special chars</TD>
								<TD><INPUT type="checkbox" name="special"<?php if ($p_special) { echo " checked"; } ?>></TD>
							</TR>
							<TR>
								<TD>Use uppercase chars</TD>
								<TD><INPUT type="checkbox" name="uppercase"<?php if ($p_uppercase) { echo " checked"; } ?>></TD>
							</TR>
							<TR>
								<TD> </TD>
								<TD><INPUT type="submit" value="Generate password" name="B1"></TD>
							</TR>
						 </TABLE>
					</form>
<?php echo $formdisplay;
?>
                </div>
                </div>
            </div>
        </div>
   </div>
</body>
</html>
