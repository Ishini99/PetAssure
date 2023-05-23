<?php
// Update the details below with your MySQL details

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'petassure';

<<<<<<< HEAD
=======
<<<<<<<< HEAD:client/reviewsVet.php
========



>>>>>>>> 0db3d1641deba66d1c6084948fe6c79c2c42a949:vet/reviewsVet.php
>>>>>>> cd00ddc15620efcfc751e04b0ffc53311215f53b
try {
    $pdo = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
} catch (PDOException $exception) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to database!');
}

<<<<<<< HEAD
=======
<<<<<<<< HEAD:client/reviewsVet.php
>>>>>>> cd00ddc15620efcfc751e04b0ffc53311215f53b
session_start();

$spid = "";
$userid = "";

if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
 } else {
    exit('Please log in to access this page.');
 }
 
<<<<<<< HEAD
=======
========



>>>>>>>> 0db3d1641deba66d1c6084948fe6c79c2c42a949:vet/reviewsVet.php
>>>>>>> cd00ddc15620efcfc751e04b0ffc53311215f53b

// Below function will convert datetime to time elapsed string.


function time_elapsed_string($datetime, $full = false) {


    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
    $string = array('y' => 'year', 'm' => 'month', 'w' => 'week', 'd' => 'day', 'h' => 'hour', 'i' => 'minute', 's' => 'second');


    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }


    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}



// Page ID needs to exist, this is used to determine which reviews are for which page.
if (isset($_GET['page_id'])) {
    if (isset($_POST['name'], $_POST['rating'], $_POST['content'])) {



<<<<<<< HEAD
=======
<<<<<<<< HEAD:client/reviewsVet.php
>>>>>>> cd00ddc15620efcfc751e04b0ffc53311215f53b
       // create a PDO object
       $pdo = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);

// insert a new review
$sql = "INSERT INTO feedback (page_id, name, content, rating, submit_date, userid)
        VALUES ({$_GET['page_id']}, '{$_POST['name']}', '{$_POST['content']}', {$_POST['rating']}, NOW(), '{$_SESSION['userid']}')";

$result = $pdo->query($sql);

// check for errors
if (!$result) {
    exit("Error inserting record: " . $pdo->errorInfo()[2]);
}

exit('Your review has been submitted! <br><b>Thank You</b>');
<<<<<<< HEAD
=======
========
        
        // Insert a new review (user submitted form)
        $stmt = $pdo->prepare('INSERT INTO feedback (page_id, name, content, rating, submit_date) VALUES (?,?,?,?,NOW())');
        $stmt->execute([$_GET['page_id'], $_POST['name'], $_POST['content'], $_POST['rating']]);
        exit('Your review has been submitted! <br><b>Thank You</b>');
>>>>>>>> 0db3d1641deba66d1c6084948fe6c79c2c42a949:vet/reviewsVet.php
>>>>>>> cd00ddc15620efcfc751e04b0ffc53311215f53b

    }


<<<<<<< HEAD
=======
<<<<<<<< HEAD:client/reviewsVet.php
>>>>>>> cd00ddc15620efcfc751e04b0ffc53311215f53b
    $page_id = $_GET['page_id'];
// Modify the query to retrieve only the reviews submitted by the logged-in user
$sql = "SELECT * FROM feedback WHERE page_id = '$page_id' AND userid = '$userid' ORDER BY submit_date DESC";
$reviews = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

// Modify the query to calculate the overall rating and total reviews only for the reviews submitted by the logged-in user
$query = "SELECT AVG(rating) AS overall_rating, COUNT(*) AS total_reviews FROM feedback WHERE page_id = {$_GET['page_id']} AND userid = '$userid'";
$result = $pdo->query($query);
$reviews_info = $result->fetch(PDO::FETCH_ASSOC);


<<<<<<< HEAD
=======
========
    
     // Get all reviews by the Page ID ordered by the submit date
    $stmt = $pdo->prepare('SELECT * FROM feedback WHERE page_id = ? ORDER BY submit_date DESC');
    $stmt->execute([$_GET['page_id']]);
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);



    // Get the overall rating and total amount of reviews
    $stmt = $pdo->prepare('SELECT AVG(rating) AS overall_rating, COUNT(*) AS total_reviews FROM feedback WHERE page_id = ?');
    $stmt->execute([$_GET['page_id']]);
    $reviews_info = $stmt->fetch(PDO::FETCH_ASSOC);
>>>>>>>> 0db3d1641deba66d1c6084948fe6c79c2c42a949:vet/reviewsVet.php
>>>>>>> cd00ddc15620efcfc751e04b0ffc53311215f53b
} else {
    exit('Please provide the page ID.');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>


    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Give Rating</button>

    <div id="id01" class="modal">

        <form class="modal-content animate" action="" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close"
                    title="Close Modal">&times;</span>

            </div>

            <div class="container">

                <div class="overall_rating">
                    <span class="num"><?=number_format($reviews_info['overall_rating'], 1)?></span>
                    <span class="stars"><?=str_repeat('&#9733;', round($reviews_info['overall_rating']))?></span>
                    <span class="total"><?=$reviews_info['total_reviews']?> reviews</span>
                </div>
                <a href="#" class="write_review_btn">Write Review</a>
                <div class="write_review">
        </form>

        <form>
            <input name="name" type="text" placeholder="Your Name" required>
            <input name="rating" type="number" min="1" max="5" placeholder="Rating (1-5)" required>
            <textarea name="content" placeholder="Write your review here..." required></textarea>
            <button type="submit">Submit Review</button>
        </form>
    </div>




    </div>
</div>

    <?php foreach ($reviews as $review): ?>
    <div class="review">
        <h3 class="name"><?=htmlspecialchars($review['name'], ENT_QUOTES)?></h3>
        <div>
            <span class="rating"><?=str_repeat('&#9733;', $review['rating'])?></span>
            <?php
            $date = $review['submit_date'];
$now = time();
$difference = $now - strtotime($date);

?>

        </div>
        <p class="content"><?=htmlspecialchars($review['content'], ENT_QUOTES)?></p>
    </div>
    <?php endforeach ?>
    <script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>

</body>

</html>