<div class="modal fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create an account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="" method="POST">
       <?php
       $validate = admin_createUser($_POST);
             ?>
         <div class="form-group">
            <label for="">Name</label>
                <input type="text" class="form-control" placeholder="John Doe" name="name">
               <small class="text-danger"><?=$validate['name'] ?? "" ?></small>      
         </div>

         <div class="form-group">
            <label for="">Email</label>
                <input type="text" class="form-control" placeholder="Johndoe@email.com" name="email">
                <small class="text-danger"><?=$validate['email'] ?? "" ?></small>
         </div>

         <div class="form-group">
            <label for="">Phone</label>
                <input type="text" class="form-control" placeholder="09659312003" name="phone">
                <small class="text-danger"><?=$validate['phone'] ?? "" ?></small>
         </div>

         <div class="form-group">
            <label for="">Address</label>
                <input type="text" class="form-control" placeholder="Lot 27 blk 3 Ulas Davao City , 8000" name="address">
                <small class="text-danger"><?=$validate['address'] ?? "" ?></small>
         </div>

         <div class="form-group">
            <label for="">Password</label>
                <input type="password" class="form-control" placeholder="*******" name="password">
                <small class="text-danger"><?=$validate['password'] ?? "" ?></small>
         </div>

         <div class="form-group">
            <label for="">Confrim password</label>
                <input type="password" class="form-control" placeholder="*******" name="password2">
                <small class="text-danger"><?=$validate['password'] ?? "" ?></small>
         </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="register" value="Register">
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProduct" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="" method="POST" enctype="multipart/form-data">
        <?php $validate = addProduct($_POST); ?>
         <div class="form-group">
            <label for="">Title</label>
                <input type="text" class="form-control" placeholder="Vintage Los Angeles Raiders" name="title">
               <small class="text-danger"><?=$validate['title'] ?? "" ?></small>
              
         </div>

         <div class="form-group">
            <label for="">Description</label>
               <textarea name="description" id="description"  rows="5" class="form-control" placeholder="Type something here ..." name="description"></textarea>
                <small class="text-danger"><?=$validate['description'] ?? "" ?></small>
         </div>

         <div class="form-group">
            <label for="">Price</label>
                <input type="text" class="form-control" placeholder="Php 5000" name="price">
                <small class="text-danger"><?=$validate['price'] ?? "" ?></small>
         </div>

         <div class="form-group">
            <label for="">Quantity</label>
                <input type="text" class="form-control" placeholder="Enter quantity" name="qty">
                <small class="text-danger"><?=$validate['qty'] ?? "" ?></small>
         </div>

         <div class="form-group">
            <label for="">Image</label>
                <input type="file" class="form-control" name="file" required>
                <small class="text-danger"><?=$validate['file'] ?? "" ?></small>
         </div>


         <div class="form-group">
            <label for="">Select Category</label><br>
              <select class="form-control" name="category" id="category">
                <option></option>
                <option value="snapback">Snabpack</option>
                <option value="jersey">Jersey</option>
              </select>
                <small class="text-danger"><?=$validate['category'] ?? "" ?></small>
         </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="add_product" value="Add">
      </div>
      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
</body>
</html>