<?php

namespace App\Http\Controllers\Supplier;

use mysqli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Support\Facades\Auth;

class ItemstoreController extends Controller
{
    public function display_form(){

        return view('supplier.item_store.form');
    }

    public function store_form_data(Request $request){

      $tableName = $request->input('table_name');
      $unique_col_name =  $request->input('unique_col_name');

        $dbname = "project_copy";
        $servername = "localhost";
        $username = "root";
        $password = "";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
       // echo "Connected successfully";

      $sql = "CREATE TABLE $tableName (
         id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         table_identity BIGINT(20) UNSIGNED NULL,
         product_name VARCHAR(191) NULL,
         category_name VARCHAR(191) NULL,
         image LONGBLOB NULL,
         unit_price DECIMAL(19,2) NULL,
         quantity INTEGER(11) NULL,
         $unique_col_name VARCHAR(191) NULL,
         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
  
         if ($conn->query($sql) === TRUE) {
            //passing table name through a variable to next page
            return redirect('/product_data_insertion_form/'.$tableName)->with('status','Table has been created successfully!');
            
        } else {
            return redirect('/display_creating_item_store_form')->with('table_exists','This table is already exists. try again with a different name.'. $conn->error);    

       }
      
    }



public function product_data_insertion_form($tableName){
  
//this php code is used to display all the stored data from db
  $servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_copy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM $tableName";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row

  while($row = $result->fetch_assoc()) {
    return view('supplier.item_store.product_data_form',compact(['result','tableName']));
  }
} else {
  // echo "0 results";

  return view('supplier.item_store.product_data_form',compact(['result','tableName']));
}
$conn->close();

 // return view('supplier.item_store.product_data_form',compact('tableName'));
}


public function store_product_data(Request $request,$tableName){

  //assign input values to a variable
  $request->validate([
    'product_name' => 'required',
    'unit_price' => 'required|numeric',
    'quantity' => 'required|numeric',
    'category_name' => 'required',
    'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:4096|dimensions:min_width=100,min_height=100,max_width=4000,max_height=4000',
]);

  $user_id = Auth::id();
  $product_name = $request->input('product_name');
  $unit_price = $request->input('unit_price');
  $quantity = $request->input('quantity');
  $category_name = $request->input('category_name');
 // $image = $request->input('image');
 
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_copy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// else{
//     echo "Database connected";
// }

//-------------IMAGE INSERTION CODE------------------------------------------
if($request->hasfile('image')){
  $file = $request->file('image');
  $extension = $file->getClientOriginalExtension();
  $filename = time().'.'.$extension;
  $file->move('uploads/supplier_imgs',$filename);
  $image = $filename;


$sql = "INSERT INTO $tableName (product_name, unit_price, quantity, image, category_name, table_identity)
VALUES ('$product_name', '$unit_price', '$quantity', '$image', '$category_name', '$user_id')";

}else{
  echo "something went wrong.please try again.";
}

 //--------------IMAGE INSERTION CODE-----------------------------------------

if ($conn->query($sql) === TRUE) {

  return redirect('/product_data_insertion_form/'.$tableName)->with('status','Record inserted succesfully!');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
    }



    public function edit_data($id,$tableName){

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "project_copy";
      
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      
      $sql = "SELECT * FROM $tableName WHERE id=$id";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          return view('supplier.item_store.edit_product_form',compact(['result','tableName']));
        }
      } else {
        echo "0 results";
      }
      $conn->close();
      

    //  return view('supplier.item_store.edit_product_form',compact('result'));
    }



    public function update_data(Request $request,$id,$tableName){
      $product_name = $request->input('product_name');
      $unit_price = $request->input('unit_price');
      $quantity = $request->input('quantity');
      $category_name = $request->input('category_name');
     // $image = $request->input('image');

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "project_copy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE $tableName SET product_name='".$product_name."',unit_price = '".$unit_price."',category_name = '".$category_name."',quantity='".$quantity."'
  
WHERE id=$id";

if ($conn->query($sql)  === TRUE) {
  return redirect('/product_data_insertion_form/'.$tableName)->with('status','Record updated successfully!');
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();

    }

public function edit_image($id,$tableName){

  
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "project_copy";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "SELECT * FROM $tableName WHERE id=$id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      return view('supplier.item_store.edit_image',compact(['result','tableName']));
    }
  } else {
    echo "0 results";
  }
  $conn->close();
 // return view('supplier.item_store.edit_image',compact(['id','tableName']));

}

public function update_image(Request $request,$id,$tableName){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "project_copy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
  else{
    echo "connected";
  }

  if($request->hasfile('image')){
    $file = $request->file('image');
    $extension = $file->getClientOriginalExtension();
    $filename = time().'.'.$extension;
    $file->move('uploads/supplier_imgs',$filename);
    $image = $filename;
  
    $sql = "UPDATE $tableName SET image ='$image' WHERE id=$id";

  }else{
    echo "something went wrong.please try again.";
  }
  
   //--------------IMAGE INSERTION CODE-----------------------------------------
  
  
  if ($conn->query($sql) === TRUE) {
  
    return redirect('/product_data_insertion_form/nirmal_store')->with('status','Image was updated successfully!');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
  }


  public function delete_record($id,$tableName){
     $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "project_copy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM $tableName WHERE id=$id";

if ($conn->query($sql) === TRUE) {
 
  return redirect('/product_data_insertion_form/'.$tableName)->with('status','Record deleted successfully!');
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
  }





  public function product_list(){
     $user_id = Auth::id();

     $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "project_copy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
  
    $logged_in_user = Auth::user()->name;

     $sql = "SELECT DISTINCT TABLE_NAME 
     FROM INFORMATION_SCHEMA.COLUMNS
     WHERE COLUMN_NAME IN ('$logged_in_user') 
     AND TABLE_SCHEMA='project_copy' ";
     $result = $conn->query($sql);

     if (!$result) {
         echo "DB Error, could not list tables\n";
         echo 'MySQL Error: ' . mysqli_connect_error();
         exit;
     }


     while ($row = mysqli_fetch_row($result)) {
   
      $supplier_table_name ="{$row[0]}\n";
      // echo $supplier_table_name;
      // echo  "<br>"; 
        
     }
     
    mysqli_free_result($result);

    $get_table_data = "SELECT * FROM $supplier_table_name";

    $result = $conn->query($get_table_data);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        return view('supplier.item_store.all_in_one',compact(['user_id','result','supplier_table_name']));
      }
    } else {
      echo "0 results";
    }
    $conn->close();

  
  }


}
