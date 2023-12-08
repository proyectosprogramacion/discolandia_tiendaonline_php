<?php


if (isset($_GET['id'])) {


  $query = query("SELECT * FROM products WHERE product_id = " . escape_string($_GET['id']) . " ");
  confirm($query);

  while ($row = fetch_array($query)) {

    $product_title = escape_string($row['product_title']);
    $product_category_id = escape_string($row['product_category_id']);
    $product_price = escape_string($row['product_price']);
    $product_description = escape_string($row['product_description']);
    $short_desc = escape_string($row['short_desc']);
    $product_quantity = escape_string($row['product_quantity']);
    $product_image = escape_string($row['product_image']);



    $product_image = display_image($row['product_image']);

  }

  update_product();

}

?>

<div class="col-md-12">

  <div class="row">
    <h1 class="page-header">
      Editar producto
    </h1>
  </div>

  <form action="" method="post" enctype="multipart/form-data">
    <div class="col-md-8">

      <div class="form-group">
        <label for="product-title">Titulo producto </label>
        <input type="text" name="product_title" class="form-control" value="<?php echo $product_title; ?>">

      </div>


      <div class="form-group">
        <label for="product-title">Descripción del producto</label>
        <textarea name="product_description" id="" cols="30" rows="10"
          class="form-control"><?php echo $product_description; ?></textarea>
      </div>



      <div class="form-group row">

        <div class="col-xs-3">
          <label for="product-price">Precio del producto</label>
          <input type="number" name="product_price" class="form-control" size="60"
            value="<?php echo $product_price; ?>">
        </div>
      </div>



      <div class="form-group">
        <label for="product-title">Descripción corta</label>
        <textarea name="short_desc" id="" cols="30" rows="3" class="form-control"><?php echo $short_desc; ?></textarea>
      </div>




    </div><!--Main Content-->


    <!-- SIDEBAR-->


    <aside id="admin_sidebar" class="col-md-4">


      <div class="form-group">
        <input type="submit" name="draft" class="btn btn-primary btn-lg" value="Borrar">
        <input type="submit" name="update" class="btn btn-primary btn-lg" value="Actualizar">
      </div>



      <div class="form-group">
        <label for="product-title">Categoría producto</label>

        <select name="product_category_id" id="" class="form-control">


          <option value="<?php echo $product_category_id; ?>">
            <?php echo show_product_category_title($product_category_id); ?>
          </option>

          <?php show_categories_add_product_page(); ?>

        </select>


      </div>







      <div class="form-group">
        <label for="product-title">Cantidad de producto</label>
        <input type="number" name="product_quantity" class="form-control" value="<?php echo $product_quantity; ?>">
      </div>


      <div class="form-group">
        <label for="product-title">Imagen del producto</label>
        <input type="file" name="file"> <br>

        <img width='200' src="<?php echo $product_image; ?>" alt="">

      </div>



    </aside><!--SIDEBAR-->



  </form>