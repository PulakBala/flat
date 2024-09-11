<?php

include('connection.php');
// var_dump($_POST['tel']);
$tel = $_POST['tel'] ?? null;   // ফোন নম্বর
$flatno = $_POST['flatno'] ?? null; // ফ্ল্যাট নম্বর
$owner = $_POST['owner'] ?? null;  // মালিকের নাম

// যদি সব ফিল্ড পূর্ণ থাকে
if ($tel && $flatno && $owner) {
  $query = "INSERT INTO flats(flat_number, mobile_number, owner_name) VALUES('$flatno', '$tel', '$owner')";
  if ($conn->query($query) === TRUE) {
    header("Location: addnewflat.php?status=success");
    exit(); 
  } else {
    echo "Error: " . $query . "<br>" . $conn->error;
  }
} else {
  echo "Please fill all fields.";
}

$conn->close();
