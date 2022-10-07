<div class="h-layout">
    <h1 class="text-center">Update <span class="green-text">Ingredient</span></h1>
    <form method="POST" class="form" enctype="multipart/form-data">
        <fieldset>
            <label class="full-line">
                <span>name</span>
                <input type="text" name="name" maxlength="128" value="<?php echo $ingredient->name ?? '';?>" required>
            </label>
            </label>
            <label>
                <span>Picture</span>
                <input type="file" name="ingredientPicture" id="ingredientPicture" onchange="previewImage(event)">
            </label>
            <label>
                <span>Preview</span>
                <img id="preview" src="<?php 
                if($ingredient->{'image-url'}) echo '/resources/images' . $ingredient->{'image-url'};
                ?>" />
            </label>
        </fieldset>
        <button type="submit" name="update-ingredient">Update Ingredient</button>
    </form>
<!-- <input type="file" accept="image/*" onchange="previewImage(event)"> -->
<script>
   const previewImage = e => {
      const preview = document.getElementById('preview');
      preview.src = URL.createObjectURL(e.target.files[0]);
      preview.onload = () => URL.revokeObjectURL(preview.src);
   };
</script>