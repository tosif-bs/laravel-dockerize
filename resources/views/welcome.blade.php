<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dev Test</title>

        <!-- Fonts -->
        <link href="//fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Style and JS -->
        <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- Internal Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            /* BUTTONS */
            .btn {
                background-color: #5b657c;
                border: none;
                border-radius: 3px;
                box-shadow: 0 -3px 0 rgba(0, 0, 0, 0.15) inset;
                color: #fff !important;
                letter-spacing: 0.1em;
                cursor: pointer;
                position: relative;
                text-align: center;
                text-transform: uppercase;
                vertical-align: middle;
                white-space: nowrap;
                transition-property: transform;
                transform: translateZ(0);
                transition: box-shadow 0.5s cubic-bezier(0.39, 0.5, 0.15, 1.36);
                padding: 15px 30px;
            }
            .btn:hover {
                box-shadow: 0 0 0 28px rgba(0, 0, 0, 0.25) inset;
            }
            .btn:active {
                transform: translateY(3px);
            }
            #data-wrapper {
                display: none;
                margin-top: 30px;
                width: 800px;
            }
            #data-wrapper table {
                width: 800px;
            }
            .modal-body{
                display: flex;
                flex-direction: column;
                text-align: left;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    HELLO WORLD
                </div>

                <!-- BUTTONS -->
                <div id="button-wrapper">
                    <button id="btn-get-data"class="btn btn-get">GET DATA</button>
                    <button class="btn btn-post" data-toggle="modal" data-target="#modal-form">POST NEW DATA</button>
                </div>

                <!-- DATATABLE -->
                <div id="data-wrapper">
                    <table id="tbl-user">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <!-- MODAL -->
                <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="form-user">
                            <div id="error-holder"></div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="input" class="form-control" name="first_name" id="first_name" placeholder="Enter First name" required>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="input" class="form-control" name="last_name" id="last_name" placeholder="Enter Last name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                </div>
                                
                                <div class="form-group mb-0">
                                    <label for="gender_male" class="mr-3"><input type="radio" class="form-control" name="gender" value="male" checked>Male</label>
                                    <label for="gender_female"><input type="radio" class="form-control" name="gender" value="female">Female</label>
                                </div>
                                <div class="form-group">
                                    <label for="age">Age</label>
                                    <input type="number" class="form-control" name="age" id="age" placeholder="Enter Age" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" name="address" id="address" placeholder="Enter Address" required></textarea>
                                </div>                                
                            </div>
                            <div class="modal-footer border-top-0 d-flex justify-content-center">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function(){
            $table = null;

            // GET data for listing
            $("#btn-get-data").click(function(){
                $table = $('#tbl-user').DataTable({
                    "destroy": true,
                    "autoWidth": false,
                    "order": [[ 0, 'desc' ]],
                    "ajax": {
                        'url': "/api/user",
                    },
                    "columns": [
                        { "data": "id" },
                        { "data": "first_name" },
                        { "data": "last_name" },
                        { "data": "email" },
                        { "data": "gender" },
                        { "data": "age" },
                        { "data": "address" }
                    ],
                    "initComplete": function(settings, json){
                        $('#data-wrapper').show();
                    }
                });
            });


            function getFormData($form){
                var unindexed_array = $form.serializeArray();
                var indexed_array = {};

                $.map(unindexed_array, function(n, i){
                    indexed_array[n['name']] = n['value'];
                });

                return indexed_array;
            }

            // POST for create new user
            $("#form-user").submit(function(e){
                e.preventDefault();
                $this = $(this)
                var inputData = getFormData($this);

                $.post( "/api/user", inputData)
                .done(function() {
                    $('#modal-form').modal('hide');
                    $table?.ajax.reload();
                    $this[0].reset();
                    $("#error-holder").empty();
                })
                .fail(function(data) {
                    data = data.responseJSON;
                    $("#error-holder").html(`
                        <div class="alert alert-danger">
                            <strong>Error! </strong> ${data.errors[Object.keys(data.errors)[0]][0]}
                        </div>
                    `);
                });
            });
            
            // Modal hide class to reset everything
            $('#modal-form').on('hidden.bs.modal', function () {
                $("#form-user")[0].reset();
                $("#error-holder").empty();
            });
        });
    </script>
</html>
