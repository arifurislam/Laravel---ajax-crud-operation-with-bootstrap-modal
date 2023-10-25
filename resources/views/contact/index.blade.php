<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>contacts</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#addModal">
                    Add New One
                </button>

                <!-- Add Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add New Contact</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    @csrf
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Enter Your Name...">
                                        <small class="text-danger ml-3 mt-3" id="nameError"></small>
                                    </div>
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Enter Your Email Address...">
                                        <small class="text-danger ml-3 mt-3" id="emailError"></small>
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Number <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="number"
                                        placeholder="+880 1">
                                        <small class="text-danger ml-3 mt-3" id="numberError"></small>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary add_contact">Submit Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Add Modal -->
                <!-- Show Modal -->
                <div class="modal fade" id="showModal" tabindex="-1" role="dialog"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Show Contact Informations</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="con_name"
                                            placeholder="Enter Your Name...">
                                    </div>
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="con_email"
                                            placeholder="Enter Your Email Address..." disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Number <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="con_number"
                                        placeholder="+880 1" disabled>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Show Modal -->

                <!-- edit Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Contact Informations</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    @csrf
                                <input type="hidden" id="edit_id">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="edit_name">
                                        <span class="text-danger" id="edit_nameError"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="edit_email"> 
                                        <span class="text-danger" id="edit_emailError"></span>                                  </div>
                                    <div class="form-group">
                                        <label>Contact Number <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="edit_number">
                                        <span class="text-danger" id="edit_numberError"></span>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="updateContact" class="btn btn-primary">Update Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- edit Modal -->
            </div>
            <div class="col-lg-10">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th># ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- <tr>
                            <th>1</th>
                            <td>Mark</td>
                            <td>Otto@gmail.com</td>
                            <td>N/A</td>
                            <td>000</td>
                            <td>000</td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // fetch contacts
            function fetchContact() {
                $.ajax({
                    type: "GET",
                    url: "/fetch-contacts",
                    dataType: "json",
                    success: function (response) {
                        var data = ""
                        $.each(response, function (key, value) {
                            data = data + "<tr>"
                            data = data + "<td>" + value.id + "</td>"
                            data = data + "<td>" + value.name + "</td>"
                            data = data + "<td>" + value.email + "</td>"
                            data = data + "<td>" + value.number + "</td>"
                            data = data + "<td>"
                            data = data + "<button value='"+value.id+"' id='showContact' class='btn btn-primary mr-2'>"
                            data = data + "<i class='fa-solid fa-eye'>"+""+"</i>"
                            data = data + "</button>"  
                            data = data + "<button value='"+value.id+"' id='editContact' class='btn btn-primary mr-2'>"
                            data = data + "<i class='fa-solid fa-pencil'>"+""+"</i>"
                            data = data + "</button>"  
                            data = data + "<button value='"+value.id+"' id='deleteContact' class='btn btn-primary'>"
                            data = data + "<i class='fa-solid fa-trash'>"+""+"</i>"
                            data = data + "</button>"  
                            data = data + "</td>"
                            data = data + "</tr>"
                        });
                        $('tbody').html(data);
                        
                    }
                });
            }
            fetchContact();
            // add new contact
            $(document).on('click', '.add_contact', function (e) {
                e.preventDefault();            
                function clearError() {
                    $('#nameError').html('');
                    $('#emailError').html('');
                    $('#numberError').html('');
                }

                function showToastr(type, message) {
                    toastr.options = {
                        "closeButton": true,
                        "positionClass": "toast-top-right",
                    };

                    toastr[type](message);
                }

                var data = {
                    'name': $('#name').val(),
                    'email': $('#email').val(),
                    'number': $('#number').val(),
                }
                $.ajax({
                    type: "POST",
                    url: "/contacts-store",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        showToastr('success', response.message);
                        $('#addModal').find('input').val('');
                        $('#addModal').modal('hide');
                        clearError()
                        fetchContact()
                    },
                    error: function (error) {
                        $('#nameError').text(error.responseJSON.errors.name);
                        $('#emailError').text(error.responseJSON.errors.email);
                        $('#numberError').text(error.responseJSON.errors.number);
                    }
                });
            });

            // show contact
            $(document).on('click','#showContact', function () {
                $('#showModal').modal('show');
                var con_id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "/contacts/"+con_id,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        $('#con_id').val(response.id);
                        $('#con_name').val(response.name);
                        $('#con_email').val(response.email);
                        $('#con_number').val(response.number);
                    }
                });
            });
            // edit contact
            $(document).on('click','#editContact', function () {
                $('#editModal').modal('show');
                var con_id = $(this).val();

                $.ajax({
                    type: "GET",
                    url: "/contacts/"+con_id+"/edit",
                    dataType: "json",
                    success: function (response) {
                        $('#edit_id').val(response.id);
                        $('#edit_name').val(response.name);
                        $('#edit_email').val(response.email);
                        $('#edit_number').val(response.number);
                    }
                });
            });

            // update contact
            $(document).on('click','#updateContact', function (e) {
                e.preventDefault();
                var con_id = $('#edit_id').val();

                function clearEdit_error(){
                    $('#edit_nameError').html('');
                    $('#edit_emailError').html('');
                    $('#edit_numberError').html('');
                }

                function showToastr(type, message) {
                    toastr.options = {
                        "closeButton": true,
                        "positionClass": "toast-top-right",
                    };

                    toastr[type](message);
                }
                
                var data = {
                    'name': $('#edit_name').val(),
                    'email': $('#edit_email').val(),
                    'number': $('#edit_number').val(),
                }
                $.ajax({
                    type: "post",
                    url: "/contacts/update/"+con_id,
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        showToastr('success', response.message);
                        $('#editModal').find('input').val('');
                        $('#editModal').modal('hide');
                        clearEdit_error()
                        fetchContact()
                    },
                    error: function (error) {
                        $('#edit_nameError').text(error.responseJSON.errors.name);
                        $('#edit_emailError').text(error.responseJSON.errors.email);
                        $('#edit_numberError').text(error.responseJSON.errors.number);
                    }
                });
            });

            // delete contact

            $(document).on('click','#deleteContact', function (e) {
                e.preventDefault();
                var con_id = $(this).val();

                function showToastr(type, message) {
                    toastr.options = {
                        "closeButton": true,
                        "positionClass": "toast-top-right",
                    };

                    toastr[type](message);
                }

                $.ajax({
                    type: "POST",
                    url: "/contacts/delete/"+con_id,
                    dataType: "json",
                    success: function (response) {
                        fetchContact()
                        showToastr('success', response.message);
                    }
                });
            });
        });

    </script>
</body>

</html>
