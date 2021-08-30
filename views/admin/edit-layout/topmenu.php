<!doctype html>
<html lang="en">

<head>
    <?php include_once('views/admin/layout/meta.php') ?>
    <style>
        #sortable>div:nth-child(1n) {
            background-color: #272a2d;
        }

        #sortable>div:nth-child(2n) {
            background-color: #42494f;
        }
    </style>
</head>

<body class="vertical  dark  ">
    <div class="wrapper">
        <!-- Top Navbar -->
        <?php include_once('views/admin/layout/topnav.php') ?>
        <!-- End Top Navbar -->

        <!-- Left Sidebar -->
        <?php include_once('views/admin/layout/sidebar.php') ?>
        <!-- End Left Sidebar -->


        <!-- Main -->
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h1 class="page-title">Edit Your Top Menu Layout</h1>
                    </div>
                </div>
                <div class="row justify-content-center my-5">
                    <div class="col-md-12 mb-4">
                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title h3">Element</strong>
                                <a class="float-right small text-muted" href="#!">Delete all</a>
                            </div>
                            <div class="card-body">
                                <div class="list-group list-group-flush my-2" id="sortable">
                                    <?php
                                    foreach ($layouts as $layout) {
                                        echo '<div class="list-group-item py-2 px-4" value="' . $layout['0'] . '">
                                        <div class="row align-items-center">
                                            <div class="col text-center">
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-8">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="">Name and Link to page</span>
                                                            </div>
                                                            <input type="text" class="form-control"  value="' . $layout['0'] . '">
                                                            <input type="text" class="form-control"  value="' . $layout['1'] . '">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="small text-muted fe fe-12 fe-menu float-right pr-4"></span>

                                        </div>
                                    </div>';
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <button class="btn my-3 btn-primary btn-lg btn-block" id="save">
                            <strong>Save</strong>
                        </button>
                        <button class="btn my-3 btn-lg btn-block btn-outline-link" id="droppable">
                            <strong class="text-danger">Drop here to delete</strong>
                        </button>
                        <div class="form-group mb-3">
                            <label for="custom-select">Add element</label>
                            <div class="row">
                                <div class="col">
                                    <select class="custom-select" id="element">
                                        <option value="" disabled selected>Select your option</option>
                                        <?php
                                        foreach ($layoutDefault as $l) {
                                            echo '<option value="' . $l[0] . '">' . $l . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <button class="btn px-4 btn-primary" id="addElement">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notifications -->
            <?php include_once('views/admin/layout/notifications.php') ?>
            <!-- End Notifications -->

        </main>
        <!-- main -->

    </div>
    <!-- .wrapper -->



    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/simplebar.min.js"></script>
    <script src='assets/js/daterangepicker.js'></script>
    <script src='assets/js/jquery.stickOnScroll.js'></script>
    <script src="assets/js/tinycolor-min.js"></script>
    <script src="assets/js/config.js"></script>
    <script src="assets/js/apps.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#sortable").sortable({
                revert: true
            });
        });
        $("#droppable").droppable({
            drop: function(event, ui) {
                ui.draggable.remove();
            }
        });
        $("#addElement").click(function() {
            console.log();
            $("#sortable").append(`
            <div class="list-group-item py-2 px-4" value="${$("#element").val()}">
                <div class="row align-items-center">
                    <div class="col text-center">
                        <h5 class="m-2"><strong>${$("#element").val().replace("/","-")}</strong></h5>
                    </div>
                    <span class="small text-muted fe fe-12 fe-menu float-right pr-4"></span>

                </div>
            </div>
            `);
            $("#element").prop("selectedIndex", 0);
        });
        $("#save").click(function() {
            var arr = [];
            $("#sortable > div").map(function() {
                arr.push(this.getAttribute("value"));
            });

            arr = {
                home: arr
            };

            console.log(arr);
            arr = JSON.stringify(arr);

            swal({
                text: "Do you want to save it?",
                type: "warning",
                closeOnClickOutside: false,
                buttons: {
                    cancel: "Cancel",
                    catch: {
                        text: "Do it!",
                        value: "save",
                    }
                }
            }).then((value) => {
                switch (value) {
                    case "save":
                        $.ajax({
                            url: "admin.php?c=layout&p=topmenu",
                            type: "POST",
                            data: {
                                'save': encodeURIComponent(arr)
                            },
                            success: function(data) {
                                swal("Done!", "It was succesfully save!", "success");
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                console.log(thrownError);
                                swal("Error save!", "Please try again", "error");
                            }
                        });
                        break;
                    default:
                }
            });
        });
    </script>
</body>

</html>