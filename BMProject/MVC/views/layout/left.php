<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5 d-none d-sm-inline">Menu</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
                <a href="#" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                </a>
            </li>
            <!-- Other menu items -->

            <!-- Dynamic submenu for Products -->
            <li>
                <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Products</span>
                </a>
                <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                    <!-- <?php 
                    // require_once 'C:\Study\BMProject\MVC\models\ProductModel.php';
                    // $productModel = new ProductModel();
                    // $result = $productModel->getRecords("tblcategories_product");
                    // while ($row = mysqli_fetch_assoc($result)) {
                    //     $categoriesName = $row['category_name'];
                    //     $categoriesLink = $row['category_link'];
                    //     echo "<li class='w-100'>
                    //               <a href='$categoriesLink' class='nav-link px-0'> <span class='d-none d-sm-inline'>$categoriesName</span> 1</a>
                    //           </li>";
                    // }
                    ?> -->
                </ul>
            </li>
            <!-- End of Dynamic submenu for Products -->

            <li>
                <a href="#" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Customers</span>
                </a>
            </li>
        </ul>
        <hr>
        <!-- Dropdown menu -->
    </div>
</div>
