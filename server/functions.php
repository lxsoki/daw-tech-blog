<?php 

require "dbcon.php";

function error422($message) {
    $data = [
        'status' => 422,
        'message' => $message
    ];
    header("HTTP/1.1 422 Unprocessable Entity");
    echo json_encode($data);
    exit();
}

function storeCustomer($inputParams) {

    global $conn;
    $name = mysqli_real_escape_string($conn, $inputParams['name']);
    $email = mysqli_real_escape_string($conn, $inputParams['email']);
    $phone = mysqli_real_escape_string($conn, $inputParams['phone']);

    if (empty(trim($name))) {
        return error422('Name is required');

    } elseif (empty(trim($email))) {
        error422('Email is required');

    } elseif (empty(trim($phone))) {
        error422('Phone is required');
    } else {

        $query = "INSERT INTO customers (name, email, phone) values ('$name', '$email', '$phone')";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            $data = [
                'status' => 201,
                'message' => 'Record created successfully'
            ];
            header("HTTP/1.1 201 Record created successfully");
            return json_encode($data);
        } else {
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error'
            ];
            header("HTTP/1.1 500 Internal Server Error");
            return json_encode($data);
        }

    }

}

function getCustomerList() {

    global $conn;

    // $query = "SELECT * FROM customers";
    $query = "SELECT * FROM customers";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        if (mysqli_num_rows($query_run) > 0) {
            
            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
            $data = [
                'status' => 200,
                'message' => 'Records fethed successfully',
                'data' => $res
            ];
            header("HTTP/1.1 200 OK");
            return json_encode($data);

        } else {
            $data = [
                'status' => 404,
                'message' => 'No Record Found'
            ];
            header("HTTP/1.1 404 Not Found");
            return json_encode($data);
        }
    } else {
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error'
        ];
        header("HTTP/1.1 500 Internal Server Error");
        return json_encode($data);
    }
}

function getCustomer($params) {
    global $conn;

    if ($params['id'] == null) {
        return error422('ID is required');
    }

    $customerId = mysqli_real_escape_string($conn, $params['id']);
    $query = "SELECT * FROM customers WHERE id = '$customerId' LIMIT 1" ;
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            
            $res = mysqli_fetch_assoc($result);
            $data = [
                'status' => 200,
                'message' => 'Record fethed successfully',
                'data' => $res
            ];
            header("HTTP/1.1 200 OK");
            return json_encode($data);

        } else {
            $data = [
                'status' => 404,
                'message' => 'No Record Found'
            ];
            header("HTTP/1.1 404 Not Found");
            return json_encode($data);
        }
    } else {
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error'
        ];
        header("HTTP/1.1 500 Internal Server Error");
        return json_encode($data);
    }
}

function updateCustomer($customerInput, $customerParams) {
    global $conn;

    if (!isset($customerParams['id'])) {
        return error422('ID is required in the url');
    } elseif ($customerParams['id'] == null) {
        return error422('ID is required, please provide it.');
    }


    $id = mysqli_real_escape_string($conn, $customerParams['id']);

    $name = mysqli_real_escape_string($conn, $customerInput['name']);
    $email = mysqli_real_escape_string($conn, $customerInput['email']);
    $phone = mysqli_real_escape_string($conn, $customerInput['phone']);

    // currently update method requires all the params

    if (empty(trim($name))) {
        return error422('Name is required');

    } elseif (empty(trim($email))) {
        error422('Email is required');

    } elseif (empty(trim($phone))) {
        error422('Phone is required');
    } else {

        $query = "UPDATE customers SET name = '$name', email = '$email', phone = '$phone' WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            $data = [
                'status' => 200,
                'message' => 'Record updated successfully'
            ];
            header("HTTP/1.1 200 Record updated successfully");
            return json_encode($data);
        } else {
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error'
            ];
            header("HTTP/1.1 500 Internal Server Error");
            return json_encode($data);
        }

    }
}

function deleteRecord($recordParams) {

    global $conn;

    if (!isset($recordParams['id'])) {
        return error422('ID is required in the url');
    } elseif ($recordParams['id'] == null) {
        return error422('ID is required, please provide it.');
    }

    $id = mysqli_real_escape_string($conn, $recordParams['id']);

    $query = "DELETE FROM customers WHERE id = '$id' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // chanfe the status code to 200 if you want to see the msg in postman
        $data = [
            'status' => 204,
            'message' => 'Record deleted successfully.'
        ];
        header("HTTP/1.1 204 OK");
        return json_encode($data);
    } else {
        $data = [
            'status' => 404,
            'message' => 'Record not found.'
        ];
        header("HTTP/1.1 404 Not Found");
        return json_encode($data);
    }
}

// articles

function storeArticle($params) {
    global $conn;
    $title = mysqli_real_escape_string($conn, $params['title']);
    $content = mysqli_real_escape_string($conn, $params['content']);

    if (empty(trim($title)) || empty((trim($content)))) {
        error422('Title and Content are required');
    } else {
        $query = "INSERT INTO articles (title, content) values ('$title', '$content')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $data = [
                'status' => 201,
                'message' => 'Record created successfully'
            ];
            header("HTTP/1.1 201 Record created successfully");
            return json_encode($data);
        } else {
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error'
            ];
            header("HTTP/1.1 500 Internal Server Error");
            return json_encode($data);
        }
    }
}

function getArticles() {
    global $conn;
    $query = "SELECT * FROM articles";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        if (mysqli_num_rows($query_run) > 0) {
            
            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
            $data = [
                'status' => 200,
                'message' => 'Records fethed successfully',
                'data' => $res
            ];
            header("HTTP/1.1 200 OK");
            return json_encode($data);

        } else {
            $data = [
                'status' => 404,
                'message' => 'No Record Found'
            ];
            header("HTTP/1.1 404 Not Found");
            return json_encode($data);
        }
    } else {
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error'
        ];
        header("HTTP/1.1 500 Internal Server Error");
        return json_encode($data);
    }
}

function getArticle($params) {
    global $conn;

    if ($params['id'] == null) {
        return error422('ID is required');
    }

    $articleId = mysqli_real_escape_string($conn, $params['id']);
    $query = "SELECT * FROM articles WHERE id = '$articleId' LIMIT 1" ;
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            
            $res = mysqli_fetch_assoc($result);
            $data = [
                'status' => 200,
                'message' => 'Record fethed successfully',
                'data' => $res
            ];
            header("HTTP/1.1 200 OK");
            return json_encode($data);

        } else {
            $data = [
                'status' => 404,
                'message' => 'No Record Found'
            ];
            header("HTTP/1.1 404 Not Found");
            return json_encode($data);
        }
    } else {
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error'
        ];
        header("HTTP/1.1 500 Internal Server Error");
        return json_encode($data);
    }
}

function getArticlesByUserId($params) {
    global $conn;
    if ($params['id'] == null) {
        return error422('ID is required');
    }
    $userId = mysqli_real_escape_string($conn, $params['id']);
    $query = "SELECT * FROM articles WHERE userId = '$userId'";
    $queryResult = mysqli_query($conn, $query);

    if ($queryResult) {
        if (mysqli_num_rows($queryResult) > 0) {
            // $res = mysqli_fetch_assoc($queryResult);
            $res = mysqli_fetch_all($queryResult, MYSQLI_ASSOC);
            $data = [
                'status' => 200,
                'messages' => 'Records fetched successfully',
                'data' => $res
            ];
            header("HTTP/1.1 200 OK");
            return json_encode($data);
        } else {
            $data = [
                'status' => 404,
                'message' => 'No Record Found'
            ];
            header("HTTP/1.1 404 Not Found");
            return json_encode($data);
        }
    } else {
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error'
        ];
        header("HTTP/1.1 500 Internal Server Error");
        return json_encode($data);
    }
}



?>