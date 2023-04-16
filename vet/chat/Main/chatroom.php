<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatRoom</title>
    <style>

    </style>
    <link rel="stylesheet" href="chatroom.css">
</head>

<body>
    <?php
    session_start();

    require '../../../config/db.php';

    // Check if 'fname' key exists in the $_SESSION array
    if(isset($_SESSION['fname'])) {
        $user = $_SESSION['fname'];
    } else {
        // Handle the case when the 'fname' key is not defined in the session
        $user = 'Unknown user';
    }

    $to = $_GET['id'];
    $from = $_SESSION['userid'];
    $roomid = 0;

    echo "From: " . $from;
    echo "To: " . $to;

    $sql = "SELECT * FROM personalchat WHERE FromUser = '$from' AND ToUser = '$to' OR FromUser = '$to' AND ToUser = '$from'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $roomid = $row['ChatId'];
        }
    } else {
        $sql = "INSERT INTO personalchat (FromUser, ToUser) VALUES ('$from', '$to')";
        $con->query($sql);
        if ($con->affected_rows > 0) {
            echo "Chat created";
        } else {
            echo "Chat not created";
        }
    }

    if ($roomid != 0) {
        echo "
            <div class='container mt-4'>
                <div class='row'>
                    <div class='col-6'>
                        <div class=' bg-light row p-3' id='chat-window'>";
        $sql = "SELECT * FROM personalchatrecord WHERE Connection = '$roomid'";

        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['SentBy'] == $user) {
                    echo "<div class='bg-white  ms-auto col-6 rounded-pill p-1 ps-3 shadow border-0 m-1'>";
                } else {
                    echo "<div class='bg-white col-6 rounded-pill p-1 ps-3 shadow border-0 m-1'>";
                }
                echo $row['SentBy'];
                echo " : ";
                echo $row['Message'];
                echo " : ";
                echo $row['Date'];
                echo "</div>";
            }
        }

        echo "
                        </div>
                        <div id='typing'></div>
                        <div id='form' class='row rounded-pill shadow'>
                            <input class='col-8 rounded-pill  p-1 ps-3  border-0' onkeyup='typing()' id='comment-input' type='text' placeholder='comment'>
                            <button id='send-button' class='btn btn-primary rounded-pill shadow col-4 ' onclick='send()'>Send</button>
                        </div>
                    </div>
                </div>
            </div>
        ";
    }
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <script>
    var conn = new WebSocket('ws://localhost:8080');
    conn.onopen = function(e) {
        console.log('Connection established!');
        conn.send(JSON.stringify({
            'newRoute': 'Personalchat-<?= $roomid ?>'
        }));

    };




    let timeoutHandle = window.setTimeout(function() {
        document.getElementById('comment-typing-$PostId').innerHTML = '';
    }, 2000);

    function typing() {
        conn.send(JSON.stringify({
            'typing': 'y',
            'name': '<?= $user ?>'
        }));
    }


    conn.onmessage = function(e) {
        let data = JSON.parse(e.data);
        console.log(data);
        if (typeof data.msg !== 'undefined') {



            // var chatWindow = document.getElementById('chat-window');

            // var newMessage = document.createElement('p');
            // newMessage.innerHTML = data.name + " : " + data.msg + " " + data.date;
            // newMessage.classList.add(

            var chatWindow = document.getElementById('chat-window');

            var newMessage = document.createElement('p');
            newMessage.innerHTML = data.name + " : " + data.msg + " " + data.date;

        );
        chatWindow.appendChild(newMessage);
        document.getElementById('chat-window').appendChild(commentElem);
    } else if (typeof data.typing !== 'undefined') {
        document.getElementById('typing').innerHTML = data.name + " is typing...";
        window.clearTimeout(timeoutHandle);
        timeoutHandle = window.setTimeout(function() {
            document.getElementById('typing').innerHTML = '';
        }, 2000);
    }
    };
    var input = document.getElementById('comment-input');
    input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("send-button").click();
        }
    });

    function send() {
        <?php
$datesent = date('M d, Y h.i A');
$commentor = $_SESSION['fname'];
?>
        conn.send(JSON.stringify({
            'msg': input.value,
            'name': '<?= $commentor ?>',
            'date': '<?= $datesent ?>'
        }));

        sendMessage(input.value, '<?= $roomid ?>');

        // var chatWindow = document.getElementById('chat-window');
        // var newMessage = document.createElement('p');
        // newMessage.classList.add(
        //     'bg-white',
        //     'ms-auto',
        //     'col-6',
        //     'rounded-pill',
        //     'p-1',
        //     'ps-3',
        //     'shadow',
        //     'border-0',
        //     'm-1'
        var chatWindow = document.getElementById('chat-window');
        var newMessage = document.createElement('p');
        newMessage.classList.add('m-1');
        chatWindow.appendChild(newMessage);

    );
    newMessage.innerHTML = '<?= $commentor ?>' + " : " + input.value + " " + '<?= $datesent ?>';
    chatWindow.appendChild(newMessage);
    input.value = '';
    }

    function sendMessage(comment, room) {
        let data = {
            'message': comment,
            'roomId': room
        };
        fetch('http://localhost/kuppi/Ratchet-with-chat-room/Main/SendPrivate.php', {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(data)
            }).then(response => response.json())
            .then(json => {
                console.log(json);
            });
    }
    </script>

</body>

</html>