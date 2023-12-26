<?php
    include("db.php");
    $data = file_get_contents("books.json");
    $decodedData = json_decode($data, true);
    // print_r($decodedData[0]["bookInfo"]["title"]);
    // print_r(count($decodedData));

    $sql = "INSERT INTO `book`(`book_name`,`author`,`pages`,`description`,`genres`,`book_img`,`language`,`publisher`,`publishedDate`,`category`) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);

    $i = 0;
    while($i < count($decodedData))
    {

        $stmt->execute(array(
            $decodedData[$i]['bookInfo']['title'],
            $decodedData[$i]['bookInfo']['author'],
            $decodedData[$i]['bookInfo']['pages'],
            $decodedData[$i]['bookInfo']['description'],
            $decodedData[$i]['bookInfo']['genres'],
            $decodedData[$i]['bookInfo']['imgLink'],
            $decodedData[$i]['bookInfo']['lang'],
            $decodedData[$i]['bookInfo']['publisher'],
            $decodedData[$i]['bookInfo']['publishedDate'],
            $decodedData[$i]['bookInfo']['category']
        ));

        $i++;
    }

?>