<?php
include( 'db.php' );
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
    <title>Chat Box v1.0</title>
    <script>
        function ajax() {
            let req = new XMLHttpRequest();
            req.onreadystatechange = function () {
                if (req.readyState === 4 && req.status === 200){
                    document.getElementById('chat').innerHTML = req.responseText;
                }
            };
            req.open('GET', 'chat.php', true);
            req.send();
        }
        setInterval(function () {
            ajax();
        }, 1000);
    </script>
</head>
<body onload="ajax();">
<div class="container">
    <div class="col-md-6 offset-3">
        <h3 class="text-center">Chat Box</h3>
        <div class="jumbotron">
            <div id="chat"></div>
        </div>
        <form action="index.php" method="post">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Name</span>
                </div>
                <input type="text" class="form-control" placeholder="Enter your name" autofocus name="name">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Message</span>
                </div>
                <textarea name="message" rows="1" class="form-control" placeholder="Enter your message"></textarea>
            </div>
            <input class="btn btn-outline-dark btn-block btn-sm" type="submit" value="Submit" name="submit">
            <input class="btn btn-outline-dark btn-block btn-sm" type="reset" value="Reset">
        </form>
		<?php
		// send message
		if ( isset( $_POST['submit'] ) ) {
			$name    = $_POST['name'];
			$message = $_POST['message'];

			$query2 = "insert into chat (name, message) values ('$name','$message')";
			$run    = $con->query( $query2 );
		}
		?>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
</body>
</html>