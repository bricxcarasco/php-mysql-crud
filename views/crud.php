<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/jquery/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js" ></script>
    
    <title>Document</title>
</head>

<body>
    
<div class="container">
    <h2 style="margin-top: 20px;">Personal Information</h2>
    <p>Sample CRUD for Personal Information by Master BricxRain</p>
    
    <button data-toggle="modal" data-target="#modalPersonalInformation" id="btnAddPersonalInformation" type="button" class="btn btn-outline-primary">Add Personal Information</button>

    <table style="margin-top: 20px;" id="tablePersonalInformation" class="table table-hover">
    <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      
    </tbody>
  </table>
</div>

<!-- The Add Modal -->
<div class="modal fade" id="modalPersonalInformation">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Information</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <input placeholder="First Name" type="text" id="firstname" class="form-control">
                </div>
                <div class="col-md-6">
                    <input placeholder="Last Name" type="text" id="lastname" class="form-control">
                </div>
            </div>
            <div style="margin-top: 10px;" class="row">
                <div class="col-md-6">
                    <select class="form-control" id="gender">
                        <option value=""></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <input placeholder="Email" type="text" id="email" class="form-control">
                </div>
            </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-success" id=btnSavePersonalInformation>Save</button>    
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
</div>


<!-- The Edit Modal -->
<div class="modal fade" id="modalEditPersonalInformation">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Information</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <p id="personalIdHidden" hidden></p>
                    <input placeholder="First Name" type="text" id="firstname" class="form-control">
                </div>
                <div class="col-md-6">
                    <input placeholder="Last Name" type="text" id="lastname" class="form-control">
                </div>
            </div>
            <div style="margin-top: 10px;" class="row">
                <div class="col-md-6">
                    <select class="form-control" id="gender">
                        <option value=""></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <input placeholder="Email" type="text" id="email" class="form-control">
                </div>
            </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-success" id=btnUpdatePersonalInformation>Update</button>    
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
</div>

<script src="../js/crud.js"></script>

</body>
</html>