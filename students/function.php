<?php

require_once '../inc/stdbcon.php';



function erorr422($message)
{
    $data = [
        'status' => 422,
        'mesage' => $message

    ];
    header('HTTP/1.0 422 Unprocessable Entity');
    echo json_encode($data);
}

function getExamsforSubj($id)
{
    global $conn;

    if ($id == null) {
        return erorr422('Inter The Student ID');
    }

    $stID = mysqli_real_escape_string($conn, $id);

    $sql = "SELECT DISTINCT en.subject,  ex.* FROM exams AS ex JOIN 
            enrollments AS en ON ex.subjectid = en.subject
            WHERE en.subject =" . $id;
    $query = mysqli_query($conn, $sql);


    if ($query) {

        if (mysqli_num_rows($query) > 0) {
            $res = mysqli_fetch_all($query, MYSQLI_ASSOC);

            $data = [
                'satus' => 200,
                'message' => 'Students fetched  successfully',
                'data' => $res


            ];
            header("HTTP/1.0 200 Students fetched  successfully");
            echo json_encode($data);
        } else {
            $data = [
                'satus' => 404,
                'message' => 'no Students found',

            ];
            header("HTTP/1.0 404 no Students found");
            return json_encode($data);
        }
    } else {
        $data = [
            'satus' => 500,
            'message' => 'Method Not Allowed',

        ];
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode($data);
    }
}

function getExamsforStu($id)
{
    global $conn;

    if ($id == null) {
        return erorr422('Inter The Student ID');
    }

    $stID = mysqli_real_escape_string($conn, $id);

    $sql = "SELECT en.student,ex.* FROM exams AS ex JOIN 
            enrollments AS en ON ex.subjectid = en.subject
            WHERE en.student =" . $id;
    $query = mysqli_query($conn, $sql);


    if ($query) {

        if (mysqli_num_rows($query) > 0) {
            $res = mysqli_fetch_all($query, MYSQLI_ASSOC);

            $data = [
                'satus' => 200,
                'message' => 'Students fetched  successfully',
                'data' => $res


            ];
            header("HTTP/1.0 200 Students fetched  successfully");
            echo json_encode($data);
        } else {
            $data = [
                'satus' => 404,
                'message' => 'no Students found',

            ];
            header("HTTP/1.0 404 no Students found");
            return json_encode($data);
        }
    } else {
        $data = [
            'satus' => 500,
            'message' => 'Method Not Allowed',

        ];
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode($data);
    }
}

function getSudentforSubj($id)
{
    global $conn;

    if ($id == null) {
        return erorr422('Inter The Student ID');
    }

    $stID = mysqli_real_escape_string($conn, $id);

    $sql = "SELECT * FROM students 
            WHERE ID IN (SELECT student FROM enrollments WHERE enrollments.subject = $id )";
    $query = mysqli_query($conn, $sql);


    if ($query) {

        if (mysqli_num_rows($query) > 0) {
            $res = mysqli_fetch_all($query, MYSQLI_ASSOC);

            $data = [
                'satus' => 200,
                'message' => 'Students fetched  successfully',
                'data' => $res


            ];
            header("HTTP/1.0 200 Students fetched  successfully");
            echo json_encode($data);
        } else {
            $data = [
                'satus' => 404,
                'message' => 'no Students found',

            ];
            header("HTTP/1.0 404 no Students found");
            return json_encode($data);
        }
    } else {
        $data = [
            'satus' => 500,
            'message' => 'Method Not Allowed',

        ];
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode($data);
    }
}
function getSbjects($id)
{
    global $conn;

    if ($id == null) {
        return erorr422('Inter The Student ID');
    }

    $stID = mysqli_real_escape_string($conn, $id);

    $sql = "SELECT sub.name FROM subjects AS sub
                JOIN enrollments en ON en.subject = sub.subjectid
                JOIN students st ON st.ID = en.student
                WHERE st.ID =" . $id;
    $query = mysqli_query($conn, $sql);


    if ($query) {

        if (mysqli_num_rows($query) > 0) {
            $res = mysqli_fetch_all($query, MYSQLI_ASSOC);

            $data = [
                'satus' => 200,
                'message' => 'Subjects fetched  successfully',
                'data' => $res


            ];
            header("HTTP/1.0 200 Subjects fetched  successfully");
            echo json_encode($data);
        } else {
            $data = [
                'satus' => 404,
                'message' => 'no Subjects found',

            ];
            header("HTTP/1.0 404 no Subjects found");
            return json_encode($data);
        }
    } else {
        $data = [
            'satus' => 500,
            'message' => 'Method Not Allowed',

        ];
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode($data);
    }
}

function deleteStudent($inputdata)
{
    global $conn;



    $query = "SELECT * FROM students WHERE ID=" . $inputdata;
    $query_run = mysqli_query($conn, $query);
    //$res = mysqli_fetch_assoc($query_run);

    //return json_encode(["n" => mysqli_num_rows($query_run)]);

    if ($query_run) {

        if (mysqli_num_rows($query_run) > 0) {
            $res = mysqli_fetch_assoc($query_run);
            // return json_encode($res);


            $sql = "DELETE FROM students WHERE ID=" . $inputdata;
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $data = [
                    'status' => 201,
                    'mesage' => 'Student  Deleted ',
                ];
                header('HTTP/1.0 201 Deleted');
                return json_encode($data);
            } else {
                $data = [
                    'status' => 405,
                    'mesage' => 'Internal Server Error ',
                ];
                header('HTTP/1.0 500 Internal Server Error');
                return json_encode($data);
            }
        }
    }
}


function updateStudent($inputData, $studentpara)
{
    global $conn;

    if (!isset($studentpara['id'])) {
        return erorr422('Student ID Not Found In URL');
    } else {

        $query = "SELECT * FROM students WHERE ID=" . $studentpara['id'];
        $query_run = mysqli_query($conn, $query);


        if ($query_run) {

            if (mysqli_num_rows($query_run) > 0) {
                $res = mysqli_fetch_assoc($query_run);
                // return json_encode($res);


                $name = isset($inputData['name']) ? mysqli_real_escape_string($conn, $inputData['name']) : $res['name'];
                $date_of_birth = isset($inputData['date_of_birth']) ?  mysqli_real_escape_string($conn, $inputData['name']) : $res['date_of_birth'];
                $address = isset($inputData['address']) ?  mysqli_real_escape_string($conn, $inputData['address']) : $res['address'];
                $contact_information = isset($inputData['contact_information']) ?  mysqli_real_escape_string($conn, $inputData['contact_information']) : $res['contact_information'];
                $class = isset($inputData['class']) ?  mysqli_real_escape_string($conn, $inputData['class']) : $res['class'];




                $query = "UPDATE  students SET name = '$name' , date_of_birth='$date_of_birth', address = '$address', contact_information='$contact_information', class='$class' WHERE ID=" . $studentpara['id'];
                $result = mysqli_query($conn, $query);

                if ($result) {
                    $data = [
                        'status' => 201,
                        'mesage' => 'Customer Updated Successfuly ',
                    ];
                    header('HTTP/1.0 201 Updated');
                    return json_encode($data);
                } else {
                    $data = [
                        'status' => 405,
                        'mesage' => 'Internal Server Error ',
                    ];
                    header('HTTP/1.0 500 Internal Server Error');
                    return json_encode($data);
                }
            }
        }
    }
}


function getStudent($id)
{
    global $conn;

    if ($id == null) {
        return erorr422('Inter The Student ID');
    }

    $stID = mysqli_real_escape_string($conn, $id);

    $sql = "SELECT * FROM students WHERE ID=" . $id;
    $query = mysqli_query($conn, $sql);


    if ($query) {

        if (mysqli_num_rows($query) > 0) {
            $res = mysqli_fetch_all($query, MYSQLI_ASSOC);

            $data = [
                'satus' => 200,
                'message' => 'Student fetched  successfully',
                'data' => $res


            ];
            header("HTTP/1.0 200 Student fetched  successfully");
            echo json_encode($data);
        } else {
            $data = [
                'satus' => 404,
                'message' => 'no Student found',

            ];
            header("HTTP/1.0 404 no customer found");
            return json_encode($data);
        }
    } else {
        $data = [
            'satus' => 500,
            'message' => 'Method Not Allowed',

        ];
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode($data);
    }
}


function createStudent($customerInput)
{

    global $conn;

    $name = mysqli_real_escape_string($conn, $customerInput['name']);
    $date_of_birth = mysqli_real_escape_string($conn, $customerInput['dateofbirth']);
    $address = mysqli_real_escape_string($conn, $customerInput['address']);
    $contact_information = mysqli_real_escape_string($conn, $customerInput['contactinformation']);

    if (empty(trim($name))) {
        return erorr422('Enter Your Name');
    } elseif (empty(trim($address))) {
        return erorr422('Enter Your address');
    } elseif (empty(trim($date_of_birth))) {
        return erorr422('Enter Your date of birth');
    } elseif (empty(trim($contact_information))) {
        return erorr422('Enter Your contact information');
    } else {
        $query = "INSERT INTO students (name, date_of_birth, address, contact_information) VALUES ('$name','$date_of_birth','$address','$contact_information')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $data = [
                'status' => 201,
                'mesage' => 'Customer created Successfuly ',
            ];
            header('HTTP/1.0 201 Created');
            return json_encode($data);
        } else {
            $data = [
                'status' => 405,
                'mesage' => 'Internal Server Error ',
            ];
            header('HTTP/1.0 500 Internal Server Error');
            return json_encode($data);
        }
    }
}


function studentsList()
{

    global $conn;


    if (!$conn) {
        $data = [
            'status' => 500,
            'message' => 'Database connection failed',
        ];
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode($data);
        exit();
    }
    $query = "SELECT * FROM students";
    $query_run = mysqli_query($conn, $query);


    if ($query_run) {

        if (mysqli_num_rows($query_run) > 0) {
            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

            $data = [
                'satus' => 200,
                'message' => 'Customers list fetched  successfully',
                'data' => $res


            ];
            header("HTTP/1.0 200 Customers list fetched  successfully");
            echo json_encode($data);
        } else {
            $data = [
                'satus' => 404,
                'message' => 'no customer found',

            ];
            header("HTTP/1.0 404 no customer found");
            return json_encode($data);
        }
    } else {
        $data = [
            'satus' => 500,
            'message' => 'Method Not Allowed',

        ];
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode($data);
    }
}
