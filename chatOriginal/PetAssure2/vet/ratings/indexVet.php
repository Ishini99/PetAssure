<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>PetAssure</title>
    <link href="../css/vet_Reviews.css" rel="stylesheet" type="text/css">
    <link href="../css/vet_Reviews2.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="content home">
        <h2>Reviews</h2>

        <div class="reviews">

        </div>
        <script>
        const reviews_page_id = 1;
        fetch("reviewsVet.php?page_id=" + reviews_page_id).then(response => response.text()).then(data => {
            document.querySelector(".reviews").innerHTML = data;
            document.querySelector(".reviews .write_review_btn").onclick = event => {
                event.preventDefault();
                document.querySelector(".reviews .write_review").style.display = 'block';
                document.querySelector(".reviews .write_review input[name='name']").focus();
            };
            document.querySelector(".reviews .write_review form").onsubmit = event => {
                event.preventDefault();
                fetch("reviewsVet.php?page_id=" + reviews_page_id, {
                    method: 'POST',
                    body: new FormData(document.querySelector(".reviews .write_review form"))
                }).then(response => response.text()).then(data => {
                    document.querySelector(".reviews .write_review").innerHTML = data;
                });
            };
        });
        </script>
    </div>
</body>

</html>