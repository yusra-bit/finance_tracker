<?php include 'partials/session.php'; ?>
<?php include 'partials/main.php'; ?>
<?php
session_start();




?>

<head>



    <?php includeFileWithVariables('partials/title-meta.php', array('title' => 'User Add')); ?>

    <?php include 'partials/head-css.php'; ?>

</head>

<?php include 'partials/body.php'; ?>

<div class="group-data-[sidebar-size=sm]:min-h-sm group-data-[sidebar-size=sm]:relative">

    <?php include 'partials/menu.php'; ?>

    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

        <?php include 'partials/page-wrapper.php'; ?>

            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

            <h3> User Registration</h3>
            <div class="grid grid-cols-4 xl:grid-cols-2">
                    <div class="card">
                        <div class="card-body">
                            <form action="index.html">

                            <input type="text" name='company' value="<?php echo ($_SESSION['company_id']) ? $_['company_id'] : ''; ?>" id="inputText" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" required>

                                <div class="mb-3">
                                    <label for="inputText" class="inline-block mb-2 text-base font-medium">Full Name</label>
                                    <input type="text" name='full_name' id="inputText" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" required>
                                </div>
                                <div class="mb-3">
                                    <label for="inputText" class="inline-block mb-2 text-base font-medium">Email</label>
                                    <input type="email" name='email' id="inputText" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" required>
                                </div>
                                <div class="mb-3">
                                    <label for="inputText" class="inline-block mb-2 text-base font-medium">Contact no</label>
                                    <input type="number" name='contact_no' id="inputText" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" required>
                                </div> 
                                <div class="mb-3">
                                    <label for="inputText" class="inline-block mb-2 text-base font-medium">Password</label>
                                    <input type="text" name='password' id="inputText" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" required>
                                </div> 
                                <div class="mb-3">
                                    <label for="inputText" class="inline-block mb-2 text-base font-medium">Role</label>
                                    <select name='role' class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    <option selected>Open this select menu</option>
                                    <option value="admin">Admin</option>
                                    <option value="sales">Sales</option>
                                    <option value="accountant">Accountant</option>
                                </select>
                                </div>

                                <div class="mb-3">
                                    <label for="inputText" class="inline-block mb-2 text-base font-medium">Status</label>
                                    <select name='status' class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200">
                                    <option selected>Open this select menu</option>
                                    <option value="active">Active</option>
                                    <option value="unactive">Unactive</option>
                                </select>
                                </div>

                                
                                
                                <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Submit</button>
                            </form>
                        </div>
                    </div><!--end card-->


               
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

    <?php include 'partials/footer.php'; ?>


    </div>

</div>
<!-- end main content -->

    <?php include 'partials/customizer.php'; ?>

    <?php include 'partials/vendor-scripts.php'; ?>

    


<!-- App js -->
<script src="assets/js/app.js"></script>



</body>

</html>