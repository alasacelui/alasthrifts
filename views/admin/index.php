<?php require_once 'layouts/header.php'; ?>

<h2>Statistic</h2>
            <div class="row">
                <div class="col-md-4 border border-secondary p-5">
                <h3 class="text-center text-primary">Total Users</h3>
                    <h1 class="text-center"><?php totalUsers(); ?></h1>
                </div>
                <div class="col-md-4 border border-secondary p-5">
                <h3 class="text-center text-primary">Total Products</h3>
                    <h1 class="text-center"><?php totalProducts(); ?></h1>
                </div>
              
                <div class="col-md-4 border border-secondary p-5">
                <h3 class="text-center text-primary">Total Orders</h3>
                    <h1 class="text-center"><?php totalOrders(); ?></h1>
                </div>
            </div>
           
            
            <div class="line"></div>
            <h2>Manage User</h2>
           <button class="btn btn-sm btn-primary m-2 btn-add-user" data-toggle="modal" data-target="#register">Add User</button>
                <?php displayUsers();
                      destroyUser(); 
                    
                      ?>

            <div class="line"></div>

            <h2>Manage Products</h2>
            <button class="btn btn-sm btn-primary m-2" data-toggle="modal" data-target="#addProduct">Add Product</button>
            <?php displayProducts();
                  destroyProduct(); ?>

            <div class="line"></div>

            <h3>Manage Orders</h3>
            <?php displayOrders(); ?>
        </div>
    </div>
<body>
    

<?php require_once 'layouts/footer.php'; ?>