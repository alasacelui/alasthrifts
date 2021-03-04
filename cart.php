<?php require_once 'layouts/header.php' ?>
<br>
<div class="container border border-secondary">
<div class="row">
    <h1 class="text-secondary mx-auto">My Cart <i class="fas fa-shopping-cart"></i></h1>
    <?php displayCart();
          editCart();
          addOrder(); ?>
</div>

</div>


<?php require_once 'layouts/footer.php' ?>