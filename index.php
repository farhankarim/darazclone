<?php
include("includes/head.php");
include("includes/top_nav.php");
include("includes/left_nav.php");
include("includes/db.php");

//query
$q = "select * from users";

//execute query written above
$query = mysqli_query($conn, $q);
?>
<!-- ==========================================CREATE RECORD MODAL -->
<div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
           <label for="fname">First Name</label>
           <input class="form-control" type="text" name="fname" id="fname">
          </div>
          <div class="form-group">
           <label for="lname">Last Name</label>
           <input class="form-control" type="text" name="lname" id="lname">
          </div>
          <div class="form-group">
           <label for="age">Age</label>
           <input class="form-control" type="text" name="age" id="age">
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Create User</button>
      </div>
    </div>
  </div>
</div>
<!-- ==========================================CREATE RECORD MODAL -->

<!-- ==========================================EDIT RECORD MODAL -->
<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
           <label for="fname">First Name</label>
           <input class="form-control" type="text" name="fname" id="fname">
          </div>
          <div class="form-group">
           <label for="lname">Last Name</label>
           <input class="form-control" type="text" name="lname" id="lname">
          </div>
          <div class="form-group">
           <label for="age">Age</label>
           <input class="form-control" type="text" name="age" id="age">
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Edit User</button>
      </div>
    </div>
  </div>
</div>
<!-- ==========================================CREATE RECORD MODAL -->

<!-- ==========================================DELETE RECORD MODAL -->
<div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger">Delete User</button>
      </div>
    </div>
  </div>
</div>
<!-- ==========================================DELETE RECORD MODAL -->
<div class="row">
    <div class="col">
        <button data-toggle="modal" class="btn btn-secondary" data-target="#createUser" type="submit">Create</button>
        <table class="table table-bordered mt-2 w-100">
            <thead class="bg-light">
                <tr>
                    <th>User id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
    <?php
    // starting of foreach
    foreach ($query as $data) {
    ?>
    <tr>
    <td><?php echo $data["USER_ID"]  ?></td>
    <td><?php echo $data["FNAME"]  ?></td>
    <td><?php echo $data["LNAME"]  ?></td>
    <td><?php echo $data["AGE"]  ?></td>
    <td>
        <button data-toggle="modal" class="btn btn-secondary" data-target="#editUser" type="submit">Edit</button>
        <button data-toggle="modal" data-target="#deleteUser" class="btn btn-secondary" type="submit">Delete</button>
    </td>
    </tr>
    <?php
    //closing bracket foreach
    }
    ?>
               
        </table>
        
        <?php
        
        //output associative array data using foreach
            // echo . " " . $data["FNAME"] . " " . $data["LNAME"] . " " . $data["AGE"] . "<br>";
        
        ?>
    </div>
</div>
<?php
include("includes/footer.php");
include("includes/scripts.php");
?>