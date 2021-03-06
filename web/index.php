<?php
include_once("./class/storage.php");
?><!DOCTYPE html>
<html lang="en">
<head>
<meta property="og:image" content="/images/Skull_big.jpg" />
    <meta property="og:title" content="Send Secure information, passwords, links, dead drop" />

    <meta name="description" content="Allows you to create a one-time use link to securely send passwords or other information" />
    <meta name="keywords" content="dead drop,security,encryption,passwords,secure" />
    <meta name="author" content="metatags generator">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="3 month">
    <title>Send Secure information, passwords, links, dead drop</title>
    <!-- secure, password, encryption ->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script>

    <![endif]-->


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">


    <style>
        .dropComplete{
            display: none;
        }
        .plain{
            display:none;
        }
        .final{
            display: none;
        }

        .code{
            font-weight:bold;font-weight:normal;color:grey;letter-spacing:0pt;word-spacing:0pt;font-size:13px;text-align:left;font-family:tahoma, verdana, arial, sans-serif;line-height:1;
        }
        .final .decrypted{
            display: none;
        }

        .encrypted{ display: none;}

        code{
            white-space: pre-wrap;
        }

    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/skull.png">



    <script>
        <?php

            if (array_key_exists("id",$_GET)){
                 echo(sprintf("var dropid='%s';\r\n",$_GET["id"]));
            }
     ?>

    </script>
</head>

<body>
<input type="hidden" id="formKey" value="<?php print( Storage::timedKey()); ?>">
    <div class="container theme-showcase">

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron" id="masthead">
    <h1>One Time Dead Drop</h1>
    <p>Need to send some data securely? Password? Love Note? Haiku? This is the place.</p>
    <div class="col-sm-6"><a class="btn btn-primary btn-lg" href="#about">Learn more &raquo;</a></div>
    <div class="col-sm-6" data-toggle="tooltip" title="Tor is an anonymouse network, see : https://www.torproject.org/"><h2>This is available over <a href="http://yoewa2oiuuducqb5.onion/">TOR</a></h2></div>
    <div class="span4 offset4"><a style="float:left" href="#"
        onclick="
        window.open(
        'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href),
        'facebook-share-dialog',
        'width=626,height=436');
        return false;">
       <img style="float:left" src="/images/Facebook-Icon.png">
        </a> <a style="float:left" href="#"  onclick="
        window.open(
        'https://twitter.com/home?status='+encodeURIComponent(window.document.title)+'-'+encodeURIComponent(location.href),
        'facebook-share-dialog',
        'width=626,height=436');
        return false;">

            <img style="float:left"  src="images/twitter-bird-white-on-blue.png"></a></div>
    <div class="col-sm-2">

    </div>
    <br>
    <br>
</div>





        <div class="row dropComplete" >



            <h2>
                Ok, drop made- you need to send the message below to the person you want to pick up this drop
            </h2>

            <!-- /.col-sm-4 -->
        </div>
        <div class="row dropComplete" id="finalRow" >


            <div class="col-sm-12">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div class="well well-sm">

                        <div style="overflow: auto" id="finalData">

Hi,<br>
I'm sending you some secure information.
<br>
Click this url <br>
<span class="code" id="url"></span><br>
or if that doesnt work, copy and paste it into your web browsers location bar
<span class="code" id="url"></span>
<span id="plainUrlText"><br>The Drop is also available over the clear Internet here: <span class="code"  id="plainUrl"></span><br></span>
<br>
This will ONLY work once, so be careful with the password, and make sure to copy the data immediately.
<br>
This is the password
<br>
<strong><span id="pass"></span></strong>
<br>
After you pick it up, the data will self destruct and this link won't work anymore.
<br>
This link will only work for 24 hours, so please check shortly.
<br>
Thanks!
</div>
    </div>

                    </div>
                    <div class="panel-footer">
                        <button type="button" class="btn btn-lg btn-primary" onclick="window.location.assign(root)">Make another  Drop</button>
                    </div>
                </div>
            </div><!-- /.col-sm-4 -->


        </div>
        <p></p>
        <div class="page-header plain">
            <h1>Enter the info to secure:</h1>
        </div>

    <div class="row plain" id="plainTextRow">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <textarea name="message" id="message" style="width:100%" rows="11"></textarea>
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-lg btn-primary" onclick="symmetricEncrypt()">Make the drop!</button>
                </div>
            </div>
        </div><!-- /.col-sm-4 -->
    </div>

<div class="row encrypted" >


    <!-- /.col-sm-4 -->
</div>
<div class="row encrypted" id="finalRow" >
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Retrieve a the Drop</h3>
            </div>
            <div class="panel-body">
                <div style="overflow: auto">
                    Entering the password and clicking <strong>'Get The Drop'</strong> WILL delete the information on the server. Ensure you have correctly copied the password.
                </div>
                <br><br>
                <span class="col-sm-3"><input  type="text" id="password" placeholder="Enter your password here" size="25"/></span>
            </div>
            <div class="panel-footer">
                <button type="button" class="btn btn-lg btn-primary" onclick="getDrop()">Get The Drop</button>
            </div>
        </div>
    </div><!-- /.col-sm-4 -->
</div>

<div class="row final" >

    <div class="alert alert-success">
        Success
    </div>

    <!-- /.col-sm-4 -->
</div>
<div class="row final" id="finalRow" >
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Your Dead Drop</h3>
            </div>
            <div class="panel-body">
                <div style="overflow: auto;white-space:pre" id="decrypted">

                </div>
            </div>
            <div class="panel-footer">
                <button type="button" class="btn btn-lg btn-primary" onclick="window.location.assign(root)">Make your own Drop</button>
            </div>
        </div>
    </div><!-- /.col-sm-4 -->
</div>


<a id="about"></a>
<div class="page-header">
    <h1>How Does This Work?</h1>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>The Problem</h2>
                Sending someone secure data is a real hassle. If they don't have GPG, or some such tool, then what do you do? Send a user name in one email. password in another most likely.
                <br>
                This isn't great.<br>
                <b>That email sits on a server forever! If their email is EVER compromised, then so is your data.</b>

                <br>
                <br>
                Here we follow a couple basic steps.
                <ul>
                    <li>Dead Drops are only stored for 24 hours, then they are deleted</li>
                    <li>We never send your data over the wire unencrypted&ndash;we do it all via javascript in YOUR browser</li>
                    <li>We can not decrypt your data, we simply don't have the password</li>
                    <li>We do not use cookies. THE END.</li>
                    <li>We do not log your I.P.&ndash;we log the visit for load calculations, but nothing ABOUT you</li>
                    <li>We don't do encryption&ndash;we leave that to the clever people at <a target="_blank" href="http://bitwiseshiftleft.github.io/sjcl/">Stanford</a></li>
                    <li>We Err on the side of safety&ndash;if an incorrect password is entered, or if anything else goes wrong we delete the data. This is not a locker service</li>
                </ul>
                <h2>So, is this safe?</h2>
                The possible security issues depend on what form of communication you're using, ie: text message, email, carrier pigeon, etc.
                <br>
                The issues are
                <ul>
                    <li>someone gets the url/password before the intended recipient.
                    <li>If their email is compromised, and someone is monitoring it, well you're out of luck</li>
                    <li>you text the info, and someone else has the recipients phone</li>
                </ul>
                If these are deal breakers, you're probably a <a target="_blank" href="http://en.wikipedia.org/wiki/James_Bond">spy</a> of some sort, and thus shouldn't be using anonymous services on the internet.
                <br>
                The security of the encryption used is handled by the Symmetric Encryption engine developed at Stanford<br>
                <code>"SJCL is secure. It uses the industry-standard AES algorithm at 128, 192 or 256 bits; the SHA256 hash <br>
function; the HMAC authentication code; the PBKDF2 password strengthener; <br>
and the CCM and OCB authenticated-encryption modes."</code>
                <p></p>

                <h2>What if you're lying?</h2>
                Well, you're a clever person, have a look at the <a href="https://github.com/BillKeenan/dead-drop" target="_blank">code.</a> on github
                <h2>Technologies in Use</h2>
                <a target="_blank" href="https://gist.github.com/banksean/300494">MersenneTwister implementation in javacsript</a>
                <br>
                <a target="_blank" href="http://bitwiseshiftleft.github.io/sjcl/">Symmetric Encryption in javascript</a>
<br>
                <a href="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">Jquery 1.10.2</a>
<br>
                <a href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js">bootstrap 3.0.0.0</a>
                <br>

                <a href="/js/merseen.js">A local version of the merseen script referenced above</a>

                <h2>Suggestions? Ideas?</h2>
                <script>document.write('<'+'a'+' '+'h'+'r'+'e'+'f'+'='+"'"+'m'+'&'+'#'+'9'+'7'+';'+'i'+'l'+'t'+'&'+'#'+'1'+'1'+'1'+';'+'&'+
                        '#'+'5'+'8'+';'+'&'+'#'+'9'+'8'+';'+'i'+'%'+'6'+'C'+'%'+'6'+'C'+'%'+'4'+'0'+'b'+'%'+'6'+'9'+'g'+'%'+
                        '&'+'#'+'5'+'4'+';'+'D'+'o'+'j'+'&'+'#'+'3'+'7'+';'+'6'+'F'+'&'+'#'+'4'+'6'+';'+'%'+'6'+'E'+'%'+'6'+
                        '&'+'#'+'5'+'3'+';'+'t'+"'"+'>'+'b'+'i'+'l'+'l'+'&'+'#'+'6'+'4'+';'+'b'+'&'+'#'+'1'+'0'+'5'+';'+'g'+
                        'm'+'o'+'j'+'o'+'&'+'#'+'4'+'6'+';'+'n'+'&'+'#'+'1'+'0'+'1'+';'+'t'+'<'+'/'+'a'+'>');</script><noscript>[Turn on JavaScript to see the email address]</noscript>
<br>

            </div>

            <h3 class="panel-title"><a href="bill@bigmojo.net.asc" target="_blank">GPG Public key for bill@bigmojo.net</a></h3>
            </div>
        </div>
    </div><!-- /.col-sm-4 -->
</div> <!-- /container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
    <script src="/js/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/sjcl.js"></script>
<script src="/js/deaddrop.js?cacheBreak=<?php echo (time());?>"></script>
<script src="/js/merseen.js"></script>
<!-- local all hosted version
    <script type="text/javascript" src="/min/?f=assets/js/jquery.js,js/deaddrop.js,dist/js/bootstrap.min.js,assets/js/holder.js,js/sjcl.js,js/merseen.js&456&1"></script>
-->

</body>
</html>
